<?php
namespace App\Controller\Api\User;

use App\Controller\Api\User\ApiController;
use App\Controller\Api\ApiHelper;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\ConflictException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\I18n\Time;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\I18n\FrozenDate;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends ApiController
{

  const USER_LABEL='user';

  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->Auth->allow(['login']);
    $this->Auth->allow(['add','login','fbLogin','forgotPassword','resetPassword','bulkAdd', 'renewRefreshToken']);
  }


  public function index()
  {
    // $this->_renewRefreshToken();
    if (!$this->request->is(['get'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    $userId = $this->Auth->user('id');
    $user = $this->Users->findById($userId)->first();
    $data =array();
    $data['status']=true;
    $data['data']=$user;
    $this->set('data',$data['data']);
    $this->set('status',$data['status']);
    $this->set('_serialize', ['status','data']);
  }

  /**
  * @api {POST} /api/user/register Registrer new User
  * @apiDescription Registrer new User.
  * @apiVersion 1.1.0
  * @apiName RegisterNewUser
  * @apiGroup User Apis
  *
  * @apiParam {String} name User's Name.
  * @apiParam {String} username Username.
  * @apiParam {String} password contains user's password.
  * @apiParam {String} [email] contains user's email.
  * @apiParam {String} [phone] contains user's phone number.
  * @apiParam {Boolean} [status] Vendor's Status: Enabled or Disabled, By Default Enabled.
  * @apiSuccess {Boolean} status status of the request.
  * @apiSuccess {Array} data cotains response.
  * @apiSuccess {Integer} id cotains user's id.
  *
  * @apiSuccessExample Success-Response:
  * HTTP/1.1 200 OK
  * {
  *     "response": {
  *         "status": true,
  *         "data": {
  *             "id": 11
  *         }
  *     }
  * }
  **/
  public function add()
  {
    if (!$this->request->is(['post'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    // pr($this->request);die;
    if(!$this->request->data){
      throw new BadRequestException(__('Request Data not found. Kindly Provide valid Request Data.'));
    }
    $data = $this->request->data;
    if(!isset($data['email'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','email'));
    }
    if((isset($data['email']) && empty($data['email']))){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','email'));
    }
    if(!isset($data['phone'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','phone'));
    }
    if((isset($data['phone']) && empty($data['phone']))){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','phone'));
    }

    if(isset($this->request->data['fb_identifier']) && !empty($this->request->data['fb_identifier'])){
      $userData = $this->Users->findByFbIdentifier($this->request->data['fb_identifier'])->first();
      if($userData){
        throw new ConflictException(__('This Facebook account is already linked with other account. Kindly logIn.'));
      }else{
        $this->request->data['password'] = '12345678';
      }
    }
    
    $checkExisting = $this->Users->findByEmail($data['email'])->first();
    if($checkExisting){
     throw new BadRequestException(__('User is already registered with us.'));
   }

   $this->request->data['username']=$data['email'];
   $this->request->data['role_id'] = 2;
   $userData = $this->Users->newEntity($this->request->data);
   $userData = $this->Users->patchEntity($userData, $this->request->data);
   if($userData->errors()){
    $this->_sendErrorResponse($userData->errors());
  }

  if ($this->Users->save($userData)) {
          //return response
    $data =array();
    $data['status']=true;
    $data['data'] =$userData;
    $this->set('data',$data['data']);
    $this->set('status',$data['status']);
    $this->set('_serialize', ['status','data']);
  } else {
    if($userData->errors()){
      $this->_sendErrorResponse($userData->errors());
    }else{
      throw new InternalErrorException(__('INTERNAL_SERVER_ERROR'));
    }

  }

}

    /**
    * @api {post} /api/user/login Login User
    * @apiVersion 1.1.0
    * @apiName login
    * @apiGroup User Apis
    *
    * @apiParam {String} username username.
    * @apiParam {String} password Users Password.
    *
    * @apiSuccess {Boolean} status status of the request.
    * @apiSuccess {Number} id ID of the User.
    * @apiSuccess {String} token  Auth Token.
    *
    * @apiSuccessExample Success-Response:
    *     HTTP/1.1 200 OK
    *     {
    *      "response": {
    *                    "status": true,
    *                    "data": {
    *                             "id": 7,
    *                             "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcsImV4cCI6MTQ3MDc0NDI5MX0.i1Jxt5__1oOlmltXoOVIC-17f4rM48nl4uzkahWmU1c"
    *                            }
    *                  }
    *     }
    *
    */
    public function login()
    {
      if (!$this->request->is(['post'])) {
        throw new MethodNotAllowedException(__('BAD_REQUEST'));
      }
      $authToken =  $this->request->header('Authorization');
      if(!$authToken){
        throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
      }
      $authToken = explode(' ', $authToken);
      //validate basic token
      if(!isset($authToken[0]) || (isset($authToken[0]) && empty($authToken[0])) || strtolower($authToken[0])!='basic'){
        throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
      }
      if(!isset($authToken[1]) || (isset($authToken[1]) && empty($authToken[1]))){
        throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
      }
      //check for token element which will be present at 1st index
      $authToken = $authToken[1];
      //decode token
      $resellerTokenData = base64_decode($authToken,true);

      //extract client id and client secret
      $resellerTokenData = explode(':',$resellerTokenData);
      //validate token data
      if(!ApiHelper::strictValidate($resellerTokenData,'0') && !ApiHelper::strictValidate($resellerTokenData,'1')){
        throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
      }
      $this->request->data['username'] = $resellerTokenData[0];
      $this->request->data['password'] = $resellerTokenData[1];
      // pr($this->request);

      $data =array();
      $user = $this->Auth->identify();

      if (!$user) {
        throw new NotFoundException(__('LOGIN_FAILED'));
      }
      //if user is identified and his role is User then create user session

      //find role id
      $this->loadModel('Roles');
      //verify user role
      $user['role']=$query = $this->Roles->find('RolesById',['role' =>$user['role_id']])->select(['name','label'])->first();
      //if user role is not USER the logout
      // $X = $this->Auth->logout();
      if( empty($query) || $query->name!=self::USER_LABEL){
        throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST'));
      }else{
        // if user is disabled then log out
        if((!$user['status'])){
          throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST_USER_DISABLED'));
        }
        //login user, create a token and create session for the user
        $time = time() + 900;
        $expTime = Time::createFromTimestamp($time);
        $expTime = $expTime->format('Y-m-d H:i:s');
        $data['status']=true;
        $data['data']['id']=$user['id'];
        $data['data']['token']=JWT::encode([
          'sub' => $user['id'],
          'exp' =>  $time,
          // 'application_mode'=>Configure::read('PeopleHub.application_mode'),
          // 'application_env'=>Configure::read('PeopleHub.application_env'),
          'aplicaition_base_url'=>$this->request->env('REQUEST_SCHEME').'://'.$this->request->env('SERVER_NAME').$this->request->base,
          'ref_base_url'=>$this->request->header('Referer'),
          'clientIp'=>$this->request->header('ClientIp'),
          'userModel' => 'users'
          ],Security::salt());
        $data['data']['expires']=$expTime;
        // $data['data']['refresh_token'] = $this->_refreshToken($data);
        $this->set('data',$data['data']);
        $this->set('status',$data['status']);
        $this->set('_serialize', ['status','data']);
      }
    }

    //Method ro generate refresh token.
    private function _refreshToken($data){
      // $time = time() + (8*60*60); //for 8 hrs
      $time = time() + 900;
      $expTime = Time::createFromTimestamp($time);
      $expTime = $expTime->format('Y-m-d H:i:s');
      $refreshToken = JWT::encode(['sub' => $data['data']['id'],
        'exp' =>  $time,
        // 'application_mode'=>Configure::read('PeopleHub.application_mode'),
        // 'application_env'=>Configure::read('PeopleHub.application_env'),
        'aplicaition_base_url'=>$this->request->env('REQUEST_SCHEME').'://'.$this->request->env('SERVER_NAME').$this->request->base,
        'ref_base_url'=>$this->request->header('Referer'),
        'clientIp'=>$this->request->header('ClientIp'),
        'userModel' => 'users'
        ], Security::salt());

      $refreshTokenHash = ApiHelper::generateCryptographicString('alnum',64);
      $refreshTokenData = Cache::write($refreshTokenHash, serialize(['refresh_token'=>$refreshToken,'user_id'=>$data['data']['id'],'client_ip'=>$this->request->header('ClientIp'),'refresh_exp'=>$expTime]),'u_t');
    // $refreshTokenData = unserialize(Cache::read($refreshTokenHash,'u_t'));
      return $refreshTokenHash;
    }


  /**
  * @api {post} /users/logout Logout User
  * @apiVersion 1.1.0
  * @apiName logout
  * @apiGroup User Apis
  *
  * @apiHeader {String} token users's Access Token
  * @apiSuccessExample Success-Response:
  *     HTTP/1.1 200 OK
  *     {
  *   "response": {
  *   "status": true,
  *   "data": {
  *          "message": "User Logged out Successfully"
  *          }
  *      }
  *   }
  */

  /**
  * This method is used to logout user and to remove session
  * @return Mixed return array if user is logged out else throws error
  */
  public function logout()
  {

    if (!$this->request->is(['post'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    //validate token
    $userId = $this->Auth->user('id');
    $this->Auth->logout();
    $data =array();
    $data['status']=true;
    $data['data']['message']='User Logged out Successfully';
    $this->set('data',$data['data']);
    $this->set('status',$data['status']);
    $this->set('_serialize', ['status','data']);

  }

  

  /**
  * Delete method
  *
  * @param string|null $id User id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function delete($id = null)
  {
    throw new NotFoundException(__('BAD_REQUEST'));
  }

  /**
  * View method
  *
  * @param string|null $id User id.
  * @return \Cake\Network\Response|null Redirects to index.
  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
  */
  public function view($id = null)
  {
    throw new NotFoundException(__('BAD_REQUEST'));
  }

  protected function _createResetPasswordHash($userId,$uuid){
    $this->loadModel('ResetPasswordHashes');
    $hasher = new DefaultPasswordHasher();
    $reqData = ['user_id'=>$userId,'hash'=> $hasher->hash($uuid)];
    $createPasswordhash = $this->ResetPasswordHashes->newEntity($reqData);
    $createPasswordhash = $this->ResetPasswordHashes->patchEntity($createPasswordhash,$reqData);
    if($this->ResetPasswordHashes->save($createPasswordhash)){
      return $createPasswordhash->hash;
    }else{
      Log::write('error','error in creating resetpassword hash for user id '.$userId);
      Log::write('error',$createPasswordhash);
    }
    return false;
  }

  public function forgotPassword()
  {
    if (!$this->request->is('post')) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
    $data = $this->request->data;
    if(!isset($data['ref'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','ref'));
    }
    if(empty($data['ref'])){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','ref'));
    }
    if(!isset($data['attribute_type'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','attribute_type'));
    }
    if( empty($data['attribute_type'])){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','attribute_type'));
    }
    if(!isset($data['value'])){
      throw new BadRequestException(__('MANDATORY_FIELD_MISSING','value'));
    }
    if(empty($data['value'])){
      throw new BadRequestException(__('EMPTY_NOT_ALLOWED','value'));
    }
    if (!in_array($data['attribute_type'], array('email','card','username'))){
      throw new BadRequestException(__('Invalid attrubute type. Attribute type can be only email or username or card.'));
    }
    switch ($data['attribute_type']) {
      case 'email':
      $user = $this->Users->find('all')->where(['email'=>$data['value']])->first();
      break;

      case 'username':
      $user = $this->Users->find('all')->where(['username'=>$data['value']])->first();
      break;
      case 'card':
      if(!isset($data['vendor_id'])){
        throw new BadRequestException(__('MANDATORY_FIELD_MISSING','vendor_id'));
      }
      if(empty($data['vendor_id'])){
        throw new BadRequestException(__('EMPTY_NOT_ALLOWED','vendor_id'));
      }
      $this->loadModel('ResellerCardSeries');
      $series = $this->ResellerCardSeries->find()->where(['vendor_id'=>$data['vendor_id']])->first();
      if($series){
        $this->loadModel('UserCards');
        $userCards  = $series->series.sprintf("%010d", $data['value']);
        $userCards = $this->UserCards->find()->where(['complete_card_number'=>$userCards ])->first();
        if($userCards){
          $user = $this->Users->find('all')->where(['id'=>$userCards->user_id])->first();
        }else{
          throw new BadRequestException(__('Kindly Provide valid Card Number'));
        }
      }

      break;
      default:
      throw new BadRequestException(__('BAD_REQUEST'));
      break;
    }

    if(!$user){
      throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS',$data['attribute_type']));
    }
    $activeEmail = $user->email;
    if(!$activeEmail){
      $activeEmail = $user->guardian_email;
    }

    $this->loadModel('ResetPasswordHashes');
    $checkExistPasswordHash = $this->ResetPasswordHashes->find()->where(['user_id'=>$user->id])->first();

    if(empty($checkExistPasswordHash)){
      $resetPwdHash = $this->_createResetPasswordHash($user->id,$user->uuid);
    }else{
      $resetPwdHash = $checkExistPasswordHash->hash;
      $time = new Time($checkExistPasswordHash->created);
      if(!$time->wasWithinLast(1)){
        $this->ResetPasswordHashes->delete($checkExistPasswordHash);
        $resetPwdHash =$this->_createResetPasswordHash($user->id,$user->uuid);
      }
    }

    $userSecurityQuestions = $this->Users->UserSecurityQuestions->findByUserId($user->id)                                                          ->all()
    ->toArray();


    if(!empty($userSecurityQuestions)){
      $url = urlencode($data['ref'].'security-questions/getSecurityQuestions?reset-token='.$resetPwdHash);
    }else{
      $url = urlencode($data['ref'].'reset-password?reset-token='.$resetPwdHash);
      
    }

    // $url = urlencode($data['ref'].'security-questions/getSecurityQuestions?reset-token='.$resetPwdHash);
    $data =array();
    $data['status']=true;
    $data['data']['id'] = $user->id;
    $data['data']['token']=$resetPwdHash;
    $data['data']['url']=$url;
    $data['data']['name']=$user->name;
    $data['data']['username']=$user->username;
    $data['data']['email']=$activeEmail;
    $data['data']['userSecurityQuestions'] = count($userSecurityQuestions);

    $this->set('data',$data['data']);
    $this->set('status',$data['status']);
    $this->set('_serialize', ['status','data']);
  }


  public function resetPassword()
  {
    if ($this->request->is('post')) {
      $uuid = (isset($this->request->data['reset-token']))?$this->request->data['reset-token']:'';
      $uuid = urldecode($uuid);
      // pr($uuid); 
      if(!$uuid){
        throw new BadRequestException(__('BAD_REQUEST'));
      }
      $password = (isset($this->request->data['new_password']))?$this->request->data['new_password']:'';
      if(!$password){
        throw new BadRequestException(__('PROVIDE_PASSWORD'));
      }
      $cnfPassword = (isset($this->request->data['cnf_password']))?$this->request->data['cnf_password']:'';
      if(!$cnfPassword){
        throw new BadRequestException(__('CONFIRM_PASSWORD'));
      }
      if($password !== $cnfPassword){
        throw new BadRequestException(__('MISMATCH_PASSWORD'));
      }

      $this->loadModel('ResetPasswordHashes');
      $checkExistPasswordHash = $this->ResetPasswordHashes->find()
      ->where(['hash'=>$uuid])
      ->first();

      if(!$checkExistPasswordHash){
        throw new BadRequestException(__('INVALID_RESET_PASSWORD'));
      }


      $userUpdate = $this->Users->findById($checkExistPasswordHash->user_id)->first();
      if(!$userUpdate){
        throw new NotFoundException(__('ENTITY_DOES_NOT_EXISTS','User'));
      }

      $userSecurityQuestions = $this->Users->UserSecurityQuestions->findByUserId($checkExistPasswordHash->user_id)                                                          ->all()
      ->toArray();

      if($userSecurityQuestions){
        // read from cache is user gave response to their respective set questions.
        $sqResponseCache = unserialize(Cache::read($checkExistPasswordHash->user_id, 's_q_response'));
        if(!$sqResponseCache){ 
          throw new BadRequestException(__('BAD_REQUEST')); 
        }
      }
      
      if(! preg_match("/^[A-Za-z0-9~!@#$%^*&;?.+_]{8,}$/", $password)){
        throw new BadRequestException(__('PASSWORD_CONDITION'));
      }
      $isContainChars = false;
      for( $i = 0; $i <= strlen($userUpdate->username)-3; $i++ ) {
        $char = substr( $userUpdate->username, $i, 3 );
        if(strpos($password,$char,0) !== false ){
          $isContainChars = true;
          break;
        }
      }
      if($isContainChars){
        throw new BadRequestException(__('PASSWORD_USER_CONDITION'));
      }
      $fullname = $userUpdate->full_name;
      for( $i = 0; $i <= strlen($fullname)-3; $i++ ) {
        $char = substr( $fullname, $i, 3 );
        if(strpos($password,$char,0) !== false ){
          $isContainChars = true;
          break;
        }
      }
      if($isContainChars){
        throw new BadRequestException(__('PASSWORD_NAME_CONDITION'));
      }
      $this->loadModel('UserOldPasswords');
      $hasher = new DefaultPasswordHasher();
      $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$checkExistPasswordHash->user_id])->toArray();
      foreach ($userOldPasswordCheck as $key => $value) {
        if($hasher->check( $password,$value['password'])){
          throw new BadRequestException(__('SIX_EARLIER_PASSWORD'));
        }
      }
      // pr($userUpdate);die;
      $reqData = ['password'=>$password];
      $this->loadModel('UserOldPasswords');
      $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$checkExistPasswordHash->user_id])->toArray();
      $hasher = new DefaultPasswordHasher();
      foreach ($userOldPasswordCheck as $key => $value) {
        // pr($value);die;
        if($hasher->check( $password,$value['password'])){
          throw new BadRequestException(__('PASSWORD_LIMIT'));
        }
      }
      $userUpdate = $this->Users->patchEntity($userUpdate,$reqData);
      // pr($userUpdate);die;
      if($this->Users->save($userUpdate)){

        $reqData = ['user_id'=>$checkExistPasswordHash->user_id,'password'=>$password];

        $userOldPasswordCheck = $this->UserOldPasswords->newEntity($reqData);
        $userOldPasswordCheck = $this->UserOldPasswords->patchEntity($userOldPasswordCheck, $reqData);
        if($this->UserOldPasswords->save($userOldPasswordCheck)){
          $userOldPasswordCheck = $this->UserOldPasswords->find('all')->where(['user_id'=>$checkExistPasswordHash->user_id]);
          if($userOldPasswordCheck->count() > 6){
            $userOldPasswordCheck =$userOldPasswordCheck->order('created ASC')->first();
            $userOldPasswordCheck = $this->UserOldPasswords->delete($userOldPasswordCheck);

          }
          $this->ResetPasswordHashes->delete($checkExistPasswordHash);
          Cache::delete($checkExistPasswordHash->user_id, 's_q_response');
        }else{
          // pr($userOldPasswordCheck->errors());die;
          //log password not changed
          // throw new BadRequestException(__('can not use earlier used 6 passwords'));
        }
        $data =array();
        $data['status']=true;
        $data['data']['id']=$userUpdate->id;
        $data['data']['message']=(__('NEW_PASSWORD_UPDATED'));
        $this->set('data',$data['data']);
        $this->set('status',$data['status']);
        $this->set('_serialize', ['status','data']);
      }else{
        throw new BadRequestException(__('KINDLY_PROVIDE_VALID_DATA'));
      }
    }
  }


}

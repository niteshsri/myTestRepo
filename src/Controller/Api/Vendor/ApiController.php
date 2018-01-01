<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link      http://cakephp.org CakePHP(tm) Project
* @since     0.2.9
* @license   http://www.opensource.org/licenses/mit-license.php MIT License
*/
namespace App\Controller\Api\Vendor;

use Cake\Controller\Controller;
use App\Controller\Api\ApiHelper;
use Cake\Event\Event;
use Cake\Network\Request;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\ConflictException;
use Cake\Cache\Cache;
use Cake\Network\Exception\InternalErrorException;
use Cake\I18n\Time;
use Firebase\JWT\JWT;
use Cake\Utility\Security;
use AuditStash\Meta\RequestMetadata;
use Cake\Event\EventManager;


/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
*/
class ApiController extends Controller
{
  const BEARER_LABEL='bearer';

  private $_errorVal = array();

  //initialize auth
  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Auth', [
      'storage' => 'Memory',
      'authorize' => ['Custom' => [] ],
      'authenticate' => [
      'ADmad/JwtAuth.Jwt' => [
        'parameter' => 'token',
        'userModel' => 'Vendors',
        'scope' => ['Vendors.status' => 1],
        'fields' => [
                      'username' => 'id'
                    ],
        'queryDatasource' => true,
        'unauthenticatedException' => '\App\Network\Exception\UnauthorizedException'
      ]
      ],
      'unauthorizedRedirect' => false,
   //   'checkAuthIn' => 'Controller.initialize',
      'loginAction' => false
      ]);
  }

  /**
  * This method is used to validate the auth token.
  * @param string $token contains bearer token value
  * @param boolean $isUser contains true if we need to verify user's token
  *
  * @return integer, id of the user or reseller whose token is validated
  */
  protected function _validateAuthToken(){
    // pr('in validate token'); die;
    $token = $this->request->header('Authorization');
    $token = str_replace('Bearer ', '', $token);
    if(!$token){
      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
    }
    $payload = JWT::decode($token, Security::salt(), array('HS256'));
    $resellerId = (isset($payload->r_id))? $payload->r_id:null;
    if(!$resellerId){
      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
    }
    //if token not present throw error
    $vendorId = $this->Auth->user('id');
    //if present let's explode token and find out the user or reseller id
    $vendorInfo = $this->_isVendorAssociatedToReseller($resellerId,$vendorId);
    if(!$vendorInfo){
      throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST'));
    }
    if($vendorId && !empty($vendorId)){
      EventManager::instance()->on(new RequestMetadata($this->request, $vendorId));
      EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
          foreach ($logs as $event) {
              $event->setMetaInfo($event->getMetaInfo() + ['userModel' => 'Vendors']);
          }
      });

    }
    $data = ['reseller_id'=>$resellerId,'vendor_id'=>$vendorId];
    return $data;
  }

  /**
  * This method is used to verify whether a vendor belongs to a particular reseller or not.
  * @param integer $resellerId contains reseller id
  * @param integer $vendorId contains vendor id
  *
  * @return Boolean return True if vendor belongs to the reseller else false
  */
  protected function _isVendorAssociatedToReseller($resellerId,$vendorId){
    $this->loadModel('ResellerVendors');
    $vendorInfo = $this->ResellerVendors->find('all')->where(['vendor_id '=>$vendorId,'reseller_id' =>$resellerId,'status'=>1])->first();
    if($vendorInfo) {
      return TRUE;
    }else{
      return FALSE;
    }

  }

  public function beforeFilter(Event $event)
  {
    $origin = $this->request->header('Origin');
    if($this->request->header('CONTENT_TYPE') != "application/x-www-form-urlencoded; charset=UTF-8"){
      $this->request->env('CONTENT_TYPE', 'application/json');
    }
    $this->request->env('HTTP_ACCEPT', 'application/json');
    if (!empty($origin)) {
      $this->response->header('Access-Control-Allow-Origin', $origin);
    }

    if ($this->request->method() == 'OPTIONS') {
      $method  = $this->request->header('Access-Control-Request-Method');
      $headers = $this->request->header('Access-Control-Request-Headers');
      $this->response->header('Access-Control-Allow-Headers', $headers);
      $this->response->header('Access-Control-Allow-Methods', empty($method) ? 'GET, POST, PUT, DELETE' : $method);
      $this->response->header('Access-Control-Allow-Credentials', 'true');
      $this->response->header('Access-Control-Max-Age', '120');
      $this->response->send();
      die;
    }
    // die;
    $this->response->cors($this->request)
    ->allowOrigin(['*'])
    ->allowMethods(['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'])
    ->allowHeaders(['X-CSRF-Token','token'])
    ->allowCredentials()
    ->exposeHeaders(['Link'])
    ->maxAge(300)
    ->build();
  }
  protected function _sendErrorResponse($err,$returnError = false){
    $error_msg = [];
    foreach($err as $errors){
      if(is_array($errors) || is_object($errors)){
       $this->_sendErrorResponse($errors);
      }else{
        $error_msg[]    =   $errors;
      }
    }
    $data = array();
    $data['status'] = false;
    $data['error'] = $error_msg;
    if($returnError){
      return $error_msg;
    }else{
      $this->response->statusCode(400);
      //attach array in response body
      $this->response->body(json_encode($data));
      //send response
      $this->response->type('json');
      $this->response->send();
      //stop request propagation
      $this->response->stop();
    }

  }
  /**
  * This method is used to log credit reward and redeem activity
  * @param string $action contains action "reward" ore "redeem"
  * @param string $actionId contains id of the action based on table
  * @param integer $points contains point awarded or redeemed
  * @param integer $rewardMethodId contains reward method Id
  * @param integer $vendorId contains vendor Id
  * @param integer $userId   contaons user Id
  * @param integer $serviceiId   contains service id:amazon or tango
  * @param string $attribute    contains attribute value (phone number or email or card number)
  * @param string $attributeType    contains type of attribute (phone or email or card)
  *
  * @return Boolean True on success, False on failure
  */
  protected function _logActivity($action,$actionId,$points,$rewardMethodId,$vendorId= false,$userId=false,$serviceId=false,$attribute=false,$attributeType=false,$created=false,$amount = false,$tangoOrderId = false){
    //form request array
    $activityReq = array();
    $activityReq['points']=$points;
    $activityReq['action']=$action;
    if($action == 'reward'){
      $activityReq['reward_credit_id']=$actionId;
    }else if($action == 'redeem'){
      $activityReq['redeemed_credit_id']=$actionId;
      if($tangoOrderId){
        $activityReq['tango_order_identifier']=$tangoOrderId;
      }
    }else if($action == 'instant_redeem'){
      $activityReq['user_instant_redemption_id']=$actionId;
      if($tangoOrderId){
        $activityReq['tango_order_identifier']=$tangoOrderId;
      }
    }else if($action == 'reverse'){
      $activityReq['activity_id']=$actionId;
    }elseif($action == 'reduced'){
      $activityReq['action']=$action;
    }else{
      $activityReq['action']=null;
    }
    $activityReq['reward_method_id'] = $rewardMethodId;

    if(!empty($vendorId)){
      $activityReq['vendor_id'] = $vendorId;
    }
    if(!empty($userId)){
      $activityReq['user_id'] = $userId;
    }
    if(!empty($serviceId)){
      $activityReq['service_id'] = $serviceId;
    }
    if(!empty($attribute)){
      $activityReq['attribute'] = $attribute;
    }
    if(!empty($attributeType)){
      $activityReq['attribute_type'] = $attributeType;
    }
    if(!empty($amount)){
      $activityReq['amount'] = $amount;
    }
    if(!empty($created)){
      $activityReq['created'] = $created;
      $activityReq['modified'] = $created;
    }
    //load activity model
    $this->loadModel('Activities');
    //log activity; if saved return true else false
    $activityData = $this->Activities->newEntity($activityReq);
    $activityData = $this->Activities->patchEntity($activityData, $activityReq);
    if ($this->Activities->save($activityData)) {
      return $activityData->id;
    } else {
      //log entry something went wrong
      return false;
    }
  }
}

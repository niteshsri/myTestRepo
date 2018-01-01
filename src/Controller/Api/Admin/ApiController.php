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
namespace App\Controller\Api;

use Cake\Controller\Controller;
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

  public function isAuthorized($user)
  {
    return false;
  }


  //initialize auth
  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');

    $this->loadComponent('Auth', [
      'unauthorizedRedirect' => false,
    ]);

  }

  /**
  * This method is used to log credit reward and redeem activity
  * @param string $action contains action "reward" ore "redeem"
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
  protected function _logActivity($action,$points,$rewardMethodId,$vendorId= false,$userId=false,$serviceId=false,$attribute=false,$attributeType=false,$created=false){
    //form request array
    $activityReq = array();
    $activityReq['points']=$points;
    $activityReq['action']=$action;
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
      return TRUE;
    } else {
      return TRUE;
    }
  }

  /**
  * This method is used to verify the auth token owner, it may be user or reseller
  * @param string $token contains bearer token value
  *
  * @return Array contains User's Id or Reseller Id on the basis of user type
  */
  protected function _checkAuthTokenProvider($token){
    //if token is not present send error
    if(!$token){
      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
    }else{
      //if present then let's explode and find token owner
      $token = explode(' ', $token);
      //token must be bearer type
      if(isset($token[0]) && !empty($token[0]) && strtolower($token[0])== self::BEARER_LABEL){
        //if berer present then next element will be token
        if(isset($token[1]) && !empty($token[1])){
          $token = $token[1];
          //lets find the session on the besis of token
          //we create u_t_<token> for user
          $userSessionData = Cache::read($userData['token'],'u_t');
          //we create r_t_<token> for reseller
          $resellerSessionData = Cache::read($userData['token'],'r_s_t');
          //if session named u_t_<token> is present then owner is user else reseller, lets form an array to contain provider id
          if(!($userSessionData XOR $resellerSessionData)){
            throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
          }
          if($userSessionData){
            return array('userType'=>'user','id'=>$userSessionData);
          }
          if($resellerSessionData){
            $resellerData = unserialize($resellerSessionData);
            $resellerId = $resellerData['reseller_id'];
            $vendorId =  $resellerData['vendor_id'];
            //check whether the vendor is associated to the reseller or not
            $vendorInfo = $this->_isVendorAssociatedToReseller($resellerId,$vendorId);
            if(!$vendorInfo){
              throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST'));
            }
            $resellerData['userType']= 'reseller';
            return $resellerData;
          }
        }
      }
      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
    }

  }

  /**
  * This method is used to validate the auth token.
  * @param string $token contains bearer token value
  * @param boolean $isUser contains true if we need to verify user's token
  *
  * @return integer, id of the user or reseller whose token is validated
  */
  protected function _validateAuthToken($token,$isUser=FALSE){
    //if token not present throw error
    if(!$token){
      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));
    }else{
      //if present let's explode token and find out the user or reseller id
      $token = explode(' ', $token);

      if(isset($token[0]) && !empty($token[0]) && strtolower($token[0])== self::BEARER_LABEL){
        if(isset($token[1]) && !empty($token[1])){
          //if we are veriying user's token then session will contain user id else reseller id
          if($isUser){
            $sessionData = Cache::read($token[1],'u_t');
          }else{
            $sessionData = Cache::read($token[1],'r_s_t');
            $sessionData = unserialize($sessionData);
            $resellerId = $sessionData['reseller_id'];
            $vendorId =  $sessionData['vendor_id'];
            //check whether the vendor is associated to the reseller or not
            $vendorInfo = $this->_isVendorAssociatedToReseller($resellerId,$vendorId);
            if(!$vendorInfo){
              throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST'));
            }
            $sessionData['userType']= 'reseller';
          }
          if(empty($sessionData)){
            throw new UnauthorizedException(__('UNAUTHORIZED_REQUEST'));
          }else{
            return $sessionData;
          }

        }
      }

      throw new UnauthorizedException(__('INVALID_TOKEN_PROVIDED'));

    }
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



  /**
  * This method is used to check whether a key in an array is present or not and if present then it should
  * not be empty.
  * @param array $src cotains source array
  * @param string $key contains key to be verified
  *
  * @return Boolean returns ture if key presnt in src else false
  */
  protected function _strictValidate($src,$key){
    if(isset($src[$key]) && !empty($src[$key])){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  /**
  * This method is used to verify if provided email is having correct syntax or not
  * @param string $email contains email to be verified
  *
  * @return Boolean returns ture if email syntax is correct else false
  */
  protected function _isValidEmail($email){
    if($email){
      return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }else{
      return false;
    }

  }

  protected function _errorParser($data,$parentKey=false){
    if(is_object($data)){
      if(!empty($data->errors())){
        foreach ($data->errors() as $key => $invalidValue) {
          $this->_errorParser($invalidValue,$key);
        }
      }
    }if(is_array($data)){
      $this->_errorVal[$parentKey] = ($data);
    }
    return ($this->_errorVal);
  }


  public function beforeFilter(Event $event)
  {
    if($this->request->is(['options'])){
      $data = array();
      $data['status'] = true;
      $this->response->body(json_encode($data));
      $this->response->send();
      $this->response->stop();
    }
    $this->request->env('HTTP_ACCEPT', 'application/json');
    $this->request->env('CONTENT_TYPE', 'application/json');
    $this->response->cors($this->request)
    ->allowOrigin(['*'])
    ->allowMethods(['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'])
    ->allowHeaders(['X-CSRF-Token','token'])
    ->allowCredentials()
    ->exposeHeaders(['Link'])
    ->maxAge(300)
    ->build();
  }
  
protected function _sendErrorResponse($err){

      $data = array();
      $data['status'] = false;
      $data['error'] = $err;
      $this->response->statusCode(200);
  //attach array in response body
      $this->response->body(json_encode($data));
      $this->response->type('json');
  //send response
      $this->response->send();
  //stop request propagation
      $this->response->stop();
}
}

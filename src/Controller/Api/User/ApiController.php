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
namespace App\Controller\Api\User;

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
use Cake\I18n\Time;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use App\Controller\Api\ApiHelper;
use Cake\Network\Exception\InternalErrorException;
// use AuditStash\Meta\RequestMetadata;
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
    if($this->request->params['action'] == 'login'){
      $this->loadComponent('Auth', [
        // 'authorize' => ['Custom' => [] ],
        'authenticate' => [
          'Form' => [
                  'userModel' => 'Users'
              ],
        ],
      ]);
    }else{
      $this->loadComponent('Auth', [
        'storage' => 'Memory',
        // 'authorize' => ['Custom' => [] ],
        'authenticate' => [
          'ADmad/JwtAuth.Jwt' => [
            'parameter' => 'token',
            'userModel' => 'Users',
            'scope' => ['Users.status' => 1, 'Users.deleted IS' => NULL],
            'fields' => [
              'username' => 'id'
            ],
            'queryDatasource' => true,
            'unauthenticatedException' => '\App\Network\Exception\UnauthorizedException'
          ]
        ],
        'unauthorizedRedirect' => false,
        'checkAuthIn' => 'Controller.initialize',
        'loginAction' => false,
        'logoutRedirect' => false,
      ]);
    }

  }

  public function beforeFilter(Event $event)
  {
    $user = $this->Auth->user();
   
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


public function isAuthorized($user)
{
  return false;
}



protected function _sendErrorResponse($err){

  $errorMsg = [];
  pr($err);die;
  foreach($err as $parentKey => $errors){
    if(is_array($errors)){
      foreach($errors as $childKey => $error){
        if($childKey == '_empty'){
          $errorMsg[]    = "'". $parentKey. '\' field is required. Kindly provide valid data';
        }else{
          $errorMsg[]    =   $error;
        }
      }
    }else{
      $errorMsg[]    =   $errors;
    }
  }
  $data = array();
  $data['status'] = false;
  $data['error'] = ($errorMsg);
  $this->response->statusCode(400);
  //attach array in response body
  $this->response->body(json_encode($data));
  $this->response->type('json');
  //send response
  $this->response->send();
  //stop request propagation
  $this->response->stop();

}
}

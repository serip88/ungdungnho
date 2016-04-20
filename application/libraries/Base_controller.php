<?php

defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Base_controller extends REST_Controller {
    
    protected $_is_login = false;
	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('user_lib');
        $this->is_login();
        $this->htaccess_emulator();
        
    }

   
    public function is_login(){
        $data_user = $this->user_lib->get_user_session();
        if($data_user){
            $this->_is_login = true;
        }
        return $this->_is_login;
    }
    private function htaccess_emulator(){
        $actual_link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $para_url=trim($_SERVER['REQUEST_URI'],'/'); 
        $para_url=explode("?",$para_url);
        $status = $this->auth_check($para_url[0],$this->_is_login);
        if(!$status){
            $this->access_deny();
        }
    }
    private function auth_check($para_url,$is_login){
        $status = false;
        $para_url = str_replace("//", "/", $para_url);
        $arr_para_url = explode("/", $para_url);
        if(count($arr_para_url)==3){ 
            if($arr_para_url[0]=='api'){
                $api = implode("/", array($arr_para_url[1],$arr_para_url[2]));
                $all_api = $this->get_all_api();
                if(isset($all_api[$api]) && $all_api[$api]['api'] == $api){
                    if($is_login && !$all_api[$api]['deny_user']){
                        $status = true; 
                    }elseif (!$all_api[$api]['deny_guest']) { 
                        $status = true;
                    }
                }
                
            } 
        } 
        return $status;
    }
    public function access_deny($extra = [])
    {
        $this->response(array_merge(array(
            'status'  => FALSE,
            'msg' => 'You can not access!'
        ), $extra), REST_Controller::HTTP_BAD_REQUEST);
    }

    function rz_debug() {
        $trace = debug_backtrace();
        $rootPath = dirname(dirname(__FILE__));
        $file = str_replace($rootPath, '', $trace[0]['file']);
        $line = $trace[0]['line'];
        $var = $trace[0]['args'][0];
        $lineInfo = sprintf('<div><strong>%s</strong> (line <strong>%s</strong>)</div>', $file, $line);
        $debugInfo = sprintf('<pre>%s</pre>', print_r($var, true));
        print_r($lineInfo.$debugInfo);
    }
    public function custom_response($arr_reponse){
    	if(isset($arr_reponse['status']) && $arr_reponse['status']){
    		$this->set_response($arr_reponse, REST_Controller::HTTP_OK);
    	}else{ 
    		 $this->set_response($arr_reponse, REST_Controller::HTTP_OK);
    	}
    }

    public function get_list_action(){
        $list_action = array(
            'user/user',
            'user/user_group',
            'user/login',
            'user/logout',
            'user/forgotten',
            'user/reset',         
            'dashboard/index'
        );
        return $list_action;
    }
    public function get_all_api(){
        $api = array(
            'user/user_ss'          =>['api'=>'user/user_ss','deny_guest'=>0,'deny_user'=>0],
            'login/login'           =>['api'=>'login/login','deny_guest'=>0,'deny_user'=>1],
            'login/logout'          =>['api'=>'login/logout','deny_guest'=>1,'deny_user'=>0],
            'user/user_list'        =>['api'=>'user/user_list','deny_guest'=>1,'deny_user'=>0],
            'user/user_group'       =>['api'=>'user/user_group','deny_guest'=>1,'deny_user'=>0],
            'user/user_detail'      =>['api'=>'user/user_detail','deny_guest'=>1,'deny_user'=>0],
            'user/user_edit'        =>['api'=>'user/user_edit','deny_guest'=>1,'deny_user'=>0],
            'user/user_delete'      =>['api'=>'user/user_delete','deny_guest'=>1,'deny_user'=>0],
            'user_group/permissions'=>['api'=>'user_group/permissions','deny_guest'=>1,'deny_user'=>0],
            'user_group/save'       =>['api'=>'user_group/save','deny_guest'=>1,'deny_user'=>0],
            'user_group/detail'     =>['api'=>'user_group/detail','deny_guest'=>1,'deny_user'=>0],
            'user_group/edit'       =>['api'=>'user_group/edit','deny_guest'=>1,'deny_user'=>0],
            'user_group/delete'     =>['api'=>'user_group/delete','deny_guest'=>1,'deny_user'=>0],

        );
        return $api;
    }

    public function array_matches($a,$b)
    {
        if ($a===$b){
            return 0;
        }
        return ($a>$b)?1:-1;
    }
}
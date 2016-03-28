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
	function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function custom_response($arr_reponse){
    	if(isset($arr_reponse['status']) && $arr_reponse['status']){
    		$this->set_response($arr_reponse, REST_Controller::HTTP_OK);
    	}else{
    		 $this->set_response($arr_reponse, REST_Controller::HTTP_NO_CONTENT);
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
}
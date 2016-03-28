<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/Base_controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @category        Controller
 * @author          Rain
 */
class User_group extends Base_controller {

	
	public function permissions_get(){
		$list_action = $this->get_list_action();
		$response = array('status' => true,'rows' => $list_action);
		$this->custom_response($response);
	}
}
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'/models/Starter_model.php';

class User_Group_Model extends Starter_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->_tb_name="user_group";
    }
    
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Pages
 *
 * @author Rain
 */
require APPPATH . '/libraries/BaseUI_controller.php';
class Pages extends BaseUI_controller{
  public function __construct() {
    parent::__construct();
    //$this->load->database();
    $this->load->model('post/post_model');
    $this->load->library(array('ui/page_lib','CI_Smarty') );
    
  }
  public function index()
  {
  	//$this->rz_debug($this->page_lib->get_main_menu());die;
  	//$this->page_info['page_meta']=$this->page_lib->get_main_menu();
    //$this->load->view('index');
  	$this->ci_smarty->assign('description', 'Test Description');
    $this->ci_smarty->display( APPPATH.'views\index.tpl' );
  }
   
}

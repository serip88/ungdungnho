<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Pages
 *
 * @author Rain: serip88@gmail.com
 */
require APPPATH . '/libraries/BaseUI_controller.php';
class Pages extends BaseUI_controller{
  public function __construct() {
    parent::__construct();
    //$this->load->database();
    $this->load->model('post/post_model');
    $this->load->library(array('ui/page_lib','CI_Smarty'));
    
  }
  public function index()
  { 
  	//$this->rz_debug($this->page_lib->get_main_menu());die;
  	$this->page_info['main_menu']=$this->page_lib->get_main_menu();
    //$this->load->view('index');
  	$this->ci_smarty->assign('page_info', $this->page_info);
    $this->ci_smarty->display( APPPATH.'views\client\index.tpl' );
  }
  public function change()
  { 
    //$this->rz_debug($this->page_lib->get_main_menu());die;
    $this->page_info['main_menu']=$this->page_lib->get_main_menu();
    //$this->load->view('index');
    $this->ci_smarty->assign('page_info', $this->page_info);
    $this->ci_smarty->display( APPPATH.'views\client\tpl2\index.tpl' );
  }
  public function home()
  { 
    //$this->rz_debug($this->page_lib->get_main_menu());die;
    $this->page_info['main_menu']=$this->page_lib->get_main_menu();
    //$this->load->view('index');
    $this->ci_smarty->assign('page_info', $this->page_info);
    $this->ci_smarty->display( APPPATH.'views\client\index-1.tpl' );
  }
  public function test()
  { 
    //$this->rz_debug($this->page_lib->get_main_menu());die;
    $this->page_info['main_menu']=$this->page_lib->get_main_menu();
    $this->load->view('index-1');
  }
  public function category()
  { 
    $this->page_info['main_menu']=$this->page_lib->get_main_menu();
    $this->ci_smarty->assign('page_info', $this->page_info);
    $this->ci_smarty->display( APPPATH.'views\client\category.tpl' );
  }
   
}

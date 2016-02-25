<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of AdminController
 *
 * @author Rain
 */
class Admin extends CI_Controller {
	public function __construct()
  {
      parent::__construct();
      $this->load->helper('url');
  }
  public function index(){
    //$this->load->view('tpl/header',$data);
    //$this->load->view('admin/login_page');
    $this->load->view('admin/template_1st.php');
    //$this->load->view('tpl/footer',$data);
  }
  public function dashboard(){
    //$this->load->view('admin/header',$data);
    //$this->load->view('tpl/sidebar');
    $this->load->view('admin/template_1st.php');
    //$this->load->view('tpl/footer',$data);
  }

}

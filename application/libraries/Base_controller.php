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
    private $dir_path_user="";
    protected $CI = '';
	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->library('user_lib');
        $this->is_login();
        $this->htaccess_emulator();
        $this->dir_path_user='./app/images/user';
        
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
            'user/user_save'        =>['api'=>'user/user_save','deny_guest'=>1,'deny_user'=>0],
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
            'category/save'         =>['api'=>'category/save','deny_guest'=>1,'deny_user'=>0],
            'category/edit'         =>['api'=>'category/edit','deny_guest'=>1,'deny_user'=>0],
            'category/category_list'=>['api'=>'category/category_list','deny_guest'=>1,'deny_user'=>0],
            'category/delete'       =>['api'=>'category/delete','deny_guest'=>1,'deny_user'=>0],

            'product/save'          =>['api'=>'product/save','deny_guest'=>1,'deny_user'=>0],
            'product/edit'          =>['api'=>'product/edit','deny_guest'=>1,'deny_user'=>0],
            'product/delete'        =>['api'=>'product/delete','deny_guest'=>1,'deny_user'=>0],
            'product/product_list'  =>['api'=>'product/product_list','deny_guest'=>1,'deny_user'=>0],

            'upload/upload_img_user'=>['api'=>'upload/upload_img_user','deny_guest'=>1,'deny_user'=>0],

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
    public function get_user_session(){  
      if(isset($_SESSION['user_data']) && $_SESSION['user_data']){
        return $_SESSION['user_data'];
      }else{
        return '';
      }   
    }
    public function get_option_key($option_key){
        $this->load->model(array('option/Option_Model'));
        $select = array();
        $where = array('where_in'=>array('key'=>'name','value'=>array()));
        $where['where_in']['value']=$option_key;
        $filter = array('type'=>'rows','limit'=>0);
        $options = $this->Option_Model->get_dt($select,$where,$filter);    
        $option_format = array();
        if(count($option_key) == count($options) && $options){
            foreach ($options as $key => $value) {
                $option_format[$value['name']]=$value['value'];
            }
        }
        return $option_format;
    }
    
    public function init_user_category($user_id,$option){
        $this->load->library('model_option_user_lib','option_lib');
        $msg = '';
        $stt = true;
        $stt_user_group = false;
        $stt_current_group = false;
        try {
            //check if folder dir_path_user is empty set default current_group (this is the fist time when init new website)
            $num_file = $this->count_files_in_folder($this->dir_path_user);
            if($num_file==0){
                $option['current_group'] =1;
                $this->update_option_folder(1,$option);
            }
            //check current_group is over max_in_a_group (update current_group, max_in_a_group)
            list($option,$stt_option)  = $this->check_update_current_folder($num_file,$option,'all');
            if($stt_option)
                $this->update_option_folder($stt_option,$option);
            //check current_group is available if not create
            if (!file_exists($this->dir_path_user.'/'.$option['current_group'])) {
                $stt_current_group = mkdir($this->dir_path_user.'/'.$option['current_group'], 0777);
                
            }else{
                $stt_current_group = true;
            }
            // check user_category if not create by id
            if ($stt_current_group && !file_exists($this->dir_path_user.'/'.$option['current_group'].'/'.$user_id)) {
                $num_file_current_folder = $this->count_files_in_folder($this->dir_path_user.'/'.$option['current_group']);
                list($option,$stt_option_folder)  = $this->check_update_current_folder($num_file_current_folder,$option,'all');
                if($stt_option_folder)
                    $this->update_option_folder($stt_option_folder,$option);
                $stt_user_group = mkdir($this->dir_path_user.'/'.$option['current_group'].'/'.$user_id, 0777);
                
            }else{
                $stt_user_group = true;
            }
            //check if user have no option insert it
            if($stt_user_group){
                $have_option = $this->check_option_user($user_id);
                $stt_current_folder_of_user = false;
                if(!$have_option){
                    $stt_current_folder_of_user = mkdir($this->dir_path_user.'/'.$option['current_group'].'/'.$user_id.'/1', 0777);
                }
                if($stt_current_folder_of_user){
                    $this->CI->db->trans_start();
                    $this->model_option_user_lib->insert_option_user($user_id,$option['current_group']);
                    $this->CI->db->trans_complete();
                    $stt_option_user = $this->db->trans_status();
                    if(!$stt_option_user){
                        throw new Exception("Have problem when insert_option_user id: $user_id");
                    }
                }
            }
        } catch (Exception $e) {
            $msg = $e->getMessage();
            $stt = false;
        }
        return array('stt'=>$stt,'msg'=>$msg);
    }
    //current_group, max_in_a_group
    function update_option_folder($stt,$option){
        $this->load->library('option_lib');
        if($stt){
            $data = array('value'=>$option['current_group']);
            $this->option_lib->update_option_folder('current_group',$data);
            if($stt==2){
                $data = array('value'=>$option['max_in_a_group']);
                $this->option_lib->update_option_folder('max_in_a_group',$data);
            }
        }
    }
    //$return = option|stt|all
    function check_update_current_folder($num_file,$option,$return){
        $stt = 0;
        if($num_file>=$option['max_in_a_group']){
            $option['current_group'] = intval($option['current_group']) + 1;
            $stt=1;
            if($option['current_group'] > $option['max_group']){
                $option['current_group'] = 1;
                $option['max_in_a_group']=intval($option['max_in_a_group'])+intval($option['group_full_add_more']);
                $stt=2;
            }
            if (!file_exists($this->dir_path_user.'/'.$option['current_group']))
                mkdir($this->dir_path_user.'/'.$option['current_group'], 0777);
        }
        if($return == 'stt'){
            return $stt;
        }elseif ($return == 'option') {
            return $option;
        }else{
            //plz not change order of parameters
            return array($option,$stt) ;
        }
    }
    //check user have option folder?
    function check_option_user($user_id){
        $this->load->model(array('user/Option_User_Model'));
        $select = array();
        $where = array('where'=> array());
        $where['where'] = array('user_id'=>$user_id);
        $limit = array('type'=>'int','limit'=>1);
        $have_option = $this->Option_User_Model->get_dt($select,$where,$limit);    
        return $have_option;
    }
    //count files in group current
    function count_files_in_folder($path){
        $fi = new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS);
        return iterator_count($fi);
    }
    public function check_create_user_detail_cate($user_id){
        $option_key = array('max_in_a_group','max_group','current_group','group_full_add_more');
        $option = $this->get_option_key($option_key);

    }
   
}
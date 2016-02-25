<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Starter_model extends CI_Model
{
    private $_tb_name = '';
           
    public function __construct()
    {
        parent::__construct();        
    }

    public function insert_data($data){
     	$this->db->insert($this->_tb_name,$data);
     	return $this->db->insert_id();
   }
   
   public function get_data($select,$where,$limit="",$nStart=0,$order_by=""){
        $result = array();
        $this->db->select($select);
        $this->db->from($this->_tb_name);
        $this->db->where($where);
        if($limit)
          $this->db->limit($limit, $nStart);
        if($order_by)
          $this->db->order_by($order_by);
        $query = $this->db->get();
        if ($query && $query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
        }
        return $result;
    }
    //tb_join array('table_name'=>'ec_signup as B','condition'=>'cn=0 ,id=10', 'type'=>'left');
    public function get_data_join($select,$where,$tb_join = array() ,$limit="",$nStart=0,$order_by=""){
        $result = array();
        $this->db->select($select);
        $this->db->from($this->_tb_name . " as A");
        foreach ($tb_join as $key => $value) {
          $this->db->join($value['table_name'], $value['condition'], $value['type']);
        }
        $this->db->where($where);
        if($limit)
          $this->db->limit($limit, $nStart);
        if($order_by)
          $this->db->order_by($order_by);
        $query = $this->db->get();
        if ($query && $query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
        }
        return $result;
    }
    public function update_data($data = array(), $where) {
        if (count($data)) {
          foreach ($data as $key => $value) {
            $this->db->set($key, $value);
          }
        }
        $this->db->where($where);
        return $this->db->update($this->_tb_name);
    }
    public function get_total($where)
    {
        $this->db->where($where);
        return $this->db->count_all_results($this->_tb_name);  
    }
     public function delete_data($where) {
        $this->db->where($where);
        $this->db->delete($this->_tb_name);
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}


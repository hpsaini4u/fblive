<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_user extends CI_Model{
	
    function __construct() {
        $this->tableName = 'live_users';
        $this->primaryKey = 'id';
    }
	
    public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
            $userID = $prevResult['id'];
        }else{
			$data['email'] = ($data['email'])?$data['email']:'email not found';
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }
	
	public function get_plan()
	  {
		  $this->db->select("*");
		  $this->db->from("live_plan_type");
		  $planType=$this->db->get();
		  return $planType->result_array();
	  }
	  
	  public function post_payment()
	  {
		$return['status'] = 'true';
		$this->db->query("SET FOREIGN_KEY_CHECKS = 0");
		$query = $this->db->insert('live_payments', $data);
	  }
}
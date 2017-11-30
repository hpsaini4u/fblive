<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_admin extends CI_Model
{
	/*function __construct() {

        parent::__construct();
		$this->load->library('session');
    	$this->load->helper('url');
    } */
	
	
	
	/*public function add_brand($data)
	{
		$return['status'] = 'true';
		$this->db->query("SET FOREIGN_KEY_CHECKS = 0");
		$query = $this->db->insert('front_product_brand', $data);
		//echo $this->db->last_query(); die();
	}
	*/
	
	
	/*** User Start***/
	
	public function add_user_role($data){
		
		$query = $this->db->insert('user_role_assign', $data);
		$insert_id = $this->db->insert_id();
        return  $insert_id;
	}
	
	/*** User End***/
	
	public function userLogin($data)
	{
	
		$email=$data['email'];
		$pass=md5($data['password']);
		$private=$data['private_web_address'];
		
		$this->db->select('*');
		$this->db->from('front_admin_users');
		$this->db->where('email',$email);
		$this->db->where('password',$pass);
		$this->db->where('private_web_address',$private);
		$result = $this->db->get();		
		
		//echo $this->db->last_query(); die();
		
		if($result->num_rows()>0)
		{
			return $result->row_array();	
			//echo "true";
		}
		else
		{
			return false;
			//echo "false";
		}
	}
	
	

}

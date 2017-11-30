<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_welcome extends CI_Model
{
	/*function __construct() {

        parent::__construct();
		$this->load->library('session');
    	$this->load->helper('url');
    } */
	
	
	public function admin_register($data)
	{
		
		$return['status'] = 'true';
		$this->db->query("SET FOREIGN_KEY_CHECKS = 0");
		$query = $this->db->insert('front_admin_users', $data);
		//echo $this->db->last_query(); die();
         //$insert_id = $this->db->insert_id();
		 //return  $insert_id;
		
	}
	public function add_user_role($data){
		
		$query = $this->db->insert('user_role_assign', $data);
		$insert_id = $this->db->insert_id();

          return  $insert_id;
		
		
	}
	
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
			 $data = $result->row_array();	
			 $data['status'] = 'true';
			//echo "true";
			//return true;
			return $data;
		}
		else
		{
			$data['status'] = 'false';
			return $data;
			//echo "false";
		}
	}
	
	
	public function countries_list()
	{
		$this->db->select("*");
		$this->db->from('countries');
		$cat=$this->db->get();
		return $cat->result_array();
	}
	
	
	
	public function confirmEmail($data)
	{
		$email_id = $data['user_id'];
		//unset($data['user_id']);
		$is_verified = $data['is_verified'];
		//$this->db->query("SET FOREIGN_KEY_CHECKS = 0");
		$this->db->where('email', $email_id);
		$this->db->update('register', $data);    
		if ($this->db->affected_rows() > 0) {
            return 'true';
        } else {
            return 'false';
        }
	}
	
	  public function get_category()
	  {
		  $this->db->select("*");
		  $this->db->from("categories");
		  $category=$this->db->get();
		  return $category->result_array();
		  
	  }
	    
	 public function get_categories()
		{
				$this->db->select("*");
				$this->db->from('categories');
				$categories=$this->db->get();
				return $categories->result_array();

			}
			

}

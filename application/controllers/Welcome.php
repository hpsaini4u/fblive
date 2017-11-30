<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
    	$this->load->helper('url');
		$this->load->library('facebook');
		//$this->lang->load('message','english');
		//$this->load->model("m_welcome");
    }
	
	public function index()
	{
		error_reporting(0);
		$this->load->view('user/include/header');
		$this->load->view('user/index');
		$this->load->view('user/include/footer');
	}
	
	public function schedule_mail()
	{
	
		$data = $_POST;
		//print_r($data);	
		//die;
		
		/* if($this->facebook->is_authenticated()){ */
			 
            // Get user facebook profile details
  /*           $userProfile = $this->facebook->request('get', '/me?fields=id');
         
			$user = $userProfile['id'];
			$sendNotif = $this->facebook->request('post','/' .$user . '/notifications', array('href' => 'broadcast', 'template' => 'click here for more information!'),  '115849155760622'.'|'.'605007a8abbe80dff0593afe69514736'); */
			//print_r($sendNotif);
			//die;
		
		/* 	$sendPost = $this->facebook->request('post','/' .$user . '/feed', array('href' => 'broadcast', 'template' => 'click here for more information!'),  '115849155760622'.'|'.'605007a8abbe80dff0593afe69514736'); */
		
			//print_r($sendPost);
			//die;
		
			$message = '<table><tr><td><h3>Thanks for creating a Talk Show broadcast with Live stream!</h3><br/></td></tr>';
			$message .= '<tr><td><h3>Your broadcast is available <a href="' .$data['broadcast_url'] .'" target="_blank">click here</a></h3><br/></td></tr>';
			$message .= '<tr><td><h3>Check out<a href="https://www.facebook.com" > the tutorials playlist on our page</a> if you have any questions.</h3><br/></td></tr>';
			$message .= '<tr><td><h3>We are here to help and answer any further questions you may have, just hit reply!</h3><br/></td></tr>';
			$message .= '<tr><td><h3>Have a great broadcast!<h3/><br/></td></tr></table>';
			
			$this->load->library('email');
			$this->email->set_mailtype("html");
			$this->email->from('depinder.humrobo@gmail.com');
			$this->email->to($data['broadcast_email']);

			$this->email->subject('Live Stream - Email Confirmation');
			$this->email->message($message);

			$email = $this->email->send(); 
		if($email =='1')
		{
			echo "true";
		}
		else
		{ echo "false"; }
		/* if($this->facebook->is_authenticated($data['broadcast_email'])){
			 
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id');

         
			echo $user = $userProfile['id'];die;
			$sendNotif = $this->facebook->request('post','/' .$user . '/notifications', array('href' => 'broadcast', 'template' => 'click here for more information!'),  '115849155760622'.'|'.'605007a8abbe80dff0593afe69514736');
			print_r($sendNotif);
			die;
           
        
		   
		}*/
			
	}
	
	/*public function notification()
	{

	$uid = $this->session->userdata('userData');
		$user = $uid['oauth_uid'];
	$access_token =  $this->facebook->is_authenticated();	
	$sendNotif = $this->facebook->request('post','/' .$user . '/notifications', array('href' => 'broadcast', 'template' => 'click here for more information!'),  '115849155760622'.'|'.'605007a8abbe80dff0593afe69514736');
	print_r($sendNotif);
	die;
	
	}
	public function login(){
		$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));
		$user = $this->facebook->getUser();
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }
		
        if ($user) {
            $data['logout_url'] = site_url('welcome/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('welcome/login'), 
                'scope' => array("email") // permissions here
            ));
        }
		
		redirect($data['login_url']);
		//$this->load->view('user/include/header',$data);
        //$this->load->view('login',$data);
	}
    public function logout(){
        $this->load->library('facebook');
        // Logs off session from website
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('userData');
		$this->session->sess_destroy();
        // Make sure you destory website session as well.
        redirect('/');
    }*/
    
}

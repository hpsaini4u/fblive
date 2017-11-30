<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

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
		$this->load->model("M_user");
    }
	
	public function index()
	{
		$data['getPlan'] = $this->M_user->get_plan();
		//echo "<pre>"; print_r($getPlan);

		$this->load->view('user/include/header');
		$this->load->view('user/packages',$data);
		$this->load->view('user/include/footer');
	}
	
	public function success()
	{
		//print_r($_POST)."<pre>";
		//print_r($_REQUEST['ipn']);
		//$data['getPlan'] = $this->M_user->post_payment();
		
		
		
		$this->load->view('user/include/header');
		$this->load->view('user/success');
		$this->load->view('user/include/footer');
	}
	
	public function notification()
	{

	$uid = $this->session->userdata('userData');
	$user = $uid['oauth_uid'];
		
	//$sendPost = $this->facebook->request('post','/' .$user . '/notifications', array('href' => 'broadcast', 'template' => 'click here for more information!'),  '115849155760622'.'|'.'605007a8abbe80dff0593afe69514736');
	
	$sendPost = $this->facebook->request('post','/' .$user . '/feed', array('href' => 'broadcast', 'template' => 'click here for more information!'),  '115849155760622'.'|'.'605007a8abbe80dff0593afe69514736');
	
//$sendPost = $this->facebook->request('post','/' .$user . '/pages', array('href' => 'broadcast', 'template' => 'click here for more information!'),  '115849155760622'.'|'.'605007a8abbe80dff0593afe69514736');
	
	//$SENDPOST ="https://www.facebook.com/dialog/feed?app_id=145634995501895&display=popup&amp;caption=An%20example%20caption  &link=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F&redirect_uri=https://developers.facebook.com/tools/explorer";
	
	print_r($sendPost);
	die;
	
	}
}

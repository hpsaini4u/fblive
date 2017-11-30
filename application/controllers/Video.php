<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends CI_Controller
{
    function __construct() {
        parent::__construct();
		
		$this->load->library('session');
    	$this->load->helper('url');
        // Load facebook library
        $this->load->library('facebook');

        //Load user model
        $this->load->model('M_user');
    }

    public function index(){
        $userData = array();
        // Check if user is logged in
        if($this->facebook->is_authenticated()){
			 
           	   $userProfile = $this->facebook->request('get', '/me?fields=id');
         
			$user = $userProfile['id'];
		 $createLiveVideo = $this->facebook->request('post','/' .$user . '/live_videos', ['title' => 'new video', 'description' => 'descrip of the video'],  '115849155760622'.'|'.'605007a8abbe80dff0593afe69514736');
		 
			//$createLiveVideo = $createLiveVideo->getGraphNode()->asArray();
			print_r($createLiveVideo);
	
        }else{
            $fbuser = '';

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }
	
/*print_r($data);
die;*/
        // Load login & profile view
		/* $this->load->view('user/include/header');
        $this->load->view('user_authentication/index',$data);
		$this->load->view('user/include/footer'); */
    }

    public function logout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('userData');
		$this->session->sess_destroy();
        // Redirect to login page
        redirect('/');
    }
}
?>
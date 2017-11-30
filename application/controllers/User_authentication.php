<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Authentication extends CI_Controller
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
			 
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];

            // Insert or update user data
             $userID = $this->M_user->checkUser($userData);
			$userData['logoutUrl'] = $this->facebook->logout_url();
            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else{
				//echo "here2";
               $data['userData'] = array();
            }
			// Get logout URL
            $data['logoutUrl'] = $this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }
		
/*print_r($data);
die;*/
        // Load login & profile view
		$this->load->view('user/include/header');
        $this->load->view('user_authentication/index',$data);
		$this->load->view('user/include/footer');
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
	public function solo()
	{
		$this->load->view('user/include/header');
        $this->load->view('user_authentication/solo');
		$this->load->view('user/include/footer');
	}
}
?>
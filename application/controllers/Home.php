<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $from_email;
	private $from_name;
	
	function __construct()
	{	
		parent::__construct();	
		
		$this->from_email=$this->config->item('admin_email');
		$this->from_name=$this->config->item('admin_name');
		
		$this->load->library(array('form_validation','session','pagination','encrypt'));
		$this->load->helper(array('url','cookie'));
		$this->load->model(array('user_model','pages_model'));
	}
	
	private function get_basic_data($data)
	{
		$main_data = $data;
		$main_data['top_head'] = $this->load->view('top_head',$data,true);
		$main_data['menu'] = $this->load->view('menu',$data,true);
		$main_data['footer'] = $this->load->view('footer',$data,true);
		
		return $main_data;
	}
	private function pr($data)
	{
		echo "<pre>";print_r($data);die;
	}
	
	
	public function index()
	{
		$data['active']="home";
		$data['title']="Home";	
		
		$data = $this->get_basic_data($data);		
		
		$data['about'] = $this->pages_model->get_page_by_title('About Us');	
		
		$data['testimonials'] = $this->pages_model->get_all_testimonials();
		
		$this->load->view('home',$data);
	}
	public function login()
	{		
		if($this->session->userdata('logged_in') == true)
		{
			redirect(base_url().'myprofile');
		}
		
		$data = array();
		$data['title']="Login";
		$data['active']="login";
		$data['class']="login-page-new innerpage";
		$this->form_validation->set_rules('email','email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password','password', 'trim|required');
		if($this->form_validation->run() == TRUE)
		{
			$result = $this->user_model->login_user();
			$this->_Redirectuser($result);
		}
		$cookies_data = get_cookie('rememberme');
		if(!empty($cookies_data))
		{
			$cookies = $this->encrypt->decode($cookies_data);
			$user_data=explode('-',$cookies);
			$user_id=$user_data[1];
			$result = $this->user_model->check_token($user_id,$cookies_data);
			$this->_Redirectuser($result);
		}
		
		
		$data = $this->get_basic_data($data);
		$data['body'] = $this->load->view('login','',TRUE);					
		$this->load->view('template',$data);
	}
	
	public function signup()
	{
		if($this->session->userdata('logged_in') == true)
		{
			redirect(base_url().'myprofile');
		}
		
		$data['title']="Signup";
		$data['active']="signup";
		$data['class']="login-page-new innerpage";
		$data['body']="Signup Page";
		$this->form_validation->set_rules('email','email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password','password', 'trim|required');
		if($this->form_validation->run() == TRUE)
		{
			if($this->user_model->signup_user())
			{
				$this->session->set_flashdata('success',"User Registered successfully. Please check your email.");
				redirect(base_url().'login');	
			}
			else
			{	
				$this->session->set_flashdata('fail',"Some error occured while registeration. Please try again.");
				redirect(base_url().'signup');	
			}		
		}
		
		$data = $this->get_basic_data($data);
		$data['body'] = $this->load->view('registration','',TRUE);
		
		$this->load->view('template',$data);
	}
	
	private function _Redirectuser($reponse)
	{
	
		if($reponse['status']=='success')
		{
			$result = $reponse['user_data'];
			$rem=$this->input->post('rememberme');
			if($rem == 'on')
			{
				$remember_token = $this->encrypt->encode($result['email'] . '-' . $result['user_id']);
				$cookie = array(
					'name' => 'rememberme',
					'value' => $remember_token,
					'expire' => 1209600
				);
				set_cookie($cookie);
				$this->user_model->save_token($result['user_id'],$remember_token);
			}
			if($result['status'] == 0)
			{
				$this->session->set_flashdata('fail', 'Your account not active.');
				redirect(base_url().'login');
			}			
			else
			{
				$sess_data=array(
				'logged_in'=>TRUE,
				'user_id'=>$result['user_id'],
				'user_data'=>$result
				);
				
				$this->session->set_userdata($sess_data);
				$this->session->set_flashdata('success', 'Logged in Successfully.');
				
				$last_url = $this->session->userdata('last_url');
				if(isset($last_url) && !empty($last_url))
				{
					redirect($last_url);
				}
				else
				{
					redirect(base_url().'myprofile');
				}
			}
		}
		else{
			$this->session->set_flashdata('fail', 'Invalid email or password. Please try again.');
			redirect(base_url().'login');
		}
	}
	
	public function check_email()
	{
		if($this->user_model->check_mail_exists()==true)
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}
		
	}
	public function check_email_forgot_password()
	{
		if($this->user_model->check_mail_exists()==false)
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}
		
	}
	
	public function check_sub_email()
	{
		if($this->user_model->check_sub_mail_exists())
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}
		
	}
	
	public function verify()
	{
		
		$main_data = $this->uri->segment(2); 
		if(empty($main_data))
		{
			redirect(base_url().'login');
		}
		else
		{
			$b_code = base64_decode($main_data);
			$data=explode('&',$b_code);
			$result = $this->user_model->verify_user($data[0],$data[1]);
			if($result == 1)
			{
				$this->session->set_flashdata('success','your account verified successfully');
				redirect(base_url().'login');
				exit;
			}
			else
			{
				 $this->session->set_flashdata('fail','your account not verified');
				 redirect(base_url().'login');
				 exit;
			}	
		}
	}
	
	// user logout from application

	public function logout(){
		
		$this->session->set_userdata('logged_in',FALSE);
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_data');
				
		//$this->session->sess_destroy();
		if (isset($_COOKIE)) {
			delete_cookie('rememberme');
		}
		$this->session->set_flashdata('success',"Logout successfully.");
		redirect(base_url().'login');
				exit;
	}
	public function forgot_password()
	{
		$data['title']="Forgot password";
		$data['class']="login-page-new innerpage";
		$this->form_validation->set_rules('email','Email', 'trim|required');
		if ($this->form_validation->run() == true)
		{
			if($this->user_model->forgotPassword()==true)
			{
				$this->session->set_flashdata('success',"Check your email - we sent you an email with a link to change your password.");
				redirect(base_url().'forgot_password');
				exit;
			}
			else
			{
				$this->session->set_flashdata('fail',"Email not exists.");
				redirect(base_url().'forgot_password');
				exit;
			}
		}
		
		$data = $this->get_basic_data($data);
		$data['body'] = $this->load->view('forgot_password','',TRUE);		
		$this->load->view('template',$data);
	}
	public function reset_password()
	{
		$main_data = $this->uri->segment(2);
		if(empty($main_data))
		{
			redirect(base_url().'login');
		}
		$b_code = base64_decode($main_data);
		$data=explode('&',$b_code);
		if(count($data) != 2)
		{
				$this->session->set_flashdata('fail',"Invalid email or verification code.");	
				redirect(base_url().'login');	
		}
		$email=$data[0];
		$code=$data[1];
		$this->form_validation->set_rules('password','password', 'trim|required');
		if($this->form_validation->run() == true)
		{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
								
				if($this->user_model->reset_password($email,$code)){
					$this->session->set_flashdata('success',"Password updated successfully.");
					redirect(base_url().'login');
				}
				else{
					$this->session->set_flashdata('fail',"Invalid email or verification code.");	
					redirect(base_url().'login');			
				}
			}
			else {
					$this->session->set_flashdata('fail',"Invalid email or verification code.");	
					redirect(base_url().'login');			
				}
		}
		$data['title']="Reset password";
		$data['class']="login-page-new innerpage";
		
		$data = $this->get_basic_data($data);
		$data['body'] = $this->load->view('reset_password','',TRUE);
		$this->load->view('template',$data);
	}
	
	public function send_question()
	{
		$name = $this->input->post('name');
		if(isset($name))
		{
			$name = ucwords($name);
			$email = $this->input->post("email");
			$question = $this->input->post("question");			
			
			$message =
			'<p>You have received a new message. Sender details are below:</p>
			<p>Name: '.$name.'</p>
			<p>Email: '.$email.'</p>
			<p>Message: '.$question.'</p>
			<p>Kind Regards</p>
			<p>	The Car2udirect Team</p>';		
			
			$from_email = $to_email = $this->from_email;
			$from_name = $this->from_name;
			$subject = 'Question from user';
			
			if($this->user_model->send_email($from_email,$from_name,$to_email,$subject,$message)) {
				echo '1';
			}
			else
			{
				echo '0';
			}
			
		}
		else
		{	
			redirect(base_url());
		}
		
	}
	
	public function subscribe()
	{
		$email = $this->input->post('email');
		if(isset($email))
		{	
			if($this->user_model->subscribe($email)) {
				echo '1';
			}
			else
			{
				echo '0';
			}
			
		}
		else
		{	
			redirect(base_url());
		}
		
	}
	
	public function faq()
	{
		$data['title'] = "Frequently Asked Questions ";
		$data['active']="faq";				
		$data = $this->get_basic_data($data);
		
		if($this->session->userdata('logged_in') == true)
		{
			$user_id = $this->session->userdata('user_id');
			$data['user_data'] = $this->user_model->get_user_byId($user_id);
		}
		
		$data['faq_data'] = $this->pages_model->get_faq();
		$data['body'] = $this->load->view('faq',$data,TRUE);		
		$this->load->view('sell-template',$data);
	}
	
	function about()
	{
		$data['title'] = "About";
		$data['active']="about";				
		
		$data = $this->get_basic_data($data);
		if($this->session->userdata('logged_in') == true)
		{
			$user_id = $this->session->userdata('user_id');
			$data['user_data'] = $this->user_model->get_user_byId($user_id);
		}
		$data['about'] = $this->pages_model->get_page_by_title('About Us');
		$data['body'] = $this->load->view('about',$data,TRUE);		
		$this->load->view('sell-template',$data);
	}
	
	function terms()
	{
		$data['title'] = "Terms";
		$data['active']="terms";				
		
		$data = $this->get_basic_data($data);
		if($this->session->userdata('logged_in') == true)
		{
			$user_id = $this->session->userdata('user_id');
			$data['user_data'] = $this->user_model->get_user_byId($user_id);
		}
		$data['terms'] = $this->pages_model->get_page_by_title('terms');
		$data['body'] = $this->load->view('terms',$data,TRUE);		
		$this->load->view('sell-template',$data);
	}
	
	function privacy()
	{
		$data['title'] = "Privacy";
		$data['active']="privacy";				
		
		$data = $this->get_basic_data($data);
		if($this->session->userdata('logged_in') == true)
		{
			$user_id = $this->session->userdata('user_id');
			$data['user_data'] = $this->user_model->get_user_byId($user_id);
		}
		$data['privacy'] = $this->pages_model->get_page_by_title('Privacy');
		$data['body'] = $this->load->view('privacy',$data,TRUE);		
		$this->load->view('sell-template',$data);
	}
	
}

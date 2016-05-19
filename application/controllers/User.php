<?php 
class User extends CI_Controller
{
	private $user_id;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->library(array('form_validation','pagination','session'));		
		if($this->session->userdata('logged_in') != true)
		{
			redirect(base_url().'login');
		}
		$this->user_id = $this->session->userdata('user_id');
		
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
	
	function index()
	{
		$this->myprofile();
	}
	function myprofile()
	{
		$data = array();
		$data['active']='my_profile';
		$data['user_data'] = $this->user_model->get_user_byId($this->user_id);
		$data['title']="My Profile";
		
		$data = $this->get_basic_data($data);	
		$data['sidebar']=$this->load->view('sidebar',$data,true);
		$data['body'] = $this->load->view('myprofile',$data,true);
		$this->load->view('inner-template',$data);
		
	}
	function edit_profile()
	{
		$data = array();
		$data['active']='edit_profile';		
		$data['title']="Edit profile";
		$data['user_data'] = $this->user_model->get_user_byId($this->user_id);
		$this->form_validation->set_rules('first_name','first_name','trim|required');
		if($this->form_validation->run()==true)
		{
			if($this->user_model->updateUser($this->user_id))
			{
				$this->session->set_flashdata('success',"User information updated Successfully");
				redirect(base_url().'user');
				exit;
			}
			else
			{
				$this->session->set_flashdata('fail',"Fail to update user information");
				redirect(base_url().'user/edit_profile');
				exit;
			}	
		}
		$data['countries']=$this->user_model->get_country();
		
		$data = $this->get_basic_data($data);	
		$data['sidebar']=$this->load->view('sidebar',$data,true);
		$data['body'] = $this->load->view('edit_profile',$data,true);
		$this->load->view('inner-template',$data);
	}
	function change_password()
	{
		$data = array();
		$data['user_data'] = $this->user_model->get_user_byId($this->user_id);
		$data['active']='change_password';	
		$data['title']="Change Password";
		$this->form_validation->set_rules('old_password','old password','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');
		$this->form_validation->set_rules('cpassword','confirm password','trim|required');
		if($this->form_validation->run() == true)
		{
			if($this->user_model->check_old_password($this->user_id))
			{
				if($this->user_model->change_password($this->user_id))
				{
					$this->session->set_flashdata('success',"Password changed Successfully");
					redirect(base_url().'user');
					exit;
				}
				else
				{
					$this->session->set_flashdata('fail',"Fail to change passowrd");
					redirect(base_url().'user/change_password');
					exit;
				}
			}
			else
			{
				$this->session->set_flashdata('fail',"Wrong old password! Fail to change password");
				redirect(base_url().'user/change_password');
				exit;
			}	
		}
		
		$data = $this->get_basic_data($data);	
		$data['sidebar']=$this->load->view('sidebar',$data,true);
		$data['body'] = $this->load->view('change_password',$data,true);
		$this->load->view('inner-template',$data);
	}
	
	public function change_image()
	{
		$response = $this->user_model->change_profile_image($this->user_id);
		if($response !=false)
		{
			$image=base_url().'uploads/'.$response;
			echo json_encode(array('status'=>'success','image'=>$image));
		}
		else
		{
			echo json_encode(array('status'=>'fail'));
		}
	}
	
}


?>

<?php
class Admin extends CI_Controller {

	function __construct()
	{	
		parent::__construct();	
		
		$this->load->model('admin_model');
		$this->load->library(array('session','pagination','form_validation'));
		if(!$this->session->userdata('admin_logged_in'))
		{
			redirect(base_url().'cdadmin/login');
		}
	}
	
	public function index()
	{
		$this->dashboard();
	}
	
	public function dashboard()
	{
		
		$data=array();
		$data['page_title'] = 'Dashboard';
		$data['page']='Dashboard';
		$data['active']='dashboard';
		$admin_id=$this->session->userdata('admin_id'); 
		$data['admin_name']=$this->admin_model->get_admin_detail($admin_id);
		$this->load->view('cdadmin/dashboard', $data , false);
	}
	
	public function config()
	{
		
		$data['page_title'] = 'Edit Admin Details';
         $data['active']='manage_settings';      
        $admin_id=$this->session->userdata('admin_id');
        
        $data['admin_name']=$this->admin_model->get_admin_detail($admin_id);      
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admin_email','admin_email', 'trim|required');        
		if ($this->form_validation->run() == true)
		{
			if($this->admin_model->update_admin_config($admin_id)==1)
			{
				$this->session->set_flashdata('success',"Admin Details updated successfully.");
				redirect(base_url().'cdadmin/config');
				exit;
			}
			
			else
			{
				$this->session->set_flashdata('fail',"Error!, Admin Details not updated.");
				redirect(base_url().'cdadmin/config');
				exit;
			}
		}
        $data['all_config'] = $this->admin_model->getAllConfig($admin_id);
		
		//echo '<pre>';print_r($data['all_config']);die;            
       
 		$data['body'] = $this->load->view('cdadmin/admin_config', $data , true);
 		
        $this->load->view('cdadmin/template',$data);
	}
	public function changepassword()
	{
		$data=array();
		$admin_id=$this->session->userdata('admin_id');
		//$data['admin_role']=$this->admin_model->get_admin_role($admin_id);
		
		$data['admin_name']=$this->admin_model->get_admin_detail($admin_id);
		$data['page_title']='Change Password';	
		$data['page']='chg_pwd';	
		$data['active']='manage_settings';
		
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('new_pwd','new_pwd', 'trim|required');
		if ($this->form_validation->run() == true)
			{
				 if($this->admin_model->check_password($admin_id)==1)
					{
						$this->session->set_flashdata('success',"Password updated successfully.");
						redirect(base_url().'cdadmin/changepassword');
						exit;
					}
					
					else
					{
						$this->session->set_flashdata('fail',"Current password is incorrect. Please try again.");
						redirect(base_url().'cdadmin/changepassword');
						exit;
					}
			}
						
			$data['body'] = $this->load->view('cdadmin/change_pwd',$data, true);
			$this->load->view('cdadmin/template',$data);
			
	}
	
	

	public function faq()
	{
		$data = array();
		$admin_id=$this->session->userdata('admin_id');
		$data['admin_name']=$this->admin_model->get_admin_detail($admin_id);
		$data['page_title'] = 'Manage FAQ';
		$data['active']='manage_master';
		$config['base_url'] = base_url().'cdadmin/faq';
		$config['total_rows'] = count($this->admin_model->get_faq());
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		//$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE; 
		$this->pagination->initialize($config);
		if($this->uri->segment(3)!='' && $this->uri->segment(3)!=0 && is_numeric($this->uri->segment(3))){
			$page_number = $this->uri->segment(3);
		}
		else{
			$page_number = 1;
		}
		$data['pagesize'] = $config['per_page'];
		
		$offset = ($page_number-1) * $config['per_page'];
		$data['sn'] = $offset+1;
		$data['faq_data'] = $this->admin_model->get_faq($config['per_page'],$offset);
		
		$data['body'] = $this->load->view('cdadmin/faq',$data, true);
		$this->load->view('cdadmin/template',$data);
	}
	public function addFaq()
	{
		$data = array();
		$admin_id=$this->session->userdata('admin_id');
		$data['admin_name']=$this->admin_model->get_admin_detail($admin_id);
		$data['page_title'] = 'Add FAQ';
		$data['active']='manage_master';
		//echo '<pre>'; print_r($data['categories']); die; 
		//print_r($_POST); die;
		$this->form_validation->set_rules('category','Category', 'trim|required');
		$this->form_validation->set_rules('question','Question', 'trim|required');
		$this->form_validation->set_rules('answer','Answer', 'trim|required');
		if ($this->form_validation->run() == true)
		{
			if($this->admin_model->add_faq()){
				$this->session->set_flashdata('success',"Faq added successfully.");
				redirect(base_url().'cdadmin/faq');
			}
			else{
				$this->session->set_flashdata('fail',"Error!, Faq not added");
				redirect(base_url().'cdadmin/addFaq');
			}
		}
		$data['body'] = $this->load->view('cdadmin/add_faq',$data, true);
		$this->load->view('cdadmin/template',$data);
	}
	public function changeFaqStatus()
	{
		$id = $this->uri->segment(3);
		$sid = $this->uri->segment(4);
		if($id)
		{
			if($this->admin_model->changeFaqStatus($id,$sid))
			{
				$this->session->set_flashdata('success',"Faq status changed successfully.");
				redirect(base_url().'cdadmin/faq');
			}
		}
	}
	public function editFaq()
	{
		$data = array();
		$admin_id=$this->session->userdata('admin_id');
		$data['admin_name']=$this->admin_model->get_admin_detail($admin_id);
		$id = $this->uri->segment(3);
		$data['page_title'] = 'Edit FAQ';
		$data['active']='manage_master';
		$data['faq_data'] = $this->admin_model->get_faq_by_id($id);
		
		$this->form_validation->set_rules('category','Category', 'trim|required');
		$this->form_validation->set_rules('question','Question', 'trim|required');
		$this->form_validation->set_rules('answer','Answer', 'trim|required');
		if ($this->form_validation->run() == true)
		{
			if($this->admin_model->edit_faq($id)){
				$this->session->set_flashdata('success',"Faq edited successfully.");
				redirect(base_url().'cdadmin/faq');
			}
			else{
				$this->session->set_flashdata('fail',"Error!, Faq not edited");
				redirect(base_url().'cdadmin/editFaq');
			}
		}
		$data['body'] = $this->load->view('cdadmin/edit_faq',$data, true);
		$this->load->view('cdadmin/template',$data);
	}
	
	public function deletefaq()
	{
		$id = $this->uri->segment(3);
		if($id)
		{
			if($this->admin_model->deletefaq($id))
			{
				$this->session->set_flashdata('success',"Faq deleted successfully.");
				redirect(base_url().'cdadmin/faq');
				
			}
		}
	}
	public function successStories()
	{
		$data = array();
		$data['page_title'] = 'Manage Success Stories';
		$admin_id=$this->session->userdata('admin_id');
		$data['admin_name']=$this->admin_model->get_admin_detail($admin_id);
		$data['active']='manage_master';
		$config['base_url'] = base_url().'cdadmin/successStories';
		$config['total_rows'] = count($this->admin_model->get_stories());
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		//$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE; 
		$this->pagination->initialize($config);
		if($this->uri->segment(3)!='' && $this->uri->segment(3)!=0 && is_numeric($this->uri->segment(3))){
			$page_number = $this->uri->segment(3);
		}
		else{
			$page_number = 1;
		}
	
		
		$offset = ($page_number-1) * $config['per_page'];
			$data['sn'] = $offset+1;
		//echo $data['pagesize'].' '.$offset; die;
		$data['story_data'] = $this->admin_model->get_stories($config['per_page'],$offset);
		
		$data['body'] = $this->load->view('cdadmin/success_stories',$data, true);
		$this->load->view('cdadmin/template',$data);
	}
	public function addSuccessStory()
	{
		$data = array();
		$admin_id=$this->session->userdata('admin_id');
		$data['admin_name']=$this->admin_model->get_admin_detail($admin_id);
		$data['active']='manage_master';
		$data['page_title'] = 'Add Success story';
		$this->form_validation->set_rules('name','name', 'trim|required');
		$this->form_validation->set_rules('message','message', 'trim|required');
	//	$this->form_validation->set_rules('story_image','story image', 'required');
		if ($this->form_validation->run() == true)
		{
			if($this->admin_model->add_story($id)){
				$this->session->set_flashdata('success',"Success Story added successfully.");
				redirect(base_url().'cdadmin/successStories');
			}
			else{
				$this->session->set_flashdata('fail',"Error!, Success Stroy not added");
				redirect(base_url().'cdadmin/addSuccessStory');
			}
		}
		$data['body'] = $this->load->view('cdadmin/add_story',$data, true);
		$this->load->view('cdadmin/template',$data);
	}
	public function changeStoryStatus()
	{
		$id = $this->uri->segment(3);
		$sid = $this->uri->segment(4);
		if($id)
		{
			if($this->admin_model->changeStroyStatus($id,$sid))
			{
				$this->session->set_flashdata('success',"Success Story status changed successfully.");
				redirect(base_url().'cdadmin/successStories');
			}
		}
	}
	public function editSuccessStory()
	{		
		$data = array();
		$admin_id=$this->session->userdata('admin_id');
		$data['admin_name']=$this->admin_model->get_admin_detail($admin_id);
		$id = $this->uri->segment(3);
		$data['page_title'] = 'Edit Success story';
		$data['active']='manage_master';
		$data['story_data'] = $this->admin_model->getStoryDataById($id);
		//print_r($data['story_data']); die;
		$this->form_validation->set_rules('name','name', 'trim|required');
		$this->form_validation->set_rules('message','message', 'trim|required');
	//	$this->form_validation->set_rules('story_image','story image', 'required');
		if ($this->form_validation->run() == true)
		{
			if($this->admin_model->edit_story($id)){
				$this->session->set_flashdata('success',"Success Story edited successfully.");
				redirect(base_url().'cdadmin/successStories');
			}
			else{
				$this->session->set_flashdata('fail',"Error!, Success Story not edited");
				redirect(base_url().'cdadmin/addSuccessStory');
			}
		}
		$data['body'] = $this->load->view('cdadmin/edit_story',$data, true);
		$this->load->view('cdadmin/template',$data);
	}
	public function deleteSuccessStory()
	{
		$id = $this->uri->segment(3);
		if($id)
		{
			if($this->admin_model->deleteStory($id))
			{
				$this->session->set_flashdata('success',"Success story deleted successfully.");
				redirect(base_url().'cdadmin/successStories');
				
			}
		}
	}
	
	
	/**
	 * List Site users
	 * */
	function users()
	{
			$data['title'] = 'Manage users';
			$data['active'] = 'users';
			$config['per_page']  = $limit = 10;
			$data['page'] = $page = $this->uri->segment(3) && $this->uri->segment(3) != 0 ? $this->uri->segment(3) : 0;
			$data['offset'] = $offset = $page;
			$order = $data['order'] = $this->uri->segment(4,'desc');
		 	$data['search'] = $search = $this->uri->segment(5,'');
			$config['base_url'] = base_url().'cdadmin/users/';
			if($search == '' || $search == 'sort')
			{
				$data['search'] = $search = '';
				$data['sort'] = $sort = $this->uri->segment(6);
			} else {
				$data['sort'] = $sort = $this->uri->segment(7);
			}
			if (strpos($search,'_') !== false)
			{
				$search = explode('_',$search);
				if(count($search) > 0)
				{
					$search = $search[0].' '.$search[1];
				}
			}
		//	$config['postfix_string'] = '/'.$order.'/'.$search.'/sort/'.$sort;
			$config['suffix'] = '/'.$order.'/'.$search.'/sort/'.$sort;
			//$config['prefix'] = '/'.$order.'/'.$search.'/sort/'.$sort;
			$data['user_info'] = $this->admin_model->get_user_info($offset,$limit,$search,$sort,$order);
			$config['total_rows'] = $this->admin_model->users_count($search);
			$config['uri_segment'] = 3;
			$config['display_pages'] = TRUE; 
			$this->pagination->initialize($config);
			$data['page_title'] = 'Manage Users';
			$data['body'] = $this->load->view('cdadmin/users',$data,true);
			$this->load->view('cdadmin/template',$data);
	}
	
	/*
	 * Manage users operation (edit/delete )
	 * */
	function users_edit()
	{
			$user_id = $this->uri->segment(3,'');
			$mode = $this->uri->segment(4);
			if($mode == 'delete' && is_numeric($user_id)) {
				$this->admin_model->delete_user_byId($user_id);
				$this->session->set_flashdata('success','User has been deleted successfully.');
				redirect(base_url().'cdadmin/users');
			} else {
					$this->form_validation->set_rules('first_name','first_name', 'trim|required');
					if($this->form_validation->run() == true)
					{
						if($this->admin_model->update_user_info($user_id))
						{
							$this->session->set_flashdata('success','User has been updated successfully.');
							redirect(base_url().'cdadmin/users');
						}
						else
						{
							$this->session->set_flashdata('fail','User failed to be updated.');
							redirect(base_url().'cdadmin/users');
						}
					}
					//~ $res = $this->admin->update_user_info($user_data,$id);
					//~ $this->session->set_flashdata('success_msg','User has been updated successfully.');
					//~ redirect(base_url().'admin/home/users');
				}
				$data['active'] = 'users';				
				//$data['countries']  = $this->admin_model->get_country();
				$data['user_info'] = $this->admin_model->get_user_byId($user_id);
				if(empty($data['user_info'])) {
					redirect(base_url().'cdadmin/users');
				}
				$data['countries']=$this->admin_model->get_country();
				$data['page_title'] = $page_title['title'] = 'Edit user';
				$data['nav_menu'] = 'users';
				$data_breadcrum = array('parent_link'=> 'users', 'parent_li'=> 'Users', 'title' =>$data['page_title']);
				$data['breadcrum'] = $this->load->view('cdadmin/breadcrum',$data_breadcrum,true);
				$data['body'] = $this->load->view('cdadmin/edit_user',$data,true);
				$this->load->view('cdadmin/template',$data);
			
	}
	/*
	 * @change status of user
	 * */
	function change_status()
	{
			$id = $this->input->post('id');
			$user_info = $this->admin_model->get_user_info('','','','','',$id);
			if($user_info[0]->status == 1) 	{
				$res = $this->admin_model->update_user_byId('status',$id,'0');
				$val = 'Inactive';
			} else 	{
				$res = $this->admin_model->update_user_byId('status',$id,'1');
				$val = 'Active';
			}
			if($res) {
				$this->session->set_flashdata('success','User has been updated successfully.');
				echo $val;
			}
			die;
		
	}
	
	
	public function subscribers()
	{
		$data = array();
		$admin_id=$this->session->userdata('admin_id');
		$data['admin_name']=$this->admin_model->get_admin_detail($admin_id);
		$data['page_title'] = 'Manage Subscribers';
		$data['title'] = 'Manage Subscribers';
		$data['active'] = 'manage_subscriber';
		$config['per_page']  = $limit = 10;
		$data['page'] = $page = $this->uri->segment(3) && $this->uri->segment(3) != 0 ? $this->uri->segment(3) : 0;
		$data['offset'] = $offset = $page;
		$order = $data['order'] = $this->uri->segment(4,'desc');
		$data['search'] = $search = $this->uri->segment(5,'');
		$config['base_url'] = base_url().'cdadmin/subscribers/';
		if($search == '' || $search == 'sort')
		{
			$data['search'] = $search = '';
			$data['sort'] = $sort = $this->uri->segment(6);
		} else {
			$data['sort'] = $sort = $this->uri->segment(7);
		}
		if (strpos($search,'_') !== false)
		{
			$search = explode('_',$search);
			if(count($search) > 0)
			{
				$search = $search[0].' '.$search[1];
			}
		}
		$config['suffix'] = '/'.$order.'/'.$search.'/sort/'.$sort;
		$data['sub_data'] = $this->admin_model->get_subscribers($offset,$limit,$search,$sort,$order);
		$config['total_rows'] = $this->admin_model->subscribers_count($search);
		$config['uri_segment'] = 3;
		$config['display_pages'] = TRUE; 
		$this->pagination->initialize($config);
		$data['body'] = $this->load->view('cdadmin/subscribers',$data,true);
		$this->load->view('cdadmin/template',$data);
		
	}
	
	public function change_sub_status()
	{
		$id = $this->uri->segment(3);
		$sid = $this->uri->segment(4);
		if($id)
		{
			if($this->admin_model->change_sub_status($id,$sid))
			{
				$this->session->set_flashdata('success',"Subscriber status updated successfully.");
				redirect(base_url().'cdadmin/subscribers');
			}
			else
			{
				$this->session->set_flashdata('fail',"Subscriber status not updated.");
				redirect(base_url().'cdadmin/subscribers');
			}
		}
	}
	
	public function delete_subscriber()
	{
		$id = $this->uri->segment(3);
		if($id)
		{
			if($this->admin_model->delete_subscriber($id))
			{
				$this->session->set_flashdata('success',"Subscriber deleted successfully.");
				redirect(base_url().'cdadmin/subscribers');				
			}
			else
			{
				$this->session->set_flashdata('fail',"Subscriber not deleted.");
				redirect(base_url().'cdadmin/subscribers');	
			}
		}
	}
	
}


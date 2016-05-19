<?php
class Admin_model extends CI_Model {
	
	private $from_email;
	private $from_name;
	
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');     
		$this->load->library('email');
		
		$this->from_email=$this->config->item('admin_email');
		$this->from_name=$this->config->item('admin_name');
	}
	public function login()
	{
		$this->load->library('session');
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->from('admin_credentials');
		$query = $this->db->get();
		$result=$query->result();
		//echo $this->db->last_query(); die;
		//print_r($result);die;
		if ($query->num_rows() > 0)
		{
			$newdata = array(
					'email'  => $result[0]->email,
                    'admin_id'  => $result[0]->id,
                    'admin_logged_in' => TRUE
             );
             $this->session->set_userdata($newdata);
			 return true;
		}
		else
		{
			return false;
		}
	
	}
	
	public function get_user_data($limit,$offset)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.deleted !=',1);
		$this->db->where('users.account_type !=','superadmin');
		if($limit)	
		{
			$this->db->limit($limit,$offset);
		}
		$query = $this->db->get();
		if($query->num_rows())
		{
			$result=$query->result();
		}
		else
		{
			$result=array();
		}
		return $result;
	}
	public function get_admin_detail($admin_id)
	{	
		$data = array();
	    $this->db->select('*');
	     $this->db->from('admin_credentials');
	    $this->db->where('id',$admin_id);
		$query = $this->db->get();
			if($query->num_rows()){
				$data = $query->row_array();
			}
			return $data;
	}
	public function check_password($admin_id)
	{
		$password=$this->input->post('old_pwd');
		$new_pwd=$this->input->post('new_pwd');
		$this->db->select('id');
		$this->db->where(array('password'=>md5($password),'id'=>$admin_id));
		$query=$this->db->get('admin_credentials');
		
		if($query->num_rows()>0)
		{
			  $data = array(
				   'password' => md5($new_pwd)
			   );
			$this->db->where('id', $admin_id);
			$res=$this->db->update('admin_credentials', $data);
			
			if($res)
			{
				return 1;
		    }
		}
		else
		{	
			return 0;
		}
	}
	
	public function add_faq()
	{	
		
			$data = array('category_id'=>$this->input->post('category'),
						  'question'=>$this->input->post('question'),
						  'answer'=>$this->input->post('answer'));
			$insert = $this->db->insert('faq',$data);
			if($insert){
				return true;
			}
			else{
				return false;
			}
		
	}
	public function get_faq($limit=null,$offset=null)
	{
		$data = array();
		if($limit != null){
			$this->db->limit($limit,$offset);
		}
		$this->db->order_by('id','desc');
		
		$query = $this->db->get('faq');
		if($query->num_rows())
		{
			$data = $query->result_array();
		}
		//echo $this->db->last_query(); die;
		return $data;
	}
	public function get_faq_by_id($id)
	{
		$data = array();
		$this->db->where('id',$id);
		$query = $this->db->get('faq');
		if($query->num_rows())
		{
			$data = $query->row_array();
		}
		return $data;
	}
	
	public function changeFaqStatus($id,$sid)
	{
		$status = ($sid==1?0:1);
		$data = array('status'=>$status);
		$this->db->where('id',$id);
		$update = $this->db->update('faq',$data);
		//echo $this->db->last_query(); die;
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function edit_faq($id)
	{
			$data = array('category_id'=>$this->input->post('category'),
						  'question'=>$this->input->post('question'),
						  'answer'=>$this->input->post('answer'));
			$this->db->where('id',$id);
			$insert = $this->db->update('faq',$data);
			if($insert){
				return true;
			}
			else{
				return false;
			}
		
	}
	public function deletefaq($id="")
	{
		if($id)
		{
			$this->db->where('id',$id);
			$delete = $this->db->delete('faq');
			
			if($delete)
			{
				return true;
			}
		}
		else{
			return false;
		}
	}
	public function add_story()
	{
		if(!empty($_FILES))
			{
				if($_FILES['story_image']['name'])
				{
					$img_name=time().'_'.$_FILES['story_image']['name'];
					$config['upload_path'] = 'uploads/stories';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['overwrite'] = TRUE;
					$config['file_name'] =$img_name;
					
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('story_image'))
					{
						
						$img_data = $this->upload->data();
						$image_name=$img_data['file_name'];
					}
					else
					{
						$image_name="";				
					}
				}
				else{
					$image_name="";
				}
				
			}
		$data = array('name'=>$this->input->post('name'),
						  'message'=>$this->input->post('message'),
						  'image'=>$image_name,
						  'create_date'=>date('Y-m-d H:i:s'));
			$insert = $this->db->insert('stories',$data);
			//echo $this->db->last_query(); die;
			if($insert){
				return true;
			}
			else{
				return false;
			}
	}
	public function get_stories($limit=null,$offset=null)
	{
		$data = array();
		if($limit != null){
			$this->db->limit($limit,$offset);
		}
		$this->db->order_by('story_id','desc');
		$query = $this->db->get('stories');
		if($query->num_rows())
		{
			$data = $query->result_array();
		}
		//echo $this->db->last_query(); die;
		return $data;
	}
	public function changeStroyStatus($id,$sid)
	{
		$status = ($sid==1?'0':'1');
		$data = array('status'=>$status);
		$this->db->where('story_id',$id);
		$update = $this->db->update('stories',$data);
		//echo $this->db->last_query(); die;
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function getStoryDataById($id)
	{
		$data = array();
		$this->db->where('story_id',$id);
		$query = $this->db->get('stories');
		if($query->num_rows())
		{
			$data = $query->row_array();
		}
		return $data;
	}
	public function edit_story($id)
	{
		if(!empty($_FILES))
			{
				if($_FILES['story_image']['name'])
				{
					$img_name=time().'_'.$_FILES['story_image']['name'];
					$config['upload_path'] = 'uploads/stories';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['overwrite'] = TRUE;
					$config['file_name'] =$img_name;
					
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('story_image'))
					{
						
						$img_data = $this->upload->data();
						$image_name=$img_data['file_name'];
					}
					else
					{
						$image_name="";				
					}
				}
				else{
					$image_name="";
				}
				
			}
		$data = array('name'=>$this->input->post('name'),
						  'message'=>$this->input->post('message'));
			if($image_name)
			{
				$data['image'] = $image_name;
				
			}
			$this->db->where('story_id',$id);
			$insert = $this->db->update('stories',$data);
			//echo $this->db->last_query(); die;
			if($insert){
				return true;
			}
			else{
				return false;
			}
	}
	public function deleteStory($id)
	{
		if($id)
		{
			$this->db->where('story_id',$id);
			$delete = $this->db->delete('stories');
			if($delete)
			{
				return true;
			}
		}
		else{
			return false;
		}
	}
	
	/* return all user information, by id also
	 * */
	function get_user_info($offset, $limit, $search = '',$sort_name='',$order,$id='')
	{
		$data = array();
		$this->db->select('*');
		if($search !=''){
			$this->db->like('email',"$search");
			$this->db->or_like("CONCAT(first_name, ' ', last_name)","$search");	
		}
		if($id != '')
		{
			$this->db->where('user_id',$id);
		}
		if($sort_name != '') {
			if($sort_name == 'name') {
				$this->db->order_by("first_name $order , last_name $order");
			} else {
				$this->db->order_by($sort_name,$order);
			}
		}
		else
		{
			$this->db->order_by('user_id','desc');
		}
		$this->db->limit($limit,$offset);
		$query = $this->db->get('users');
		if($query->num_rows() > 0) {
			$data = $query->result();
		}
		//echo $this->db->last_query();
		return $data;
	}
	
	/* 
	 * @param string 
	 * return number of users */
	 
	function users_count($search= '')
	{
		if($search != '') {
			$this->db->like('email',"$search");
			$this->db->or_like("CONCAT(first_name, ' ', last_name)","$search");
		}
		$qry = $this->db->get('users');
		$count = $qry->num_rows();
		return $count;
	}
	/* delete user by id
	 * */
	function delete_user_byId($user_id)
	{
		if($user_id != '')
		{
			$this->db->delete('users',array('user_id' => $user_id));			
			return true;
		}
	}
	
	/* update user info for particular field
	 * */
	function update_user_byId($field,$user_id,$value)
	{
		$data = array($field => $value);
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $data); 
		return true;
	}
	/*get detail of countries
	 * */
	function get_country($id='')
	{
		$this->db->select('*');
		if($id != '')
		{
			$this->db->where('item_id',$id);
		}
		$query = $this->db->get('countries');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
	
	/*
	*@param int
	*@return user by id */
	function get_user_byId($id)
	{
		$data = array();
		if($id != '')
		{
			$where = array('user_id' => $id);
			$this->db->where($where);
			$qry =$this->db->get('users');
			if($qry->num_rows() > 0) 	{
				$data = $qry->row_array();
			}
		}
		return $data;
	}
	function update_user_info($user_id)
	{
		if(!empty($_FILES))
			{
				if($_FILES['profile_image']['name'])
				{
					$img_name=time().'_'.$_FILES['profile_image']['name'];
					$config['upload_path'] = 'uploads/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['overwrite'] = TRUE;
					$config['file_name'] =$img_name;
					
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('profile_image'))
					{
						
						$img_data = $this->upload->data();
						$image_name=$img_data['file_name'];
					}
					else
					{
						$image_name="";				
					}
				}
				else{
					$image_name="";
				}
				
			}
		
		$data=array(
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'gender'=>$this->input->post('gender'),
		'dob'=>$this->input->post('dob'),
		'address'=>$this->input->post('address'),
		'biography'=>$this->input->post('biography'),
		'city'=>$this->input->post('city'),
		'state'=>$this->input->post('state'),
		'country'=>$this->input->post('country'),
		'phone'=>$this->input->post('phone'),
		'zipcode'=>$this->input->post('zipcode')		
		);
		
	
		if($image_name)
		{
			$data['profile_image'] = $image_name;
			
		}
		
		$this->db->where('user_id',$user_id);
		$update = $this->db->update('users',$data);
		
		if($update){
			return true;
		}
		else{
			return false;
		}
	}
	
	
	function send_email($from_email,$from_name,$to_email,$subject,$message,$bcc=false)
	{
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['mailtype'] = 'html';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);				
			
		/*	$from_email="deepak@dexteroustechnologies.co.in";$from_name="Deepak";$to_email="clerisytest1@gmail.com";
			$message = "Just Jesting mail";
			$subject="testing";
		*/	
			$this->email->from($from_email, $from_name);
			$this->email->to($to_email);
			if($bcc)
			{
				$this->email->bcc($this->from_email);
			}
		//	$this->email->bcc('deepak@dexteroustechnologies.co.in');
			$this->email->subject($subject);
			$this->email->message($message);			
			
			if($this->email->send()) {											
				return true;
			}
			else
			{
				return false;
			}
	}
	
	
	
	function get_subscribers($offset=null, $limit=null, $search = '',$sort_name='',$order=null)
	{
		$data = array();
		$this->db->select('*');
		if($search != '') {			
			$this->db->like("email","$search");			
		}
		if($sort_name != '') {			
				$this->db->order_by($sort_name,$order);			
		}
		else
		{
			$this->db->order_by('sub_id','desc');
		}
		if($offset)
		{
				$this->db->limit($limit,$offset);
		}
		
		$query = $this->db->get('subscribe');
		if($query->num_rows() > 0) {
			
				return $query->result_array();
		}
		
	}
	 
	function subscribers_count($search= '')
	{
		if($search != '') {			
			$this->db->like("email","$search");			
		}
		$qry = $this->db->get('subscribe');
		$count = $qry->num_rows();
		return $count;
	}
	
	public function change_sub_status($id,$sid)
	{
		$status = ($sid==1?'0':'1');
		$data = array('status'=>$status);
		$this->db->where('sub_id',$id);
		$update = $this->db->update('subscribe',$data);
		//echo $this->db->last_query(); die;
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function delete_subscriber($id="")
	{
		if($id)
		{
			$this->db->where('sub_id',$id);
			$delete = $this->db->delete('subscribe');			
			if($delete)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else{
			return false;
		}
	}
}
?>

<?php
class List_model extends CI_Model {
	
	private $from_email;
	private $from_name;
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('email');
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->model('admin_model');
		$this->from_email=$this->config->item('admin_email');
		$this->from_name=$this->config->item('admin_name');
		
	}
	
	
	
	
	
	function get_vehicles($offset=null, $limit=null, $search = '',$sort_name='',$order='')
	{
	//	echo '<pre>';
	//	print_r($_POST);
		$this->db->select('vh.*,ve.*');
		$this->db->from('vechicles vh');
		$this->db->join('vehicle_engine ve','ve.vehicle_id=vh.vechicle_id');
		$this->db->where('vh.status','1');
		
		$colors=$this->input->post('colors');
		
		if(isset($colors) && is_array($colors) && count($colors)>0 && (!in_array('all',$colors)))
		{
			$this->db->where_in('color_code', $colors);
		}
			
		$years=$this->input->post('years');
		
		if(isset($years) && is_array($years) && count($years)>0 && (!in_array('all',$years)))
		{
			$this->db->where_in('year', $years);
		}
		
		$doors=$this->input->post('doors');
		
		if(isset($doors) && is_array($doors) && count($doors)>0 && (!in_array('all',$doors)))
		{
			$this->db->where_in('num_of_doors', $doors);
		}
		
		$min_mileage = $this->input->post('min-milegae');
		$max_mileage = $this->input->post('max-milegae');
		
		if((isset($min_mileage)) && (isset($max_mileage) && !empty($max_mileage)))
		{
			$this->db->where("mileage BETWEEN '$min_mileage' AND '$max_mileage' ");
		}
		
		$transmission_type = $this->input->post('transmission_type');
		if(isset($transmission_type))
		{
			$this->db->where('transmission_type',$transmission_type);
		}		
		
		$body_type=$this->input->post('body_type');
		
		if(isset($body_type) && is_array($body_type) && count($body_type)>0 && (!in_array('all',$body_type)))
		{
			$this->db->where_in('vehicle_style', $body_type);
		}
		
		$min_hp = $this->input->post('min-hp');
		$max_hp = $this->input->post('max-hp');
		
		if((isset($min_hp)) && (isset($max_hp) && !empty($max_hp)))
		{
			$this->db->where("horsepower BETWEEN '$min_hp' AND '$max_hp' ");			
		}
		
		
		$min_mpg = $this->input->post('min-mpg');
		$max_mpg = $this->input->post('max-mpg');
		
		if((isset($min_mpg)) && (isset($max_mpg) && !empty($max_mpg)))
		{
			$this->db->where("average_mpg BETWEEN '$min_mpg' AND '$max_mpg' ");
		}
		
		$driven_wheels=$this->input->post('drive');
		
		if(isset($driven_wheels) && is_array($driven_wheels) && count($driven_wheels)>0 && (!in_array('all',$driven_wheels)))
		{
			$this->db->where_in('driven_wheels', $driven_wheels);
		}
		
		$min_price = $this->input->post('min-price');
		$max_price = $this->input->post('max-price');
		
		
		if((isset($min_price)) && (isset($max_price) && !empty($max_price)))
		{
			$this->db->where("our_price BETWEEN '$min_price' AND '$max_price' ");
		}
		
		$options= $this->input->post('option');
		if(isset($options) && is_array($options) && count($options)>0 && (!in_array('all',$options)))
		{			
			foreach($options as $option)
			{
				$this->db->like('options',$option);
			}
		}
		
		
		if($search !=''){
			$this->db->where("(make LIKE '%$search%' || model LIKE '%$search%' || year LIKE '%$search%' 
			|| CONCAT(year, ' ' ,make, ' ', model) LIKE '%$search%')");
			
		}
		
		
		
		if($sort_name != '') {				
			$this->db->order_by($sort_name,$order);		
		}
		else
		{
			$this->db->order_by('vh.vechicle_id','desc');
		}
		
		if($limit)
		{
			$this->db->limit($limit,$offset);	
		}
		
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
		
	}
	
	function get_vehicle_images($vehicle_id)
	{
		$this->db->where('vehicle_id',$vehicle_id);
		$query = $this->db->get('vehicle_images');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}
	
	function count_vehicle_fevourite($vehicle_id)
	{
		$this->db->where('vehicle_id',$vehicle_id);
		$this->db->from('vehicle_favourites');
		return $this->db->count_all_results(); 
	}
	
	function get_latest_vehicle_image($vehicle_id)
	{
		$this->db->where('vehicle_id',$vehicle_id);
		$this->db->order_by('image_id','asc');
		$query = $this->db->get('vehicle_images');
		if($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
	
	function get_vehicle_features($ids)
	{
		$this->db->select('*');
		$this->db->where("feature_id IN ($ids)");
		$query = $this->db->get('vehicle_features');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
		
	}
	
	function get_vehicle_options($ids)
	{
		$this->db->select('*');
		$this->db->where("option_id IN ($ids)");
		$query = $this->db->get('vehicle_options');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
		
	}
	
	function get_colors()
	{
		$this->db->select('color_code,color_name');
		$this->db->where('status','1');
		$this->db->where('color_code !=','null');
		$this->db->group_by('color_code');
		$query = $this->db->get('vechicles');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
		
	}
	
	function get_years()
	{
		$this->db->select('year');
		$this->db->where('status','1');
		$this->db->group_by('year');
		$query = $this->db->get('vechicles');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
		
	}
	
	function get_option()
	{
		$this->db->select('*');
		$query = $this->db->get('vehicle_options');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
		
	}
	
	function get_vehicle_details($vehicle_id)
	{
		$this->db->select('*');
		$this->db->from('vechicles vh');
		$this->db->join('vehicle_engine ve','ve.vehicle_id = vh.vechicle_id');
		$this->db->where('vh.vechicle_id',$vehicle_id);
		$query =  $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
		
	}
	
	
	
	function book_drive()
	{
		$data = array(
		'vehicle_id'=>$this->input->post('vehicle_id'),
		'name'=>$this->input->post('bd_name'),
		'email'=>$this->input->post('bd_email'),
		'contact'=>$this->input->post('bd_contact'),
		'pref_date'=>$this->input->post('bd_date'),
		'pref_time'=>$this->input->post('bd_pref_time'),
		'description'=>$this->input->post('bd_description'),
		'create_date'=>date('Y-m-d H:i:s')		
		);
		
		$result = $this->db->insert('test_drive_bookings',$data);
		if($result)
		{	
			$name = $this->input->post("bd_name");
			$email = $this->input->post("bd_email");
			$contact = $this->input->post("bd_contact");
			$pref_date = $this->input->post("bd_date");
			$description = $this->input->post("bd_description");
			$vehicle_data = $this->get_vehicle_details($this->input->post('vehicle_id'));
			if($vehicle_data)
			{
				$car_details = $vehicle_data['make'].' '.$vehicle_data['model'].' '.$vehicle_data['year'];
				$car_vin = $vehicle_data['vin'];
			}
			else
			{
				$car_details = $car_vin = '';
			}
			
			
			switch($this->input->post('bd_pref_time'))
			{
				case 1:
					$pref_time = "Early Morning";
				break;
				case 2:
					$pref_time = "Late Morning";
				break;
				case 3:
					$pref_time = "Early Afternoon";
				break;
				case 4:
					$pref_time = "Late Afternoon";
				break;
				case 5:
					$pref_time = "Evening";
				break;
				default:
					$pref_time = "";
				break;									
			}
			
			$subject = "Test Drive Booking Request";			
			
			$message =
			'<p>Hello Admin,</p>
			<p>You have received a test drive booking request for  '.$car_details.'. Below are the details :</p>
			<p>Vehicle VIN : '.$car_vin.'</p>
			<p>Sender Name: '.$name.'</p>
			<p>Sender Email: '.$email.'</p>
			<p>Sender Contact: '.$contact.'</p>
			<p>Preferred Date: '.$pref_date.'</p>
			<p>Preferred Time Frame: '.$pref_time.'</p>
			<p>Message From Sender: '.$description.'</p>
			<p>Kind Regards</p>
			<p>Car2udirect.com Team</p>';	
			
			$this->send_email($email,$name,$this->from_email,$subject,$message);
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function book_request()
	{
		$data = array(
		'vehicle_id'=>$this->input->post('vehicle_id'),
		'name'=>$this->input->post('ld_name'),
		'email'=>$this->input->post('ld_email'),
		'contact'=>$this->input->post('ld_contact'),
		'pref_date'=>$this->input->post('ld_date'),
		'pref_time'=>$this->input->post('ld_pref_time'),
		'description'=>$this->input->post('ld_description'),
		'create_date'=>date('Y-m-d H:i:s')		
		);
		
		$result = $this->db->insert('live_demo_requests',$data);
		if($result)
		{
			
			$name = $this->input->post("ld_name");
			$email = $this->input->post("ld_email");
			$contact = $this->input->post("ld_contact");
			$pref_date = $this->input->post("ld_date");
			$description = $this->input->post("ld_description");
			$vehicle_data = $this->get_vehicle_details($this->input->post('vehicle_id'));
			if($vehicle_data)
			{
				$car_details = $vehicle_data['make'].' '.$vehicle_data['model'].' '.$vehicle_data['year'];
				$car_vin = $vehicle_data['vin'];
			}
			else
			{
				$car_details = $car_vin = '';
			}
			
			
			switch($this->input->post('ld_pref_time'))
			{
				case 1:
					$pref_time = "Early Morning";
				break;
				case 2:
					$pref_time = "Late Morning";
				break;
				case 3:
					$pref_time = "Early Afternoon";
				break;
				case 4:
					$pref_time = "Late Afternoon";
				break;
				case 5:
					$pref_time = "Evening";
				break;
				default:
					$pref_time = "";
				break;									
			}
			
			$subject = "Live Demo Request";			
			
			$message =
			'<p>Hello Admin,</p>
			<p>You have received a live demo request for  '.$car_details.'. Below are the details :</p>
			<p>Vehicle VIN : '.$car_vin.'</p>
			<p>Sender Name: '.$name.'</p>
			<p>Sender Email: '.$email.'</p>
			<p>Sender Contact: '.$contact.'</p>
			<p>Preferred Date: '.$pref_date.'</p>
			<p>Preferred Time Frame: '.$pref_time.'</p>
			<p>Message From Sender: '.$description.'</p>
			<p>Kind Regards</p>
			<p>Car2udirect.com Team</p>';	
			
			$this->send_email($email,$name,$this->from_email,$subject,$message);
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	function insert_offer()
	{	
		$data = array(
		'vehicle_id'=>$this->input->post('vehicle_id'),
		'name'=>$this->input->post('op_name'),
		'email'=>$this->input->post('op_email'),
		'contact'=>$this->input->post('op_contact'),
		'price'=>$this->input->post('op_price'),
		'description'=>$this->input->post('op_description'),		
		'create_date'=>date('Y-m-d H:i:s')		
		);		
		$result = $this->db->insert('price_offers',$data);
		if($result)
		{
			$name = ucwords($this->input->post("op_name"));
			$email = $this->input->post("op_email");
			$contact = $this->input->post("op_contact");
			$price = $this->input->post("op_price");
			$description = $this->input->post("op_description");
			$vehicle_data = $this->get_vehicle_details($this->input->post('vehicle_id'));
			if($vehicle_data)
			{
				$car_details = $vehicle_data['make'].' '.$vehicle_data['model'].' '.$vehicle_data['year'];
				$car_vin = $vehicle_data['vin'];
				$car_price = $vehicle_data['our_price'];
			}
			else
			{
				$car_details = $car_vin = $car_price = '';
			}
			
			$subject = "$name sent an offer for $car_details";			
			
			$message =
			'<p>Hello Admin,</p>
			<p>You have received an offer price for '.$car_details.'. Below are the details of buyer:</p>			
			<p>Name: '.$name.'</p>
			<p>Email: '.$email.'</p>
			<p>Contact: '.$contact.'</p>
			<p>Price Offered: $'.$price.'</p>
			<p>Message From Buyer: '.$description.'</p>			
			<p>Vehicle Original Price : $'.$car_price.'</p>
			<p>Vehicle VIN : '.$car_vin.'</p>			
			<p>Kind Regards</p>
			<p>Car2udirect.com Team</p>';	
			
			
			$this->send_email($email,$name,$this->from_email,$subject,$message);
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	
	public function get_team_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('team_id',$id);
		$query = $this->db->get('team');
		
		if($query->num_rows() > 0) {
				return $query->row_array();									
		}
		
	}
	
	public function insert_question()
	{
		$data = array(
		'vehicle_id'=>$this->input->post('vehicle_id'),
		'team_id'=>$this->input->post('team_id'),
		'name'=>$this->input->post('q_name'),
		'email'=>$this->input->post('q_email'),
		'contact'=>$this->input->post('q_contact'),
		'question'=>$this->input->post('question'),		
		'create_date'=>date('Y-m-d H:i:s')		
		);		
		$result = $this->db->insert('questions',$data);
		if($result)
		{
			$name = ucwords($this->input->post("q_name"));
			$email = $this->input->post("q_email");
			$contact = $this->input->post("q_contact");
			$description = $this->input->post("question");
			$vehicle_data = $this->get_vehicle_details($this->input->post('vehicle_id'));
			if($vehicle_data)
			{
				$car_details = $vehicle_data['make'].' '.$vehicle_data['model'].' '.$vehicle_data['year'];
				$car_vin = $vehicle_data['vin'];				
			}
			else
			{
				$car_details = $car_vin = $car_price = '';
			}
			
			$team_data = $this->get_team_by_id($this->input->post('team_id'));
			$team_name = ucwords($team_data['first_name'].' '.$team_data['last_name']);
			$team_email = $team_data['email'];
			
			$subject = "$name asked an question for $car_details";			
			
			$message =
			'<p>Hello '.$team_name.',</p>
			<p>You have received an question for '.$car_details.'. Below are the details of sender:</p>			
			<p>Name: '.$name.'</p>
			<p>Email: '.$email.'</p>
			<p>Contact: '.$contact.'</p>
			<p>Question From Buyer: '.$description.'</p>			
			<p>Vehicle VIN : '.$car_vin.'</p>			
			<p>Kind Regards</p>
			<p>Car2udirect.com Team</p>';	
			
			
			$this->send_email($email,$name,$team_email,$subject,$message,true);
			
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	
	function insert_favourite($id,$user_id)
	{
		$already_favourite = $this->check_vehicle_favourite($id,$user_id);
		
		if($already_favourite == true)		
		{
			$this->db->where('vehicle_id',$id);
			$this->db->where('user_id',$user_id);
			$result = $this->db->delete('vehicle_favourites');
			if($result)
			{
				return 'removed';
			}
			else
			{
				return 'not_removed';
			}
		}
		else
		{
				$data = array(
				'vehicle_id'=>$id,
				'user_id'=>$user_id,
				'create_date'=>date('Y-m-d H:i:s')	
				);
				
				$result = $this->db->insert('vehicle_favourites',$data);  
				
				if($result)
				{
					return 'added';
				}
				else
				{
					return 'not_added';
				}
		}
		
		
		
	}
	
	function check_vehicle_favourite($vehicle_id,$user_id)
	{
		$this->db->select('*');
		$this->db->where('vehicle_id',$vehicle_id);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('vehicle_favourites');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function buy_vehicle($id,$user_id)
	{
		$already_bought = $this->check_vehicle_bought($id,$user_id);
		
		if($already_bought == true)		
		{
			return 'already';			
		}
		else
		{
				$data = array(
				'vehicle_id'=>$id,
				'user_id'=>$user_id,
				'create_date'=>date('Y-m-d H:i:s')	
				);
				
				$result = $this->db->insert('vehicle_buy',$data);  
				
				if($result)
				{
						$vehicle_data = $this->get_vehicle_details($id);
						if($vehicle_data)
						{
							$car_details = $vehicle_data['make'].' '.$vehicle_data['model'].' '.$vehicle_data['year'];
							$car_vin = $vehicle_data['vin'];				
						}
						else
						{
							$car_details = $car_vin = $car_price = '';
						}
						
						$user_data = $this->user_model->get_user_byId($user_id);
						$user_name = ucwords($user_data['first_name'].' '.$user_data['last_name']);
						$user_email = $user_data['email'];
						$contact = $user_data['phone'];
						
						$subject = "$user_name requested to buy for $car_details";			
						
						$message =
						'<p>Hello Admin,</p>
						<p>You have received an buy request for '.$car_details.'. Below are the details of sender:</p>			
						<p>Name: '.$user_name.'</p>
						<p>Email: '.$user_email.'</p>
						<p>Contact: '.$contact.'</p>									
						<p>Vehicle VIN : '.$car_vin.'</p>			
						<p>Kind Regards</p>
						<p>Car2udirect.com Team</p>';	
						
						
						$this->send_email($user_email,$user_name,$this->from_email,$subject,$message,true);
						
					return 'added';
				}
				else
				{
					return 'not_added';
				}
		}
		
		
		
	}
	
	function sell_vehicle()
	{
		$data=array(
			'year'=>$this->input->post('year'),
			'make'=>$this->input->post('make'),
			'model'=>$this->input->post('model'),
			'style'=>$this->input->post('style'),
			'mileage'=>$this->input->post('mileage'),
			'zip_code'=>$this->input->post('zip_code'),
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'email'=>$this->input->post('email'),
			'phone'=>$this->input->post('phone'),
			'address'=>$this->input->post('address'),
			'create_date'=>date('Y-m-d H:i:s')
		);
		
		$color=$this->input->post('color');
		if(isset($color))
		{
			$data['color']=$this->input->post('color');
		}
		$option=$this->input->post('option');
		if(isset($option))
		{
			$options=implode(',',$this->input->post('option'));
			
			$data['options']=$options;
		}
		
		$result = $this->db->insert('vehicle_sell',$data);
		
		if($result)
		{
			$sell_id = $this->db->insert_id();
			
		
			$price_data = $this->edmunds->get_prices($this->input->post('style'),$this->input->post('mileage'),$this->input->post('zip_code'));		
			
			if(is_array($price_data) && count($price_data)>0)
			{
				$pp_price = isset($price_data['totalWithOptions']['usedPrivateParty']) ? $price_data['totalWithOptions']['usedPrivateParty'] : 0 ;
				$tradein_price = isset($price_data['totalWithOptions']['usedTradeIn']) ? $price_data['totalWithOptions']['usedTradeIn'] : 0 ;
				
				$tmv_price = isset($price_data['totalWithOptions']['usedTmvRetail']) ? $price_data['totalWithOptions']['usedTmvRetail'] : 0 ;
			}
			else
			{
				$pp_price = $tradein_price = $tmv_price = 0;
			}
			
			$style_data = $this->edmunds->get_style_by_id($this->input->post('style'));
			
			$style_name = $style_data['name'];
			
			$color_data = $this->edmunds->get_color_by_id($this->input->post('color'));
			
			$color_name = $color_data['name'];
			
			$color_code = $color_data['colorChips']['primary']['hex'];
			
			$update_data = array(
			'style_name'=>$style_name,
			'color_name'=>$color_name,
			'color_code'=>$color_code,
			'pp_price'=>$pp_price,
			'tradein_price'=>$tradein_price,
			'tmv_price'=>$tmv_price,
			);
			
			$this->db->where('sell_id',$sell_id);
			$this->db->update('vehicle_sell',$update_data);
					
			$vin_url = base_url().'vin/'.base64_encode($sell_id);			
			return array('status'=>'success','pp_price'=>$pp_price,'tradein_price'=>$tradein_price,'tmv_price'=>$tmv_price,'vin_url'=>$vin_url,'sell_id'=>$sell_id);
			
		}
		else
		{
			return array('status'=>'fail');
		}
		
		
	}
	
	function sell_ins_time()
	{
		$sell_id = (int) $this->input->post('sell_id');
		if($sell_id > 0)
		{
			$post_data  = $this->input->post('ins_time');
			$date_time = explode('_',$post_data);
			$pref_date = $date_time[0];
			$pref_time = $date_time[1];
			
			$this->db->where('sell_id',$sell_id);
			$update_data = array(
			'pref_date'=>$pref_date,
			'pref_time'=>$pref_time			
			);
			
			$result = $this->db->update('vehicle_sell',$update_data);
			if($result)
			{
				$main_query = $this->db->get_where('vehicle_sell',array('sell_id'=>$sell_id));
				$main_data = $main_query->row_array();
				
				$car_details = $main_data['make'].' '.$main_data['model'].' '.$main_data['year'];
			
				$user_name = ucwords($main_data['first_name'].' '.$main_data['last_name']);
				$user_email = $main_data['email'];
				$style_name = $main_data['style_name'];
				$contact = $main_data['phone'];
				
				switch($pref_time)
				{
					case 1:
						$p_time = "Early Morning";
					break;
					case 2:
						$p_time = "Late Morning";
					break;
					case 3:
						$p_time = "Early Afternoon";
					break;
					case 4:
						$p_time = "Late Afternoon";
					break;
					case 5:
						$p_time = "Evening";
					break;
					default:
						$p_time = "";
					break;									
				}
				
				$subject = "$user_name requested to sell $car_details";			
				
				$message =
				'<p>Hello Admin,</p>
				<p>You have received an sell request for '.$car_details.'. Below are the details of sender:</p>			
				<p>Name: '.$user_name.'</p>
				<p>Email: '.$user_email.'</p>
				<p>Contact: '.$contact.'</p>	
				<p>Preferred Date / Time: '.$pref_date.' / '.$p_time.'</p>									
				<p>Vehicle Trim : '.$style_name.'</p>			
				<p>Kind Regards</p>
				<p>Car2udirect.com Team</p>';					
				
			 	$this->send_email($user_email,$user_name,$this->from_email,$subject,$message,true);
			
				
				$vin_url = base_url().'vin/'.base64_encode($sell_id);
				
				$n_subject = "Vin Request From Car2udirect.com";			
				
				$n_message =
				'<p>Hello '.$user_name.',</p>
				<p>You have requested to sell '.$car_details.'.</p>			
				<p>Please <a href="'.$vin_url.'">Click Here</a> to enter vin. </p>
				<p>Or Copy url in browser : '.$vin_url.'</p>
				<p>Kind Regards</p>
				<p>Car2udirect.com Team</p>';					
				
				$this->send_email($this->from_email,$this->from_name,$user_email,$n_subject,$n_message,true);
			
				return array('status'=>'success','vin_url'=>$vin_url,'sell_id'=>$sell_id);
			}
			else
			{
				return array('status'=>'fail');
			}
			
		}
		else
		{
			return array('status'=>'fail');
		}
	}
	
	function update_vin($sell_id)
	{
		$this->db->select('*');
		$this->db->where('sell_id',$sell_id);
		$query = $this->db->get('vehicle_sell');
		if($query->num_rows() > 0)
		{
			$result  = $query->row_array();			
			$vin  = $this->input->post('vin');
			$vin_data = $this->edmunds->get_vehicle_data_by_vin($vin);
			
			if(is_array($vin_data))
			{			
				$make  = $vin_data['make']['niceName'];
				$model  = $vin_data['model']['niceName'];
				
				if($result['make'] == $make && $result['model'] == $model)
				{
					$this->db->set('vin',$vin);								
					$this->db->where('sell_id',$sell_id);
					$this->db->update('vehicle_sell');
					
					return 'success';
				}
				else
				{
					return 'not_match';
				}					
			}	
			else
			{
				return 'not_vin';
			}
		}
		else
		{
			return 'not_found';
		}
		
	}
	
	function check_vehicle_bought($vehicle_id,$user_id)
	{
		$this->db->select('*');
		$this->db->where('vehicle_id',$vehicle_id);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('vehicle_buy');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function trade_vehicle($id,$user_id)
	{
		$style_data = $this->edmunds->get_style_by_id($this->input->post('style'));
		$price_data = $this->edmunds->get_prices($this->input->post('style'),$this->input->post('mileage'),$this->input->post('zip_code'));		
		
		if(is_array($price_data) && count($price_data)>0)
		{
			$pp_price = isset($price_data['totalWithOptions']['usedPrivateParty']) ? $price_data['totalWithOptions']['usedPrivateParty'] : 0 ;
			$tradein_price = isset($price_data['totalWithOptions']['usedTradeIn']) ? $price_data['totalWithOptions']['usedTradeIn'] : 0 ;
		}
		else
		{
			$pp_price = $tradein_price = 0;
		}
		
		$style_name = $style_data['name'];
		
		$data = array(
		'vehicle_id'=>$id,
		'user_id'=>$user_id,
		't_year'=>$this->input->post('year'),
		't_make'=>$this->input->post('make'),
		't_model'=>$this->input->post('model'),
		't_style'=>$this->input->post('style'),
		't_style_name'=>$style_name,
		't_trade_price'=>$tradein_price,
		't_private_price'=>$pp_price,
		't_mileage'=>$this->input->post('mileage'),
		't_zip_code'=>$this->input->post('zip_code'),		
		't_vin'=>$this->input->post('vin'),		
		'create_date'=>date('Y-m-d H:i:s')
		);
		
		$result = $this->db->insert('vehicle_trades',$data);
		if($result)
		{
			
			$vehicle_data = $this->get_vehicle_details($id);
			if($vehicle_data)
			{
				$car_details = $vehicle_data['make'].' '.$vehicle_data['model'].' '.$vehicle_data['year'];
				$car_vin = $vehicle_data['vin'];				
			}
			else
			{
				$car_details = $car_vin = $car_price = '';
			}
			
			$trade_car_details = $this->input->post('make').' '.$this->input->post('model').' '.$this->input->post('year');
			
			$user_data = $this->user_model->get_user_byId($user_id);
			$user_name = ucwords($user_data['first_name'].' '.$user_data['last_name']);
			$user_email = $user_data['email'];
			$contact = $user_data['phone'];
			
			$subject = "$user_name requested to trade $trade_car_details";			
			
			$message =
			'<p>Hello Admin,</p>
			<p>You have received an trade request for '.$trade_car_details.'. Below are the details of sender:</p>			
			<p>Name: '.$user_name.'</p>
			<p>Email: '.$user_email.'</p>
			<p>Contact: '.$contact.'</p>									
			<p>Vehicle Trim : '.$style_name.'</p>			
			<p>Kind Regards</p>
			<p>Car2udirect.com Team</p>';	
			
			
			$this->send_email($user_email,$user_name,$this->from_email,$subject,$message,true);
						
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	
}	
	
?>

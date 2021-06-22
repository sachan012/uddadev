<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{	
	public function __construct(){
		parent::__construct();							
		$this->load->model('Dashboard_model','dashboard');			
	}

	public function index(){
		return redirect('dashboard/productList');
	}

	
	
	public function productList(){
		$data['profile']=$this->dashboard->user_info();	
		$data['products']=$this->dashboard->get_products();		
		$this->load->view('dashboard/product_list',$data);
	}

	public function redeem(){
		$product_id=$this->input->get('product_id');
		$data['profile']=$this->dashboard->user_info();	
		$data['products']=$this->dashboard->get_products();			
		foreach ($data['products']['data']['product_array'] as $value) {					
			if($value['product_id']==$product_id){
				$product_id = $value['product_id'];
				$product_name = $value['product_name'];
				$product_code = $value['product_code'];
				$product_image = $value['product_image'];			
				$product_value = $value['product_value'];
				$product_size = $value['size'];								
				$product_colors = $value['colors'];								
			}
		}
		$data['product_id'] = $product_id;
		$data['product_name'] = $product_name;
		$data['product_code'] = $product_code;
		$data['product_image'] = $product_image;
		$data['product_value'] = $product_value;					
		$data['product_size'] = $product_size;				
		$data['product_colors'] = $product_colors;				
		$this->load->view('dashboard/product_redeem_form',$data);
	}
	
	public function update_shipping_details(){	
		$id=$this->security->xss_clean($this->input->post('product_id'));	
		$product_type=$this->security->xss_clean($this->input->post('product_type'));	
		$shirtSize=$this->security->xss_clean($this->input->post('shirtSize'));	
		$shirtColor=$this->security->xss_clean($this->input->post('shirtColor'));	
		$data_profile = array(
			'device_token' => $this->input->post('device_token', true),
			'timestamp' => $this->input->post('datetime', true),
			'signature' => $this->input->post('signature', true),
			'firstname' => $this->input->post('first_name', true),
			'lastname' => $this->input->post('last_name', true),
			'email' => $this->input->post('email', true),
			'mobile' => $this->input->post('mobile', true),
			'displayname' => $this->input->post('displayname', true),
		    'address_line1' => $this->input->post('address_line1', true),
		    'address_line2' => $this->input->post('address_line2', true),
		    'city' => $this->input->post('city', true),
		    'state' => $this->input->post('state', true),
		    'country' => $this->input->post('country', true),
			'zipcode' => $this->input->post('zipcode', true),
			'product_type' =>$product_type,
			'size' =>$shirtSize,
			'color' =>$shirtColor,
		);
        	
			$response=$this->dashboard->update_profile($data_profile);
			$array = array("productid"=>$id,"product_type"=>$product_type,"shirtSize"=>$shirtSize,"shirtColor"=>$shirtColor,"message"=>$response);
			echo json_encode($array);          
	}  
	
	public function redeem_product(){
		$product_id=$this->input->get('product_id');					
		$redeemProduct=$this->dashboard->redeem_product($product_id);
		$redumtionHistory =$this->dashboard->get_redeem_product_history();		
		$redumtionHistory = json_decode($redumtionHistory,true);
		$data['profile']=$this->dashboard->user_info();
		
		$redeem_product_id = $redumtionHistory['data']['redeem_product_history_array'][0]['redeem_product_id'];
		$product_id = $redumtionHistory['data']['redeem_product_history_array'][0]['product_id'];
		$product_name = $redumtionHistory['data']['redeem_product_history_array'][0]['product_name'];
		$product_image = $redumtionHistory['data']['redeem_product_history_array'][0]['product_image'];
		$product_code = $redumtionHistory['data']['redeem_product_history_array'][0]['product_code'];
		$product_value = $redumtionHistory['data']['redeem_product_history_array'][0]['product_value'];
		$redeem_date = $redumtionHistory['data']['redeem_product_history_array'][0]['redeem_date'];

		//$product_type = $redumtionHistory['data']['redeem_product_history_array'][0]['product_type'];
		$size = $redumtionHistory['data']['redeem_product_history_array'][0]['size'];
		$color = $redumtionHistory['data']['redeem_product_history_array'][0]['colors'];
		
		$firstname = $data['profile']['data']['firstname'];
		$lastname = $data['profile']['data']['lastname'];
		$email = $data['profile']['data']['email'];
		$phone = $data['profile']['data']['phone'];
		$address_line1 = $data['profile']['data']['shipping_address']['address_line1'];
		$address_line2 = $data['profile']['data']['shipping_address']['address_line2'];
		$city = $data['profile']['data']['shipping_address']['city'];
		$state = $data['profile']['data']['shipping_address']['state'];
		$zipcode = $data['profile']['data']['shipping_address']['zipcode'];
		$country = $data['profile']['data']['shipping_address']['country'];		
		
		$this->load->library('email');	
		$config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => EMAIL,
            'smtp_pass' => PASSWORD,
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
          );
		$this->email->initialize($config);		
		$this->email->set_newline("\r\n");		
		$this->email->from(EMAIL, 'UDDA Sports');
		$this->email->to($email);	
		
		$pr_codes = array('PR019','PR020','PR021','PR022','PR023','PR024','PR025');
		if(in_array($product_code,$pr_codes)){
            $this->email->cc('7minch@gmail.com');
        }else{
			$this->email->cc('samples@aakronrule.com'); 
		}

	

		$this->email->set_mailtype('html');
		$this->email->subject('Order Confirmation | UDDA');
		$mailer='		
		<!DOCTYPE html>
		<html lang="en" style="height: 100%;width: 100%;padding: 0;margin: 0;">
		<head>
			<title>UDDA</title>
			<style>
				/* html,
				body {
					height: 100%;width: 100%;padding: 0;margin: 0;
				} */

				/* body {
					display: flex;flex-direction: column;
				} */

				.parentFlexGrowStyle {
					flex-grow: 1;
				}

				/* #table2,
				#table3 {
					border: 1px solid black;font-family: arial, sans-serif;border-collapse: collapse;
				} */

				/* #itemTable,
				#subTable1 {
					font-family: arial, sans-serif;border-collapse: collapse;width: 100%;
				} */

				/* #itemTable td,
				#itemTable th {
					border: 1px solid #dddddd;
					border-right: 2px solid lightgray;
					text-align: left;
					padding: 8px;
					min-height: 35px;
				} */

				/* #itemTable tr {
					border-bottom: 2px solid lightgray;
				} */

				/* #itemTable tr {
					height: 35px;
				} */

				/* #itemTable tr:nth-child(odd) {
					background-color: #f4f4f4;
				} */

				#itemTable span {
					content: "\0024";
				}
			</style>
		</head>

		<body style="height: 100%;width: 100%;padding: 0;margin: 0;display: flex;flex-direction: column;">
			<div style="margin: 2% 4%;width: 92%;">
				<table id="table1" style="width: 100%;margin: 0% 0 4%;">
					<tr>
						<td style="width: 30%;">
							<img style="text-align: left!important;width: 100%;" src="'.base_url().'assets/images/UDDA_Dashboard_Logo.png">
						</td>
						<td style="text-align:center; width: 80%;">
							<h3 style="margin: 0;">UDDA Inc.</h3>
							<h4 style="margin-bottom: 0;margin-top: 1%;">8 Indianola Ave,</h4>
							<h4 style="margin-bottom: 0;margin-top: 1%;">Akron, New York 14001</h4>
						</td>
						<td style="text-align:center; width: 15%;">
							<!-- <div style="border: 1px solid black;height: 100px;width: 250px;float: right;position: relative;">
								<div
									style="height: 24px;color: #fff;width: 250px;border-bottom: 1px solid black;background-color: black;flex-direction: column;justify-content: center;display: flex;">
									<span>PLEASE REMIT TO</span>
								</div>
								<div
									style="height: 76px;width: 250px;flex-direction: column;justify-content: center;display: flex;">
									<span>AAKRON RULE CORP. <br>
										P.O. BOX 418 <br>
										AKRON,NY 14001 </span>
								</div>
							</div> -->
						</td>
					</tr>
				</table>
				<table id="table2" style="width: 100%;font-weight: 600;border: 1px solid black;font-family: arial, sans-serif;border-collapse: collapse;">
					<tr>						
						<td style="text-align:center; width: 100%;font-weight: 600;font-size: 1.8rem;font-style: italic;font-family: CURSIVE;"> Order Confirmed</td>
					</tr>
					<tr>						
						<td style="text-align:center; width: 100%;font-weight: 400;font-size: 1rem;padding-bottom: 1%;padding-top: 1%;">Thank you for Redeeming UDDA Bucks for <img src=" '.base_url().'assets/images/udda_bucks.png" class="mr-1">'.number_format($product_value,2).'.<br> Your gift will arrive in 2-3 weeks and you will receive shipping notification when your order ships</td>
					</tr>
				</table>
				<table id="table3"
					style="width: 100%;font-weight: 600;border: 1px solid black;font-family: arial, sans-serif;border-collapse: collapse;">
					<tr>
						<td style="width: 38%;border-right: 1px solid black;vertical-align: top;">
							<p><span style="padding: 0% 3% 0% 6%;">Date Received:</span> <span
									style="border: 1px solid #ccc;padding: 1% 5%;">'.date('m-d-Y', strtotime($redeem_date)).'</span></p>
							<!-- <p><span style="padding: 0% 3% 0% 6%;">Shipping Date:</span> <span
									style="border: 1px solid #ccc;padding: 1% 5%;margin-left: 1%;">12/08/2020</span></p> -->
							<!-- <table id="subTable1"
								style="width: 100%;border-top: 1px solid black;border-bottom: 1px solid black;font-family: arial, sans-serif;border-collapse: collapse;">
								<tr>
									<th
										style="font-family: arial, sans-serif;border-collapse: collapse;border-right: 1px solid black;padding: 4px;border-bottom: 1px solid black;">
										Ship Via:</th>
									<th style="padding: 4px;border-bottom: 1px solid black;">Shipper No.</th>
								</tr>
								<tr>
									<th
										style="font-family: arial, sans-serif;border-collapse: collapse;border-right: 1px solid black;padding: 4px;">
										FED EX GROUND</th>
									<th>324357114</th>
								</tr>
							</table> 
							<p style="margin: 1%;">P.O. Number: DM4424770 </p>-->
						</td>
						<td style="width: 38%;vertical-align: top;padding: 1% 2%;">
							<h3 style="margin-top: 0;text-decoration: underline;text-underline-position: under;">SHIP TO:</h3>
							<p>'.$firstname.' '.$lastname.'</p>
							<p style="margin-bottom: 0;margin-top: 1%;">'.$address_line1.' '.$address_line2.'<br>'.$city.' '.$state.' '.$zipcode.'<br>Email:'.$email.'<br>Phone: '.$phone.'</p>
						</td>
						<td style="width: 24%;text-align: right;vertical-align: top;padding: 1% 2%;">
							Order id# : '.$redeem_product_id.'
						</td>
					</tr>
				</table>
				<table id="itemTable"
					style="margin: 1% 0;border: 2px solid lightgray;font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
					<tr style="border-bottom: 2px solid lightgray;height: 35px;background-color: #f4f4f4;">
						<th style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">Product Image</th>
						<th style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">Product Description</th>';	
						if(!empty($size)){
						$mailer.='<th style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">Size</th>'; 
						}if(!empty($color)){						
						$mailer.='<th style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">Color</th>';	
						}							
						$mailer.='<th style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">Quantity</th>						
					</tr>
					<tr style="border-bottom: 2px solid lightgray;height: 35px;">
						<td style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;"><img style="text-align: left!important;height: 50px;" src="'.$product_image.'" width="100" height="100" ></td>
						<td style="border: 1px solid #dddddd;border-right: 2px solid lightgray;text-align: center;padding: 8px;min-height: 35px;">'.$product_name.'</td>';
						if(!empty($size)){
							$mailer.='<td style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">'.$size.'</td>';
						}if(!empty($color)){
							$mailer.='<td style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">'.$color.'</td>';	 
					}
					$mailer.='<td style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">1</td>						
					</tr>					
					<tr style="border-bottom: 2px solid lightgray;height: 35px;">						
						<td style="text-align: left;padding: 8px;min-height: 35px;"></td>
						<td style="text-align: left;padding: 8px;min-height: 35px;"></td>';				
					if(!empty($size)){
						$mailer.='<td style="text-align: left;padding: 8px;min-height: 35px;"></td>	';
					}if(!empty($color)){										
						$mailer.='<td style="text-align: left;padding: 8px;min-height: 35px;"></td>';
					} 
					$mailer.='														
						<td style="text-align: left;padding: 8px;min-height: 35px;"></td>						
					</tr>					
				</table>
			</div>
		</body>
		</html>';		
		//echo $mailer;die;
		
		$this->email->message($mailer);
		if(!$this->email->send()){
		        echo $this->email->print_debugger();
		}else{
			$this->session->set_flashdata('success','Product Successfully Redeemed.');		
			redirect('dashboard/redemption_history');
		}
		
	}

	public function redemption_history(){
		$redumtionHistory =$this->dashboard->get_redeem_product_history();
		$redumtionHistory = json_decode($redumtionHistory,true);
		$data['profile']=$this->dashboard->user_info();
		$data['redeem_product_history']=$redumtionHistory;		
		$this->load->view('dashboard/product_redemption_history',$data);
	}



	
	public function user_profile(){			
		$data['profile']=$this->dashboard->user_info();			
		$this->load->view('dashboard/profile',$data);
	}
	
	public function edit_profile(){
		$data['profile']=$this->dashboard->user_info();		
		$this->load->view('dashboard/profile_edit',$data);
	}
	
		public function profile_update(){
		$this->form_validation->set_rules('first_name','First Name','trim|required|min_length[3]',array('required' => '%s is required.'));
		$this->form_validation->set_rules('last_name','Last Name','trim|required',array('required' => '%s is required.'));
		$this->form_validation->set_rules('email','Email','trim|required|valid_email',array('required' => '%s is required.'));

		$this->form_validation->set_rules('mobile','Phone','trim|required',array('required' => '%s is required.'));
		
		$this->form_validation->set_rules('displayname','User Name','trim|required',array('required' => '%s is required.'));
		

		if($this->form_validation->run()==FALSE){
			$data['profile']=$this->dashboard->user_info();
			//echo "<pre>";print_r($data['profile']);die;
			$this->load->view('dashboard/profile_edit',$data);
		}else{
			$data_profile = array(
			'device_token' => device_token,
			'timestamp' => date('mdY'),
			'signature' => '5860915bc81ed150dfc79a0cc15171cbe2f254cde0739c69b10fef376f4d126c',
			'firstname' => $this->input->post('first_name', true),
			'lastname' => $this->input->post('last_name', true),
			'email' => $this->input->post('email', true),
			'mobile' => $this->input->post('mobile', true),
			'displayname' => $this->input->post('displayname', true),
		    'address_line1' => $this->input->post('address_line1', true),
		    'address_line2' => $this->input->post('address_line2', true),
		    'city' => $this->input->post('city', true),
		    'state' => $this->input->post('state', true),
		    'country' => $this->input->post('country', true),
		    'zipcode' => $this->input->post('zipcode', true)
		);
			//echo "<pre>";print_r($data_profile);die;
            $response=$this->dashboard->update_profile($data_profile);
            $response = json_decode($response,true);
            if($response['message']=='success'){
            $this->session->set_flashdata('msg_success','Information Successfully Updated');
            	return redirect('dashboard/user_profile');
            }else{
            	$this->session->set_flashdata('error',$response['message']);
            	return redirect($_SERVER['HTTP_REFERER']);
            }

		}
	}		
	
	

	public function faq(){
		$data['profile']=$this->dashboard->user_info();
		$data['fnq'] = $this->dashboard->get_all_faq();
		$this->load->view('dashboard/faq',$data);
	}

	public function video_tutorials(){
		$data['profile']=$this->dashboard->user_info();
		$this->load->view('dashboard/video_tutorials',$data);
	}	
	
	public function  logout(){		
		session_destroy();		
		redirect(base_url());
	}

		
	public function privacy_policy(){
		$data['profile']=$this->dashboard->user_info();
		$data['privacy'] = $this->dashboard->get_privacy_policy();		
		$this->load->view('dashboard/privacy_policy',$data);
	}
	
	public function tnc_page(){
		$data['profile']=$this->dashboard->user_info();
		$data['tnc'] = $this->dashboard->get_tnc_page();		
		$this->load->view('dashboard/tnc',$data);
	}
	
	
	

	


	



	




		

	

	

	
	
}?>

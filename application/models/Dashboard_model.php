<?php 

class Dashboard_model extends CI_Model {

	public function getAllProductSizes()
	{
		$sql = $this->db->select('*')
				->from('product_category_sizes')				
				->get();
		$result = $sql->result_array();
		return $result;
	}

	public function getAllProductColors()
	{
		$sql = $this->db->select('*')
				->from('products')				
				->get();
		$result = $sql->result_array();
		return $result;
	}

	public function authenticate($postdata){	
			$urlstring = http_build_query($postdata);
			$url = API_URL.'auth/phone_login';
			//echo $url;die;			 			
			$curl = curl_init();
			curl_setopt_array($curl, array(
  			CURLOPT_URL => $url,
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => '',
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 0,
  			CURLOPT_FOLLOWLOCATION => true,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,  			
  			CURLOPT_CUSTOMREQUEST => 'POST',
  			CURLOPT_POSTFIELDS => $urlstring,
  		));		
		$response = curl_exec($curl);		
		curl_close($curl);			
		$response = json_decode($response,true);			
		return $response;
	}	

	public function validate_otp($postdata){		
		$urlstring= http_build_query($postdata);
		$device_token = $postdata['device_token'];
		$url = API_URL.'auth/verify_phone_login_otp';		
		$curl = curl_init();
		curl_setopt_array($curl, array(
  		CURLOPT_URL => $url,
  		CURLOPT_RETURNTRANSFER => true,
  		CURLOPT_ENCODING => '',
  		CURLOPT_MAXREDIRS => 10,
  		CURLOPT_TIMEOUT => 0,
  		CURLOPT_FOLLOWLOCATION => true,
  		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,  			
  		CURLOPT_CUSTOMREQUEST => 'POST',
  		CURLOPT_POSTFIELDS => $urlstring,
  		CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded','authorisation:'.$device_token),
		));		
		$response = curl_exec($curl);
		curl_close($curl);		
		return $response;
	}
	
	
	public function otp_resend($postdata){
			$urlstring = http_build_query($postdata);
			$url = API_URL.'auth/send_otp';
			//echo $url;die;			 			
			$curl = curl_init();
			curl_setopt_array($curl, array(
  			CURLOPT_URL => $url,
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => '',
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 0,
  			CURLOPT_FOLLOWLOCATION => true,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,  			
  			CURLOPT_CUSTOMREQUEST => 'POST',
  			CURLOPT_POSTFIELDS => $urlstring,
  		));		
		$response = curl_exec($curl);		
		curl_close($curl);						
		return $response;
		
	}

	public function user_info(){		
		$accesstoken = $this->session->userdata['isLoggedIn']['token'];		
		$url = API_URL.'api/user_info';			
		$curl = curl_init();
		curl_setopt_array($curl, array(
  		CURLOPT_URL => $url,
  		CURLOPT_RETURNTRANSFER => true,
  		CURLOPT_ENCODING => '',
  		CURLOPT_MAXREDIRS => 10,
  		CURLOPT_TIMEOUT => 0,
  		CURLOPT_FOLLOWLOCATION => true,
  		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  		CURLOPT_CUSTOMREQUEST => 'GET',
  		CURLOPT_HTTPHEADER => array(
    		'Content-Type: application/x-www-form-urlencoded',
    		'authorisation:'.$accesstoken,
    		'latitude:'.latitude,
    		'longitude:'.longitude,
			'device_type:'.device_type,     		
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);		
		$profiledata = json_decode($response,true);					
		return $profiledata;		
	}

	public function update_profile($data_profile){
		$accesstoken = $this->session->userdata['isLoggedIn']['token'];			
		$urlstring = http_build_query($data_profile);
		$url = API_URL.'api/update_user_profile';
		$curl = curl_init();
			curl_setopt_array($curl, array(
  			CURLOPT_URL => $url,
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => '',
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 0,
  			CURLOPT_FOLLOWLOCATION => true,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,  			
  			CURLOPT_CUSTOMREQUEST => 'POST',
  			CURLOPT_POSTFIELDS => $urlstring,
  			CURLOPT_HTTPHEADER => array(
  			'Content-Type: application/x-www-form-urlencoded',
  			'authorisation:'.$accesstoken,
			'latitude:'.latitude,
    		'longitude:'.longitude,
			'device_type:'.device_type,   
  			),
		));		
		$response = curl_exec($curl);		
		curl_close($curl);	
		//echo $response;die;		
		return $response;
	}


	public function get_products(){
		$url = API_URL.'apiGaming/get_products';
		$accesstoken = $this->session->userdata['isLoggedIn']['token'];
		$curl = curl_init();
		curl_setopt_array($curl, array(
  		CURLOPT_URL => $url,
  		CURLOPT_RETURNTRANSFER => true,
  		CURLOPT_ENCODING => '',
  		CURLOPT_MAXREDIRS => 10,
  		CURLOPT_TIMEOUT => 0,
  		CURLOPT_FOLLOWLOCATION => true,
  		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  		CURLOPT_CUSTOMREQUEST => 'GET',
  		CURLOPT_HTTPHEADER => array(
    		'Content-Type: application/x-www-form-urlencoded',
    		'authorisation:'.$accesstoken,
    		'latitude:'.latitude,
    		'longitude:'.longitude,
			'device_type:'.device_type,
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		//echo $response;
		$productListdata = json_decode($response,true);
		return $productListdata;
		
	}

	public function redeem_product($product_id){			
		$data= array(
			'product_id' => $product_id,
			'product_type' => $_GET['product_type'],
			'size' => $_GET['size'],
			'color' => $_GET['color'],
		);
		$accesstoken = $this->session->userdata['isLoggedIn']['token'];
		$urlstring= http_build_query($data);
		$url = API_URL.'apiGaming/redeem_product';
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => $urlstring,
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/x-www-form-urlencoded',
		    'authorisation:'.$accesstoken,
			'latitude:'.latitude,
    		'longitude:'.longitude,
			'device_type:'.device_type,
		    ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		//echo $response;
		return $response;		
	}


	public function get_redeem_product_history(){
		$accesstoken = $this->session->userdata['isLoggedIn']['token'];
		$url = API_URL.'apiGaming/get_redeem_product_history';
		$curl = curl_init();
		curl_setopt_array($curl, array(
  		CURLOPT_URL => $url,
  		CURLOPT_RETURNTRANSFER => true,
  		CURLOPT_ENCODING => '',
  		CURLOPT_MAXREDIRS => 10,
  		CURLOPT_TIMEOUT => 0,
  		CURLOPT_FOLLOWLOCATION => true,
  		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  		CURLOPT_CUSTOMREQUEST => 'GET',
  		CURLOPT_HTTPHEADER => array(
    		'Content-Type: application/x-www-form-urlencoded',
    		'authorisation:'.$accesstoken,
			'latitude:'.latitude,
    		'longitude:'.longitude,
			'device_type:'.device_type,
    	),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
	}

	public function check_facebook_user($postfields){		
		$urlstring = http_build_query($postfields);
		//echo $urlstring;die;
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'Auth/facebook_signup',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $urlstring,
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
		 	
	}
	
	public function check_google_user($google_post_data){
		$urlstring = http_build_query($google_post_data);
		//echo $urlstring;die;
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'Auth/google_signup',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $urlstring,
		CURLOPT_HTTPHEADER => array(
		'Content-Type: application/x-www-form-urlencoded',
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
		//print_r($response);		
	}
	
	public function check_twitter_user($twitterUserData){
		$urlstring = http_build_query($twitterUserData);
		//echo $urlstring;die;
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => API_URL.'Auth/twitter_signup',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $urlstring,
		CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		//echo $response;die;	
		return $response;		
	}
	
	public function get_tnc_page(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => API_URL.'GuestUser/page_details',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('page_name' => 'terms_and_conditions'),		  
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response,true);
	}
	
	public function get_privacy_policy(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => API_URL.'GuestUser/page_details',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('page_name' => 'privacy_policy'),		  
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response,true);
	}

	

	public function get_all_faq(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://uddadev.triazinesoft.com/index.php/v2_8/guestUser/getAllFaq',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_HTTPHEADER => array(
			'Cookie: _pk_ses.1.c639=%2A; _pk_cvar.1.c639=false; _pk_id.1.c639=ac3e69fe284ecd04.1609840062.91.1611736544..; ci_session=4akh6iu4jggcte9gjfp0b4j2frdd2oms'
		),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response,true);
	}


	




}
?>
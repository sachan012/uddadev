<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{	
	public function __construct(){
		parent::__construct();							
		$this->load->model('Dashboard_model','dashboard');			
	}

	public function index(){		
		/*----------------------Facebook login code -----------------------------*/
		include_once APPPATH.'vendor/autoload.php';
		if(!session_id()){session_start();}	

		$facebook = new Facebook\Facebook([
		  'app_id' => fb_App_Id,
		  'app_secret' => fb_App_Secret,
		  'default_graph_version' => fb_App_Version,
		]);		
		$facebook_helper = $facebook->getRedirectLoginHelper();		
		$facebook_permissions = ['email']; // Optional permissions
		$data['facebook_login_url'] = $facebook_helper->getLoginUrl(base_url('login/fblogin'), $facebook_permissions);

		/*----------------------Google login code -----------------------------*/
		include_once APPPATH.'libraries/vendor/autoload.php';
		// google Api client id
		$google_client = new Google_Client();		     
		$google_client->setClientId('843265414680-0ecn5f2igo9j4knq8t8vojh0p5ou8gdi.apps.googleusercontent.com');
		// google Api secret key
		$google_client->setClientSecret('VHmZIikfxbggan8BIWd5xVLw');
		// google Api redirect Url
		$google_client->setRedirectUri(base_url().'login/googleLogin');
		// google Api Project name
		$google_client->setApplicationName('udda redemption portal');  
		$google_client->addScope('email');
		$google_client->addScope('profile');
		$data['google_login_button'] = $google_client->createAuthUrl();			
		$this->load->view('home',$data);		
	}


	public function fbLogin(){
		/*----------------------Facebook login code -----------------------------*/
		include_once APPPATH.'vendor/autoload.php';
		if(!session_id()){session_start();}		
		$facebook = new Facebook\Facebook([
		  'app_id' => fb_App_Id,
		  'app_secret' => fb_App_Secret,
		  'default_graph_version' => fb_App_Version,
		]);		
		$facebook_helper = $facebook->getRedirectLoginHelper();
		if(isset($_GET['code'])){
			if(isset($_SESSION['access_token'])){
				$access_token = $_SESSION['access_token'];
			}else{
				$access_token = $facebook_helper->getAccessToken();
				$_SESSION['access_token'] = $access_token;
				$facebook->setDefaultAccessToken($_SESSION['access_token']);
			}
			
			try {
			  $response = $facebook->get('/me?fields=name,email,first_name,last_name',$access_token);			  
			} catch(Facebook\Exceptions\FacebookResponseException $e) {			
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {			  
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}
			
			$graphNode = $response->getGraphNode();	
			//print_r($graphNode);die;
			$postfields = array(
								'fb_id' 		=> 	$graphNode['id'],								
								'latitude'		=>	latitude,
								'longitude'		=>	longitude,
								'device_type'	=>	device_type,
								'login_by' 		=> 	'facebook',
								);			
			$fb_user = $this->dashboard->check_facebook_user($postfields);	
			$fb_user = json_decode($fb_user,true);
			//echo "<pre>";print_r($fb_user);die;
			if($fb_user['error']==1){				
				$this->session->unset_userdata('access_token');
				$this->session->set_flashdata('error_msg','Invalid User');
				redirect(base_url());		
			}else{	
				$this->session->set_userdata('isLoggedIn',$fb_user['data']);
				//echo "<pre>";print_r($this->session->all_userdata());die;					
				redirect('dashboard/productList');	
				
			}
		}

	}
	
	
	public function googleLogin(){
		/*----------------------Google login code -----------------------------*/
		include_once APPPATH.'libraries/vendor/autoload.php';
		$google_client = new Google_Client();		     
		$google_client->setClientId('843265414680-0ecn5f2igo9j4knq8t8vojh0p5ou8gdi.apps.googleusercontent.com'); // google Api client id
		$google_client->setClientSecret('VHmZIikfxbggan8BIWd5xVLw'); // google Api secret key
		$google_client->setRedirectUri(base_url().'login/googleLogin');  // google Api redirect Url
		$google_client->setApplicationName('udda redemption portal');  // google Api Project name
		$google_client->addScope('email');
		$google_client->addScope('profile');
		
		if(isset($_GET['code'])){
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
			if(!isset($token["error"])){
				$google_client->setAccessToken($token['access_token']);				
				$google_service = new Google_Service_Oauth2($google_client);
				$google_client_userdata = $google_service->userinfo->get();	
				//echo "<pre>";print_r($google_client_userdata['id']);die;
				$google_post_data = array(
									'google_id'	=>	$google_client_userdata['id'],									
									'device_type'	=>	device_type,
									'latitude'		=>	latitude,
									'longitude'		=>	longitude,
									'login_by' 		=> 'google',
								);				
				$google_user = $this->dashboard->check_google_user($google_post_data);
				$google_user = json_decode($google_user,true);				
				//echo "<pre>";print_r($google_user['error']);die;				
				if($google_user['error']==1){				
					$this->session->set_flashdata('error_msg','Invalid User');
					redirect(base_url());		
				}else{					
					$this->session->set_userdata('isLoggedIn',$google_user['data']);										
					redirect('dashboard/productList');
				}
			}
		}
		
	}

	/*=========================== twitter Login =====================================*/
	public function twitter_callback_uri(){
	
		include_once APPPATH.'libraries/TwitterOAuth/OAuth.php';
		include_once APPPATH.'libraries/TwitterOAuth/twitteroauth.php';

		 //Twitter API Configuration
	    $consumerKey = 'tpLnNCBe3EotfMjho7KColzr9';
	    $consumerSecret = 'hmfbWyV4r99XAawuINTuajXp4ia5YnkiL8yORd8OmRCUrYYs6V';
	  	$oauthCallback = base_url('login/twitter_callback_uri');

	    if(!session_id()){session_start();}	
	    //Get existing token and token secret from session
	    $sessToken = $this->session->userdata('token');
	    $sessTokenSecret = $this->session->userdata('token_secret');

	    //Get status and user info from session
		$sessStatus = $this->session->userdata('status');
		$sessUserData = $this->session->userdata('userData');

		if($this->input->get('oauth_token') !== null && $sessToken == $this->input->get('oauth_token')){
		        //Successful response returns oauth_token, oauth_token_secret, user_id, and screen_name
		        $connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessToken, $sessTokenSecret);
		        $accessToken = $connection->getAccessToken($this->input->get('oauth_verifier'));
		        if($connection->http_code == '200'){
		            //Get user profile info
		            $userInfo = $connection->get('account/verify_credentials', ['include_email' => "true"]);
		            //Preparing data for database insertion
		            $name = explode(" ",$userInfo->name);
		            $first_name = isset($name[0])?$name[0]:'';
		            $last_name = isset($name[1])?$name[1]:'';
		            $twitterUserData = array(
		                'oauth_provider' => 'twitter',
		                'oauth_uid' => $userInfo->id,
		                'latitude'		=>	latitude,
						'longitude'		=>	longitude,
						'device_type'	=>	device_type,
		            );
		            //echo "<pre>";print_r($twitterUserData); 
		            $twt_user = $this->dashboard->check_twitter_user($twitterUserData); 
		            $twt_user = json_decode($twt_user,true);
					//echo "<pre>";print_r($fb_user);die;
					if($twt_user['error']==1){				
						$this->session->set_flashdata('error_msg','Invalid User');
						session_destroy();
						redirect(base_url());		
					}else{	
						$this->session->set_userdata('isLoggedIn',$twt_user['data']);
						//echo "<pre>";print_r($this->session->all_userdata());die;					
						redirect('dashboard/productList');	
						
					}
		        }else{
		        	//unset token and token secret from session
        			$this->session->unset_userdata('token');
        			$this->session->unset_userdata('token_secret');
        			return redirect(base_url());
		            
		        }
		    }

		
				
	}


	

	public function verify_phone(){	
		$this->form_validation->set_rules('phone','Phone number','trim|required|numeric|integer|min_length[10]|max_length[15]',array('required' => '%s is required.','min_length' =>'Not a valid phone number','max_length' =>'Not a valid phone number','numeric'=>'Phone number must be numeric.It should not contain alphabets and special characters.'));	
		if($this->form_validation->run()==FALSE){
			$response = array(
                'status' => 'error',
                'phone_no_error' => form_error('phone','<div class="error">','</div>')
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
		}else{
				$phone = trim($this->input->post('phone',TRUE));
				$postdata= array(
					'phone' 		=> "1".$phone,
					'latitude' 		=>	latitude ,
					'longitude' 	=>	longitude,
					'device_type' 	=>	device_type,
					'device_token'	=> 	device_token,
				);						
			$logindata=$this->dashboard->authenticate(($postdata));
				//echo "<pre>";print_r($logindata);die;
			$this->output->set_content_type('application/json')->set_output(json_encode($logindata));
			}
	}

	public function verify_otp(){
		$phone 	= 	$this->security->xss_clean($this->input->post('phone',TRUE));
		$otpf1	=	$this->security->xss_clean($this->input->post('otpBox1',TRUE));
		$otpf2	=	$this->security->xss_clean($this->input->post('otpBox2',TRUE));
		$otpf3	=	$this->security->xss_clean($this->input->post('otpBox3',TRUE));
		$otpf4	=	$this->security->xss_clean($this->input->post('otpBox4',TRUE));
		$otp	=	$otpf1.''.$otpf2.''.$otpf3.''.$otpf4;
		//echo $otp;die;
		$postdata= array(
			'phone' 		=> 	"1".$phone,
			'otp'			=> 	$otp,
  			'latitude' 		=>	latitude ,
			'longitude' 	=>	longitude,
			'device_type' 	=>	device_type,
			'device_token'	=> 	device_token,
			'login_by'		=> 'phone',
  			); 
		$otpdata=$this->dashboard->validate_otp($postdata);	
		$otpdataarray = json_decode($otpdata,true);
		if($otpdataarray['error']==1000){
			echo $otpdata;
		}else{
			//echo "<pre>";print_r($otpdataarray);die;
			$this->session->set_userdata('isLoggedIn',$otpdataarray['data']);
			echo $otpdata;	
		}		
	}
	
	public function otp_resend(){
		$phone = $this->input->post('phone');
		$postdata= array(
					'phone' 		=> "1".$phone,
					'latitude' 		=>	latitude ,
					'longitude' 	=>	longitude,
					'device_type' 	=>	device_type,
					'device_token'	=> 	device_token,
  			); 
  		  		
		$otpdata=$this->dashboard->otp_resend($postdata);		
		echo $otpdata;
	}	
	
	public function faq_home(){
		$data['fnq'] = $this->dashboard->get_all_faq();		
		$this->load->view('faq_home',$data);
	}
	
	public function term_condition(){
		$this->load->view('term_condition');
	}
	
         public function refer_and_earn(){
		$this->load->view('refer_and_earn');
	}

	public function spin_and_win(){
		$this->load->view('spin_n_win');
	}	
	
	
}?>

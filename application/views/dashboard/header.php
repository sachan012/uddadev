<?php 
    //echo base_url(uri_string());die;
    //echo "<pre>";print_r($profile);die;
    //$this->uri->segment(2);
    if($profile['error']==1003){
        $this->session->set_flashdata('error_msg','Access expired.');
        redirect(base_url());
    }
 
    if(!$this->session->userdata('isLoggedIn')){ 
        $this->session->set_flashdata('error_msg', 'Account Logged Out');
        redirect(base_url());
    }
    //echo "<pre>";print_r($this->session->all_userdata());
    $token  =   $this->session->userdata['isLoggedIn']['token'];  
    $id = $profile['data']['id'];
    $registered_user_id = $profile['data']['registered_user_id'];
    $profile_status = $profile['data']['profile_status'];
    $firstname = $profile['data']['firstname'];
    $lastname = $profile['data']['lastname'];
    $email = $profile['data']['email'];
    $phone = $profile['data']['phone'];
    $photo = $profile['data']['photo'];    
    $latitude = $profile['data']['latitude'];
    $longitude = $profile['data']['longitude'];
    $access_token = $profile['data']['access_token'];
    $device_token = $profile['data']['device_token'];
    $my_referral_code = $profile['data']['my_referral_code'];
    $balance = $profile['data']['balance'];
    $chip_balance = $profile['data']['chip_balance'];
    $displayname = $profile['data']['displayname'];
    $address_line1 = $profile['data']['shipping_address']['address_line1'];
    $address_line2 = $profile['data']['shipping_address']['address_line2'];
    $city = $profile['data']['shipping_address']['city'];
    $state = $profile['data']['shipping_address']['state'];
    $zipcode = $profile['data']['shipping_address']['zipcode'];
    $country = $profile['data']['shipping_address']['country'];
    $level_name = $profile['data']['level_array']['level_name'];
    //if($token!=$access_token){redirect('auth/logout');}
    //var_dump($chip_balance);die;    
    if(empty($photo)){
        $photo=base_url('assets/images/profile.png');
    }  
?>




<div class="d-flex headerDiv">
<button class="btn_toggle" id="menu-toggle"><i class="fa fa-bars fa-lg"></i></button>
    <div class="uddaLogoDiv text-center">
        <img src="<?php echo base_url();?>assets/images/UDDA_Dashboard_Logo.png" class="img-fluid uddaLogoImgweb">
    </div>
    
    <div class="font-weight-bold bg-light-green d-flex align-items-center flex-grow-1 pl-2 py-2"></div>
    <div class=" bg-light-green border-left d-flex flex-column justify-content-center px-2 py-2 mobile-d-none">
        <p class="m-0">AVAILABLE UDDA BUCKS</p>
        <p class="m-0 font-weight-bold"><img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-1"><?php echo number_format($chip_balance, 2);?></p>
    </div>
    <div class=" d-flex align-items-center border-left pl-2 py-2">
        <div class="mr-2 mobile-d-none">
            <p class="m-0">ACCOUNT NAME</p>
            <p class="m-0 font-weight-bold"><?php echo $displayname;?></p>
        </div>
        <img src="<?php echo $photo;?>" class="img-fluid avatar rounded-circle mr-2 border mobile-d-none ProfileImg">

        <div class="dropdown desktop-d-none">
            <img src="<?php echo $photo;?>" class="dropdown-toggle img-fluid avatar rounded-circle mr-2 border ProfileImg" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                <div class="mb-2 border-bottom pb-2">
                    <p class="m-0">ACCOUNT NAME</p>
                    <p class="m-0 font-weight-bold"><?php echo $displayname;?></p>
                </div>
                <p class="m-0">AVAILABLE UDDA BUCKS</p>
                <p class="m-0 font-weight-bold border-bottom pb-3 mb-3"><img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-1"><?php echo number_format($chip_balance, 2);?></p>
                <a href="<?php echo base_url('dashboard/logout');?>" class="text-muted"><img src="<?php echo base_url();?>assets/images/logout_icon.png" class="logoutImg mr-2"> Logout </a>
            </div>

        </div>

        <a href="<?php echo base_url('dashboard/logout');?>"><img src="<?php echo base_url();?>assets/images/logout_icon.png" class="logoutImg mobile-d-none"></a>
    </div>
</div>  
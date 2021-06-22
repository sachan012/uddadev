<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller{	
	public function __construct(){
        parent::__construct();
        define('authorisation','0xLyU4qmVFmYgUcq8oyhBlTOE3cHRJJtt4knp6bzZ5vdNuBPh71G2ZMQieraoHWK');					
    }

/* ============================== Custom Pool ======================================== */
    public function custom_pool(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://uddadev.triazinesoft.com/index.php/v2_8/Custom_PoolGaming/share_custom_pool_info/MUlTazAweUtzWjJ4R3l2UnZKdFFidz09',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'authorisation:'.authorisation,           
        ),
        ));
        $response = curl_exec($curl);
        $result =json_decode($response,true); 
        curl_close($curl);
        if($result['error']==0){       
        $data['pool_name'] = $result['data']['custom_pool_info']['pool_name'];
        $data['pool_amount'] = $result['data']['custom_pool_info']['pool_amount'];
        $data['pool_amount'] = $result['data']['custom_pool_info']['pool_amount'];        
        $data['created_at'] = $result['data']['bet_detail']['created_at'];
        $data['firstname'] = $result['data']['bet_user_info']['firstname'];
        $data['lastname'] = $result['data']['bet_user_info']['lastname'];  
        $data['pool_expired_on'] = $result['data']['opposite']['pool_expired_on'];    
        
        $my_answer_type = $result['data']['custom_pool_info']['my_answer_type'];
        if($my_answer_type==1){
            $data['my_answer'] = $result['data']['custom_pool_info']['my_answer_date'];
        }else{
            $data['my_answer'] = $result['data']['custom_pool_info']['my_answer_text']; 
        }
        $data['total_bet_counts'] = count($result['data']['people_list']);        
        $this->load->view('app_pages/custom-pool',$data); 
    }else{
       redirect(base_url());
    }      
}


/* =================================== Private Contest ======================================= */
public function private_contest(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://uddadev.triazinesoft.com/index.php/v2_8/PrivateContest/get_share_private_contest_info/dTBJUDA1K1hidDhaSGFhN2N3aTdhZz09/1672',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'authorisation:'.authorisation,
        'Cookie: _pk_ses.1.c639=%2A; _pk_cvar.1.c639=false; _pk_id.1.c639=ac3e69fe284ecd04.1609840062.28.1609934987..; ci_session=2bnsvtaogrevvh5m7fs8b6jn2juthdu9'
    ),
    ));

    $response = curl_exec($curl);
    $result =json_decode($response,true); 
    curl_close($curl);
    if($result['error']==0){
        $data['creator'] = $result['data']['private_contest_details']['creator'];
        $data['contest_name'] = $result['data']['private_contest_details']['contest_name'];
        $data['contest_start_date'] = $result['data']['private_contest_details']['contest_start_date'];
        $data['contest_end_date'] = $result['data']['private_contest_details']['contest_end_date'];
        $data['join_fee'] = $result['data']['private_contest_details']['join_fee'];
        $data['contest_start_date'] = $result['data']['private_contest_details']['contest_start_date'];
        $data['contest_end_date'] = $result['data']['private_contest_details']['contest_end_date'];
        $data['last_date_to_register'] = $result['data']['private_contest_details']['last_date_to_register'];  
        $data['min_bet_amount'] = $result['data']['private_contest_details']['min_bet_amount'];
        $data['max_bet_amount'] = $result['data']['private_contest_details']['max_bet_amount'];
        $data['contest_start_date_timestamp'] = $result['data']['private_contest_details']['contest_start_date_timestamp'];
        $data['contest_end_date_timestamp'] = $result['data']['private_contest_details']['contest_end_date_timestamp'];
        $data['ContestType'] = $result['data']['private_contest_details']['ContestType'];
        $data['league_id'] = $result['data']['private_contest_details']['league_id'];
        $data['league_name'] = $result['data']['private_contest_details']['league_name'];
        $data['winning_type'] = $result['data']['private_contest_details']['winning_type'];
        $data['prize_type'] = $result['data']['private_contest_details']['prize_type'];      
        $this->load->view('app_pages/private-contest',$data);
    }else{
        redirect(base_url());
    }     

}


public function baby_bingo(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://uddadev.triazinesoft.com/index.php/v2_8_1/custom_bingo/share_info_bingo_gifts/Mlh1UDR0VUN0WEZMdnhXU29QZlB5dz09',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array('authorisation:'.authorisation),
    ));

    $response = curl_exec($curl);
    curl_close($curl);    
    $result =json_decode($response,true);   
    if($result['error']==0){
       //echo "<pre>";print_r($result['data']);die;
        $data['bingo_title'] =  $result['data']['custom_bingo_info']['bingo_title'];    
        $data['bingo_start_on'] =  $result['data']['custom_bingo_info']['bingo_start_on'];    
        $data['firstname'] =  $result['data']['bet_user_info']['firstname']; 
        $data['all_gifts'] = $result['data']['all_gifts'];   
        $data['created_at'] = $result['data']['custom_bingo_info']['created_at'];   
        $this->load->view('app_pages/baby-bingo',$data);       
    }else{
        redirect(base_url());
    }      

}

public function private_bet(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://uddadev.triazinesoft.com/index.php/v2_8_1/apiGaming/share_propbet_info/TzVsOTh1NXozSDhSSmxLWFpJdmg5Zz09/odds',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'authorisation: 0xLyU4qmVFmYgUcq8oyhBlTOE3cHRJJtt4knp6bzZ5vdNuBPh71G2ZMQieraoHWK',
        'Cookie: _pk_ses.1.c639=%2A; _pk_cvar.1.c639=false; ci_session=269gnoo9cvq3ripa0n7agdc6l95uj1hg; _pk_id.1.c639=ac3e69fe284ecd04.1609840062.52.1610091780..'
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $result =json_decode($response,true);   
    if($result['error']==0){
        $data['firstname'] = $result['data']['bet_user_info']['firstname'];              
        $data['created_at'] = $result['data']['bet_detail']['created_at'];  
        $data['people_list'] = $result['data']['people_list'];  
        $data['side_team_odd'] =  $result['data']['side_team_odd'];
        $data['opposite_team_odds'] =  $result['data']['opposite_team_odds']; 
        $data['bet_amount'] =  $result['data']['bet_detail']['bet_amount'];
        $data['amount_to_win'] =  $result['data']['bet_detail']['amount_to_win'];  
        $data['answer'] =  $result['data']['opposite']['answer'];  
        $data['participants'] =  $result['data']['opposite']['answer'];  
        $data['total_people'] = $result['data']['bet_detail']['total_people'];
        $data['total_people_amount'] = $result['data']['bet_detail']['total_people_amount'];
        $data['available_betamount'] = $result['data']['available_betamount'];
        $this->load->view('app_pages/private-bet',$data);        
    }else{
        redirect(base_url());
    }    
}

public function private_custom_bet(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://uddadev.triazinesoft.com/index.php/v2_8_1//apiGaming/share_custom_propbet_info/Mlh1UDR0VUN0WEZMdnhXU29QZlB5dz09/custom_prop',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'authorisation: 0xLyU4qmVFmYgUcq8oyhBlTOE3cHRJJtt4knp6bzZ5vdNuBPh71G2ZMQieraoHWK',
        'Cookie: _pk_ses.1.c639=%2A; _pk_cvar.1.c639=false; ci_session=269gnoo9cvq3ripa0n7agdc6l95uj1hg; _pk_id.1.c639=ac3e69fe284ecd04.1609840062.52.1610091780..'
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $result =json_decode($response,true);   
    if($result['error']==0){
        $data[]='';
        $this->load->view('app_pages/private-custom-bet',$data);        
    }else{
        redirect(base_url());
    }

}








}?>
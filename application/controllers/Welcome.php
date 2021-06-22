<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
		parent::__construct();							
		$this->load->model('Dashboard_model','dashboard');			
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function sendmail(){       
            $product_id=11;
            $data['profile']=$this->dashboard->user_info();			
            $redeemProduct=$this->dashboard->redeem_product($product_id);           	
            $redumtionHistory = json_decode($redumtionHistory,true);
    
            $redeem_product_id = $redumtionHistory['data']['redeem_product_history_array'][0]['redeem_product_id'];
            $product_id = $redumtionHistory['data']['redeem_product_history_array'][0]['product_id'];
            $product_name = $redumtionHistory['data']['redeem_product_history_array'][0]['product_name'];
            $product_image = $redumtionHistory['data']['redeem_product_history_array'][0]['product_image'];
            $product_code = $redumtionHistory['data']['redeem_product_history_array'][0]['product_code'];
            $product_value = $redumtionHistory['data']['redeem_product_history_array'][0]['product_value'];
            $redeem_date = $redumtionHistory['data']['redeem_product_history_array'][0]['redeem_date'];
    
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
            $this->email->to('sachanprashant223@gmail.com');
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
                            <td style="text-align:center; width: 100%;font-weight: 400;font-size: 1rem;padding-bottom: 1%;padding-top: 1%;">Thank you for redeeming UDDA Bucks for <img src=" '.base_url().'assets/images/udda_bucks.png" class="mr-1">'.number_format($product_value,2).'.<br> Your gift will arrive in 2-3 weeks and you will receive shipping notification when your order ships</td>
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
                                <p style="margin-bottom: 0;margin-top: 2%;">'.$address_line1.' '.$address_line2.'<br>'.$city.' '.$state.'-'.$zipcode.' '.$country.' <br>Email:
                                    '.$email.'<br>Phone: '.$phone.'</p>
                            </td>
                            <td style="width: 24%;text-align: right;vertical-align: top;padding: 1% 2%;">
                                Order id# : '.$redeem_product_id.'
                            </td>
                        </tr>
                    </table>
                    <table id="itemTable"
                        style="margin: 1% 0;border: 2px solid lightgray;font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
                        <tr style="border-bottom: 2px solid lightgray;height: 35px;background-color: #f4f4f4;">
                            <th
                                style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">
                                #</th>
                            <th style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">Item#</th>
                            <th style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">Image#</th>
                            <th style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">Product Description</th>						
                            <th style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">Quantity</th>						
                        </tr>
                        <tr style="border-bottom: 2px solid lightgray;height: 35px;">
                            <td style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">1</td>
                            <td style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">'.$product_code.'</td>
                            <td style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">'.$product_code.'</td>
                            <td style="border: 1px solid #dddddd;border-right: 2px solid lightgray;text-align: left;padding: 8px;min-height: 35px;">'.$product_name.'</td>						
                            <td style="text-align: center;border: 1px solid #dddddd;border-right: 2px solid lightgray;padding: 8px;min-height: 35px;">1</td>						
                        </tr>
                        
                        <tr style="border-bottom: 2px solid lightgray;height: 35px;">
                            <td style="text-align: left;padding: 8px;min-height: 35px;"></td>
                            <td style="text-align: left;padding: 8px;min-height: 35px;"></td>
                            <td style="text-align: left;padding: 8px;min-height: 35px;"></td>
                            <td style="text-align: left;padding: 8px;min-height: 35px;"></td>					
                            <td style="text-align: left;padding: 8px;min-height: 35px;"></td>						
                        </tr>
                        
                    </table>
                </div>
            </body>
            </html>';	
            
            $this->email->message($mailer);
            if(!$this->email->send()){
                    echo $this->email->print_debugger();
            }else{
               echo "success";
            }
            
        }


  

	

}

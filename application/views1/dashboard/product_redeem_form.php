<?php 
    if(empty($product_size)){
        $product_size = ''; 
    }else{
        $product_size = explode(',',$product_size); 
    }

    if(empty($product_colors)){
        $product_colors = ''; 
    }else{
        $product_colors = explode(',',$product_colors); 
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UDDA Dashboard| Redeem Swag</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"> 
    <?php include 'stylesheets.php';?>   
    <style type="text/css">
        .form-error{color:red;}
    </style>
</head>
<body>
    <div class="d-flex parentFlexGrowStyle bg-light-green" id="wrapper">
        <!-- ===================== Sidebar Starts =====================-->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <?php include 'left_sidebar.php';?>
        </div>
        <!-- ===================== Sidebar Ends =====================-->    
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom p-0 fixed-top">
                <?php include 'header.php';?>
            </nav>
            <div class=" p-2 rightSection">
                <div class="bg-white redeem-container border rounded">
                    <h2>You are going to Redeem <span class="text-info"><?php echo $product_name;?></span></h2>
                    <?php 
                        $hidden = array(
                            'product_id' => $product_id,
                            'product_name' => $product_name,
                            'product_value' => $product_value, 
                            'product_code' => $product_code,
                            'product_image' => $product_image, 
                            'device_token' => $access_token,
                            'datetime' => date('mmddyyyy'), 
                            'signature' => '5860915bc81ed150dfc79a0cc15171cbe2f254cde0739c69b10fef376f4d126c',
                            'first_name' => $firstname, 
                            'last_name' =>  $lastname,
                            'email' => $email, 
                            'mobile' => $phone,
                            'displayname' => $displayname,                           
                        );

                        //echo "<pre>";print_r($hidden);
                    ?>  
                     <?php echo form_open('',array('id'=>'product_redeem_form'),$this->security->xss_clean($hidden));?> 
                     <div class="row bg-white border mx-0 mt-2 table2">
                        <?php if(!empty($product_size) && !empty($product_colors)){?>
                            <div class="col-12 mt-4">
                                <p class="font-weight-bold">Select Size & Color</p>
                            </div>                                                      
                            <div class="col-md-6 mt-sm-3">                   
                                <select class="form-control inputDiv" name="shirtSize" data-validation="required" data-validation-error-msg="Select Size">
                                    <option value="">---- Select Size ----</option>
                                    <?php foreach($product_size as $ss){?>
                                    <option value="<?php echo ucwords($ss);?>"><?php echo ucwords($ss);?></option>
                                    <?php } ?>                                                                                                                
                                </select>                                 
                            </div>
                            <div class="col-md-6 mt-sm-3">                               
                                <select class="form-control inputDiv" name="shirtColor" data-validation="required" data-validation-error-msg="Select Color">
                                    <option value="">---- Select Color ----</option> 
                                    <?php foreach($product_colors as $sc){?>
                                    <option value="<?php echo ucwords($sc);?>"><?php echo ucwords($sc);?></option>
                                    <?php } ?>                                                                        
                                </select>                                 
                            </div>                            
                            <?php }else if(!empty($product_size)){?>
                            <div class="col-12 mt-4">
                                <p class="font-weight-bold">Select <?php echo $product_name;?> Size</p>
                            </div>                                                      
                            <div class="col-md-6 mt-sm-3">                   
                                <select class="form-control inputDiv" name="shirtSize" data-validation="required" data-validation-error-msg="Select Size">
                                    <option value="">---- Select Size ----</option>
                                    <?php foreach($product_size as $ss){?>
                                    <option value="<?php echo ucwords($ss);?>"><?php echo ucwords($ss);?></option>
                                    <?php } ?>                                                                                                                
                                </select>                                 
                            </div>
                            <div class="col-md-6 mt-sm-3"></div>
                            <?php }else if(!empty($product_colors)){?>
                            <div class="col-12 mt-4">
                                <p class="font-weight-bold">Select Color</p>
                            </div>   
                            <div class="col-md-6 mt-sm-3">                               
                                <select class="form-control inputDiv" name="shirtColor" data-validation="required" data-validation-error-msg="Select Color">
                                    <option value="">---- Select Color ----</option> 
                                    <?php foreach($product_colors as $sc){?>
                                    <option value="<?php echo ucwords($sc);?>"><?php echo ucwords($sc);?></option>
                                    <?php } ?>                                                                        
                                </select>                                 
                            </div>
                            <div class="col-md-6 mt-sm-3"></div>
                            <?php }?>
                            <div class="col-12 mt-4">
                                <p class="font-weight-bold">Check & update your Shipping Details</p>
                                <span id="api_error_msg" class="text-danger"></span>
                            </div>  
                        <div class="col-md-6 mt-sm-3">                   
                            <?php echo form_input(array(                    
                                'name'=> 'first_name',
                                'id'  => 'first_name',                    
                                'class'=> 'form-control inputDiv',
                                'value'=>$firstname, 
                                'placeholder' =>'FIRST NAME',
                                'data-validation' =>'required', 
                                'data-validation-error-msg'=>'First Name is Required.',
                            ));?>                                 
                        </div>

                        <div class="col-md-6 mt-sm-3">                   
                            <?php echo form_input(array(                    
                                'name'=> 'last_name',
                                'id'  => 'last_name',                    
                                'class'=> 'form-control inputDiv',
                                'value'=>$lastname, 
                                'placeholder' =>'LAST NAME',
                                'data-validation' =>'required', 
                                'data-validation-error-msg'=>'Last Name is Required.',
                            ));?>                                    
                        </div>

                        <?php if(empty($displayname)){ ?>                         
                        <div class="col-md-6 mt-sm-3">                   
                            <?php echo form_input(array(                    
                                    'name'=> 'displayname',
                                    'id'  => 'displayname',                    
                                    'class'=> 'form-control inputDiv',
                                    'value'=>$firstname, 
                                    'placeholder' =>'USER NAME',  
                                    'data-validation' =>'required', 
                                    'data-validation-error-msg'=>'User Name is Required.',                                                   
                            ));?> 
                        </div>
                        <?php }else{ ?>
                             <div class="col-md-6 mt-sm-3"> 
                             <?php echo form_input(array(                    
                                    'name'=> 'displayname',
                                    'id'  => 'displayname',                    
                                    'class'=> 'form-control inputDiv',
                                    'value'=>$displayname, 
                                    'placeholder' =>'USER NAME', 
                                    'data-validation' =>'required', 
                                    'data-validation-error-msg'=>'User Name is Required.',                                                    
                            ));?> 
                            </div>

                        <?php }?>

                        <div class="col-md-6 mt-sm-3"></div>

                        <div class="col-md-6 mt-sm-3"> 
                        <?php if(empty($email)){ ?>                  
                            <?php echo form_input(array(                    
                                    'name'=> 'email',
                                    'id'  => 'email',                    
                                    'class'=> 'form-control inputDiv',
                                    'value'=>$email, 
                                    'placeholder' =>'EMAIL ADDRESS',
                                    'data-validation' =>'required', 
                                    'data-validation-error-msg'=>'Valid email address is Required.',

                                ));?>                       
                            <?php }else{ ?>
                                <?php echo form_input(array(                    
                                    'name'=> 'email',
                                    'id'  => 'email',                    
                                    'class'=> 'form-control inputDiv',
                                    'value'=>$email, 
                                    'placeholder' =>'EMAIL ADDRESS',
                                    'data-validation' =>'required', 
                                    'data-validation-error-msg'=>'Valid email address is Required.',
                                    'readonly' => '',

                                ));?>                        
                            <?php }?>
                        </div>

                        <div class="col-md-6 mt-sm-3">   
                            <?php if(empty($email)){ ?>  
                                <?php echo form_input(array(                    
                                    'name'=> 'mobile',
                                    'id'  => 'mobile',                    
                                    'class'=> 'form-control inputDiv',
                                    'value'=>$phone, 
                                    'placeholder' =>'MOBILE NUMBER',
                                    'data-validation' =>'required',
                                    'data-validation-error-msg'=>'Mobile Number is Required.',                          
                                ));?> 
                            <?php }else{?>                
                            <?php echo form_input(array(                    
                                    'name'=> 'mobile',
                                    'id'  => 'mobile',                    
                                    'class'=> 'form-control inputDiv',
                                    'value'=>$phone, 
                                    'placeholder' =>'MOBILE NUMBER',
                                    'data-validation' =>'required',
                                    'readonly' =>'',                            
                                ));?>  
                            <?php }?>                     
                        </div>

                        <div class="col-md-6 mt-sm-3">                   
                            <?php echo form_input(array(                    
                                    'name'=> 'address_line1',
                                    'id'  => 'add1',                    
                                    'class'=> 'form-control inputDiv',
                                    'value'=>$address_line1, 
                                    'placeholder' =>'Address Line 1',
                                    'data-validation' =>'required',
                                    'data-validation-error-msg'=>'Address Line 1 is Required.',                            
                                ));?>
                            <span>Street Address, PO BOX</span>
                        </div>
                        
                        <div class="col-md-6 mt-sm-3">                    
                            <?php echo form_input(array(                    
                                    'name'=> 'address_line2',
                                    'id'  => 'add2',                    
                                    'class'=> 'form-control inputDiv',
                                    'value'=>$address_line2, 
                                    'placeholder' =>'Address Line 2',
                                    
                                ));
                            ?> 
                            <span>Apartment, Suite, Unit, Building, Floor, etc</span>                   
                        </div>

                        <div class="col-md-6 mt-3">                    
                            <?php echo form_input(array(                    
                                'name'=> 'city',
                                'id'  => 'city',                    
                                'class'=> 'form-control inputDiv',
                                'value'=>$city, 
                                'placeholder' =>'City',                           
                                'data-validation'=>'custom',
                                'data-validation-regexp'=>'^([a-zA-Z ]+)$',                            
                                'data-validation-error-msg'=>'City is Required.',
                                ));
                            ?> 
                            <span>City</span>                       
                        </div>
                        <div class="col-md-6 mt-3">                    
                            <?php echo form_input(array(                    
                                'name'=> 'state',
                                'id'  => 'state',                    
                                'class'=> 'form-control inputDiv',
                                'value'=>$state,
                                'placeholder' =>'State/Province/Region',
                                'data-validation'=>'custom',
                                'data-validation-regexp'=>'^([a-zA-Z ]+)$',                            
                                'data-validation-error-msg'=>'State is Required.',
                                ));
                            ?>
                            <span>State</span>                      
                        </div>

                        <div class="col-md-6 mt-3">                   
                            <?php echo form_input(array(                    
                                'name'=> 'zipcode',
                                'id'  => 'zipcode',                    
                                'class'=> 'form-control inputDiv',
                                'value'=>$zipcode,  
                                'placeholder' =>'Zip',                     
                                'data-validation'=>'custom',
                                'data-validation-regexp'=>'\d{5}([ \-]\d{4})?',                        
                                'data-validation-error-msg'=>'Zip is Required.',                        
                            ));?> 
                            <span>Zip</span>                                       
                        </div>
                        <div class="col-md-6 mt-3">                   
                            <select id="country" name="country" class="form-control inputDiv" data-validation="required">
                                <option value="USA" selected>USA</option>
                            </select> 
                        </div>                            
                    
                        <div class="col-12 my-4 text-right">                                  
                            <a href="<?php echo base_url('dashboard/productList');?>" class="btn btn-info py-1 rounded-0 px-4"><< Back</a>
                            <?php if(empty($address_line1)){?>
                                <input type="submit" class="redeembtn btn btn-info text-white py-1 rounded-0 px-4" value="Update Details">
                            <?php }else{?>
                                <input type="submit" class="redeembtn btn btn-info text-white py-1 rounded-0 px-4" value="Continue">
                            <?php }?>					
                        </div> 

                    </div> 

                     <?php echo form_close()?>                 
                </div>
            </div>
        </div>
    </div>
   <!-- The OTP Modal -->
    <div class="modal fade align-middle" id="OTPModal" data-backdrop="static">
        <div class="modal-dialog redeemAlertModel modal-dialog-centered">
            <div class="modal-content text-center modal-md">
                <div class="modal-body container-fluid pt-0 pb-0">
                    <button type="button" class="close" id="close2" data-dismiss="modal" style="display: none;">×</button>                    
                </div>
                <div class="modal-body text-center">  
					<br><br>
                     <p class="text-center font-weight-bold">Are you sure you want to Redeem <?php echo $product_name;?> for <img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-1"><?php echo $product_value;?></p>
                </div>                
                <div class="modal-footer" id="footer">
					<div class="col-md-12 text-center">
					<a href="javascript:void(0);" id="btnYes" class="btn btn-info text-white py-1 rounded-0 px-4">Yes</a>
                    <button type="button" class="btn btn-info text-white py-1 rounded-0 px-4" data-dismiss="modal">Close</button>

				</div>
                </div>
              </div>
            </div>
    </div>

    <footer class="page-footer px-4 py-4 bg-light-green border-top d-flex align-items-center">
        <?php include 'footer.php';?>
    </footer>
    <!-- Bootstrap core JavaScript -->   
    <?php include 'scripts.php';?>  
     <script src="<?php echo base_url();?>assets/plugins/form-validator/jquery.form-validator.min.js"></script>
    <script>
        $.validate({ modules : 'date, security'});	
    </script>    
    <script type="text/javascript">
        $('#product_redeem_form').on('submit', function(e){                       
            $('#OTPModal').modal('show');           
              e.preventDefault();
               $("#btnYes").click( function(){
                    var datastring=$("#product_redeem_form").serialize();
                    //alert(datastring);
                    $.ajax({
                        url: '<?php echo base_url('dashboard/update_shipping_details');?>',
                        type: "POST",                    
                        data: datastring, 
                        dataType: 'json',
                            success: function(response){ 
                                console.log(response);
                                                                
                                var monu = response.message; 
                                var idd = response.productid;                            
                                var pt = response.product_type;                            
                                var size = response.shirtSize;                            
                                var color = response.shirtColor;                            
                                var error = JSON.parse(monu).error;
                                var error_msg = JSON.parse(monu).message;  
                                if(error == 0){
                                    //alert(idd);                                    
                                    $("btnYes").addClass('display','none');
									window.location.href = "<?php echo base_url('dashboard/redeem_product?product_id=');?>"+idd+"&product_type="+pt+"&size="+size+"&color="+color;
                                }else{
                                    $("#OTPModal").modal('hide');
                                    $("#api_error_msg").text(error_msg);
                                }                                                      
                            }
                        });
                    }




                );
            });
    </script>
</body>
</html>
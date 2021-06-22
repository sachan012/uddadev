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
                    <h2>Products</h2>
                    <div class="table-responsive">
                        <!-- <table class="table redeemTable"> -->
                        <table id="example" class="table table-striped table-bordered redeemTable">                        
                        <thead>
                            <tr class="bg-light-green">
                                <th scope="col" class="text-center">No#</th>
                                <th scope="col" class="text-center">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center">Code</th>
                                <th scope="col" class="text-center">Value</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $i=1;
                                foreach ($products['data']['product_array'] as $row) {
                                $value = str_replace(",", "", $row['product_value']);
                            ?>
                            <tr class="text-center">
                                <td><?php echo $i;?></td>
                                <?php $str = $row['product_image'];?>
                                <td><img src="<?php echo $str;?>" class="tableImage"></td>
                                <td class="text-left"><?php echo $row['product_name'];?></td>
                                <td><?php echo $row['product_code'];?></td>
                                <td><b><img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-1"><?php echo $row['product_value'];?></b></td>
                                <?php if($value<=$chip_balance){?>
                                <td>
                                <a href="<?php echo base_url('dashboard/redeem?product_id='.$row['product_id']);?>" class="btn btn-info py-1 rounded-0 px-4">Redeem</a></td>
                            <?php }else{ ?>
                                 <td><button type="button" class="btn btn-info py-1 rounded-0 px-4" data-toggle="modal" data-target="#redm<?php echo $row['product_id'];?>">Redeem</button></td>
                            <?php }?>
                            </tr>
                                <?php $i++; }?>
                        </tbody>
                        </table>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal -->
<?php foreach ($products['data']['product_array'] as $row) {  ?>
<div class="modal fade redeemmodal" id="redeemProduct<?php echo $row['product_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <?php // echo $row['product_name'];?>
            <h5 class="modal-title producttitle" id="exampleModalLabel">
               You are going to Redeem <?php echo $row['product_name'];?>
            </h5>			
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
        <?php 
            $hidden = array(
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'product_value' => $row['product_value'], 
                'product_code' => $row['product_code'],
                'product_image' => $row['product_image'], 
                'device_token' => $access_token,
                'datetime' => date('mmddyyyy'), 
                'signature' => '5860915bc81ed150dfc79a0cc15171cbe2f254cde0739c69b10fef376f4d126c',
                'first_name' => $firstname, 
                'last_name' =>  $lastname,
                'email' => $email, 
                'mobile' => $phone,
                'displayname' => $displayname,
            );
        ?> 
        <?php echo form_open('dashboard/update_shipping_details',array('id'=>'abc'),$this->security->xss_clean($hidden));?>     
        <div class="modal-body">           
            <div class="row bg-white border mx-0 mt-2 table2">
                <div class="col-12">
                    <p class="font-weight-bold">Check & update your Shipping Details</p>
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
                
                <div class="col-md-6 mt-sm-3">                   
                    <?php echo form_input(array(                    
                            'name'=> 'address_line1',
                            'id'  => 'add1',                    
                            'class'=> 'form-control inputDiv',
                            'value'=>$displayname, 
                            'placeholder' =>'USER NAME',                                                     
                    ));?> 
                </div>

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
                </div>
                <div class="col-md-6 mt-3">                   
                    <select id="country" name="country" class="form-control inputDiv" data-validation="required">
                        <option value="USA">USA</option>
                    </select> 
                </div>
               
                <div class="col-12 my-4 text-right">
					<div id="myDiv">
						<img id="loading-image" class="text-center" src="<?php echo base_url();?>assets/images/loading_icon.gif" width='200px'style="display:none;margin:10% auto;"/>
					</div>  
							
                    <?php if(empty($address_line1)){?>
                        <input type="submit" class="btn bg-dark-green text-white py-1 rounded-0 px-4" value="Update Details">
                    <?php }else{?>
						<input type="submit" class="btn bg-dark-green text-white py-1 rounded-0 px-4" value="Continue">
                    <?php }?>
                </div>                   
            </div>               
        </div> 
        <?php echo form_close();?>      
        <div class="modal-footer"></div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="redm<?php echo $row['product_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog h-100 my-0 mx-auto d-flex flex-column justify-content-center" role="document">
		<div class="bs-example"> 
            <div class="alert alert-warning alert-dismissible fade show">
                <h4 class="alert-heading"><i class="fa fa-warning"></i>&nbsp;Insufficient balance !</h4>
                <hr>
                <p class="mb-0">You have not sufficient balance in your wallet to redeem this product.</p>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        </div>
	</div>
</div>
<?php }?>

    <footer class="page-footer px-4 py-4 bg-light-green border-top d-flex align-items-center">
        <?php include 'footer.php';?>
    </footer>
    <!-- Bootstrap core JavaScript -->   
    <?php include 'scripts.php';?>  
    <script src="<?php echo base_url();?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
	
</body>
</html>
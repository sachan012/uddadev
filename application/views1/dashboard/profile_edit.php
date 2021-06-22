<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <?php include 'stylesheets.php';?>
</head>
<body>
    <div class="d-flex parentFlexGrowStyle bg-light-green" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <?php include 'left_sidebar.php';?>            
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom p-0 fixed-top">
                <?php include 'header.php';?>
            </nav>
            <div class="p-2 rightSection">                
                <div class="row bg-white border m-0 table1">                    
                    <div class="col-md-9 colR ">
                        <div class="row">
                            <div class="col-12 text-left textUnderline"> 
                                <h5 style="padding-top:1.5rem;">Update Your Profile</h5>
                            </div>                                
                        </div>
                    </div>
                </div>
                <?php echo form_open('dashboard/profile_update');?>
                <div class="row bg-white border mx-0 mt-2 table2">
                    <div class="col-12">
                        <h2>Personal Information</h2>
						<?php if ($this->session->flashdata('error')) { ?>
                             <div class="col-12">
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $this->session->flashdata('error'); ?>
                            </div>  
                             </div>                              
                        <?php } ?>
                    </div>
                     <div class="col-md-6 mt-3">
                        <?php if(empty($email)){ ?>
                            <input type="text" class="form-control inputDiv" id="email" name="email" value="<?php echo set_value('email',$email);?>" placeholder="Email Id" autocomplete="off">                       
                         <?php echo form_error('email', '<div class="error text-danger">', '</div>'); ?>
                        <?php }else{?>
                          <input type="text" class="form-control inputDiv" id="email" name="email" value="<?php echo set_value('email',$email);?>" placeholder="Email Id" autocomplete="off" readonly>
                        <?php }?>
                    </div>
                     <div class="col-md-6 mt-3">
                         <?php if(empty($phone)){ ?>
                        <input type="tel" class="form-control inputDiv" id="number" name="mobile" value="<?php echo set_value('mobile', $phone);?>" placeholder="Phone Number">
                        <?php echo form_error('mobile', '<div class="error text-danger">', '</div>'); ?>
                        <?php }else{?>
                         <input type="tel" class="form-control inputDiv" id="number" name="mobile" value="<?php echo set_value('mobile', $phone);?>" placeholder="Phone Number" readonly>
                        <?php }?>
                    </div>
                    <div class="col-md-6 mt-sm-3">                        
                        <input type="text" class="form-control inputDiv" id="fname" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name', $firstname);?>">
                        <?php echo form_error('first_name', '<div class="error text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mt-sm-3">                        
                        <input type="text" class="form-control inputDiv" id="lname" name="last_name" value="<?php echo set_value('last_name', $lastname);?>" placeholder="Last Name">
                        <?php echo form_error('last_name', '<div class="error text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mt-3">                        
                        <input type="text" class="form-control inputDiv" id="Username" name="displayname" value="<?php echo set_value('displayname', $displayname);?>" placeholder="Display name">
                        <?php echo form_error('displayname', '<div class="error text-danger">', '</div>'); ?>
                    </div>
                   
                    <div class="col-12">
                        <h2>Shipping Address</h2>
                    </div>
                    <div class="col-md-6 mt-sm-3">                        
                        <input type="text" class="form-control inputDiv" placeholder="Address Line 1" id="add1" name="address_line1" value="<?php echo  set_value('address_line1', $profile['data']['shipping_address']['address_line1']);?>" ><span>Street Address,PO Box</span>
                        <?php echo form_error('address_line1', '<div class="error text-danger">', '</div>'); ?>
                       
                    </div>
                    <div class="col-md-6 mt-sm-3">                         
                        <input type="text" class="form-control inputDiv" placeholder="Address Line 2" id="add2" name="address_line2" value="<?php echo  set_value('address_line2',$profile['data']['shipping_address']['address_line2']);?>" >
                        <span>Appartment, Suit, Unit, Building,Floor etc</span>
                        <?php echo form_error('address_line2', '<div class="error text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mt-3">                        
                        <input type="text" class="form-control inputDiv" placeholder="City" id="city" name="city" value="<?php echo  set_value('city',$profile['data']['shipping_address']['city']);?>" >
                         <?php echo form_error('city', '<div class="error text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mt-3">                         
                        <input type="text" class="form-control inputDiv" placeholder="State/Province/Region" id="state" name="state" value="<?php echo  set_value('state',$profile['data']['shipping_address']['state']);?>" >
                        <?php echo form_error('state', '<div class="error text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mt-3">                        
                        <input type="text" class="form-control inputDiv" placeholder="Zip" id="zip" name="zipcode" value="<?php echo set_value('zipcode',$profile['data']['shipping_address']['zipcode']);?>" >
                         <?php echo form_error('zipcode', '<div class="error text-danger">', '</div>'); ?>
                    </div>
                        <div class="col-md-6 mt-3">
                            <select id="country" class="form-control inputDiv" name="country">
                                <option value="USA">USA</option>
                            </select>
                        </div> 
                        <div class="col-12 my-4 text-right">
                            <button type="submit" class="btn bg-dark-green text-white py-1 rounded-0 px-4">Save Changes</button>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <footer class="page-footer px-4 py-4 bg-light-green border-top d-flex align-items-center">
    	<?php include 'footer.php';?>
    </footer>
    <!-- core JavaScript -->
    <?php include 'scripts.php';?> 
</body>

</html>
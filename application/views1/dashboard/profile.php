<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <?php include 'stylesheets.php';?>
    <style type="text/css">
		.form-control:disabled, .form-control[readonly] {
	    background-color: transparent;
	    opacity: 1;
	}
</style>
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
                    <div
                        class="col-md-3 profileDivBgColor d-flex flex-column justify-content-center align-items-center py-4">
                        <img src="<?php echo $photo;?>" class="img-fluid avatar rounded-circle img-responsive">
                        <!-- <p class="color-text-green textUnderline text-center">change Photo</p> -->
                        <p class="color-text-green text-center"></p>
                        <div class="statusDiv color-text-green">
                            <p class="position-relative m-0"><?php echo $level_name;?><img src="<?php echo base_url();?>assets/images/info_icon.png" class="ml-2">
                            </p>
                        </div>
                    </div>                 
                    <div class="col-md-9 colR ">
                        <div class="row">
                            <div class="col-12 text-right color-text-green textUnderline editText"><a href="<?php echo base_url('dashboard/edit_profile');?>"><i class="fa fa-pencil mr-1" aria-hidden="true"></i> Edit profile</a>
                            </div>
                            <?php if ($this->session->flashdata('msg_success')) { ?>
                             <div class="col-12">
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $this->session->flashdata('msg_success'); ?>
                            </div>  
                             </div>                              
                        <?php } ?>
                                <div class="col-md-6 mt-sm-3">
                                    <input type="text" class="form-control inputDiv" id="fname" value="<?php echo $firstname;?>" placeholder="First Name" readonly>
                                </div>

                                <div class="col-md-6 mt-sm-3">
                                    <input type="text" class="form-control inputDiv" id="lname" value="<?php echo $lastname;?>" placeholder="Last Name" readonly>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control inputDiv" id="Username" value="<?php echo $displayname;?>" placeholder="Display Name" readonly>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control inputDiv" id="email" value="<?php echo $email;?>" placeholder="Email id" readonly>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <input type="tel" class="form-control inputDiv" id="number" value="<?php echo $phone;?>" placeholder="Phone" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-white border mx-0 mt-2 table2">
                        <div class="col-12">
                            <h2>Shipping Address</h2>
                        </div>
                        <div class="col-md-6 mt-sm-3">
                            <input type="text" class="form-control inputDiv" placeholder="Address Line 1" id="add1" value="<?php echo $profile['data']['shipping_address']['address_line1'];?>" readonly>
                            <span>Street Address,PO Box</span>
                        </div>
                        <div class="col-md-6 mt-sm-3">
                            <input type="text" class="form-control inputDiv" placeholder="Address Line 2" id="add2" value="<?php echo $profile['data']['shipping_address']['address_line2'];?>" readonly>
                            <span>Appartment, Suit, Unit, Building,Floor etc</span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <input type="text" class="form-control inputDiv" placeholder="City" id="city" value="<?php echo $profile['data']['shipping_address']['city'];?>" readonly>
                        </div>
                        <div class="col-md-6 mt-3">
                            <input type="text" class="form-control inputDiv" placeholder="State/Province/Region" id="state" value="<?php echo $profile['data']['shipping_address']['state'];?>" readonly>
                        </div>

                        <div class="col-md-6 mt-3">
                            <input type="text" class="form-control inputDiv" placeholder="Zip" id="zip" value="<?php echo $profile['data']['shipping_address']['zipcode'];?>" readonly>
                        </div>

                        <div class="col-md-6 mt-3">
                            <select id="country" class="form-control inputDiv" readonly>
                                <option>USA</option>
                            </select>
                        </div>
                        <div class="col-12 my-4 text-right">
                            <button type="button" class="btn bg-dark-green text-white py-1 rounded-0 px-4" style="display:none">Save Changes</button>
                        </div>
                    </div>
                </form>
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
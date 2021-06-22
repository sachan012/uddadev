<!DOCTYPE html>
<html lang="en">
<head>
    <title>UDDA Dashboard| Redeem Swag</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"> 
    <?php include 'stylesheets.php';?>   
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
                    <h2>Redemption Product History</h2>
					
                    <?php if ($this->session->flashdata('success')) { ?>
					<div class="col-12">
						<div class="alert alert-success alert-dismissible mt-5 ">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $this->session->flashdata('success'); ?>
						</div> 
					</div>					
                    <?php } ?>
                    
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
                                <th scope="col" class="text-center">Redeemed date</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    //echo "<pre>";print_r($products['data']['product_array']);die;
                                   if(empty($redeem_product_history['data']['redeem_product_history_array'])){?>
                                    <tr>
                                        <td colspan="6" class="text-center">No Record Found</td>
                                    </tr>
                                   <?php }else{$i=1;foreach ($redeem_product_history['data']['redeem_product_history_array'] as $row) {?>
                                   <?php                                        
                                        $str = $row['product_image'];
                                        $p_img = explode("http://uddadev.triazinesoft.com/assets/products/",$str);
                                        //echo "<pre>";print_r($p_img[1]);                                      
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $i;?></td>
                                        <td><img src="<?php echo $str;?>" class="tableImage"></td>
                                        <td class="text-left"><?php echo $row['product_name'];?></td>
                                        <td><?php echo $row['product_code'];?></td>
                                        <td><b><img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-1">

                                            <?php echo number_format($row['product_value'],2); ;?></b></td>
                                        <td><?php echo date('m-d-Y', strtotime($row['redeem_date']));?></td>
                                    </tr>
                                <?php $i++;} }?>
                            </tbody>
                        </table>
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
    <script src="<?php echo base_url();?>assets/plugins/datatable/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
     <script src="<?php echo base_url();?>assets/plugins/form-validator/jquery.form-validator.min.js"></script>
    <script>
        $.validate({
            modules : 'date, security'
        });
    </script>
</body>
</html>
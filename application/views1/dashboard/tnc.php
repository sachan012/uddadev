<!DOCTYPE html>
<html lang="en">
<head>
    <title>UDDA Dashboard| Term and Conditions</title>
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
					<div class="row faq-container">
						<div class="col-sm-12">							
							<?php echo $tnc['data']['content']?>
						</div>
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
</body>
</html>
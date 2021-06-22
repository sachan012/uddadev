<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | Video Tutorials</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <?php include 'stylesheets.php'?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/lightbox/jquery.fancybox.min.css" />       
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
                <!-- <div class=" p-2"> -->
                    <div class="row m-0">
                        <div class="col-md-3 mt-2 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-2">
                            <div class="card h-100">
                                <a data-fancybox="video-gallery" href="https://youtu.be/0R4LWzIHAdo" target="_blank"><img src="<?php echo base_url();?>assets/images/video4.png" class="video-class img-thumbnail"></a>
                                <div class="card-body d-flex align-items-center py-2 px-2">
                                    <p class="card-text">How to Place a Bet Tutorial</p>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-3 mt-2 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-2">
                            <div class="card h-100">
                                <a data-fancybox="video-gallery" href="https://youtu.be/iBwAAfaU-sU" target="_blank"><img src="<?php echo base_url();?>assets/images/video3.png" class="video-class img-thumbnail"></a>
                                <div class="card-body d-flex align-items-center py-2 px-2">
                                    <p class="card-text">How to Create a Custom Bet Tutorial</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-2">
                            <div class="card h-100">
                                <a data-fancybox="video-gallery" href="https://youtu.be/aJRzbu_zRuI" target="_blank"><img src="<?php echo base_url();?>assets/images/video2.png" class="video-class img-thumbnail"></a>
                                <div class="card-body d-flex align-items-center py-2 px-2">
                                    <p class="card-text">How to Bet a Friend Tutorial</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-2">
                            <div class="card h-100">
                               <a data-fancybox="video-gallery" href="https://youtu.be/uNJklA0srXM"><img src="<?php echo base_url();?>assets/images/video1.png" class="video-class img-thumbnail"></a>
                                <div class="card-body d-flex align-items-center py-2 px-2">
                                    <p class="card-text">How to Create & Play Baby Shower Bingo Tutorial</p>
                                </div>
                            </div>
                        </div>

                        

                        
                              
                </div>
                <!-- </div> -->
            </div>            
        </div>
    </div>
    <footer class="page-footer px-4 py-4 bg-light-green border-top d-flex align-items-center">
        <?php include 'footer.php';?>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <?php include 'scripts.php'?>    
    <script src="<?php echo base_url();?>assets/plugins/lightbox/jquery.fancybox.min.js"></script>
        
</body>

</html>
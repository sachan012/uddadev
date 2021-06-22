<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | Faq</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <?php include 'stylesheets.php'?> 
</head>
<body>
    <div class="d-flex parentFlexGrowStyle bg-light-green" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <?php include 'left_sidebar.php';?>
        </div>
        <!-- /#sidebar-wrapper -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom p-0 fixed-top"><?php include 'header.php';?></nav>
            <div class=" p-2 rightSection">
                <div class="bg-white faq-container">
                <?php $i=1;foreach($fnq as $row){?>
                    <div>
                        <div class="faq-panel-heading d-flex align-items-center radiodiv <?php if($i==1){echo "active";}?>" onclick=selected(this)>
                            <span class="rounded-circle crcl bg mr-2 d-flex align-items-center justify-content-center">
                                <i class="fa <?php if($i==1){echo "fa-angle-down";}else{echo "fa-angle-right";}?>"  aria-hidden="true"></i></span>
                            <h2 class="my-0"><?php echo $row['f_question'];?></h2>
                        </div>
                        <div class="faq-panel-body">
                            <p><?php echo $row['f_answer'];?></p>
                        </div>
                    </div>
                    <?php $i++;}?>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer px-4 py-4 bg-light-green border-top d-flex align-items-center">
        <?php include 'footer.php';?>
    </footer>
    <!-- core JavaScript -->
    <?php  include 'scripts.php';?>
    <script>
        var divItems = document.getElementsByClassName("radiodiv");
        function selected(item) {
            this.clear();
            item.classList.add("active");          
            $(".active span .fa").toggleClass("fa-angle-right fa-angle-down");
        }

        function clear() {
            $(".active span .fa").toggleClass("fa-angle-right fa-angle-down");
            for (var i = 0; i < divItems.length; i++) {
                var item = divItems[i];               
                item.classList.remove("active");
            }
        }
    </script>    
</body>
</html>
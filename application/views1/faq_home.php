<!DOCTYPE html>
<html lang="en">
<head>
    <title>UDDA | Frequenty Asked Questions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <?php include 'styles.php';?>    
</head>
<body>
    <div class=" parentFlexGrowStyle bg-light-green" id="wrapper">
        <div id="page-content-wrapper">
            <div class="faqSection">
                <div class="container faq-logo-section">
                    <div class="row">
                        <div class="col-6">
                            <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/UDDA_Dashboard_Logo.png" class="img-fluid faqLogo"></a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?php echo base_url('frequently-asked-questions');?>"class="text-white faq-text font-weight-bold">FAQ</a>
                        </div>
                    </div>
                    <div class="faq-content-heading">
                        <h1>FREQUENTLY ASKED QUESTIONS</h1>
                    </div>
                </div>

                <div class="bg-white faq-container container ">
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
        <footer class=" faq-footer px-4 py-4">
             <?php include 'footer.php';?>
        </footer>
    </div>
    <?php include 'scripts.php';?>
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
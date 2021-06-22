<!DOCTYPE html>
<html lang="en">
<head>
    <title>UDDA | Custom pool</title>
    <?php include 'app_pages_stylesheet.php';?>
</head>
<body>
    <div class=" privateBetContainer">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="text-center">
                    <img src="<?php echo base_url();?>assets/images/UDDA_Dashboard_Logo.png" class="img-fluid uddaBetLogo">
                    <h1 class="blue-color privateFontStyle"> Custom Pool</h1>
                </div>
                <div class="row profileDetailDiv m-0 border-bottom pb-2">
                    <div class="col-6 pl-0">
                        <img src="<?php echo base_url();?>assets/images/bag.jpg" class="img-fluid rounded-circle mr-2 border ProfileImg">
                        <div class="profileDetailStyle">
                            <p class="m-0 font-weight-bold">From</p>
                            <h5 class="m-0 font-weight-bold"><?php echo $firstname;?></h5>
                        </div>
                    </div>
                    <div class="col-6 pr-0">
                        <div class="text-right profileDetailStyle w-100">
                            <p class="m-0 font-weight-bold"><?php echo date("F j, Y T", strtotime($created_at));;?></p>
                            <p class="m-0 font-weight-bold"><?php echo date("h:i A", strtotime($created_at));;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row midle-text m-0 privateFontStyle">
            <div class="col-12">
                <p class="my-3"><b><?php echo $firstname;?></b> created a pool that <b><?php echo $pool_name;?> </b>
                </p>
                <p class="mb-3">It cost <b><?php echo number_format($pool_amount,2);?>&nbsp;UDDA</b> bucks to join, <b>winner take all</b> Exact: <b>Yes,</b> wins. </p>
                <p class="mb-3"> You can invite your friends. </p>
                <p class="mb-3">My answer is <b><?php echo $my_answer;?></b></p>
                <p class="mb-3">The pool closes at <b><?php echo date("g:i A T F j, Y", strtotime($pool_expired_on));?></b>
                </p>
                <p class="mb-3 color-text-green">Would you like accept the bet? </p>
            </div>
        </div>
        <div class="row m-0 privateFontStyle mb-4 rate-row">
            <div class="col-12 ">
                <div class="rate-div border p-2 d-flex justify-content-between rounded">
                    <div class="span-text">
                        <p class="border-bottom border-dark m-0"> View participants(<?php echo $total_bet_counts;?>):</p>
                    </div>
                    <div class=" span-rate pl-1 text-right">
                        <p class="m-0 pb-1 "> <img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-2"><?php echo number_format($pool_amount,2);?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row privateFontStyle m-0 betLine">
            <div class="col-12 text-center p-2 light-gray">
                I bet on the No & 2/3 odds
            </div>
        </div>
        <div class="row mt-3 pb-2 mx-0">
            <h5 class="color-orange privateFontStyle text-center w-100 mb-3 headingOrangeFont">Download the app to participate!!!
            </h5>
            <div class="col-6 text-right pr-2">
                <a href="https://apps.apple.com/us/app/udda-sports/id1484047531" target="_blank" rel="noopener"><img src="<?php echo base_url();?>assets/images/app-download.png" alt="" class="udda_content appImg"></a>
            </div>
            <div class="col-6 text-left pl-2">
                <a href="https://play.google.com/store/apps/details?id=com.uddaapp.gaming" target="_blank" rel="noopener"><img src="<?php echo base_url();?>assets/images/google-play.png" alt="" class="google_play appImg"></a>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>UDDA | Private Bet</title>
    <?php include 'app_pages_stylesheet.php';?>
</head>
<body>

    <div class=" privateBetContainer">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="text-center">
                    <img src="<?php echo base_url();?>assets/images/UDDA_Dashboard_Logo.png" class="img-fluid uddaBetLogo">
                    <h1 class="blue-color privateFontStyle">Private Bet</h1>
                </div>
                <div class="row profileDetailDiv ">
                    <div class="col-6">
                        <img src="<?php echo base_url();?>assets/images/bag.jpg" class="img-fluid rounded-circle mr-2 border ProfileImg">
                        <div class="profileDetailStyle">
                            <p class="m-0 font-weight-bold">From</p>
                            <h5 class="m-0 font-weight-bold"><?php echo $firstname;?></h5>
                        </div>
                    </div>
                    <?php  $createdDate = explode(',',$created_at);
                        // echo "<pre>";print_r($createdDate);
                    ?>
                    <div class="col-6">
                        <div class="text-right profileDetailStyle w-100">
                            <p class="m-0 font-weight-bold"><?php echo $createdDate[0];?>, <?php echo $createdDate[1];?></p>
                            <p class="m-0 font-weight-bold"><?php echo $createdDate[2];?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="bet-person mt-2">           
            <div class="row privateFontStyle m-0 bet-person1">
                <div class="col-6 dark-blue border-right border-bottom border-white text-white d-flex justify-content-center align-items-center">
                    <?php echo $people_list[0]['username'];?> </div>
                <div class="col-6 text-center dark-gray border-bottom text-white py-1"><?php echo $people_list[1]['username'];?></div>
            </div>
            <div class="row privateFontStyle align-items-center m-0 bet-person2">
                <div class="col-6 blue-bg text-center border-right border-white  text-white py-3"><?php echo $side_team_odd;?></div>
                <div class="col-6 text-center light-gray py-3 col-R"><?php echo $opposite_team_odds;?></div>
            </div>            
        </div>


        <div class="row midle-text m-0 privateFontStyle">
            <div class="col-12">
                <p class="my-3"><b><?php echo $firstname;?></b> is putting up <b><?php echo number_format($bet_amount,2);?> UDDA </b> bucks to your <b><?php echo number_format($amount_to_win,2);?> UDDA</b> bucks.
                </p>
                <p class="mb-3">You can accept all of or any part of the bet, or tap "Not now, I think I'll pass" </p>
            </div>
        </div>

        <div class="row m-0 privateFontStyle mb-4 rate-row">
            <div class="col-12 ">
                <div class="rate-div border p-2 d-flex justify-content-between rounded">
                    <div class="span-text">
                        <p class="m-0">Wager:</p>
                        <p class="border-bottom border-dark m-0"> View participants(<?php echo $total_people;?>):</p>
                        <p class="mt-1 m-0">Open amount</p>
                    </div>
                    <div class=" span-rate pl-1 text-right">
                        <p class="m-0"><img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-2"><?php echo number_format($bet_amount,2);?> </p>
                        <p class="m-0 border-bottom pb-1 ">- <img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-2"><?php echo number_format($total_people_amount,2);?> </p>
                        <p class="m-0 color-text-green "><img src="<?php echo base_url();?>assets/images/UDDA_Icon.png" class="mr-2"><?php echo number_format($available_betamount,2);?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row privateFontStyle m-0 betLine">
            <div class="col-12 text-center p-2 light-gray"> I bet on the <br> <?php echo $answer;?></div>

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
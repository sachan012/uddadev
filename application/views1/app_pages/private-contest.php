<!DOCTYPE html>
<html lang="en">
<head>
    <title>UDDA | Private-Contest</title>
    <?php include 'app_pages_stylesheet.php';?>
</head>
<body>
    <div class=" privateBetContainer">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="text-center">
                    <img src="<?php echo base_url();?>assets/images/UDDA_Dashboard_Logo.png" class="img-fluid uddaBetLogo">
                    <h1 class="blue-color privateFontStyle">Private Contest</h1>
                </div>
                <div class="row profileDetailDiv border-bottom m-0 pb-2">
                    <div class="col-6 pl-0">
                        <img src="<?php echo base_url();?>assets/images/bag.jpg" class="img-fluid rounded-circle mr-2 border ProfileImg">
                        <div class="profileDetailStyle">
                            <p class="m-0 font-weight-bold">From</p>
                            <h5 class="m-0 font-weight-bold"><?php echo $creator;?></h5>
                        </div>
                    </div>
                    <div class="col-6 pr-0">
                        <div class="text-right profileDetailStyle w-100">
                            <p class="m-0 font-weight-bold"><?php echo date("F j, Y T", strtotime($contest_start_date));?></p>
                            <p class="m-0 font-weight-bold"><?php echo date("h:i A", strtotime($contest_start_date_timestamp));?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0">
            <div class="col-12">
                <p class="mt-2 pb-1 m-0 font-weight-bold text-center headingRowNew">New NFL Contest</p>
                <p class="color-gray m-0 font-weight-bold text-center contestFontSize"><?php echo $contest_name;?></p>
            </div>
            <div class="col-12">
                <form class="bgColor-gray ">
                    <div class="row pt-3 m-0">
                        <div class="col-6 pl-2 pr-1">
                            <!-- <input type="text" class="form-control inputDiv" placeholder="Steve"> -->
                            <p class="m-0 font-weight-bold text-center border-bottom-new"><?php echo $creator;?></p>
                            <p class="m-0 color-gray font-weight-bold text-center contestFontSize">CREATOR</p>
                        </div>
                        <div class="col-6 pl-1 pr-2">
                            <p class="m-0 font-weight-bold text-center border-bottom-new"><img
                            src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-2 font-weight-bold"><?php echo number_format($join_fee,2);?></p>
                            <p class="m-0 color-gray font-weight-bold text-center contestFontSize">CONTEST FEE</p>
                        </div>
                    </div>
                    <div class="row pt-3 m-0">
                        <div class="col-6 pl-2 pr-1">
                            <p class="m-0 font-weight-bold text-center border-bottom-new"><?php echo $league_name;?></p>
                            <p class="m-0 color-gray font-weight-bold text-center contestFontSize">LEAGUE NAME</p>
                        </div>
                        <div class="col-6 pl-1 pr-2">
                            <p class="m-0 font-weight-bold text-center border-bottom-new"><?php echo $ContestType;?></p>
                            <p class="m-0 color-gray font-weight-bold text-center contestFontSize">CONTEST TYPE</p>
                        </div>
                    </div>
                    <div class="row pt-3 m-0">
                        <div class="col-6 pl-2 pr-1">
                            <p class="m-0 font-weight-bold text-center border-bottom-new"><?php echo date("F j, Y", strtotime($contest_start_date));?></p>
                            <p class="m-0 color-gray font-weight-bold text-center contestFontSize">START DATE</p>
                        </div>
                        <div class="col-6 pl-1 pr-2">
                            <p class="m-0 font-weight-bold text-center border-bottom-new"><?php echo date("F j, Y", strtotime($contest_end_date));?></p>
                            <p class="m-0 color-gray font-weight-bold text-center contestFontSize">END DATE</p>
                        </div>
                    </div>
                    <div class="row pt-3 pb-1 m-0">
                        <div class="col-12 pl-2 pr-2">
                            <p class="m-0 font-weight-bold text-center border-bottom-new"><?php echo $prize_type;?></p>
                            <p class="m-0 color-gray font-weight-bold text-center contestFontSize">PRIZE TYPE</p>
                        </div>
                    </div>
                    <h5 class="color-orange privateFontStyle text-center w-100 pb-3 mt-3 textFontStyle">
                        <u>View Contest Details</u>
                    </h5>
                </form>
            </div>
        </div>

        <div class="row mt-3 pb-2 mx-0">
            <h5 class="privateFontStyle text-center w-100 mb-3 mx-4 headingOrangeFont">Steve has invited you to join
                Private Contest
            </h5>
            <h5 class="color-orange privateFontStyle text-center w-100 mb-3 headingOrangeFont">Download the app to
                participate!!!
            </h5>
            <div class="col-6 text-right pr-2">
                <a href="https://apps.apple.com/us/app/udda-sports/id1484047531" target="_blank" rel="noopener"><img
                        src="<?php echo base_url();?>assets/images/app-download.png" alt="" class="udda_content appImg"></a>
            </div>
            <div class="col-6 text-left pl-2">
                <a href="https://play.google.com/store/apps/details?id=com.uddaapp.gaming" target="_blank"
                    rel="noopener"><img src="<?php echo base_url();?>assets/images/google-play.png" alt="" class="google_play appImg"></a>
            </div>
        </div>

    </div>
</body>

</html>
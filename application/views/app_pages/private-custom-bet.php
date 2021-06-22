<!DOCTYPE html>
<html lang="en">
<head>
    <title>UDDA | Private Custom Bet</title>
    <?php include 'app_pages_stylesheet.php';?>
</head>

<body>

    <div class=" privateBetContainer">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="text-center">
                    <img src="<?php echo base_url();?>assets/images/UDDA_Dashboard_Logo.png" class="img-fluid uddaBetLogo">
                    <h1 class="blue-color privateFontStyle">Private Custom Bet</h1>
                </div>
                <div class="row profileDetailDiv border-bottom m-0 border-bottom pb-2">
                    <div class="col-6 pl-0">
                        <img src="<?php echo base_url();?>assets/images/bag.jpg" class="img-fluid rounded-circle mr-2 border ProfileImg">
                        <div class="profileDetailStyle">
                            <p class="m-0 font-weight-bold">From</p>
                            <h5 class="m-0 font-weight-bold">Steve</h5>
                        </div>
                    </div>
                    <div class="col-6 pr-0">
                        <div class="text-right profileDetailStyle w-100">
                            <p class="m-0 font-weight-bold">December 28, 2020</p>
                            <p class="m-0 font-weight-bold">2:45 PM EST</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="bet-person mt-2">
            <div class="row privateFontStyle m-0 bet-person1">
                <div class="col-6 dark-blue border-right border-bottom border-white text-white d-flex justify-content-center align-items-center">
                    Denver Broncos </div>
                <div class="col-6 text-center dark-gray border-bottom text-white py-1">Los Angeles Chargers</div>
            </div>
            <div class="row privateFontStyle align-items-center m-0 bet-person2">
                <div class="col-6 blue-bg text-center border-right border-white  text-white py-3">+298</div>
                <div class="col-6 text-center light-gray py-3 col-R">-298</div>
            </div>
        </div> -->


        <div class="row midle-text m-0 privateFontStyle">
            <div class="col-12">
                <p class="my-3"><b>Steve</b> is putting up <b>1,000.00 UDDA</b> bucks to your <b>1,500.00 UDDA</b> bucks
                    that <b>New year party</b>.
                </p>
                <p class="mb-3">You can accept all of or any part of the bet, or tap "Not now, I think I'll pass" </p>
                <p class="mb-3">My answer is <b>Yes</b></p>
                <p class="mb-3">Bet closes at <b>12:30 PM EST, December 31, 2020</b> </p>
                <p class="mb-3 color-text-green">Would you like accept the bet? </p>
            </div>
        </div>

        <div class="row m-0 privateFontStyle mb-4 rate-row">
            <div class="col-12 ">
                <div class="rate-div border p-2 d-flex justify-content-between rounded">
                    <div class="span-text">
                        <p class="m-0">Wager:</p>
                        <p class="border-bottom border-dark m-0"> View participants(0):</p>
                        <p class="mt-1 m-0">Open amount</p>
                    </div>
                    <div class=" span-rate pl-1 text-right">
                        <p class="m-0"><img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-2">1,500.00 </p>
                        <p class="m-0 border-bottom pb-1 ">- <img src="<?php echo base_url();?>assets/images/udda_bucks.png" class="mr-2">0 </p>
                        <p class="m-0 color-text-green "><img src="<?php echo base_url();?>assets/images/UDDA_Icon.png" class="mr-2">1,500.00</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row privateFontStyle m-0 betLine" data-toggle="modal" data-target="#exampleModal">
            <div class="col-12 text-center p-2 light-gray">
                I bet on the No & 2/3 odds
            </div>

        </div>

        <div class="row mt-3 pb-2 mx-0">
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


    <!-- Modal -->
    <div class="modal fade private-custom-bet-model" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center border-0">
                    <!-- <i class="fa fa-arrow-left"></i> -->
                    <img src="<?php echo base_url();?>assets/images/back_icon.png" data-dismiss="modal" />
                    <h5 class="modal-title w-100 text-center color-text-green privateFontStyle" id="exampleModalLabel">
                        PARTICIPANTS</h5>
                </div>
                <div class="modal-body">
                    <div class="headingRow privateFontStyle pb-1 mb-1">
                        <div class="row m-0">
                            <div class="col-6 pl-0">Bet Date:</div>
                            <div class="col-6 text-right px-0"><b>December 29,2020</b></div>
                        </div>
                        <div class="row m-0">
                            <div class="col-6 pl-0">Creator</div>
                            <div class="col-6 text-right pr-0"><b>Steve</b></div>
                        </div>
                    </div>

                    <div class="bodyRow privateFontStyle">
                        <div class="row m-0">
                            <div class="col-6 pl-0">Steve</div>
                            <div class="col-6 text-right px-0">12,000.00</div>
                        </div>
                        <div class="row m-0">
                            <div class="col-6 pl-0">Devin</div>
                            <div class="col-6 text-right pr-0">12,000.00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
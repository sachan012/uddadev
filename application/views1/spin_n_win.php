<!DOCTYPE html>
<html lang="en">

<head>
    <title>UDDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <!-- <link rel="stylesheet" href="./css/home.css"> -->
    <!-- <link rel="stylesheet" href="./fonts"> -->
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .page-content-wrapper,
        p {
            font-family: "Montserrat", sans-serif !important;
        }
        
        .spinWin {
            background: url(../assets/images/external/faq-banner.png) no-repeat;
            background-size: cover;
        }
        
        .logo-section {
            padding-top: 4%;
        }
        
        .faqLogo {
            width: 40%;
            margin-left: 1%;
        }
        
        .logo-section .faq-text {
            font-size: 1.5rem;
            padding-right: 2%;
            font-family: "Montserrat", sans-serif !important;
            text-decoration: underline;
            text-underline-position: under;
        }
        
        .content-heading h1 {
            text-align: center;
            /* margin: 3rem 0; */
            margin: 2rem 0;
            font-family: "Montserrat", sans-serif !important;
            font-size: 1.95rem;
            font-weight: bold;
        }
        
        .spinWin-container {
            padding: 4% 3%;
        }
        
        .faq-footer {
            background-color: #0fa3a3;
            padding: 34px 0;
            color: #fff;
            font-family: "Montserrat", sans-serif !important;
        }
        
        .referDiv p {
            font-size: 2.1rem;
            font-weight: bold;
            line-height: 1.2;
        }
        
        .referDiv p:nth-of-type(1) {
            font-size: 2.3rem;
            margin-bottom: 1.3rem;
        }
        
        .footer {
            font-family: "Montserrat", sans-serif !important;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .footer-end-content p {
            font-size: 18px;
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
        }
        
        .rewardDiv {
            border-top: 1.5px solid #69bcbc;
            border-bottom: 1.5px solid #69bcbc;
            padding: 2.4%;
            margin-top: 1.6rem;
        }
        
        .rewardDiv p {
            font-weight: bold;
            line-height: 1.3;
            font-size: 2.1rem;
        }
        
        .downloadText {
            color: #f5611d;
            font-weight: bold;
            margin: 3.6% 0;
            font-size: 1.8rem;
        }
        
        .blue-color {
            color: #69bcbc;
        }
        
        .bolder {
            font-weight: bolder;
        }
        
        .coupon-code {
            color: #000000;
        }
        
        .refer-code {
            color: #000000;
            font-weight: 500;
            /* border: 1px dashed #69bcbc; */
            padding: 4% 2%;
            font-size: 2.1rem;
            /* border-radius: 5px; */
            margin-top: 5.8%;
            background: url('../assets/images/external/referral-code-bg.png') no-repeat;
            background-size: 100% 100%;
        }
        
        .copy-icon {
            width: 5%;
        }
        
        .bolder-dark {
            font-weight: bolder;
            color: #000000;
        }
        
        .store-img img {
            width: 130px;
            height: 50px;
        }
        
        .colL img {
            width: 82%;
        }
        
        footer .footerCol2 {
            text-align: right;
        }
        
        .colR {
            padding-right: 3rem;
        }
        
        @media (max-width: 767px) {
            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }
            .referDiv p:nth-of-type(1) {
                font-size: 1.6rem;
            }
            .referDiv p,
            .rewardDiv p {
                font-size: 1.2rem;
            }
            .refer-code {
                font-size: 1.2rem;
            }
            .downloadText {
                font-size: 1rem;
            }
            .colR {
                padding-right: 15px;
            }
            .row {
                margin-left: 0;
                margin-right: 0;
            }
            footer .footerCol2 {
                text-align: left;
            }
            .copy-icon {
                width: 7%;
            }
        }
        
        @media (min-width: 767px) and (max-width: 1023px) {
            .referDiv p {
                font-size: 1.3rem;
            }
            .rewardDiv p,
            .refer-code {
                font-size: 1.3rem;
            }
            .refer-code img {
                width: 7%;
            }
            .downloadText {
                font-size: 1.2rem;
            }
        }
        
        @media (min-width: 1024px) and (max-width: 1059px) {
            .referDiv p,
            .rewardDiv p {
                font-size: 1.8rem;
            }
            .downloadText {
                font-size: 1.6rem;
            }
            .refer-code {
                font-size: 1.9rem;
            }
        }
    </style>

</head>

<body>
    <div class=" parentFlexGrowStyle bg-light-green d-flex flex-column" id="wrapper">


        <div id="page-content-wrapper">

            <div class="spinWin">

                <div class="container logo-section">
                    <div class="row">
                        <div class="col-6"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/external/UDDA_Dashboard_Logo.png" class="img-fluid faqLogo"></a></div>
                        <div class="col-6 text-right"><a href="<?php echo base_url('frequently-asked-questions');?>" class="text-white faq-text font-weight-bold">FAQ</a></div>
                    </div>
                    <div class="content-heading">
                        <h1>SPIN & WIN</h1>
                    </div>
                </div>

                <div class="bg-white spinWin-container container ">
                    <div class="row">
                        <div class="col-md-5 colL text-center">
                            <img src="<?php echo base_url();?>assets/images/external/spin-win-screenshort.png" class="img-fluid">
                        </div>
                        <div class="col-md-7 colR text-center pt-4">
                            <div class="referDiv">
                                <p class=" blue-color">PLAY THE SPIN & WIN</p>
                                <p class="mb-0">Daily for a chance to win <span class="bolder"> FREE</span> </p>
                                <p class="mb-0"><span class="bolder"> UDDA</span> Bucks, redeem swag</p>
                                <p class="mb-0">with your <span class="bolder">UDDA</span> Bucks.</p>

                            </div>
                            <div class="rewardDiv blue-color">
                                <p class="mb-0">Come back daily and get your</p>
                                <p class="mb-0"><span class="bolder">FREE</span> Spin and Win</p>
                            </div>
                            <p class="mb-0 refer-code">Referral Code : <span class="coupon-code bolder">MFXXXXAJ</span>
                                <img src="<?php echo base_url();?>assets/images/external/copy_icon.png" class="img-fluid copy-icon ml-4"></p>
                            <p class="downloadText">Download the app to participate!!!</p>
                            <div class="store-img text-center">
                                <a href="https://apps.apple.com/us/app/udda-sports/id1484047531" target="_blank" rel="noopener">
                                    <img src="<?php echo base_url();?>assets/images/external/app-download.png" class="img-fluid mr-2">
                                </a>
                                <a href="https://play.google.com/store/apps/details?id=com.uddaapp.gaming" target="_blank" rel="noopener">    
                                    <img src="<?php echo base_url();?>assets/images/external/google-play.png" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <footer class="faq-footer px-4 py-4">
            <?php include 'footer.php';?>
        </footer>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>UDDA | Baby Bingo</title>
    <?php include 'app_pages_stylesheet.php';?>
</head>
<body>
    <div class=" privateBetContainer">
        <div class="row m-0">
            <div class="col-sm-12">
                <div class="text-center">
                    <img src="<?php echo base_url();?>assets/images/UDDA_Dashboard_Logo.png" class="img-fluid uddaBetLogo">
                    <h1 class="blue-color privateFontStyle"><?php echo $bingo_title;?></h1>
                </div>
                <div class="row profileDetailDiv border-bottom m-0 pb-2">
                    <div class="col-6 pl-0">
                        <img src="<?php echo base_url();?>assets/images/bag.jpg" class="img-fluid rounded-circle mr-2 border ProfileImg">
                        <div class="profileDetailStyle">
                            <p class="m-0 font-weight-bold">From</p>
                            <h5 class="m-0 font-weight-bold"><?php echo $firstname;?></h5>
                        </div>
                    </div>
                    <div class="col-6 pr-0">
                        <div class="text-right profileDetailStyle w-100">
                            <p class="m-0 font-weight-bold"><?php echo date("F j, Y T", strtotime($created_at));?></p>
                            <p class="m-0 font-weight-bold"><?php echo date("h:i A", strtotime($created_at));?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-2 mx-0">
            <div class="col-12">               
                <table class="football-table w-100 privateFontStyle">
                    <?php
                        $i = 1;
                        foreach ($all_gifts as $key) { 
                            $gift_name[] = $key['gift_name'];
                        }
                        //echo "<pre>"; print_r( $gift_name);
                        $start = 0;
                        $stop = 5;
                        echo '<tr>';
                        foreach ($all_gifts as $key) 
                        {
                            for ($k=$start; $k < $stop; $k++) 
                            { 
                                    if(isset($gift_name[$k]) && $k==0){                                        
                                        echo '<td>';
                                        echo "<span style='color:#f096ab;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }
                                    if(isset($gift_name[$k]) && $k==1){
                                        echo '<td>';
                                        echo "<span style='color:#3bc4c5;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==2){
                                        echo '<td>';
                                        echo "<span style='color:#21c95c;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==3){
                                        echo '<td>';
                                        echo "<span style='color:#9f0ac4;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==4){
                                        echo '<td>';
                                        echo "<span style='color:#978e84;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==5){
                                        echo '<td>';
                                        echo "<span style='color:#44a3bb;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==6){
                                        echo '<td>';
                                        echo "<span style='color:#c542ba;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==7){
                                        echo '<td>';
                                        echo "<span style='color:#b32222;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==8){
                                        echo '<td>';
                                        echo "<span style='color:#e75fa2;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==9){
                                        echo '<td>';
                                        echo "<span style='color:#6cc88d;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==10){
                                        echo '<td>';
                                        echo "<span style='color:#7640d9;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==11){
                                        echo '<td>';
                                        echo "<span style='color:#8f7474;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==12){
                                        echo '<td>';                                        
                                        echo "<img src='../assets/images/bingo-center.png'>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==13){
                                        echo '<td>';
                                        echo "<span style='color:#d8c41d;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==14){
                                        echo '<td>';
                                        echo "<span style='color:#d36dbc;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==15){
                                        echo '<td>';
                                        echo "<span style='color:#30d46a;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==16){
                                        echo '<td>';
                                        echo "<span style='color:#6097db;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==17){
                                        echo '<td>';
                                        echo "<span style='color:#bb8840;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==18){
                                        echo '<td>';
                                        echo "<span style='color:#887171;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==19){
                                        echo '<td>';
                                        echo "<span style='color:#34b8c8;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==20){
                                        echo '<td>';
                                        echo "<span style='color:#932bd5;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==21){
                                        echo '<td>';
                                        echo "<span style='color:#1e3fbb;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==22){
                                        echo '<td>';
                                        echo "<span style='color:#1e3fbb;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==23){
                                        echo '<td>';
                                        echo "<span style='color:#c58686;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==24){
                                        echo '<td>';
                                        echo "<span style='color:#55bc2d;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }

                                    if(isset($gift_name[$k]) && $k==25){
                                        echo '<td>';
                                        echo "<span style='color:black;'>".$gift_name[$k]."</span>";
                                        echo '</td>';
                                    }                                    
                            }
                            $start = $start+5;
                            $stop = $stop+5; 	
                            echo '</tr>';                        
                            $i++;
                        }                   
                    ?>                                                                                           
                </table>               
            </div>
        </div>
        <div class="row mt-3 pb-2 mx-0">
            <h5 class="privateFontStyle text-center w-100 mb-3 mx-4 headingOrangeFont">Steve has invited you to join Baby Bingo
            </h5>
            <h5 class="color-orange privateFontStyle text-center w-100 mb-3 headingOrangeFont detailsHeading"><u>Baby Bingo Details</u>
                <img src="<?php echo base_url();?>assets/images/info_icon.png">
            </h5>
            <h5 class="color-orange privateFontStyle text-center w-100 mb-3 headingOrangeFont ">Download the app to participate!!!
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
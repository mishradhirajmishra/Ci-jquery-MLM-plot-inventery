<hr>
<div class="row" >
    <div class="col-sm-12" ">
    <div class="panel panel-success" data-collapsed="0">
        <div class="panel-body">
    <div class=" col-xs-6">

        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-users"></i></div>
            <div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">
                <?php $c=$this->admin_model->total_sale(); if($c){echo $c;} else 0;?>
            </div>
            <h3>TotalSale</h3>

        </div>

    </div>

    <div class="col-xs-6">

        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1500" data-delay="600">
                <?php $a=$this->admin_model->today_sale(); if($a){echo $a;} else {echo '0';};?>

            </div>
            <h3>Today Sale</h3>
        </div>

    </div>

    <div class="col-xs-6">

        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-mail"></i></div>
            <div class="num" data-start="0" data-end="23" data-postfix="" data-duration="1500" data-delay="1200">

                <?php $tb=$this->admin_model->today_business(); if($tb){echo $tb;} else {echo '0';};?>
            </div>

            <h3>Today Business</h3>
        </div>

    </div>

    <div class="col-xs-6">

        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-rss"></i></div>
            <div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">
                <?php $ttb=$this->admin_model->total_business();if($ttb){echo $ttb;} else {echo '0';};?>
            </div>

            <h3>Total Business</h3>

        </div>

    </div>
<!------------------------>
            <?php $plt=$this->admin_model->total_plot();?>

            <div class="col-xs-6">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-rss"></i></div>
                    <div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">
                        <?php $tsp=$this->admin_model->total_sold_plot();if($tsp){echo $tsp;} else {echo '0';};?>
                    </div>

                    <h3>Booked Plot</h3>

                </div>

            </div>
            <div class="col-xs-6">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-rss"></i></div>
                    <div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">
                        <?php $abl=$plt-$tsp; if($abl){echo $abl;} else {echo '0';};?>
                    </div>
                    <h3>Available Plot </h3>

                </div>

            </div>

            <div class="col-xs-12">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-rss"></i></div>
                    <div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">
                        <?php if($plt){echo $plt;} else {echo '0';};?>
                    </div>

                    <h3>Total Plot</h3>

                </div>

            </div>
<!------------------------>
 </div>
 </div>
 </div>



</div>




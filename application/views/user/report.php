<style>
    .panel-title1 {
        padding: 10px;
    }</style>
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        // Sample Toastr Notification



        $(".monthly-sales").sparkline([1,2,3,5,6,7,2,3,3,4,3,5,7,2,4,3,5,4,5,6,3,2], {
            type: 'bar',
            barColor: '#485671',
            height: '80px',
            barWidth: 10,
            barSpacing: 2
        });


        // JVector Maps
        var map = $("#map");

        map.vectorMap({
            map: 'europe_merc_en',
            zoomMin: '3',
            backgroundColor: '#383f47',
            focusOn: { x: 0.5, y: 0.8, scale: 3 }
        });



        // Line Charts

        var data =<?php print_r($sale);?>;
        var line_chart_demo = $("#line-chart-demo");
        var line_chart = Morris.Line({
            element: 'line-chart-demo',
            data: data,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Sale'],
            redraw: true
        });

        line_chart_demo.parent().attr('style', '');
        // Line Charts

        var data =<?php print_r($sale_m);?>;
        var line_chart_demo1 = $("#line-chart-demo1");
        var line_chart = Morris.Line({
            element: 'line-chart-demo1',
            data: data,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Sale'],
            redraw: true
        });

        line_chart_demo1.parent().attr('style', '');


        // Donut Chart
        <?php $a=$this->user_model->total_plot(); ?>
        <?php $s=$this->user_model->total_sold_plot();?>
        var bp=<?php echo $a;?>;
        var ap=<?php echo $a-$s;?>;
        var donut_chart_demo = $("#donut-chart-demo");

        donut_chart_demo.parent().show();

        var donut_chart = Morris.Donut({
            element: 'donut-chart-demo',
            data: [
                {label: "Booked Plot", value: bp},
                {label: "Available Plot ", value: ap},

            ],
            colors: ['#707f9b', '#455064']
        });

        donut_chart_demo.parent().attr('style', '');


        // Area Chart
        var area_chart_demo = $("#area-chart-demo");

        area_chart_demo.parent().show();

        var area_chart = Morris.Area({
            element: 'area-chart-demo',
            data: [
                { y: '2006', a: 100, b: 90 },
                { y: '2007', a: 75,  b: 65 },
                { y: '2008', a: 50,  b: 40 },
                { y: '2009', a: 75,  b: 65 },
                { y: '2010', a: 50,  b: 40 },
                { y: '2011', a: 75,  b: 65 },
                { y: '2012', a: 100, b: 90 }
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            lineColors: ['#303641', '#576277']
        });

        area_chart_demo.parent().attr('style', '');




        // Rickshaw
        var seriesData = [ [], [] ];

        var random = new Rickshaw.Fixtures.RandomData(50);

        for (var i = 0; i < 50; i++)
        {
            random.addData(seriesData);
        }

        var graph = new Rickshaw.Graph( {
            element: document.getElementById("rickshaw-chart-demo"),
            height: 193,
            renderer: 'area',
            stroke: false,
            preserve: true,
            series: [{
                color: '#73c8ff',
                data: seriesData[0],
                name: 'Upload'
            }, {
                color: '#e0f2ff',
                data: seriesData[1],
                name: 'Download'
            }
            ]
        } );

        graph.render();

        var hoverDetail = new Rickshaw.Graph.HoverDetail( {
            graph: graph,
            xFormatter: function(x) {
                return new Date(x * 1000).toString();
            }
        } );

        var legend = new Rickshaw.Graph.Legend( {
            graph: graph,
            element: document.getElementById('rickshaw-legend')
        } );

        var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
            graph: graph,
            legend: legend
        } );

        setInterval( function() {
            random.removeData(seriesData);
            random.addData(seriesData);
            graph.update();

        }, 500 );
    });


    function getRandomInt(min, max)
    {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
</script>

<div class="row">
    <div class="col-md-12">
        <!--=====================================-->
        <label class="col-xs-2">Sellect:</label>
        <div class="col-xs-3">
            <input type="text" id="demo-2"  class="form-control" onchange="getinstal(value)" value="<?php echo $date; ?>">
        </div>
        <div class="col-xs-7">
          <!--  <h5 class="page-title" style="text-align:right;font-weight: bold;color: darkgoldenrod;margin: 0px"> <?php /*echo($year); */?></h5>-->
        </div>
        <!--=====================================-->
        <!--end panal body-->
        <br>    <br>
    </div>
    <br>
    <!--=====================================-->
    <div class="col-sm-12">
        <div class="panel panel-dark" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title1">
                    <i class="entypo-plus-circled"></i>
                    Yearly Sale
                    &nbsp;  &nbsp;  &nbsp;  &nbsp;
                    ( Business in Lacks ) &nbsp;  &nbsp;  &nbsp;  &nbsp; :  &nbsp;  &nbsp;  &nbsp;  &nbsp;<span style="color: yellow"><?php echo($year); ?></span>
                </div>
            </div>
            <div class="panel-body">
        <div id="line-chart-demo" class="morrischart" style="height: 300px"></div>

    </div>
    </div>
    </div>
    <!--=====================================-->
    <div class="col-sm-12">
        <div class="panel panel-dark" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title1">
                    <i class="entypo-plus-circled"></i>
                    Monthaly Sale
                    &nbsp;  &nbsp;  &nbsp;  &nbsp;
                    ( Business in Lacks ) &nbsp;  &nbsp;  &nbsp;  &nbsp; :  &nbsp;  &nbsp;  &nbsp;  &nbsp;<span style="color: yellow"><?php echo($month); ?></span>
                </div>
            </div>
            <div class="panel-body">
                <div id="line-chart-demo1" class="morrischart" style="height: 300px"></div>

            </div>
        </div>
    </div>
    <!--=====================================-->
</div>

<!--------------------------------------------------------------------->
<div class="row" style="display: none">
    <div class="col-sm-8">

        <div class="panel panel-primary" id="charts_env">

            <div class="panel-heading">
                <div class="panel-title">Site Stats</div>

                <div class="panel-options">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#area-chart" data-toggle="tab">Area Chart</a></li>
                        <li class="active"><a href="#line-chart" data-toggle="tab">Line Charts</a></li>
                        <li class=""><a href="#pie-chart" data-toggle="tab">Pie Chart</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                <div class="tab-content">

                    <div class="tab-pane" id="area-chart">
                        <div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
                    </div>

                    <div class="tab-pane active" id="line-chart">
                        <div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
                    </div>

                    <div class="tab-pane" id="pie-chart">
                        <div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
                    </div>

                </div>

            </div>

            <table class="table table-bordered table-responsive">

                <thead>
                <tr>
                    <th width="50%" class="col-padding-1">
                        <div class="pull-left">
                            <div class="h4 no-margin">Pageviews</div>
                            <small>54,127</small>
                        </div>
                        <span class="pull-right pageviews">4,3,5,4,5,6,5</span>

                    </th>
                    <th width="50%" class="col-padding-1">
                        <div class="pull-left">
                            <div class="h4 no-margin">Unique Visitors</div>
                            <small>25,127</small>
                        </div>
                        <span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
                    </th>
                </tr>
                </thead>

            </table>

        </div>

    </div>

    <div class="col-sm-4">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                        Real Time Stats
                        <br />
                        <small>current server uptime</small>
                    </h4>
                </div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>

            <div class="panel-body no-padding">
                <div id="rickshaw-chart-demo">
                    <div id="rickshaw-legend"></div>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    $('#demo-2').monthpicker({pattern: 'yyyy-mm',
        selectedYear: 2108,
        startYear: 2018,
        finalYear: <?php echo date('Y')+1; ?>,});
    var options = {
        selectedYear:2018,
        startYear: 2108,
        finalYear: <?php echo date('Y')+1; ?>,
        openOnFocus: false // Let's now use a button to show the widget
    };
    function getinstal(x){
        loadview('report/'+x)
    }

</script>



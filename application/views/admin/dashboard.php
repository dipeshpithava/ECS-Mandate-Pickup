<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>
</head>

<body>

    <section id="container">
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="javascript:void(0);" class="logo"></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">

                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?=base_url()?>auth/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <?php include_once( 'includes/sidebar.php'); ?>
        </aside>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h1 class="page-header">Dashboard</h1>
                <hr>
                <div class="row mt">
                    <div class="col-lg-12">
                        <!-- <div id="site_users_chart"></div> -->

                        <div class="col-lg-12">
                            <div id="reports_chart"></div>
                        </div>
                        </style>

                    </div>
                </div>
            </section>
            <!-- /wrapper -->
        </section>
        <!-- /MAIN CONTENT -->

        <!--main content end-->
    </section>

    <?php include_once( 'includes/site_bottom_scripts.php'); ?>
    <script src="//code.highcharts.com/highcharts.js"></script>
    <script src="//code.highcharts.com/modules/exporting.js"></script>

    <script>
    $(document).ready(function(){

    $('#reports_chart').highcharts({
            title: {
                text: 'Overview',
                x: -20 //center
            },
            xAxis: {
                categories: [
                    <?php 
                        $nodes = '';
                        foreach($users_this_week as $u){
                            $nodes .= "'". date('d M', strtotime($u['date'])) . "',";
                        }
                        echo substr($nodes, 0,-1);
                    ?>
                ]
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'PDF Downloads',
                data: [<?php 
                        $nodes = '';
                        foreach($pdf_download as $u){
                            $nodes .= $u['users'] . ",";
                        }
                        echo substr($nodes, 0,-1);
                    ?>]
            },{
                name: 'Report Views',
                data: [ <?php 
                        $nodes = '';
                        foreach($users_this_week as $u){
                            $nodes .= $u['users'] . ",";
                        }
                        echo substr($nodes, 0,-1);
                    ?> ]
            }]
        });

    }); // document.ready
    </script>

</body>

</html>
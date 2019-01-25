<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("user/_partials/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("user/_partials/navbar.php") ?>

    <div id="wrapper">

        <div class="container-fluid">

            <div id="report" style="margin: auto;width: 50%;padding: 10px;">
            </div>
            <hr style="background-color: mediumaquamarine;height: 3px;">
            <div id="report1" style="margin: auto;width: 50%;padding: 10px;">
            </div>

        </div>
        
    </div>
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>
<script type="text/javascript">
$(function () {
    $('#report').highcharts({
        <?php
                foreach($report1 as $result){
                    $bulan[] = date("M Y " ,  strtotime($result->bulan));
                    $value[] = (float) $result->jumlah;
                }
            ?>
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: false,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Report Januari - Desember',
            style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        subtitle: {
           text: 'Data Surat Masuk',
           style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:  <?php echo json_encode($bulan);?>
        },
        exporting: { 
            enabled: false 
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
        },
        tooltip: {
             formatter: function() {
                 return 'The value for <b>' + this.x + '</b> is <b>' + Highcharts.numberFormat(this.y,0) + '</b>, in '+ this.series.name;
             }
          },
        series: [{
            name: 'Report Data',
            data: <?php echo json_encode($value);?>,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
</script>


        <script src="<?php echo base_url('assets/jquery/jquery.js')?>"></script>
        <script src="<?php echo base_url('assets/js/highcharts.js');?>"></script>

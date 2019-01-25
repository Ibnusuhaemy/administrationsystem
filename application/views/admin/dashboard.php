<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>	
        <div id="content-wrapper">

<div class="container-fluid">
		<!-- DataTables -->
        <div class="card">
					<div class="card-header">
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0" >
								<thead>
									<tr>
										<th>Kode</th>
										<th>NO Surat</th>
										<th>Tujuan</th>
										<th>Tanggal Surat</th>
										<th>Tanggal Diterima</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($content->result() as $key): ?>
									<tr>
										<td class="small">
											<?php echo $key->kode ?>
										</td>
										<td>
											<?php echo $key->no_surat ?>
										</td>
										<td>
                                        	<?php echo $key->dari ?>
										</td>
										<td>
                                        	<?php echo $key->tgl_surat ?>
										</td>
										<td >
                                        	<?php echo $key->tgl_diterima ?>
                                        </td> 
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
                            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="detail" method="post">
                        <input type="hidden" name="id" > 
                        <div class="modal-body">
                            <?php foreach ($surat_masuk as $key): ?>
                                <div style="float:left;padding-right:20px;width: 100%;">
                                    <p style="display: inline-block;">Kode : </p>
                                    <p style="display: inline-block;"><?php echo $key->kode ?></p>
                                </div><br><hr>
                                <div style="float:left;padding-right:20px;width: 100%;">
                                    <p style="display: inline-block;">No Surat   : </p>
                                    <p style="display: inline-block;"><?php echo $key->no_surat ?></p>
                                </div><br><hr>
                                <div style="float:left;padding-right:20px;width: 100%;">
                                    <p style="display: inline-block;">Perihal : </p>
                                    <p style="display: inline-block;"><?php echo $key->isi_surat ?></p>
                                </div><br><hr>
                                <div style="float:left;padding-right:20px;width: 100%;">
                                    <p style="display: inline-block;">Dari : </p>
                                    <p style="display: inline-block;"><?php echo $key->dari ?></p>
                                </div><br><hr>
                                <div style="float:left;padding-right:20px;width: 100%;">
                                    <p style="display: inline-block;">Tanggal Surat : </p>
                                    <p style="display: inline-block;"><?php echo $key->tgl_surat ?></p>
                                </div><br><hr>
                                <div style="float:left;padding-right:20px;width: 100%;">
                                    <p style="display: inline-block;">Tanggal Diterima : </p>
                                    <p style="display: inline-block;"><?php echo $key->tgl_diterima ?></p>
                                </div><br><hr>
                                <div style="float:left;padding-right:20px;width: 100%;">
                                    <p style="display: inline-block;">Keterangan : </p>
                                    <p style="display: inline-block;"><?php echo $key->keterangan ?></p>
                                </div><br><hr>
                                <div style="float:left;padding-right:20px;width: 100%;">
                                    <p style="display: inline-block;">File : </p>
                                    <p style="display: inline-block;"><?php echo $key->file ?></p>
                                </div><br><hr>
                            <?php endforeach; ?>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
						</div>
					</div>
				</div>

			</div>		
	</div>
    <!-- Sticky Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
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


    $('#btn-delete').attr('href', url);
    $('#detailModal').modal();
}
    $(".btn-delete").click(function(){
        $("#detail [name=id]").val($(this).attr("data-id"));
    });

    $("#detail").submit(function(){
        $.ajax({
            url: "<?= base_url("admin/masuk/detail")?>" ,
            data : $(this).serialize(),
            dataType:"JSON" ,
            method: "POST" ,
            success:function(resp){
                window.location = "<?= base_url("admin/masuk")?>";
            }
        });
    });
</script>


        <script src="<?php echo base_url('assets/jquery/jquery.js')?>"></script>
        <script src="<?php echo base_url('assets/js/highcharts.js');?>"></script>

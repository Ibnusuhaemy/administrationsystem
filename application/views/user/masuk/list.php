<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("user/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("user/_partials/navbar.php") ?>
	<div id="wrapper">


		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("user/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kode</th>
										<th>Perihal</th>
										<th>Dari</th>
										<th>NO Surat</th>
										<th>Tanggal Surat</th>
										<th>Tanggal Diterima</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($kuy as $key): ?>
									<tr>
										<td class="small">
											<?php echo $key->kode ?>
										</td>
										<td width="150">
                                        	<?php echo $key->isi_surat ?>
										<td >
											<?php echo $key->dari ?>
										</td>
										<td>
											<?php echo $key->no_surat ?>
										</td>
										<td>
                                        	<?php echo $key->tgl_surat ?>
										</td>
										<td >
                                        	<?php echo $key->tgl_diterima ?>
										</td>
										<td>	
											<a href="<?php echo site_url('admin/keluar/print/'.$key->id_masuk) ?>"
											 class="btn btn-small text-success"><i class="fas fa-print"></i> Print</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
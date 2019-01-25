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
				<div class="card mb-3">
					<div class="card-header">
					<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
						<a href="<?php echo site_url('admin/masuk/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kode</th>
										<th>NO Surat</th>
										<th>Kepada</th>
										<th>Perihal</th>
										<th>Tanggal Surat</th>
										<th>Tanggal Catat</th>
										<th>Keterangan</th>
										<th>File</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($surat_keluar->result() as $key): ?>
									<tr>
										<td >
											<?php echo $key->kode ?>
										</td>
										<td>
											<?php echo $key->no_surat ?>
										</td>
										<td>
											<?php echo $key->tujuan ?>
										</td>
										<td>
											<?php echo $key->isi ?>
										</td>
										<td>
                                        	<?php echo $key->tgl_surat ?>
										</td>
										<td >
                                        	<?php echo $key->tgl_catat ?>
                                        </td>
                                        <td >
                                        	<?php echo $key->keterangan ?>
                                        </td>
                                        <td >
                                        	<?php echo $key->file ?>
                                        </td>
										<td width="100">
											<a href="<?php echo site_url('admin/keluar/edit/'.$key->id_keluar) ?>"
											 class="btn btn-small" style="color:#ffb300;"><i class="fas fa-edit"></i> Edit</a>
											 <a href="<?php echo site_url('admin/keluar/print/'.$key->id_keluar) ?>"
											 class="btn btn-small" style="color:#2fd01d;"><i class="fas fa-print"></i> Print</a>
											 <!-- <a onclick="deleteConfirm('<?php //echo site_url('admin/keluar/delete/'.$key->id_masuk) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> -->
											 <a href="#deleteModal" data-id="<?= $key->id_keluar ?>" data-toggle="modal" class="btn btn-small btn-delete text-danger"><i class="fas fa-trash"></i> Hapus</a>
										
										</td> 
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
						</button>
					</div>
					<form id="hapuss" method="post">
						<input type="hidden" name="id" > 
						<div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
						<div class="modal-footer">
							<a class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</a>
							<button type="submit" id="btn-delete" class="btn btn-danger">Delete</a>
						</div>
					</form>
					</div>
				</div>
			</div>
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
						</div>
						<div class="modal-footer">
							<a class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</a>
						</div>
					</form>
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>
    
    <script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
	$(".btn-delete").click(function(){
		$("#hapuss [name=id]").val($(this).attr("data-id"));
	});

	$("#hapuss").submit(function(){
		$.ajax({
			url: "<?= base_url("admin/masuk/delete")?>" ,
			data : $(this).serialize(),
			dataType:"JSON" ,
			method: "POST" ,
			success:function(resp){
				window.location = "<?= base_url("admin/masuk")?>";
			}
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

</body>

</html>
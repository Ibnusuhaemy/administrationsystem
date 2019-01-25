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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">
						<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
						<a href="<?php echo site_url('admin/keluar/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/keluar/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $surat_keluar->id_keluar?>" />

							<div class="form-group">
								<label for="name">Kode*</label>
								<select class="form-control" name="kode" id="sel1" value="<?php echo $surat_keluar->kode?>">
								<?php foreach($content->result() as $key ):?>
									<option><?php echo $key->kategori?></option>
								<?php endforeach?>
                                </select>
							</div> 

							<div class="form-group">
								<label for="name">Perihal*</label>
								<input class="form-control <?php echo form_error('') ? 'is-invalid' : ''?>"
								type="text" name="isi" placeholder="perihal Surat" value="<?php echo $surat_keluar->isi?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('isi')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Kepada*</label>
								<input class="form-control <?php echo form_error('tujuan') ? 'is-invalid' : ''?>"
								type="text" name="tujuan" placeholder="Kepada" value="<?php echo $surat_keluar->tujuan?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tujuan')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Tanggal Surat*</label>
								<input class="form-control tanggal<?php echo form_error('tgl_surat') ? 'is-invalid' : ''?>"
								type="text" name="tgl_surat" placeholder="Tanggal Surat" value="<?php echo $surat_keluar->tgl_surat?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_surat')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Tanggal Catat*</label>
								<input class="form-control tanggal<?php echo form_error('tgl_catat') ? 'is-invalid' : ''?>"
								type="text" name="tgl_catat" placeholder="Tanggal Catat" value="<?php echo $surat_keluar->tgl_catat?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_catat')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Keterangan*</label>
								<input class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : ''?>"
								type="text" name="keterangan" placeholder="Keterangan" value="<?php echo $surat_keluar->keterangan?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('keterangan')?>
								</div>
							</div>
                            

							<div class="form-group">
								<label for="name">File*</label>
									<input class="form-control-file <?php echo form_error('file') ? 'is-invalid':'' ?>"
									type="file" name="file" value="<?php echo $surat_keluar->file?>"/>
									<input type="hidden" name="old_file" value="<?php echo $surat_keluar->file ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('file') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>

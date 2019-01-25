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
						<a href="<?php echo site_url('admin/masuk/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/masuk/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $surat_masuk->id_masuk?>" />

							<div class="form-group">
								<label for="name">Kode*</label>
								<select class="form-control" name="kode" id="sel1" value="<?php echo $surat_masuk->kode?>">
								<?php foreach($content->result() as $key ):?>
									<option><?php echo $key->kategori?></option>
								<?php endforeach?>
                                </select>
							</div> 

							<div class="form-group">
								<label for="name">Perihal*</label>
								<input class="form-control <?php echo form_error('isi_surat') ? 'is-invalid' : ''?>"
								type="text" name="isi_surat" placeholder="Isi Surat" value="<?php echo $surat_masuk->isi_surat?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('isi_surat')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Dari*</label>
								<input class="form-control <?php echo form_error('dari') ? 'is-invalid' : ''?>"
								type="text" name="dari" placeholder="Dari" value="<?php echo $surat_masuk->dari?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('dari')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Tanggal Surat*</label>
								<input class="form-control tanggal<?php echo form_error('tgl_surat') ? 'is-invalid' : ''?>"
								type="text" name="tgl_surat" placeholder="Tanggal Surat" value="<?php echo $surat_masuk->tgl_surat?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_surat')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Tanggal Diterima*</label>
								<input class="form-control tanggal<?php echo form_error('tgl_diterima') ? 'is-invalid' : ''?>"
								type="text" name="tgl_diterima" placeholder="Tanggal Diterima" value="<?php echo $surat_masuk->tgl_diterima?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_diterima')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Keterangan*</label>
								<input class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : ''?>"
								type="text" name="keterangan" placeholder="Keterangan" value="<?php echo $surat_masuk->keterangan?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('keterangan')?>
								</div> 
							</div>
                            

							<div class="form-group">
								<label for="name">File*</label>
									<input class="form-control-file <?php echo form_error('file') ? 'is-invalid':'' ?>"
									type="file" name="file" value="<?php echo $surat_masuk->file?>"/>
									<input type="hidden" name="old_file" value="<?php echo $surat_masuk->file ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('file') ?>
								</div>
							</div>

							<!-- <div class="form-group">
								<label for="name">Gambar*</label>
								<input class="form-control-file <?php //echo form_error('gambar') ? 'is-invalid':'' ?>"
								 type="file" name="gambar" value="<?php //echo $surat_masuk->gambar?>"/>
								 <input type="hidden" name="old_image" value="<?php //echo $surat_masuk->gambar ?>" />
								<div class="invalid-feedback">
									<?php //echo form_error('gambar') ?>
								</div>
							</div> -->

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

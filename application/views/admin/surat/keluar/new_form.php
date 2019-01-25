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
                    <?php echo $this->session->flashdata('success');?>
                </div>
                <?php endif;?>

                <div class="card mb-3">
					<div class="card-header">
					<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
						<a href="<?php echo site_url('admin/masuk') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>

                    <div class="card-body">

						<form action="<?php base_url('admin/keluar/add') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
								<label for="name">Kode*</label>
								<select class="form-control" name="kode" id="sel1">
								<?php foreach($content->result() as $key ):?>
									<option><?php echo $key->kategori?></option>
								<?php endforeach?>
                                </select>
							</div> 

							<div class="form-group">
								<label for="name">No Surat*</label>
								<input class="form-control <?php echo form_error('no_surat') ? 'is-invalid' : ''?>"
								 type="text" name="no_surat" placeholder="No Surat"/>
								<div class="invalid-feedback">
									<?php echo form_error('no_surat')?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Perihal*</label>
								<input class="form-control <?php echo form_error('isi') ? 'is-invalid' : ''?>"
								type="text" name="isi" placeholder="Perihal"/>
								<div class="invalid-feedback">
									<?php echo form_error('isi')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Tujuan*</label>
								<input class="form-control <?php echo form_error('tujuan') ? 'is-invalid' : ''?>"
								type="text" name="tujuan" placeholder="Tujuan"/>
								<div class="invalid-feedback">
									<?php echo form_error('tujuan')?>
								</div> 
							</div>
							<div class="form-group">
								<label for="name">Tanggal Surat*</label>
								<input class=" form-control tanggal<?php echo form_error('tgl_surat') ? 'is-invalid' : ''?>"
								type="text" name="tgl_surat" placeholder="Tanggal Surat" value=""/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_surat')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Tanggal Catat*</label>
								<input class="form-control tanggal<?php echo form_error('tgl_catat') ? 'is-invalid' : ''?>"
								type="text" name="tgl_catat" placeholder="Tanggal Catat"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_catat')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Keterangan*</label>
								<input class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : ''?>"
								type="text" name="keterangan" placeholder="Keterangan"/>
								<div class="invalid-feedback">
									<?php echo form_error('keterangan')?>
								</div> 
							</div>
                            

							<div class="form-group">
								<label for="name">File*</label>
									<input class="form-control-file <?php echo form_error('file') ? 'is-invalid':'' ?>"
									type="file" name="file" />
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
			</div>
		</div>
	</div>
</body>
<?php $this->load->view("admin/_partials/js.php") ?>

<!-- <script>
	$(".datepicker1").datepicker({});
</script> -->
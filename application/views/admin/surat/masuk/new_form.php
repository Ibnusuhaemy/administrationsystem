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

						<form action="<?php base_url('admin/masuk') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
								<label for="name">Kode*</label>
								<select class="form-control" name="kode" id="sel1">
								<?php foreach($content->result() as $key ):?>
									<option><?php echo $key->kategori?></option>
								<?php endforeach?>
                                </select>
							</div> 

							<div class="form-group">
								<label for="name">Perihal*</label>
								<input class="form-control <?php echo form_error('isi_surat') ? 'is-invalid' : ''?>"
								type="text" name="isi_surat" placeholder="Perihal Surat"/>
								<div class="invalid-feedback">
									<?php echo form_error('isi_surat')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Dari*</label>
								<input class="form-control <?php echo form_error('dari') ? 'is-invalid' : ''?>"
								type="text" name="dari" placeholder="Dari"/>
								<div class="invalid-feedback">
									<?php echo form_error('dari')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Tanggal Surat*</label>
								<input class="form-control tanggal<?php echo form_error('tgl_surat') ? 'is-invalid' : ''?>"
								type="text" name="tgl_surat" placeholder="Tanggal Surat"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_surat')?>
								</div> 
							</div>

							<div class="form-group">
								<label for="name">Tanggal Diterima*</label>
								<input class="form-control tanggal<?php echo form_error('tgl_diterima') ? 'is-invalid' : ''?>"
								type="text" name="tgl_diterima" placeholder="Tanggal Diterima"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_diterima')?>
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

<script type="text/javascript">// Ini scriptnya
var imgOut = document.getElementById("img");
var b64 = document.getElementById("b64");
function readFile() {
  if (this.files && this.files[0]) {
    var FR= new FileReader();
    FR.addEventListener("load", function(e) {
      imgOut.src = e.target.result;
      b64.value = e.target.result;
    });
    FR.readAsDataURL( this.files[0] );
  }
}
document.getElementById("inp").addEventListener("change", readFile);
</script>
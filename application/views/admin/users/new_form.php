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

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success');?>
                </div>
                <?php endif;?>

                <div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/users/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>

                    <div class="card-body">

						<form action="<?php base_url('admin/user/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Username*</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder="Username" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div> 

							<div class="form-group">
								<label for="name">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid' : ''?>"
								 type="email" name="email" placeholder="Email"/>
								<div class="invalid-feedback">
									<?php echo form_error('email')?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Password*</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid' : ''?>"
								type="password" name="password" placeholder="Password"/>
								<div class="invalid-feedback">
									<?php echo form_error('password')?>
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
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>	

		<div class="container-fluid">
			<h1>File PDF</h1>

<div id="materipdf"></div>
		
	</div>

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>

</body>
    <script src="<?php echo base_url('assets/jquery/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/js/highcharts.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/PDFObject-master/pdfobject.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/PDFObject-master/pdfobject.min.js')?>"></script>
                <script>
                     var options = {
                           width: "100%",
                           height: "100vh"
                        };
                        PDFObject.embed("<?php echo base_url('assets/JUKLAK JUKNIS LOMBA PRAMUKA LSC paling baru.pdf');?>", "#materipdf", options);
                    </script>


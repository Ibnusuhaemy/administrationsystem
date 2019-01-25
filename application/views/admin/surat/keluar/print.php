<html>
 <head>
  <!-- <title> Cara Membikin Surat </title> -->
  <?php $this->load->view("admin/_partials/head.php") ?>
  <link rel="stylesheet" type="text/css" href="<script type=text/javascript" src="<?php echo base_url();?>assets/print/normalize.min.css">
    <style type="text/css">
      @media print {
    body {transform: scale(.7);}
    table {page-break-inside: avoid;}
}
    </style>
 </head>

 <body>
  <?php foreach ($surat_keluar->result() as $key): ?>
                      <?php $key->file ?>
                  <?php endforeach; ?>
  <?php $url = $key->file; ?>

  <div id="materipdf"></div>
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>
  <?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>
    
  <script type="text/javascript" src="<?php echo base_url('assets/js/PDFObject-master/pdfobject.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/PDFObject-master/pdfobject.min.js')?>"></script>
    <script>
         var options = {
               width: "100%",
               height: "100vh"
            };
            PDFObject.embed("<?php echo base_url('upload/file/'.$surat_keluar->result()[0]->file) ;?>", "#materipdf", options);
        </script>
  </body>
</html>
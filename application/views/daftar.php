<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" href="https://getbootstrap.com/docs/3.4/favicon.ico">
  <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/navbar-static-top/"> -->

  <title>Daftar Karyawan</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url("assets/bootstrap-3.4.1-dist/css/bootstrap.min.css") ?>" rel="stylesheet">
  <?php
  foreach ($css_files as $file) : ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; ?>
  <!-- Custom styles for this template -->
  <!-- <link href="./template_files/navbar-static-top.css" rel="stylesheet"> -->

</head>

<body>

  <!-- Static navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url(""); ?>">ASIH - Absensi Harian</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url(""); ?>">Absensi</a></li>
          <li class="active"><a href="<?php echo base_url("daftar"); ?>">Daftar Karyawan</a></li>
          <li><a href="<?php echo base_url("rekap"); ?>">Rekap Absensi</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>


  <div class="container">
    <?php echo $output; ?>
  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url("assets/jquery/jquery-3.5.1.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/bootstrap-3.4.1-dist/js/bootstrap.min.js") ?>"></script>
  <?php foreach ($js_files as $file) : ?>
    <script src="<?php echo $file; ?>"></script>
  <?php endforeach; ?>

</body>

</html>
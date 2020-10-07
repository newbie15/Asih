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

  <title><?php echo $title; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url("assets/bootstrap-3.4.1-dist/css/bootstrap.min.css") ?>" rel="stylesheet">

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
          <li class="active"><a href="<?php echo base_url(""); ?>">Absensi</a></li>
          <li><a href="<?php echo base_url("daftar"); ?>">Daftar Karyawan</a></li>
          <li><a href="<?php echo base_url("rekap"); ?>">Rekap Absensi</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>


  <div class="container">
    <p>Silahkan memilih daftar nama dan melakukan absensi</p>

    <div style="text-align: center;">
      <h3>Pilih Nama Karyawan</h3>
      <select id="list">
        <option>==Pilih Salah Satu==</option>
        <?php

        foreach ($daftar as $key => $value) {
          echo "<option>" . $value . "</option>";
        }

        ?>
      </select>
      <br>
      <br>
      <table class="table">
        <thead>
          <td>Action</td>
          <td>Jam</td>
        </thead>
        <tr>
          <td><button class="btn btn-success" id="masuk1">Absen Masuk</button></td>
          <td><span id="jmasuk1">--:--</span></td>
        </tr>
        <tr>
          <td><button class="btn btn-warning" id="istirahat">Absen Istirahat</button></td>
          <td><span id="jistirahat">--:--</span></td>
        </tr>
        <tr>
          <td><button class="btn btn-success" id="masuk2">Absen Masuk 2</button></td>
          <td><span id="jmasuk2">--:--</span></td>
        </tr>
        <tr>
          <td><button class="btn btn-danger" id="pulang">Absen Pulang</button></td>
          <td><span id="jpulang">--:--</span></td>
        </tr>
      </table>


    </div>


  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url("assets/jquery/jquery-3.5.1.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/bootstrap-3.4.1-dist/js/bootstrap.min.js") ?>"></script>

  <script>
    var BASE_URL = "<?php echo base_url(); ?>";
    $(document).ready(function() {
      function ajax_refresh() {
        $.ajax({
          method: "POST",
          url: BASE_URL + "welcome/load",
          data: {
            nama: $("#list").val()
          }
        }).done(function(msg) {
          dt = msg.split("_");
          $("#jmasuk1").text(dt[0].replace(":00", ""));
          $("#jistirahat").text(dt[1].replace(":00", ""));
          $("#jmasuk2").text(dt[2].replace(":00", ""));
          $("#jpulang").text(dt[3].replace(":00", ""));
        });
      }

      $("#list").change(function() {
        $("#jmasuk1").text("--:--");
        $("#jistirahat").text("--:--");
        $("#jmasuk2").text("--:--");
        $("#jpulang").text("--:--");
        ajax_refresh();
      });

      $("#masuk1").click(function() {
        if ($("#list").val() == "==Pilih Salah Satu==") {
          alert("pilih karyawan dulu");
        } else {
          $.ajax({
            method: "POST",
            url: BASE_URL + "welcome/getclock",
            data: {
              nama: $("#list").val(),
              button: "masuk1",
            }
          }).done(function(msg) {
            $("#jmasuk1").text(msg);
          });
        }
      });

      $("#istirahat").click(function() {
        if ($("#list").val() == "==Pilih Salah Satu==") {
          alert("pilih karyawan dulu");
        } else {
          $.ajax({
            method: "POST",
            url: BASE_URL + "welcome/getclock",
            data: {
              nama: $("#list").val(),
              button: "istirahat",
            }
          }).done(function(msg) {
            $("#jistirahat").text(msg);
          });
        }
      });

      $("#masuk2").click(function() {
        if ($("#list").val() == "==Pilih Salah Satu==") {
          alert("pilih karyawan dulu");
        } else {
          $.ajax({
            method: "POST",
            url: BASE_URL + "welcome/getclock",
            data: {
              nama: $("#list").val(),
              button: "masuk2",
            }
          }).done(function(msg) {
            $("#jmasuk2").text(msg);
          });
        }
      });

      $("#pulang").click(function() {
        if ($("#list").val() == "==Pilih Salah Satu==") {
          alert("pilih karyawan dulu");
        } else {
          $.ajax({
            method: "POST",
            url: BASE_URL + "welcome/getclock",
            data: {
              nama: $("#list").val(),
              button: "pulang",
            }
          }).done(function(msg) {
            $("#jpulang").text(msg);
          });
        }
      });

      ajax_refresh();
    });
  </script>
</body>

</html>
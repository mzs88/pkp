<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Icon Header -->
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/image/favicon/favicon.ico">

  <!-- Bootstrap Core CSS -->
  <!-- <link rel="stylesheet" href="<?=base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css" /> -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?=base_url()?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="<?=base_url()?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="<?=base_url()?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?=base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Datetimepicker CSS -->
  <link href="<?=base_url()?>assets/vendor/bs-dtp/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


  <!-- Morris Charts CSS -->
  <link href="<?=base_url()?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Alertify CSS -->
  <link href="<?=base_url()?>assets/vendor/alertify/css/alertify.min.css" rel="stylesheet" type="text/css">


  <!-- jQuery -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <!-- <script type="text/javascript" src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="<?=base_url()?>assets/vendor/metisMenu/metisMenu.min.js"></script>

   <!-- DataTables JavaScript -->
  <script>var base_url = '<?= base_url() ?>';</script>
  <script src="<?=base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

  <!-- Morris Charts JavaScript -->
  <script src="<?=base_url()?>assets/vendor/raphael/raphael.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/morrisjs/morris.min.js"></script>

  <!-- Alert JavaScript -->
  <script src="<?=base_url()?>assets/vendor/waitingfor/waitingfor.js"></script>
  <script src="<?=base_url()?>assets/vendor/alertify/alertify.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="<?=base_url()?>assets/dist/js/sb-admin-2.js"></script>

  <!-- Datetimepicker Javascript-->
  <!-- <script type="text/javascript" src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script> -->
  <script type="text/javascript" src="<?=base_url()?>bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <link rel="stylesheet" href="<?=base_url()?>bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
</head>
<body>

  <div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <?= $topnav ?>
      <?= $sidebar ?>
    </nav>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header"><?= $jdl ?></h1>
        </div>
      </div>
      <?= $content ?>
    </div>
  </div>

</body>
</html>
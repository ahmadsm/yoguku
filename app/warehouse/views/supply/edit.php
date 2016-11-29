<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yoguku Warehouse | Control Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>component/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>component/bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>component/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>component/dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-collapse">
<div class="wrapper">

  <?php $this->load->view('app/header'); ?>
  <?php $this->load->view('app/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
        <a href="<?php echo base_url('supply/index'); ?>" class="btn btn-sm btn-flat bg-red pull-right">Back</a>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-danger">
        <div class="box-header with-border">
          <div class="box-title">Form</div>
        </div>
        <div class="box-body">
          <form method="post" action="<?php echo base_url('supply/update') ?>" class="form-horizontal">
            <input type="hidden" name="fk_supplier">
            <input type="hidden" name="fk_material">
            <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
            <div class="form-group">
              <label class="col-sm-3 control-label">Material</label>
              <div class="col-sm-4">
                <select class="form-control" name="material">
                <option value="0" id="material">Pilih material</option>
                <?php foreach ($material as $key): ?>
                <option value="<?php echo $key['id'] ?>"><?php echo $key['nama'] ?></optionz>
                <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Supplier</label>
              <div class="col-sm-4">
                <select class="form-control" name="supplier">
                <option value="0" id="supplier">Pilih supplier</option>
                <?php foreach ($supplier as $key): ?>
                <option value="<?php echo $key['id'] ?>"><?php echo $key['nama'] ?></optionz>
                <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Qty</label>
              <div class="col-sm-4">
                <input type="text" name="qty" class="form-control" id="qty" required="" placeholder="Your answer">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4 col-sm-offset-3">
                <button type="submit" class="btn btn-sm btn-flat bg-red">Update Data</button>
              </div>
            </div>
          </form>
        </div>
        <div class="box-footer with-border">
          <div class="box-title">Form</div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('app/footer'); ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>component/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>component/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>component/dist/js/app.min.js"></script>

<script type="text/javascript">
  $('select[name="material"]').change(function(){
    var material = $(this).val();
    $('input[name="fk_material"]').val(material);
  });

  $('select[name="supplier"]').change(function(){
    var supplier = $(this).val();
    $('input[name="fk_supplier"]').val(supplier);
  });

  var id = "<?php echo $this->uri->segment(3); ?>";
  $.ajax({
    type: "post",
    url: "<?php echo base_url(); ?>supply/show",
    data: {"id":id},
    success: function(res) {
      var obj = JSON.parse(res);
      $('#material').html(obj.material);
      $('#supplier').html(obj.supplier);
      $('input[name="fk_material"]').val(obj.fk_material);
      $('input[name="fk_supplier"]').val(obj.fk_supplier);
      $('#qty').val(obj.qty);
      console.log(obj);
    }
  });
</script>

</body>
</html>
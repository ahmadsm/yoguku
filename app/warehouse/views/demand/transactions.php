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

    <body class="hold-transition skin-blue">
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
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <div class="box-title">Data</div>
                        </div>
                        <div class="box-body">
                            <?php //print_r($records);?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;">No</th>
                                        <th style="vertical-align: middle;">Code</th>
                                        <th style="vertical-align: middle;">Title</th>
                                        <th style="vertical-align: middle;">Materials</th>
                                        <th style="vertical-align: middle;">Created Date</th>
                                        <th style="vertical-align: middle;">Updated Date</th>
                                        <th style="vertical-align: middle;">Status</th>
                                        <th style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($records as $key):
                                        ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?php echo $no; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $key['code']; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $key['title']; ?></td>
                                            <td style="vertical-align: middle;"><a href="" data-toggle="modal" data-target="#myModal<?php echo $no; ?>"><?php echo $key['materials_count']; ?> Unit(s)</a></td>
                                            <td style="vertical-align: middle;"><?php echo $key['request_date']; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $key['update_date']; ?></td>
                                            <td style="vertical-align: middle;">
                                                <h4>
                                                    <?php
                                                    if ($key['status'] == "N") {
                                                        $status = "New Request";
                                                        echo '<span class="label label-info">' . $status . '</span>';
                                                    } elseif ($key['status'] == "A") {
                                                        $status = "Approved";
                                                        echo '<span class="label label-success">' . $status . '</span>';
                                                    } elseif ($key['status'] == "R") {
                                                        $status = "Rejected";
                                                        echo '<span class="label label-warning">' . $status . '</span>';
                                                    }
                                                    ?>
                                                </h4>
                                            </td>
                                            <td style="vertical-align: middle;">                                                
                                                <?php if ($key['status'] == 'N') { ?>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default btn-flat btn-sm ">Change Status</button>
                                                        <button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#" onclick="changestatus(<?php echo $key['id']; ?>, 'A')">Approve</a></li>
                                                            <li><a href="#" onclick="changestatus(<?php echo $key['id']; ?>, 'R')">Reject</a></li>                                                        
                                                        </ul>
                                                    </div>
                                                <?php } else { ?>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default btn-flat btn-sm " disabled>Change Status</button>
                                                        <button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle" disabled >
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>                                                        
                                                    </div>


                                                <?php } ?>                                                
                                            </td>
                                        </tr>
                                        <!--SHOW DETAIL MATERIAL MODAL-->
                                    <div class="modal fade" id="myModal<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                </div>
                                                <div class="modal-body">                                                    
                                                    <?php
                                                    foreach ($key['materials_detail'] as $each) {
                                                        ?>                                                            
                                                        <h4>
                                                            <span class="label label-default"><?php echo $each->material_name ?> - <?php echo $each->qty ?> <?php echo $each->satuan ?></span>
                                                        </h4>

                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $no++;
                                endforeach
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer with-border">
                            <div class="box-title">Data</div>
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
        <script>
                                                                function changestatus(id, status) {
                                                                    var confirm_dialog = confirm('Apakah anda yakin ?');
                                                                    if (confirm_dialog) {
                                                                        var data = {id: id, status: status};
                                                                        $.ajax({
                                                                            type: "POST",
                                                                            url: '<?php echo base_url() . '/demand/transaction_status' ?>',
                                                                            data: data,
                                                                            success: function () {
                                                                                alert('Sukses');
                                                                                location.reload();
                                                                            },
                                                                        });
                                                                    }

                                                                }
        </script>
    </body>
</html>
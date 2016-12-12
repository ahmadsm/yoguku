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
                        <a href="<?php echo base_url('demand/create'); ?>" class="btn btn-sm btn-flat bg-red pull-right">Create New</a>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <div class="box-title">Data</div>
                        </div>
                        <div class="box-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;">No</th>                
                                        <th style="vertical-align: middle;">Material Name</th>
                                        <th style="vertical-align: middle;">Qty</th>
                                        <th style="vertical-align: middle;">Transaction Code</th>
                                        <th style="vertical-align: middle;">Transaction Status</th>
                                        <th style="vertical-align: middle;">Created Date</th>
                                        <th style="vertical-align: middle;">Updated Date</th>
                                        <th style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($demand as $key):
                                        ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?php echo $no; ?></td>                
                                            <td style="vertical-align: middle;"><?php echo $key['material']; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $key['qty']; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $key['transaction_code']; ?></td>
                                            <td style="vertical-align: middle;">
                                                <h4>
                                                    <?php
                                                    if ($key['transaction_status'] == "N") {
                                                        $status = "New Request";
                                                        echo '<span class="label label-info">' . $status . '</span>';
                                                    } elseif ($key['transaction_status'] == "A") {
                                                        $status = "Approved";
                                                        echo '<span class="label label-success">' . $status . '</span>';
                                                    } elseif ($key['transaction_status'] == "R") {
                                                        $status = "Rejected";
                                                        echo '<span class="label label-warning">' . $status . '</span>';
                                                    }
                                                    ?>

                                                </h4>
                                            </td>
                                            <td style="vertical-align: middle;"><?php echo $key['transaction_date']; ?></td>
                                            <td style="vertical-align: middle;"><?php echo $key['transaction_update_date']; ?></td>
                                            <td style="vertical-align: middle;">
                                                <a href="<?php echo base_url('demand/edit/' . $key['id']); ?>" class="btn btn-flat bg-aqua btn-sm"><i class="fa fa-gear"></i></a>
                                                <a href="<?php echo base_url('demand/delete/' . $key['id']); ?>" class="btn btn-flat bg-red btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
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

    </body>
</html>
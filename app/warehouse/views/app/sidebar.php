<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>component/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <!-- Status -->
                <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->            
            <li><a href="<?php echo base_url('app/welcome'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('material/index'); ?>"><i class="fa fa-cube"></i> <span>Material</span></a></li>
                    <li><a href="<?php echo base_url('supplier/index'); ?>"><i class="fa fa-cube"></i> <span>Supplier</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaction</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('supply/index'); ?>"><i class="fa fa-link"></i> <span>Transaction Supply</span></a></li>
                    <li><a href="<?php echo base_url('demand/transactions'); ?>"><i class="fa fa-link"></i> <span>Transaction Demand</span></a></li>
                    <li><a href="<?php echo base_url('demand/index'); ?>"><i class="fa fa-link"></i> <span>Transaction Demand Detail</span></a></li>
                </ul>
            </li>            
            <li><a href="<?php echo base_url('app/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Sign out</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
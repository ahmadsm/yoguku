<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $this->db->count_all('material'); ?></h3>
                <p>Materials</p>
            </div>
            <div class="icon">
                <i class="ion ion-cube"></i>
            </div>
            <a href="<?php echo base_url('material/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green-active">
            <div class="inner">
                <h3><?php echo $this->db->count_all('supplier'); ?></h3>
                <p>Supplier</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url('supplier/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3><?php echo $this->db->count_all('supply'); ?></h3>
                <p>Transaction Supply</p>
            </div>
            <div class="icon">
                <i class="fa fa-cart-plus"></i>
            </div>
            <a href="<?php echo base_url('supply/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red-active">
            <div class="inner">
                <h3><?php echo $this->db->count_all('transaction_demand'); ?></h3>
                <p>Transaction Demand</p>
            </div>
            <div class="icon">
                <i class="fa fa-cart-arrow-down"></i>
            </div>
            <a href="<?php echo base_url('demand/transactions'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red-gradient">
            <div class="inner">
                <h3><?php echo $this->db->count_all('demand'); ?></h3>
                <p>Demand Detail</p>
            </div>
            <div class="icon">
                <i class="fa fa-th"></i>
            </div>
            <a href="<?php echo base_url('demand/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>



    <!-- ./col -->
</div>
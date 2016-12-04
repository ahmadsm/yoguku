      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner text-center">
              <h3><?php echo $this->db->count_all('material'); ?></h3>
              <p>Material</p>
            </div>
            <a href="<?php echo base_url('material/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner text-center">
              <h3><?php echo $this->db->count_all('supplier'); ?></h3>
              <p>Supplier</p>
            </div>
            <a href="<?php echo base_url('supplier/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner text-center">
              <h3><?php echo $this->db->count_all('supply'); ?></h3>
              <p>Supply</p>
            </div>
            <a href="<?php echo base_url('supply/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner text-center">
              <h3><?php echo $this->db->count_all('demand'); ?></h3>
              <p>Demand</p>
            </div>
            <a href="<?php echo base_url('demand/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner text-center">
              <h3><?php echo $this->db->count_all('transaction_demand'); ?></h3>
              <p>Transaction Demand</p>
            </div>
            <a href="<?php echo base_url('demand/transactions'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
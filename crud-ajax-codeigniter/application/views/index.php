<section class="content">
   
		<div class="callout callout-info" style="margin-bottom: 0!important;">
			<h4><i class="fa fa-info-circle"></i> Selamat Datang di <i style="font-size: small">Sistem Informasi Inventory</i></h4>
		</div>
		<br>
        <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                  <?php echo $total_admin; ?></h3>
                  <p>Total Admin</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="<?php echo base_url().'admin'?>" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                   <h3> <?php echo $total_barang; ?></h3>
                  <p>Total Barang </p>
                </div>
                <div class="icon">
                  <i class="fa fa-database"></i>
                </div>
               <a href="<?php echo base_url().'item'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
</section><!-- /.content -->
 
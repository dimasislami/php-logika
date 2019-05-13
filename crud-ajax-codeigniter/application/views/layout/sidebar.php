<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
       <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url().'/assets/uploads/icons/men.png' ?>" class="img-circle" alt='User Image'>
              </div>
            <div class="pull-left info">
                <p><?php echo ucwords($this->session->userdata('username')) ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
               <li class="treeview <?php if($desc == 'Ui'){ echo "active";}?>">
                  <a href="#">
                      <i class="fa fa-users"></i>
                      <span>MANAGE ADMIN</span>
                      <i class="fa fa-angle-left pull-right"></i>
                  </a>
                <ul class="treeview-menu" style="">
                <li ><a href="<?php echo base_url('admin');?>"><i class="fa fa-circle-o"></i>View</a></li>
                </ul>
                </li>
              <li class="treeview <?php if($desc == 'Ui'){ echo "active";}?>">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span>MASTER</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                  <ul class="treeview-menu">
                    <li style="display: none"><a href="<?php echo base_url('supplier');?>" ><i class="fa fa-circle-o"></i>Supplier</a></li>
                    <li ><a href="<?php echo base_url('item');?>" ><i class="fa fa-circle-o"></i>Barang</a></li>
                     <li ><a href="<?php echo base_url('upload');?>" ><i class="fa fa-circle-o"></i>Upload Data</a></li>
                     <li ><a href="<?php echo base_url('usage');?>" ><i class="fa fa-circle-o"></i>Permintaan</a></li>
                      <li style="display: none"><a href="<?php echo base_url('buying');?>" ><i class="fa fa-circle-o"></i>Buying</a></li>
                    <li ><a href="<?php echo base_url('scan');?>"><i class="fa fa-circle-o"></i>Scan Barcode</a></li>
                  </ul>
                </li> 
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php
//include header
require_once('header.php');
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?php echo $desc ?>
                <?php
                if ($desc == 'Dashboard'){
                    echo "<small>Control panel</small>";
                }
                ?>
            </h1>
            <ol class="breadcrumb">
                <?php if($desc == 'Dashboard'){?>
                    <li><a href="<?php echo $url_breadcrumb ?>"><i class="fa fa-home"></i> <?php echo $desc ?></a></li>
                <?php } elseif($breadcrumb == ''){?>
                    <li><a href="<?php echo base_url().'dashboard'?>"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="active"><?php echo $desc ?></li>
                <?php } elseif($desc != 'Dashboard'){?>
                    <li><a href="<?php echo base_url().'dashboard'?>"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li><a href="<?php echo $url_breadcrumb ?>"><?php echo $desc ?></a></li>
                    <li class="active"><?php echo $breadcrumb ?></li>
                <?php } ?>
            </ol>
        </section>
        <section class="content-header"></section>
        <section class="content">
                <?php
                require_once('content.php');
                ?>
        </section><!-- /.content -->
    </div>
<?php
//include footer
require_once('footer.php');

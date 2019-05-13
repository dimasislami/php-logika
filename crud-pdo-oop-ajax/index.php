<?php 
include("functions.php");
session_start();
if(! $_SESSION['user_access']) {
  header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Copyright" content="Tim Sistem" />
    <meta name="author" content="Tim Sistem" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="language" content="Indonesia" />
    <meta name="revisit-after" content="7" />
    <meta name="webcrawlers" content="all" />
    <meta name="rating" content="general" />
    <meta name="spiders" content="all" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="datatables/datatables.min.css">
    <script src="jQuery/jQuery-2.1.4.min.js"></script>
    <style type="text/css">
        .content-wrapper, .right-side {
            min-height: 100%;
            z-index: 800;
        }
        .content {
            min-height: 250px;
            padding: 15px;
            margin-right: auto;
            margin-left: auto;
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
</head>
<body>
    <aside class="main-sidebar">
      <?php getsidebar(); ?>
    </aside>
    <div class="content-wrapper">
        <section class="content">
            <?php getPage($_REQUEST['page']); ?>
       </section>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datatables/datatables.min.js"></script>
</body>
</html>

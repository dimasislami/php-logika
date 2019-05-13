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
        .form-login{
            margin-top: 5%;
        }
        .outter-form-login {
            padding: 20px;
            background: #EEEEEE;
            position: relative;
            border-radius: 5px;
        }
        .logo-login {
            position: absolute;
            font-size: 35px;
            background: #21A957;
            color: #FFFFFF;
            padding: 10px 18px;
            top: -40px;
            border-radius: 50%;
            left: 40%;
        }
        .inner-login .form-control {
            background: #D3D3D3;
        }
        h3.title-login {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .forget {
            margin-top: 20px;
            color: #ADADAD;
        }
        .btn-custom-green {
            background: #21A957;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="col-lg-4"></div>
    <div class="col-lg-4 form-login">
    <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
            <form action="proses.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Login Area</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" value="Submit" name="login" />
                <button type="reset" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>
    <div class="col-lg-4"></div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datatables/datatables.min.js"></script>
</body>
</html>

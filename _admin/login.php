<?php
error_reporting(0);

require_once dirname(__FILE__) . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin login">
    <meta name="author" content="iSm1le">
    <meta name="keyword" content="">

    <title><?php echo $config['general']['site_name']; ?> | Sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="../files/css/bootstrap/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../files/plugins/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="../files/css/admin.css" rel="stylesheet">
    <link href="../files/css/admin-responsive.css" rel="stylesheet">

</head>

<body>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<div id="login-page">
    <div class="container">
        <form class="form-login" action="../files/action.php" method="POST">
            <h2 class="form-login-heading">Sign in</h2>
            <input type="hidden" name="action" value="login">
            <div class="login-wrap">
                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,10}$" id="email" name="email"
                       class="form-control" placeholder="E-Mail" required autofocus>
                <br>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                       required>
                <br>
                <button class="btn btn-theme btn-block" id="submit"><i class="fa fa-lock"></i> Sign in</button>
            </div>
        </form>
        <div id="errorDiv"
             style="width: 330px; text-align:center; margin-left: auto; margin-right: auto; padding-top: 10px;">
            <?php
            if ($_GET['login'] == 'wrong') {
                echo '<div class="alert alert-danger" role="alert">' . "Login incorrect" . '</div>';
            } elseif ($_GET['login'] == 'fields') {
                echo '<div class="alert alert-info" role="alert">' . "Fill in all fields!" . '</div>';
            }
            ?>
        </div>
    </div>
</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="../files/js/admin/jquery.js"></script>
<script src="../files/js/admin/bootstrap.min.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="../files/js/admin/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("../files/img/bg_login.jpg", {speed: 0});
</script>


</body>
</html>

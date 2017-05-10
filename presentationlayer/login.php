<?php

require_once("logiclayer/UserManager.php");

$messageError = "";

if (existPOST("loginuser")) {

    $user = new User();

    $userName = getPOST("userName");
    $password = getPOST("password");

    if ($userName == "") {
        $messageError = "Please enter user name!";
    } else if ($password == "") {
        $messageError ="Please enter the password!";
    } else {
        $response = UserManager::userControl($userName, $password);
        if ($response == FALSE) {
            $messageError = "User information is incorrect";
        } else {
            $user = $response;
            setSESSION("userid", $user->getID());
            setSESSION("name", $user->getName());
            header("Refresh:0; url=index.php");
        }
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
<title>Supplier-login</title>
<link href="assest/css/bootstrap.css" rel="stylesheet" />
<link href="assest/css/style.css" rel="stylesheet" />
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> User Login</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="User name" name="userName" type="text" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" />
                            </div>

                            <?php
                            if ($messageError != "") {
                                ?>
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <?php echo $messageError; ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <button name="loginuser" type="submit" class="btn btn-lg btn-success btn-block">LOGIN</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assest/js/jquery.js"></script>
<script src="assest/js/bootstrap.min.js"></script>

</body>
</html>

<?php
$messageError = "";
$messageSucess = "";

$userid = getGET("id");

if (existPOST("edit")) {
    $name = getPOST("name");
    $password = getPOST("password");

    if ($name == "" || $password == "") {
        $messageError = "Please fill in all fields !";
    } else {
        $response = UserManager::editUser($userid, $name, $password);
        if ($response) {
            $messageSucess = "Action succesfull.";
        } else {
            $messageError = "Action failed!";
        }
    }
}

$user = new User();

$user = UserManager::getUser($userid);
?>

<form method="post" action="" style="margin-top: 20px;">
    <div class='panel panel-default'>
        <div class='panel-heading'>
            <h3 class='box-title'>User Edit</h3>
        </div>
        <div class='panel-body'>
            <div class="form-group">
                <label>User Name</label>
                <input  type="text" name="name" class="form-control" value="<?php echo $user->getName(); ?>" />
            </div>
            <div class="form-group">
                <label>Şifre</label>
                <input type="text" name="password" class="form-control" value="<?php echo $user->getPassword(); ?>" />
            </div>

            <?php if ($messageError != "") { ?>
                <div class="form-group">
                    <div class="alert alert-danger mesajilhan">
                        <?php echo $messageError ?>
                    </div>
                </div>
            <?php } ?>

            <?php if ($messageSucess != "") { ?>
                <div class="form-group">
                    <div class="alert alert-success mesajilhan">
                        <?php echo $messageSucess ?>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class='panel-footer'>
            <button type="submit" name="edit" class="btn btn-primary btn-md"><i class="fa fa-save"></i> Save</button>
            <a href="user.php" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Cancel</a>
        </div>
    </div>  
</form>
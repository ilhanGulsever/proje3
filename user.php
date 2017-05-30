<?php
include './presentationlayer/ust.php';
include './presentationlayer/menu.php';

require_once(realpath(".")."/logiclayer/UserManager.php");

$userList = UserManager::getUserList();

$mod = getGET("mod");
$id = getGET("id");
?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <?php
                if ($mod == "") {
                    include_once './presentationlayer/user/list.php';
                } else if ($mod == "insert") {
                    include_once './presentationlayer/user/insert.php';
                } else if ($mod == "edit") {
                    include_once './presentationlayer/user/edit.php';
                } else if ($mod == "delete") {
                    UserManager::deleteUser($id);
                    header("Location: user.php");
                } else {
                    include_once './presentationlayer/user/list.php';
                }
                ?>

            </div>
        </div>

    </div>

</div>


<?php
include './presentationlayer/alt.php';
?>
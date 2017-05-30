<?php
include './presentationlayer/ust.php';
include './presentationlayer/menu.php';

require_once(realpath(".") . "/logiclayer/AccountingManager.php");

$expList = AccountingManager::getAllExpenses();
$revList = AccountingManager::getAllRevenues();
$totalREV= AccountingManager::getTotalRevenues();
$totalEXP= AccountingManager::getTotalExpenses();
$getCash= AccountingManager::getCash();
$mod = getGET("mod");
$id = getGET("id");
?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <?php
                if ($mod == "") {
                    include_once './presentationlayer/accounting/list.php';
                } else if ($mod == "expenses") {
                    include_once './presentationlayer/accounting/listEx.php';
                } else if ($mod == "revenues") {
                    include_once './presentationlayer/accounting/listRe.php';
                } else if ($mod == "list") {
                  include_once './presentationlayer/accounting/list.php';
                } 
                 else if ($mod == "insert") {
                  include_once './presentationlayer/accounting/insert.php';
                } 
                ?>

            </div>
        </div>

    </div>

</div>


<?php
include './presentationlayer/alt.php';
?>
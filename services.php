<?php
include './presentationlayer/ust.php';
include './presentationlayer/menu.php';


require_once(realpath(".")."/logiclayer/CategoryManager.php");
require_once(realpath(".")."/logiclayer/CategoryProperties.php");
?>



<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
     
                
                <?php 

        $categoriList = CategoryManager::getAllCategory();

        for ($i = 0; $i < count($categoriList); $i++) {
            
         $categoriProList = CategoryManager::getCategoryPropertiesList($categoriList[$i]->getId());

                 for ($j = 0; $j < count($categoriProList); $j++) {

                     $array = array(    "ProductNo"=>$i,
                                        "CategoryName"=>$categoriList[$i]->getName(),
                                        "Properties"=>$categoriProList[$j]->getProperties(),
                                        "Value"=>"xyz", );
                            echo json_encode(array('Product Info'=>$array)); echo('<br>');
                    }	
            }
?>
                
                
             
            </div>

        </div>

    </div>

</div>


<?php
include './presentationlayer/alt.php';
?>
<?php include '../view/partials/helper.php'; ?>
<?php
if($user){
    $returnValue=json_decode($_POST["json"],true);
    print_r($returnValue);


}
   


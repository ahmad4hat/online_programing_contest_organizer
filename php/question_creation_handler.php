<?php
$returnValue=json_decode($_POST["json"],true);
print($returnValue["problemStatement"]);
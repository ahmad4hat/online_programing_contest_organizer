<?php
print_r($_POST);
$connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'test');
$result = mysqli_query($connection, "
SELECT 
CURRENT_TIMESTAMP AS current_date_time;
");

print("<br>");

if (!(isset($_POST["name"]) &&
    isset($_POST["username"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["confirmPassword"])  &&
    isset($_POST["dob"])  &&
    isset($_POST["educationalQualification"])  &&
    isset($_POST["occupation"]) &&
    isset($_POST["typeOfUser"]) &&
    isset($_POST["profilePicture"]))) {

    echo "hello";
}


print("<br>");
print_r($result);
while ($row = mysqli_fetch_assoc($result)) {
    print_r($row);
}

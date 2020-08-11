<?php
print_r($_POST);
$connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'test');
$result = mysqli_query($connection, "
SELECT 
CURRENT_TIMESTAMP AS current_date_time;
");

print("");



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
    // isset($_POST["profilePicture"]) &&
    isset($_POST["bio"]))) {

    echo "some of the field is null";
}

if ((empty($_POST["name"]) ||
    empty($_POST["username"]) ||
    empty($_POST["email"]) ||
    empty($_POST["password"]) ||
    empty($_POST["confirmPassword"])  ||
    empty($_POST["dob"])  ||
    empty($_POST["educationalQualification"])  ||
    empty($_POST["occupation"]) ||
    empty($_POST["typeOfUser"]) ||
    // empty($_POST["profilePicture"]) ||
    empty($_POST["bio"]))) {

    echo "some of the field is empty";
}

if ($_POST["password"] !== $_POST["confirmPassword"]) {
    echo "password doest not match with confirm password";
}

echo '<br>';
echo strtotime($_POST["dob"]);
echo '<br>';
echo time();

if (strtotime($_POST["dob"]) > (time() - (60 * 60 * 24 * 365 * 13))) {
    echo "you are not 13 yet";
}


$typeofUser = "";
foreach ($_POST["typeOfUser"] as $key => $value) {
    if ($typeofUser === "") {
        $typeofUser = $value;
    } else {
        $typeofUser = $typeofUser . ',' . $value;
    }
}

echo $typeofUser;
$username = trim($_POST["username"]);


echo '<br>';
echo '<br>';
echo '<br>';

// print_r($_FILES);


if ($_FILES['profilePicture']['size'] == 0) {
    echo "profile picture is not uploaded";
} else if (!getimagesize($_FILES["profilePicture"]["tmp_name"])) {
    echo "profile picture is not a image";
} else {
    $ext = pathinfo($_FILES['profilePicture']['name'], PATHINFO_EXTENSION);
    $filedir = 'upload/profile_picture/' . $username . '.' . $ext;

    if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $filedir)) {
        echo "Done";
    } else {
        echo "error";
    }
}




print_r($result);
while ($row = mysqli_fetch_assoc($result)) {
    print_r($row);
}

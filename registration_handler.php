<?php
print_r($_POST);


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
    isset($_POST["bio"]) &&
    isset($_POST["address"]))) {

    $error = "some of the field is null ,please fill up all the form entry";
    header('location: registration.php?error=' . urlencode($error));
    exit();
}

if (
    empty(trim($_POST["name"])) ||
    empty(trim($_POST["username"])) ||
    empty(trim($_POST["email"])) ||
    empty(trim($_POST["password"])) ||
    empty(trim($_POST["confirmPassword"]))  ||
    empty(trim($_POST["dob"]))  ||
    empty(trim($_POST["educationalQualification"]))  ||
    empty(trim($_POST["occupation"])) ||
    empty($_POST["typeOfUser"]) ||
    empty(trim($_POST["bio"])) ||
    empty(trim($_POST["address"]))
    // empty($_POST["profilePicture"]) ||
) {

    $error = "some of the field is empty ,please fill up all the form";
    header('location: registration.php?error=' . urlencode($error));
    exit();
}

if ($_POST["password"] !== $_POST["confirmPassword"]) {
    $error = "password doest not match with confirm password";
    header('location: registration.php?error=' . urlencode($error));
    exit();
}

// echo '<hr>';
// if (empty(trim("     a   "))) {
//     echo "danla";
// }
// echo '<hr>';

echo '<br>';
echo strtotime($_POST["dob"]);
echo '<br>';
echo time();

if (strtotime($_POST["dob"]) > (time() - (60 * 60 * 24 * 365 * 13))) {
    echo "you are not 13 yet";
}

if (!is_numeric($_POST["mobile"])) {
    echo "mobile number is not correct and mobile number must be numeric";
}

$dob = strtotime($_POST["dob"]);


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
$username = str_replace(' ', '', $username);


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
        echo "something went wrong the file level error";
        exit();
    }
}





$connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'online_quiz');
$result = mysqli_query($connection, "
SELECT 
CURRENT_TIMESTAMP AS current_date_time;
");
print_r($result);
while ($row = mysqli_fetch_assoc($result)) {
    print_r($row);
}
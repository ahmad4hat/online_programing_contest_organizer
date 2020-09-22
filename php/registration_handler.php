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
    header('location: ../view/registration.php?error=' . urlencode($error));
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
    header('location: ../view/registration.php?error=' . urlencode($error));
    exit();
}

if ($_POST["password"] !== $_POST["confirmPassword"]) {
    $error = "password doest not match with confirm password";
    header('location: ../view/registration.php?error=' . urlencode($error));
    exit();
}



if (!(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))) {
    //echo ("$email is a valid email address");
    $error = "email is not valid";
    header('location: ../view/registration.php?error=' . urlencode($error));
    exit();
}


// echo '<hr>';
// if (empty(trim("     a   "))) {
//     echo "danla";
// }
// echo '<hr>';

// echo '<br>';
// echo strtotime($_POST["dob"]);
// echo '<br>';
// echo time();

$dob = strtotime($_POST["dob"]);
if ($dob > (time() - (60 * 60 * 24 * 365 * 13))) {
    $error = "you are not 13 yet";
    header('location: ../view/registration.php?error=' . urlencode($error));
    exit();
}

if (!is_numeric($_POST["mobile"])) {
    $error = "mobile number is not correct and mobile number must be numeric";
    header('location: ../view/registration.php?error=' . urlencode($error));
    exit();
}

// $dob = strtotime($_POST["dob"]);


$typeofUser = "";


$typeofUser= $_POST["typeOfUser"];



$username = trim($_POST["username"]);
$username = str_replace(' ', '', $username);




echo '<br>';
echo '<br>';
echo '<br>';

// print_r($_FILES);



$profile_picture_location = "";
if ($_FILES['profilePicture']['size'] == 0) {
    $error = "profile picture is not uploaded";
    header('location: ../view/registration.php?error=' . urlencode($error));
    exit();
} else if (!getimagesize($_FILES["profilePicture"]["tmp_name"])) {
    $error =  "profile picture is not a image";
    header('location: ../view/registration.php?error=' . urlencode($error));
    exit();
} else {
    $ext = pathinfo($_FILES['profilePicture']['name'], PATHINFO_EXTENSION);

    $filedir = '../upload/profile_picture/' . $username . '.' . $ext;
    global $profile_picture_location;
    $profile_picture_location = $filedir;
    if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $filedir)) {
        echo "Done";
    } else {
        echo "something went wrong the file level error";
        exit();
    }
}



$connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'online_quiz');


$result = mysqli_query($connection, "
select * from users where username= '" . $username . "'
");
$row = mysqli_fetch_assoc($result);

if (count($row) > 0) {
    $error = "username already exists ";
    header('location: ../view/registration.php?error=' . urlencode($error));
    exit();
}


$insert_into_user_sql = "
INSERT INTO `users` (`id`, `username`, `name`, `email`, `user_type`, `address`, `bio`, `dob`, `password`, `educational_qualification`, `mobile`, `profile_picture_location`, `created_at`, `occupation`) 
VALUES (
    NULL, 
    '" . $username . "', 
    '" . $_POST["name"] . "', 
    '" . $_POST["email"] . "', 
    '" . $typeofUser . "', 
    '" . $_POST["address"] . "'
    ,'" . $_POST["bio"] . "'
    ,'" . $dob . "'
    ,'" . $_POST["password"] . "'
    ,'" . $_POST["educationalQualification"] . "'
    ,'" . $_POST["mobile"] . "'
    ,'" . $profile_picture_location . "'
    ,current_timestamp(), 
    '" . $_POST["occupation"] . "')";


if (mysqli_query($connection, $insert_into_user_sql)) {
    echo "New User record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header('location: ../view/registration.php?error=sqkErrorInUserInserton');
    exit();
}

$authToken = uniqid('token_', true);
$expireDate = time() + 7200;

setcookie('token', $authToken, $expireDate, '/');

$sql_authoken = "INSERT INTO `auth_tokens` (`token`, `username`, `expiry_date`) VALUES ('" . $authToken . "', '" . $username . "', '" . $expireDate . "');";
if (mysqli_query($connection, $sql_authoken)) {
    echo "New User record created successfully";
    header('location: ../view/home.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header('location: ../view/registration.php?error=sqlErrorInAuthToken');
    exit();
}

// print_r($result);
// while ($row = mysqli_fetch_assoc($result)) {
//     print_r($row);
// }

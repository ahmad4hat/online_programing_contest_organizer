<?php include 'helper.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <?php if (!$user) {
        $error = "you cant see your profile without log in";
        header('location: login.php?error=' . urlencode($error));
        exit();
    } ?>
    <h1>Profile</h1>
    <a href="edit_profile.php">Edit Profile</a>
    <p>Profile picture</p>
    <img src="<?php echo '../'. $user["profile_picture_location"] ?>" alt="" height="250px" width="250px">
    <p>Name : <?php echo $user["name"] ?></p>
    <p>username : <?php echo $user["username"] ?></p>
    <p>email : <?php echo $user["email"] ?></p>
    <p>bio : <?php echo $user["bio"] ?></p>
    <p>occupation : <?php echo $user["occupation"] ?></p>
    <p>mobile : <?php echo $user["mobile"] ?></p>
    <p>User Type : <?php echo $user["user_type"] ?></p>
    <p>Education Qualification : <?php echo $user["educational_qualification"] ?></p>






</body>

</html>
<?php include 'partials/top.php'; ?>

<?php if (!$user) {
    $error = "you cant see your profile without log in";
    header('location: login.php?error=' . urlencode($error));
    exit();
} ?>
<div class="container">


    <h1>Profile</h1>
    <a href="edit_profile.php">Edit Profile</a>
    <p>Profile picture</p>
    <img src="<?php echo $user["profile_picture_location"] ?>" alt="" height="250px" width="250px">
    <p>Name : <?php echo $user["name"] ?></p>
    <p>username : <?php echo $user["username"] ?></p>
    <p>email : <?php echo $user["email"] ?></p>
    <p>bio : <?php echo $user["bio"] ?></p>
    <p>occupation : <?php echo $user["occupation"] ?></p>
    <p>mobile : <?php echo $user["mobile"] ?></p>
    <p>User Type : <?php echo $user["user_type"] ?></p>
    <p>Education Qualification : <?php echo $user["educational_qualification"] ?></p>
</div>



<?php include 'partials/end.php'; ?>
<?php include 'partials/top.php'; ?>

<?php

require_once('../service/questionService.php');
?>
<?php if (!$user) {
    $error = "you cant see your profile without log in";
    header('location: login.php?error=' . urlencode($error));
    exit();
}
$questions = getAllQuestions();
?>

<h2>Hello</h2>

<?php include 'partials/end.php'; ?>
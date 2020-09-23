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

<div class="questions container">


    <?php for ($i = 0; $i != count($questions); $i++) { ?>

        <div class="questions__card">
            <p><?= $questions[$i]['difficulty'] ?></p>

            <hr>
            <h4>Problem statement :</h4>
            <p><?= $questions[$i]['problemStatement'] ?></p>
            <h4>Expected output :</h4>
            <p><?= $questions[$i]['expectedOutput'] ?></p>
            <a href="question.php?id=<?= $questions[$i]['id'] ?>">More details</a>

        </div>


    <?php } ?>


</div>

<?php include 'partials/end.php'; ?>
<?php include 'partials/top.php'; ?>

<?php

require_once('../service/answerService.php');
require_once('../service/questionService.php');
?>
<?php if (!$user) {
    $error = "you cant see your profile without log in";
    header('location: login.php?error=' . urlencode($error));
    exit();
}

if (!$user['user_type'] === 'teacher') {
    $error = "you have to be teacher to see the answer";
    header('location: login.php?error=' . urlencode($error));
    exit();
}
$answers = getAllAnswers();
?>

<div class="questions container">


    <?php for ($i = 0; $i != count($answers); $i++) {
        $question = getQuestionById($answers[$i]['question_id']);
    ?>

        <div class="questions__card">

            <h4>Submitter : <em><?= $answers[$i]['username'] ?> </em> </h4>
            <h4>Problem Statement</h4>
            <p><?= $question['problemStatement'] ?></p>
            <hr>

            <h4>Submitted Answer :</h2>
                <p><?= $answers[$i]['submittedAnswer'] ?></p>
                <a href="mark_submission.php?id=<?= $answers[$i]['id'] ?>">Mark this question</a>

        </div>


    <?php } ?>


</div>

<?php include 'partials/end.php'; ?>
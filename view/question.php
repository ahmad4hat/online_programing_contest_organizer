<?php include 'partials/top.php'; ?>

<?php

require_once('../service/questionService.php');
require_once('../service/commentOnQuestionService.php');
?>
<?php if (!$user) {
    $error = "you cant see your profile without log in";
    header('location: login.php?error=' . urlencode($error));
    exit();
}
$question = getQuestionById($_GET['id']);
?>

<div class="question container">

    <h2>problem Statement </h2>
    <p></p><?= $question['problemStatement'] ?></p>
    <h2>Expected Output: </h2>
    <p></p><?= $question['expectedOutput'] ?></p>
    <h2>Instructions</h2>
    <p></p><?= $question['instructions'] ?></p>
    <h2>Hints :</h2>
    <p></p><?= $question['hints'] ?></p>
    <h2>total Marks :</h2>
    <p></p><?= $question['totalMark'] ?></p>
    <h2>Difficulty:</h2>
    <p></p><?= $question['difficulty'] ?></p>
    <h2>Last Submission Date:</h2>
    <p></p><?= $question['lastSubmissionDate'] ?></p>
    <h2>Supported Language</h2>
    <p></p><?= $question['supported_language'] ?></p>



    <?php if ($user['user_type'] == 'participant') { ?>
        <a href="answer_submission.php?id=<?= $question['id'] ?>">Answer this question</a>

    <?php } ?>


    <br>
    <br>
    <a href="comment_on_question.php?id=<?= $question['id'] ?>">
        <h2>Comment on question </h2>
    </a>


    <h1>Comments</h1>

    <?php
    $comments = getQuestionCommentFromQuestionId($_GET['id']);

    ?>

    <div class="questions">

        <?php for ($i = 0; $i != count($comments); $i++) { ?>

            <div class="questions__card">
                <h2>Username : <?= $comments[$i]['username'] ?></h2>

                <hr>
                <p>comment : <?= $comments[$i]['comment'] ?></p>

            </div>


        <?php } ?>

    </div>






</div>

<?php include 'partials/end.php'; ?>
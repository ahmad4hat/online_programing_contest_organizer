<?php include 'partials/top.php'; ?>

<?php

require_once('../service/questionService.php');
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





</div>

<?php include 'partials/end.php'; ?>
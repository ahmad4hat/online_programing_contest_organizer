<?php include 'partials/top.php'; ?>

<?php

require_once('../service/questionService.php');
require_once('../service/answerService.php');
require_once('../service/markService.php');
?>
<?php if (!$user) {
    $error = "you cant see your profile without log in";
    header('location: login.php?error=' . urlencode($error));
    exit();
}
$marks = getAllMarks();
?>



<div class="questions container">


    <?php for ($i = 0; $i != count($marks); $i++) {
        $answer =  getAnswersById($marks[$i]['answer_id']);
        $question = getQuestionById($answer['question_id']);

    ?>

        <div class="questions__card">

            <h3>Mark : <?= $marks[$i]['mark'] ?> / <?= $question['totalMark'] ?></h3>

            <hr>
            <h4>Problem statement :</h2>
                <p><?= $question['problemStatement'] ?></p>
                <h4>Expected output :</h4>
                <p><?= $question['expectedOutput'] ?></p>

                <h4>Submitted Answer :</h4>
                <p><?= $answer['submittedAnswer'] ?></p>

                <h3>Teacher(mark giver ) : <?= $marks[$i]['username_teacher'] ?> </h3>
                <h3>Participants : <?= $marks[$i]['username_participant'] ?> </h3>

                <!-- <a href="question.php?id=<?= $questions['id'] ?>">More details</a> -->

        </div>


    <?php } ?>


</div>

<?php include 'partials/end.php'; ?>
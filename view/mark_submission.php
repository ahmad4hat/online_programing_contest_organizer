<?php include 'partials/top.php'; ?>
<?php

require_once('../service/answerService.php');
require_once('../service/questionService.php');
?>
<?php if (!$user) {
    $error = "you cant give marks without log in";
    header('location: login.php?error=' . urlencode($error));
    exit();
}

if (!$user['user_type'] === 'teacher') {
    $error = "you have to be teacher to give marks";
    header('location: login.php?error=' . urlencode($error));
    exit();
}




$answer = getAnswersById($_GET['id']);
$question = getQuestionById($answer['question_id'])
?>

<h1>Mark Submission</h1>

<form action="" method="post" id="formMark">
    <h2 for="problemStatement">Problem statement :</h2>
    <p id="problemStatement"><?= $question['problemStatement'] ?></p>
    <br>
    <br>
    <h2 for="expectedOutput">Expected Output :</h2>
    <p id="expectedOutput"><?= $question['expectedOutput'] ?></p>
    <br>
    <br>

    <h2>Difficulty : <em><?= $question['difficulty'] ?></em></h2>
    <br>
    <br>



    <h2>Submitted Answer:</h2>
    <p><?= $answer['submittedAnswer'] ?></p>
    <br>
    <br>

    <h2>Total Mark : <em><?= $question['totalMark'] ?></em></h2>
    <br>
    <br>
    <label for="mark">Obtained Marks:</label>
    <input type="text" name="mark" id="mark">
    <p class="errorText hidden" id="markErrorText">hello </p>
    <br>
    <input type="submit" value="submit" name="submit">


</form>
<script>
    const username_teacher = "<?= $user['username'] ?>";
    const username_participant = "<?= $answer['username'] ?>";
    const answer_id = "<?= $answer['id'] ?>";
    const totalMark = "<?= $question['totalMark'] ?>"

    const formMarkEl = document.querySelector("#formMark");
    const markEl = document.querySelector('#mark');
    const markErrorTextEl = document.querySelector('#markErrorText');

    const validateMark = (value) => {
        let errorText = null;

        if (!value) {
            errorText = "Total Mark can not be empty";
        } else if (value == "") {
            errorText = "Total Mark  can not be empty";
        } else if (isNaN(value)) {
            errorText = "Total number must ber a number";
        } else {
            valueInt = parseInt(value)
            if (valueInt < 0 || valueInt > totalMark) {

                errorText = "Mark must be between 0 and " + totalMark + "(total mark)";
                console.log(errorText);

            }
        }

        if (errorText) {
            markErrorTextEl.innerText = errorText;
            markErrorTextEl.style.display = "inline"

        } else {
            markErrorTextEl.innerText = null;
            markErrorTextEl.style.display = "none"

        }

        return errorText
    }

    markEl.addEventListener('keyup', (event) => validateMark(event.target.value));
    formMarkEl.addEventListener('submit', (event) => {
        event.preventDefault();
        const mark = markEl.value;
        if (validateMark(mark)) {
            return false;
        }
        const sendObject = {
            mark,
            username_teacher,
            username_participant,
            answer_id
        };

        // console.log(sendObject);
        const sendJson = JSON.stringify(sendObject);

        ajaxJson('../php/mark_submission_handler.php', sendJson, (v) => {
            v = JSON.parse(v);
            console.log(v)
            if (v.success) {
                window.location = "marks.php";
            }
        });

    })
</script>
<?php include 'partials/end.php'; ?>
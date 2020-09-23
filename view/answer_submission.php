<?php include 'partials/top.php'; ?>

<?php

require_once('../service/questionService.php');
?>
<?php if (!$user) {
    $error = "you cant see your answer without log in";
    header('location: login.php?error=' . urlencode($error));
    exit();
}
$question = getQuestionById($_GET['id']);
?>



<h1>Answer Submission</h1>

<form action="" method="post" id="ansForm">
    <h2>problem Statement </h2>
    <p></p><?= $question['problemStatement'] ?></p>
    <h2>Expected Output: </h2>
    <p></p><?= $question['expectedOutput'] ?></p>
    <h2>Instructions</h2>
    <p></p><?= $question['instructions'] ?></p>

    <label for="submittedAnswer">Your Answer:</label>
    <p class="errorText hidden" id="submittedAnswerErrorText">Hello </p>
    <br>
    <textarea type="text" name="submittedAnswer" id="submittedAnswer" cols="200" rows="10"></textarea>
    <br>
    <br>

    <input type="submit" value="submit" name="submit">



</form>


<script>
    const question_id = "<?= $question['id'] ?>";
    const username = "<?= $user['username'] ?>"

    const formEl = document.querySelector("#ansForm");
    const submittedAnswerEl = document.querySelector('#submittedAnswer');
    const submittedAnswerErrorTextEl = document.querySelector('#submittedAnswerErrorText');

    const validateSubmittedAnswer = (value) => {
        let errorText = null;
        if (!value) {
            errorText = "Your answer can not be empty";
        } else if (value == "") {
            errorText = "your answer can not be empty";
        } else if (value.length < 10) {
            errorText = "your answer should be at least 10 character long "
        }
        if (errorText) {
            submittedAnswerErrorTextEl.innerText = errorText;
            submittedAnswerErrorTextEl.style.display = "inline"

        } else {
            submittedAnswerErrorTextEl.innerText = null;
            submittedAnswerErrorTextEl.style.display = "none"

        }

        return errorText
    }

    submittedAnswerEl.addEventListener('keyup', (event) => validateSubmittedAnswer(event.target.value));



    formEl.addEventListener('submit', (event) => {
        event.preventDefault();
        const submittedAnswer = submittedAnswerEl.value;
        if (validateSubmittedAnswer(submittedAnswer)) {
            return false;
        }

        const sendObject = {
            question_id,
            username,
            submittedAnswer




            // "problemStatement":problemStatementEl.value,
            // "expectedOutput":expectedOutputEl.value,
            // "totalMark":totalMarkEl.value,
            // "difficulty":difficultyEl.value,
            // "lastSubmissionDate":lastSubmissionDateEl.value,
        };

        // console.log(sendObject);
        const sendJson = JSON.stringify(sendObject);

        ajaxJson('../php/answer_submission_handler.php', sendJson, (v) => {
            v = JSON.parse(v);
            console.log(v);
            if (v.success) {
                window.location = "questions.php";
            }
        });



    })
</script>


<?php include 'partials/end.php'; ?>
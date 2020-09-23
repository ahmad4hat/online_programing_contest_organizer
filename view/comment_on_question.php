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

<h1> Comment on question</h1>

<div class="question container">

    <h2>problem Statement </h2>
    <p></p><?= $question['problemStatement'] ?></p>
    <h2>Expected Output: </h2>
    <p></p><?= $question['expectedOutput'] ?></p>
    <h2>Instructions</h2>
    <p></p><?= $question['instructions'] ?></p>
    <h2>Hints :</h2>



    <br>
    <br>


    <form action="" method="post" id="formEl">
        <label for="comment">comment :</label>
        <p class="errorText hidden" id="commentErrorText">Hello </p>
        <br>
        <textarea name="comment" id="comment" cols="50" rows="10"></textarea>
        <br>
        <br>

        <input type="submit">


    </form>








</div>
<script>
    const username = "<?= $user['username'] ?>";
    const question_id = "<?= $question['id'] ?>";

    const commentEl = document.querySelector('#comment');
    const commentErrorTextEl = document.querySelector('#commentErrorText');
    const validateComment = (value) => {
        let errorText = null;

        if (!value) {
            errorText = "comment can not be empty";
        } else if (value == "") {
            errorText = "comment can not be empty";
        } else if (value.length < 5) {
            errorText = "comment at least 5 character long "
        }
        if (errorText) {
            commentErrorTextEl.innerText = errorText;
            commentErrorTextEl.style.display = "inline"

        } else {
            commentErrorTextEl.innerText = null;
            commentErrorTextEl.style.display = "none"

        }

        return errorText
    }

    commentEl.addEventListener('keyup', (event) => validateComment(event.target.value));
    const formEl = document.querySelector("#formEl");
    formEl.addEventListener('submit', (event) => {
        event.preventDefault();
        const comment = commentEl.value;
        if (validateComment(comment)) {
            return false;
        }
        const sendObject = {
            comment,
            question_id,
            username
        };

        // console.log(sendObject);
        const sendJson = JSON.stringify(sendObject);

        ajaxJson('../php/comment_on_question_handler.php', sendJson, (v) => {
            v = JSON.parse(v);
            console.log(v)
            if (v.success) {
                window.location = "question.php?id=" + question_id;
            }
        })


    })
</script>

<?php include 'partials/end.php'; ?>
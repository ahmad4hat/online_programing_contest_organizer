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

<form action="" method="post">
    <h2>problem Statement </h2>
    <p></p><?= $question['problemStatement'] ?></p>
    <h2>Expected Output: </h2>
    <p></p><?= $question['expectedOutput'] ?></p>
    <h2>Instructions</h2>
    <p></p><?= $question['instructions'] ?></p>

    <label for="submittedAnswer">Your Answer:</label>
    <br>
    <textarea type="text" name="submittedAnswer" cols="200" rows="10"></textarea>
    <br>
    <br>

    <input type="submit" value="submit" name="submit">



</form>


<?php include 'partials/end.php'; ?>
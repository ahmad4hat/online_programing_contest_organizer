<header>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <?php if (!$user) { ?>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="login.php">Login</a></li>
            <?php } ?>
            <?php if ($user) { ?>
                <li><a href="profile.php">Profile</a></li>
                <?php if ($user['user_type'] === 'teacher') { ?>
                    <li><a href="question_creation.php">Question Creation</a></li>
                    <li><a href="mark_submission.php">Mark Submission</a></li>
                    <li><a href="answers.php">Answers</a></li>
                <?php } ?>
                <?php if ($user['user_type'] === 'participant') { ?>
                    <li><a href="rate_question.php">rate a question</a></li>
                    <li><a href="answer_submission.php">Answer Submission</a></li>
                    <li><a href="rate_mark.php">Rate Mark</a></li>
                <?php } ?>
                <li><a href="comment_on_question.php">Comment on Quesiton</a></li>
                <li><a href="questions.php">Questions</a></li>
                <li><a href="mark_review.php">Mark Review</a></li>
                <li><a href="logout.php">logout</a></li>
            <?php } ?>

        </ul>
    </nav>
</header>
<?php include 'partials/top.php'; ?>
    <?php if (!$user) {
        $error = "you cant give marks without log in";
        header('location: login.php?error=' . urlencode($error));
        exit();
    } ?>

    <h1>Mark Submission</h1>

    <form action="" method="post">
        <label for="problemStatement">Problem statement :</label>
        <p id="problemStatement">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis ullam aperiam, reiciendis placeat temporibus porro cum et modi rerum reprehenderit.</p>
        <br>
        <br>
        <label for="expectedOutput">Expected Output :</label>
        <p id="expectedOutput">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi animi quidem sint, officiis laudantium delectus iusto reiciendis praesentium eos voluptatum sunt ullam. Vel itaque autem voluptatibus laudantium vero, quod est!</p>
        <br>
        <br>

        <label for="totalMarks">Total Mark :</label>
        <p id="totalMarks">Total mark 10</p>
        <br>
        <br>


        <label for="difficulty">Difficulty :</label>
        <p id="difficulty">Easy</p>
        <br>
        <br>

        <label for="submittedAnswer">Submitted Answer:</label>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea aliquam in facere et, error magni.</p>
        <br>
        <br>

        <h2>Obtained Marks: </h2>
        <input type="text" name="obtainedMarks">
        <input type="submit" value="submit" name="submit">

        





    </form>
    <?php include 'partials/end.php'; ?>
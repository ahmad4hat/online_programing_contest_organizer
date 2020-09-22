<?php include 'partials/top.php'; ?>
<?php if (!$user) {
    $error = "you cant see your submit your comment on question without log in";
    header('location: login.php?error=' . urlencode($error));
    exit();
} ?>

<h1> Comment on question </h1>

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

    <label for="comment">Your comment:</label>
    <br>
    <textarea type="text" name="comment" cols="100" rows="10"></textarea>
    <br>
    <br>

    <input type="submit" value="submit" name="submit">



</form>

<?php include 'partials/end.php'; ?>
<?php include 'helper.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Creation</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <?php if (!$user) {
        $error = "you cant see your profile without log in";
        header('location: login.php?error=' . urlencode($error));
        exit();
    } ?>

    <h1>Question Creation</h1>

    <form action="" method="post">
        <label for="problemStatement">Problem statement :</label>
        <textarea name="problemStatement" id="problemStatement" cols="50" rows="10"></textarea>
        <br>
        <br>
        <label for="expectedOutput">Expected Output :</label>
        <textarea name="expectedOutput" id="expectedOutput" cols="50" rows="10"></textarea>
        <br>
        <br>

        <label for="totalMarks">Total Mark :</label>
        <input name="totalMarks" id="totalMarks"></input>
        <br>
        <br>


        <label for="difficulty">Difficulty :</label>
        <select name="difficulty" id="difficulty" required>
            <option value="easy">Easy</option>
            <option value="medium">medium</option>
            <option value="hard">Hard</option>

        </select>
        <br>
        <br>

        <input type="submit" value="submit" name="submit">





    </form>

</body>

</html>
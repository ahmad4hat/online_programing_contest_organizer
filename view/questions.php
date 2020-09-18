<?php include 'helper.php'; ?>
<?php

$questions = [
    [
        'id' => uniqid("test", true),
        'problemStatement' => "
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo explicabo accusantium consequuntur minus recusandae ullam, unde laborum possimus eius totam!
    ",
        'expectedOutput' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, quia. ",
        "lastSubmissionDate" => time() + 4800,
        "createdAt" => time(),
        "totalMark" => 10,
        "difficultyLevel" => "Easy",
        "creator" => "caxeeqw" //username of the question maker

    ],
    [
        'id' => uniqid("test", true),
        'problemStatement' => "
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo explicabo accusantium consequuntur minus recusandae ullam, unde laborum possimus eius totam!
    ",
        'expectedOutput' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, quia. ",
        "lastSubmissionDate" => time() + 4800,
        "createdAt" => time(),
        "totalMark" => 10,
        "difficultyLevel" => "Hard",
        "creator" => "cax2eqw" //username of the question maker

    ],
    [
        'id' => uniqid("test", true),
        'problemStatement' => "
    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
     Quo explicabo accusantium consequuntur minus recusandae ullam, unde laborum possimus eius totam!
    ",
        'expectedOutput' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, quia. ",
        "lastSubmissionDate" => time() + 4800,
        "createdAt" => time(),
        "totalMark" => 15,
        "difficultyLevel" => "Medium",
        "creator" => "caxeeqw" //username of the question maker

    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>

        <!-- <?php if (isset($_GET["error"])) {
                    $error = urldecode($_GET["error"]);
                    echo '<h4>Error :' . $error . '</h4>';
                } ?> -->
        <?php if (!$user) {
            $error = "you see questions without log in";
            header('location: login.php?error=' . urlencode($error));
            exit();
        } ?>
        <H1>Question List</H1>
        <?php foreach ($questions as $q) { ?>
            <h2>Problem ,(last date: <?php echo  strftime("%d/%m/%Y", $q["lastSubmissionDate"]); ?> )</h2>
            <h4>Creator :<em><?php echo $q["creator"]; ?> </em></h4>
            <p>Problem :</p>


            <?php foreach (explode("\n", $q["problemStatement"]) as $line) { ?>
                <?php echo '<p>' . $line . '</p>' ?>
            <?php } ?>

            <p>
                Expected Output:
            </p>

            <?php foreach (explode("\n", $q["expectedOutput"]) as $line) { ?>
                <?php echo '<p>' . $line . '</p>' ?>
            <?php } ?>


            <h4>
                Created At : <em><?php echo  strftime("%d/%m/%Y", $q["lastSubmissionDate"]); ?> </em>
            </h4>



            <hr>
        <?php } ?>
    </main>
    <footer>

        <h2>

            Footer
        </h2>
    </footer>

</body>

</html>
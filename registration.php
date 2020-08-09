<?php
print_r($_POST)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>

        <h1> Register From here</h1>

        <div>
            <form action="" method="POST">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name">
                <small>Name could not empty</small>
                <br>
                <br>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username">
                <small>Username could not empty , and have to be unique for each user</small>
                <br>
                <br>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email">
                <small>You can't have multiple account account for with same email</small>
                <br>
                <br>
                <label for="dob">Date of birth : </label>
                <input type="date" name="dob" id="dob">
                <small>you must be over 13 </small>
                <br>
                <br>

                <label for="educationalQualification">Educational Qualification</label>
                <select name="educationalQualification" id="educationalQualification">
                    <option value="sscOrSameLevel">SSC or Same Level</option>
                    <option value="hscOrSameLevel">HSC or Same Level</option>
                    <option value="undergradOrSameLevel">UnderGrad or Same Level</option>
                    <option value="gradOrSameLevel">Grad or Same Level</option>
                    <option value="other">Other</option>
                </select>
                <br>
                <br>
                <label for="occupation">Occupation </label>
                <input type="text" name="occupation" id="occupation">
                <br>
                <br>
                <label for="mobile">mobile </label>
                <input type="text" name="mobile" id="mobile">
                <br>
                <br>
                <label for="typeOfUser">Type Of User: </label>

                <label for="participant">Participant</label>
                <input type="checkbox" name="typeOfUser[participant]" id="participant" value="participant">
                <label for="questionCreator">Question Creator</label>
                <input type="checkbox" name="typeOfUser[questionCreator]" id="questionCreator" value="questionCreator">
                <label for="judge">Judge</label>
                <input type="checkbox" name="typeOfUser[judge]" id="judge" value="judge">


                <input type="submit" name="submit" value="submit">


                <!-- <select name="typeOfUser" id="typeOfUser">
                    <option value="participant">Participant</option>
                    <option value="QuestionCreation">Question Creation</option>

                </select> -->




            </form>

        </div>


    </main>
</body>

</html>
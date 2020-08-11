<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>Register From here</h1>
        <!-- <?php echo trim(" hh  aa  ") ?> -->

        <?php if (isset($_GET["error"])) {
            $error = urldecode($_GET["error"]);
            echo '<h4>Error :' . $error . '</h4>';
        } ?>


        <div>
            <form action="registration_handler.php" method="POST" enctype="multipart/form-data">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required />
                <small>Name could not empty</small>
                <br />
                <br />
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" required />
                <small>Username could not empty , and have to be unique for each user && all whitespace will be removed</small>
                <br />
                <br />
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" required />
                <small>You can't have multiple account account for with same email</small>
                <br />
                <br />

                <label for="password">Password : </label>
                <input type="password" name="password" id="password" required />
                <small>password can not be empty </small>
                <br />
                <br />

                <label for="confirmPassword">Confirm Password : </label>
                <input type="password" name="confirmPassword" id="confirmPassword" required />
                <small>confirm password must match the password </small>
                <br />
                <br>
                <label for="bio">Bio (A bit[pun] about yourself) : </label>
                <br />
                <textarea type="text" name="bio" id="bio" rows="4" cols="50" required></textarea>
                <br />
                <br />


                <label for="address">Address : </label>
                <input type="text" name="address" id="address" required />
                <small>Address can't be empty </small>
                <br />
                <br />


                <label for="dob">Date of birth : </label>
                <input type="date" name="dob" id="dob" required />
                <small>you must be over 13 </small>
                <br />
                <br />

                <label for="educationalQualification">Educational Qualification</label>
                <select name="educationalQualification" id="educationalQualification" required>
                    <option value="sscOrSameLevel">SSC or Same Level</option>
                    <option value="hscOrSameLevel">HSC or Same Level</option>
                    <option value="undergradOrSameLevel">UnderGrad or Same Level</option>
                    <option value="gradOrSameLevel">Grad or Same Level</option>
                    <option value="other">Other</option>
                </select>
                <br />
                <br />
                <label for="occupation">Occupation </label>
                <input type="text" name="occupation" id="occupation" required />
                <small>Occupation can't be empty </small>
                <br />
                <br />
                <label for="mobile">mobile </label>
                <input type="tel" name="mobile" id="mobile" required />
                <small>Mobile can't be empty </small>
                <br />
                <br />
                <label for="typeOfUser">Type Of User: </label>

                <label for="participant">Participant</label>
                <input type="checkbox" name="typeOfUser[participant]" id="participant" value="participant" />
                <label for="questionCreator">Question Creator</label>
                <input type="checkbox" name="typeOfUser[questionCreator]" id="questionCreator" value="questionCreator" />
                <label for="judge">Judge</label>
                <input type="checkbox" name="typeOfUser[judge]" id="judge" value="judge" />

                <br />
                <br />
                <label for="profilePicture">Profile Picture</label>
                <input type="file" name="profilePicture" accept="image/*" required />
                <br />
                <br />

                <input type="submit" name="submit" value="submit" />

                <!-- <select name="typeOfUser" id="typeOfUser">
                    <option value="participant">Participant</option>
                    <option value="QuestionCreation">Question Creation</option>

                </select> -->
            </form>
        </div>
    </main>
</body>

</html>
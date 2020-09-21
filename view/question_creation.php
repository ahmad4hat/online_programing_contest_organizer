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
        $error = "you cant create question  without log in";
        header('location: login.php?error=' . urlencode($error));
        exit();
    } ?>

    <h1>Question Creation</h1>

    <form action="" method="post" id="questionForm">

        <label for="problemStatement">Problem statement :</label>
        <br>
        <textarea name="problemStatement" id="problemStatement" cols="50" rows="10"></textarea>
        <br>
        <br>
        <label for="expectedOutput">Expected Output :</label>
        <br>
        <textarea name="expectedOutput" id="expectedOutput" cols="50" rows="10"></textarea>
        <br>
        <br>

        <label for="totalMark">Total Mark :</label>
        <input name="totalMark" type="number" id="totalMark"></input>
        <br>
        <br>





        <label for="difficulty">Difficulty :</label>
        <select name="difficulty" id="difficulty" required>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>

        </select>
        <br>
        <label for="lastSubmissionDate">
        Last Submission Date
        </label>
        <input type="date" name="lastSubmissionDate" id="lastSubmissionDate">

        <br>

        <input type="submit" value="submit" name="submit">





    </form>


    <script>
    const ajaxJson = (url, jsonValue, callback) => {
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // const data = new FormData();
        // for (const key in obj) {
        //     data.append(key, obj[key]);
        // }
        // console.log(data);
        // let value = null;
        // let responseText = (res) => {
        //     value = res;
        // };
        xhttp.send("json="+jsonValue);

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
            callback(this.responseText);
            }
    };
    //   return value;
    };
    
    const formEl = document.querySelector("#questionForm");
    const problemStatementEl= document.querySelector('#problemStatement');
    const expectedOutputEl= document.querySelector('#expectedOutput');
    const totalMarkEl= document.querySelector('#totalMark');
    const difficultyEl= document.querySelector('#difficulty');
    const lastSubmissionDateEl= document.querySelector('#lastSubmissionDate');
    
    
    formEl.addEventListener("submit",(event)=>{
        event.preventDefault();
        let problemStatement = problemStatementEl.value;
        let expectedOutput = expectedOutputEl.value;
        let totalMark = totalMarkEl.value;
        let difficulty = difficultyEl.value;
        let lastSubmissionDate = lastSubmissionDateEl.value;
        
        
        const sendObject= {
            problemStatement,
            expectedOutput,
            totalMark,
            difficulty,
            lastSubmissionDate

            // "problemStatement":problemStatementEl.value,
            // "expectedOutput":expectedOutputEl.value,
            // "totalMark":totalMarkEl.value,
            // "difficulty":difficultyEl.value,
            // "lastSubmissionDate":lastSubmissionDateEl.value,
        };

        // console.log(sendObject);
         const sendJson= JSON.stringify(sendObject);
        ajaxJson('../php/question_creation_handler.php',sendJson,(v)=>console.log(v));

        
    })
    

    </script>

</body>

</html>
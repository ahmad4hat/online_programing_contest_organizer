<?php include 'partials/top.php'; ?>
   
    <?php if (!$user) {
        $error = "you cant create question  without log in";
        header('location: login.php?error=' . urlencode($error));
        exit();
    } ?>

    <h1>Question Creation</h1>

    <form action="" method="post" id="questionForm">

        <label for="problemStatement">Problem statement :</label>
        <p class="errorText hidden"  id="problemStatementErrorText">Hello </p>
        <br>
        <textarea name="problemStatement" id="problemStatement" cols="50" rows="10"></textarea>
        <br>
        <br>
        <label for="expectedOutput">Expected Output :</label>
        <p class="errorText hidden"  id="expectedOutputErrorText">Hello </p>
        <br>
        <textarea name="expectedOutput" id="expectedOutput" cols="50" rows="10"></textarea>
        <br>
        <br>

        <label for="supported_language">Supported Language (comma separated  value)  :</label>
        <p class="errorText hidden"  id="supported_languageErrorText">Hello </p>
        <br>
        <textarea name="supported_language" id="supported_language" cols="50" rows="10"></textarea>
        <br>
        <br>


        <label for="hints">hints  :</label>
        <p class="errorText hidden"  id="hintsErrorText">Hello </p>
        <br>
        <textarea name="hints" id="hints" cols="50" rows="10"></textarea>
        <br>
        <br>

        <label for="instructions">Instructions  :</label>
        <p class="errorText hidden"  id="instructionsErrorText">Hello </p>
        <br>
        <textarea name="instructions" id="instructions" cols="50" rows="10"></textarea>
        <br>
        <br>

        <label for="totalMark">Total Mark :</label>
        <p class="errorText hidden"  id="totalMarkErrorText">Hello </p>
        <input name="totalMark" type="number" id="totalMark"></input>
        <br>
        <br>





        <label for="difficulty">Difficulty :</label>
        <select name="difficulty" id="difficulty" required>
            <option default value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>

        </select>
        <br>
        <label for="lastSubmissionDate">
        Last Submission Date
        </label>
        <p class="errorText hidden"  id="lastSubmissionDateErrorText">Hello </p>
        <input type="date" name="lastSubmissionDate" id="lastSubmissionDate">

        <br>

        <input type="submit" value="submit" name="submit">





    </form>


    
    
    <script>


    const formEl = document.querySelector("#questionForm");
    
    const problemStatementEl= document.querySelector('#problemStatement');
    const expectedOutputEl= document.querySelector('#expectedOutput');
    const totalMarkEl= document.querySelector('#totalMark');
    const difficultyEl= document.querySelector('#difficulty');
    const lastSubmissionDateEl= document.querySelector('#lastSubmissionDate');
    const supported_languageEl= document.querySelector('#supported_language');
    const instructionsEl= document.querySelector('#instructions');
    const hintsEl= document.querySelector('#hints');

    const problemStatementErrorTextEl= document.querySelector('#problemStatementErrorText');
    const expectedOutputErrorTextEl= document.querySelector('#expectedOutputErrorText');
    const totalMarkErrorTextEl= document.querySelector('#totalMarkErrorText');
    // const difficultyEl= document.querySelector('#difficulty');
    const lastSubmissionDateErrorTextEl= document.querySelector('#lastSubmissionDateErrorText');
    const supported_languageErrorTextEl= document.querySelector('#supported_languageErrorText');
    const instructionsErrorTextEl= document.querySelector('#instructionsErrorText');
    const hintsErrorTextEl= document.querySelector('#hintsErrorText');
    

    const validateProblemStatement=(value)=>{
        let errorText =null ;
        if(!value){
            errorText="Problem Statement can not be empty";
        }else if(value==""){
            errorText="Problem Statement can not be empty";
        }
        else if (value.length < 20){
            errorText="Problem Statement at least 20 character long "
        }
        if(errorText){
            problemStatementErrorTextEl.innerText= errorText;
            problemStatementErrorTextEl.style.display="inline"

        }else{
            problemStatementErrorTextEl.innerText= null;
            problemStatementErrorTextEl.style.display="none"

        }

        return errorText
    }

    problemStatementEl.addEventListener('keyup',(event)=> validateProblemStatement(event.target.value));
    const validateSupported_language=(value)=>{
        let errorText =null ;
        if(!value){
            errorText="supported language can not be empty";
        }else if(value==""){
            errorText="supported language can not be empty";
        }
        else if (value.length < 1){
            errorText="supported language at least 1 character long "
        }
        if(errorText){
            supported_languageErrorTextEl.innerText= errorText;
            supported_languageErrorTextEl.style.display="inline"

        }else{
            supported_languageErrorTextEl.innerText= null;
            supported_languageErrorTextEl.style.display="none"

        }

        return errorText
    }

    supported_languageEl.addEventListener('keyup',(event)=> validateSupported_language(event.target.value));
   

    const validateExpectedOutput=(value)=>{
        let errorText =null ;
        
        if(!value){
            errorText="Expected Output can not be empty";
        }else if(value==""){
            errorText="Expected Output can not be empty";
        }
        else if (value.length < 5){
            errorText="Expected Output at least 5 character long "
        }
        if(errorText){
            expectedOutputErrorTextEl.innerText= errorText;
            expectedOutputErrorTextEl.style.display="inline"

        }else{
            expectedOutputErrorTextEl.innerText= null;
            expectedOutputErrorTextEl.style.display="none"

        }

        return errorText
    }

    expectedOutputEl.addEventListener('keyup',(event)=> validateExpectedOutput(event.target.value))
    const validateHints=(value)=>{
        let errorText =null ;
        
        if(!value){
            errorText="Hints can not be empty";
        }else if(value==""){
            errorText="Hints can not be empty";
        }
        else if (value.length < 5){
            errorText="Hints at least 5 character long "
        }
        if(errorText){
            hintsErrorTextEl.innerText= errorText;
            hintsErrorTextEl.style.display="inline"

        }else{
            hintsErrorTextEl.innerText= null;
            hintsErrorTextEl.style.display="none"

        }

        return errorText
    }

    hintsEl.addEventListener('keyup',(event)=> validateHints(event.target.value))
    const validateInstructions=(value)=>{
        let errorText =null ;
        
        if(!value){
            errorText="instructions can not be empty";
        }else if(value==""){
            errorText="instructions can not be empty";
        }
        else if (value.length < 5){
            errorText="instructions at least 5 character long "
        }
        if(errorText){
            instructionsErrorTextEl.innerText= errorText;
            instructionsErrorTextEl.style.display="inline"

        }else{
            instructionsErrorTextEl.innerText= null;
            instructionsErrorTextEl.style.display="none"

        }

        return errorText
    }

    instructionsEl.addEventListener('keyup',(event)=> validateInstructions(event.target.value))

    
    const validateTotalMark=(value)=>{
        let errorText =null ;
        
        if(!value){
            errorText="Total Mark can not be empty";
        }else if(value==""){
            errorText="Total Mark  can not be empty";
        }
        else if (isNaN(value)){
            errorText="Total number must ber a number";
        } else {
            valueInt = parseInt(value)
            if (valueInt < 0 || valueInt >500 ){

                errorText="Total must be between 0 and 500";
                console.log(errorText);

            }
        }
        
        if(errorText){
            totalMarkErrorTextEl.innerText= errorText;
            totalMarkErrorTextEl.style.display="inline"

        }else{
            totalMarkErrorTextEl.innerText= null;
            totalMarkErrorTextEl.style.display="none"

        }

        return errorText
    }

    totalMarkEl.addEventListener('keyup',(event)=> validateTotalMark(event.target.value))


    const validateLastSubmissionDate=(value)=>{
        let errorText =null ;

        const date = new Date(value);

        
        if(!value){
            errorText="Submission Date can not be empty";
        }else if(value==""){
            errorText=" Submission Date can not be empty";
        }else if (date< new Date()){
            errorText="Last submission date must be after today " ;

        }
    
        
        if(errorText){
            lastSubmissionDateErrorTextEl.innerText= errorText;
            lastSubmissionDateErrorTextEl.style.display="inline"

        }else{
            lastSubmissionDateErrorTextEl.innerText= null;
            lastSubmissionDateErrorTextEl.style.display="none"

        }

        return errorText
    }
    lastSubmissionDateEl.addEventListener('change',(event)=> validateLastSubmissionDate(event.target.value))

    formEl.addEventListener("submit",(event)=>{
        event.preventDefault();
        let problemStatement = problemStatementEl.value;
        let expectedOutput = expectedOutputEl.value;
        let totalMark = totalMarkEl.value;
        let difficulty = difficultyEl.value;
        let lastSubmissionDate = lastSubmissionDateEl.value;
        let supported_language = supported_languageEl.value;
        let hints = hintsEl.value;
        let instructions = instructionsEl.value;
        


        if(validateProblemStatement(problemStatement) ||
        validateExpectedOutput(expectedOutput) || 
        validateTotalMark(totalMark)|| 
        validateLastSubmissionDate(lastSubmissionDate) ||
        validateSupported_language(supported_language)  || 
        validateInstructions(instructions) || 
        validateHints(hints) ){
            return false ;

        }

        const sendObject= {
            problemStatement,
            expectedOutput,
            totalMark,
            difficulty,
            lastSubmissionDate,
            supported_language,
            hints,
            instructions
            

            // "problemStatement":problemStatementEl.value,
            // "expectedOutput":expectedOutputEl.value,
            // "totalMark":totalMarkEl.value,
            // "difficulty":difficultyEl.value,
            // "lastSubmissionDate":lastSubmissionDateEl.value,
        };

        // console.log(sendObject);
         const sendJson= JSON.stringify(sendObject);

        ajaxJson('../php/question_creation_handler.php',sendJson,(v)=>{
            v =JSON.parse(v);
            console.log(v)
            if(v.success){
                window.location = "questions.php";
            }
         });


    })


    </script>

<?php include 'partials/end.php'; ?>
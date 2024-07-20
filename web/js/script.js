//selecting all required elements
const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");
const exit_btn = info_box.querySelector(".buttons .quit");
const continue_btn = info_box.querySelector(".buttons .restart");
const quiz_box = document.querySelector(".quiz_box");
const result_box = document.querySelector(".result_box");
const option_list = document.querySelector(".option_list");
const time_line = document.querySelector("header .time_line");
const timeText = document.querySelector(".timer .time_left_txt");
const timeCount = document.querySelector(".timer .timer_sec");

// if startQuiz button clicked
start_btn.onclick = ()=>{
    info_box.classList.add("activeInfo"); //show info box
}

// if exitQuiz button clicked
exit_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); //hide info box
}

// if continueQuiz button clicked
continue_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.add("activeQuiz"); //show quiz box
    showQuetions(0); //calling showQestions function
    queCounter(1); //passing 1 parameter to queCounter
    startTimer(15); //calling startTimer function
    startTimerLine(0); //calling startTimerLine function
}

let timeValue =  15;
let que_count = 0;
let que_numb = 1;
let userScore = 0;
let counter;
let counterLine;
let widthValue = 0;

const restart_quiz = result_box.querySelector(".buttons .restart");
const quit_quiz = result_box.querySelector(".buttons .quit");

// if restartQuiz button clicked
restart_quiz.onclick = ()=>{
    quiz_box.classList.add("activeQuiz"); //show quiz box
    result_box.classList.remove("activeResult"); //hide result box
    timeValue = 15;
    que_count = 0;
    que_numb = 1;
    userScore = 0;
    widthValue = 0;
    showQuetions(que_count); //calling showQestions function
    queCounter(que_numb); //passing que_numb value to queCounter
    clearInterval(counter); //clear counter
    clearInterval(counterLine); //clear counterLine
    startTimer(timeValue); //calling startTimer function
    startTimerLine(widthValue); //calling startTimerLine function
    timeText.textContent = "Time Left"; //change the text of timeText to Time Left
    next_btn.classList.remove("show"); //hide the next button
}

// if quitQuiz button clicked
quit_quiz.onclick = ()=>{
    window.location.reload(); //reload the current window
}

const next_btn = document.querySelector("footer .next_btn");
const bottom_ques_counter = document.querySelector("footer .total_que");

// if Next Que button clicked
next_btn.onclick = ()=>{
    if(que_count < questions.length - 1){ //if question count is less than total question length
        que_count++; //increment the que_count value
        que_numb++; //increment the que_numb value
        showQuetions(que_count); //calling showQestions function
        queCounter(que_numb); //passing que_numb value to queCounter
        clearInterval(counter); //clear counter
        clearInterval(counterLine); //clear counterLine
        startTimer(timeValue); //calling startTimer function
        startTimerLine(widthValue); //calling startTimerLine function
        timeText.textContent = "Temps restant"; //change the timeText to Time Left
        next_btn.classList.remove("show"); //hide the next button
    }else{
        clearInterval(counter); //clear counter
        clearInterval(counterLine); //clear counterLine
        showResult(); //calling showResult function
    }
}

// getting questions and options from array
function showQuetions(index){
    const que_text = document.querySelector(".que_text");

    //creating a new span and div tag for question and option and passing the value using array index
    let que_tag = '<span>'+ questions[index].numb + ". " + questions[index].question +'</span>';
    let option_tag = '<div class="option"><span>'+ questions[index].options[0] +'</span></div>'
    + '<div class="option"><span>'+ questions[index].options[1] +'</span></div>'
    + '<div class="option"><span>'+ questions[index].options[2] +'</span></div>'
    + '<div class="option"><span>'+ questions[index].options[3] +'</span></div>';
    que_text.innerHTML = que_tag; //adding new span tag inside que_tag
    option_list.innerHTML = option_tag; //adding new div tag inside option_tag

    const option = option_list.querySelectorAll(".option");

    // set onclick attribute to all available options
    for(i=0; i < option.length; i++){
        option[i].setAttribute("onclick", "optionSelected(this)");
    }
}
// creating the new div tags which for icons
let tickIconTag = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIconTag = '<div class="icon cross"><i class="fas fa-times"></i></div>';

//if user clicked on option
function optionSelected(answer){
    clearInterval(counter); //clear counter
    clearInterval(counterLine); //clear counterLine
    let userAns = answer.textContent; //getting user selected option
    let correcAns = questions[que_count].answer; //getting correct answer from array
    const allOptions = option_list.children.length; //getting all option items

    if(userAns == correcAns){ //if user selected option is equal to array's correct answer
        userScore += 1; //upgrading score value with 1
        answer.classList.add("correct"); //adding green color to correct selected option
        answer.insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to correct selected option
        console.log("Correct Answer");
        console.log("Your correct answers = " + userScore);
    }else{
        answer.classList.add("incorrect"); //adding red color to correct selected option
        answer.insertAdjacentHTML("beforeend", crossIconTag); //adding cross icon to correct selected option
        console.log("Wrong Answer");

        for(i=0; i < allOptions; i++){
            if(option_list.children[i].textContent == correcAns){ //if there is an option which is matched to an array answer
                option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
                console.log("Auto selected correct answer.");
            }
        }
    }
    for(i=0; i < allOptions; i++){
        option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
    }
    next_btn.classList.add("show"); //show the next button if user selected any option
}

function showResult(){
    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.remove("activeQuiz"); //hide quiz box
    result_box.classList.add("activeResult"); //show result box
    const scoreText = result_box.querySelector(".score_text");
    if (userScore > 3){ // if user scored more than 3
        //creating a new span tag and passing the user score number and total question number
        let scoreTag = '<span>and congrats! 🎉, You got <p>'+ userScore +'</p> out of <p>'+ questions.length +'</p></span>';
        scoreText.innerHTML = scoreTag;  //adding new span tag inside score_Text
    }
    else if(userScore > 1){ // if user scored more than 1
        let scoreTag = '<span>and nice 😎, You got <p>'+ userScore +'</p> out of <p>'+ questions.length +'</p></span>';
        scoreText.innerHTML = scoreTag;
    }
    else{ // if user scored less than 1
        let scoreTag = '<span>and sorry 😐, You got only <p>'+ userScore +'</p> out of <p>'+ questions.length +'</p></span>';
        scoreText.innerHTML = scoreTag;
    }
}

function startTimer(time){
    counter = setInterval(timer, 1000);
    function timer(){
        timeCount.textContent = time; //changing the value of timeCount with time value
        time--; //decrement the time value
        if(time < 9){ //if timer is less than 9
            let addZero = timeCount.textContent;
            timeCount.textContent = "0" + addZero; //add a 0 before time value
        }
        if(time < 0){ //if timer is less than 0
            clearInterval(counter); //clear counter
            timeText.textContent = "Time Off"; //change the time text to time off
            const allOptions = option_list.children.length; //getting all option items
            let correcAns = questions[que_count].answer; //getting correct answer from array
            for(i=0; i < allOptions; i++){
                if(option_list.children[i].textContent == correcAns){ //if there is an option which is matched to an array answer
                    option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                    option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
                    console.log("Time Off: Auto selected correct answer.");
                }
            }
            for(i=0; i < allOptions; i++){
                option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
            }
            next_btn.classList.add("show"); //show the next button if user selected any option
        }
    }
}

function startTimerLine(time){
    counterLine = setInterval(timer, 29);
    function timer(){
        time += 1; //upgrading time value with 1
        time_line.style.width = time + "px"; //increasing width of time_line with px by time value
        if(time > 549){ //if time value is greater than 549
            clearInterval(counterLine); //clear counterLine
        }
    }
}

function queCounter(index){
    //creating a new span tag and passing the question number and total question
    let totalQueCounTag = '<span><p>'+ index +'</p> of <p>'+ questions.length +'</p> Questions</span>';
    bottom_ques_counter.innerHTML = totalQueCounTag;  //adding new span tag inside bottom_ques_counter
}
const start_btn1 = document.querySelector(".start_btn1 button");
const info_box1 = document.querySelector(".info_box1");
const exit_btn1 = info_box1.querySelector(".buttons1 .quit1");
const continue_btn1 = info_box1.querySelector(".buttons1 .restart1");
const quiz_box1 = document.querySelector(".quiz_box1");
const result_box1 = document.querySelector(".result_box1");
const option_list1 = document.querySelector(".option_list1");
const time_line1 = document.querySelector(".timer1 .time_line1");
const timeText1 = document.querySelector(".timer1 .time_left_txt1");
const timeCount1 = document.querySelector(".timer1 .timer_sec1");

// if startQuiz button clicked
start_btn1.onclick = () => {
    info_box1.classList.add("activeInfo"); //show info box
}

// if exitQuiz button clicked
exit_btn1.onclick = () => {
    info_box1.classList.remove("activeInfo"); //hide info box
}

// if continueQuiz button clicked
continue_btn1.onclick = () => {
    info_box1.classList.remove("activeInfo"); //hide info box
    quiz_box1.classList.add("activeQuiz"); //show quiz box
    showQuestions1(0); //calling showQuestions function
    queCounter1(1); //passing 1 parameter to queCounter
    startTimer1(10); //calling startTimer function
    startTimerLine1(0); //calling startTimerLine function
}

let timeValue1 = 10;
let que_count1 = 0;
let que_numb1 = 1;
let userScore1 = 0;
let counter1;
let counterLine1;
let widthValue1 = 0;

const restart_quiz1 = result_box1.querySelector(".buttons1 .restart1");
const quit_quiz1 = result_box1.querySelector(".buttons1 .quit1");

// if restartQuiz button clicked
restart_quiz1.onclick = () => {
    quiz_box1.classList.add("activeQuiz"); //show quiz box
    result_box1.classList.remove("activeResult"); //hide result box
    timeValue1 = 10;
    que_count1 = 0;
    que_numb1 = 1;
    userScore1 = 0;
    widthValue1 = 0;
    showQuestions1(que_count1); //calling showQuestions function
    queCounter1(que_numb1); //passing que_numb value to queCounter
    clearInterval(counter1); //clear counter
    clearInterval(counterLine1); //clear counterLine
    startTimer1(timeValue1); //calling startTimer function
    startTimerLine1(widthValue1); //calling startTimerLine function
    timeText1.textContent = "Temps restant"; //change the text of timeText to Time Left
    next_btn1.classList.remove("show"); //hide the next button
}

// if quitQuiz button clicked
quit_quiz1.onclick = () => {
    window.location.reload(); //reload the current window
}

const next_btn1 = document.querySelector("footer .next_btn1");
const bottom_ques_counter1 = document.querySelector("footer .total_que1");

// if Next Que button clicked
next_btn1.onclick = () => {
    if (que_count1 < questions1.length - 1) { //if question count is less than total question length
        que_count1++; //increment the que_count value
        que_numb1++; //increment the que_numb value
        showQuestions1(que_count1); //calling showQuestions function
        queCounter1(que_numb1); //passing que_numb value to queCounter
        clearInterval(counter1); //clear counter
        clearInterval(counterLine1); //clear counterLine
        startTimer1(timeValue1); //calling startTimer function
        startTimerLine1(widthValue1); //calling startTimerLine function
        timeText1.textContent = "Temps restant"; //change the timeText to Time Left
        next_btn1.classList.remove("show"); //hide the next button
    } else {
        clearInterval(counter1); //clear counter
        clearInterval(counterLine1); //clear counterLine
        showResult1(); //calling showResult function
    }
}

// getting questions and options from array
function showQuestions1(index) {
    const que_text1 = document.querySelector(".que_text1");

    //creating a new span and div tag for question and option and passing the value using array index
    let que_tag1 = '<span>' + questions1[index].numb + ". " + questions1[index].question + '</span>';
    let option_tag1 = '<div class="option"><span>' + questions1[index].options[0] + '</span></div>' +
        '<div class="option"><span>' + questions1[index].options[1] + '</span></div>' +
        '<div class="option"><span>' + questions1[index].options[2] + '</span></div>' +
        '<div class="option"><span>' + questions1[index].options[3] + '</span></div>';
    que_text1.innerHTML = que_tag1; //adding new span tag inside que_tag
    option_list1.innerHTML = option_tag1; //adding new div tag inside option_tag

    const option1 = option_list1.querySelectorAll(".option");

    // set onclick attribute to all available options
    for (let i = 0; i < option1.length; i++) {
        option1[i].setAttribute("onclick", "optionSelected1(this)");
    }
}

// creating the new div tags which for icons
let tickIconTag1 = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIconTag1 = '<div class="icon cross"><i class="fas fa-times"></i></div>';

//if user clicked on option
function optionSelected1(answer) {
    clearInterval(counter1); //clear counter
    clearInterval(counterLine1); //clear counterLine
    let userAns1 = answer.textContent; //getting user selected option
    let correctAns1 = questions1[que_count1].answer; //getting correct answer from array
    const allOptions1 = option_list1.children.length; //getting all option items

    if (userAns1 == correctAns1) { //if user selected option is equal to array's correct answer
        userScore1 += 1; //upgrading score value with 1
        answer.classList.add("correct"); //adding green color to correct selected option
        answer.insertAdjacentHTML("beforeend", tickIconTag1); //adding tick icon to correct selected option
        console.log("Correct Answer");
        console.log("Your correct answers = " + userScore1);
    } else {
        answer.classList.add("incorrect"); //adding red color to correct selected option
        answer.insertAdjacentHTML("beforeend", crossIconTag1); //adding cross icon to correct selected option
        console.log("Wrong Answer");

        for (let i = 0; i < allOptions1; i++) {
            if (option_list1.children[i].textContent == correctAns1) { //if there is an option which is matched to an array answer
                option_list1.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                option_list1.children[i].insertAdjacentHTML("beforeend", tickIconTag1); //adding tick icon to matched option
                console.log("Auto selected correct answer.");
            }
        }
    }
    for (let i = 0; i < allOptions1; i++) {
        option_list1.children[i].classList.add("disabled"); //once user select an option then disabled all options
    }
    next_btn1.classList.add("show"); //show the next button if user selected any option
}

function showResult1() {
    info_box1.classList.remove("activeInfo"); //hide info box
    quiz_box1.classList.remove("activeQuiz"); //hide quiz box
    result_box1.classList.add("activeResult"); //show result box
    const scoreText1 = result_box1.querySelector(".score_text1");
    if (userScore1 > 3) { // if user scored more than 3
        //creating a new span tag and passing the user score number and total question number
        let scoreTag1 = '<span>and congrats! 🎉, You got <p>' + userScore1 + '</p> out of <p>' + questions1.length + '</p></span>';
        scoreText1.innerHTML = scoreTag1; //adding new span tag inside score_Text
    } else if (userScore1 > 1) { // if user scored more than 1
        let scoreTag1 = '<span>and nice 😎, You got <p>' + userScore1 + '</p> out of <p>' + questions1.length + '</p></span>';
        scoreText1.innerHTML = scoreTag1;
    } else { // if user scored less than 1
        let scoreTag1 = '<span>et désolé 😐, Vous avez seulement <p>' + userScore1 + '</p> sur <p>' + questions1.length + '</p></span>' ;
        scoreText1.innerHTML = scoreTag1;
    }
}

function startTimer1(time) {
    counter1 = setInterval(timer, 1000);
    function timer() {
        timeCount1.textContent = time; //changing the value of timeCount with time value
        time--; //decrement the time value
        if (time < 9) { //if timer is less than 9
            let addZero = timeCount1.textContent;
            timeCount1.textContent = "0" + addZero; //add a 0 before time value
        }
        if (time < 0) { //if timer is less than 0
            clearInterval(counter1); //clear counter
            timeText1.textContent = "Time Off"; //change the time text to time off
            const allOptions1 = option_list1.children.length; //getting all option items
            let correctAns1 = questions1[que_count1].answer; //getting correct answer from array
            for (let i = 0; i < allOptions1; i++) {
                if (option_list1.children[i].textContent == correctAns1) { //if there is an option which is matched to an array answer
                    option_list1.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                    option_list1.children[i].insertAdjacentHTML("beforeend", tickIconTag1); //adding tick icon to matched option
                    console.log("Time Off: Auto selected correct answer.");
                }
            }
            for (let i = 0; i < allOptions1; i++) {
                option_list1.children[i].classList.add("disabled"); //once user select an option then disabled all options
            }
            next_btn1.classList.add("show"); //show the next button if user selected any option
        }
    }
}

function startTimerLine1(time) {
    counterLine1 = setInterval(timer, 29);
    function timer() {
        time += 1; //upgrading time value with 1
        time_line1.style.width = time + "px"; //increasing width of time_line with px by time value
        if (time > 549) { //if time value is greater than 549
            clearInterval(counterLine1); //clear counterLine
        }
    }
}

function queCounter1(index) {
    //creating a new span tag and passing the question number and total question
    let totalQueCounTag1 = '<span><p>' + index + '</p> of <p>' + questions1.length + '</p> Questions</span>';
    bottom_ques_counter1.innerHTML = totalQueCounTag1; //adding new span tag inside bottom_ques_counter
}

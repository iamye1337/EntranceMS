localStorage.clear();
let questionCounter = 1;
let totalQuestions = 10;




// this is fetching question from exam.php

// fetching question and converting to json format
let jsonQuestion = document.getElementById('question container').innerText;
jsonQuestion = JSON.parse(jsonQuestion);
// console.log(jsonQuestion);

// Storing Questions in localStorage in JSON format
for (let questionsCollection in jsonQuestion) {
    //Question1
    localStorage.setItem(questionsCollection, JSON.stringify(jsonQuestion[questionsCollection]));
}

// Injecting questions into interface
let questionNum = document.getElementById('qn number');
let question = document.getElementById('question');
let questionObj;

let qnIndicator = document.getElementById('qnIndicator');


let options = document.querySelectorAll('.options');


function questionUpdater() {
    qnIndicator.innerText = `Question ${questionCounter} of ${totalQuestions}`;
    questionNum.innerText = `Question ${questionCounter}`;
    questionObj = JSON.parse(localStorage.getItem(`Question ${questionCounter}`));
    question.innerText = questionObj.Qn;
    optionsCreator();
}
questionUpdater();


function optionsCreator() {
    Array.from(options).forEach((element) => {
        if (element.classList.contains("correct")) {
            element.classList.remove('correct');
        }
    });

    Array.from(options).forEach((element, index) => {
        element.innerText = questionObj.options[`option${index + 1}`];
        if (element.innerText.includes("#$")) {
            element.innerText = element.innerText.slice(0, element.innerText.length - 2);
            element.classList.add('correct');
        }
    });
    // const radios = document.querySelectorAll('.options')
    // radios.forEach(element => {
    //     if (`${element.value}` != localStorage.getItem(`qid${element.value}`))
    //         element.checked = false;
    //     else
    //         element.checked = true;
}

document.getElementById('next').addEventListener('click', function () {
    const radios = document.querySelectorAll('input[type="radio"]');
    radios.forEach((radio, index) => {
        if (`${index}` != localStorage.getItem(`qid${radio.value}`))
            radio.checked = false;
        else
        radio.checked = true;
    });
});




// Navigating Questions
let nextBtn = document.getElementById('next');
let prevBtn = document.getElementById('prev');

nextBtn.addEventListener('click', next);
prevBtn.addEventListener('click', prev);

function submit() {
    if (confirm("are you sure?")) {

        // console.log("pressed confirm");
    }
    else {
        console.log("canceled");
    }
}

// next to submit button 
function addSubmit() {
    nextBtn.textContent = "Submit";
    nextBtn.removeEventListener('click', next);
    nextBtn.addEventListener('click', submit);
}

// submit to next button 
function removeSubmit() {
    nextBtn.textContent = "Next";
    nextBtn.removeEventListener('click', submit);
    nextBtn.addEventListener('click', next);
}


function next() {
    if (questionCounter == totalQuestions - 1)
        addSubmit();

    if (questionCounter == totalQuestions) {
        return;
    }
    questionCounter++;
    questionUpdater();
}

function prev() {
    if (questionCounter == totalQuestions)
        removeSubmit();
    if (questionCounter == 1) {
        return;
    }
    questionCounter--;
    questionUpdater();
}

//Timer function
let hours = document.getElementById('hours');
let minutes = document.getElementById('minutes');
let seconds = document.getElementById('seconds');

let currentTime = new Date().getTime();
const updatedTime = new Date(currentTime + .5 * 60 * 60 * 1000);

function updateCountdowntime() {

    currentTime = new Date();
    const diff = updatedTime - currentTime; // in milliseconds
    const h = Math.floor(diff / 1000 / 60 / 60) % 24;
    const m = Math.floor(diff / 1000 / 60) % 60;
    const s = Math.floor(diff / 1000) % 60;

    hours.innerHTML = h < 10 ? '0' + h : h;
    minutes.innerHTML = m < 10 ? '0' + m : m;
    seconds.innerHTML = s < 10 ? '0' + s : s;

}

setInterval(updateCountdowntime, 1000); // 1seconds



// question fetch function

// Save the current question number in localStorage
function saveProgress(questionNum, selectedOption) {
    localStorage.setItem('currentQuestion', questionNum);
    // if (questionObj.Qn.correctOption == selectedOption)
    localStorage.setItem('qid' + questionNum, selectedOption);
}

// // Load the saved progress from localStorage
// function loadProgress() {
//     let currentQuestion = localStorage.getItem('currentQuestion') || 1;
//     let selectedOption = localStorage.getItem('qid' + currentQuestion);

//     // Set the question and option based on saved data
//     // Set the radio button to the saved option if available
//     if (selectedOption) {
//         document.querySelector(`input[value="${selectedOption}"]`).checked = true;
//     }

//     return currentQuestion;
// }

// When the user selects an option, save the progress
document.querySelectorAll('input[name="option"]').forEach(function (radioButton) {
    radioButton.addEventListener('change', function () {
        let selectedOption = this.value;
        // let currentQuestion = document.getElementById('qn number').value;
        let currentQuestion = questionCounter;
        saveProgress(currentQuestion, selectedOption);
    });
});

// // Call loadProgress when the page loads
// window.onload = function () {
//     let questionNum = loadProgress();
//     // Load and display the question based on questionNum
// };

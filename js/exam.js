localStorage.clear();
let questionCounter = 1;
let totalQuestions = 10;
let attemptedQuestions = 0;

// attempted and unanswered qns
let attempted = document.getElementById('attempted-qn');
let unanswered = document.getElementById('unattempted-qn');
attempted.innerText = '0';
unanswered.innerText = totalQuestions;

let attemptedQnTracker = [];
function updateAttemptedQn(questionNum) {
    if (!attemptedQnTracker.includes(questionNum)) {
        attemptedQnTracker.push(questionNum);
    }
    attempted.innerText = attemptedQnTracker.length;
}
function updateUnansweredQn() {
    unanswered.innerText = totalQuestions - attemptedQnTracker.length;
}

let jsonQuestion = document.getElementById('question-container').innerText;
jsonQuestion = JSON.parse(jsonQuestion);
for (let questionsCollection in jsonQuestion) {
    localStorage.setItem(questionsCollection, JSON.stringify(jsonQuestion[questionsCollection]));
}

let questionNum = document.getElementById('qn number');
let question = document.getElementById('question');
let questionObj;
let qnIndicator = document.getElementById('qnIndicator');
let options = document.querySelectorAll('.options');
const radios = document.querySelectorAll('input[type="radio"]');

function questionUpdater() {
    qnIndicator.innerText = `Question ${questionCounter} of ${totalQuestions}`;
    questionNum.innerText = `Question ${questionCounter}`;
    questionObj = JSON.parse(localStorage.getItem(`Question ${questionCounter}`));
    question.innerText = questionObj.Qn;
    optionsCreator();
}
questionUpdater();

function optionsCreator() {
    Array.from(options).forEach((element, index) => {
        element.innerText = questionObj.options[`option${index + 1}`];
    });

    const storedValue = localStorage.getItem(`qid${questionCounter}`);
    radios.forEach((radio) => {
        if (radio.value === storedValue) {
            radio.checked = true;
        } else {
            radio.checked = false;
        }
    });
}

let nextBtn = document.getElementById('next');
let prevBtn = document.getElementById('prev');

nextBtn.addEventListener('click', next);
prevBtn.addEventListener('click', prev);


function sendMarks() {
    let resultData = {
        "marks": correctedProgress.length
    }
    fetch('partials/_handle_submission.php', {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(resultData)
    })
        .then(response => response.text())
        .then(result => {
            console.log('Success:', result);
        })
        .catch(error => {
            console.error('Error:', error);
        });

    window.location.replace("submitted.php");
}

let submissionModal = new bootstrap.Modal('#submissionModal');
let modalSubmitBtn = document.getElementById('modal-submit-btn');
modalSubmitBtn.addEventListener('click', sendMarks);
function submit() {
    document.querySelector('.modal-body').innerHTML = `Are you sure you want to submit? <br> You have answered ${attempted.innerText} out of ${totalQuestions}`;
    submissionModal.show();
}

function addSubmit() {
    nextBtn.textContent = "Submit";
    nextBtn.removeEventListener('click', next);
    nextBtn.addEventListener('click', submit);
}
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

let hours = document.getElementById('hours');
let minutes = document.getElementById('minutes');
let seconds = document.getElementById('seconds');
let currentTime = new Date().getTime();
const updatedTime = new Date(currentTime + .5 * 60 * 60 * 1000);

function updateCountdowntime() {
    currentTime = new Date();
    const diff = updatedTime - currentTime;
    const h = Math.floor(diff / 1000 / 60 / 60) % 24;
    const m = Math.floor(diff / 1000 / 60) % 60;
    const s = Math.floor(diff / 1000) % 60;

    hours.innerHTML = h < 10 ? '0' + h : h;
    minutes.innerHTML = m < 10 ? '0' + m : m;
    seconds.innerHTML = s < 10 ? '0' + s : s;
}

setInterval(updateCountdowntime, 1000);

let correctedProgress = [];
function saveProgress(questionNum, selectedOption) {
    localStorage.setItem('qid' + questionNum, selectedOption);
    if (questionObj.options.correctOption == selectedOption) {
        correctedProgress.push('qid' + questionNum);
    }
    else {
        if (correctedProgress.includes('qid' + questionNum)) {
            correctedProgress.pop('qid' + questionNum);
        }
    }
}

const attemptedCountDisplay = document.getElementById('attempted-qn');
document.querySelectorAll('input[name="option"]').forEach(function (radioButton) {
    radioButton.addEventListener('change', function () {
        let selectedOption = this.value;
        let currentQuestion = questionCounter;
        attemptedQuestions++;
        attemptedCountDisplay.textContent = attemptedQuestions;
        saveProgress(currentQuestion, selectedOption);
        updateAttemptedQn(currentQuestion);
        updateUnansweredQn();
    });
});
setTimeout(sendMarks, .5 * 60 * 60 * 1000);

let submitStr = document.getElementById('next').textContent;
if (submitStr !== "Submit") {
    window.onbeforeunload = function () {
        return "Data will be lost if you leave the page, are you sure?";
    };
}
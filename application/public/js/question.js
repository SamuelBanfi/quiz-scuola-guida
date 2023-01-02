timeLeft = 0;
countdownBaseUrl = "";

setTimeout(checkCountdownLoaded, 1000);

function setQuestion(data, id, url) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("qid=" + id + "&aid=" + data.id);
}

function checkCountdownLoaded() {
    if (document.getElementById("remainingTime") != null) {
        countdownBaseUrl = document.getElementById("remainingTime").getAttribute("data-url");
        startTime();
    } else {
        setTimeout(checkCountdownLoaded, 1000);
    }
}

function countdown() {
    if (location.href.indexOf("quiz/game") == -1 && location.href.indexOf("quiz/start") == -1) {
        return;
    }

	timeLeft--;
	document.getElementById("remainingTime").innerHTML = formatTime(timeLeft) + " minuti";

	if (timeLeft > 0) {
		setTimeout(countdown, 1000);
	} else {
        stopQuiz(countdownBaseUrl + "quiz/stop");
	}
};

function getLimitTime(url) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            timeLeft = parseInt(this.responseText);
        }
    };
    xmlhttp.open("GET", url, false);
    xmlhttp.send();
}

function stopQuiz(url) {
    location.href = url;
}

function startTime() {
    getLimitTime(countdownBaseUrl + "quiz/get_remaining_time");

    if (timeLeft != -1) {
        timeLeft = timeLeft;
        setTimeout(countdown, 1000);   
    } else {
        document.getElementById("remainingTime").innerHTML = "Illimitato";
    }
}

function formatTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = time - minutes * 60;

    if (seconds < 10) {
        seconds = "0" + seconds;
    }

    return minutes + ":" + seconds;
}
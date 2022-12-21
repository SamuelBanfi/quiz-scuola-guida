function setQuestion(data, id, url) {
    xmlhttp = new XMLHttpRequest();
    /*xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };*/
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("qid=" + id + "&aid=" + data.id);
}
function redirect(location) {
    window.location.href = location
}

var ChangeInputs = 0;
var DownloadInputs = 0;
var LinkInputs = 0;


function addChangeInput() {
    document.getElementById("changeInputs").innerHTML += "<input type='text' style='width: 250px' name='change" + ChangeInputs + "' placeholder='Change'><br>";
    ChangeInputs++;
}

function addDownloadInput() {
    document.getElementById("downloadInputs").innerHTML += "<input type='text' style='width: 250px' name='downloadLink" + DownloadInputs + "' placeholder='Link'><input type='text' style='width: 250px' name='downloadName" + DownloadInputs + "' placeholder='Download Name'><br>";
    DownloadInputs++;
}

function addLinkInput() {
    document.getElementById("linkInputs").innerHTML += "<input type='text' style='width: 250px' name='linkLink" + LinkInputs + "' placeholder='Link'><input type='text' style='width: 250px' name='linkName" + LinkInputs + "' placeholder='Link Name'><br>";
    LinkInputs++;
}
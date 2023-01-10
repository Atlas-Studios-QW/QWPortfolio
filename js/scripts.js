function redirect(location) {
    window.location.href = location
}

totalInputs = 0;

function addChangeInput() {
    document.getElementById("changeInputs").innerHTML += "<input type='text' style='width: 250px' name='change"+totalInputs+"' placeholder='Change'><br>";
    totalInputs++;
}
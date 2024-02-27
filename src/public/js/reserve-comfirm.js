function showDateValue() {
    var dateInput = document.getElementById("dateInput").value;
    document.getElementById("date").innerHTML = dateInput;
}

function showSelectValue() {
    var selectValue = document.getElementById("selectInput").value;
    document.getElementById("time").innerHTML = selectValue;
}

function showNumberValue() {
    var numberValue = document.getElementById("numberInput").value;
    document.getElementById("number").innerHTML = numberValue + "人";
}

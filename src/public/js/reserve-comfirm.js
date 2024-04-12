function showDateValue() {
    var dateInput = document.getElementById("date__input").value;
    document.getElementById("date").innerHTML = dateInput;
}

function showSelectValue() {
    var selectValue = document.getElementById("select__input").value;
    document.getElementById("time").innerHTML = selectValue;
}

function showNumberValue() {
    var numberValue = document.getElementById("number__input").value;
    document.getElementById("number").innerHTML = numberValue + "人";
}

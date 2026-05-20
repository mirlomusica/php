function updateLabels() {
    console.log("hola");
    if (field.value == "nomCognom") {
        val1Label.innerHTML = "Nom:";
        val2Label.hidden = false;
        value2.hidden = false;
        val2Label.innerHTML = "Cognom:";
        return;

    }

    val2Label.hidden = true;
    value2.hidden = true;
    val1Label.innerHTML = field.value+":";


}

let form = document.getElementById("form");
let field = document.getElementById("field");
let value1 = document.getElementById("value1");
let value2 = document.getElementById("value2");
let val1Label = document.getElementById("val1Label");
let val2Label = document.getElementById("val2Label");


field.addEventListener("click", updateLabels)

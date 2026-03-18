const flogin = document.getElementById("flogin");
const btn = document.getElementById("btn");
let mostrar = document.getElementById("mostrar");
mostrar.innerHTML = "adeu";

btn.addEventListener("click", (e) => {
    e.preventDefault();
    let datosInsertar = new FormData(flogin);
    console.log(datosInsertar);
    fetch("PHP/obtener.php", {
        method: "POST",
        body: datosInsertar,
    })
        .then((resp) => resp.text())
        .then((data) => {
            mostrar.innerHTML = data;
        });
});

let btn1 = document.getElementById("btn1");
btn1.addEventListener("click", () => {
    let caja4 = document.getElementById("caja4");
    let formData = { campo4: caja4.value };
    fetch("PHP/obtener2.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(formData),
    })
        .then((resp) => resp.text())
        .then((data) => {
            console.log(data);
        });
});

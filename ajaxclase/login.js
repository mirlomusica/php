const flogin = document.getElementById("flogin");
const btn = document.getElementById("btn");
let mostrar = document.getElementById("mostrar");
mostrar.innerHTML = "adeu";

btn.addEventListener("click", (e) => {
    e.preventDefault();
    let datosInsertar = new FormData(flogin);
    fetch("PHP/login.php", {
        method: "POST",
        body: datosInsertar,
        redirect: "follow",
    })
        .then((resp) => resp.text())
        .then((data) => {
            console.log("hola");
            mostrar.innerHTML = data;
        });
});

const finsertar = document.getElementById("finsertar");
const btn = document.getElementById("btn");
let mostrar = document.getElementById("mostrar");

btn.addEventListener("click", (e) => {
    e.preventDefault();
    let datosInsertar = new FormData(finsertar);
    fetch("PHP/insertar.php", {
        method: "POST",
        body: datosInsertar,
    })
        .then((resp) => resp.text())
        .then((data) => {
            console.log(data);
            mostrar.innerHTML = data;
        });
});

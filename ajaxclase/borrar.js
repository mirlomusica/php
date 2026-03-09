const fborrar = document.getElementById("fborrar");
const btn = document.getElementById("btn");

fborrar.addEventListener("submit", (e) => {
    e.preventDefault();
    let datosBorrar = new FormData(fborrar);
    console.log("BORRAR");
    fetch("PHP/borrar.php", {
        method: "POST",
        body: datosBorrar,
    })
        .then((resp) => resp.text())
        .then((data) => {
            console.log(data);
        });
});

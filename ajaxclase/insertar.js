const finsertar = document.getElementById("finsertar");
const btn = document.getElementById("btn");

btn.addEventListener("click", (e) => {
    e.preventDefault();
    let datosInsertar = new FormData(finsertar);
    fetch("PHP/insertar.php", {
        method: "POST",
        body: datosInsertar,
    })
        .then((resp) => resp.json())
        .then((data) => {
            console.log(data);
        });
});

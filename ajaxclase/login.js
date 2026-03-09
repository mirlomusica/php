const flogin = document.getElementById("flogin");
const btn = document.getElementById("btn");

btn.addEventListener("click", (e) => {
    e.preventDefault();
    let datosInsertar = new FormData(flogin);
    fetch("PHP/login.php", {
        method: "POST",
        body: datosInsertar,
    })
        .then((resp) => resp.text())
        .then((data) => {
            console.log(data);
        });
});

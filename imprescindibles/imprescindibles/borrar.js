//código para borrar un registro

const f1 = document.getElementById("f1");
f1.addEventListener("submit", (e) => {
    e.preventDefault();
    let miformdata = new FormData(f1);
    fetch("borrar.php", {
            method: "POST",
            body: miformdata
        })
        .then(resp => resp.text())
        .then(datos => {
            console.log(datos);
            window.location.href = "mostrar.html";

        })

})
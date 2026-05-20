const mostrar = document.getElementById("mostrar");
const f1 = document.getElementById("f1");

//añadimos el evento de envío
f1.addEventListener("submit", (e) => {
    e.preventDefault();
    let miformdata = new FormData(f1);
    fetch("repaso2.php", {
            method: "POST",
            body: miformdata
        })
        .then(resp => resp.json())
        .then(datos => {
            mostrar.innerHTML = `<h1>${datos.propiedad1}</h1><h3>${datos.propiedad2}</h3><h5>${datos.info}</h5>`;
        })

})
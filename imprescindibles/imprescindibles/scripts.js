const f1 = document.getElementById("f1");
let caja1 = document.getElementById("caja1");
let btninsertar = document.getElementById("btninsertar");
let btnborrar = document.getElementById("btnborrar");


//evento envio
f1.addEventListener("submit", (e) => {
    e.preventDefault();
    //let valor1 = caja1.value;
    //console.log("Has enviado el valor de la caja1: " + valor1);
    //si tenemos muchos elementos de form se hace tedioso, es mejor el formdata
    let miformdata = new FormData(f1);
    fetch("miphp.php", {
            method: 'POST',
            body: miformdata
        })
        .then(resp => resp.json())
        .then(datos => {
            console.log(datos)
        })

})

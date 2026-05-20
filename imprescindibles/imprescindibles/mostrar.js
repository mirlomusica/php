function cargarRegistros() {
    const container = document.getElementById("tabla-container");
    fetch('mostrar.php')
        .then(resp => resp.json())
        .then(datos => {
            var codigo = `<table><tr><th>IDCAMPO</th><th>CAMPO2</th><th>CAMPO3<th></tr>`;
            //mostrar registros
            datos.forEach(registro => {
                codigo += `<tr><td>${registro.idcampo}</td><td>${registro.campo2}</td><td>${registro.campo3}</td></tr>`;
            });
            codigo += "</table>";
            container.innerHTML = codigo;
        })
}

//evento al cargar la página
document.addEventListener("DOMContentLoaded", cargarRegistros);
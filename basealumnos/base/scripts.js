document.addEventListener("DOMContentLoaded", function () {
    cargarRegistros();

    document
        .getElementById("btnInsertar")
        .addEventListener("click", function () {
            document.getElementById("modalTitulo").textContent =
                "Nuevo Registro";
            document.getElementById("IDALUMNO").value = "";
            document.getElementById("NOMBRE").value = "";
            document.getElementById("APELLIDOS").value = "";
            document.getElementById("modal").style.display = "block";
        });

    document
        .getElementById("formulario")
        .addEventListener("submit", function (e) {
            e.preventDefault();

            const IDALUMNO = document.getElementById("IDALUMNO").value;
            const NOMBRE = document.getElementById("NOMBRE").value;
            const APELLIDOS = document.getElementById("APELLIDOS").value;

            const formData = new FormData();

            if (IDALUMNO) {
                formData.append("operacion", "actualizar"); //permite añadir elemento a elemento de las cajas
                formData.append("NOMBRE", NOMBRE);
                formData.append("APELLIDOS", APELLIDOS);
            } else {
                formData.append("operacion", "insertar");
                formData.append("NOMBRE", NOMBRE);
                formData.append("APELLIDOS", APELLIDOS);
            }

            fetch("api.php", {
                method: "POST",
                body: formData,
            })
                .then((response) => response.text())
                .then((data) => {
                    console.log(data);
                    if (data.success) {
                        cerrarModal(); //oculta o invisibiliza y además vacía
                        cargarRegistros();
                        document.getElementById("formulario").reset();
                    }
                });
        });
});

function cargarRegistros() {
    fetch("api.php?operacion=obtener")
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            const tbody = document.getElementById("cuerpoTabla");
            tbody.innerHTML = "";

            data.forEach((registro) => {
                const fila = document.createElement("tr");
                console.log(registro.NOMBRE);
                fila.innerHTML = `
                    <td>${registro.IDALUMNO}</td>
                    <td>${registro.NOMBRE}</td>
                    <td>${registro.APELLIDOS}</td>
                    <td>
                        <button class="btn btn-editar" onclick="editarRegistro(${registro.IDALUMNO}, '${registro.NOMBRE}', '${registro.APELLIDOS}')">✏️ Editar</button>
                        <button class="btn btn-borrar" onclick="borrarRegistro(${registro.IDALUMNO})">🗑️ Borrar</button>
                    </td>
                `;
                tbody.appendChild(fila);
            });
        });
}

function editarRegistro(id, NOMBRE, APELLIDOS) {
    document.getElementById("modalTitulo").textContent = "Editar Registro";
    document.getElementById("IDALUMNO").value = id;
    document.getElementById("NOMBRE").value = NOMBRE;
    document.getElementById("APELLIDOS").value = APELLIDOS;
    document.getElementById("modal").style.display = "block";
}

function borrarRegistro(id) {
    if (confirm("¿Estás seguro de que quieres borrar este registro?")) {
        const formData = new FormData();
        formData.append("operacion", "borrar");
        formData.append("IDALUMNO", id);

        fetch("api.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    cargarRegistros();
                }
            });
    }
}

function cerrarModal() {
    document.getElementById("modal").style.display = "none";
    document.getElementById("formulario").reset();
}

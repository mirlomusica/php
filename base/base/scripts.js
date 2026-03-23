document.addEventListener('DOMContentLoaded', function() {
    cargarRegistros();
    
    document.getElementById('btnInsertar').addEventListener('click', function() {
        document.getElementById('modalTitulo').textContent = 'Nuevo Registro';
        document.getElementById('campo1').value = '';
        document.getElementById('campo2').value = '';
        document.getElementById('campo3').value = '';
        document.getElementById('modal').style.display = 'block';
    });
    
    document.getElementById('formulario').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const campo1 = document.getElementById('campo1').value;
        const campo2 = document.getElementById('campo2').value;
        const campo3 = document.getElementById('campo3').value;
        
        const formData = new FormData();
        
        if (campo1) {
            formData.append('operacion', 'actualizar'); //permite añadir elemento a elemento de las cajas
            formData.append('campo2', campo2);
            formData.append('campo3', campo3);
        } else {
            formData.append('operacion', 'insertar');
            formData.append('campo2', campo2);
            formData.append('campo3', campo3);
        }
        
        fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                cerrarModal();//oculta o invisibiliza y además vacía
                cargarRegistros();
                document.getElementById('formulario').reset();
            }
        });
    });
});

function cargarRegistros() {
    fetch('api.php?operacion=obtener')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('cuerpoTabla');
            tbody.innerHTML = '';
            
            data.forEach(registro => {
                const fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${registro.campo1}</td>
                    <td>${registro.campo2}</td>
                    <td>${registro.campo3}</td>
                    <td>
                        <button class="btn btn-editar" onclick="editarRegistro(${registro.campo1}, '${registro.campo2}', '${registro.campo3}')">✏️ Editar</button>
                        <button class="btn btn-borrar" onclick="borrarRegistro(${registro.campo1})">🗑️ Borrar</button>
                    </td>
                `;
                tbody.appendChild(fila);
            });
        });
}

function editarRegistro(id, campo2, campo3) {
    document.getElementById('modalTitulo').textContent = 'Editar Registro';
    document.getElementById('campo1').value = id;
    document.getElementById('campo2').value = campo2;
    document.getElementById('campo3').value = campo3;
    document.getElementById('modal').style.display = 'block';
}

function borrarRegistro(id) {
    if (confirm('¿Estás seguro de que quieres borrar este registro?')) {
        const formData = new FormData();
        formData.append('operacion', 'borrar');
        formData.append('campo1', id);
        
        fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                cargarRegistros();
            }
        });
    }
}

function cerrarModal() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('formulario').reset();
}
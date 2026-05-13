let form = document.getElementById("finder");


function formCrud(book) {

    let crud = document.createElement("div");
    crud.className = "crudElement";
    let title = document.createElement("h2");
    title.innerHTML = book.titol;
    crud.appendChild(title);
    let form = document.createElement("form");
    form.className = "bookForm"
    crud.appendChild(form);

    let msgDisplay = document.createElement("div");
    crud.appendChild(msgDisplay);

    let id_llibre = document.createElement("input");
    id_llibre.name = "id_llibre";
    id_llibre.type = "hidden";
    id_llibre.value = book.id_llibre
    form.appendChild(id_llibre);

    let titol = document.createElement("input");
    let titolLabel = document.createElement("label");
    titolLabel.innerHTML = "titol:";
    titol.name = "titol";
    titol.type = "text";
    titol.value = book.titol
    form.appendChild(titolLabel);
    form.appendChild(titol);

    let autor = document.createElement("input");
    let autorLabel = document.createElement("label");
    autorLabel.innerHTML = "autor:";
    autor.name = "autor";
    autor.type = "text";
    autor.value = book.autor
    form.appendChild(autorLabel);
    form.appendChild(autor);

    let tema = document.createElement("input");
    let temaLabel = document.createElement("label");
    temaLabel.innerHTML = "tema:";
    tema.type = "text";
    tema.name = "tema";
    tema.value = book.tema
    form.appendChild(temaLabel);
    form.appendChild(tema);

    let any_publicacio = document.createElement("input");
    let any_publicacioLabel = document.createElement("label");
    any_publicacioLabel.innerHTML = "any_publicacio:";
    any_publicacio.type = "text";
    any_publicacio.name = "any_publicacio";
    any_publicacio.value = book.any_publicacio
    form.appendChild(any_publicacioLabel);
    form.appendChild(any_publicacio);

    let preu = document.createElement("input");
    let preuLabel = document.createElement("label");
    preuLabel.innerHTML = "preu:";
    preu.type = "text";
    preu.name = "preu";
    preu.value = book.preu
    form.appendChild(preuLabel);
    form.appendChild(preu);



    // update
    let update = document.createElement("input");
    update.type = "submit";
    update.value = "Update";
    update.name = "action";
    form.appendChild(update);


    // delete
    let deleteButton = document.createElement("input");
    deleteButton.type = "submit";
    deleteButton.name = "action";
    deleteButton.value = "Delete";
    form.appendChild(deleteButton);

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        fetch("../controller/BookCrudController.php", {
            body: new FormData(form, e.submitter),
            method: "POST"
        }).then(resp => resp.text())
            .then(msg => {
                msgDisplay.innerHTML = msg
            })
    })
    return crud
}

let fieldSelect = document.getElementById("fieldSelect");
let extraFieldButton = document.getElementById("extraFieldButton");
let fieldCount = 1;

// fieldSelect.addEventListener("click", () => {
//     if (fieldSelect.value = "temes") {
//         extraFieldButton.hidden = true;
//
//     }
// })

// extraFieldButton.addEventListener("click", () => {
//     fieldCount++;
//     let fields = document.getElementById("fields");
//     fields.innerHTML += `
//             <label for="value${fieldCount}">Valor${fieldCount}</label>
//             <input type="text" name="value{fieldCount}" value="">
// `;
// })

let crudContainer = document.getElementById("crudContainer");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    fetch("../controller/BookFinderController.php", {
        body: new FormData(form),
        method: "POST"
    })
        .then(resp => resp.json())
        .then(data => {
            console.log(data)

            crudContainer.innerHTML = "";

            if (data.error) {
                crudContainer.innerHTML = data.error;
                return;
            }

            data.forEach(book => {
                crud = formCrud(book);
                crudContainer.appendChild(crud);


            });
        })

})



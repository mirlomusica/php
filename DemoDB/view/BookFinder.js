let form = document.getElementById("form");


function formCrud(book) {
    let crud = document.createElement("div");
    let form = document.createElement("form");

    let id_llibre = document.createElement("input");
    let id_llibreLabel = document.createElement("label");
    id_llibreLabel.innerHTML = "id_llibre";
    id_llibre.type = "text";
    id_llibre.value = book.id_llibre
    form.appendChild(id_llibreLabel);
    form.appendChild(id_llibre);

    let titol = document.createElement("input");
    let titolLabel = document.createElement("label");
    titolLabel.innerHTML = "titol";
    titol.type = "text";
    titol.value = book.titol
    form.appendChild(titolLabel);
    form.appendChild(titol);

    let autor = document.createElement("input");
    let autorLabel = document.createElement("label");
    autorLabel.innerHTML = "autor";
    autor.type = "text";
    autor.value = book.autor
    form.appendChild(autorLabel);
    form.appendChild(autor);

    let tema = document.createElement("input");
    let temaLabel = document.createElement("label");
    temaLabel.innerHTML = "tema";
    tema.type = "text";
    tema.value = book.tema
    form.appendChild(temaLabel);
    form.appendChild(tema);

    let any_publicacio = document.createElement("input");
    let any_publicacioLabel = document.createElement("label");
    any_publicacioLabel.innerHTML = "any_publicacio";
    any_publicacio.type = "text";
    any_publicacio.value = book.any_publicacio
    form.appendChild(any_publicacioLabel);
    form.appendChild(any_publicacio);

    let preu = document.createElement("input");
    let preuLabel = document.createElement("label");
    preuLabel.innerHTML = "preu";
    preu.type = "text";
    preu.value = book.preu
    form.appendChild(preuLabel);
    form.appendChild(preu);



    submit = document.createElement("input");
    submit.type = "submit";
    form.appendChild(submit);

    crud.appendChild(form);
    return crud
}

form.addEventListener("submit", (e) => {
    e.preventDefault();
    fetch("../controller/BookFinderController.php", {
        body: new FormData(form),
        method: "POST"
    })
        .then(resp => resp.json())
        .then(data => {
            console.log(data);
            data.forEach(book => {
                crud = formCrud(book);
                document.body.appendChild(crud);


            });
        })

})



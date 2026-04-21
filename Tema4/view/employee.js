const form = document.getElementById("form");
const msg = document.getElementById("msg");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    fetch("../controller/employeeController.php", {
        body : new FormData(form),
        method: "POST"
    })
        .then(resp => resp.text())
        .then(data=>{
          msg.innerHTML = data;
        });
})

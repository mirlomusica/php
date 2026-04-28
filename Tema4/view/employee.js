const form = document.getElementById("form");
const msg = document.getElementById("msg");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    fetch("../controller/employeeController.php", {
        body : new FormData(form),
        method: "POST"
    })
        .then(resp => resp.json())
        .then(data=>{
            if(data.status == "error"){
                msg.style.color = "red";
            }else{
                msg.style.color = "black";
            }
          msg.innerHTML = data.msg;
        });
})

let ownername = document.getElementById("ownerName");
let form = document.getElementById("formulary")
let phone = document.getElementById("phone")
form.addEventListener("submit", (e) => {
    if (parseInt(phone.value) === NaN){
        e.preventDefault();
        let alert = document.createElement("p")
        alert.innerText = "Acesso denegado. Inicie sesion por favor."
        alert.setAttribute("class", "alert alert-danger")
        form.appendChild(alert);
    }
})

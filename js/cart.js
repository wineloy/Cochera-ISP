let cerrarSesion = document.querySelector('#CerrarSesion');

cerrarSesion.addEventListener("click", (e)=>{
    e.preventDefault();
    fetch("./include/endSession.php")
    .then(request => request.text())
    .then(data => {
        window.location.href = './login.php'
        return console.log(data)
    });

});
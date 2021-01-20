// formularios de HTML
let createUserForm = document.querySelector('#createUserForm');
let loginUserForm = document.querySelector('#loginUserForm');

createUserForm.addEventListener('submit', (e) => {
    e.preventDefault();

    let data = new FormData(createUserForm);


    fetch('./include/Usuarios.php', {
        method: 'POST',
        body: data
    })
    .then(request => {
        if (request.ok) {
            return request.text()
        }else
             throw("Error en la peticion "+request.statusText);
    })
    .then(data => console.log(data))
    .catch(error => console.log("error en la peticion " + error));

createUserForm.reset();
});

loginUserForm.addEventListener('submit', (e) => {
    e.preventDefault();

    let data = new FormData(loginUserForm);

    fetch('./include/ValidarUsuario.php', {
        method: 'POST',
        body: data
    })
    .then(request => {
        if (request.ok) {
            return request.text()
        }else
             throw("Error en la peticion "+request.statusText);
    })
    .then(data => {
       let numero = Number.parseInt(data,10);
        switch (numero) {
            case 1:
                window.location.href = './carrito.php'
                break;
            case -1:
                alert("No existe el correo");
                break;
            case -2:
                alert("usuario incorrecto");
                break;
        
            default:
                break;
        }
    })
    .catch(error => console.log("error en la peticion " + error));
    loginUserForm.reset();
});



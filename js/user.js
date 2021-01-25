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
    .then(data =>{
        let numero = Number.parseInt(data,10);
        switch (numero) {
            case 1:
                setTimeout( () => {
                    window.location.href = './carrito.php';
                },3500);
                Swal.fire(
                    'Usuario registrado correctamente!',
                    'Continua con tu proceso de compra',
                    'success'
                  );
                break;
            case -1:
                Swal.fire(
                    'Verica los datos',
                    'Este correo esta asociado a un usuario por favor de inicie sesión',
                    'warning'
                  );
                break;
            default:
                setTimeout(()=>{
                    location.reload();
                },3000)
                Swal.fire(
                    'Ups algo ha ocurrido',
                    'Tenemos inconvenientes para procesar su solicitud, intente mas tarde',
                    'question'
                  );
                break;
        }
    })
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
                Swal.fire(
                    'No existe este usuario',
                    'Este correo no se encuentra registrado, por favor registrate primero',
                    'warning'
                  );
                break;
            case -2:
                Swal.fire(
                    'Error en tus credenciales',
                    'Verica que estes ingresando la información correcta',
                    'error'
                  );
                break;
        
            default:
                setTimeout(()=>{
                    location.reload();
                },3000)
                Swal.fire(
                    'Ups algo ha ocurrido',
                    'Tenemos inconvenientes para procesar su solicitud, intente mas tarde',
                    'question'
                  );
                //location.reload();
                break;
        }
    })
    .catch(error => console.log("error en la peticion " + error));
    loginUserForm.reset();
});

// mascara telefono 
document.getElementById('telefono').addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
  });



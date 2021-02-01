let loginGoogle = document.querySelector("#loginGoogle");

loginGoogle.addEventListener("click", e => {
    e.preventDefault();
    let provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth()

        .signInWithPopup(provider)
        .then((result) => {
            //En caso 
            let nombre = result.user.displayName;
            let telefono = result.user.phoneNumber;
            let email = result.user.email;

            let formulario = new FormData();
            formulario.append("nombre",nombre);
            formulario.append("telefono",telefono);
            formulario.append("email",email);

            fetch("./include/fslogin.php", {
                method: "POST",
                body: formulario
            })
            .then(request => {
                if(request.ok){

                    return request.text();

                }else
     
                throw "Error en la solicitud";
            })
            .then (data => {
                
                window.location = "./carrito.php";
            })


            })
            .catch(error => {
              console.error(error);
              Swal.fire(
                'Error en tus credenciales',
                'Verica que estes ingresando la información correcta',
                'error'
              );
            });
})
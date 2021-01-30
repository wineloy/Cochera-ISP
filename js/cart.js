// pintado de formulario 
let formulario = document.querySelector("#datosCarrito");
let btnAgregar = document.querySelector("#btnAgregar");
let adicionalTitulo = document.querySelector("#titulo");
let adicionalPaquete = document.querySelector("#adicionalPaquete");
let adicionalPrecio = document.querySelector("#adicionalPrecio");
let adicional = document.querySelector("#adicional");
let btnSiguiente = document.querySelector("#btnSiguiente");
let datos = localStorage;
let json;

//copia del DOM paquete

//carga de datos formulario
document.addEventListener("DOMContentLoaded", async e =>{

  fetch("/include/carritoPaquetes.php",{
    method: "GET"
  })
  .then(request => {

      if(request.ok)
        return request.json();
      else
        throw("Error en la petición");
  })
  .then(data =>{
    almacenamiento(data);
  });

});

async function almacenamiento(data){
  json = await data;
  //consulta de datos
}


btnAgregar.addEventListener("click", (e) => {
    e.preventDefault();

    if(adicional.style.display == "block") {
      Swal.fire(
        'No es posible realizar esta acción',
        'Por el momento solo se pueden solicitar 2 instalaciones por cliente',
        'warning'
    );
    
    console.log("Este es el secundario"+PaqueteSecundario.value);
    }else {
      adicional.style.display="block";
      
    }
  
});

function getPrecioPaqueteUno(){
  var x = document.getElementById("PaqueteInicial").value;
  var precio1 = document.getElementById("Precio1");
  for(let filas= 0; filas < json.length; filas ++)
      if(x==json[filas][0]){
        precio1.value =json[filas][6];
        break;
      }else
      precio1.value="";
}

function getPrecioPaqueteDos() {
  var x = document.getElementById("PaqueteSecundario").value;
  var precio2 = document.getElementById("Precio2");
  for(let filas= 0; filas < json.length; filas ++)
      if(x==json[filas][0]){
        precio2.value =json[filas][6];
        break;
      }
      else
      precio2.value="";
}


//Cerrado de sesión 
let cerrarSesion = document.querySelector('#CerrarSesion');
cerrarSesion.addEventListener("click", (e)=>{
    e.preventDefault();

    Swal.fire({
        title: '¿Esta seguro de querer cerrar sesión ?',
        text: "Puede continuar con este proceso iniciando sesión nuevamente",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI',
        cancelButtonText: 'NO',
      }).then((result) => {
        if (result.isConfirmed) {
          fetch("./include/endSession.php")
          .then(request => request.text())
          .then(data => {
              window.location.href = './login.php';
              return console.log(data);
          });
        }
      });
});

btnSiguiente.addEventListener("click", e => {
  e.preventDefault();
  let formularioEnviado = new FormData(formulario);

  fetch('./include/ProcesoCompra.php',{

    method : "POST",
    body : formularioEnviado
  })
  .then(request => {
      if(request.ok)
        return request.text();
      else
        throw("Error en la solicitud "+request.statusText);
  })
  .then(data => {
      console.log(data)
    })
  .catch(error => console.log("error en la peticion " + error));
});






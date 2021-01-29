// pintado de formulario 
let formulario = document.querySelector("#datosCarrito");
let btnAgregar = document.querySelector("#btnAgregar");
let adicionalTitulo = document.querySelector("#titulo");
let adicionalPaquete = document.querySelector("#adicionalPaquete");
let adicionalPrecio = document.querySelector("#adicionalPrecio");
//copia del DOM paquete
let copiado = document.querySelector("#paquete");
copiado.setAttribute("name","paquete2");

//carga de datos formulario
document.addEventListener("DOMContentLoaded", e =>{

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
  console.log(data);
  //consulta de datos 
let btnSiguiente = document.querySelector("#btnSiguiente");

btnSiguiente.addEventListener("click", e =>{
  e.preventDefault();

  let precio1 = document.getElementById("Precio1"); 
  var precio2 = document.getElementById("Precio2");


  if(precio2 != null){
    precio1.value;
    precio2.value;
  }
  /* let data = new FormData(formulario);
  data.forEach(element => {
    console.log(element);
  }) */
})
}


btnAgregar.addEventListener("click", (e) => {
    e.preventDefault();
    adicionalTitulo.setAttribute("class", "col-12");
    adicionalPaquete.setAttribute("class", "form-group col-sm-12 col-md-6");
    adicionalPrecio.setAttribute("class", "form-group col-sm-12 col-md-6");
    let contador = 1;
    let titulo = ` <p class=" my-2 text-center spacing">Segunda instalacion</p>`;
    let paquete = copiado.innerHTML;
    let precio = ` <input id="Precio2" type="text" class="form-control" readonly placeholder="Precio">`;
    if (adicionalTitulo.textContent === "") {
        adicionalTitulo.innerHTML += titulo;
        adicionalPaquete.innerHTML += paquete;
        adicionalPrecio.innerHTML += precio;
        contador++;
    }
    else{
        Swal.fire(
            'No es posible realizar esta acción',
            'Por el momento solo se pueden solicitar 2 instalaciones por cliente',
            'warning'
          );
    }
});

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






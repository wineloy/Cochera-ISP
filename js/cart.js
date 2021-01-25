// pintado de formulario 
let btnAgregar = document.querySelector("#btnAgregar");
let adicionalTitulo = document.querySelector("#titulo");
let adicionalPaquete = document.querySelector("#adicionalPaquete");
let adicionalPrecio = document.querySelector("#adicionalPrecio");

btnAgregar.addEventListener("click", (e) => {
    e.preventDefault();
    adicionalTitulo.setAttribute("class", "col-12");
    adicionalPaquete.setAttribute("class", "form-group col-sm-12 col-md-6");
    adicionalPrecio.setAttribute("class", "form-group col-sm-12 col-md-6");
    let contador = 1;
    let titulo = ` <p class=" my-2 text-center spacing">Segunda instalacion</p>`;
    let paquete = `
    <select name="paquete2" class="form-control" id="exampleFormControlSelect1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
  </select>`;
    let precio = ` <input type="text" class="form-control" disabled placeholder="Precio">`;
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
    let PaqueteSeleccionado1 = document.querySelector("#PaqueteSeleccionado1");

console.log(PaqueteSeleccionado1.value + "Este paquete")

    let datosCarrito = document.querySelector('#datosCarrito');

    let formCarrito = new FormData(datosCarrito);
    formCarrito.forEach(element => {
        console.log(element);
    });
});

/* let cerrarSesion = document.querySelector('#CerrarSesion');

cerrarSesion.addEventListener("click", (e)=>{
    e.preventDefault();
    fetch("./include/endSession.php")
    .then(request => request.text())
    .then(data => {
        window.location.href = './login.php'
        return console.log(data)
    });

}); */




let compra = document.querySelector("#Exito");

compra.addEventListener("click",e => {
    e.preventDefault();

    Swal.fire(
        'Compra Exitosa',
        'Espera a que lleguemos a tu domicilio Cochera Wisp',
        'success'
      );

      setTimeout(() => 
      { 
        window.location = "./index.php"; 
      }, 3000);

});


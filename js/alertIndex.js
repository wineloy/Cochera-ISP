document.addEventListener("DOMContentLoaded", function(event) {
    if (!localStorage.returning) {
        // run only if returning not stored in localStorage
        Swal.fire(
            'Posibles demoras de instalación',
            'Debido a la contigencia actual es probable que su instalación se demore ',
            'info'
        );
        localStorage.returning = true; // set returning
    }  
    
});
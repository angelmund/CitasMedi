
$('#btnsave').click(function(event) {
    event.preventDefault();
    if (validaformulario()) { // Verifica si el formulario es válido
        confirSave("¿Los datos capturados, son correctos?", function () {
            saveSemestre();
        });
    }else{
        alertWarning('Faltan datos por capturar','Alerta');
    }
});

async function saveSemestre() {
    const url = $('#url').val();
    try {
        const formData = new FormData($('#form-createsemestre')[0]);
        // console.log(formData);

        const response = await fetch(url + '/Semestres/store', {
            method: 'POST',
            mode: 'cors',
            redirect: 'manual',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: formData
        });

        const data = await response.json();
        switch (data.idnotificacion) {
            case 1:
                
                Swal.fire({
                    title: data.mensaje,
                    icon: "success",
                    showConfirmButton: false,  // No mostrar el botón "Ok"
                    timer: 1000,  // Cerrar automáticamente después de 1500 milisegundos (1.5 segundos)
                    timerProgressBar: true  // Mostrar una barra de progreso durante el temporizador
                });
                // Esperar un breve período de tiempo antes de recargar la página
                setTimeout(function () {
                    document.getElementById('form-createsemestre').reset();
                    window.location.reload();
                }, 1000); // Espera 1 segundo

                break;

            case 2:
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: data.mensaje
                });
                break;

            case 3:
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: data.mensaje
                });
                break;

            default:
                Swal.fire({
                    icon: "info",
                    title: "Info...",
                    text: "Error desconocido"
                });
        }

    } catch (error) {
        console.error("Error al procesar la solicitud:", error);
    }
}


$('#btnupdate').click(function(event) {
    event.preventDefault();

    if (validaformulario()) { // Verifica si el formulario es válido
        confirSave("¿Los datos capturados, son correctos?", function () {
            semestreUpdate();
        });
    }else{
        alertWarning('Faltan datos por capturar','Alerta');
    }
});

async function semestreUpdate() {
    const url = $('#url').val();
    const idSemestre = $('#idSemestre').val();
    try {
        const formData = new FormData($('#form-editsemestre')[0]);

        const response = await fetch(url + '/Semestres/update/' + idSemestre, {
            method: 'POST',
            mode: 'cors',
            redirect: 'manual',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: formData
        });

        const data = await response.json();
        switch (data.idnotificacion) {
            case 1:
                
                Swal.fire({
                    title: data.mensaje,
                    icon: "success",
                    showConfirmButton: false,  // No mostrar el botón "Ok"
                    timer: 1000,  // Cerrar automáticamente después de 1500 milisegundos (1.5 segundos)
                    timerProgressBar: true  // Mostrar una barra de progreso durante el temporizador
                });
                // Esperar un breve período de tiempo antes de recargar la página
                setTimeout(function () {
                    document.getElementById('form-editsemestre').reset();
                    window.location.reload();
                }, 1000); // Espera 1 segundo

                break;

            case 2:
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: data.mensaje
                });
                break;

            case 3:
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: data.mensaje
                });
                break;

            default:
                Swal.fire({
                    icon: "info",
                    title: "Info...",
                    text: "Error desconocido"
                });
        }

    } catch (error) {
        console.error("Error al procesar la solicitud:", error);
    }
}

//

$('.eliminarSemestre').click(function(event) {
    event.preventDefault();
    // Obtener el idSemestre del botón que ha sido clicado
    var idSemestre = $(this).data('id');
    confirSave("¿Está seguro de eliminar el semestre?", function () {
        semestreDelete(idSemestre);
    });
});

async function semestreDelete(idSemestre) {
    const url = $('#url').val();
    try {
        const response = await fetch(url + '/Semestres/destroy/' + idSemestre, {
            method: 'POST',
            mode: 'cors',
            redirect: 'manual',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const data = await response.json();
        switch (data.idnotificacion) {
            case 1:
                Swal.fire({
                    title: data.mensaje,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true
                });
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
                break;

            case 2:
            case 3:
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: data.mensaje
                });
                break;

            default:
                Swal.fire({
                    icon: "info",
                    title: "Info...",
                    text: "Error desconocido"
                });
        }

    } catch (error) {
        console.error("Error al procesar la solicitud:", error);
    }
}


$('.activarSemestre').click(function(event) {
    event.preventDefault();
    // Obtener el idSemestre del botón que ha sido clicado
    var idSemestre = $(this).data('id');
    // console.log(idSemestre);
    confirSave("¿Está seguro que quiere activar el semestre?", function () {
        semestreActivate(idSemestre);
    });
});

async function semestreActivate(idSemestre) {
    const url = $('#url').val();
    try {
        const response = await fetch(url + '/Semestres/activar/' + idSemestre, {
            method: 'POST',
            mode: 'cors',
            redirect: 'manual',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const data = await response.json();
        switch (data.idnotificacion) {
            case 1:
                Swal.fire({
                    title: data.mensaje,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true
                });
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
                break;

            case 2:
            case 3:
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: data.mensaje
                });
                break;

            default:
                Swal.fire({
                    icon: "info",
                    title: "Info...",
                    text: "Error desconocido"
                });
        }

    } catch (error) {
        console.error("Error al procesar la solicitud:", error);
    }
}



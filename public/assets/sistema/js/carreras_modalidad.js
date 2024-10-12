
$('#btnsave').click(function(event) {
    event.preventDefault();
    if (validaformulario()) { // Verifica si el formulario es válido
        confirSave("¿Los datos capturados, son correctos?", function () {
            saveLicenciatura();
        });
    }else{
        alertWarning('Faltan datos por capturar','Alerta');
    }
});

async function saveLicenciatura() {
    const url = $('#url').val();
    try {
        const formData = new FormData($('#form-createcarrera')[0]);

        const response = await fetch(url + '/Carreras/store', {
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
                    document.getElementById('form-createcarrera').reset();
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
            LicenciaturaUpdate();
        });
    }else{
        alertWarning('Faltan datos por capturar','Alerta');
    }
});

async function LicenciaturaUpdate() {
    const url = $('#url').val();
    const idCarrera = $('#idCarrera').val();
    try {
        const formData = new FormData($('#form-editcarrera')[0]);
        // console.log(formData);

        const response = await fetch(url + '/Carreras/update/' + idCarrera, {
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
                    document.getElementById('form-editcarrera').reset();
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

$('.eliminarCarerra').click(function(event) {
    event.preventDefault();
    // Obtener el idCarrera del botón que ha sido clicado
    var idCarrera = $(this).data('id');
    confirSave("¿Está seguro de eliminar la carrera?", function () {
        carreraDelete(idCarrera);
    });
});

async function carreraDelete(idCarrera) {
    const url = $('#url').val();
    try {
        const response = await fetch(url + '/Carreras/destroy/' + idCarrera, {
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


$('#activarCarrera').click(function(event) {
    event.preventDefault();
    // Obtener el idCarrera del botón que ha sido clicado
    var idCarrera = $(this).data('id');
    // console.log(idCarrera);
    confirSave("¿Está seguro que quiere activar la carrera?", function () {
        etapaActivate(idCarrera);
    });
});

async function etapaActivate(idCarrera) {
    const url = $('#url').val();
    try {
        const response = await fetch(url + '/Carreras/activar/' + idCarrera, {
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



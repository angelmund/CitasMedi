// Guardar un nuevo servicio
$('#btnsave').click(function(event) {
    event.preventDefault();
    if (validaformulario()) { // Verifica si el formulario es válido
        confirSave("¿Los datos capturados son correctos?", function () {
            saveEspecialidad();
        });
    } else {
        alertWarning('Faltan datos por capturar', 'Alerta');
    }
});


async function saveEspecialidad() {
    const url = $('#url').val();
    try {
        const formData = new FormData($('#createEspecialidadForm')[0]);
        const response = await fetch(url + '/Especialidades/store', {
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
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true
                });
                setTimeout(function () {
                    document.getElementById('createEspecialidadForm').reset();
                    window.location.reload();
                }, 1000);
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
                    icon: "info",
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

// Actualizar un servicio existente
$('#btnupdate').click(function(event) {
    event.preventDefault();

    if (validaformulario()) { // Verifica si el formulario es válido
        confirSave("¿Los datos capturados son correctos?", function () {
            updateServicio();
        });
    } else {
        alertWarning('Faltan datos por capturar', 'Alerta');
    }
});

async function updateServicio() {
    const url = $('#url').val();
    const idEspecialidad = $('#id').val();
    try {
        const formData = new FormData($('#editEspecialidadForm')[0]);
        const response = await fetch(url + '/Especialidades/update/' + idEspecialidad, {
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
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true
                });
                setTimeout(function () {
                    document.getElementById('editEspecialidadForm').reset();
                    window.location.reload();
                }, 1000);
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
                    icon: "info",
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

// Eliminar un servicio
$('.desactivar').click(function(event) {
    event.preventDefault();
    var idEspecialidad = $(this).data('id');
    confirSave("¿Está seguro de desactiva la especialidad?", function () {
        deleteEspecialidad(idEspecialidad);
    });
});

async function deleteEspecialidad(idEspecialidad) {
    const url = $('#url').val();
    const ruta = window.location;
    try {
        const response = await fetch(ruta + '/Especialidades/eliminar/' + idEspecialidad, {
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

// Activar un servicio (si es necesario)
$('.activarServicio').click(function(event) {
    event.preventDefault();
    var idEspecialidad = $(this).data('id');
    confirSave("¿Está seguro que quiere activar el servicio?", function () {
        activateServicio(idEspecialidad);
    });
});

async function activateServicio(idEspecialidad) {
    const url = $('#url').val();
    try {
        const response = await fetch(url + '/Servicios/activar/' + idEspecialidad, {
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
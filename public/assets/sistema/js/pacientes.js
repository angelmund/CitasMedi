// Guardar un nuevo paciente
$('#btnsave').click(function(event) {
    event.preventDefault();
    if (validaformulario()) { // Verifica si el formulario es válido
        confirSave("¿Los datos capturados son correctos?", function () {
            savePaciente();
        });
    } else {
        alertWarning('Faltan datos por capturar', 'Alerta');
    }
});

async function savePaciente() {
    const url = $('#url').val();
    try {
        const formData = new FormData($('#createPacienteForm')[0]);
        const response = await fetch(url + '/Pacientes/store', {
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
                    document.getElementById('createPacienteForm').reset();
                    window.location.reload();
                }, 1000);
                break;

            case 2:
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: data.mensaje + " " + data.error   
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

// Actualizar un paciente existente
$('#btnupdate').click(function(event) {
    event.preventDefault();

    if (validaformulario()) { // Verifica si el formulario es válido
        confirSave("¿Los datos capturados son correctos?", function () {
            updatePaciente();
        });
    } else {
        alertWarning('Faltan datos por capturar', 'Alerta');
    }
});

async function updatePaciente() {
    const url = $('#url').val();
    const idPaciente = $('#id').val();
    try {
        const formData = new FormData($('#editPacienteForm')[0]);
        const response = await fetch(url + '/Pacientes/update/' + idPaciente, {
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
                    document.getElementById('editPacienteForm').reset();
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

// Eliminar un paciente
$('.eliminarpaciente').click(function(event) {
    event.preventDefault();
    var idPaciente = $(this).data('id');
    confirSave("¿Está seguro de eliminar el paciente?", function () {
        deletePaciente(idPaciente);
    });
});

async function deletePaciente(idPaciente) {
    const url = $('#url').val();
    const ruta = window.location;
    try {
        const response = await fetch(url + '/Pacientes/eliminar/' + idPaciente, {
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

// Activar un paciente (si es necesario)
$('.activarPaciente').click(function(event) {
    event.preventDefault();
    var idPaciente = $(this).data('id');
    confirSave("¿Está seguro que quiere activar el paciente?", function () {
        activatePaciente(idPaciente);
    });
});

async function activatePaciente(idPaciente) {
    const url = $('#url').val();
    try {
        const response = await fetch(url + '/Pacientes/activar/' + idPaciente, {
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

// Guardar un nuevo paciente
$("#btnsave").click(function (event) {
    event.preventDefault();
    if (validaformulario()) {
        // Verifica si el formulario es válido
        confirSave("¿Los datos capturados son correctos?", function () {
            savePaciente();
        });
    } else {
        alertWarning("Faltan datos por capturar", "Alerta");
    }
});

function savePaciente() {
    const url = $("#url").val();
    const formData = new FormData($("#createPacienteForm")[0]);
    fetch(url + "/Pacientes/store", {
        method: "POST",
        mode: "cors",
        redirect: "manual",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("idnotificacion:", data.idnotificacion);
            console.log("mensaje:", data.mensaje);
            switch (data.idnotificacion) {
                case 1:
                    Swal.fire({
                        title: data.mensaje,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    });
                    setTimeout(function () {
                        document.getElementById("createPacienteForm").reset();
                        window.location.reload();
                    }, 1000);
                    break;
                case 2:
                    alert(data.mensaje);
                    break;
                case 3:
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: data.mensaje,
                    });
                    break;

                default:
                    Swal.fire({
                        icon: "info",
                        title: "Info...",
                        text: "Error desconocido" + " " + data.error,
                    });
            }
        })
        .catch((error) => {
            console.error("Error al procesar la solicitud:", error);
        });
}

// Manejo de respuestas y errores
function handleResponse(response) {
    console.log("idnotificacion:", response.idnotificacion);
    console.log("mensaje:", response.mensaje);
    switch (response.idnotificacion) {
        case 1:
            Swal.fire({
                title: response.mensaje,
                icon: "success",
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
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
                text: response.mensaje,
            });
            break;

        default:
            Swal.fire({
                icon: "info",
                title: "Info...",
                text: "Error desconocido",
            });
    }
}

// Actualizar un paciente existente
$("#btnupdate").click(function (event) {
    event.preventDefault();

    if (validaformulario()) {
        // Verifica si el formulario es válido
        confirSave("¿Los datos capturados son correctos?", function () {
            updatePaciente();
        });
    } else {
        alertWarning("Faltan datos por capturar", "Alerta");
    }
});

function updatePaciente() {
    const url = $("#url").val();
    const idPaciente = $("#id").val();
    const formData = new FormData($("#editPacienteForm")[0]);
    fetch(url + "/Pacientes/update/" + idPaciente, {
        method: "POST",
        mode: "cors",
        redirect: "manual",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("idnotificacion:", data.idnotificacion);
            console.log("mensaje:", data.mensaje);
            switch (data.idnotificacion) {
                case 1:
                    Swal.fire({
                        title: data.mensaje,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                    });
                    setTimeout(function () {
                        document.getElementById("editPacienteForm").reset();
                        window.location.reload();
                    }, 1000);
                    break;

                case 2:
                case 3:
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: data.mensaje,
                    });
                    break;

                default:
                    Swal.fire({
                        icon: "info",
                        title: "Info...",
                        text: "Error desconocido",
                    });
            }
        })
        .catch((error) => {
            console.error("Error al procesar la solicitud:", error);
        });
}

// Eliminar un paciente
$(".eliminarpaciente").click(function (event) {
    event.preventDefault();
    var idPaciente = $(this).data("id");
    confirSave("¿Está seguro de eliminar el paciente?", function () {
        deletePaciente(idPaciente);
    });
});

function deletePaciente(idPaciente) {
    const url = $("#url").val();
    fetch(url + "/Pacientes/eliminar/" + idPaciente, {
        method: "POST",
        mode: "cors",
        redirect: "manual",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "Content-Type": "application/json",
        },
    })
        .then((response) => response.json())
        .then((data) => handleResponse(data))
        .catch((error) => {
            console.error("Error al procesar la solicitud:", error);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Error al procesar la solicitud",
            });
        });
}

// Actualizar un paciente
$("#form-update-paciente").on("submit", function (event) {
    event.preventDefault();
    var form = $(this);
    var idPaciente = form.data("id");
    var url = form.attr("action");

    fetch(url, {
        method: "POST",
        mode: "cors",
        redirect: "manual",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify(
            form.serializeArray().reduce((obj, item) => {
                obj[item.name] = item.value;
                return obj;
            }, {})
        ),
    })
        .then((response) => response.json())
        .then((data) => handleResponse(data))
        .catch((error) => {
            console.error("Error al procesar la solicitud:", error);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Error al procesar la solicitud",
            });
        });
});

// Activar un paciente (si es necesario)
$(".activarPaciente").click(function (event) {
    event.preventDefault();
    var idPaciente = $(this).data("id");
    confirSave("¿Está seguro que quiere activar el paciente?", function () {
        activatePaciente(idPaciente);
    });
});

function activatePaciente(idPaciente) {
    const url = $("#url").val();
    fetch(url + "/Pacientes/activar/" + idPaciente, {
        method: "POST",
        mode: "cors",
        redirect: "manual",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    })
        .then((response) => response.json())
        .then((data) => {
            console.log("idnotificacion:", data.idnotificacion);
            console.log("mensaje:", data.mensaje);
            switch (data.idnotificacion) {
                case 1:
                    Swal.fire({
                        title: data.mensaje,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
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
                        text: data.mensaje,
                    });
                    break;

                default:
                    Swal.fire({
                        icon: "info",
                        title: "Info...",
                        text: "Error desconocido",
                    });
            }
        })
        .catch((error) => {
            console.error("Error al procesar la solicitud:", error);
        });
}

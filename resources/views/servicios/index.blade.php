@extends('layouts.master')

@section('title', 'Servicios')

@section('content')

<style>
    .pickr .pcr-button {
  
    height: 80%;
    width: 80%;
    }
</style>

<div class="card">
    <div class="card-header">
        <!-- Button trigger modal -->
    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#createModal"
    data-remote="{{route('Servicios.create')}}">
      <i class="fas fa-plus"></i> Agregar Servicio
    </button>

  
        {{--  <div class="dropdown d-flex justify-content-end">
            <button class="btn bg-gradient-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              Exportar
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="javascript:;" id="exportExcel"><i class="fas fa-file-excel me-50 font-small-4 text-success"></i> Excel</a></li>
                <li><a class="dropdown-item" href="javascript:;" id="exportPdf"><i class="fas fa-file-pdf me-50 font-small-4 text-danger"></i> PDF</a></li>
            </ul>
        </div>  --}}
        
    </div>
    <div class="card-body">
        <table class="table table-striped datables-servicios">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Color</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->nombre }}</td>
                    <td>{{ $servicio->descripcion }}</td>
                    <td>${{ $servicio->precio }}</td>
                    <td style="width: 50px;">
                        <span style="display: inline-block; width: 25px; height: 25px; border-radius: 50%; background-color: {{ $servicio->color }};"></span>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                              
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" 
                                       href="javascript:;" 
                                       data-bs-toggle="modal" 
                                       data-bs-target="#editModal" 
                                       data-remote="{{ route('Servicios.edit', $servicio->id) }}">
                                        <i class="fas fa-edit me-50 font-small-4 text-warning"></i> Editar
                                    </a>
                                </li>
                                
                                <li><a class="dropdown-item" href="javascript:;"><i class="fas fa-trash-alt me-50 font-small-4 text-danger"></i> Eliminar</a></li>
                            </ul>
                          </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function() {
            var servicios = $('.datables-servicios');
            var dt = servicios.DataTable({
                language: {
                    sProcessing: 'Procesando...',
                    sLengthMenu: 'Mostrar _MENU_ registros',
                    sZeroRecords: 'No se encontraron resultados',
                    sEmptyTable: 'Ningún dato disponible en esta tabla',
                    sInfo: 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                    sInfoEmpty: 'Mostrando registros del 0 al 0 de un total de 0 registros',
                    sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
                    sInfoPostFix: '',
                    sSearch: 'Busca:',
                    sUrl: '',
                    sInfoThousands: ',',
                    sLoadingRecords: 'Cargando...',
                    oPaginate: {
                        sFirst: 'Primero',
                        sLast: 'Último',
                        sNext: 'Siguiente',
                        sPrevious: 'Anterior'
                    },
                    oAria: {
                        sSortAscending: ': Activar para ordenar la columna de manera ascendente',
                        sSortDescending: ': Activar para ordenar la columna de manera descendente'
                    },
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
                sProcessing: true,
                responsive: true,
                order: [[0, 'desc']], // Ordenar por la primera columna de forma descendente
                dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-1 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-1 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel me-50 font-small-4"></i>Exportar a Excel',
                        className: 'd-none',
                        attr: {
                            id: 'btnExcel'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf me-50 font-small-4"></i>Exportar a PDF',
                        className: 'd-none',
                        attr: {
                            id: 'btnPdf'
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print me-50 font-small-4"></i>Imprimir',
                        className: 'd-none',
                        attr: {
                            id: 'btnPrint'
                        }
                    },
                    {
                        extend: 'copy',
                        text: '<i class="fas fa-copy me-50 font-small-4"></i>Copiar',
                        className: 'd-none',
                        attr: {
                            id: 'btnCopy'
                        }
                    }
                ]
            });
            {{--  $('div.head-label').html('<h4 class="mb-0">Servicios Registrados</h4>');  --}}
            dt.columns.adjust().draw();
                 
        });

</script>
<script>
// Guardar un nuevo servicio
$('#btnsave').click(function(event) {
    event.preventDefault();
    if (validaformulario()) { // Verifica si el formulario es válido
        confirSave("¿Los datos capturados son correctos?", function () {
            saveServicio();
        });
    } else {
        alertWarning('Faltan datos por capturar', 'Alerta');
    }
});

async function saveServicio() {
    const url = $('#url').val();
    try {
        const formData = new FormData($('#form-create')[0]);
        const response = await fetch(url + '/Servicios/store', {
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
                    document.getElementById('form-create').reset();
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
    const idServicio = $('#idServicio').val(); // Asegúrate de tener un input oculto con este ID
    try {
        const formData = new FormData($('#form-edit')[0]);
        const response = await fetch(url + '/Servicios/update/' + idServicio, {
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
                    document.getElementById('form-edit').reset();
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

// Eliminar un servicio
$('.eliminarServicio').click(function(event) {
    event.preventDefault();
    var idServicio = $(this).data('id');
    confirSave("¿Está seguro de eliminar el servicio?", function () {
        deleteServicio(idServicio);
    });
});

async function deleteServicio(idServicio) {
    const url = $('#url').val();
    try {
        const response = await fetch(url + '/Servicios/destroy/' + idServicio, {
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

// Activar un servicio (si es necesario)
$('.activarServicio').click(function(event) {
    event.preventDefault();
    var idServicio = $(this).data('id');
    confirSave("¿Está seguro que quiere activar el servicio?", function () {
        activateServicio(idServicio);
    });
});

async function activateServicio(idServicio) {
    const url = $('#url').val();
    try {
        const response = await fetch(url + '/Servicios/activar/' + idServicio, {
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
</script>

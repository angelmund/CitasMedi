@extends('layouts.master')

@section('title', 'Pacientes')

@section('content')

<style>
    .pickr .pcr-button {
        height: 80%;
        width: 80%;
    }
</style>

<div class="card">
    <input type="hidden" value="{{ url('/') }}" id="url">
    <div class="card-header">
        <!-- Button trigger modal -->
        <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal"
            data-bs-target="#createModal" data-remote="{{route('Pacientes.create')}}">
            <i class="fas fa-plus"></i> Agregar Paciente
        </button>
    </div>
    <div class="card-body">
        <table class="table table-striped datables-pacientes">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    {{--  <th>Expediente</th>  --}}
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->nombre }} {{$paciente->apellido_paterno}} {{$paciente->apellido_materno}} </td>
                    <td>{{ $paciente->telefono }}</td>
                    <td>
                        @if ($paciente->activo == 1)
                        <span class="badge bg-success">Activo</span>
                        @else
                        <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn bg-gradient-primary dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#editModal"
                                        data-remote="{{ route('Pacientes.edit', $paciente->id) }}">
                                        <i class="fas fa-edit me-50 font-small-4 text-warning"></i> Editar
                                    </a>
                                </li>
                                <li>
                                    @if ($paciente->activo == 1)
                                    <a class="dropdown-item desactivar" href="javascript:;" id="desactivar"
                                        data-id="{{$paciente->id}}">
                                        <i class="fas fa-trash-alt me-50 font-small-4 text-danger"></i> Desactivar
                                    </a>
                                    @else
                                    <a class="dropdown-item activar" href="javascript:;" id="activar"
                                        data-id="{{$paciente->id}}">
                                        <i class="fas fa-check me-50 font-small-4 text-success"></i> Activar
                                    </a>
                                    @endif
                                    @if ($paciente->expediente)
                                    <a class="dropdown-item activar" href="javascript:;">
                                        <i class="fas fa-eye me-50 font-small-4 text-danger"></i> Ver Expediente
                                    </a>

                                    @else
                                    <a class="dropdown-item activar" href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#createExpedienteModal" data-remote="">
                                        <i class="fas fa-plus me-50 font-small-4 text-success"></i> Agregar Expediente
                                    </a>
                                    @endif
                                </li>
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

@section('js')
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function() {
            var pacientes = $('.datables-pacientes');
            var dt = pacientes.DataTable({
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
            dt.columns.adjust().draw();
        });
</script>
<script src="{{asset('assets/sistema/js/pacientes.js')}}"></script>
@stop
@extends('layouts.master')

@section('title')
<h4 class="fw-bold py-3">{{ __('Dashboard') }}</h4>
@endsection

@section('content')

<div class="card app-calendar-wrapper">
    <div class="row g-0">
        <!-- Calendar Sidebar -->
        {{-- <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
            <div class="border-bottom p-4 my-sm-0 mb-3">
                <div class="d-grid">
                    <button class="btn btn-primary btn-toggle-sidebar" data-bs-toggle="offcanvas"
                        data-bs-target="#addEventSidebar" aria-controls="addEventSidebar">
                        <i class="ti ti-plus me-1"></i>
                        <span class="align-middle">Add Event</span>
                    </button>
                </div>
            </div>
            <div class="p-3">
                <!-- inline calendar (flatpicker) -->
                <div class="inline-calendar"></div>

                <hr class="container-m-nx mb-4 mt-3" />

                <!-- Filter -->
                <div class="mb-3 ms-3">
                    <small class="text-small text-muted text-uppercase align-middle">Filter</small>
                </div>

                <div class="form-check mb-2 ms-3">
                    <input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all"
                        checked />
                    <label class="form-check-label" for="selectAll">View All</label>
                </div>

                <div class="app-calendar-events-filter ms-3">
                    <div class="form-check form-check-danger mb-2">
                        <input class="form-check-input input-filter" type="checkbox" id="select-personal"
                            data-value="personal" checked />
                        <label class="form-check-label" for="select-personal">Personal</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input input-filter" type="checkbox" id="select-business"
                            data-value="business" checked />
                        <label class="form-check-label" for="select-business">Business</label>
                    </div>
                    <div class="form-check form-check-warning mb-2">
                        <input class="form-check-input input-filter" type="checkbox" id="select-family"
                            data-value="family" checked />
                        <label class="form-check-label" for="select-family">Family</label>
                    </div>
                    <div class="form-check form-check-success mb-2">
                        <input class="form-check-input input-filter" type="checkbox" id="select-holiday"
                            data-value="holiday" checked />
                        <label class="form-check-label" for="select-holiday">Holiday</label>
                    </div>
                    <div class="form-check form-check-info">
                        <input class="form-check-input input-filter" type="checkbox" id="select-etc" data-value="etc"
                            checked />
                        <label class="form-check-label" for="select-etc">ETC</label>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /Calendar Sidebar -->

        <!-- Calendar & Modal -->
        <div class="col app-calendar-content">
            <div class="card shadow-none border-0">
                <div class="card-body pb-0">
                    <!-- FullCalendar -->
                    <div id="calendar"></div>
                </div>
            </div>
            <div class="app-overlay"></div>
            <!-- FullCalendar Offcanvas -->
            <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar"
                aria-labelledby="addEventSidebarLabel">
                <div class="offcanvas-header my-1">
                    <h5 class="offcanvas-title" id="addEventSidebarLabel">Agendar Cita</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body pt-0">
                    <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                        <div class="mb-3">
                            <label class="form-label" for="eventStartDate">Fecha de cita</label>
                            <input type="date" class="form-control" id="eventStartDate" name="eventStartDate"
                                placeholder="Fecha"  disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="eventTitle">Motivo de la cita</label>
                            <textarea class="form-control" id="eventTitle" name="eventTitle" placeholder="Por favor, describa el motivo de su cita" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="eventLabel">Servicio (S)</label>
                            <select class="select2 select-event-label form-select" id="eventLabel"  name="states[]" multiple="multiple">
                                @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        {{-- <div class="mb-3">
                            <label class="form-label" for="eventEndDate">End Date</label>
                            <input type="text" class="form-control" id="eventEndDate" name="eventEndDate"
                                placeholder="End Date" />
                        </div>
                        <div class="mb-3">
                            <label class="switch">
                                <input type="checkbox" class="switch-input allDay-switch" />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                                <span class="switch-label">All Day</span>
                            </label>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label class="form-label" for="eventURL">Event URL</label>
                            <input type="url" class="form-control" id="eventURL" name="eventURL"
                                placeholder="https://www.google.com" />
                        </div> --}}
                        {{-- <div class="mb-3 select2-primary">
                            <label class="form-label" for="eventGuests">Add Guests</label>
                            <select class="select2 select-event-guests form-select" id="eventGuests" name="eventGuests"
                                multiple>
                                <option data-avatar="1.png" value="Jane Foster">Jane Foster</option>
                                <option data-avatar="3.png" value="Donna Frank">Donna Frank</option>
                                <option data-avatar="5.png" value="Gabrielle Robertson">Gabrielle Robertson</option>
                                <option data-avatar="7.png" value="Lori Spears">Lori Spears</option>
                                <option data-avatar="9.png" value="Sandy Vega">Sandy Vega</option>
                                <option data-avatar="11.png" value="Cheryl May">Cheryl May</option>
                            </select>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label class="form-label" for="eventLocation">Location</label>
                            <input type="text" class="form-control" id="eventLocation" name="eventLocation"
                                placeholder="Enter Location" />
                        </div> --}}
                        {{--  <div class="mb-3">
                            <label class="form-label" for="eventDescription">Description</label>
                            <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                        </div>  --}}
                        <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                            <div>
                                <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1">Add</button>
                                <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1"
                                    data-bs-dismiss="offcanvas">
                                    Cancel
                                </button>
                            </div>
                            <div><button class="btn btn-label-danger btn-delete-event d-none">Delete</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Calendar & Modal -->
    </div>
</div>

@endsection
@section('js')
<script>
    let calendario = new FullCalendar.Calendar($('.calendar')[0], {
    // Propiedad que hace que mi calendario en enero sea el mes 1 hasta diciembre que es el mes 12
    locale: 'es',
    timeZone: 'local',
    height: 'auto',
    contentHeight: 'auto',
    slotMinTime: '08:00',
    slotMaxTime: '23:59',
    expandRows: true,
    showNonCurrentDates: true,
    fixedWeekCount: false,
    initialView: 'dayGridMonth',
    selectable: true,
    selectMirror: true,
    weekends: true,
    {{--  events: @json($eventos),  --}}
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridDay,timeGridWeek'
    },
    views: {
        timeGridDay: { buttonText: 'Día' },
        dayGridMonth: { buttonText: 'Mes' },
        timeGridWeek: { buttonText: 'Semana' },
        timeGrid: {
            nowIndicator: true,
            allDaySlot: false,
            selectable: true,
            slotLabelFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            }
        }
    },
    dateClick: function(info) {
        //console.log(info);
        // Obtener el numero de mes y dia para comparar con fecha actual
        var mes = info.date.getMonth() + 1;
        var dia = info.date.getDate();
        var anio = info.date.getFullYear();
        // console.log(dia + "-" + mes + "-" + anio);
        var fechaActual = new Date();
        // Obtener dia, mes y anio de fechaActual
        var mesActual = fechaActual.getMonth() + 1;
        var diaActual = fechaActual.getDate();
        var anioActual = fechaActual.getFullYear();

        // Comparar las fechas
        if (anio > anioActual || (anio === anioActual && mes > mesActual) || (anio === anioActual && mes === mesActual && dia >= diaActual)) {
            $('#modalWizard').modal('show');
        } else {
            Swal.fire({
                icon: 'error',
                text: 'No se puede agendar audiencias en días pasados.'
            });
            return;
        }

        {{--  // Cargar el contenido del modal
        $('#modalWizard .modal-body').load('{{ route('Audiencias.create') }}', function(response, status, xhr) {
            if (status === "error") {
                console.error('Error al cargar el contenido del modal:', xhr.status, xhr.statusText);
                return;
            }

            // Establecer el valor del campo de entrada con la fecha en formato YYYY-MM-DD
            $('#fechaProgramada').val(info.dateStr);
        });  --}}
    },
    selectable: true,
    selectHelper: true,
    eventDidMount: function(info) {
        // Agregar tooltip
        $(info.el).tooltip({
            title: info.event.title,
            placement: 'top',
            trigger: 'hover',
            container: 'body'
        });

        // Cambia el estilo del evento
        $(info.el).css('border-radius', '5px');

        // Mostrar modal con información detallada
        {{--  $(info.el).on('click', function() {
            $('#modalWizard').modal('show');

            // Cargar el contenido del modal
            const idAudiencia = info.event.id; // ID del evento
            const url = `{{ route('Audiencias.edit', ['idAudiencia' => ':idAudiencia']) }}`.replace(':idAudiencia', idAudiencia);

            $('#modalWizard .modal-body').load(url, function(response, status, xhr) {
                if (status === "error") {
                    console.error('Error al cargar el contenido del modal:', xhr.status, xhr.statusText);
                    return;
                }
            });
        });  --}}
    }
});

calendario.render();

</script>

@endsection
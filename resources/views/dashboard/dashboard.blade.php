@extends('layouts.master')

@section('title')
<h4 class="fw-bold py-3">{{ __('Dashboard') }}</h4>
@endsection
<style>
    /* From Uiverse.io by kamehame-ha */ 
    .cards {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: space-between;
    /* gap: 20px;
    padding: 15px; */
}

.cards .card {
    height: 150px;
    width: 100%; 
    max-width: 220px;
    border-radius: 12px;
    color: white;
    text-align: center;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Estilo del texto */
.cards .card p.tip {
    font-size: 1.2em;
    font-weight: bold;
    margin: 0;
}

.cards .card p.second-text {
    font-size: 0.9em;
    opacity: 0.85;

}


.cards .card:hover {
    transform: scale(1.05);
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
}

.cards:hover > .card:not(:hover) {
    filter: blur(3px) !important;
    transform: scale(0.95) !important;
}



.cards .red {
    background-color: #f87171; 
}

.cards .blue {
    background-color: #60a5fa; 
}

.cards .green {
    background-color: #4ade80; 
}
.cards .yellow {
    background-color: #fbbf24; 
}
.cards .purple {
    background-color: #8b5cf6;
}

.cards .orange {
    background-color: #f97316; 
}

.cards .pink {
    background-color: #f472b6; 
}

.grid-center {
    display: grid;
    place-items: center;
}
</style>
@section('content')

<div class="card app-calendar-wrapper">
    <div class="row g-0">
        <!-- Calendar Sidebar -->
        <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
    
            <div class="p-3">
                <!-- inline calendar (flatpicker) -->
                <div class="inline-calendar"></div>

                <hr class="container-m-nx mb-4 mt-3" />

                <!-- Filter -->
                <div class="mb-3 ms-3">
                    <small class="text-small text-muted text-uppercase align-middle">Filtro</small>
                </div>

                <div class="form-check mb-2 ms-3">
                    <input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all"
                        checked />
                    <label class="form-check-label" for="selectAll">VER TODO</label>
                </div>
                <div class="app-calendar-events-filter ms-3">
                    @foreach ($servicios as $servicio)
                    <div class="form-check form-check-{{ $servicio->color }} mb-2">
                        <input class="form-check-input input-filter" type="checkbox" id="select-{{ $servicio->id }}"
                            data-value="{{ $servicio->id }}" checked />
                        <label class="form-check-label" for="select-{{ $servicio->id }}">{{ $servicio->nombre }}</label>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
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
                    <h5 class="offcanvas-title text-center" id="addEventSidebarLabel"><i class="fas fa-calendar"></i>
                        Agendar Cita</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body pt-0">
                    <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                        <div class="mb-3">
                            <label class="form-label" for="eventStartDate">Fecha de cita</label>
                            <input type="date" class="form-control" id="eventStartDate" name="eventStartDate"
                                placeholder="Fecha" disabled />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="eventTitle">Motivo de la cita</label>
                            <textarea class="form-control" id="eventTitle" name="eventTitle"
                                placeholder="Por favor, describa el motivo de su cita" rows="3"></textarea>
                        </div>
                       
                        <div class="row cards">
                            <div class="mb-3">
                                <label class="form-label" for="eventTitle">Servicios</label>
                            </div>
                            @foreach ($servicios as $servicio)
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3 d-flex justify-content-center align-items-center">
                                    <div class="card {{ ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'pink'][$loop->index % 7] }} grid-center">
                                        <div class="mh-100">
                                            <p class="tip">{{ $servicio->nombre }}</p>
                                            <p class="second-text my-2">{{ $servicio->descripcion }}</p>
                                        </div>
                                      
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        
                        
                       
                        {{--  <div class="mb-3">
                            <label class="form-label" for="eventLabel">Servicio (S)</label>
                            <select class="select2 select-event-label form-select" id="eventLabel" name="states[]"
                                multiple="multiple">
                                @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}/descipci&oacute;n: {{
                                    $servicio->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>  --}}

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
                        {{-- <div class="mb-3">
                            <label class="form-label" for="eventDescription">Description</label>
                            <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                        </div> --}}

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

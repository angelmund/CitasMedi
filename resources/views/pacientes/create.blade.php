<div class="text-center mb-2">
    <h1 class="mb-1 modal-title" id="createModalLabel">Registrar Paciente</h1>
</div>

<form class="modal-form" id="createPacienteForm" method="POST" action="{{ route('Pacientes.store') }}">
    <input type="hidden" value="{{ url('/') }}" id="url">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre del paciente">
    </div>
    <div class="form-group">
        <label for="apellido">Apellido Paterno</label>
        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required placeholder="Apellido Paterno">
    </div>
    <div class="form-group">
        <label for="apellido">Apellido Materno</label>
        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required placeholder="Apellido del Materno">
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <textarea class="form-control" id="direccion" name="direccion" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="number" class="form-control" id="telefono" name="telefono" required placeholder="Teléfono del paciente">
    </div>
    <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="Correo electrónico del paciente">
    </div>
</form>

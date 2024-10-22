<div class="text-center mb-2">
    <h1 class="mb-1 modal-title" id="editModalLabel">Editar Paciente</h1>
</div>

<form class="modal-form" id="editPacienteForm" method="POST" action="{{ route('Pacientes.update', $paciente->id) }}">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{ url('/') }}" id="url">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $paciente->nombre }}" required placeholder="Nombre del paciente">
    </div>
    <div class="form-group">
        <label for="apellido_paterno">Apellido Paterno</label>
        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ $paciente->apellido_paterno }}" required placeholder="Apellido Paterno">
    </div>
    <div class="form-group">
        <label for="apellido_materno">Apellido Materno</label>
        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ $paciente->apellido_materno }}" required placeholder="Apellido Materno">
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="number" class="form-control" id="telefono" name="telefono" value="{{ $paciente->telefono }}" required placeholder="Teléfono del paciente">
    </div>
    <div class="form-group">
        <label for="correo">Correo Electrónico</label>
        <input type="email" class="form-control" id="correo" name="correo" value="{{ $paciente->correo }}" required placeholder="Correo electrónico del paciente">
    </div>
    <div class="my-2">
        <label for="activo">Activo</label>
        <select class="form-select" id="activo" name="activo" required>
            <option value="1" {{ $paciente->activo == 1 ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ $paciente->activo == 0 ? 'selected' : '' }}>Inactivo</option>
        </select>
    </div>
</form>


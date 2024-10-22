<div class="text-center mb-2">
    <h1 class="mb-1 modal-title" id="createModalLabel">Editar Servicio</h1>
</div>

<form id="editServiceForm" method="POST" action="{{ route('Servicios.update', $servicio->id) }}">
    <input type="hidden" value="{{ url('/') }}" id="url">
    <input type="hidden" value="{{$servicio->id}}" id="id">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $servicio->nombre }}" required>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $servicio->descripcion }}</textarea>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="{{ $servicio->precio }}" required>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="color">Color</label>
                <div id="color-picker" class="color-picker"></div>
                <input type="hidden" id="color" name="color" value="{{ $servicio->color }}" required>
            </div>
        </div>
    </div>

    {{-- Activo --}}
    <div class="form-group">
        <label for="activo">Activo</label>
        <select class="form-select" id="activo" name="activo" required>
            <option value="1" {{ $servicio->activo == 1 ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ $servicio->activo == 0 ? 'selected' : '' }}>Inactivo</option>
        </select>

</form>

<div class="text-center mb-2">
    <h1 class="mb-1 modal-title" id="createModalLabel">Editar Rol</h1>
</div>

<form class="modal-form" id="createrol" method="POST" action="{{ route('Roles.store') }}">
    <input type="hidden" value="{{ url('/') }}" id="url">
    @csrf
    <div class="form-group">
        <input type="hidden" value="{{$role->id}}" id="rol">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre del rol" value="{{$role->name}}">
    </div>
</form>

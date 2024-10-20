<div class="text-center mb-2">
    <h1 class="mb-1 modal-title" id="createModalLabel">Agregar Especialidad</h1>
  </div>
  
  
  <form class="modal-form" id="editEspecialidadForm" method="POST" action="">
    <input type="hidden" value="{{ url('/') }}" id="url">
    @csrf
    <input type="hidden" id="id" value="{{$especialidad->id}}">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre del servicio" value="{{$especialidad->nombre}}">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{$especialidad->descripcion}}</textarea>
    </div>
  
    {{--  <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="precio">Precio</label>
          <input type="number" class="form-control" id="precio" name="precio" required placeholder="Precio del servicio">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="color">Color</label>
          <div id="color-picker" class="color-picker"></div>
          <input type="hidden" id="color" name="color" required>
        </div>
      </div>
      
    </div>  --}}
  </form>
  
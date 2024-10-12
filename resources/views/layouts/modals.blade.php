{{-- create modal --}}
<div class="modal" tabindex="-1" id="createModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-2">
        {{-- <h5 class="modal-title">Agregar</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- Aqui va el formulario --}}
      </div>
      <div class="modal-footer">
        <button type="submit" id="btnsave" type="button" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

{{-- edit modal --}}
<div class="modal" tabindex="-1" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-2">
        {{-- <h5 class="modal-title">Agregar</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- Aqui va el formulario --}}
      </div>
      <div class="modal-footer">
        <button id="btnupdate" type="button" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

{{-- delete modal --}}
<div class="modal" tabindex="-1" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header p-2">
        {{-- <h5 class="modal-title">Agregar</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- Aqui va el formulario --}}
      </div>
      <div class="modal-footer">
        <button id="btndelete" type="button" class="btn btn-primary">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

{{-- Modals large --}}
{{-- create modal --}}
<div class="modal" tabindex="-1" id="createModalLg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header p-2">
        {{-- <h5 class="modal-title">Agregar</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body
      ">
        {{-- Aqui va el formulario --}}
      </div>
      <div class="modal-footer">
        <button type="submit" id="btnsave" type="button" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>



<!-- Wizard modal -->
<div class="modal" tabindex="-1" id="wizardModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header p-2">
        <h5 class="modal-title">Wizard Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Aquí se cargará el contenido dinámico -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="nextStep">Siguiente</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

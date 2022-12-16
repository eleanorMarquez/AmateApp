<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registrar Pregunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="quickForm" method="post">
        <div class="modal-body">
          <!-- Upload image input-->
          <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
            <input id="upload" type="file" onchange="readURL(this);" name="imgLogo" class="form-control border-0">
            <label id="upload-label" for="upload" class="font-weight-light text-muted">Imágen</label>
            <div class="input-group-append">
                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Subir Imágen de la pregunta</small></label>
            </div>
          </div>

          <!-- Uploaded image area-->
          <div class="image-area mt-4"><img id="imageResult" src="" alt="" class="img-fluid rounded shadow-sm mx-auto d-block "></div>

          <div class="form-group">
            <label for="" class="col-form-label">Cargue el audio de la pregunta</label>
            <input type="file" class="form-control" id="file" name="audio" onchange="return validarExtensionArchivo()" />
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Seleccione la categoría de la pregunta:</label>
            <select class="form-control" name="category" id="">
              <option value="urgente">Urgente</option>
              <option value="reacciona">Reacciona</option>
              <option value="alerta">Alerta</option>
            </select>
          </div>

            <div class="form-group">
              <label for="message-text" class="col-form-label">Registre la pregunta:</label>
              <textarea class="form-control" name="ask" rows="3" maxlength="499" id=""></textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

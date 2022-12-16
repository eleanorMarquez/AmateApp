<form class="forms-sample" id="quickForm">
    <div class="row py-4">
      <div class="col-md-6 offset-md-3 text-center">
        <!-- Upload image input-->
        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
            <input id="upload" type="file" onchange="readURL(this);" name="imgLogo" class="form-control border-0">
            <label id="upload-label" for="upload" class="font-weight-light text-muted">Imágen</label>
            <div class="input-group-append">
                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Subir Imágen</small></label>
            </div>
        </div>
        <small>Dimensiones recomendadas Ancho(220) x Alto(220)</small>

        <!-- Uploaded image area-->
        <div class="image-area mt-4"><img id="imageResult" src="" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="title">Nombre de la Entidad</label>
                <input type="text" class="form-control" name="entity" id="title" placeholder="">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="area_of_contact">Área de Contácto</label>
                <input type="text" class="form-control" name="area_of_contact" id="area_of_contact" placeholder="">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="phones">Teléfono de Contácto</label>
                <input type="number" class="form-control" name="phones" id="phones" placeholder="">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="ubication">Dirección de la Entidad</label>
                <input type="text" class="form-control" name="ubication" id="ubication" placeholder="">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="">
            </div>
        </div>

       
    </div>
    
    <button type="submit" class="btn btn-primary me-2">Guardar</button>
    <a href="{{route('directorio.index')}}" class="btn btn-light">Cancelar</a>
  </form>
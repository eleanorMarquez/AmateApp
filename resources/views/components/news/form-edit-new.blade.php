<form class="forms-sample" id="quickForm">
    <input type="hidden" name="id" value="{{$new->id}}">
    <div class="row py-4">
      <div class="col-md-6 offset-md-3 text-center">
        <!-- Upload image input-->
        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
            <input id="upload" type="file" onchange="readURL(this);" name="imgLogo" value="{{$new->image}}" class="form-control border-0">
            <label id="upload-label" for="upload" class="font-weight-light text-muted">Imágen</label>
            <div class="input-group-append">
                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fas fa-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Subir Imágen</small></label>
            </div>
        </div>
        <small>Dimensiones recomendadas Ancho(220) x Alto(220)</small>

        <!-- Uploaded image area-->
        <div class="image-area mt-4"><img id="imageResult" src="{{$new->image}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="title">Título de la Noticia</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$new->title}}" placeholder="">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="description">Descripción de la noticia</label>
                <input type="hidden" id="description" name="description" value="{{$new->description}}">
                <trix-editor class="trix-content" input="description" ></trix-editor>
            </div>
        </div>

       
    </div>
    
    <button type="submit" class="btn btn-primary me-2">Actualizar</button>
    <a href="{{route('noticia.index')}}" class="btn btn-light">Cancelar</a>
  </form>
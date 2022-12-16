<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar Disponibilidad de Cita</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="" id="form-citation">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="">Fecha</label>
                            <input type="date" name="date_cita" id="txt_date" class="form-control">
                        </div>
                            <div class="col-sm-4">
                                <label for="">Hora Inicial</label>
                                <input type="time" name="time_start" id="txt_time_start" class="form-control">
                            </div>

                            <div class="col-sm-4">
                                <label for="">Hora Final</label>
                                <input type="time" name="time_end" id="txt_time_end" class="form-control">
                            </div>

                            <div class="col-sm-12">
                                <label for="">Título</label>
                                <input type="text" name="desciption" id="txt_title" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" id="isvirtual" name="type_cita">
                                        Disponibilidad de cita virtual
                                    <i class="input-helper"></i></label>
                                  </div>
                            </div>
                            <div class="col-sm-12" id="link">
                                <label for="">Link de la Cita Virtual</label>
                                <input type="text" name="link_cita" id="txt_link" class="form-control" placeholder="Ingrese el link completo, ejemplo: https://meet.google.com/svy-pytr-hqy">
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="clos" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" onclick="savedata()" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
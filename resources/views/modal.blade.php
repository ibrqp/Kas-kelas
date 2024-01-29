<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addnewModalLabel">Tambah Siswa Baru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::open(['url' => 'save']) !!}
                      <div class="mb-3">
                          {!! Form::label('Nama', 'Nama') !!}
                          {!! Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Input Nama', 'required']) !!}
                      </div>
                      <div class="form-group">
                        <label class="font-weight-bold">Kelas</label>
                        <select class="form-control" name="kelas">
                            <option value="X PPLG">X PPLG</option>
                            <option value="XI PPLG">XI RPL</option>
                            <option value="XII PPLG">XII RPL</option>
                        </select>
                    </div>                    
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Todo List</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="#" name="id">
            <div class="modal-body">
            	 <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Nama <span style="color: red;"> * </span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" placeholder="Masukkan Nama">
                    </div>
                 </div>

                 <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Umur <span style="color: red;"> * </span></label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="age" placeholder="Masukkan Umur">
                    </div>
                 </div>

                   <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">Alamat <span style="color: red;"> * </span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="address" placeholder="Masukkan Alamat">
                    </div>
                 </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


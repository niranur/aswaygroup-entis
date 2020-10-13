		<?php echo form_open_multipart('', 'class="form-horizontal" id="GSForm"');?>
		<div class="row">
          <div class="col-md-12">
          	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pegawai</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php $this->load->view('components/alert');?>
                <div class="row">
          			<div class="col-md-12">
                        <div class="form-group">
                        	<label for="inputName">Nama</label>
                        	<input type="text" class="form-control" name="name" placeholder="Masukkan Nama" value="<?php echo $content->employee_name;?>">
                        </div>
                        <div class="form-group">
                        	<label for="inputName">Umur</label>
                        	<input type="number" class="form-control" name="age" placeholder="Masukkan Umur" value="<?php echo $content->employee_age;?>">
                        </div>
                        <div class="form-group">
                        	<label for="inputName">Alamat</label>
                        	<input type="text" class="form-control" name="address" placeholder="Masukkan Alamat" value="<?php echo $content->employee_address;?>">
                        </div>
              		</div><!-- /.card-body -->

              	</div>
              </div>
              <div class="card-footer text-right">
                  <button id="save" type="submit" class="btn btn-primary"><i class="fa fa-check-double"></i> Simpan</button>
                  <button type="reset" class="btn btn-default"><i class="fa fa-history"></i> Reset</button>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_close();?>



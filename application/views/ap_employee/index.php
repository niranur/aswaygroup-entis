<?php $this->load->view($ajax_detail);?>
		<div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
<!--                   <button type="button" class="btn btn-warning swalDefaultSuccess"> -->
<!--                   Launch Warning -->
<!--                 </button> -->
<!--                     <button type="button" class="btn btn-warning toastsDefaultWarning"> -->
<!--                   Launch Warning Toast -->
<!--                 </button> -->
                	 <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modal-default">
                  Launch Default Modal
                </button>
                	<button type="button" class="btn btn-sm btn-info" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit');?>';"><i class="fa fa-plus"></i> <?php echo $lang_add;?></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php $this->load->view('components/alert');?>
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php $no=1; foreach ($content as $val):?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $val->employee_name;?></td>
                    <td><?php echo $val->employee_age;?></td>
                    <td><?php echo $val->employee_address;?></td>
                    <td align="center" class="text-nowrap">
                    	<button type="button" class="btn btn-sm btn-info" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit/'.$val->employee_id);?>';"><i class="fa fa-pencil-alt"></i></button>
                    	<button type="button" class="btn btn-sm btn-danger" onclick="uriAlert('<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->employee_id);?>');"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <?php $no++; endforeach;?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-12 -->
        </div>


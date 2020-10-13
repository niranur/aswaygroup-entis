		<div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                	<button type="button" class="btn btn-sm btn-info" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit');?>';"><i class="fa fa-plus"></i> <?php echo $lang_add;?></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php $this->load->view('components/alert');?>
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th><?php echo $lang_number;?></th>
                    <th><?php echo $lang_roles;?></th>
                    <th class="no-sort">
                    	<div class="text-center">
                    		<?php echo $lang_action;?>
                    	</div>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($content as $val):?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $val->roles;?></td>
                    <td align="center" class="text-nowrap">
                    	<button type="button" class="btn btn-sm btn-info" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit/'.$val->id);?>';"><i class="fa fa-pencil-alt"></i></button>
                    	<button type="button" class="btn btn-sm btn-danger" onclick="uriAlert('<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->id);?>');"><i class="fa fa-trash"></i></button>
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
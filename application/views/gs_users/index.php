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
                    <th><?php echo $lang_name;?></th>
                    <th><?php echo $lang_email;?></th>
                    <th><?php echo $lang_mobile_number;?></th>
                    <th><?php echo $lang_active_period;?></th>                    
                    <th><?php echo $lang_roles;?></th>
                    <th><?php echo $lang_active;?></th>
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
                    <td><?php echo $val->users_name;?></td>
                    <td><?php echo $val->users_email;?></td>
                    <td><?php echo $val->users_mobile_number;?></td>
                    <td align="center">
                    	<?php 
                    	if ($val->users_date_due==NULL){
                    		echo $lang_unlimited;
                    	} else {
                    	?>
                    	<span class="badge badge-info">
                    		<?php echo count_day($val->users_date_due, date('Y-m-d')).' '.$lang_day;?>
                    	</span>
                    	<?php }?>
                    </td>
                    <td><?php echo $val->roles;?></td>
                    <td>
                    	<span class="badge badge-<?php echo $val->status_id==1?'success':'danger';?>">
                    		<?php echo $val->status_name;?>
                    	</span>
                    </td>
                    <td align="center" class="text-nowrap">
                    	<button type="button" class="btn btn-sm btn-info" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/edit/'.$val->users_id);?>';"><i class="fa fa-pencil-alt"></i></button>
                    	<button type="button" class="btn btn-sm btn-danger" onclick="uriAlert('<?php echo base_url($this->uri->rsegment(1).'/delete/'.$val->users_id);?>');"><i class="fa fa-trash"></i></button>
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
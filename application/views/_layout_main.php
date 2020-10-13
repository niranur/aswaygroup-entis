<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo strip_tags($app->app_name);?> | <?php echo $modules_title;?></title>
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>uploads/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>uploads/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>uploads/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>uploads/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>uploads/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>uploads/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>uploads/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>uploads/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>uploads/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>uploads/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>uploads/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>uploads/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>uploads/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo base_url();?>uploads/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo base_url();?>uploads/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- flag-icon-css -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/flag-icon-css/css/flag-icon.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Lightbox2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/lightbox/css/lightbox.min.css">
  <!-- Datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/summernote/summernote-bs4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <!-- User style -->
  <?php $this->load->view($css);?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <?php if ($app->multi_language==1){?>
      <!-- Language Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="flag-icon <?php echo $users->flag;?>"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-0">
        <?php foreach ($list_lang as $value):?>
          <a href="<?php echo base_url('gs_language?lang='.$value->lang.'&redirect='.uri_string());?>" class="dropdown-item">
            <i class="flag-icon <?php echo $value->flag;?> mr-2"></i> <?php echo ucfirst($value->lang);?>
          </a>
        <?php endforeach;?>
        </div>
      </li>
      <?php }?>
      <li class="nav-item">
      	<a class="nav-link" href="javascript:;">
        	<i class="fas fa-clock"></i> <span class="digital-clock">00:00:00</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:;" role="button" onclick="uriAlert('<?php echo base_url('auth/logout');?>')">
        	<i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link">
      <img src="<?php echo base_url('uploads/'.$default_image);?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $app->app_name;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('uploads/'.$users->users_avatar);?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('gs_profile');?>" class="d-block"><?php echo $users->users_name;?></a>
        </div>
      </div>
	  <?php
      $treeview_active = ' menu-open';
      $active = ' active';
      ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard');?>" class="nav-link<?php echo $main_menu_active=='dashboard'?$active:'';?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                <?php echo $lang_dashboard;?>
              </p>
            </a>
          </li>
          <?php
          foreach ($main_menu as $val):
          if ($val->type==1){
              if ($val->slug=='javascript:;') {
          ?>
          <li class="nav-item has-treeview<?php echo $main_menu_open==$val->id?$treeview_active:'';?>">
            <a href="<?php echo base_url($val->slug);?>" class="nav-link<?php echo $main_menu_open==$val->id?$active:'';?>">
              <i class="nav-icon fa <?php echo $val->icon;?>"></i>
              <p>
                <?php echo $val->$mylanguages_field;?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              foreach ($main_menu_tree as $value):
              if ($value->parent_modules_id==$val->modules_id){
              ?>
              <li class="nav-item">
                <a href="<?php echo base_url($value->slug);?>" class="nav-link<?php echo $main_menu_active==$value->slug?$active:'';?>">
                  <i class="fa <?php echo $value->icon;?> nav-icon"></i>
                  <p><?php echo $value->$mylanguages_field;?></p>
                </a>
              </li>
              <?php
              }
              endforeach;
              ?>
            </ul>
          </li>
          <?php
              } else {
          ?>
          <li class="nav-item">
            <a href="<?php echo base_url($val->slug);?>" class="nav-link<?php echo $main_menu_active==$val->slug?$active:'';?>">
              <i class="nav-icon fas <?php echo $val->icon;?>"></i>
              <p>
                <?php echo $val->$mylanguages_field;?>
              </p>
            </a>
          </li>
          <?php
                }
            } else {
            ?>
          <li class="nav-header"><?php echo $val->$mylanguages_field;?></li>
          <?php
          }
          endforeach;
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $modules_title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo $lang_home;?></a></li>
              <?php if ($modules_parent){?>
              <li class="breadcrumb-item"><?php echo $modules_parent;?></li>
              <?php }?>
              <li class="breadcrumb-item active"><?php echo $modules_title;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?php $this->load->view($subview);?>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <?php echo $app->app_desc;?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="<?php echo $app->copy_right_url;?>"><?php echo $app->copy_right;?></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Lightbox2 -->
<script src="<?php echo base_url();?>assets/vendor/lightbox/js/lightbox.min.js"></script>
<!-- Datepicker -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<script>
function uriAlert(uri){
	Swal.fire({
		title: '<?php echo $lang_are_you_sure;?>?',
		text: "<?php echo $lang_are_you_sure_desc;?>",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: '&nbsp;&nbsp;&nbsp;<?php echo $lang_yes;?>&nbsp;&nbsp;&nbsp;',
		cancelButtonText: '&nbsp;&nbsp;&nbsp;<?php echo $lang_no;?>&nbsp;&nbsp;&nbsp;',
		reverseButtons: true,
		showClass: {
		    popup: 'animate__animated animate__fadeInDown'
		},
		hideClass: {
		    popup: 'animate__animated animate__fadeOutUp'
		},
	}).then((result) => {
		if (result.value) {
			location.href=uri;
		}
	});
}
</script>
<!-- User JS -->
<?php $this->load->view($js);?>
<script>
    $(function() {
    	$('.datepicker').datepicker({
    	    format: 'yyyy-mm-dd',
    	    autoclose: true
    	});
    	$('.summernote').summernote({
  		  toolbar: [
  			  ['font', ['bold', 'italic', 'underline', 'clear']],
  			  ['para', ['ul', 'ol', 'paragraph']],
  			  //['view', ['fullscreen', 'codeview']],
		  ]
		});
    	clockUpdate();
    	setInterval(clockUpdate, 1000);
    });

	function clockUpdate() {
	  var date = new Date();
	  function addZero(x) {
	    if (x < 10) {
	      return x = '0' + x;
	    } else {
	      return x;
	    }
	  }

	  function twelveHour(x) {
	    if (x > 12) {
	      return x = x - 12;
	    } else if (x == 0) {
	      return x = 12;
	    } else {
	      return x;
	    }
	  }

	  var h = addZero(twelveHour(date.getHours()));
	  var m = addZero(date.getMinutes());
	  var s = addZero(date.getSeconds());

	  $('.digital-clock').text(h + ':' + m + ':' + s)
	}
</script>
</body>
</html>

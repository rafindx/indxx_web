<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<!-- added prasad 240518-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- closing by prasad 240518 -->

<div class="wrapper">
  <header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Indxx</b>CMS</span>
    </a>
  </header>
  <aside class="main-sidebar">
    <?php $this->load->view('admin/sidebar');?>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Tab Overview</li>
      </ol>
    </section>
    <div class="row">
      <div class="col-md-10">
        <?php if($this->session->flashdata('msg')!='') {?>
        <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Success!</strong><?php echo $this->session->flashdata('msg');?>    </div>
        <?php } ?>
      </div>
      <!-- /.box -->
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo base_url('index.php/admin/newIndxx'); ?>" class="btn btn-info btn-lg pull-right">Add New Index</a>
          <button style="margin-right:10px;" type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Add New Tab</button>          
        </div>
      </div>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#bench">Benchmark</a></li>
        <li><a data-toggle="tab" href="#incom">Income</a></li>
        <li><a data-toggle="tab" href="#themat">Thematic</a></li>
        <li><a data-toggle="tab" href="#other">Other Indices</a></li>        
      </ul>
      <div class="tab-content">
        <div id="bench" class="tab-pane fade in active">          
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>                
                <th>Indxx Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_benchmark as $bench){ ?>
              <tr>
                <td><?php echo $bench->name;?></td>
                
                <td>
                  <?php if($bench->weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                </td>
                <td>
                  <div class="col-md-4">
                    <?php if($bench->productlist =='1'){?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="2">
                    <input type="hidden" name="indexx" value="<?php echo $bench->id;?>" >                    
                    <input style="background-color:#5cb85c;" type="submit" name="deactive" value="Deactivate" class="btn btn-info deactive">
                  </form>
                  <?php }else{ ?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="1">
                    <input type="hidden" name="indexx" value="<?php echo $bench->id;?>" >                    
                    <input style="padding: 6px 20px;" type="submit" name="deactive" value="Activate" class="btn btn-info active">
                  </form>
                  <?php } ?>        
                  </div>
                  <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editIndex')?>">
                      <input type="hidden" value="<?php echo $bench->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                  </div>
                  <div class="col-md-3">
                    <form method="post" action="<?php echo base_url('index.php/admin/delete')?>">                  
                      <input type="hidden" value="<?php echo $bench->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to Remove?');">                      
                    </form>
                  </div>
                </td>
              </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
         <div id="incom" class="tab-pane fade">          
          <table id="example2" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>               
                <th>Indxx Type</th>
                <th>Action</th>             
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_income as $incom){ ?>
              <tr>
                <td><?php echo $incom->name;?></td>
                <td>
                  <?php if($incom->weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                </td>
               
                <td>
                  <div class="col-md-4">
                    <?php if($incom->productlist =='1'){?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="2">
                    <input type="hidden" name="indexx" value="<?php echo $incom->id;?>" >                    
                    <input style="background-color:#5cb85c;" type="submit" name="deactive" value="Deactive" class="btn btn-info deactive">
                  </form>
                  <?php }else{ ?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="1">
                    <input type="hidden" name="indexx" value="<?php echo $incom->id;?>" >                    
                    <input style="padding: 6px 20px;" type="submit" name="deactive" value="Active" class="btn btn-info active">
                  </form>
                  <?php } ?>                  
                  </div>
                 
                  <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editIndex')?>">
                      <input type="hidden" value="<?php echo $incom->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                  </div>
                  <div class="col-md-3">
                    <form method="post" action="<?php echo base_url('index.php/admin/delete')?>">                  
                      <input type="hidden" value="<?php echo $incom->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to Remove?');">                      
                    </form>
                  </div>
                </td>
              </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
        <div id="themat" class="tab-pane fade">          
          <table id="example3" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>               
                <th>Indxx Type</th>
                <th>Action</th>               
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_thematic as $themat){ ?>
              <tr>
                <td><?php echo $themat->name;?></td>
             
                <td>
                  <?php if($themat->weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                </td>
                <td>
                  <div class="col-md-4">
                     <?php if($themat->productlist =='1'){?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="2">
                    <input type="hidden" name="indexx" value="<?php echo $themat->id;?>" >                    
                    <input style="background-color:#5cb85c;" type="submit" name="deactive" value="Deactive" class="btn btn-info deactive">
                  </form>
                  <?php }else{ ?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="1">
                    <input type="hidden" name="indexx" value="<?php echo $themat->id;?>" >                    
                    <input style="padding: 6px 20px;" type="submit" name="deactive" value="Active" class="btn btn-info active">
                  </form>
                  <?php } ?>     
                  </div>
                  <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editIndex')?>">
                      <input type="hidden" value="<?php echo $themat->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                  </div>
                  <div class="col-md-3">
                    <form method="post" action="<?php echo base_url('index.php/admin/delete')?>">                  
                      <input type="hidden" value="<?php echo $themat->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to Remove?');">                      
                    </form>
                  </div>
                </td>
              </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>
           <div id="other" class="tab-pane fade">          
          <table id="example4" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>               
                <th>Indxx Type</th>
                <th>Action</th>               
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_other as $other){ ?>
              <tr>
                <td><?php echo $other->name;?></td>
              
                <td>
                  <?php if($other->weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                </td>
                <td>
                  <div class="col-md-4">
                     <?php if($other->productlist =='1'){?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="2">
                    <input type="hidden" name="indexx" value="<?php echo $other->id;?>" >                    
                    <input style="background-color:#5cb85c;" type="submit" name="deactive" value="Deactive" class="btn btn-info deactive">
                  </form>
                  <?php }else{ ?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="1">
                    <input type="hidden" name="indexx" value="<?php echo $other->id;?>" >                    
                    <input style="padding: 6px 20px;" type="submit" name="deactive" value="Active" class="btn btn-info active">
                  </form>
                  <?php } ?>    
                  </div>
                  <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editIndex')?>">
                      <input type="hidden" value="<?php echo $other->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                  </div>
                  <div class="col-md-3">
                    <form method="post" action="<?php echo base_url('index.php/admin/delete')?>">                  
                      <input type="hidden" value="<?php echo $other->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to Remove?');">                      
                    </form>
                  </div>
                </td>
              </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <div class="container">
      
      <!-- Trigger the modal with a button -->
      
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" >
          
          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              
              <!-- <h4 class="modal-title">Modal Header</h4>
            </div> -->
            <div class="modal-body" >
              <form role="form" method="post" action="<?php echo base_url('index.php/admin/addTab')?>" enctype="multipart/form-data" >
                <div class="box-body ">
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Tab Name</label>
                    <div>
                      <input class="form-control" type="text" name="tabName" value="" >
                      <?php echo form_error('tabName'); ?>
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" style="margin-top:15px;">Add Tab</button>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>
      
      <style type="text/css">
      textarea.form-group.textarea {float: left;width: 100%;min-height: 150px;resize: none;padding: 5px;}
      div#example_length {width: 50% !important;float: left !important;}
      div#example_filter { width: 50% !important;float: left !important;}
      .tab-content {
      padding: 30px 22px;
      }
      </style>
      <!-- Control Sidebar -->
      <!-- <div class="control-sidebar-bg"></div> -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example').DataTable();
    } );</script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example2').DataTable();
    } );</script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example3').DataTable();
    } );</script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example4').DataTable();
    } );</script>

    
	
	
<!-- jQuery added by prasad 240518-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- jQuery closing by prasad 240518-->
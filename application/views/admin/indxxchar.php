<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Indxx</b>CMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php $this->load->view('admin/sidebar');?>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tab Overview</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="box box-primary" style="margin: 0 0 0 23%; width: 50%">
          <div class="box-header with-border">
            <h3 class="box-title">Add Index Characteristics</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php //print_r($indxx); die(); ?>
          <form role="form" method="post" action="<?php echo base_url('index.php/admin/addChar')?>" enctype="multipart/form-data" >
            <div class="box-body ">
              <div class="row">
                <div class="col-md-12">
                  <?php if($this->session->flashdata('msg')!='') {?>
                  <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                  <strong>Success!</strong><?php echo $this->session->flashdata('msg');?>    </div>
                  <?php } ?>
                </div>
                <!-- /.box -->
              </div>
              <div class="form-group">                
                <div>
                  <input class="form-control" type="hidden" name="indxx_id" value="<?php echo $indxx->id?>" >
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Index Base Date</label>
                <div>
                  <input class="form-control" type="text" name="base_date" value="" id="datepicker" >
                  <?php echo form_error('base_date'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Index No Of Constituent</label>
                <div>
                  <input class="form-control" type="number" name="no_of_constituent" value="" max="5000" >
                  <?php echo form_error('no_of_constituent'); ?>
                </div>
              </div>

              <div class="form-group">
               <!--  <label for="exampleInputPassword1">No Of Top Constituent</label> -->
                <div>
                  <input value = "10" class="form-control" type="hidden" name="no_of_top_constituent" value="" max="150" >
                  <?php echo form_error('no_of_top_constituent'); ?>
                </div>
              </div>
              <div class="form-group">
              
                <div>
                  <input class="form-control" type="hidden" name="dividend_yield" value="<?php echo $yield->dividendyield;?>" >
                  <?php echo form_error('dividend_yield'); ?>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Index 52 Week High/Low</label>
                <div>
                  <input class="form-control diff" type="text" name="high" value="" placeholder="High Value" >
                  <span class="sap">/</span>
                   <input class="form-control diff" type="text" name="low" value="" placeholder="Low Value" >
                  <?php echo form_error('high'); ?>
                   <?php echo form_error('low'); ?>
                </div>
                
              </div>
              <div class="form-group">
                
                <input class="form-control" type="hidden" name="status" value="1" >
              </div>
              <!-- /.box-body -->
              
              <div class="form-group col-md-12">
                <div class="box-footer col-md-6"">
                  <button type="submit" class="btn btn-primary">Save & Continue</button>
                </div>
                <?php if($this->session->flashdata('msg')!='') {?>
                <div class="box-footer col-md-6"">
                  <!-- <a href="<?php echo base_url('index.php/admin/indxxInsights'); ?>" class="btn btn-primary pull-right">Next</a>
                  -->
                </div>
                <?php } ?>
              </div>
            </form>
            
          </div>
          <!-- /.box -->
          
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <style type="text/css">
    textarea.form-group.textarea {
    float: left;
    width: 100%;
    min-height: 150px;
    resize: none;
    padding: 5px;
    }
    #suggesstion ul {
    position: absolute;
    z-index: 999999;
    background-color: #f2f2f2;
    width: 65%;
    height: 250px;
    overflow-x: hidden;
    }
    #suggesstion ul li {
    list-style: none;
    padding: 5px 0;
    cursor: pointer;
    }
    </style>
    <!-- Control Sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  <style type="text/css">
    .diff {
    width: 42%;
    float: left;
    margin-right: 8%;
}
span.sap {
    position: absolute;
    /* left: 0; */
    right: 53%;
    font-size: 31px;
    top: 66%;
    color: #ccc;
}
  </style>
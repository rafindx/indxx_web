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
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="box box-primary" style="margin: 7% 0 0 23%; width: 50%">
          <div class="box-header with-border">
            <h3 class="box-title">Add Indxx Insights</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
         
          <form role="form" method="post" action="<?php echo base_url('index.php/admin/addInsights')?>" enctype="multipart/form-data" >
            <div class="box-body ">
              <div class="form-group">  
                <label for="exampleInputPassword1">Title</label>
                <div>
                  <input class="form-control" type="text" 
                  name="TITLE" value="">
                  <?php echo form_error('TITLE'); ?>
                 
                
                </div>                
              </div>
              <div class="form-group"> 
                <label for="exampleInputPassword1">Description</label>
                <div>
                  <textarea class="form-control" name="DESCRIPTION"></textarea>
                  <?php echo form_error('DESCRIPTION'); ?>
                </div>                
              </div>
              <!-- <div class="form-group"> 
                <label for="exampleInputPassword1">Image</label>
                <div>
                  <input class="form-control" type="file" name="file" value="" >
                  <?php echo form_error('file'); ?>
                </div>                
              </div> -->

              
              <div class="form-group"> 
                <label for="exampleInputPassword1">Release Date</label>
                <div>
                  <input class="form-control" type="date" name="RELEASE_DATE" value="" >
                  <?php echo form_error('RELEASE_DATE'); ?>
                </div>                
              </div>

              <div class="form-group"> 
                <label for="exampleInputPassword1">INSDTTM</label>
                <div>
                  <input class="form-control" type="date" name="INSDTTM" value="" >
                  <?php echo form_error('INSDTTM'); ?>
                </div>                
              </div>

              <div class="form-group"> 
                <label for="exampleInputPassword1">UPDTTM</label>
                <div>
                  <input class="form-control" type="text" name="UPDTTM" value="<?php echo date("Y-m-d H:i:s"); ?>" >
                  <?php echo form_error('UPDTTM'); ?>
                </div>                
              </div>

              <div class="form-group"> 
                <label for="exampleInputPassword1">Status</label>
                <div>
                <select name="status" class="form-control">
                <option value="">Select Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>              
                </select>
                <?php echo form_error('weeklyreturn'); ?>
                </div>                                 
              </div> 
              <div class="form-group col-md-12">                  
                  <div class="box-footer col-md-6"">
                    <button type="submit" class="btn btn-primary">Add Indxx Value</button>
                  </div>
                    <?php if($this->session->flashdata('msg')!='') {?>
                    <div class="box-footer col-md-6"">
                    <a href="<?php echo base_url('index.php/admin/addRiskReturnStatistics'); ?>" class="btn btn-primary pull-right">Next</a>
                   
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


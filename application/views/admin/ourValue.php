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
      <div class="box box-primary" style="margin: 4% 0 0 23%; width: 50%">
        <div class="box-header with-border">
          <h3 class="box-title">Add Our Value Text</h3>
        </div>        
        <!-- /.box-header -->
        <!-- form start -->
       

        <form role="form" method="post" action="<?php echo base_url('index.php/admin/addOurValue')?>" enctype="multipart/form-data" >

          <div class="box-body" style="border:none!important;">
            <?php if(isset($tbl_our_value)) { foreach($tbl_our_value as $tbl_our_value ) { ?>
            <div class="form-group">
              <label for="exampleInputPassword1">Video Url</label>
              <input class="form-control"  value="<?= $tbl_our_value->video_url ?>" type="url" name="videourl" value="" required="required">
             
              </div>
              

              <div class="form-group">
              <label for="exampleInputPassword1">Heading </label>
                <input class="form-control" value="<?= $tbl_our_value->heading ?>" type="text" name="Heading" value="" required="required">      
              
              </div>

            
              <div class="form-group">
              <label for="exampleInputPassword1">Title </label>
                 <input class="form-control"  value="<?= $tbl_our_value->description ?>" type="text"name="Title" value="" required="required">
               
              </div> 

           
             <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update Value</button>
            </div>
           
            <?php } 
            } else {?>
                <div class="form-group">
              <label for="exampleInputPassword1">Video Url</label>
              <input class="form-control"  value="" type="text" name="videourl" value="" required="required">
              
              </div>
              

              <div class="form-group">
              <label for="exampleInputPassword1">Heading </label>
                <input class="form-control" value="" type="text" name="Heading" value="" required="required">      
              
              </div>

            
              <div class="form-group">
              <label for="exampleInputPassword1">Title </label>
                 <input class="form-control"  value="" type="text" name="Title" value="" required="required">
                
              </div> 

           
             <div class="box-footer">
              <button type="submit" class="btn btn-primary">Add Value</button>
            </div>
           
            <?php } ?>
               </div>
          </form>
          
        </div>
        <!-- /.box -->
        
      </div>
      <div class="row">
         <div class="box box-primary" style="margin: 1% 0 0 23%; width: 50%">
        <div class="box-header with-border">
          <h3 class="box-title">Add other Text</h3>          
        </div>  
        <form role="form" method="post" action="<?php echo base_url('index.php/admin/')?><?php if(isset($tbl_our_value_other)) { echo 'EditOurValueOther'; } else { echo  'addOurValueOther'; }?>" enctype="multipart/form-data" >

          <div class="box-body" style="border:none!important;">
            
            <div class="form-group">
              <label for="exampleInputPassword1">Heading 1</label>
              <input type="hidden" name="valid" value="<?php  if(isset($tbl_our_value_other)) { echo $tbl_our_value_other->id; } ?>">
              <input class="form-control" type="text" name="heading1" value="<?php if(isset($tbl_our_value_other)) { echo $tbl_our_value_other->heading1; }?>" required="required">
          
                </div> 
                 <div class="form-group">
              <label for="exampleInputPassword1">Heading 2</label>
                <input class="form-control" type="text" name="heading2" value="<?php if(isset($tbl_our_value_other)) { echo $tbl_our_value_other->heading2; }?>" required="required">
                
                </div> 

             
              <div class="form-group">
              <label for="exampleInputPassword1">Text</label>
                <textarea class="form-group textarea" name="text" required="required"><?php if(isset($tbl_our_value_other)) { echo $tbl_our_value_other->text; }?></textarea> 
              
              </div> <div class="row">
              <div class="col-md-6">
                <div class="form-group">
              <label for="exampleInputPassword1">Image</label>
              <input class="form-control" type="file" name="image" value="" <?php if(!isset($tbl_our_value_other)) { ?> required="required" <?php } ?>>
                
                </div> 
              </div>
                  
            <div class="col-md-6">
                <div class="form-group">
                    <?php if(isset($tbl_our_value_other)) { ?>
                   <a href="<?php echo base_url('/uploads/value/').$tbl_our_value_other->image; ?>" download=""><?php if(isset($tbl_our_value_other)) { echo $tbl_our_value_other->image;}?>  &nbsp;&nbsp;&nbsp;<i class="fa fa-download" aria-hidden="true"></i></a>
                    <?php } ?>
                </div> 
              </div>
              </div>
                            
              
				<div class="box-footer">
              <button type="submit" class="btn btn-primary">Add Other Text</button>
            </div>
              
            </div>
            
          </form>
      </div>

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
  </style>
  <!-- Control Sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
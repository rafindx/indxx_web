<div class="wrapper">
  <header class="main-header">
    <a href="index2.html" class="logo">
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit  Career</li>
      </ol>
    </section>
    <div class="row">
      <div class="col-md-10">
        <?php if($this->session->flashdata('msg')!='') {?>
        <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
       <?php echo $this->session->flashdata('msg');?>    </div>        
        <?php } ?>
      </div>
    </div>
    <section class="content">
      <div class="row">
      <div class="box box-primary" style="margin: 7% 0 0 23%; width: 50%">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Career</h3>
            </div>
         
            <form role="form" method="post" action="<?php echo base_url('index.php/admin/EditCareer')?>" enctype="multipart/form-data">
                <div class="box-body" style="border:0px!important;">
            
            <div class="form-group">
              <label for="exampleInputPassword1">Position Name</label>
                <input class="form-control" type="text" name="position_name" value="<?php if(isset($career)) { echo $career->position_name; } ?>" required="required">
                <input class="form-control" type="hidden" name="id" value="<?php if(isset($career)) { echo $career->id; } ?>" required="required">
                <?php echo form_error('position_name'); ?>
              </div>
              

              <div class="form-group">
              <label for="exampleInputPassword1">Mission</label>
              <textarea style="height:120px !important;" class="form-control textarea" name="mission" required="required"><?php if(isset($career)) { echo $career->mission; } ?></textarea>        
                <?php echo form_error('Mission'); ?>
              </div>

              <div class="form-group">
              <label for="exampleInputPassword1">Location</label>
              <div id="points">
                <input class="form-control" type="text" name="location" value="<?php if(isset($career)) { echo $career->location; } ?>" required="required">
              </div>                
              </div>
              <div class="form-group">
              <label for="exampleInputPassword1">Type</label>
              <div>
                <select name="type" required="required" class="form-control" >
                  <option value="">Select Openings Type</option>
                  <option <?php if(isset($career) && $career->type=='Full Time Positions') { echo 'selected'; } ?>  value="Full Time Positions">Full Time Positions</option>
                  <option <?php if(isset($career) && $career->type=='Part Time Positions') { echo 'selected'; } ?> value="Part Time Positions">Part Time Positions</option>            
                </select>             
              </div>                
              </div>

              
              <div class="form-group">
              <label for="exampleInputPassword1" required="required">Others</label>
                <textarea style="height:120px !important;" class="form-control textarea" name="others"><?php if(isset($career)) { echo $career->others; } ?></textarea> 
                <?php echo form_error('Others'); ?>
              </div>
              
             
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update Opening</button>
            </div>
            </form>
            
          </div>
      </div>
     </section>
  </div>
 
  <div class="control-sidebar-bg"></div>
</div>

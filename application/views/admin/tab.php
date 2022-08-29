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
    </div>
    <section class="content">
      <div class="row">
        <div class="box box-primary" style="margin: 7% 0 0 23%; width: 50%">
          <div class="box-header with-border">
            <h3 class="box-title">Update Tab Heading</h3>
          </div>        
          <form role="form" method="post" action="<?php echo base_url('index.php/admin/tabs')?>">
            <div class="box-body" style="border:none!important;">
              
              <div class="form-group">
                <label for="exampleInputPassword1">Tab First Heading
                  </label>
                  <input class="form-control" type="text" name="tab_one_heading" value="<?php echo $overview->tab_one_heading;?>">
                  <?php echo form_error('tab_one_heading'); ?>
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Tab Second Heading
                  </label>
                  <input class="form-control" type="text" name="tab_second_heading" value="<?php echo $overview->tab_second_heading;?>">
                  <?php echo form_error('tab_second_heading'); ?>
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Tab Third Heading
                  </label>
                  <input class="form-control" type="text" name="tab_third_heading" value="<?php echo $overview->tab_third_heading;?>">
                  <?php echo form_error('tab_third_heading'); ?>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Tab Four Heading
                  </label>
                  <input class="form-control" type="text" name="tab_four_heading" value="<?php echo $overview->tab_four_heading;?>">
                  <?php echo form_error('tab_four_heading'); ?>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Tab Five Heading
                  </label>
                  <input class="form-control" type="text" name="tab_five_heading" value="<?php echo $overview->tab_five_heading;?>">
                  <?php echo form_error('tab_five_heading'); ?>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Tab Six Heading
                  </label>
                  <input class="form-control" type="text" name="tab_six_heading" value="<?php echo $overview->tab_six_heading;?>">
                  <?php echo form_error('tab_six_heading'); ?>
                </div>
                
               <!--  <div class="form-group">
                <label for="exampleInputPassword1">Over View Text</label>
                <textarea class="form-group textarea" name="overView"><?php //echo $overview->overview;?></textarea>
                <?php //echo form_error('overView'); ?>
              </div> -->
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Tab</button>
              </div>
            </form>
            <?php
            if(isset($errorMsg))
            {
            echo '<div class="lb_custom_error_msg">';
              echo $errorMsg;
            echo '</div>';
            unset($errorMsg);
            }
            ?>
          </div>
        </div>
      </section>
    </div>
    
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
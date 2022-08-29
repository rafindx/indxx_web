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
        <li class="active">Add Notification</li>
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
              <h3 class="box-title">Edit Notification</h3>
            </div>
            <form role="form" method="post" action="<?php echo base_url('index.php/admin/updatenotifications')?>" enctype="multipart/form-data">
                <input type="hidden" name="notfiid" value="<?php if(isset($notification)) { echo $notification->id; }?>" >
                <div class="box-body" style="border:none!important;"> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Notification Title</label>
                  <input required="required" value="<?php echo set_value('title');?><?php if(isset($notification)) { echo $notification->title; }?>" name="title" type="text" class="form-control" >
                  

                </div>
                <div class="form-group hide">
                  <label for="exampleInputPassword1">Notification Url</label>
                  <input value="<?php echo set_value('url');?><?php if(isset($notification)) { echo $notification->url; }?>" name="url" type="url" class="form-control" >
               
                </div>
                     <label for="exampleInputPassword1">Notification Date</label>
                  <div class="input-group">
                      <input  value="<?php echo set_value('year');?><?php if(isset($notification)) { echo date('m-d-Y',strtotime($notification->date)); }?>" name="year" id="datetimepicker" type="text" class="form-control date" required="required">                
    <label class="input-group-addon btn open-datetimepicker" for="date">
       <span class="fa fa-calendar open-datetimepicker"></span>
    </label>
</div>
                 <div class="form-group">
                  
                 

                  <div class="form-group" style="margin-top:12px;">
                  <label for="exampleInputPassword1">Upload PDF</label>
                  <input value="" name="file" type="file" class="form-control" style="border:none;" accept=".pdf" >
                
                </div> 
                  <div class="col-md-6">
                <div class="form-group">
                    <?php if(isset($notification)) { ?>
                   <a href="<?php echo base_url('/assets/images/media/').$notification->pdf; ?>" download=""><?php if(isset($notification)) { echo $notification->pdf;}?>  &nbsp;&nbsp;&nbsp;<i class="fa fa-download" aria-hidden="true"></i></a>
                    <?php } ?>
                </div> 
              </div>
               
              </div> 

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div></div>
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
 
  <div class="control-sidebar-bg"></div>
</div>

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
        <li class="active">Add Calendar</li>
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
              <h3 class="box-title"><?php if(isset($calendar)) { echo 'Edit'; }  else { echo 'Add'; }?>  Calendar</h3>
            </div>
            <form role="form" method="post" action="<?php echo base_url('index.php/admin/')?><?php if(isset($calendar)) { echo 'updateCalendar';} else {
             { echo 'calendar';}   
            }?>" enctype="multipart/form-data">
                <input type="hidden" name="notfiid" value="<?php if(isset($calendar)) { echo $calendar->id; } ?>">
              <div class="box-body" style="border:none!important;"> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Calendar Title</label>
                  <input required="required" value="<?php if(isset($calendar)) { echo $calendar->title;} ?>" name="title" type="text" class="form-control" >
                  

                </div>
                 <label for="exampleInputPassword1">Calendar Date</label>
                  <div class="input-group">
                     
                      <input required="" id="datepicker" value="<?php echo set_value('year');?><?php if(isset($calendar)) { echo date('m-d-Y',strtotime($calendar->date)); } ?>" name="year" type="texr" class="date form-control" >
                     <label class="input-group-addon btn open-datetimepicker" for="date">
       <span class="fa fa-calendar open-datetimepicker"></span>
    </label>
</div>
                 <div class="form-group">
                 <div class="form-group" style="margin-top:12px;">
                  <label for="exampleInputPassword1">Upload PDF</label>
                  <input  name="file" type="file" class="form-control" style="border:none;" accept=".pdf" >
                
                </div>
                     
               
              </div> 
                  <div class="col-md-12">
                <div class="form-group">
                    <?php if(isset($calendar) && $calendar->pdf!='') { ?>
                   <a href="<?php echo base_url('/assets/media/calendar/').$calendar->pdf; ?>" download=""><?php if(isset($calendar)) { echo $calendar->pdf;}?>  &nbsp;&nbsp;&nbsp;<i class="fa fa-download" aria-hidden="true"></i></a>
                    <?php } ?>
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

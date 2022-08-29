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
      <div class="box box-primary" style="margin: 4% 0 0 5%; width: 95%">
        <div class="box-header with-border">
          <h3 class="box-title">Update Overview Text</h3>
        </div>        
        <form method="post" action="<?php echo base_url('index.php/admin/updateOverView') ?>">
           <div class="box-body" style="border:none!important;">
      
                <div class="form-group">
              <label for="exampleInputPassword1">Overview Title</label>
                <input class="form-control" type="text" 
                       name="overview_title" value="<?php echo $overview->overview_title; ?>">
               
              </div>
               <div class="form-group">
        <label for="exampleInputPassword1">Overview Text</label>
        <textarea class="form-group textarea" name="overview"><?php echo $overview->overview;?></textarea>
        <?php echo form_error('overview'); ?>
        </div> <div class="row" onclick="addnewtr()"><span class="pull-right btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></span>
             </div> 
              <table class="lignesTbl">
               <?php 
               if(isset($overviewdata)) {
               foreach($overviewdata as $data) { ?>
               <tr>
                   <td><input type="hidden" name="id[]" value="<?php echo  $data->id?>"><div class="form-group"><input type="text" name="date[]" value="<?php echo date('m/d/Y',strtotime($data->date))  ?>"  class="date form-control"></div></td>
                   <td style="width:80%;     margin-left: 20px;"><div class="form-group    "><input type="text" name="overviewdesc[]" value="<?php echo $data->overview  ?>" class="form-control"></div></td>
              <td onclick="$(this).closest('tr').empty()"><i><i class="fa fa-remove"></i></i></td>
               </tr>

               <?php } } ?>
                   </table>
         <div class="box-footer" style="padding-bottom:0px!important;">
              <button type="submit" class="btn btn-primary">Update Overview Text</button>
            </div>
            </div>  
          
        </form>

        <form role="form" method="post" action="<?php echo base_url('index.php/admin/addOverView')?>" enctype="multipart/form-data" >

          <div class="box-body" style="border:none!important;">
            
            <div class="form-group">
              <label for="exampleInputPassword1">Heading</label>
                <input class="form-control" type="text" 
                name="heading" value="">
                <?php echo form_error('heading'); ?>
              </div>

           
<!--                <a id="add_link">Add More Points</a>-->
              
                <script type="text/javascript">
                  var counter = 1;
                  $(function(){
                   $('#add_link').click(function(){
                   counter += 1;
                   $('#points').append(   
                   '<textarea id="field_' + counter + '" class="form-control" type="text" name="points[]">Point ' + counter + '</textarea><br />'                
                    );

                   });
                  });
                  </script>


               
              </div>



              <div class="form-group">
              <label for="exampleInputPassword1">Text After Heading
                </label>
                <textarea class="form-group textarea" name="text_after_point"></textarea> 
                <?php echo form_error('text_after_point'); ?>
              </div>
              <div class="form-group">
              <label for="exampleInputPassword1">Image</label>
                <input class="form-control" type="file" style="border:none;" name="file" value="" required="required">
                <?php echo form_error('file'); ?>
              </div>
             
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update Tab</button>
            </div>
          </form>
         
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
  </style>
  <!-- Control Sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<script type="text/javascript">
  function addnewtr() {
    
    
    $('.lignesTbl tr:last').after(' <tr><td><input type="hidden" name="id[]" value=""><div class="form-group"><input type="text" name="date[]" value=""  class="date form-control"></div></td><td style="width:80%;     margin-left: 20px;"><div class="form-group    "><input type="text" name="overviewdesc[]" value="" class="form-control"></div></td><td onclick=$(this).closest("tr").empty()><i><i class="fa fa-remove"></i></i></td></tr>');

      var date_input=$('.date'); //our date input has the name "date"
      $('.open-datetimepicker').click(function(event){
    event.preventDefault();
    $('.date').focus();
});
   
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate: '+0d'
      };
      date_input.datepicker(options);
  }
</script>
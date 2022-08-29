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
        <div class="box box-primary" >
          <div class="box-header with-border">
            <h3 class="box-title">Add Index Description</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          
          <form role="form" method="post" action="<?php echo base_url('index.php/admin/addIndxxDesc')?>" enctype="multipart/form-data" >
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
                  <input class="form-control" type="hidden" name="indxx_id" value="<?php echo $indxx->id;?>">
                  <?php echo form_error('indxx_id'); ?>
                </div>
              </div>
              <div class="form-group">
                
                <div>
                  <input class="form-control" type="hidden" name="indxx_name" value="<?php echo $indxx->name;?>" >
                  <?php echo form_error('indxx_name'); ?>
                </div>
              </div>
              
              
              <div class="form-group">
                
                <div>
                  <input class="form-control" type="hidden" name="code" value="<?php echo $indxx->code;?>" >
                  <?php echo form_error('code'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Index Dividend Yield</label>
                <div>
                  <input class="form-control" type="text" name="dividend_yield" value="" >
                  <?php echo form_error('dividend_yield'); ?>
                </div>
              </div>
                 <div class=" hide form-group">
                <label for="exampleInputPassword1">Index Live Date</label>
                <div>
                  <input class="form-control date" type="text" name="live_date" value="" >
                  <?php echo form_error('live_date'); ?>
                </div>
              </div>
              <div class="form-group">
                
                <div>
                  <input class="form-control" type="hidden" name="indxx_type" value="<?php echo $indxx->tabname;?>" >
                  <?php echo form_error('indxx_type'); ?>
                  
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Return Type</label>
                <div>
                 
                  <select class="form-control"  name="return_type">
                    <option value="">Select Return Type</option>
                    <option value="TR">TR</option>
                    <option value="PR">PR</option>
                     <option value="NTR">NTR</option>
                    
                  </select>
                  
                  <?php echo form_error('return_type'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Index Description</label>
                <div>
                  <textarea name="indxx_desc" class="form-control"></textarea>
                  <?php echo form_error('indxx_desc'); ?>
                </div>
              </div>
              <div class="form-group">
                
                <div>
                  <input class="form-control" type="hidden" name="benchmark" value="<?php echo $banchmarkName->name;?>" >
                  <input class="form-control" type="hidden" name="benchmark_return_type" value="<?php echo $banchmarkName->return_type;?>" >
                  <?php echo form_error('benchmark'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Upload Methodology</label>
                <div>
                  
                  <div class="col-md-12" style="padding-left:0px;">
                    <form method="post" action="<?php echo base_url('index.php/admin/UploadMethodology')?>" enctype="multipart/form-data">
                      <div class="col-md-12" style="padding-left:0px;">
                        <input type="file" name="methodology_file" id="methodology_file" required accept=".pdf" />
                      </div>
                      <div class="col-md-3">
                        <!-- <button type="submit" name="saveMethodology" class="btn btn-info" id="saveMethodology">Upload</button> -->
                      </div>
                    </form>
                    <!-- /.box-body -->
                    <div class="form-group col-md-12" style="padding-left:0px;">
                      <div class="box-footer col-md-6"" style="text-align:left;padding-left:0px;float:left;

margin-top: 10px;">
                        <button type="submit" class="btn btn-primary">Save & Continue</button>
                      </div>
                      <?php if($this->session->flashdata('msg')!='') {?>
                      <div class="box-footer col-md-6"">
                        <!-- <a href="<?php echo base_url('index.php/admin/indxxValue'); ?>" class="btn btn-primary pull-right">Next</a>      -->
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
        <script type="text/javascript">
        // AJAX call for autocomplete
        $(document).ready(function(){
        $("#search").keyup(function(){
        
        $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/admin/getIndex')?>",
        data:'keyword='+$(this).val(),
        beforeSend: function(){
        $("#search").css("background","red url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
        $('#suggesstion').removeClass('hide');
        $("#suggesstion").show();
        $("#suggesstion").html(data);
        $("#search").css("background","#FFF");
        
        }
        });
        });
        });
        </script>
        <script type="text/javascript">
        function selectCountry(val) {
        $("#search").val(val);
        $('#suggesstion').addClass('hide');
        }
        </script>
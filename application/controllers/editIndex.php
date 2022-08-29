<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-5 box-form small-div">
            <form role="form" method="post" action="<?php echo base_url('index.php/admin/updateIndexx')?>" enctype="multipart/form-data" >
              <div class="box-body ">
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Name</label>
                  <div>
                    <input class="form-control" type="text" name="name" value="<?php echo $indxx->name?>" >
                    <input class="form-control" type="hidden" name="indexx" value="<?php echo $indexId?>" >
                    <?php echo form_error('name'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Code</label>
                  <div>
                    <input class="form-control" type="text" name="code" value="<?php echo $indxx->code?>" >
                    <?php echo form_error('code'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Benchmark</label>
                  <div>
                    <select class="form-control" type="number" name="benchmark_id">
                      <option>Select Benchmark</option>
                      <?php foreach ($banchmark as $banch) { ?>.
                      <option value="<?php echo $banch->id?>" <?php if($indxx->benchmark_id == $banch->id){ ?> selected="select" <?php } ?> ><?php echo $banch->name?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('benchmark_id'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Currency</label>
                  <div>
                    <input class="form-control" type="text" name="curr" value="<?php echo $indxx->curr?>" >
                    <?php echo form_error('curr'); ?>
                  </div>
                </div>
                <input type="hidden" name="weeklyreturn" value="0">
                
                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Index Tab Name</label>
                  <div>
                    <select name="tabname" class="form-control">
                      <option value="">Select Tab Name</option>
                      <?php foreach ($tab as $tab) { ?>
                      <option value="<?php echo $tab->name?>" <?php if($indxx->tabname == $tab->name){ ?> selected="select" <?php } ?>><?php echo $tab->name?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                </div>
                <input type="hidden" name="weighttype" value="0">
                <input type="hidden" name="datecheck" value="0">
                
                <div class="form-group col-md-12">
                  <div class="col-md-6"">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6 box-form">
           
            <form role="form" method="post" action="<?php echo base_url('index.php/admin/updateIndexxDesc')?>" enctype="multipart/form-data" >
              <div class="box-body ">
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Dividend Yield</label>
                  <div>
                    <input class="form-control" type="text" name="dividend_yield" value="<?php echo $divin->dividendyield; ?>" >
                    <input class="form-control" type="hidden" name="indxx_name" value="<?php echo $indexxValue->name;?>" >
                    <input class="form-control" type="hidden" name="code" value="<?php echo $indexxValue->code;?>" >
                    <input class="form-control" type="hidden" name="benchmark" value="<?php echo $indexxValue->benchmark_id;?>" >
                    <input class="form-control" type="hidden" name="indxx_type" value="<?php echo $indexxValue->tabname;?>">
                    <input class="form-control" type="hidden" name="indexx" value="<?php echo $indexId?>" >
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Return Type</label>
                  <div>
                    <select name="return_type" class="form-control">
                      <option <?php if($divin->return_type == 'TR'){?> selected="select" <?php } ?> value="TR">TR</option>
                      <option <?php if($divin->return_type == 'PR'){?> selected="select" <?php } ?> value="PR">PR</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Index Description</label>
                  <div>
                    <textarea name="indxx_desc" class="form-control"><?php echo $divin->index_description ; ?></textarea>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  
                  <button type="submit" class="btn btn-primary">Update</button>
                  
                </div>
              </div>
            </form>
            
            
          </div>
          
          
        </div>
      </div>
      
      
      
      <div class="row next">
        <div class="col-md-6 data">
          <h6>Upload Historical Data</h6>
          <div class="col-md-10">
            <form method="post" action="<?php echo base_url('index.php/admin/uploadValue')?>" enctype="multipart/form-data">
              <div class="col-md-6">
                
                <input type="hidden" value="<?php echo $indexId ?>" name="indexId">
                <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
              </div>
              
              <div class="col-md-3">
                <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Upload</button>
              </div>
              
            </form>
          </div>
        </div>
        <?php if($indxx->weighttype=='0'){ ?>
        <div class="col-md-6 data">
          <h6>Upload Factsheets</h6>
          <div class="col-md-10">
            <form method="post" action="<?php echo base_url('index.php/admin/uploadValue')?>" enctype="multipart/form-data">
              <div class="col-md-6">
                
                <input type="hidden" value="<?php echo $indexId ?>" name="indexId">
                <input type="file" name="csv_file" id="csv_file" required accept=".pdf" />
              </div>
              
              <div class="col-md-3">
                <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Upload</button>
              </div>
              
            </form>
          </div>
        </div>
        <?php }else{ ?>
        <div class="col-md-6 data">
          <h6>Upload Constituent</h6>
          <div class="col-md-10">
            <form method="post" action="<?php echo base_url('index.php/admin/uploadValue')?>" enctype="multipart/form-data">
              <div class="col-md-6">
                
                <input type="hidden" value="<?php echo $indexId ?>" name="indexId">
                <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
              </div>
              
              <div class="col-md-3">
                <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Upload</button>
              </div>
              
            </form>
          </div>
        </div>
        <?php } ?>
      </div>
      <?php if($indxx->weighttype=='0'){ ?>
      <div class="row">
        <div class="col-md-12 data heder-div" style="text-align: center;">
          <h6>Add Top 5 Constituent</h6>
        </div>
        <div class="col-md-12" style="text-align: center; margin-bottom: 10%">
          <div class="col-md-12">
            <form action="<?php echo base_url('index.php/admin/editIndex')?>" method="post">
              <input type="hidden" value="<?php echo $indexId ?>" name="indexId">
              <input type="text" class="add"  value="" name="costotent" placeholder="Enter Number">
              <button type="submit" class="btn btn-primary custom">Add</button>
            </form>
            
          </div>
        </div>
      </div>
      
      <!--  Constitunet -->
      <?php if($costotentValue!=''){ ?>
      <div class="row">
        <div class="col-md-12">
          <form role="form" method="post" action="<?php echo base_url('index.php/admin/AddConstitument')?>" enctype="multipart/form-data" >
            
            <input type="hidden" value="<?php echo $indexId ?>" name="indexId">
            <input type="hidden" value="<?php  if($indxx_charecterstics) { echo $indxx_charecterstics->no_of_constituents; } ?>" name="no_of_constituents">
            
            <?php
            if(!empty($indxx_top_5_constituents))
            { ?>
            <div class="box-body ">
              <div class="form-group col-md-4">
                <label for="exampleInputPassword1">Constituent</label>
              </div>
              
              <div class="form-group col-md-4">
                <label for="exampleInputPassword1">ISIN</label>
              </div>
              
              <div class="form-group col-md-4">
                <label for="exampleInputPassword1">Weight</label>
              </div>
              <!-- <div class="form-group col-md-3">
                <label for="exampleInputPassword1">Date</label>
              </div> -->
            </div>
            <?php $i=1;
            foreach ($indxx_top_5_constituents as $data) {  ?>
            <div class="box-body ">
              <div class="form-group col-md-4">
                <div>
                  <input required="required" type="hidden" name="id[<?= $i ?>]" value="<?php echo $data->id; ?>"   >
                  <input required="required" class="form-control" type="text" name="constituent[<?= $i ?>]" value="<?php echo $data->constituent; ?>"   >
                </div>
              </div>
              <div class="form-group col-md-4">
                <div>
                  <input required="required" class="form-control" type="text" name="ISIN[<?= $i ?>]" value="<?php echo $data->ISIN; ?>" >
                </div>
              </div>
              
              <div class="form-group col-md-4">
                <div>
                  <input required="required" class="form-control" type="text" name="weight[<?= $i ?>]" value="<?php echo $data->weight; ?>" >
                </div>
              </div>
              <!--  <div class="form-group col-md-3">
                <div>
                  <input class="form-control" required="required"  type="date" name="cdate[<?= $i ?>]" value="<?php echo $data->cdate; ?>" >
                  
                </div>
              </div> -->
            </div>
            <?php
            $i++; }
            }
            else if(!empty($indxx_charecterstics)) { ?>
            <div class="box-body ">
              <div class="form-group col-md-4">
                <p style="text-align: center;"> <label for="exampleInputPassword1">Constituent</label></p>
              </div>
              
              <div class="form-group col-md-4">
                <p style="text-align: center;"><label for="exampleInputPassword1">ISIN</label></p>
              </div>
              
              <div class="form-group col-md-4">
                <p style="text-align: center;"><label for="exampleInputPassword1">Weight</label></p>
              </div>
              <!-- <div class="form-group col-md-3">
                <label for="exampleInputPassword1">Date</label>
              </div> -->
            </div>
            <?php for($i=1;$i<=$costotentValue;$i++) {
            ?>
            <div class="box-body ">
              <div class="form-group col-md-4">
                
                <div>
                  <input required="required" class="form-control" type="text" name="constituent[<?= $i ?>]" value=""   >
                  
                  
                </div>
              </div>
              <div class="form-group col-md-4">
                
                <div>
                  <input required="required" class="form-control" type="text" name="ISIN[<?= $i ?>]" value="" >
                  
                </div>
              </div>
              
              <div class="form-group col-md-4">
                
                <div>
                  <input required="required" class="form-control" type="text" name="weight[<?= $i ?>]" value="" >
                  
                </div>
              </div>
              <!--  <div class="form-group col-md-3">
                
                <div>
                  <input class="form-control" required="required"  type="date" name="cdate[<?= $i ?>]" value="" >
                  
                </div>
              </div> -->
            </div>
            <?php
            } }
            if($indxx_charecterstics) {
            ?>
            <div class="form-group col-md-12">
              <div class="col-md-6"">
                <button type="submit" class="btn btn-primary">Update </button>
              </div>
              
            </div>
            <?php } ?>
          </form>
        </div>
      </div>
      <?php }} ?>
    </div>
    <!-- constitument -->
    
    
    <!-- /.content-wrapper -->
    
    
    <!-- Trigger the modal with a button -->
    
    <!-- Modal -->
    
    
    <style type="text/css">
    textarea.form-group.textarea {float: left;width: 100%;min-height: 150px;resize: none;padding: 5px;}
    div#example_length {width: 50% !important;float: left !important;}
    div#example_filter { width: 50% !important;float: left !important;}
    .tab-content {
    padding: 30px 22px;
    }
    .data h6 {
    padding: 10px 46px;
    font-size: 18px;
    }
    .data form {
    padding-left: 19px;
    }
    textarea.form-control {
    min-height: 108px;
    resize: none;
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
  <style type="text/css">
  input.add { padding: 5px 13px;}
  button.btn.btn-primary.custom {top: 0;position: absolute; border-radius: 0 !important;  padding: 6px 26px;}
  .box-form {
    background-color: #fff;
}
.col-md-5.box-form.small-div {
    margin-right: 8%;
}
  </style>
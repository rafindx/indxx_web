<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/style.css">
<div class="wrapper">
  <header class="main-header">
    <a href="" class="logo">
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
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Tab Overview</li>
      </ol>
    </section>
    <div class="row">
      <div class="col-md-10">
        <?php if($this->session->flashdata('msg')!='') { ?>
        <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Success!</strong><?php echo $this->session->flashdata('msg');?>    </div>        
        <?php } ?>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        
        

        <div class="col-md-12" style="background-color: #fff;">
    <div class="box box-primary" >
      <div class="box-header with-border">
            <h3 class="box-title">Add New Index</h3>
          </div>
         <form role="form" method="post" action="<?php echo base_url('index.php/admin/addIndxx')?>" enctype="multipart/form-data" >
              <div class="box-body">
               <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Index Type</label>
                  <div>
                   <select class="form-control"  name="weighttype" required>
                      <option value="">Select Index Type</option>
                      <option value="0">Static</option>
                       <option value="1">Dynamic</option>                                       
                    </select> 
                   </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Name</label>
                  <div>
                    <input class="form-control" type="text" name="name" required="required" >
                    <?php echo form_error('name'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Code</label>
                  <div>
                    <input class="form-control" type="text" name="code" required="required" >
                    <?php echo form_error('code'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Benchmark</label>
                  <div>
                    <select class="form-control"  name="benchmark_id" required>
                      <option value="">Select Benchmark</option>
                      <?php foreach ($banchmark as $banch) { ?>
                      <option value="<?php echo $banch->indxx_id?>"><?php echo $banch->indxx_name." ".$banch->return_type;  ?></option>
                      <?php } ?>                      
                    </select> 

                    <?php echo form_error('benchmark_id'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Currency</label>
                  <div>
                    <input class="form-control" type="text" name="curr" required="required" >
                    <?php echo form_error('curr'); ?>
                  </div>
                </div>
                
                <input type="hidden" name="weeklyreturn" value="0">
               <!--  <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Indxx  Weekly Return</label>
                  <div>
                    <select name="weeklyreturn" class="form-control" required="required">
                      <option value="">Select Weekly Return</option>
                      <option value="1">Yes</option>
                      <option value="2">No</option>
                    </select>
                    <?php echo form_error('weeklyreturn'); ?>
                  </div>
                </div> -->
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Tab Name</label>
                  <div>
                      <select name="tabname" class="form-control" onchange="showcompany(this.value)" required>
                      <option value="">Select Tab Name</option>                      
                      <?php foreach ($tab as $tab) { ?>
                      <option value="<?php echo $tab->name?>"><?php echo $tab->name?></option>
                      <?php } ?>
                     </select>
                      <?php echo form_error('tabname'); ?>
                    </div>
                  </div>
               <div class="form-group col-md-6" id="company" style="display:none" >
                  <label for="exampleInputPassword1">Company </label>
                  <div>
                    <select name="companyname" class="form-control" >
                      <option value="">Select Company Name</option>                      
                      <?php foreach ($company as $company) { ?>
                      <option value="<?php echo $company->id?>"><?php echo $company->company_name ?></option>
                      <?php } ?>
                     </select>
                    
                    </div>
                  </div>
                  
                  <div class="form-group col-md-3" id="regionCountry" style="margin-top: 22px; display:none" >
                  <div>
                      <input type="checkbox" id="vehicle1" name="region_country" value="regionCountry">
                      <label for="vehicle1"> Region/Country</label><br>
                    
                    </div>
                  </div>
                  <div class="form-group col-md-3" id="sector" style="margin-top: 22px; display:none" >
                  <div>
                      <input type="checkbox" id="vehicle2" name="sector" value="sector">
                      <label for="vehicle2"> Sector</label><br>
                    
                    </div>
                  </div>
                  
                  <!-- <input type="hidden" name="weighttype" value="0"> -->
                   <input type="hidden" name="datecheck" value="0">
                   <input type="hidden" name="productlist" value="2">
                 <!--  <div class="form-group col-md-6" >
                    <label for="exampleInputPassword1">Indxx Date Check</label>
                    <div>
                      <select name="datecheck" class="form-control" required="required">
                        <option value="">Select Date Check</option>
                        <option value="0">Date not matching</option>
                        <option value="1">Date Matches</option>
                      </select>
                      <?php echo form_error('datecheck'); ?>
                    </div>
                  </div> -->
                  <div class="form-group col-md-6">
                 <!--  <label for="exampleInputPassword1">Index Status</label>
                  <div>
                    <select name="productlist" class="form-control" required="required">
                      <option value="">Select Status</option>
                      <option value="1">Active</option>
                      <option value="2">Deactive</option>
                    </select>
                    <?php echo form_error('productlist'); ?>
                  </div> -->
                </div>
                <div class="col-md-12"> 
                <h6><b>INDEX CONSTITUENTS</b></h6>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">ISIN</label>
                  <div>
                    <input class="form-control" type="hidden" name="indexx" value="<?php echo @$indexId?>" >
                    <select name="is_isin" class="form-control">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Company Name</label>
                  <div>
                    <select name="is_company_name" class="form-control">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Weight</label>
                  <div>
                    <select name="is_weight" class="form-control">
                      <option value="1">Yes</option>
                      <option  value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Show All Constituents</label>
                  <div>
                    <select name="is_all" class="form-control">
                      <option value="1">Yes</option>
                      <option  value="0">No (Only Five)</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Methodology</label>
                  <div>
                    <select name="is_methodology" class="form-control">
                      <option value="1">Yes</option>
                      <option  value="0">No</option>
                    </select>
                  </div>
                </div>
                </div>
                <div class="form-group col-md-12">                  
                  <div class=" col-md-6" style="padding-left: 0px;padding-right: 0px;">
                    <button type="submit" class="btn btn-primary">Save & Continue</button>
                  </div>

                  <?php if($this->session->flashdata('msg')!='') {?>
                    <div class="col-md-6"">
                   <!--  <a href="<?php echo base_url('index.php/admin/indxxValue'); ?>" class="btn btn-primary pull-right">Next</a> -->
                    <a href="<?php echo base_url('index.php/admin/indxxDesc'); ?>" class="btn btn-primary pull-right">Next</a>
                   
                  </div>
                    <?php } ?>
                  </div>
                </form>
        </div>
      </div>

      </div>
      
      
    </div>
  </div>
      
      <style type="text/css">
      textarea.form-group.textarea {float: left;width: 100%;min-height: 150px;resize: none;padding: 5px;}
      div#example_length {width: 50% !important;float: left !important;}
      div#example_filter { width: 50% !important;float: left !important;}
      .tab-content {
      padding: 30px 22px;
      }
      </style>
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
    } );
    
    function showcompany(val)
    {
        if(val=='Other Indices')
        {
            $('#company').show();
            $('#regionCountry').hide();
            $('#sector').hide();
        }
        else if(val == 'Benchmark')
        {
          $('#regionCountry').show();
          $('#sector').show();
          $('#company').hide();
        }
        else
        {
            $('#company').hide();
            $('#regionCountry').hide();
            $('#sector').hide();
        }
    }
    </script>
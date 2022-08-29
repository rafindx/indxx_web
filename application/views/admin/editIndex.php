<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<div class="wrapper">
  <header class="main-header">
    <a href="" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Indxx</b>CMS</span>
    </a>
  </header>
  <aside class="main-sidebar">
    <?php @$this->load->view('admin/sidebar');?>
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
        <?php if(@$this->session->flashdata('msg')!='') {?>
        <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Success!</strong><?php echo @$this->session->flashdata('msg');?>    </div>
        <?php } ?>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6 box-form small-div">
            <form role="form" method="post" action="<?php echo base_url('index.php/admin/updateIndexx')?>" enctype="multipart/form-data" >
              <div class="box-body ">
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Name</label>
                  <div>
                    <input class="form-control" type="text" name="name" value="<?php echo @$indxx->name?>" >
                    <input class="form-control" type="hidden" name="indexx" value="<?php echo @$indexId?>" >
                    <?php echo form_error('name'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Code</label>
                  <div>
   
                    <input class="form-control" type="text" name="code" value="<?php echo @$indxx->code?>" >
                    <?php echo form_error('code'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Benchmark</label>
                  <div>
                    <select class="form-control" type="number" name="benchmark_id">
                      <option>Select Benchmark</option>
                      <?php foreach ($banchmark as $banch) { ?>
                      <option value="<?php echo $banch->indxx_id?>" <?php if(@$indxx->benchmark_id == @$banch->indxx_id){ ?> selected="select" <?php } ?> ><?php echo @$banch->indxx_name." ".$banch->return_type; ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('benchmark_id'); ?>
                  </div>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Index Currency</label>
                  <div>
                    <input class="form-control" type="text" name="curr" value="<?php echo @$indxx->curr?>" >
                    <input type="hidden" name="return_type" value="<?php echo @$divin->return_type; ?>" >
                    <?php echo form_error('curr'); ?>
                  </div>
                </div>
                <input type="hidden" name="weeklyreturn" value="0">
                
                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Index Tab Name</label>
                  <div>
                    <select name="tabname" class="form-control" onchange="showcompany(this.value)">
                      <option value="">Select Tab Name</option>
                      <?php foreach ($tab as $tab) { ?>
                      <option value="<?php echo @$tab->name?>" <?php if(@$indxx->tabname == @$tab->name){ ?> selected="select" <?php } ?>><?php echo @$tab->name?></option>
                      <?php } ?>
                    </select>
                    
                  </div>
                </div>
                 <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Meta Title</label>
                  <div>
                    <input class="form-control" type="text" name="meta_title" value="<?php echo @$indxx->meta_title?>" >
                    <?php echo form_error('meta_title'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Meta Keywords</label>
                  <div>
                    <input class="form-control" type="text" name="meta_keywords" value="<?php echo @$indxx->meta_keywords?>" >
                    <?php echo form_error('meta_keywords'); ?>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Meta Description</label>
                  <div>
                    <input class="form-control" type="text" name="meta_description" value="<?php echo @$indxx->meta_description?>" >
                    <?php echo form_error('meta_description'); ?>
                  </div>
                </div>
                
                <div class="form-group col-md-12" id="company" <?php if($indxx->tabname == 'Other Indices') { } else { ?> style="display:none" <?php } ?> >
                  <label for="exampleInputPassword1">Company </label>
                  <div>
                    <select name="companyname" class="form-control" >
                      <option value="">Select Company Name</option>                      
                      <?php foreach ($company as $company) { ?>
                      <option value="<?php echo $company->id?>" <?php if(isset($selectedcompany) && $selectedcompany==$company->id ) { echo 'selected'; } ?>  ><?php echo $company->company_name ?></option>
                      <?php } ?>
                     </select>
                     
                    </div>
                  </div>
                  
                  <div class="form-group col-md-6" id="regionCountry" <?php if($indxx->tabname == 'Benchmark') { } else { ?> style="display:none" <?php } ?> >
                  <div>
                      <input type="checkbox" id="vehicle1" name="region_country" <?php if(@$indxx->region_country == 'regionCountry') {?>checked <?php }else{ } ?> value="regionCountry">
                      <label for="vehicle1"> Region/Country</label><br>
                    
                    </div>
                  </div>
                  
                  <div class="form-group col-md-6" id="sector" <?php if($indxx->tabname == 'Benchmark') { } else { ?> style="display:none" <?php } ?> >
                  <div>
                      <input type="checkbox" id="vehicle2" name="sector" <?php if(@$indxx->sector == 'sector') {?>checked <?php }else{ } ?> value="sector">
                      <label for="vehicle2"> Sector</label><br>
                    
                    </div>
                  </div>
                <input type="hidden" name="weighttype" value="<?php echo @$indxx->weighttype?>">
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
                  <input class="form-control" type="text" name="dividend_yield" value="<?php echo @$divin->dividendyield; ?>" >
                    
                    <input class="form-control" type="hidden" name="indxx_name" value="<?php echo @$indexxValue->name;?>" >
                    <input class="form-control" type="hidden" name="code" value="<?php echo @$indexxValue->code;?>" >
                    <input class="form-control" type="hidden" name="benchmark" value="<?php echo @$indexxValue->benchmark_id;?>" >
                    <input class="form-control" type="hidden" name="indxx_type" value="<?php echo @$indexxValue->tabname;?>">
                    <input class="form-control" type="hidden" name="indexx" value="<?php echo @$indexId?>" >
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Return Type</label>
                  <div>
                    <select name="return_type" class="form-control">
                      <option <?php if(@$divin->return_type == 'TR'){?> selected="select" <?php } ?> value="TR">TR</option>
                      <option <?php if(@$divin->return_type == 'PR'){?> selected="select" <?php } ?> value="PR">PR</option>
                      <option <?php if(@$divin->return_type == 'NTR'){?> selected="select" <?php } ?> value="NTR">NTR</option>
                    </select>
                  </div>
                </div>
                 <div class="form-group col-md-12 ">
                  <!-- <label for="exampleInputPassword1">Index Live Date</label> -->
                  <div>
                    <?php echo @$indxx_charecterstics->live_date; ?>
                    <input class="form-control date  " type="hidden" name="live_date" value="<?php echo date('m-d-Y',strtotime(@$charecterstics->live_date)); ?>" >
                <div class="form-group col-md-12">
                  <label for="exampleInputPassword1">Index Description</label>
                  <div>
                    <textarea name="indxx_desc" class="form-control"><?php echo @$divin->index_description ; ?></textarea>
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
          </div>
          <div class="container">
          <div class="row">
          <div class="col-md-12">
          <div class="col-md-12 box-form">   
          <h6><b>INDEX CONSTITUENTS</b></h6>         
            <form role="form" method="post" action="<?php echo base_url('index.php/admin/updateConstituents')?>" enctype="multipart/form-data" >
              <div class="box-body ">
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">ISIN</label>
                  <div>
                    <input class="form-control" type="hidden" name="indexx" value="<?php echo @$indexId?>" >
                    <select name="is_isin" class="form-control">
                      <option <?php if($indxx->is_isin==1){ echo "selected"; } ?> value="1">Yes</option>
                      <option <?php if($indxx->is_isin==0){ echo "selected"; } ?> value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Company Name</label>
                  <div>
                    <select name="is_company_name" class="form-control">
                      <option <?php if($indxx->is_company_name==1){ echo "selected"; } ?> value="1">Yes</option>
                      <option <?php if($indxx->is_company_name==0){ echo "selected"; } ?> value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Weight</label>
                  <div>
                    <select name="is_weight" class="form-control">
                      <option <?php if($indxx->is_weight==1){ echo "selected"; } ?> value="1">Yes</option>
                      <option <?php if($indxx->is_weight==0){ echo "selected"; } ?> value="0">No</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Show All Constituents</label>
                  <div>
                    <select name="is_all" class="form-control">
                      <option <?php if($indxx->is_all==1){ echo "selected"; } ?> value="1">Yes</option>
                      <option <?php if($indxx->is_all==0){ echo "selected"; } ?> value="0">No (Only Five)</option>
                    </select>
                  </div>
                </div>
                 <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Methodology</label>
                  <div>
                    <select name="is_methodology" class="form-control">
                      <option <?php if($indxx->is_methodology==1){ echo "selected"; } ?> value="1">Yes</option>
                      <option <?php if($indxx->is_methodology==0){ echo "selected"; } ?> value="0">No </option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-12">
                <label for="exampleInputPassword1"></label>
                  <div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
       <?php if(@$indxx->weighttype=='1'){ ?>
        <div class="row" style="margin-top:20px;">
        <div class="col-md-12">
          <!-- <form role="form" method="post" action="<?php echo base_url('index.php/admin/dynamicCon')?>" enctype="multipart/form-data" >
              <div class="box-body ">

               <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">No Of Top Constituent</label>
                  <div>
                  <input class="form-control" type="hidden" name="indexx" value="<?php echo @$indexId?>" >
                    <input class="form-control" type="text" name="no_of_top_constituents" value="<?php echo @$charecterstics->no_of_top_constituents;?>" >
                    <?php echo form_error('curr'); ?>
                  </div>
                </div>
                <?php  if(@$charecterstics->no_of_top_constituents=='0'){ ?>
                <div class="form-group col-md-6" style="margin-top: 26px;">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
                 <?php }else{ ?>
                  <div class="form-group col-md-6" style="margin-top: 26px;">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <?php } ?>
              </div>
              </form>
        </div> -->
        </div>
       <?php }?>
      <?php if(@$indxx->weighttype=='0'){ ?> 
        <div class="col-md-12">
    <div class="row" style="margin-top:20px;">
          <div class="col-md-3 box-form small-div">
            <form role="form" method="post" action="<?php echo base_url('index.php/admin/updateChar')?>" enctype="multipart/form-data" >
              <div class="box-body ">
                <input class="form-control" type="hidden" name="indexx" value="<?php echo @$indexId?>" >
                <input class="form-control" type="hidden" name="status" value="1" >
                <input class="form-control" type="hidden" name="dividend_yield" value="<?php echo @$divin->dividendyield;?>" >
                <div class="form-group">
                  <label for="exampleInputPassword1">Index Base Date</label>
                  <div>
                    <input class="form-control" type="date" name="base_date" value="<?php echo @$charecterstics->base_date;?>" >
                    <?php echo form_error('base_date'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Index No Of Constituent</label>
                  <div>
                    <input class="form-control" type="number" name="no_of_constituent" value="<?php echo @$charecterstics->no_of_constituents;?>" >
                    <?php echo form_error('no_of_constituent'); ?>
                  </div>
                </div>

                  <div class="form-group hide">
                  <label for="exampleInputPassword1">No Of Top Constituent</label>
                  <div>
                    <input class="form-control" type="number" name="no_of_top_constituent" value="0" >
                    <?php echo form_error('no_of_top_constituent'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Index 52 Week High/Low</label>
                  <div>
                    <input class="form-control" type="text" name="52_week_highlow" value="<?php echo @$charecterstics->{'52_week_highlow'};?>" >
                    <?php echo form_error('52_week_highlow'); ?>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <div class="box-footer col-md-6"">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-8 box-form small-div">
            <div class="box-body ">
              <div class="form-group col-md-3">
                <label for="exampleInputPassword1">Statiatics</label>
              </div>
              <div class="form-group col-md-1">
                <label for="exampleInputPassword1">QTD</label>
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputPassword1">YTD</label>
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputPassword1">1Year</label>
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputPassword1">3Year</label>
              </div>
              <div class="form-group col-md-2">
                <label for="exampleInputPassword1">Date</label>
              </div>
            </div>
            <?php $stic= array('Cumulative Return','Beta','Correlation','Standard Deviation');
              if(count($risk)>0) {
             foreach ($risk as $riskReturn) {   ?>
            <form method="post" action="<?php echo base_url('index.php/admin/updateRisk')?>">
              <div class="form-group col-md-12">
                <div class="col-md-3">
                  <input type="hidden" name="risk_id" value="<?php echo @$riskReturn->id?>">
                  <input readonly="" class="form-control" type="text" name="statistic" value="<?php echo @$riskReturn->statistic?>" >
                </div>
                <div class="col-md-1">
                  <input  class="form-control" style="width: 46px !important;" type="text" name="qtd" value="<?php echo (float)@$riskReturn->qtd ?>" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="ytd" value="<?php echo (float)@$riskReturn->ytd  ?>" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="1year" value="<?php echo (float)@$riskReturn->{'1year'} ?>" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="3year" value="<?php echo (float)@$riskReturn->{'3year'} ?>" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="sbd" value="<?php echo (float)@$riskReturn->sbd ?>" >
                </div>
                <div class="col-md-12" style="margin-top: 5px;">
                  <input   type="submit" name="btn" value="update" class="pull-right btn btn-primary" >
                </div>
              </div>
            </form>
            <?php }
if(count($risk)==3)
{ ?>
<form method="post" action="<?php echo base_url('index.php/admin/updateRiskByStatics')?>">
              <div class="form-group col-md-12">
                <div class="col-md-3">
                  <input type="hidden" name="risk_indxx_id" value="<?php echo $indxx->id; ?>">
                  <input readonly="" class="form-control" type="text" name="statistic" value="Correlation" >
                </div>
                <div class="col-md-1">
                  <input  class="form-control" style="width: 46px !important;" type="text" name="qtd" value="0.00" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="ytd" value="0.00" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="1year" value="0.00" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="3year" value="0.00" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="sbd" value="0.00" >
                </div>
                <div class="col-md-12" style="margin-top: 5px;">
                  <input   type="submit" name="btn" value="update" class="pull-right btn btn-primary" >
                </div>
              </div>
            </form>

            <?php } } else { ?>
               <form method="post" action="<?php echo base_url('index.php/admin/addRiskReturnStaticsValue')?>">
                   <input type="hidden" name="indxx" value="<?php echo $indxx->id; ?>">
            <?php for($i=0;$i<=3;$i++) { ?>
              <div class="form-group col-md-12">
                <div class="col-md-3">
                  <input type="hidden" name="statistic[]" value="<?php echo $stic[$i]; ?>">

                  <input readonly="" class="form-control" type="text" name="" value="<?php echo $stic[$i]; ?>" >
                </div>
                <div class="col-md-1">
                  <input  class="form-control" style="width: 46px !important;" type="text" name="qtd[]" value="" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="ytd[]" value="" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="oneyear[]" value="" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="threeyear[]" value="" >
                </div>
                <div class="col-md-2">
                  <input  class="form-control" type="text" name="sbd[]" value="" >
                </div>
                

              </div>
         <?php } ?>
         <div class="col-md-12 form-group" style="margin-top: 5px;">
                  <input   type="submit" name="btn" value="update" class="pull-right btn btn-primary" >
                </div>
            </form>
            <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
    <div class="container" style="margin-top:38px;">
      <div class="row next">
        <div class="col-md-4 data">
          <h6>Upload Historical Data</h6>
          <div class="col-md-12">
            <form method="post" action="<?php echo base_url('index.php/admin/uploadValue')?>" enctype="multipart/form-data">
              <div class="col-md-12">
                
                <input type="hidden" value="<?php echo @$indexId ?>" name="indexId">
                <input type="file" class="form-control" name="csv_file" id="csv_file" required accept=".csv" style="border:0;padding:0;" />
              </div>
              
              <div class="col-md-3">
                <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Upload</button>
              </div>

               <div class="col-md-12">
                <a download="Sample_Index_Values.csv" href="<?php echo base_url(); ?>/uploads/sample/Sample_Index_Values.csv">Download Sample CSV</a>
              </div>
              
            </form>
          </div>
        </div>

        <div class="col-md-4 data">
          <h6>Upload Methodology</h6>
          <div class="col-md-12">
            <form method="post" action="<?php echo base_url('index.php/admin/uploadMethodologyPdf')?>" enctype="multipart/form-data">
              <div class="col-md-12">
                <input type="hidden" value="<?php echo @$indexId ?>" name="indexId">
                <input type="file" class="form-control" name="methodologyFile" id="csv_file" required accept=".pdf" style="border:0;padding:0;" />
              </div>
              <div class="col-md-3">
                <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Upload</button>
              </div>
              
            </form>
          </div>
        </div>
     <div class="col-md-4 data">
          <h6>Upload Constituent</h6>
          <div class="col-md-12">
            <form method="post" action="<?php echo base_url('index.php/admin/uploadConstituent')?>" enctype="multipart/form-data">
              <div class="col-md-12">
                
                <input type="hidden" value="<?php echo @$indexId ?>" name="indexId">
                <input type="file" class="form-control" name="csv_file" id="csv_file" required accept=".csv" style="border:0;padding:0;" />
              </div>
              
              <div class="col-md-3">
                <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Upload</button>
              </div>
               <div class="col-md-12">
                <a download="Sample_Constituent.csv" href="<?php echo base_url(); ?>/uploads/sample/Sample_Constituent.csv">Download Sample CSV</a>
              </div>
              
            </form>
          </div>
        </div>
        <?php if(@$indxx->weighttype=='0'){ ?>
        <div class="col-md-4 data">
          <h6>Upload Factsheets</h6>
          <div class="col-md-12">
            <form method="post" action="<?php echo base_url('index.php/admin/uploadFactsheets')?>" enctype="multipart/form-data">
              <div class="col-md-12">
                
                <input type="hidden" value="<?php echo @$indexId ?>" name="indexId">
                <input type="file" class="form-control" name="uploadFactsheets" id="csv_file" required accept=".pdf" style="border:0;padding:0;" />
              </div>
              
              <div class="col-md-3">
                <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Upload</button>
              </div>

              
              
            </form>
          </div>
        </div>
        <?php } ?>
      </div></div>
      <?php if(@$indxx->weighttype=='0'){ ?>
      <div class="row">
        <div class="col-md-12 data heder-div" style="text-align: center;">
          <h6>Add Top Constituent</h6>
        </div>
       
      </div>
      
      <!--  Constitunet -->
      
      <div class="row">
        <div class="col-md-12">
          <form role="form" method="post" action="<?php echo base_url('index.php/admin/AddConstitument')?>" enctype="multipart/form-data" >
            
            <input type="hidden" value="<?php echo @$indexId ?>" name="indexId">
            <input type="hidden" value="<?php  if(@$charecterstics) { echo @$charecterstics->no_of_constituents; } ?>" name="no_of_constituents">
            
            <?php
            if(!empty(@$indxx_top_5_constituents))
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
            <?php @$i=1;
            foreach ($indxx_top_5_constituents as $data) {  ?>
            <div class="box-body ">
              <div class="form-group col-md-4">
                <div>
                  <input required="required" type="hidden" name="id[<?= @$i ?>]" value="<?php echo @$data->id; ?>"   >
                  <input required="required" class="form-control" type="text" name="constituent[<?= @$i ?>]" value="<?php echo @$data->constituent; ?>"   >
                </div>
              </div>
              <div class="form-group col-md-4">
                <div>
                  <input required="required" class="form-control" type="text" name="ISIN[<?= @$i ?>]" value="<?php echo @$data->ISIN; ?>" >
                </div>
              </div>
              
              <div class="form-group col-md-4">
                <div>
                  <input required="required" class="form-control" type="text" name="weight[<?= @$i ?>]" value="<?php echo @$data->weight; ?>" >
                </div>
              </div>
              
            </div>
            <?php @$i++; }?>
            <?php }else{ ?>
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
            </div>
            <?php for(@$i=1;@$i<=@$charecterstics->no_of_top_constituents;@$i++) { ?>
            <div class="box-body ">
              <div class="form-group col-md-4">
                
                <div>
                <input required="required" class="form-control" type="text" name="constituent[<?= @$i ?>]" value=""   >                   
                </div>
              </div>
              <div class="form-group col-md-4">                
                <div>
                  <input required="required" class="form-control" type="text" name="ISIN[<?= @$i ?>]" value="" >            
                </div>
              </div>
              
              <div class="form-group col-md-4">
                
                <div>
                  <input required="required" class="form-control" type="text" name="weight[<?= @$i ?>]" value="" >
                  
                </div>
              </div>
              
            </div>
            <?php }  ?>
            <?php } ?>        
            
            
            <div class="form-group col-md-12">
              <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Update </button>
              </div>
              
            </div>
            
          </form>
        </div>
      </div>
      <?php } ?>
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
    .col-md-3.box-form.small-div {
    margin-right: 8%;
    }
    
    </style>
    <!-- Control Sidebar -->
    <!-- <div class="control-sidebar-bg"></div> -->
  </div>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
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
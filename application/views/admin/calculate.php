<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
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
        <?php if($this->session->flashdata('msg')!='') {?>
        <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Success!</strong><?php echo $this->session->flashdata('msg');?>    </div>
        <?php } ?>
      </div>
    </div>
    <div class="container">
      
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#bench">Benchmark</a></li>
        <li><a data-toggle="tab" href="#esg">Esg</a></li>
        <li><a data-toggle="tab" href="#incom">Income</a></li>
        <li><a data-toggle="tab" href="#strategy">Strategy</a></li>
        <li><a data-toggle="tab" href="#themat">Thematic</a></li>
        <li><a data-toggle="tab" href="#other">Other Indices</a></li>        
      </ul>
      <div class="tab-content">
        <div id="bench" class="tab-pane fade in active">          
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>                
                <th>Indxx Type</th>
                  <th>Return Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_benchmark as $bench){ ?>
              <tr>
                <td><?php echo $bench->name;?></td>
                
                <td>
                  <?php
                $weighttype=  $this->indice->getWeightType($bench->indxx_id);
                  if($weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                </td>
                  <td><?php echo $bench->return_type;?></td>
                <td>
                  <div class="col-md-4">
                   <!--<form method="post" action="<?php echo base_url('index.php/Welcome/calculateRR')?>"> -->
                    <form method="post" action="<?php echo base_url('')?>test.php">
                    
                      <input type="hidden" value="<?php echo $bench->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Calculate">
                    </form>
                  </div>
                  
                 
                </td>
              </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
         <div id="esg" class="tab-pane fade">          
          <table id="example6" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>                
                <th>Indxx Type</th>
                   <th>Return Type</th>
                <th>Action</th>            
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_esg as $esg){ ?>
              <tr>
                <td><?php echo $esg->name;?></td>
               
                
                <td>
                   <?php
                $weighttype=  $this->indice->getWeightType($esg->indxx_id);
                  if($weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                  </div>
                </td>
                 <td><?php echo $esg->return_type;?></td>
                <td>
                 <div class="col-md-4">
                    <!--<form method="post" action="<?php echo base_url('index.php/Welcome/calculateRR')?>"> -->
                    <form method="post" action="<?php echo base_url('')?>test.php">
                      <input type="hidden" value="<?php echo $esg->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Calculate">
                    </form>
                  </div>
                </td>
              </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
        
         <div id="incom" class="tab-pane fade">          
          <table id="example2" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>                
                <th>Indxx Type</th>
                   <th>Return Type</th>
                <th>Action</th>            
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_income as $incom){ ?>
              <tr>
                <td><?php echo $incom->name;?></td>
               
                
                <td>
                   <?php
                $weighttype=  $this->indice->getWeightType($incom->indxx_id);
                  if($weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                  </div>
                </td>
                 <td><?php echo $incom->return_type;?></td>
                <td>
                 <div class="col-md-4">
                    <!--<form method="post" action="<?php echo base_url('index.php/Welcome/calculateRR')?>"> -->
                    <form method="post" action="<?php echo base_url('')?>test.php">
                      <input type="hidden" value="<?php echo $incom->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Calculate">
                    </form>
                  </div>
                </td>
              </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
        
        <div id="strategy" class="tab-pane fade">          
          <table id="example5" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>                
                <th>Indxx Type</th>
                   <th>Return Type</th>
                <th>Action</th>            
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_strategy as $strategy){ ?>
              <tr>
                <td><?php echo $strategy->name;?></td>
                <td>
                   <?php
                    $weighttype=  $this->indice->getWeightType($strategy->indxx_id);
                  if($weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                  </div>
                </td>
                 <td><?php echo $strategy->return_type;?></td>
                <td>
                 <div class="col-md-4">
                    <!--<form method="post" action="<?php echo base_url('index.php/Welcome/calculateRR')?>"> -->
                    <form method="post" action="<?php echo base_url('')?>test.php">
                      <input type="hidden" value="<?php echo $strategy->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Calculate">
                    </form>
                  </div>
                </td>
              </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
        <div id="themat" class="tab-pane fade">          
          <table id="example3" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>               
                <th>Indxx Type</th>
                 <th>Return Type</th>
                <th>Action</th>               
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_thematic as $themat){ ?>
              <tr>
                <td><?php echo $themat->name;?></td>             
                <td>
                  <?php if($themat->weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                </td>
                 <td><?php echo $themat->return_type;?></td>
                  <td>
                 <div class="col-md-4">
                    <!--<form method="post" action="<?php echo base_url('index.php/Welcome/calculateRR')?>"> -->
                    <form method="post" action="<?php echo base_url('')?>test.php">
                      <input type="hidden" value="<?php echo $themat->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Calculate">
                    </form>
                  </div>
                </td>
              </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>
           <div id="other" class="tab-pane fade">          
          <table id="example4" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>               
                <th>Indxx Type</th>
                 <th>Return Type</th>
                <th>Action</th>               
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_other as $other){ ?>
              <tr>
                <td><?php echo $other->name;?></td>
              
                <td>
                  <?php if($other->weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                </td>
                  <td><?php echo $other->return_type;?></td>
                <td>
                  <div class="col-md-4">
                    <!--<form method="post" action="<?php echo base_url('index.php/Welcome/calculateRR')?>"> -->
                    <form method="post" action="<?php echo base_url('')?>test.php">
                      <input type="hidden" value="<?php echo $other->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Calculate">
                    </form>
                  </div>
                 
                </td>
              </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <div class="container">
      
      <!-- Trigger the modal with a button -->
      
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" >
          
          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              
              <!-- <h4 class="modal-title">Modal Header</h4>
            </div> -->
            <div class="modal-body" >
              <form role="form" method="post" action="<?php echo base_url('index.php/admin/addTab')?>" enctype="multipart/form-data" >
                <div class="box-body ">
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Tab Name</label>
                    <div>
                      <input class="form-control" type="text" name="tabName" value="" >
                      <?php echo form_error('tabName'); ?>
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" style="margin-top:15px;">Add Tab</button>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    <script type="text/javascript">$(document).ready(function() {
    $('#example4').DataTable();
    } );</script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example5').DataTable();
    } );</script>
     <script type="text/javascript">$(document).ready(function() {
    $('#example6').DataTable();
    } );</script>

    
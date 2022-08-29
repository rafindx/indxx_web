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
      <!-- /.box -->
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo base_url('index.php/admin/newIndxx'); ?>" class="btn btn-info btn-lg pull-right">Add New Index</a>
          <button style="margin-right:10px;" type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Add New Tab</button>          
        </div>
      </div>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#bench">Benchmark</a></li>
        <li><a data-toggle="tab" href="#incom">Income</a></li>
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_benchmark as $bench){ ?>
              <tr>
                <td><?php echo $bench->name;?></td>
                
                <td>
                  <?php if($bench->weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                </td>
                <td>
                  <div class="col-md-4">
                    <?php if($bench->productlist =='1'){?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="2">
                    <input type="hidden" name="indexx" value="<?php echo $bench->id;?>" >                    
                    <input style="background-color:#5cb85c;" type="submit" name="deactive" value="Deactivate" class="btn btn-info deactive">
                  </form>
                  <?php }else{ ?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="1">
                    <input type="hidden" name="indexx" value="<?php echo $bench->id;?>" >                    
                    <input style="padding: 6px 20px;" type="submit" name="deactive" value="Activate" class="btn btn-info active">
                  </form>
                  <?php } ?>        
                  </div>
                  <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editIndex')?>">
                      <input type="hidden" value="<?php echo $bench->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                  </div>
                  <div class="col-md-3">
                    <form method="post" action="<?php echo base_url('index.php/admin/delete')?>">                  
                      <input type="hidden" value="<?php echo $bench->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to Remove?');">                      
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
                <th>Action</th>             
              </tr>
            </thead>
            <tbody>
              <?php foreach($get_income as $incom){ ?>
              <tr>
                <td><?php echo $incom->name;?></td>
                <td>
                  <?php if($incom->weighttype =='0'){?>
                  <span>Static</span>
                  <?php }else{ ?>
                  <span>Dynamic</span>
                  <?php } ?>
                </td>
               
                <td>
                  <div class="col-md-4">
                    <?php if($incom->productlist =='1'){?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="2">
                    <input type="hidden" name="indexx" value="<?php echo $incom->id;?>" >                    
                    <input style="background-color:#5cb85c;" type="submit" name="deactive" value="Deactive" class="btn btn-info deactive">
                  </form>
                  <?php }else{ ?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="1">
                    <input type="hidden" name="indexx" value="<?php echo $incom->id;?>" >                    
                    <input style="padding: 6px 20px;" type="submit" name="deactive" value="Active" class="btn btn-info active">
                  </form>
                  <?php } ?>                  
                  </div>
                 
                  <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editIndex')?>">
                      <input type="hidden" value="<?php echo $incom->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                  </div>
                  <div class="col-md-3">
                    <form method="post" action="<?php echo base_url('index.php/admin/delete')?>">                  
                      <input type="hidden" value="<?php echo $incom->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to Remove?');">                      
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
                <td>
                  <div class="col-md-4">
                     <?php if($themat->productlist =='1'){?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="2">
                    <input type="hidden" name="indexx" value="<?php echo $themat->id;?>" >                    
                    <input style="background-color:#5cb85c;" type="submit" name="deactive" value="Deactive" class="btn btn-info deactive">
                  </form>
                  <?php }else{ ?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="1">
                    <input type="hidden" name="indexx" value="<?php echo $themat->id;?>" >                    
                    <input style="padding: 6px 20px;" type="submit" name="deactive" value="Active" class="btn btn-info active">
                  </form>
                  <?php } ?>     
                  </div>
                  <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editIndex')?>">
                      <input type="hidden" value="<?php echo $themat->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                  </div>
                  <div class="col-md-3">
                    <form method="post" action="<?php echo base_url('index.php/admin/delete')?>">                  
                      <input type="hidden" value="<?php echo $themat->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to Remove?');">                      
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
                <td>
                  <div class="col-md-4">
                     <?php if($other->productlist =='1'){?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="2">
                    <input type="hidden" name="indexx" value="<?php echo $other->id;?>" >                    
                    <input style="background-color:#5cb85c;" type="submit" name="deactive" value="Deactive" class="btn btn-info deactive">
                  </form>
                  <?php }else{ ?>
                  <form method="post" action="<?php echo base_url('index.php/admin/updateYield')?>">
                    <input type="hidden" name="yield" value="1">
                    <input type="hidden" name="indexx" value="<?php echo $other->id;?>" >                    
                    <input style="padding: 6px 20px;" type="submit" name="deactive" value="Active" class="btn btn-info active">
                  </form>
                  <?php } ?>    
                  </div>
                  <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editIndex')?>">
                      <input type="hidden" value="<?php echo $other->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                  </div>
                  <div class="col-md-3">
                    <form method="post" action="<?php echo base_url('index.php/admin/delete')?>">                  
                      <input type="hidden" value="<?php echo $other->id;?>" name="indexId">
                      <input class="btn btn-info" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to Remove?');">                      
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

    
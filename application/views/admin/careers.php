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

          <button style="margin-right:10px;" type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Add New Position</button>          
        </div>
      </div>
       <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Position Name</th> 
                <th>Location</th> 
                <th>Type</th> 
                <th>Status</th>
                <th>Action</th>                
                
              </tr>
            </thead>
            <tbody>
              <?php  foreach($opening as $openings){ ?>
              <tr>
                <td><?php echo $openings->position_name?></td>
                <td><?php echo $openings->location?></td>
                <td><?php echo $openings->type?></td>
                
               <td>
                  <?php if($openings->status =='1'){?>
                  <span style="color:green;">Open</span>
                  <?php }else{ ?>
                  <span style="color:red;">Close</span>
                  <?php } ?>
                </td>

                <td>
                  <?php if($openings->status =='1'){?>
                 <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editopen')?>">
                      <input type="hidden" value="<?php echo $openings->id;?>" name="opId">
                      <input type="hidden" value="0" name="status">
                      <input class="btn btn-info" type="submit" name="edit" value="Close">
                    </form>
                 </div> 
                  <?php }else{ ?>
                 <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editopen')?>">
                      <input type="hidden" value="<?php echo $openings->id;?>" name="opId">
                      <input type="hidden" value="1" name="status">
                      <input class="btn btn-info" type="submit" name="edit" value="Open">
                    </form>
                 </div>
                     
                  <?php } ?>
                     <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/UpdateCareers')?>">
                      <input type="hidden" value="<?php echo $openings->id;?>" name="opId">
                   
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                 </div>
                </td>
               
              </tr>
              <?php  } ?>
            </tbody>
          </table>
      
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

              <form role="form" method="post" action="<?php echo base_url('index.php/admin/addOpenings')?>" enctype="multipart/form-data" >

          <div class="box-body" style="border:0px!important;">
            
            <div class="form-group">
              <label for="exampleInputPassword1">Position Name</label>
                <input class="form-control" type="text" name="position_name" value="" required="required">
                <?php echo form_error('position_name'); ?>
              </div>
              

              <div class="form-group">
              <label for="exampleInputPassword1">Mission</label>
                <textarea class="form-group textarea" name="mission" required="required"></textarea>        
                <?php echo form_error('Mission'); ?>
              </div>

              <div class="form-group">
              <label for="exampleInputPassword1">Location</label>
              <div id="points">
                <input class="form-control" type="text" name="location" value="" required="required">
              </div>                
              </div>
              <div class="form-group">
              <label for="exampleInputPassword1">Type</label>
              <div>
                <select name="type" required="required" class="form-control" >
                  <option value="">Select Openings Type</option>
                  <option value="Full Time Positions">Full Time Positions</option>
                  <option value="Part Time Positions">Part Time Positions</option>            
                </select>             
              </div>                
              </div>

              
              <div class="form-group">
              <label for="exampleInputPassword1" required="required">Others</label>
                <textarea class="form-group textarea" name="others"></textarea> 
                <?php echo form_error('Others'); ?>
              </div>
              
             
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Add Opening</button>
            </div>
          </form>
          
             
              
             
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
    

    
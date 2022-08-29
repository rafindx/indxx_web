<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
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
    
    <section class="content">
      <div class="row">
        <div class="box box-primary" style="margin: 0 0 0 23%; width: 50%">
          <div class="box-header with-border">
            <h3 class="box-title">Add Our Services</h3>
          </div>
          
          <form role="form" method="post" action="<?php echo base_url('index.php/admin/addServices')?>" enctype="multipart/form-data" >
            <div class="box-body ">
              <div class="row">
                <div class="col-md-12">
                  <?php if($this->session->flashdata('msg')!='') {?>
                  <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                  <strong>Success!</strong><?php echo $this->session->flashdata('msg');?>    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Heading</label>
                <div>
                  <input class="form-control" type="text" name="heading">
                  <?php echo form_error('heading'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Service Text</label>
                <div>
                  <textarea class="form-control" name="serviceTest" style="resize: none; min-height: 250px;"></textarea>                 
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <div>                
                  <input type="file" name="file" id="file"/>
                </div>
              </div>  
               <div class="form-group">
                <label for="exampleInputPassword1">URL</label>
                <div>
                  <input class="form-control" type="text" name="url">
                  <?php echo form_error('url'); ?>
                </div>
              </div>            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Service</button>
              </div>
            </form>
          </div>
		  </div>
      </section>
      <section>       
          <div class="container">
		  <div class="row">  
			<div class="col-md-12 client"  style="margin: 0 0 0 9%; width: 77%" > 
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Url</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>                  
                  <tr>
                    <?php foreach ($service as $services) {
                    $image = base_url().$services->image;
                    ?>
                    <td><img class="clientimg" src="<?php echo $image ?>" alt="client"></td>
                    <td><?php echo $services->heading;?></td>
                    <td><?php echo $services->url;;?></td>
                    <td>
                    <!--   <div class="col-md-4">
                        <form method="post" action="<?php echo base_url('index.php/admin/editClient')?>">
                          <input type="hidden" value="<?php echo $services->id;?>" name="clientId">
                          <input class="btn btn-info" type="submit" name="edit" value="Edit">
                        </form>
                      </div> -->
                      <div class="col-md-4">
                        <form method="post" action="<?php echo base_url('index.php/admin/deleteService')?>">
                          <input type="hidden" value="<?php echo $services->id;?>" name="serviceId">
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
    img.clientimg {
    width: 100px;
    }
    .col-md-12.client {
    padding: 0 46px;
    }
    </style>
    <!-- Control Sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">$(document).ready(function() {
  $('#example').DataTable();
  } );</script>
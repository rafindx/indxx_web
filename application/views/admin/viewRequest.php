<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
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
        <div class="box box-primary" style="margin: 0 0 0 23%; width: 50%">
          <div class="box-header with-border">
            <h3 class="box-title">View Request</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          
          <form role="form" method="post" action="<?php echo base_url('index.php/admin/addClient')?>" enctype="multipart/form-data" >
            <div class="box-body ">
                        
              <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <div>
                  <input class="form-control" type="text" readonly value="<?php echo $req->name?>">
                 
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <div>
                  <input type="text" class="form-control" readonly value="<?php echo $req->email?>">
                </div>
              </div> 
                 <div class="form-group">
                <label for="exampleInputPassword1">Phone Number</label>
                <div>
                  <input type="text" class="form-control" readonly value="<?php echo $req->phone_number?>">
                </div>
              </div> 
                 <div class="form-group">
                <label for="exampleInputPassword1">Company Name</label>
                <div>
                  <input type="text" class="form-control" readonly value="<?php echo $req->compnay?>">
                </div>
              </div> 
                 <div class="form-group">
                <label for="exampleInputPassword1">Question</label>
                <div>
                 <textarea class="form-control" readonly="readonly"><?php echo $req->question ?></textarea>
                </div>
              </div> 

              
              <!-- /.box-body -->
             <!--  <div class="form-group"> 
              <form action="" method=""> 
              <label for="exampleInputPassword1">Mark as complete</label>             
                  <button type="submit" class="btn btn-primary">Add Client</button>  
                  </form>               
              </div> -->
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
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
        <div class="row">         
            <div class="container">
              <div class="col-md-12 client"> 
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Sr.</th>
                <th>Email</th>
                <th>Added On</th> 
                <th>Action</th>                
              </tr>
            </thead>
            <tbody>             
              <tr>
                <?php $count =0; foreach ($news as $newslettrs) {  $count++?>
                <td><?php echo $count;?></td>
                <td><?php echo $newslettrs->email;?></td>
                <td><?php echo $newslettrs->added_on;;?></td>
                <td>                  
                   <div class="col-md-4"> 
                  <form method="post" action="<?php echo base_url('index.php/admin/deleteNews')?>">             
                      <input type="hidden" value="<?php echo $newslettrs->id;?>" name="newsId">
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
 <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min."></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript">

      $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
   
   </script>
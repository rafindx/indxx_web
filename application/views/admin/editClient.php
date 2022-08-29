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
            <h3 class="box-title">Update Client</h3>
          </div>
          <form role="form" method="post" action="<?php echo base_url('index.php/admin/updateClient')?>" enctype="multipart/form-data" >
            <div class="box-body">
                    
              <div class="form-group">
                <label for="exampleInputPassword1">Website Link</label>
                <div>
                  <input type="hidden" name="clientId" value="<?php echo $client->id ?>">
                  <input value="<?php echo $client->url ?>" class="form-control" type="url" name="url" placeholder="https://exaple.com">
                 
                </div>
              </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Current Image</label>
                <div>
                <?php $Image =  $image = base_url().$client->image; ?>
                <img src="<?php echo $Image ?>" alt="" width="150">
                 
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Update Client Image</label>
                <div>
                  <input type="file" name="client_file" id="client_file"/>
                </div>
              </div> 
             
              <div class="form-group">               
                  <button type="submit" class="btn btn-primary">Update Client</button>                 
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
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
    <div class="control-sidebar-bg"></div>
  </div>
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example').DataTable();
    } );</script>
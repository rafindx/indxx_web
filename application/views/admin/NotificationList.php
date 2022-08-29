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
        <style >
          .container {
               padding-right: 0px !important; 
 padding-left: 0px !important;
    
     margin-left: 10px !important;
     margin-right: 10px !important;
            }
          
      </style>
    <div class="container"><div class="col-sm-12">
       <a class="btn btn-info btn-lg pull-right" href="<?= base_url('index.php/admin/notifications'); ?>">Add Notification
       </a>
        </div>     <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Title</th>
                 <th style="width: 200px !important" >Url/Pdf</th>   
                 <th>Date</th> 
                  
                 <th style="width: 100px !important" >Action</th>            
              </tr>
            </thead>
            <tbody> 
            <?php foreach($notificationlist as $notificationlist ) { ?>
                <tr>
            <td><?= $notificationlist->title; ?></td>
            <td style="width: 200px !important"><?php if($notificationlist->url==''){ echo $notificationlist->pdf; } else { echo  $notificationlist->url; } ?></td>
            <td><?= $notificationlist->date ?></td>
            <td >
                <div class="col-md-4">
                    <form method="post" action="<?php echo base_url('index.php/admin/editnotification')?>">
                      <input type="hidden" value="<?php echo $notificationlist->id;?>" name="newsid">
                      <input class="btn btn-info" type="submit" name="edit" value="Edit">
                    </form>
                </div><br>
                <br>
                   <div class="col-md-4"> 
                  <form method="post" action="<?php echo base_url('index.php/admin/DeleteNotification')?>">             
                      <input type="hidden" value="<?php echo $notificationlist->id;?>" name="newsid">
                      <input class="btn btn-info" type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to Remove?');">                      
                    </form>
                  </div>
                
            </td>
               </tr>
            <?php } ?>
            </tbody>
         </table>
    </div>
  </div>
</div>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example').DataTable();
    } );</script>
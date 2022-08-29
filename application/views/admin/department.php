<div class="wrapper">
    <header class="main-header">
        <a href="index2.html" class="logo">
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><b>Indxx</b>CMS</span>
        </a>
    </header>
    <aside class="main-sidebar">
        <?php $this->load->view('admin/sidebar'); ?>
    </aside>
    <div class="content-wrapper">
        <section class="content-header">  
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">About Us</li>
            </ol>
        </section>
        <div class="row">
            <div class="col-md-10">
                <?php if ($this->session->flashdata('msg') != '') { ?>
                    <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong>Success!</strong><?php echo $this->session->flashdata('msg'); ?>    </div>        
                <?php } ?>
            </div>
        </div>
       
              <section>

          
                <div class="row">
                    <div class="col-md-12" >
                          <div class="container">
                  <a class="btn btn-info btn-lg pull-right" href="<?php echo base_url('index.php/admin/addNewDepartment'); ?>">Add New Department</a>
                  </div>
                </div>
                    <div class="col-md-12 client"  style="margin: 0 0 0 3%; width: 94%" > 
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Department</th> 
                                    <th>Action</th>                
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <?php
                                    $i=0;
                                    foreach ($department as $d) {
//                    print_r($clients);
                                        $i++;
                                        ?>
                                    
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $d->department_name; ?></td>
                                        <td>
                                            <div class="col-md-4"> 
                                                <form method="post" action="<?php echo base_url('index.php/admin/activeDepart') ?>">             
                                                    <input type="hidden" value="<?php echo $d->department_id; ?>" name="deptId">
                                                    <input type="hidden" value="<?php echo $d->status; ?>" name="status">
                                                    <?php if($d->status==1){ ?>
                                                    <input class="btn btn-info" type="submit" name="deactive" value="Deactive" onclick="return confirm('Are you sure you want to change status?');">
                                                    <?php } else{ ?>
                                                    <input class="btn btn-info" type="submit" name="active" value="Active" onclick="return confirm('Are you sure you want to change status?');">
                                                    <?php } ?>
                                                </form>
                                            </div>
                                            <div class="col-md-4">
                                                <form method="post" action="<?php echo base_url('index.php/admin/editDepart') ?>">
                                                    <input type="hidden" value="<?php echo $d->department_id; ?>" name="departId">
                                                    <input class="btn btn-info" type="submit" name="edit" value="Edit">
                                                </form>
                                            </div>
                                            <div class="col-md-4"> 
                                                <form method="post" action="<?php echo base_url('index.php/admin/deleteDepart') ?>">             
                                                    <input type="hidden" value="<?php echo $d->department_id; ?>" name="departId">
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
    </style>
    <!-- Control Sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">$(document).ready(function () {
                                                        $('#example').DataTable();
                                                    });</script>
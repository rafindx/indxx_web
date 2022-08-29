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
        <section class="content">
            <div class="row">
                <div class="box box-primary" style="margin: 4% 0 0 23%; width: 50%">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Management</h3>
                    </div>        
                    <form role="form" method="post" action="<?php echo base_url('index.php/admin/updateManagement') ?>" enctype="multipart/form-data" >

                        <div class="box-body" style="border:none!important;">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="hidden" name="id" value="<?php echo $mang->id; ?>">
                                <input class="form-control" type="text" name="name" value="<?php echo $mang->name; ?>">
                                       <?php echo form_error('name'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Department</label>
                                <select class="form-control" name="department" required="required">
                                    <option>--Select--</option>
                                    <?php
                                    foreach($department as $d)
                                    {
                                        $selected='';
                                        if($mang->department == $d->department_id)
                                        {
                                            $selected ="selected";
                                        }
                                        ?>
                                        <option value="<?=$d->department_id?>" <?=$selected?>><?=$d->department_name?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Designation</label>
                                <input class="form-control" type="text" name="designation" value="<?php echo $mang->designation; ?>">
                                <?php echo form_error('designation'); ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">About</label>
                                <textarea class="form-group textarea" name="about" required="required"><?php echo $mang->about; ?></textarea> 
                                <?php echo form_error('about'); ?>
                            </div>
                            <div class="form-group">  
                                <label required="required" for="exampleInputPassword1"><img width="100" src="<?php echo base_url('uploads/management/') . $mang->image; ?>"></label>
                                <label required="required" for="exampleInputPassword1">Image</label>
                                <input class="form-control" type="file" style="border:none;" name="file" value="">
                                <input type="hidden" value="<?php echo $mang->image; ?>" name="imgValue">
                                <?php echo form_error('file'); ?>
                            </div> 
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Edit Management</button>
                            </div>
                        </div>

                    </form>
                    <?php
                    if (isset($errorMsg)) {
                        echo '<div class="lb_custom_error_msg">';
                        echo $errorMsg;
                        echo '</div>';
                        unset($errorMsg);
                    }
                    ?>
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
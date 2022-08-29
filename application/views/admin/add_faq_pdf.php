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
                <li class="active">Add FAQ</li>
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
                        <h3 class="box-title">Add FAQ PDF</h3>
                    </div>        
                    <form role="form" method="post" action="<?php echo base_url('index.php/admin/SubmitFaqPdf') ?>" enctype="multipart/form-data" >

                        <div class="box-body" style="border:none!important;">
                            <div class="form-group">
                                <label for="exampleInputPassword1">FAQ PDF</label>
                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                <input class="form-control" type="file" style="border:none;" name="file" value="" required="required">
                            <?php echo form_error('file'); ?>
                            </div>
                            
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Add FAQ </button>
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

        <section class="content">
            <div class="row">
                <div class="box box-primary" style="margin: 4% 0 0 23%; width: 50%">
                    <div class="box-header with-border">
                        <h3 class="box-title">View FAQ PDF</h3>
                    </div>        
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>S No.</th>
                <th>FAQ Pdf</th>
                          
              </tr>
            </thead>
            <tbody> 
            <?php 
            $i=0;
            foreach($faq as $f ) 
            { 
                $i++;
            ?>
                <tr>
                    <td><?=$i;?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>uploads/<?php echo $f->faq_pdf; ?>" target="_blank">Show My Pdf</a>
                      
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


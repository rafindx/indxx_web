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
        <li class="active"><?php if(isset($company)) { echo 'Edit'; } else { echo 'Add'; } ?>Company</li>
      </ol>
    </section>
    <div class="row">
      <div class="col-md-10">
        <?php if($this->session->flashdata('msg')!='') {?>
        <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
       <?php echo $this->session->flashdata('msg');?>    </div>        
        <?php } ?>
      </div>
    </div>
    <section class="content">
      <div class="row">
      <div class="box box-primary" style="margin: 7% 0 0 23%; width: 50%">
            <div class="box-header with-border">
              <h3 class="box-title"><?php if(isset($company)) { echo 'Edit'; } else { echo 'Add'; } ?> Company</h3>
            </div>
            <form role="form" method="post" action="<?php echo base_url('index.php/admin/')?><?php if(isset($company)) { echo 'Edit_Company/'.$company->id; } else { echo 'add_newCompany'; } ?> " enctype="multipart/form-data">
              <div class="box-body" style="border:none!important;"> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Name</label>
                  <input required="required" value="<?php if(isset($company)) { echo $company->company_name; }  ?>" name="company_name" type="text" class="form-control" >
                  

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Show Chart</label>
                  <select name="show_chart" class="form-control">
                      <option value="">Select</option>
                      <option  <?php if(isset($company) && $company->show_chart=='1') { echo 'selected'; }  ?>  value="1">Yes</option>
                      <option  <?php if(isset($company) && $company->show_chart=='0') { echo 'selected'; }  ?> value="0">No</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Show Characteristics</label>
                  <select name="show_characteristics" class="form-control">
                      <option value="">Select</option>
                      <option  <?php if(isset($company) && $company->show_characteristics=='1') { echo 'selected'; }  ?>  value="1">Yes</option>
                      <option  <?php if(isset($company) && $company->show_characteristics=='0') { echo 'selected'; }  ?> value="0">No</option>
                  </select>
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Show Top 5 Constituents</label>
                  <select name="show_top_constituents" class="form-control">
                      <option value="">Select</option>
                     <option  <?php if(isset($company) && $company->show_top_constituents=='1') { echo 'selected'; }  ?>  value="1">Yes</option>
                      <option  <?php if(isset($company) && $company->show_top_constituents=='0') { echo 'selected'; }  ?> value="0">No</option>
                  </select>
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Show Risk & Return Statistics</label>
                  <select name="show_rr" class="form-control">
                      <option value="">Select</option>
                      <option  <?php if(isset($company) && $company->show_rr=='1') { echo 'selected'; }  ?>  value="1">Yes</option>
                      <option  <?php if(isset($company) && $company->show_rr=='0') { echo 'selected'; }  ?> value="0">No</option>
                  </select>
                </div>
                
                

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php if(isset($company)) { echo 'Update '; } else { echo 'Add '; } ?>  Company</button>
              </div></div>
            </form>
            <?php
              if(isset($errorMsg))
              {
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
 
  <div class="control-sidebar-bg"></div>
</div>

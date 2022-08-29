<body class="hold-transition login-page"><div class="login-box">    <div class="login-box-body">  <div class="agileits_logo">					<h1><a href="<?php echo base_url(); ?>"><span>Indexing Redefined</span></a></h1>				</div>  <div class="login-logo">    <a href="<?php echo base_url('admin/index'); ?>">    <b>CMS</b> Login</a>  </div>    <p class="login-box-msg">Sign in to manage Indxx</p>    <form action="<?php echo base_url('index.php/admin/index'); ?>" method="post">      <div class="form-group has-feedback">        <input name="email" type="email" class="form-control" placeholder="Email">        <?php echo form_error('email'); ?>            </div>      <div class="form-group has-feedback">        <input name="password" type="password" class="form-control" placeholder="Password">        <?php echo form_error('password'); ?> 
      </div> 
      <?php        if(isset($errorMsg))        {          echo '<div class="lb_custom_error_msg">';          echo $errorMsg;          echo '</div>';          unset($errorMsg);        }      ?>      <div class="row"> 
        <div style="text-align:center;">          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>        </div>      </div>    </form>
  </div></div>
  <!-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script> -->

  <!-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
  
  <!-- <script src="../../plugins/iCheck/icheck.min.js"></script> -->
</body></html>

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
				<div class="box box-primary" style="margin: 7% 0 0 5%; width: 90%">
					<div class="box-header with-border">
						<h3 class="box-title">Add Risk & Return Statiatics</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					
					<form role="form" method="post" action="<?php echo base_url('index.php/admin/addRiskReturnStaticsValue')?>" enctype="multipart/form-data" >
						<div class="row">
							<div class="col-md-10">
								<?php if($this->session->flashdata('msg')!='') {?>
								<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
									<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
								<strong>Success!</strong><?php echo $this->session->flashdata('msg');?>    </div>
								<?php } ?>
							</div>
							<!-- /.box -->
						</div>
						<div class="row col-md-12">
							<div class="form-group col-md-4">
								
								<div>
									<input   class="form-control" type="hidden"
									name="indxx" value="<?php echo $indxx->id;?>">
								</div>
							</div>
						</div>
						<div class="box-body ">
							<div class="form-group col-md-2">
								<label for="exampleInputPassword1">Statistics</label>
								
							</div>
							<div class="form-group col-md-2">
								<label for="exampleInputPassword1">QTD</label>
								
							</div>
							
							<div class="form-group col-md-2">
								<label for="exampleInputPassword1">YTD</label>
								
							</div>
							<div class="form-group col-md-2">
								<label for="exampleInputPassword1">1Year</label>
								
							</div>
							<div class="form-group col-md-2">
								<label for="exampleInputPassword1">3Year</label>
								
							</div>
							<div class="form-group col-md-2">
								<label for="exampleInputPassword1">Since Base Date</label>
								
							</div>
						</div>
						<?php
						$staticsArr =array('Correlation','Beta','Standard Deviation','Cumulative Return');
						for($i=0;$i<=3;$i++) { ?>
						<div class="box-body ">
							<div class="form-group col-md-2">
								<div>
									<label><?php echo $staticsArr[$i]?></label>
									<input type="hidden" name="id[<?= $i ?>]" value="<?php ?>"   >
									<span><?php  $staticsArr[$i] ?></span>
									<input readonly=""  class="form-control" type="hidden" name="statistic[<?= $i ?>]" value="<?=  $staticsArr[$i] ?>"   >
								</div>
							</div>
							<div class="form-group col-md-2">
								<div>

									<input  class="form-control" type="text" name="qtd[<?= $i ?>]" value="<?php ?>" >
								</div>
							</div>
							<div class="form-group col-md-2">
								
								<div>
									<input  class="form-control" type="text" name="ytd[<?= $i ?>]" value="<?php  ?>" >
								</div>
							</div>
							<div class="form-group col-md-2">
								
								<div>
									<input  class="form-control" type="text" name="oneyear[<?= $i ?>]" value="<?php  ?>" >
								</div>
							</div>
							<div class="form-group col-md-2">
								
								<div>
									<input  class="form-control" type="text" name="threeyear[<?= $i ?>]" value="<?php  ?>" >
								</div>
							</div>
							<div class="form-group col-md-2">
								
								<div>
									<input class="form-control"   type="text" name="sbd[<?= $i ?>]" value="" >
									
								</div>
							</div>
						</div>
						<?php } ?>
						
						<div class="form-group col-md-12">
							<div class="box-footer col-md-12"">
								<button type="submit" class="btn btn-primary">Add Index</button>
							</div>
							<?php if($this->session->flashdata('msg')!='') {?>
							<?php } ?>
							
						</div>
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
	</style>
	<!-- Control Sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<script type="text/javascript">
// AJAX call for autocomplete
$(document).ready(function(){
$("#search").keyup(function(){

$.ajax({
type: "POST",
url: "<?php echo base_url('index.php/admin/getIndex')?>",
data:'keyword='+$(this).val(),
beforeSend: function(){
$("#search").css("background","red url(LoaderIcon.gif) no-repeat 165px");
},
success: function(data){
$('#suggesstion').removeClass('hide');
$("#suggesstion").show();
$("#suggesstion").html(data);
$("#search").css("background","#FFF");

}
});
});
});
</script>
<script type="text/javascript">
function selectCountry(val) {
$("#search").val(val);
$('#suggesstion').addClass('hide');
}
</script>
<!-- Control Sidebar -->
<div class="control-sidebar-bg"></div>
</div>
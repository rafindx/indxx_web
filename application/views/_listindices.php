<!DOCTYPE html>
<html lang="en">
<head>
<title>All Indices | Indxx</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
 <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/services.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
</head>

<body>
   <?php include("header.php"); ?>
   <section id="ind_ind" class="border_b">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Indices</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
   <section id="solution" class="p-t-100 p-b-100">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">

                    <div class="solution_tabs">
                        <h3>Indices</h3>
						<ul>
								<li role="presentation" class="active"><a href="#benchmark" id="benchmark-tab" role="tab" data-toggle="tab" aria-controls="benchmark" aria-expanded="true" class="str">Benchmark</a></li>
								<li role="presentation"><a href="#income" role="tab" id="income-tab" data-toggle="tab" aria-controls="income" class="str">Income</a></li>
								<li role="presentation"><a href="#thematic" role="tab" id="thematic-tab" data-toggle="tab" aria-controls="thematic" class="str">Thematic</a></li>
								<li role="presentation"><a href="#other" role="tab" id="other-tab" data-toggle="tab" aria-controls="other" class="str">Other Indices</a></li>
							</ul>
                        
                    </div>

                </div>

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="row m-t-40 pleft">
					<div class="agileits_about_grids w3ls_products_grid">
							
							
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">							
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="benchmark" aria-labelledby="benchmark-tab">
									
						 <h3>Benchmark</h3>
							<h4>Index Name</h4>
									<ul class="list3">

										 <?php 
											foreach($get_indices as $indexes){
											?>  
										<li><a href="<?php echo base_url('index.php/Welcome/new_indices/'.$indexes->id) ?>"><?php echo $indexes->name;?></a></li>
										

										<?php
										}
										?>	
									</ul>
								</div>
								
								
								
								<div role="tabpanel" class="tab-pane fade" id="income" aria-labelledby="income-tab">
										<h3>Income</h3>
										<h4>Index Name</h4>
										<ul class="list3">

											 <?php 
											foreach($get_income as $incom){
											?>  
										<li><a href="<?php echo base_url('index.php/Welcome/new_indices/'.$incom->id) ?>"><?php echo $incom->name;?></a></li>
										

										<?php
										}
										?>	
											
										</ul>
								</div>
								
								
								<div role="tabpanel" class="tab-pane fade" id="thematic" aria-labelledby="thematic-tab">
										<h3>Thematic</h3>
										<h4>Index Name</h4>
										<ul class="list3">

											<?php 
											foreach($get_thematic as $thematic){
											?>  
										<li><a href="<?php echo base_url('index.php/Welcome/new_indices/'.$thematic->id) ?>"><?php echo $thematic->name;?></a></li>
										

										<?php
										}
										?>	
												
										</ul>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="other" aria-labelledby="other-tab">
										<h3>Other Indices</h3>
									
									
						<div class="agileits_technical_research">
							<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
								<div class="panel-heading w3_panel_heading" role="tab" id="headingOne">
								  <h4 class="panel-title asd w3_panel_title">
									<a class="pa_italic pa_italic1" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									  <span class="glyphicon glyphicon-menu-down w3_collapsed" aria-hidden="true"></span><i class="glyphicon glyphicon-menu-up" aria-hidden="true"></i>1. Horizon Kinetics
									</a>
								  </h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								  <div class="panel-body panel_text">
										<ul class="list3">
											<li><a href="#">Horizon Kinetics Spin-Off Index (TR)</a></li>	
											<li><a href="#">Horizon Kinetics Global Spin-Off Index (TR)</a></li>	
											<li><a href="#">Horizon Kinetics International Spin-Off Index (TR)</a></li>	
											<li><a href="<?php echo base_url ('/index.php/Welcome/new_indices/61'); ?>">Horizon Kinetics Japan Founders Index (PR)</a></li>	
											<li><a href="<?php echo base_url(); ?>/index.php/Welcome/new_indices/60">Horizon Kinetics Japan Founders Index (TR)</a></li>	
										</ul>
								  </div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading w3_panel_heading" role="tab" id="headingTwo">
								  <h4 class="panel-title asd w3_panel_title">
									<a class="pa_italic collapsed pa_italic1" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  <span class="glyphicon glyphicon-menu-down w3_collapsed" aria-hidden="true"></span><i class="glyphicon glyphicon-menu-up" aria-hidden="true"></i>2. Syntax
									</a>
								  </h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								   <div class="panel-body panel_text">
								   <ul class="list3">
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/129">Syntax Cap Weighted U.S. Financial Products & Services Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/130">Syntax Cap Weighted U.S. Financial Products & Services Index (TR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/131">Syntax Cap Weighted U.S. Energy Products & Services Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/132">Syntax Cap Weighted U.S. Energy Products & Services Index (TR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/133">Syntax Cap Weighted U.S. Industrial Products & Services Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/134">Syntax Cap Weighted U.S. Industrial Products & Services Index (TR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/135">Syntax Cap Weighted U.S. Information Tools Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/136">Syntax Cap Weighted U.S. Information Tools Index (TR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/137">Syntax Cap Weighted U.S. Information Products & Services Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/138">Syntax Cap Weighted U.S. Information Products & Services Index (TR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/139">Syntax Cap Weighted U.S. Consumer Products & Services Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/140">Syntax Cap Weighted U.S. Consumer Products & Services Index (TR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/141">Syntax Cap Weighted U.S. Food Products & Services Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/142">Syntax Cap Weighted U.S. Food Products & Services Index (TR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/143">Syntax Cap Weighted U.S. Healthcare Products & Services Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/144">Syntax Cap Weighted U.S. Healthcare Products & Services Index (TR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/228">Syntax Asia Mid & Large Cap Ex Japan Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/229">Syntax Asia Mid & Large Cap Ex Japan Index (TR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/231">Syntax US Islamic Index (PR)</a></li>	
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/232">Syntax US Islamic Index (TR)</a></li>	
										</ul>
								  </div> 
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading w3_panel_heading" role="tab" id="headingThree">
								  <h4 class="panel-title asd w3_panel_title">
									<a class="pa_italic collapsed pa_italic1" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									  <span class="glyphicon glyphicon-menu-down w3_collapsed" aria-hidden="true"></span><i class="glyphicon glyphicon-menu-up" aria-hidden="true"></i>3. TWG
									</a>
								  </h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
								   <div class="panel-body panel_text">
										<ul class="list2">
											<li><a href="http://mantissystems.com/Clients/indxxci/index.php/Welcome/new_indices/40">TWG Dynamic Allocation-A Index (TR)</a></li>
										</ul>
								  </div>
								</div>
							  </div>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
							
							</div>
						</div>
							
							
				</div>
                </div>

            </div>
        </div>
    </section>
   
   
   
<?php include("footer.php"); ?>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
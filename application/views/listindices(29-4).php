<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
<title>All Indices | Indxx</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
 <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/services.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	    <!-- Global site tag (gtag.js) - Google Analytics -->

                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-39282487-5"></script>

                <script>

                window.dataLayer = window.dataLayer || [];

                function gtag(){dataLayer.push(arguments);}

                gtag('js', new Date());

 

                gtag('config', 'UA-39282487-5');

                </script>

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
								<li role="presentation" class="active"><a href="#benchmark" id="benchmark-tab" role="tab" data-toggle="tab" aria-controls="benchmark" aria-expanded="true" class="str"><i class="fa fa-line-chart" aria-hidden="true"></i> Benchmark</a></li>
								<li role="presentation"><a href="#income" role="tab" id="income-tab" data-toggle="tab" aria-controls="income" class="str"><i class="fa fa-money" aria-hidden="true"></i> Income</a></li>
								<li role="presentation"><a href="#thematic" role="tab" id="thematic-tab" data-toggle="tab" aria-controls="thematic" class="str"><i class="fa fa-sitemap" aria-hidden="true"></i>Thematic</a></li>
                                                                <li role="presentation"><a href="#digital" role="tab" id="digital-tab" data-toggle="tab" aria-controls="digital" class="str"><i class="fa fa-sitemap" aria-hidden="true"></i> Digital Asset</a></li>
								<li role="presentation"><a href="#other" role="tab" id="other-tab" data-toggle="tab" aria-controls="other" class="str"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Other Indices</a></li>
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
										<li><a href="<?php echo site_url($indexes->slug) ?>" rel="nofollow"><?php echo $indexes->indxx_name;?> </a></li>
										

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
										<li><a href="<?php echo site_url($incom->slug) ?>" rel="nofollow"><?php echo $incom->indxx_name;?></a></li>
										

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

// 											 function function sortByName($a, $b)
// {
//     $a = $a->name;
//     $b = $b->name;

//     if ($a == $b) return 0;
//     return ($a < $b) ? -1 : 1;
// }
//  usort($get_thematic, 'sortByName'); print_r($get_thematic);
											foreach($get_thematic as $thematic){
											?>  
										<li><a href="<?php echo site_url($thematic->slug) ?>" rel="nofollow" ><?php echo $thematic->indxx_name;?></a></li>
										

										<?php
										}
										?>	
												
										</ul>
								</div>
                                                            <div role="tabpanel" class="tab-pane fade" id="digital" aria-labelledby="digital-tab">
										<h3>Digital Asset</h3>
										<h4>Index Name</h4>
										<ul class="list3">

											<?php 
											foreach($get_digital as $digital){
											?>  
										<li><a href="<?php echo site_url($digital->slug) ?>" rel="nofollow" ><?php echo $digital->indxx_name;?></a></li>
										

										<?php
										}
										?>	
												
										</ul>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="other" aria-labelledby="other-tab">
										<h3>Other Indices</h3>
									
									
						<div class="agileits_technical_research">
							<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
						<?php $count =1;foreach($allcompany as $data1) {
                                                       
                                                    ?>
                                                            <div class="panel panel-default">
								<div class="panel-heading w3_panel_heading" role="tab" id="headingOne<?= $count;?>">
								  
									<a class="pa_italic pa_italic1" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne<?= $count;?>" aria-expanded="true" aria-controls="collapseOne">
									    <h4 class="panel-title asd w3_panel_title">
									  <span class="glyphicon glyphicon-menu-down w3_collapsed" aria-hidden="true"></span><i id="dssds" class="glyphicon glyphicon-menu-down" aria-hidden="true"></i><?php echo $data1['company_name']; ?>
									    </h4>
									</a>
								  
								</div>
								<div id="collapseOne<?= $count;?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne<?= $count;?>">
								  <div class="panel-body panel_text">
										<ul class="list3">
                                                                                    <?php  $alldata = $this->indice->otherindxxbycompanyID($data1['id']); 
                                                                                    foreach($alldata as $ind) {
                                                                                   $check= $this->indice->chechActiveorniot($ind['indxx_id']);
                                                                                   if($check=='deactive')
                                                                                   {
                                                                                   	continue;
                                                                                   }
                                                                                    ?>
                                                                                    <li><a href="<?php
                                                                                     
                                                                                    echo site_url($this->indice->getSlugByIndxxId($ind['indxx_id'])) ?>" rel="nofollow"><?php echo  $this->indice->getIndexxNameByIndxxId($ind['indxx_id']); ?> </a></li>
                                                                                      <?php } ?>
											
                                                                                  
                                                                                </ul>
								  </div>
								</div>
							  </div>
                                                <?php $count++; } ?>
							
							 
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
<script>

  window.addEventListener('load', function() {

jQuery('a[href*="mailto:"]').click(function(){gtag('event','click',{'event_category':'email','event_label':jQuery(this).attr("href")})});

jQuery('a[href*="tel:"]').click(function(){gtag('event','click',{'event_category':'phone','event_label':jQuery(this).attr("href")})});

  });

</script>
</body>
</html>
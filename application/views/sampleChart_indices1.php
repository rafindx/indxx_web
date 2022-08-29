<!DOCTYPE html>
<html lang="en">
<head>
<title>All Indices | Indxx</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/bootstrap.css">
<!--<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />-->
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/services.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>

<!--- Scripts for Charting -->
<script src="<?php echo base_url(); ?>assets/js/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/amstock.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/amexport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/rgbcolor.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/canvg.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/filesaver.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/chart.css" />
<!--<link rel="stylesheet" href="../scripts/style.css" type="text/css">-->
<script src="<?php echo base_url(); ?>assets/js/responsive.min.js" type="text/javascript"></script>
		
<!--- End of Scripts for Charting -->		

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
								<li role="presentation" class="active"><a href="#access" id="access-tab" role="tab" data-toggle="tab" aria-controls="access" aria-expanded="true" class="str">Downloads</a></li>
								<?php if($type->weighttype =='0'){ 
									 $filePath = base_url().$sheet->fact_sheet;

								 ?>
								<li role="presentation">
									<a download href="<?php echo $filePath; ?>" class="str">Fact Sheet</a></li>

								<?php }else { ?>
								<li role="presentation">
									<a href="<?php echo site_url().'/Welcome/generate_factSheet/'.$indxxID; ?>" class="str">Fact Sheet</a></li>
									<?php } ?>

 
								<li role="presentation"><a href="<?php echo base_url().'assets/media/'.$indxx_details[0]->methodology; ?>" target="_blank" class="str">Methodology</a></li>
								<li role="presentation"><a href="<?php echo site_url().'/Welcome/download_csv/'.$indxxID; ?>" class="str">Indxx Values</a></li>
							</ul>
                        
                    </div>

                </div>

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="row m-t-40 pleft">
					<div class="agileits_about_grids w3ls_products_grid">
							
							
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">							
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="access" aria-labelledby="access-tab">
									
									<h3> <?php echo $indxx_details[0]->indxx_name; ?></h3>
									<p><?php echo $indxx_details[0]->index_description; ?></p>
									
									<div class="charting">
										<h3>Charting</h3>
										<div>
											<div id="chartdiv" style="width:100%; height:500px;"></div>
										</div>
										<p></br></br></p>
										
										<h3 align="left"><p>Index Characteristics</p></h3>
										<div style="line-height:15px" class="table-responsive">
											<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:10px!important">
												<tbody>
													<tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #ccc;text-align:center">
														<td width="67%" style="padding-left:5px;text-align:left!important">Base Date</td>
														<td width="33%" align="right" style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['inceptionDate']; ?></td>
													</tr>
													<tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #eee;text-align:center">
														<td width="67%" style="padding-left:5px;text-align:left!important">No. of Constituents</td>
														<td width="33%" align="right"  style="padding-right: 5px;" class="border-left"><?php echo $total->total; ?></td>
													</tr>
													<tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #ccc;text-align:center">
														<td width="67%" style="padding-left:5px;text-align:left!important">Dividend Yield<div style="display:inline-block !important;"><sup style="font-size:10px !important;">*</sup></div></td>
														<td width="33%" align="right" style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['dividend_yield'];?>%</td>
													</tr>
													<tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #eee;text-align:center">
														<td width="67%" style="padding-left:5px;text-align:left!important">52 Week High/Low<div style="display:inline-block !important;"><sup style="font-size:10px !important;">**</sup></div></td>
														<td width="33%" align="right" style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['52weeks']; ?></td>
													</tr>
												</tbody>
											</table>
											<div style="font-size:10px;margin-bottom:15px"><sup style="font-size:9px;text-align:left;">*</sup> Trailing 12 months data for current year portfolio</div>
											<div style="font-size:10px"><sup style="font-size:9px;text-align:left;">**</sup> Trailing 12 months</div>
										</div>
										
										<p></br></br></p>
										<h3>Top Constituents</h3>
										<div class="table-responsive">
											<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:0px !important;">
												<tbody>
													<tr style="background:none repeat scroll 0 0 #515151" class="table-head">
														<th style="padding-left:4px;text-align:left!important;color:#FFFFFF!important;font-size: 13px;">Constituent</th>
														<th align="left" style="color:#FFFFFF!important;font-size: 13px;">ISIN</th>
														<th align="left" style="color:#FFFFFF!important;padding-right:5px!important;font-size: 13px;text-align:right !important;">Weight</th>
													</tr>

													<?php 
													if(!empty($IndexTopFiveConstituentsArray)){
														
													foreach($IndexTopFiveConstituentsArray as $key=>$values){
														$color='';
														if($key%2==0){ 
															$color="#EEEEEE";
														}else{
															$color="#CCCCCC";
														}
													?>
													<tr style="height:30px;background:none repeat scroll 0 0 <?php echo $color;?>;text-align:center">
														<td style="padding-left:5px!important;text-align:left!important;font-size:14px;"><?php echo $values["name"]; ?></td>
														<td align="left" style="font-size:14px;"><?php echo $values['isin'];?></td>
														<td align="right" style="font-size:14px;padding-right:5px!important;">
							<?php if($type->weighttype =='0'){ ?>
							<?php echo (number_format(($values["weight"]),2,'.',''));?>%
							<?php }else{?>
					<?php echo (number_format(($values["weight"])*100,2,'.',''));?>%
						 <?php } ?>
						 </td>
													</tr>
												<?php }
													}else{ ?>
													<tr style="height:30px;background:none repeat scroll 0 0;text-align:center">
														<td style="padding-left:5px!important;text-align:left!important;font-size:14px;">N/A</td>
														<td align="left" style="font-size:14px;">N/A</td>
														<td align="right" style="font-size:14px;padding-right:5px!important;">0%</td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
										
										
										<p></br></br></p>
										<?php if($IndexRiskReturnsArray){ ?>
										
										<h3 align="left"><p>Risk & Return Statistics</p></h3>
										<div class="table-responsive">
											<table border="0" cellspacing="0" cellpadding="0" width="100%">
												<tbody>
													<tr style="height:30px;background:none repeat scroll 0 0 #515151" class="table-head">
														<th style="font-size: 13px;padding-left:5px;text-align:left!important;color:#FFFFFF!important;width:15% !important;">Statistic</th>
														<th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;width:15% !important;">QTD</th>
														<th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;width:15% !important;">YTD</th>
														<th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;width:15% !important;">1 Year</th>
														<th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;width:15% !important;">3 Year</th>
														<th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;padding-right:5px!important;">SBD</th>
													</tr>
													<tr style="height:30px;font-size: 13px;background:none repeat scroll 0 0 #ccc;">
														<td nowrap="nowrap" style="padding-left:5px !important;">Beta<div style="display:inline-block !important;"><sup style="font-size:10px !important;">1</sup></div></td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Beta']['qtd'],2,'.',''));?></td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Beta']['ytd'],2,'.',''));?></td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Beta']['1year'],2,'.',''));?></td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Beta']['3year'],2,'.',''));?></td>
														<td align="right" nowrap="nowrap" style="padding-right:5px!important;"><?php echo (number_format($IndexRiskReturnsArray['Beta']['SinceInception'],2,'.',''));?></td>
													</tr>
													<tr style="height:30px;font-size: 13px;background:none repeat scroll 0 0 #eee;">
														<td nowrap="nowrap" style="padding-left:5px !important;">Correlation<div style="display:inline-block !important;"><sup style="font-size:10px !important;">1</sup></div></td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Correlation']['qtd'],2,'.',''));?></td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Correlation']['ytd'],2,'.',''));?></td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Correlation']['1year'],2,'.',''));?></td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Correlation']['3year'],2,'.',''));?></td>
														<td align="right" nowrap="nowrap" style="padding-right:5px!important;"><?php echo (number_format($IndexRiskReturnsArray['Correlation']['SinceInception'],2,'.',''));?></td>
													</tr>
													<tr style="height:30px;font-size: 13px;background:none repeat scroll 0 0 #ccc;">
														<td nowrap="nowrap" style="padding-left:5px !important;">Returns<div style="display:inline-block !important;"><sup style="font-size:10px !important;">2</sup></div></td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Cumulative Return']['qtd'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Cumulative Return']['ytd'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Cumulative Return']['1year'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Cumulative Return']['3year'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap" style="padding-right:5px!important;"><?php echo (number_format($IndexRiskReturnsArray['Cumulative Return']['SinceInception'],2,'.',''));?>%</td>
													</tr>
													<tr style="height:30px;font-size: 13px;background:none repeat scroll 0 0 #eee;">
														<td nowrap="nowrap" style="padding-left:5px !important;">Deviation</td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Standard Deviation']['qtd'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Standard Deviation']['ytd'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Standard Deviation']['1year'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Standard Deviation']['3year'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap" style="padding-right:5px!important;"><?php echo (number_format($IndexRiskReturnsArray['Standard Deviation']['SinceInception'],2,'.',''));?>%</td>
													</tr>
												</tbody>
											</table>
										</div>

										<div style="font-size:10px;"><sup style="font-size:8px">1</sup>w.r.t.<?php echo $indxx_details[0]->benchmark;?></div>
										<div style="font-size:10px"><sup style="font-size:8px">2</sup>All returns for period greater than 1 year are annualized</div>
										<?php  } ?>
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
<script type="text/javascript">
	$(document).ready(function()
		{
			
			$('#updateindexvalues').click(function() 
			{
				var refererlink=document.referrer;
				var url = refererlink.split("?")[0]+"?id="+document.getElementById('TickerSymbol').value;
				window.top.location.href = url;
			})
		});
		
		
		AmCharts.ready(function () {
			//generateChartData();
			createStockChart();
		});

		var chartData = [<?php echo $str; ?>];
		var chartData2 = [<?php echo $str2; ?>];
		var chart;
		
		
					function createStockChart() {
				
        
				var chart = AmCharts.makeChart("chartdiv", {
					  "type": "stock",					 

					  "dataSets": [{
						"title": "Index: <?php echo $title; ?>",
						"color":"#CA3D3D",
						"fieldMappings": [{
						  "fromField": "value",
						  "toField": "value"
						}, {
						  "fromField": "volume",
						  "toField": "volume"
						}],
						"dataProvider": chartData,
						"categoryField": "date"
					  }, {
						"title": "<?php echo $banchMark; ?>",
						"color":"#666666",
						"fieldMappings": [{
						  "fromField": "value",
						  "toField": "value"
						}, {
						  "fromField": "volume",
						  "toField": "volume"
						}],
						"dataProvider": chartData2,
						"categoryField": "date",
						"compared": true
					  }],

					  "panels": [{
						"showCategoryAxis": true,
						"recalculateToPercents":"never",
						"title": "Value",
						"stockGraphs": [{
						  "id": "g1",
						  "valueField": "value",
						  "comparable": true,
						  "compareField": "value",
						  "lineThickness": 2,
						  "balloonText": "<b>[[value]]</b>",
						  "compareGraph": {
							"lineThickness": 2,
							"balloonText": "<b>[[value]]</b>"
						  },
						}],
						"stockLegend": {
						 "periodValueTextRegular": "[[value.close]]",
						 "valueTextComparing":"[[value]]"
						}
					  }],

					  "chartScrollbarSettings": {
						"graph": "g1"
					  },

					  "chartCursorSettings": {
						"valueBalloonsEnabled": true,
						
					  },

					  "periodSelector": {
						"position": "bottom",
						"periods": [{
							"period": "DD",
							"count": 10,
							"label": "10 days"
							
						},{
						  "period": "MM",
						   "count": 1,
						  "label": "1 month"
						}, {
						  "period": "YYYY",
						  "count": 1,
						  "label": "1 year"
						}, {
						  "period": "YTD",
						  "label": "YTD"
						}, {
						  "period": "MAX",
						  "label": "MAX",
						  "selected": true
						}]
					  }
					});

					
					
				 chart.exportConfig = {
            menuItems: []
         };
//save.php
         chart.addListener('rendered', function (event) {
            chart.AmExport.output({format:"png", output: 'datastring'},
            	var base_url = '<?php echo base_url(); ?>/index.php/Welcome/savephp/';
            	
               function(data) {
                  $.post(base_url, {
                        "imageData": encodeURIComponent(data),
						"filename": "<?php echo $code;?>",
						"indxx": "<?php echo $indxxID;?>"
                     });
               });
         });
				
				chart.pathToImages = "images/"; 					
				chart.write('chartdiv');
			}			
			
</script>
</body>
</html>
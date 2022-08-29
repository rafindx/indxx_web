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
								<li role="presentation"><a href="#income" role="tab" id="income-tab" data-toggle="tab" aria-controls="income" class="str">Fact Sheet</a></li>
								<li role="presentation"><a href="#alternative" role="tab" id="alternative-tab" data-toggle="tab" aria-controls="alternative" class="str">Methodology</a></li>
								<li role="presentation"><a href="#other" role="tab" id="other-tab" data-toggle="tab" aria-controls="other" class="str">Indxx Values</a></li>
							</ul> 
                    </div>
                </div>

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="row m-t-40 pleft">
					<div class="agileits_about_grids w3ls_products_grid">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">							
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="access" aria-labelledby="access-tab">
									<h3><?php echo $indxx_details[0]->indxx_name; ?></h3>
									 <p><?php echo $indxx_details[0]->index_description; ?></p>
									
									<hr style="margin-top:24px;">
										
									<div class="charting">
										<h3>Charting</h3>
										<div>
											<p>Charting Comes Here</p>
											<div id="chartdiv" style="width:100%; height:500px;"></div>
										</div>
										
										<h3 align="left"><p>Index Characteristics</p></h3>
										<div style="line-height:15px" class="table-responsive">
											<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:10px!important">
												<tbody>
													<tr style="font-size:13px;height:30px;background:none repeat scroll 0 0 #ccc;text-align:center">
														<td width="67%" style="padding-left:5px;text-align:left!important">Base Date</td>
														<td width="33%" align="right" style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['inceptionDate']; ?></td>
													</tr>
													<tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #eee;text-align:center">
														<td width="67%" style="padding-left:5px;text-align:left!important">No. of Constituents</td>
														<td width="33%" align="right"  style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['noofconstituents']; ?></td>
													</tr>
													<tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #ccc;text-align:center">
														<td width="67%" style="padding-left:5px;text-align:left!important">Dividend Yield<div style="display:inline-block !important;"><sup style="font-size:10px !important;">*</sup></div></td>
														<td width="33%" align="right" style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['dividendyield'];?>%</td>
													</tr>
													<tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #eee;text-align:center">
														<td width="67%" style="padding-left:5px;text-align:left!important">52 Week High/Low<div style="display:inline-block !important;"><sup style="font-size:10px !important;">**</sup></div></td>
														<td width="33%" align="right" style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['52weeks']; ?></td>
													</tr>
												</tbody>
											</table>
											<div style="font-size:10px;margin-bottom:10px"><sup style="font-size:9px;text-align:left;">*</sup> Trailing 12 months data for current year portfolio</div>
											<div style="font-size:10px"><sup style="font-size:9px;text-align:left;">**</sup> Trailing 12 months</div>
										</div>
										
										<p></br></br></p>
										<h3>Top 5 Constituents</h3>
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
														<td align="right" style="font-size:14px;padding-right:5px!important;"><?php echo (number_format(($values["weight"])*100,2,'.',''));?>%</td>
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
										<h3 align="left"><p>Risk & Return Statistics </p></h3>
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
													<?php echo $IndexRiskReturnsArray['Beta']['ytd']; ?>
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
														<td align="right" nowrap="nowrap">-</td>
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
														<td nowrap="nowrap" style="padding-left:5px!important;">Deviation</td>
														<td align="right" nowrap="nowrap">-</td> 
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Standard Deviation']['ytd'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Standard Deviation']['1year'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap"><?php echo (number_format($IndexRiskReturnsArray['Standard Deviation']['3year'],2,'.',''));?>%</td>
														<td align="right" nowrap="nowrap" style="padding-right:5px!important;"><?php echo (number_format($IndexRiskReturnsArray['Standard Deviation']['SinceInception'],2,'.',''));?>%</td>
													</tr>
												</tbody>
											</table>
										</div>									
									</div>
								</div>
								
								
								<!--<div role="tabpanel" class="tab-pane fade" id="income" aria-labelledby="income-tab">
										<h3>Income</h3>
										<h4>Index Name</h4>
										<ul class="list2">
											<li><a href="#">Indxx Global Natural Resources Income Index TR</a></li>	
											<li><a href="#">Indxx Global YieldCo Index</a></li>	
											<li><a href="#">Indxx REIT Preferred Stock Index</a></li>	
											<li><a href="#">Indxx SuperDividend U.S. Low Volatility Index TR</a></li>	
										</ul>
								</div>
								
								
								<div role="tabpanel" class="tab-pane fade" id="alternative" aria-labelledby="alternative-tab">
										<h3>Alternative</h3>
										<h4>Index Name</h4>
										<ul class="list2">
											<li><a href="#">Indxx Hedged Dividend Income Index</a></li>	
											<li><a href="#">Indxx SuperDividend Alternatives Index</a></li>	
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
													<ul class="list2">
														<li><a href="#">Horizon Kinetics Spin-Off Index (TR)</a></li>	
														<li><a href="#">Horizon Kinetics Global Spin-Off Index (TR)</a></li>	
														<li><a href="#">Horizon Kinetics International Spin-Off Index (TR)</a></li>	
														<li><a href="#">Horizon Kinetics Japan Founders Index (PR)</a></li>	
														<li><a href="#">Horizon Kinetics Japan Founders Index (TR)</a></li>	
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
											   <ul class="list2">
														<li><a href="#">Syntax Cap Weighted U.S. Financial Products & Services Index (PR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Financial Products & Services Index (TR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Energy Products & Services Index (PR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Energy Products & Services Index (TR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Industrial Products & Services Index (PR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Industrial Products & Services Index (TR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Information Tools Index (PR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Information Tools Index (TR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Information Products & Services Index (PR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Information Products & Services Index (TR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Consumer Products & Services Index (PR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Consumer Products & Services Index (TR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Food Products & Services Index (PR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Food Products & Services Index (TR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Healthcare Products & Services Index (PR)</a></li>	
														<li><a href="#">Syntax Cap Weighted U.S. Healthcare Products & Services Index (TR)</a></li>	
														<li><a href="#">Syntax Asia Mid & Large Cap Ex Japan Index (PR)</a></li>	
														<li><a href="#">Syntax Asia Mid & Large Cap Ex Japan Index (TR)</a></li>	
														<li><a href="#">Syntax US Islamic Index (PR)</a></li>	
														<li><a href="#">Syntax US Islamic Index (TR)</a></li>	
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
														<li><a href="#">TWG Dynamic Allocation-A Index (TR)</a></li>
													</ul>
											  </div>
											</div>
										  </div>
										</div>
									</div>
								</div>-->
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
	$(document).ready(function(){
		$('#updateindexvalues').click(function() {
			var refererlink=document.referrer;
			var url = refererlink.split("?")[0]+"?id="+document.getElementById('TickerSymbol').value;
			window.top.location.href = url;
		})
	});
	
	//AMCharts Scripts
	AmCharts.ready(function () {
		//generateChartData();
		createStockChart();
	});
	
	var chartData = [<?php echo $str; ?>];

	var chart;
	
	function createStockChart()
	{
		var chart = new AmCharts.AmStockChart();

		chart.exportConfig = {
			menuItems: []
		};

		chart.addListener('rendered', function (event) {
			chart.AmExport.output({format:"png", output: 'datastring'},
			function(data) {
				$.post("save.php", {
					imageData: encodeURIComponent(data),
					filename: "<?php echo $code;?>",
					indxx: "<?php echo $indxxID;?>"
				});
			});
		});

		chart.pathToImages = "<?php echo base_url(); ?>assets/images/";

		// DATASETS //////////////////////////////////////////
		var dataSet = new AmCharts.DataSet();
		dataSet.color = "#6C6C62";
		dataSet.fieldMappings = [{
			fromField: "value",
			toField: "value"
		}];
		dataSet.dataProvider = chartData;
		dataSet.categoryField = "date";

		chart.dataSets = [dataSet];

		// PANELS ///////////////////////////////////////////                                                  
		var stockPanel = new AmCharts.StockPanel();
		stockPanel.showCategoryAxis = true;
		stockPanel.title = "<?php echo $title;?>";
		stockPanel.eraseAll = false;
		//stockPanel.addLabel(0, 100, "Click on the pencil icon on top-right to start drawing", "center", 16);

		var graph = new AmCharts.StockGraph();
		graph.valueField = "value";
		//graph.bullet = "round";
		//graph.type = "smoothedLine";
		graph.lineThickness = 2;
		stockPanel.addStockGraph(graph);

		var stockLegend = new AmCharts.StockLegend();

		stockLegend.valueTextRegular = " ";
		stockLegend.markerType = "none";
		stockPanel.stockLegend = stockLegend;
		stockPanel.drawingIconsEnabled = false;

		chart.panels = [stockPanel];


		// OTHER SETTINGS ////////////////////////////////////
		var scrollbarSettings = new AmCharts.ChartScrollbarSettings();
		scrollbarSettings.graph = graph;
		scrollbarSettings.updateOnReleaseOnly = true;
		chart.chartScrollbarSettings = scrollbarSettings;

		var cursorSettings = new AmCharts.ChartCursorSettings();
		cursorSettings.valueBalloonsEnabled = true;

		chart.chartCursorSettings = cursorSettings;


		// PERIOD SELECTOR ///////////////////////////////////
		var periodSelector = new AmCharts.PeriodSelector();
		periodSelector.position = "bottom";
		periodSelector.periods = [{
			period: "DD",
			count: 10,
			label: "10 days"
		}, {
			period: "MM",
			count: 1,
			label: "1 month"
		}, {
			period: "YTD",
			count: 1,
			label: "YTD"
		}, {
			period: "MAX",
			label: "MAX"
		}];
		
		chart.periodSelector = periodSelector;

		var panelsSettings = new AmCharts.PanelsSettings();
		chart.panelsSettings = panelsSettings;

		chart.responsive = {
			"enabled": true
		};

			chart.write('chartdiv');
	}//End of function

	//End of AMCharts Scripts
</script>
</body>
</html>
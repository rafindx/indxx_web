<!DOCTYPE html>
<html lang="en">
<head>
<title>Equity Index | Index Company | Indxx</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.animateSlider.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/services.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slider.css">
<link class="include" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.jqplot.css" />
<link type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.simple-dtpicker.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chart.min.css"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
<script>
$(window).load(function(){
$('.flexslider').flexslider({
animation: "slide",
start: function(slider){
$('.flexslider').removeClass('loading');
}
});
});
</script>
<style>
.loading {min-height: 300px; background: url('loader.gif') no-repeat center center;}
</style>
</head>
<body>
	<?php include("header.php"); ?>
	<div class="banner">
			<section class="slider">
				<div class="flexslider loading">
				
					<ul class="slides">
					<li>
							<div class="w3_agile_banner_text banner2">
							<div class="container">
								<h3>Indxx seeks to redefine the global indexing space. We create high quality, custom indices for our clients in a timely manner at the right price</h3>
								<div class="more">
									<a href="single.html" class="button button--isi button--text-thick button--text-upper button--size-s"><span>Read More</span></a>
								</div></div>
							</div>
						</li>
						<li>
							<div class="w3_agile_banner_text banner1">
								<div class="container">
								<h3>We should keep the ability to have multiple images. Before we launch the new website we can define the wording for the other 2 images, which will link to another section of the website</h3>
								<div class="more">
									<a href="single.html" class="button button--isi button--text-thick button--text-upper button--size-s"><span>Read More</span></a>
								</div></div>
							</div>
						</li>
						
						<li>
							<div class="w3_agile_banner_text banner3">
							<div class="container">
								<h3>Index Development & Index Calculation ??? take the same wording we have on the main page for these. Can you fit the entire content here? There are no too many words so you should be able to</h3>
								<div class="more">
									<a href="single.html" class="button button--isi button--text-thick button--text-upper button--size-s"><span>Read More</span></a>
								</div></div>
							</div>
						</li>
					</ul>
				</div>
			</section>
				<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css">
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
	</div>
	<div class="banner-bottom">
	<div class="banner-bottom">
		<div class="panel panel-default agile_panel" style="background:#EDEDED;">
			<div class="container">				
				<div class="block-hdnews">
 
          <div class="list-wrpaaer">
             <ul class="list-aggregate" id="marquee-horizontal">
             	<?php  foreach ($stats as $values) {   ?>


			 <li class="fat-l ">
					<a href=""><?php echo $values->indexxName; ?></a><span><?php echo $values->value; ?></span><?php echo $values->change; ?>%</li>
					<?php } ?>

			<!--  <li class="fat-l"> 
					<a href="">Indxx 500 Index</a><span>3,143.44</span><i class="wthree_i"><span class="i_up caret"></span></i>4.19%</li>
			 <li class="fat-l">
					<a href="">Indxx Global YieldCo Index</a><span>2,683.96</span><i class="wthree_i"><span class="i_up caret"></span></i>6.18%</li>
			 <li class="fat-l ">
					<a href="">Indxx 2000 Index</a><span>3,143.44</span><i class="wthree_i"><span class="i_down caret"></span></i>6.17%</li>
			 <li class="fat-l">
					<a href="">REIT Preferred Stock Index</a><span>42,357.94</span><i class="wthree_i"><span class="i_down caret"></span></i>3.14%</li>
			 <li class="fat-l ">
					<a href="">Indxx India Consumer Index</a><span>42,357.94</span><i class="wthree_i"><span class="i_down caret"></span></i>4.14%</li> -->
		
             </ul>
          </div>

      </div>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.marquee.js"></script>	
				<script type="text/javascript">
  $(function(){
  $('#marquee-vertical').marquee();  
  $('#marquee-horizontal').marquee({direction:'horizontal', delay:0, timing:50});  
});
</script>
			</div>
		<div class="panel-footer"> </div>
		</div>
		</div></div>
	<div class="news-original">
		<div class="container">
			<div class="agileinfo_news_original_grids">
				
				<div class="col-md-8">
				<div class="row">
						<h2 class="ser">Our Services</h2>
							<div class="col-md-6">
							<div class="w3layouts_commodity_news_grid w3layouts_commodity_news_grid_gas">
							<div class="w3layouts_commodity_news_grid_left">
								<a href="single.html">Index Development</a>
								<div class="w3layouts_commodity_news_grid_right">
								<img src="<?php echo base_url(); ?>assets/images/ser_1.jpg" alt=" " class="img-responsive" />
							</div>
								<p>Our extensive research capabilities across asset classes, team of seasoned experts, innovative thinking and access to quality data help us design unique and innovative investable indexing solutions in a cost effective, timely manner.</p>
							</div>
							
							<span class="more1"><a href="development.php">read more&nbsp;??</a></span>
							<div class="clearfix"> </div>
							
						</div>
							</div>
							<div class="col-md-6">
							<div class="w3layouts_commodity_news_grid w3layouts_commodity_news_grid_gas">
							<div class="w3layouts_commodity_news_grid_left">
								<a href="single.html">Index Calculation</a>
								<div class="w3layouts_commodity_news_grid_right">
								<img src="<?php echo base_url(); ?>assets/images/ser_2.jpg" alt=" " class="img-responsive" />
							</div>
								<p>Years of experience in indexing, combined with our state of the art index calculation technology platform, allows us to serve as an efficient and high quality solution to all the indexing needs of our clients.</p>

							</div>
							<span class="more1"><a href="calculation.html">read more&nbsp;??</a></span>
							<div class="clearfix"> </div>
							
						</div>
							</div>	
						</div>
					<div class="w3l_news_board" style="margin:34px 0 24px">
						<h2><i class="fa fa-file-text-o" aria-hidden="true"></i>News & Press Releases</h2>
						<div class="w3ls_tabs">
							<a href="single.html"><h3>Nifty dips for 2nd day, Sensex manages to hold 28k; Midcap rises, IT &amp; FMCG drag</h3></a>
						</div>
						<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">News</a></li>
								<li role="presentation"><a href="#latest" role="tab" id="latest-tab" data-toggle="tab" aria-controls="latest">Press Releases</a></li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
									<ol class="w3_tab_list w3_tab_list_home">
										<li><a href="#">Analysts bet on aviation despite weak Q1; InterGlobe, Jet up</a><span class="dt">February 26, 2018</span></li>
										<li><a href="#">A. Balasubramanian on Macro view of India's Economic Growth</a><span class="dt">March 6, 2018</span></li>
										<li><a href="#">Tree House rallies as board approves merger with Zee Learn</a><span class="dt">March 3, 2018</span></li>
										<li><a href="#">Commercial vehicles: Truck rentals fall 3.5% in August 2016</a><span class="dt">February 17, 2018</span></li>
										<li><a href="#">Gujarat Industries power purchase agreement with GUVNL expires</a><span class="dt">January 19, 2018</span></li>
									</ol>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="latest" aria-labelledby="latest-tab">
									<ol class="w3_tab_list">
										<li><span>6:23 PM</span> <a href="#">Hope for double-digit revenue run rate by Q4FY17: Just Dial</a></li>
										<li><span>6:02 PM</span> <a href="#">Why investors can stop freaking out over the Fed, in three words</a></li>
										<li><span>5:43 PM</span> <a href="#">Two Fed rate hikes 'conceivable' in 2016, Sept in play: Lockhart</a></li>
										<li><span>5:40 PM</span> <a href="#">Dish TV, Videocon D2H in final stages of merger deal: Sources</a></li>
										<li><span>5:32 PM</span> <a href="#">Cisco Systems to lay off about 14,000 employees: Report</a></li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<div class="agileits_news_chart">
						<div class="ui-widget ui-corner-all">
							<div class="ui-widget-content ui-corner-bottom" >
								<div id="chart1"></div>
							</div>
						</div>
					</div>
					
						
					
				</div>
				<div class="col-md-4 agileinfo_news_original_grids_right">
					<div class="w3layouts_newsletter">
						<h3><i class="fa fa-envelope" aria-hidden="true"></i>Newsletter</h3>
						<form action="#" method="post">
							<input class="email" name="Email" type="email" placeholder="Email" required="">
							<input type="submit" value="Send">
						</form>
					</div>					
					<div class="w3l_your_stocks">
						<h3><i class="fa fa-stack-exchange" aria-hidden="true"></i>Have Indxx Contact You</h3>
						<form action="#" method="post">
							<span>
								<label>Name</label>
								<input type="text" name="Name" placeholder="Name" required="">
							</span>
							<span>
								<label>Company</label>
								<input type="text" name="Company" placeholder="Company" required="">
							</span>
							<span>
								<label>Phone Number</label>
								<input type="text" name="Phone" placeholder="Phone" required="">
							</span>
							<span>
								<label>Email</label>
								<input type="email" name="Email" placeholder="Email" required="">
							</span>
							<span>
								<label>Question</label>
								<input type="email" name="Email" placeholder="I am interested in" required="">
							</span>
							<input type="submit" value="Submit">
						</form>
					</div>
				</div>
				
				<div class="clearfix"> </div>
					<div class="agile_commodity_videos">
						<h3><i class="fa fa-users" aria-hidden="true"></i>Select Clients</h3>
						<ul id="flexiselDemo1">	
							<li>
								<div class="agile_commodity_videos_grid">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url(); ?>assets/images/c9.jpg">
									</div>
								</div>
							</li>
							<li>
								<div class="agile_commodity_videos_grid">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url(); ?>assets/images/c8.jpg">
									</div>
								</div>
							</li>
							<li>
								<div class="agile_commodity_videos_grid">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url(); ?>assets/images/c7.jpg">
									</div>
								</div>
							</li>
							<li>
								<div class="agile_commodity_videos_grid">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url(); ?>assets/images/c6.jpg">
									</div>
								</div>
							</li>
							<li>
								<div class="agile_commodity_videos_grid">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url(); ?>assets/images/c5.jpg">
									</div>
								</div>
							</li>
							<li>
								<div class="agile_commodity_videos_grid">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url(); ?>assets/images/c4.jpg">
									</div>
								</div>
							</li>
							<li>
								<div class="agile_commodity_videos_grid">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url(); ?>assets/images/c3.jpg">
									</div>
								</div>
							</li>
							<li>
								<div class="agile_commodity_videos_grid">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url(); ?>assets/images/c2.jpg">
									</div>
								</div>
							</li>
							<li>
								<div class="agile_commodity_videos_grid">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url(); ?>assets/images/c1.jpg">
									</div>
								</div>
							</li>
						</ul>
						<script>
							$(document).ready(function() {
							$('.w3ls_play_icon').magnificPopup({
								type: 'inline',
								fixedContentPos: false,
								fixedBgPos: true,
								overflowY: 'auto',
								closeBtnInside: true,
								preloader: false,
								midClick: true,
								removalDelay: 300,
								mainClass: 'my-mfp-zoom-in'
							});
																							
							});
						</script>
						<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 6,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 2
										}, 
										landscape: { 
											changePoint:640,
											visibleItems:3
										},
										tablet: { 
											changePoint:768,
											visibleItems: 4
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flexisel.js"></script>
					</div>
			</div>
		</div>
	</div>
	<?php include("footer.php"); ?>
<script>
	  $('.marquee').marquee({
		gap: 100,
		delayBeforeStart: 0,
		direction: 'left',
		duplicated: true,
		pauseOnHover: true
	});
	</script>
	
<script type="text/javascript">
    $(window).load(function () {
		var d0 = [[2, 5], [4, 8], [6, 2], [7, 3], [10, 4], [12, 5], [13, 6], [14, 4]];
			var plot2 = $.plotAnimator($("#chart2"), [{ data: d0, animator: {steps: 136, duration: 2500, start:0}, lines: { show: true, fill: true },label: "SENSEX" }],{grid: { backgroundColor: { colors: [ "#fff", "#eee" ] }}});

		$("#bnt2").attr("disabled", "disabled");
		$("#chart2").on("animatorComplete", function() {
			$("#bnt2").removeAttr("disabled")
		});
		$("#bnt2").on("click",function() {
			$("#bnt2").attr("disabled", "disabled");
				plot2 = $.plotAnimator($("#chart2"), [{ data: d0, animator: {steps: 136, duration: 2500, start:0}, lines: { show: true, fill: true },label: "SENSEX" }],{grid: { backgroundColor: { colors: [ "#fff", "#eee" ] }}});
		});
		
		var d5 = [[1, 4], [2, 2], [4, 4], [6, 2], [8, 4], [10, 2], [15, 4], [20, 2]];
    	var d6 = [[1, 3], [20, 3]];
	var plot3 = $.plotAnimator($("#chart3"), [{ data: d5, animator: {steps: 136, duration: 2000, start:0}, lines: { show: true, fill: true }, label: "Fill this"}, { data: d6, lines: { show: true, fill: false}, label: "Standard Values" }],{grid: { backgroundColor: { colors: [ "#fff", "#eee" ] }}});

	$("#bnt3").attr("disabled", "disabled");
	$("#chart3").on("animatorComplete", function() {
		$("#bnt3").removeAttr("disabled")
	});
	$("#bnt3").on("click",function() {
		$("#bnt3").attr("disabled", "disabled");
		plot3 = $.plotAnimator($("#chart3"), [{ data: d5, animator: {steps: 136, duration: 2000, start:0}, lines: { show: true, fill: true }, label: "Fill this"}, { data: d6, lines: { show: true, fill: false}, label: "Standard Values" }],{grid: { backgroundColor: { colors: [ "#fff", "#eee" ] }}});
	});
	
    });
</script> 
    <script class="code" type="text/javascript">
        $(document).ready(function () {
            $.jqplot._noToImageButton = true;
            var prevYear = [["2016-08-20",398], ["2016-08-21",255.25], ["2016-08-22",263.9], ["2016-08-23",154.24], 
            ["2016-08-24",210.18], ["2016-08-25",109.73], ["2016-08-26",166.91], ["2016-08-27",330.27], ["2016-08-28",546.6], 
            ["2016-08-29",260.5], ["2016-08-30",330.34], ["2016-08-31",464.32], ["2016-09-01",511.83], ["2016-09-02",721.15], ["2016-09-03",649.62], 
            ["2016-09-04",653.14], ["2016-09-06",900.31], ["2016-09-07",803.59], ["2016-09-08",851.19], ["2016-09-09",2059.24], 
            ["2016-09-10",994.05], ["2016-09-11",742.95], ["2016-09-12",1340.98], ["2016-09-13",839.78], ["2016-09-14",1769.21], 
            ["2016-09-15",1559.01], ["2016-09-16",2099.49], ["2016-09-17",1510.22], ["2016-09-18",1691.72], 
            ["2016-09-19",1074.45], ["2016-09-20",1529.41], ["2016-09-21",1876.44], ["2016-09-22",1986.02], 
            ["2016-09-23",1461.91], ["2016-09-24",1460.3], ["2016-09-25",1392.96], ["2016-09-26",2164.85], 
            ["2016-09-27",1746.86], ["2016-09-28",2220.28], ["2016-09-29",2617.91], ["2016-09-30",3236.63]];

            var currYear = [["2016-08-20",796.01], ["2016-08-21",510.5], ["2016-08-22",527.8], ["2016-08-23",308.48], 
            ["2016-08-24",420.36], ["2016-08-25",219.47], ["2016-08-26",333.82], ["2016-08-27",660.55], ["2016-08-28",1093.19], 
            ["2016-08-29",521], ["2016-08-30",660.68], ["2016-08-31",928.65], ["2016-09-01",1023.66], ["2016-09-02",1442.31], ["2016-09-03",1299.24], 
            ["2016-09-04",1306.29], ["2016-09-06",1800.62], ["2016-09-07",1607.18], ["2016-09-08",1702.38], 
            ["2016-09-09",4118.48], ["2016-09-10",1988.11], ["2016-09-11",1485.89], ["2016-09-12",2681.97], 
            ["2016-09-13",1679.56], ["2016-09-14",3538.43], ["2016-09-15",3118.01], ["2016-09-16",4198.97], 
            ["2016-09-17",3020.44], ["2016-09-18",3383.45], ["2016-09-19",2148.91], ["2016-09-20",3058.82], 
            ["2016-09-21",3752.88], ["2016-09-22",3972.03], ["2016-09-23",2923.82], ["2016-09-24",2920.59], 
            ["2016-09-25",2785.93], ["2016-09-26",4329.7], ["2016-09-27",3493.72], ["2016-09-28",4440.55], 
            ["2016-09-29",5235.81], ["2016-09-30",6473.25]];

            var plot1 = $.jqplot("chart1", [prevYear, currYear], {
                seriesColors: ["rgba(78, 135, 194, 0.7)", "rgb(211, 235, 59)"],
                title: 'Monthly India Revenue',
                highlighter: {
                    show: true,
                    sizeAdjust: 1,
                    tooltipOffset: 9
                },
                grid: {
                    background: 'rgba(57,57,57,0.0)',
                    drawBorder: false,
                    shadow: false,
                    gridLineColor: '#666666',
                    gridLineWidth: 2
                },
                legend: {
                    show: true,
                    placement: 'inside'
                },
                seriesDefaults: {
                    rendererOptions: {
                        smooth: true,
                        animation: {
                            show: true
                        }
                    },
                    showMarker: false
                },
                series: [
                    {
                        fill: true,
                        label: '2015'
                    },
                    {
                        label: '2016'
                    }
                ],
                axesDefaults: {
                    rendererOptions: {
                        baselineWidth: 1.5,
                        baselineColor: '#444444',
                        drawBaseline: false
                    }
                },
                axes: {
                    xaxis: {
                        renderer: $.jqplot.DateAxisRenderer,
                        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                        tickOptions: {
                            formatString: "%b %e",
                            angle: -30,
                            textColor: '#666666'
                        },
                        min: "2016-08-20",
                        max: "2016-09-30",
                        tickInterval: "7 days",
                        drawMajorGridlines: false
                    },
                    yaxis: {
                        renderer: $.jqplot.LogAxisRenderer,
                        pad: 0,
                        rendererOptions: {
                            minorTicks: 1
                        },
                        tickOptions: {
                            formatString: "$%'d",
                            showMark: false
                        }
                    }
                }
            });

              $('.jqplot-highlighter-tooltip').addClass('ui-corner-all')
        });
    </script>
	<script class="include" type="text/javascript" src="js/jquery.jqplot.js"></script>
	<script class="include" type="text/javascript" src="js/jqplot.dateAxisRenderer.js"></script>
    <script class="include" type="text/javascript" src="js/jqplot.logAxisRenderer.js"></script>
    <script class="include" type="text/javascript" src="js/jqplot.canvasTextRenderer.js"></script>
    <script class="include" type="text/javascript" src="js/jqplot.canvasAxisTickRenderer.js"></script>
	<script class="include" type="text/javascript" src="js/jqplot.highlighter.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
</body>
<style type="text/css">
	.list-aggregate li:nth-child(2n+1) {
    background: #e52d33;
}

.list-aggregate li:nth-child(2n+2) {
    background: #616664;
}
</style>
</html>
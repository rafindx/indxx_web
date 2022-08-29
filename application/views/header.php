<?php // print_r($stats);
$ta1= array();
$allindxx11= $this->indice->getIndexForSearch('indxx','name', array('productlist'=>1));

foreach($allindxx11 as $x1)
{
    array_push($ta1,$x1->name);   
}
//exit;
$str1= implode("','",$ta1);
$str1="'".$str1."'";
?>
<style>
    #ui-id-1{
        z-index: 1000 !important;
        background-color: white;
    cursor: pointer;
    }
</style>

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  
  $( function() {
    var availableTags = [
      <?php echo $str1; ?>
    ];
    $( "#tags" ).autocomplete({
      source: availableTags,
      minChars: 1,
width: 402,
matchContains: "word",
autoFill: true,
select: function (event, ui) {
    var label = ui.item.label;
    var value = ui.item.value;
   //store in session
  
//  $('#searchform').submit();

}
    });
  } );
  
  
  
  
  </script>
<div class="header">
		<div class="w3ls_header_top">
			<div class="container">
				<div class="clearfix"> </div>
				<div class="w3l_header_right">
					<ul class="w3_agileits_social_icons rgt">
						<li><a href="https://www.facebook.com/indxxcapital/" target="_blank" rel="nofollow" class="wthree_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://www.linkedin.com/company/843981/?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A843981%2Cidx%3A2-1-2%2CtarId%3A1480062938741%2Ctas%3Aindxx" target="_blank" rel="nofollow" class="wthree_linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li><a href="https://twitter.com/hashtag/Indxx?src=hash" target="_blank" rel="nofollow" class="wthree_linkedin"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</ul>
					<a href="tel:+18445546399" class="tpn"><i class="fa fa-phone-square" aria-hidden="true"></i> 1 844 55 INDXX (46399)</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="w3ls_header_middle">
			<div class="container">
				<div class="agileits_logo">
					<h1><a href="<?php echo base_url(); ?>" rel="nofollow" ><!--<span >Indexing Redefined</span>--></a></h1>
				</div>
                           
				<div class="agileits_search">
                                     <form action="<?php echo site_url('home/search'); ?>" id="searchform" method="post" style="float:right;">
                        <input id="tags" name="Search"  type="text" placeholder="<?php echo $this->lang->line('Search') ?>" required="">
                        <input type="submit" value="<?php echo $this->lang->line('Search') ?>">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="trade_navigation">
		<div class="container">
			<nav class="navbar nav_bottom" style="text-align:center;">
				<div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<nav class="wthree_nav">
						<ul class="nav navbar-nav nav_1">
                            <li class="<?php echo(isset($page) && $page == 'index') ? 'act': '' ?>"><a href="<?php echo site_url(); ?> " rel="nofollow" ><?php echo $this->lang->line('Home') ?></a></li><span class="gp">|</span> 
                            							<li class="<?php echo(isset($page) && $page == 'aboutus') ? 'act': '' ?>"><a href="<?php echo site_url('aboutus'); ?>" rel="nofollow" ><?php echo $this->lang->line('About Us') ?></a></li><span class="gp">|</span> 
<!--							<li class="dropdown <?php echo(isset($page) && $page == 'development') ? 'act': '' ?> <?php echo(isset($page) && $page == 'calculation') ? 'act': '' ?>" >
								<a href="<?php echo site_url('home/development'); ?>" class="dropdown-toggle" data-toggle="dropdown">Our Services<span class="caret"></span></a>				
								<div class="dropdown-menu w3ls_vegetables_menu">
									<ul>	
										<li><a href="<?php //echo site_url('home/development'); ?>">Index Development</a></li>
										<li><a href="<?php// echo site_url('home/calculation'); ?>">Index Calculation</a></li>
									</ul>             
								</div>
							</li>-->
                                                        <!--<span class="gp">|</span>--> 
							<li class="<?php echo(isset($page) && $page == 'indices') ? 'act': '' ?>"><a href="<?php echo site_url('indices'); ?>" rel="nofollow" ><?php echo $this->lang->line('Indices') ?></a></li><span class="gp">|</span> 
							<li class="<?php echo(isset($page) && $page == 'announcements') ? 'act': '' ?>"><a href="<?php echo site_url('announcements'); ?>" rel="nofollow" ><?php echo $this->lang->line('Announcements') ?></a></li><span class="gp">|</span> 
							<li class="<?php echo(isset($page) && $page == 'news') ? 'act': '' ?>"><a href="<?php echo site_url('news'); ?>" rel="nofollow" ><?php echo $this->lang->line('News & Research') ?></a></li><span class="gp">|</span> 
							<li class="<?php echo(isset($page) && $page == 'contactus') ? 'act': '' ?>"><a href="<?php echo site_url('contactus'); ?>" rel="nofollow" ><?php echo $this->lang->line('Contact Us') ?></a></li>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>

<!----4-6-2021--->
<meta name="Language" content="English" />
<meta name="Publisher" content="Indxx Services" />
<meta name="Revisit-After" content="2 Days" />
<meta name="distribution" content="Local" />
<meta name="Robots" content="INDEX, FOLLOW" />
<meta name="page-topic" content="Indxx Services">
<meta name="YahooSeeker" content="INDEX, FOLLOW">
<meta name="msnbot" content="INDEX, FOLLOW">
<meta name="googlebot" content="index,follow"/> 
<meta name="Rating" content="General"/> 
<meta name="allow-search" content="yes">
<meta name="expires" content="never">
<!----  END  4-6-2021--->

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
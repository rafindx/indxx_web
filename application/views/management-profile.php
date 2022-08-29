<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Our People | Indxx</title>
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
   
      <script src="<?php echo base_url(); ?>assets/js/accordion.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-DGHDKQGXVJ"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
            
              gtag('config', 'G-DGHDKQGXVJ');
            </script>


   </head>
   <body>
      

      <?php include("header.php"); ?>   
<section id="page_banner" class="border_b">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="solution" class="p-t-100 p-b-100">
        <div class="container">
            <div class="row">
						<div class="mrgn_bm">
							<a class="back" href="<?php echo site_url('home/aboutus/management');?>" rel="nofollow" ><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Our People</a>
						</div>
                          
                            <div class="main-services col-md-10">
                                <div class="service-content">
                                    <h4><?php echo $profile->name; ?></h4>
									<h5><?php echo $profile->designation; ?></h5><br>
                                    <p><?php echo $profile->about; ?></p>

                                </div>
                            </div>
                <div style="padding-top: 42px;" class="services-img  col-md-2">
                                <img src="<?php echo base_url('/uploads/management/');?><?php echo $profile->image; ?>" class="tm_img ov_img" alt="management"/>
                            </div>
                     
			</div>
			</div>
    </section>
        <?php include("footer.php"); ?>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <style type="text/css">
      h4{cursor: pointer;}
      </style>
      <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>
<script>
$('.truncated').hide() // Hide the text initially
.after('<a title="expand text" href="#">[...]</a>') // Create toggle button
.next().on('click', function () { // Attach behavior
    $(this).text() == '[^]' // Swap the html
      ? $(this).text('[...]').attr("title", "expand text")
      : $(this).text('[^]').attr("title", "collapse text");
    $(this).prev().toggle(); // Hide/show the text
});

history.pushState(null, null, '<?php echo $_SERVER["REQUEST_URI"]; ?>');
window.addEventListener('popstate', function(event) {
    window.location.assign("<?php echo site_url('home/aboutus/management');?>");
});
</script>
</script>
<script>

  window.addEventListener('load', function() {

jQuery('a[href*="mailto:"]').click(function(){gtag('event','click',{'event_category':'email','event_label':jQuery(this).attr("href")})});

jQuery('a[href*="tel:"]').click(function(){gtag('event','click',{'event_category':'phone','event_label':jQuery(this).attr("href")})});

  });

</script>
<!-- Twitter universal website tag code -->
<script>
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
// Insert Twitter Pixel ID and Standard Event data below
twq('init','o50xs');
twq('track','PageView');
</script>
<!-- End Twitter universal website tag code -->


   </body>
</html>
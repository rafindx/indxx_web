<!DOCTYPE html>
<html lang="en">
    <head>
        <!--<title>Contact Us | Indxx</title>-->
        <title>Contact Us- Indxx </title>
        <meta name="keywords" content="Robotics Index, Index Services, Index Development, Artificial Intelligence Indices" />
        <meta name="description" content="Connect with us to learn more about our offerings. Contact us at- +1 (844) 55- (46399) or mail at- info@indxx.com.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Indxx seeks to redefine the global indexing space.">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/services.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
               
                
          <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PNL4QPB');</script>
        <!-- End Google Tag Manager -->
                

                <style>
               .alert{
                margin:0;
            }
            .alert-heading{
                text-align:center;
                border: 2px solid #f83732;
                width: 100%;
                padding: 10px 0;
            }
           
            .alert-indxx{
                text-align:center;
                border: 2px solid #f83732;
                justify-content:center;
                align-items:center;
            }
            .thankyoumodal{
                padding-top:10px;
                display:none;
                justify-content:center;
                align-items:center;
                text-align:center;
                
            }
            .modal-content-modal{
                border: 2px solid #f83732;
            }
            
            .form {
              height:440px;
              width:100%;
              background: #f2f2f2;
              padding: 20px 30px;
              max-width: calc(100vw - 40px);
              box-sizing: border-box;
              font-family: "Montserrat", sans-serif;
              position: relative;
              display:none; /* To hide popup form */
              
            }
            .form-h2 {
              margin: 10px 0;
              padding-bottom: 10px;
              width: 200px;
              color: #f83732;
              border-bottom: 3px solid #f83732;
            }
             @media (min-width:1000px) and (max-width: 1200px){
                .form-h2{
                      margin: 10px 0;
                      padding-bottom: 10px;
                      width: 180px;
                      color: #f83732;
                      border-bottom: 3px solid #f83732;
                }
             }
            .modal-h2 {
              margin: 10px 0;
              padding-bottom: 10px;
              width: 280px;
              color: #f83732;
              border-bottom: 3px solid #f83732;
            }
            .form input {
              width: 100%;
              padding: 10px;
              box-sizing: border-box;
              background: none;
              outline: none;
              resize: none;
              border: 0;
              font-family: "Montserrat", sans-serif;
              transition: all 0.3s;
              border-bottom: 2px solid #bebed2;
            }
            .form input:focus {
              border-bottom: 2px solid #f83732;
            }
            .form p{
                
                color:#f83732;
            }
            .form p:before {
              content: attr(type);
              display: block;
              margin: 28px 0 0;
              font-size: 14px;
              color: #5a5a5a;
            }
            .form button {
              float: right;
              padding: 8px 12px;
              margin: 8px 0 0;
              font-family: "Montserrat", sans-serif;
              border: 2px solid #f83732;
              background: 0;
              color: #ff221c;
              cursor: pointer;
              transition: all 0.3s;
            }
            .form button:hover {
              border: 2px solid #ff3b36;
              background: #f83732;
              color: #fff;
            }
            .form-overlay {
              content: "Hi";
              position: absolute;
              bottom: -10px;
              right: -15px;
              background: #50505a;
              color: #fff;
              padding: 6px 4px 6px 0;
              border-radius: 6px;
              font-size: 11px;
              box-shadow: 10px 10px 40px -14px #000;
            }
            .form-overlay-modal {
              content: "Hi";
              position: absolute;
              bottom: -15px;
              right: -20px;
              background: #50505a;
              color: #fff;
              padding: 6px 4px 6px 0;
              border-radius: 6px;
              font-size: 15px;
              box-shadow: 10px 10px 40px -14px #000;
            }
            .form span {
              margin-top:10px;
            }
            .close {
              background: #f83732;
              height: 30px;
              width: 30px;
              border-radius: 50%;
              position: absolute;
              top: -15px;
              right: -16px;
              cursor: pointer;
              z-index: 1051;
              transition: .2s .1s;
              opacity:1;
            }
            .close:hover{
              opacity:1;
              transform: scale(1.1);
            }
            .close:before, .close:after {
              content: '';
              background: #FFF; 
              height: 50%;
              width: 3px;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%) rotate(-45deg);
            }
            .close:after {
              transform: translate(-50%, -50%) rotate(45deg);
            }
            .btn:focus { 
                outline: none !important;
            }
            .btn.btn-danger{
                background:#f83732;
                border-radius: 0;
            }
                
            .btn.btn-success.focus,
            .btn.btn-success:focus {
              color: #fff;
              background-color: #f83732;
              border-color: #f83732;
              outline: none;
              box-shadow: none;
            }
                
            .btn.btn-danger:hover {
                  color: #fff;
                  background-color: #f83732;
                  border-color: #f83732;
                  outline: none;
                  box-shadow: none;
                }
            .btn.btn-danger.active,
                .btn.btn-danger:active {
                  color: #fff;
                  background-color: #f83732;
                  border-color: #f83732;
                  outline: none;
                }
             #popup {
                  position: absolute;
                  visibility: hidden;
                  z-index: 10002;
                  top:5vh;
                  left:30vw;
                  opacity: 0;
                  transform: scale(0.5);
                  transition: transform 0.2s, opacity 0.2s, visibility 0s 0.2s;
                  margin: 0 auto;
                  box-shadow: 0 1px 10px rgba(0, 0, 0, 0.5);
                  width: 40%;
                }

                </style>

    </head>

    <body>
        
       <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PNL4QPB"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
        
        <?php include("header.php"); ?>
        <section id="contact" class="border_b">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">  
                        <div class="page-header" style="border-bottom: 1px solid #999!important;" >
                            <h2 style="color:#242424!important;">Contact Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="w3_agileits_keep_touch">
            <div class="container">
                <div class="col-md-8">

                    <div class="cforms">
                        <div id="form_status">
 <?php if ($this->session->flashdata('msg_edit')) { ?>
 <script>gtag('event','submit',{'event_category':'form','event_label':'Contact Form'})</script>
     <div id="mydiv" class="alert alert-success"><?= $this->session->flashdata('msg_edit') ?>
     </div>
   <?php } ?></div>
                      
                        <form action="<?= base_url('index.php/home/addContact'); ?>" method="post">
                            <div class="col-md-6">
                                <h3>Contact Information</h3>
                                <label class="input">
                                    <input type="text" name="name" id="name" class="alphaSpaceOnly" required="required" placeholder="Name">
                                </label>
                                <div class="clearfix"></div>
                                <label class="input">
                                    <input type="text" name="company" id="company" class="alphaSpaceOnly" required="required" placeholder="Company">
                                </label>
                                <div class="clearfix"></div>
                                <label class="input">
                                    <input type="email" name="email" id="email" placeholder="Email" required="required">
                                </label>
                                <div class="clearfix"></div>
                                <label class="input">
                                    <input  type="text" name="phone" id="phone"class="num_only" placeholder="Phone" required="required">
                                </label>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6">
                                <h3>&nbsp;</h3>
                                <label class="textarea">
                                    <textarea class="textarea" name="question" rows="5" cols="1" placeholder="Message"></textarea>
                                </label>
                                <div class="clearfix"></div>
                                <button type="submit" class="button">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 cforms"> 
                <h3>&nbsp;</h3>
                <p><span class="strg">Phone: </span> <a href="tel:+18445546399">+1 (844) 55-INDXX (46399)</a></p>
                <p><span class="strg">Email: </span><a href="mailto:info@indxx.com">info@indxx.com</a></p>
                <p><span class="strg">Human Resources: </span><a href="mailto:HR@indxx.com">HR@indxx.com</a></p>
                <p><span>See "About Us" for current open positions. </span></p>
            </div>

            <div class="clearfix"> </div>
            <hr class="line1">			
        </div>
        <div class="container">
            <div class="row"> 
                <div class="col-md-12 cforms"> 
                    <h4>Office Locations</h4>
                    <div class="col-md-4">
                        <p><strong>USA:</strong><br>
                            <br>
                            <strong>New York:</strong><br>
                            470 Park Avenue South,<br>
                            Floor 8 South<br>
                            New York, NY 10016</p>
                        <br>
                        <p><strong>Miami:</strong><br>
                        <!--78 SW 7th Street,<br>
                        Suite 500<br>
                        Miami, FL 33130-->
                        Waterford Business Park,<br>
                        5201 Blue Lagoon Dr,<br>
                        Miami FL 33126
                        </p>
                       
                    </div>
                    <div class="col-md-4">
                        <p>
                            <strong>Europe:</strong></br>
                            Na Pankráci 1618/30,<br>
                            140 00 Prague 4, Nusle<br>
                            Czech Republic
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p>
                            <strong>Asia:</strong><br>
                            Indxx Tower,<br> 
                            390, Electronic City, Phase IV,<br>
                            Udyog Vihar, Sector 18,<br>
                            Gurugram 122022<br>
                            India<br><br>
                            
                            
                            91springboard JP Nagar <br>
                            175 & 176, Bannerghatta Main Rd, Dollars Colony,<br>
                            Bengaluru, Karnataka 560076<br> 
                            India<br><br>
                            
                            91Springboard Business Hub Private Limited  <br>
                            Mythri Square<br>
                            2-41/11, 6/2 Gachibowli - Miyapur Road, <br>
                            Laxmi Cyber City, Prasanth Nagar Colony, Kondapur,<br>
                            Hyderabad, Telangana  500084,<br>
                            India<br><br>
                            </p>
                    </div>
                </div>
            </div>
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs mrg" role="tablist">
                    <li role="presentation" class="active"><a href="#USA" rel="nofollow" id="USA-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true" class="str">USA-NY</a></li>
                    <li role="presentation"><a href="#us-fl" rel="nofollow" role="tab" id="usfl-tab" data-toggle="tab" aria-controls="us-fl" class="str">USA-FL</a></li>
                    <li role="presentation"><a href="#europe" rel="nofollow" role="tab" id="europe-tab" data-toggle="tab" aria-controls="europe" class="str">Europe</a></li>
                    <li role="presentation"><a href="#asia_HR" rel="nofollow" role="tab" id="asia_HR-tab" data-toggle="tab" aria-controls="asia" class="str">Asia-HR</a></li>
                    <li role="presentation"><a href="#asia_KA" rel="nofollow" role="tab" id="asia_KA-tab" data-toggle="tab" aria-controls="asia" class="str">Asia-KA</a></li>
                    <li role="presentation"><a href="#asia_TS" rel="nofollow" role="tab" id="asia_TS-tab" data-toggle="tab" aria-controls="asia" class="str">Asia-TS</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="USA" aria-labelledby="USA-tab">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.7403415800404!2d-73.98488238432186!3d40.745738743487486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa814b44859c517f3!2sIndxx!5e0!3m2!1sen!2sin!4v1518761269187" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="us-fl" aria-labelledby="usfl-tab">
                        
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.1108749415243!2d-80.19594528497896!3d25.7669010836344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b684eeadddcf%3A0xad77afbe5af4ea90!2s78%20SW%207th%20St%2C%20Miami%2C%20FL%2033130%2C%20USA!5e0!3m2!1sen!2sin!4v1612169991497!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3592.6109436166867!2d-80.29392578502612!3d25.78341118362684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b9c3746ecb55%3A0xdf3b636c7e10bdbe!2sWaterford%20Business%20Park!5e0!3m2!1sen!2sin!4v1631267678900!5m2!1sen!2sin"  width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="europe" aria-labelledby="europe-tab">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1280.7188782616627!2d14.42988777524052!3d50.05936294530875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b94655af8b6e1%3A0x1cfda07e020c25fb!2sNa+Pankr%C3%A1ci+1618%2F30%2C+140+00+Praha+4-Nusle%2C+Czechia!5e0!3m2!1sen!2sin!4v1520833527030" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="asia_HR" aria-labelledby="asia_HR-tab">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.3200786319026!2d77.07201401492017!3d28.5000161824703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19803d179c8f%3A0xfd2743e817e28b2b!2sIndxx%20Tower!5e0!3m2!1sen!2sin!4v1603272120659!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="asia_KA" aria-labelledby="asia_KA-tab">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.058794202992!2d77.59909531476988!3d12.90394099090027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1519380fc7ad%3A0x8195f8645dab7f8c!2s91springboard%20JP%20Nagar!5e0!3m2!1sen!2sin!4v1613133916223!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="asia_TS" aria-labelledby="asia_TS-tab">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.0420787438948!2d78.36356961482703!3d17.457699988036502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93611d72d79d%3A0xc0b09c9e7fd5466a!2s91springboard%20-%20Hitech%20Kondapur!5e0!3m2!1sen!2sin!4v1613134004343!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
               
                    </div>

                </div>
            </div>

        </div>
    </div>


<?php include("footer.php"); ?>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
     <!--closing intent popup-->
                                        <div id="popup">
                                          <div class="alert alert-indxx d-none" id="closing-message" role="alert" style="display:none">
                                             <p>Thanks for providing your contact details, we will reach out to you shortly!</p>
                                          
                                          </div>

                                                
                                                  
                                                  <form class="form" id="closingform" method="post" name="contact-modal-form">
                                                     <div class="close" title="close" id="closeciform"></div>
                                                      
                                                          <h2 class="modal-h2">GET IN TOUCH</h2>
                                                          <p>Name:<input  id="c-name" required="required" type="text"></input></p>
                                                          <p>Company:<input  id="c-company" required="required" type="text"></input></p>
                                                          <p>Work Email:<input  id="c-email" required="required" type="email"></input></p>
                                                          <input type="hidden" id="form_type" value="ContactUs-ClosingIntent-Form">
                                                          <button id="closing-popup" type="submit" onclick="save_in_touch()">SUBMIT</button>
                                                          <div class="form-overlay-modal">
                                                            &nbsp<span class="fa fa-phone"></span> 1 844 55 (46399)  &nbsp
                                                            <span class="fa fa-envelope-o"></span>  info@indxx.com
                                                          </div>
                                                  </form>
                                                
                                      </div>
                            <!--Time delayed Pop-Up-->
                                        
                                         
                                            <!-- <div class="modal fade" id="timedelayedmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
                                            <!--<div class="modal-dialog" role="document">-->
                                            <!--  <div class="modal-content">-->
                                                
                                                   
                                            <!--         <div class="alert alert-indxx d-none" id="closing-td-message" role="alert" style="display:none">-->
                                            <!--             <p>Thanks for providing your contact details, we will reach out to you shortly!</p>-->
                                                      
                                            <!--          </div>-->
                                            <!--      <form class="form" id="timedelayedform" method="post" name="contact-modal-form" >-->
                                            <!--         <div class="close" title="close" id="closetdform"></div>-->
                                                      
                                            <!--              <h2 class="modal-h2">GET IN TOUCH</h2>-->
                                            <!--              <p>Name:<input  id="td-name" required="required" type="text"></input></p>-->
                                            <!--              <p>Company:<input  id="td-company" required="required" type="text"></input></p>-->
                                            <!--              <p>Work Email:<input  id="td-email" required="required" type="email"></input></p>-->
                                            <!--              <input type="hidden" id="form_type" value="ContactUs-TimeDelayed-Form">-->
                                            <!--              <button id="closing-popup" type="submit" onclick="save_in_touch()">SUBMIT</button>-->
                                            <!--              <div class="form-overlay-modal">-->
                                            <!--                &nbsp<span class="fa fa-phone"></span> 1 844 55 (46399)  &nbsp-->
                                            <!--                <span class="fa fa-envelope-o"></span>  info@indxx.com-->
                                            <!--              </div>-->
                                            <!--      </form>-->
                                            <!--   </div>-->
                                            <!--   </div>-->
                                            <!--   </div>-->
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
<script type="text/javascript">
setTimeout(function() {
  $('#mydiv').fadeOut('fast');
}, 5000); // <-- time in milliseconds
$(document).ready(function(){
   $(".alphaSpaceOnly").keypress(function(event){
       var inputValue = event.charCode;
      
       if(inputValue == 94)
       {
           event.preventDefault();
       }
       if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
           event.preventDefault();
       }
   });
});

$(document).ready(function () {
//called when key is down


  $(".num_only").bind("keydown", function (event) {
          if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
                    event.keyCode == 190 ||  event.keyCode == 110 ||
                    // Allow: Ctrl+A
                            (event.keyCode == 65 && event.ctrlKey === true) ||
                            // Allow: Ctrl+C
                                    (event.keyCode == 67 && event.ctrlKey === true) ||
                                    // Allow: Ctrl+V
                                            (event.keyCode == 86 && event.ctrlKey === true) ||
                                            // Allow: home, end, left, right
                                                    (event.keyCode >= 35 && event.keyCode <= 39)) {
                                        // let it happen, don't do anything
                                        return;
                                    } else {
                                        // Ensure that it is a number and stop the keypress
                                        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                                            event.preventDefault();
                                        }
                                    }
                                });
        $(".num_only").bind("keydown", function (event) {
          if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
                    event.keyCode == 190 ||  event.keyCode == 110 ||
                    // Allow: Ctrl+A
                            (event.keyCode == 65 && event.ctrlKey === true) ||
                            // Allow: Ctrl+C
                                    (event.keyCode == 67 && event.ctrlKey === true) ||
                                    // Allow: Ctrl+V
                                            (event.keyCode == 86 && event.ctrlKey === true) ||
                                            // Allow: home, end, left, right
                                                    (event.keyCode >= 35 && event.keyCode <= 39)) {
                                        // let it happen, don't do anything
                                        return;
                                    } else {
                                        // Ensure that it is a number and stop the keypress
                                        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                                            event.preventDefault();
                                        }
                                    }
                                });
                    });
                    
                    const closingform = document.getElementById('closingform');
      closingform.addEventListener('submit', function sample(event){
          event.preventDefault();
          closingform.style.display="none";
          var message= document.getElementById("closing-message");
          message.style.display="flex";
             setTimeout(()=>{
             var message = document.getElementById("closing-message");
             message.style.display="none";
             },3000)
      })
        const closeciform=document.getElementById('closeciform');
        closeciform.addEventListener("click", function closeform() {
        var closingform=document.getElementById('closingform');
        closingform.style.display="none";
        });
      
    //   const tdform = document.getElementById('timedelayedform');
    //   function displayform() {
            
    //         setTimeout(()=>{
    //          $("#timedelayedmodal").modal('show');
    //          },130000) 
    //     }
    //      if(sessionStorage.getItem('tdform')===null){
    //          window.onload = displayform;
    //      }
        
    //       tdform.addEventListener('submit', function sample(event){
        
    //       event.preventDefault();
    //       sessionStorage.setItem('tdform', true);
    //       tdform.style.display="none";
    //       var message= document.getElementById("closing-td-message");
    //       message.style.display="flex";
    //          setTimeout(()=>{
    //          message.style.display="none";
    //          },3000)
    //   })
    //   const closetdform=document.getElementById('closetdform');
    //     closetdform.addEventListener("click", function closeform() {
    //     $('#timedelayedmodal').modal('hide');
    //     });
    
    //  const resetForm= document.getElementById("knowMoreModal");
    //  resetForm.addEventListener('click',  resetfrom);
    //  function resetfrom(){
    //  var element3 = document.getElementById("successMessageModal");
    //  element3.style.display="none";
    //  };
    
            let eventListener;

            
           
            const show = () => {
                
                sessionStorage.setItem('showed', true);
                const element = document.querySelector("#popup");
                element.style.visibility = "visible";
                element.style.opacity = "1";
                element.style.transform = "scale(1)";
                element.style.transition = "0.4s, opacity 0.4s";

                eventListener = document.addEventListener("click", function (clickEvent) {
                let el = clickEvent.target;
                let inPopup = false;
                if (el.id === "popup") {
                inPopup = true;
                }
                while ((el = el.parentNode)) {
                if (el.id == "popup") {
                    inPopup = true;
                }
                }
                if (!inPopup) hide();
            });
            };

            const hide = () => {
            const element = document.querySelector("#popup");
            element.style.visibility = "hidden";
            element.style.opacity = "0";
            element.style.transform = "scale(0.5)";
            element.style.transition = "0.2s, opacity 0.2s, visibility 0s 0.2s";

            if (eventListener) {
                document.removeEventListener(eventListener);
            }
            };

            document.addEventListener("DOMContentLoaded", () => {
            document.addEventListener("mouseout", (event) => {
                
        
                 if(sessionStorage.getItem('showed')===null){
                    
                
                if (!event.toElement && !event.relatedTarget) {
                    
                    
                setTimeout(() => {
                    
                    show();
                }, 1000);
                }
            }
            });

            document.onkeydown = (event) => {
                event = event || window.event;
                if (event.keyCode === 27) {
                hide();
                }
            };
            });
</script>
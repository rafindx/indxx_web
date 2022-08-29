<!DOCTYPE html>
<html lang="en">
<head>
<!--<title>Announcements | Indxx</title>-->
<title>Announcements - Indxx</title>
<meta name="keywords" content="Index Services | White Label Index | Index Notification | Index Calculation" />
<meta name="description" content="View latest notifications/updates about our indices.">
 <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
 <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/services.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/accordion.js"></script>
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
                /*border: 2px solid #f83732;*/
                background: #f2f2f2;
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
              font-family: "Montse
              display:none; /* To hide popup form */
              
            }
            .form-h2 {
              margin: 10px 20px;
              padding-bottom: 10px;
              width: 161px;
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
              padding: 2px;
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
              float: center;
              padding: 8px 12px;
              margin: 8px 50px 0;
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
                h2{
                    font-size: 27px;
                }
                </style>

</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PNL4QPB"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
   <?php include("header.php"); ?>
    <section id="acounce" class="border_b">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Announcements</h2>
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
                        <h3>Announcements</h3>
						        <ul>
								<li role="presentation" class="active"><a href="#notifications" id="notifications-tab" role="tab" data-toggle="tab" rel="nofollow" aria-controls="notifications" aria-expanded="true" class="str"><i class="fa fa-bell-o" aria-hidden="true"></i> Index Notifications</a></li>
								<li role="presentation"><a href="#documents" role="tab" id="documents-tab" rel="nofollow" data-toggle="tab" aria-controls="documents" class="str"><i class="fa fa-file" aria-hidden="true"></i> Index Documents</a></li>
							<!-- 	<li role="presentation"><a href="#calendar" role="tab" id="calendar-tab" rel="nofollow" data-toggle="tab" aria-controls="calendar" class="str"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar</a></li> -->
							</ul>
                    </div>
<!--                      <div class="alert alert-heading invisible" role="alert" id="successmessage" >
                         <p class="alert-heading-p">We Will Get Back To You Soon</p>
                         </div> -->
                        <form class="form" id="cform" method="post" name="contact-form">
                           <h2 class="form-h2">CONTACT US</h2>
                           <p>Name:<input id="name" required="required" type="text"></input></p>
                           <p>Company:<input id="company" required="required" type="text"></input></p>
                          <p>Email:<input id="email" required="required" type="email"></input></p>
                          <input type="hidden" id="form_type" value="Announcements-Inbuilt-Form">
                          <button type="submit" onclick="save_in_touch()">SUBMIT</button>
       <!--                    <div class="form-overlay">
                            &nbsp<span class="fa fa-phone"></span>1 844 55 (46399) &nbsp
                            <span class="fa fa-envelope-o"></span> info@indxx.com
                          </div> -->          
                        </form>
                          <div class="alert alert-heading form invisible" role="alert" id="successmessage" >
                         <p class="alert-heading-p" style="margin-top:150px; color: #000 !important;">Thank You!</br> Our team will get in touch soon.</p>&nbsp;<span class="fa fa-phone"></span>+1 844 55 46399 </br>
                         <span class="fa fa-envelope-o"></span> info@indxx.com
                         </div>

                </div>

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="row m-t-40 pleft">
					<div class="agileits_about_grids w3ls_products_grid">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">							
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="notifications" aria-labelledby="notifications-tab">
									
						 <h3>Index Notifications</h3>

						 <div class="agileits_technical_research">
							

							<?php foreach($notification as $newsHeading => $news){ ?>
                              <h4 style="cursor: pointer;" id="xx<?php echo $newsHeading; ?>"><?php echo $newsHeading; ?></h4>
                              <ul class="list2 hide" id="data<?php echo $newsHeading; ?>">
                                 <?php foreach($news as $res){ 
					echo $res['url'];	
                          if ($res['url'] == '') {
    
                                  $link = base_url() . 'assets/images/media/' . $res['pdf'];
                                                } else {
                                                    $link = $res['url'];
                                                }	?>		<li><a href="<?php echo $link ?>" rel="nofollow" target="_blank"><?php echo $res['title']; ?></a><Span style="float:right;"><?php echo   date('M d, Y', strtotime($res['date'])); ?></Span></li>
                                 <?php } ?>
                              </ul>
								<div class="clearfix"></div>
                              <script>
                                    $(document).ready(function(){
                                        $('#data<?php echo  date('Y'); ?>').removeClass('hide');
                                        $('#data1<?php echo  date('Y'); ?>').removeClass('hide');
                                        $('#data2<?php echo  date('Y'); ?>').removeClass('hide');
                                        $("#xx<?php echo $newsHeading; ?>").click(function(){
                                            $("#data<?php echo $newsHeading; ?>").toggleClass("hide");
                                        });
                                    }); 
                                    </script>
                              <?php } ?>
						</div>
							</div>
								
								<div role="tabpanel" class="tab-pane fade" id="documents" aria-labelledby="documents-tab">
										<h3>Index Documents</h3>				
										<?php foreach($document as $docHeading => $doc){ 
                                                                                  
                                                                                    ?>
										<h4    style="cursor: pointer;" id="yyy<?php echo $docHeading; ?>"><?php echo $docHeading; ?></h4>
										<ul class="list2 hide " id="data1<?php echo $docHeading; ?>">
											<?php foreach($doc as $document){ 
                                                                                            ?>
										 <li><a  href="<?php echo base_url()?>assets/media/document/<?php echo $document['document'] ?>" rel="nofollow" target="_blank"><?php echo $document['title']; ?></a></li>
										 <?php } ?>								
										</ul>
                                                                                  <script>
                                    $(document).ready(function(){
                                        $("#yyy<?php echo $docHeading; ?>").click(function(){
                                            $("#data1<?php echo $docHeading; ?>").toggleClass("hide");
                                        });
                                    }); 
                                    </script>
										<?php } ?>
								</div>
								<!-- <div role="tabpanel" class="tab-pane fade" id="calendar" aria-labelledby="calendar-tab">
										<h3>Calendar</h3>
										<?php foreach($calander as $calHeading => $cal){ ?>
										<h4   style="cursor: pointer;" id="zzz<?php echo $calHeading; ?>"><?php echo $calHeading; ?></h4>
										<ul class="list2 hide" id="data2<?php echo $calHeading; ?>">
											<?php foreach($cal as $calander){ ?>
										 <li><a  href="<?php echo base_url()?>assets/media/calendar/<?php echo $calander['pdf'] ?>" target="_blank"><?php echo $calander['title']; ?></a></li>
										 <?php } ?>								
										</ul>
                                                                                  <script>
                                    $(document).ready(function(){
                                        $("#zzz<?php echo $calHeading; ?>").click(function(){
                                            $("#data2<?php echo $calHeading; ?>").toggleClass("hide");
                                        });
                                    }); 
                                    </script>
										<?php } ?>
								</div> -->
							
							</div>
						</div>
							
							
				</div>
                </div>

            </div>
        </div>
    </section>
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
                                                             <input type="hidden" id="form_type" value="Announcements-ClosingIntent-Form">
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
                                            <!--          <div class="close" title="close" id="closetdform"></div>-->
                                                      
                                            <!--              <h2 class="modal-h2">GET IN TOUCH</h2>-->
                                            <!--              <p>Name:<input  id="td-name" required="required" type="text"></input></p>-->
                                            <!--              <p>Company:<input  id="td-company" required="required" type="text"></input></p>-->
                                            <!--              <p>Work Email:<input  id="td-email" required="required" type="email"></input></p>-->
                                            <!--              <input type="hidden" id="form_type" value="Announcements-TimeDelayed-Form">-->
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

  const form =document.getElementById('cform');
    form.addEventListener('submit', function successform(event){
     event.preventDefault();
     var element = document.getElementById("successmessage");
     element.classList.remove("invisible");
     document.contact-form.reset();
     setTimeout(()=>{
     var element = document.getElementById("successmessage");
     element.classList.remove("invisible");
     form.style.display = 'none';
     },350000000000000)
    })
      
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
    //  console.log("uo");
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

  window.addEventListener('load', function() {

jQuery('a[href*="mailto:"]').click(function(){gtag('event','click',{'event_category':'email','event_label':jQuery(this).attr("href")})});

jQuery('a[href*="tel:"]').click(function(){gtag('event','click',{'event_category':'phone','event_label':jQuery(this).attr("href")})});

  });

</script>



</body>
</html>
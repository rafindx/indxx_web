<!DOCTYPE html>
<html lang="en">
   <head>
      <title>News | Indxx</title>
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
       <!-- Global site tag (gtag.js) - Google Analytics -->

                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-39282487-5"></script>

                <script>

                window.dataLayer = window.dataLayer || [];

                function gtag(){dataLayer.push(arguments);}

                gtag('js', new Date());

 

                gtag('config', 'UA-39282487-5');

                </script>

      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <style>
              .alert{
                margin:0;
            }
            .thankyoumodal{
                display:none;
                justify-content:center;
                align-items:center;
                font-weight:bold;
                padding: 80px 50px;
                color:white;
                text-align:center;
            }
            .thankyoumodal2{
                display:none;
                justify-content:center;
                align-items:center;
                font-weight:bold;
                padding: 80px 20px;
                color:white;
                text-align:center;
            }
            
            .form {
              height:530px;
              width:100%;
              background: #f2f2f2;
              padding: 20px 30px;
              max-width: calc(100vw - 40px);
              box-sizing: border-box;
              font-family: "Montserrat", sans-serif;
              position: relative;
              
            }
            .form-h2 {
              margin: 10px 0;
              padding-bottom: 10px;
              width: 200px;
              color: #f83732;
              border-bottom: 3px solid #f83732;
            }
            .g-recaptcha {
                    transform:scale(0.68);
                    transform-origin:0 0;
                }
            @media (min-width:1000px) and (max-width: 1200px){
                .form-h2{
                      margin: 10px 0;
                      padding-bottom: 10px;
                      width: 180px;
                      color: #f83732;
                      border-bottom: 3px solid #f83732;
                }
                .g-recaptcha {
                    transform:scale(0.50);
                    transform-origin:0 0;
                }
            }
            .modal-h2 {
              margin: 10px 0;
              padding-bottom: 10px;
              width: 280px;
              color: #f83732;
              border-bottom: 3px solid #f83732;
            }
            .modal-h4 {
              margin: 10px 0;
              padding-bottom: 10px;
              width: 440px;
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
              opacity:.9;
            }
            .close:hover{
              transition: .2s .1s;  
              opacity:1;
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
            .btn-danger{
                background:#f83732;
                border-radius: 0;
            }
            .btn-danger:active {
                 background:#f83732;
                 background-color: #f83732;
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
.pulsingButton {
  width: 220px;
  text-align: center;
  white-space: nowrap;
  display: block;
  margin: 50px auto;
  padding: 10px;
  box-shadow: 0 0 0 0 rgba(232, 76, 61, 0.7);
  border-radius: 10px;
  background-color: #FF0000;
  -webkit-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  -moz-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  -ms-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  font-size: 22px;
  font-weight: normal;
  font-family: sans-serif;
  text-decoration: none !important;
  color: #ffffff;
  transition: all 300ms ease-in-out;
}


/* Comment-out to have the button continue to pulse on mouseover */

a.pulsingButton:hover {
  -webkit-animation: none;
  -moz-animation: none;
  -ms-animation: none;
  animation: none;
  color: #ffffff;
}


/* Animation */

@-webkit-keyframes pulsing {
  to {
    box-shadow: 0 0 0 30px rgba(232, 76, 61, 0);
  }
}

@-moz-keyframes pulsing {
  to {
    box-shadow: 0 0 0 30px rgba(232, 76, 61, 0);
  }
}

@-ms-keyframes pulsing {
  to {
    box-shadow: 0 0 0 30px rgba(232, 76, 61, 0);
  }
}

@keyframes pulsing {
  to {
    box-shadow: 0 0 0 30px rgba(232, 76, 61, 0);
  }
}

                </style>
   </head>
   <body>
      <?php include("header.php"); ?>
      <section id="news" class="border_b">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="page-header">
                     <h2>News</h2>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--<button type="button" class="pulsingButton" data-toggle="modal" data-target="#exampleModal" >-->
      <!--                                                  Contact Us-->
      <!--                                                  </button>-->
      <section id="solution" class="p-t-100 p-b-100">
         <div class="container">
         <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 ">
               <div class="solution_tabs">
                  <h3>Press Room</h3>
                  <ul>
                    <li role="presentation" class="active"><a href="#Blogs" id="Blogs-tab" role="tab" data-toggle="tab" aria-controls="Blogs" class="str"><i class="fa fa-file-text-o" aria-hidden="true"></i> Blogs</a></li>
                     <li role="presentation"><a href="#thenews" id="thenews-tab" role="tab" data-toggle="tab" aria-controls="thenews" aria-expanded="true" class="str"><i class="fa fa-bell-o" aria-hidden="true"></i> In the News</a></li>
                     <li role="presentation"><a href="#release" role="tab" id="release-tab" data-toggle="tab" aria-controls="release" class="str"><i class="fa fa-file" aria-hidden="true"></i> Press Releases</a></li>
                      <li role="presentation"><a href="#research" role="tab" id="release-tab" data-toggle="tab" aria-controls="release" class="str"><i class="fa fa-search" aria-hidden="true"></i> Research</a></li>
                  </ul>
               </div>
            <!--            <div class="alert alert-success invisible" role="alert" id="successmessage" >-->
            <!--             <p class="alert-heading">We Will Get Back To You Soon</p>-->
            <!--             </div>-->
            <!--            <form class="form" id="cform" name="contact-form">-->
            <!--               <h2 class="form-h2">CONTACT US</h2>-->
            <!--               <p>Name:<input placeholder="Write your name here" id="name" required="required" type="text"></input></p>-->
            <!--               <p>Company:<input placeholder="Write your company name here" id="company" required="required" type="text"></input></p>-->
            <!--              <p>Work Email:<input placeholder="For us to contact you" id="email" required="required" type="email"></input></p>-->
            <!--              <button>SUBMIT</button>-->
            <!--              <div class="form-overlay">-->
            <!--                &nbsp<span class="fa fa-phone"></span>&nbsp 1 844 55 (46399)-->
            <!--                <span class="fa fa-envelope-o"></span> info@indxx.com-->
            <!--              </div>      -->
               
                            
            <!--</form>-->
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
               <div class="row m-t-40 pleft">
                  <div class="agileits_about_grids w3ls_products_grid">
                     <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                           <div role="tabpanel" class="tab-pane fade in" id="thenews" aria-labelledby="thenews-tab">
                              <h3>In the News</h3>
                              <?php $cn=1; foreach($newsposts as $newsHeading => $news){ ?>
                              <h4 id="xx<?php echo $newsHeading; ?>"><?php echo $newsHeading; ?></h4>
                              <ul class="list2 <?php if($cn!=1) { echo 'hide'; }?>" id="data<?php echo $newsHeading; ?>">
                                 <?php foreach($news as $res){
                                    if($res['url']==''){ 
                                    
                                     	$link = base_url().'assets/media/news/'.$res['pdf'];
                                     }else{
                                     		$link =$res['url'];
                                     }
                                    
                                    
                                    ?>
                                 <li><a href="<?php echo $link ?>" target="_blank" rel="nofollow" ><?php echo $res['title']; ?></a><Span style="float:right;"><?php echo   date('M d, Y', strtotime($res['publishedDate'])); ?></Span></li>
                                 <?php } ?>
                              </ul>
                              <div class="clearfix"></div>
                              
                              
                              <script>
                                    $(document).ready(function(){
                                        $("#xx<?php echo $newsHeading; ?>").click(function(){
                                            $("#data<?php echo $newsHeading; ?>").toggleClass("hide");
                                        });
                                    });
                                    </script>
                              <?php $cn++; } ?>
                           </div>
                           <div role="tabpanel" class="tab-pane fade" id="release" aria-labelledby="release-tab">
                              <h3>Press Releases</h3>
                                <?php $cn=1; foreach ($press as $pressHeading => $press) {?>
                                
                                <h4 id="yy<?php echo $pressHeading; ?>"><?php echo $pressHeading; ?></h4>
                                <ul class="list2 <?php if($cn!=1) { echo 'hide'; }?>" id="dataw<?php echo $pressHeading; ?>">
                                 <?php foreach($press as $ress){
                                    /*if($ress['url']==''){ 
                                    
                                       $link = base_url().'assets/media/press/'.$ress['pdf'];
                                     }else{
                                          $link =$ress['url'];
                                     }
                                    */
                                    $link = "assets/media/press/".$ress['pdf'];
                                    ?>
                                 <li><a href="<?php echo $link ?>" target="_blank" rel="nofollow" ><?php echo $ress['title']; ?></a><Span style="float:right;"><?php echo   date('M d, Y', strtotime($ress['publishedDate'])); ?></Span></li>
                                 <?php } ?>
                              </ul>
                                  <script>
                                    $(document).ready(function(){
                                        $("#yy<?php echo $pressHeading; ?>").click(function(){
                                            $("#dataw<?php echo $pressHeading; ?>").toggleClass("hide");
                                        });
                                    });
                                    </script>
                                <?php  $cn++; } ?>
                           </div>
                            <div role="tabpanel" class="tab-pane fade" id="research" aria-labelledby="release-tab">
                              <h3>Research</h3>
                                <?php $cn=1; foreach ($research as $researchHeading => $research) {?>
                                
                                <h4 id="yy<?php echo $researchHeading; ?>"><?php echo $researchHeading; ?></h4>
                                <ul class="list2 <?php if($cn!=1) { echo 'hide'; }?>" id="dataw<?php echo $pressHeading; ?>">
                                 <?php foreach($research as $research){

                                       $link = base_url().$research['slug'];
                                   
                                    
                                    
                                    ?>
                                 <li><a href="<?php echo $link ?>" target="_blank" rel="nofollow" ><?php echo $research['title']; ?></a></li>
                                 <?php } ?>
                              </ul>
                                  <script>
                                    $(document).ready(function(){
                                        $("#yy<?php echo $pressHeading; ?>").click(function(){
                                            $("#dataw<?php echo $pressHeading; ?>").toggleClass("hide");
                                        });
                                    });
                                    </script>
                                <?php  $cn++; } ?>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in active" id="Blogs" aria-labelledby="Blogs-tab">
                              <h3>Blogs</h3>
                                
                                
                                <h4 id="">2022</h4>
                                    <ul>
                              
                                 
                                 <li><a href="https://www.indxx.com/metaverse_the_rise_of_a_new_digital_era" rel="_blank" >Metaverse: The Rise Of A New Digital Era</a><Span style="float:right;"> July 4, 2022</Span></li>
                                 
                              </ul>
                                                            <script>
                                    $(document).ready(function(){
                                        $("#xx<?php echo $BlogsHeading; ?>").click(function(){
                                            $("#data<?php echo $BlogssHeading; ?>").toggleClass("hide");
                                        });
                                    });
                                    </script>
                            
                              
                              
                              

                            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
                                    <!--Modal from button-->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                    <div class="close" title="close" id="closemform"></div>
                                                  <h1 class="thankyoumodal"> Thank You<br> We will get back to you soon</h1>
                                                  
                                                   
                                                  <form class="form" id="mform" name="contact-modal-form">
                                                      
                                                      
                                                          <h2 class="modal-h2">GET IN TOUCH</h2>
                                                          <p>Name:<input placeholder="Write your name here.." id="m-name" required="required" type="text"></input></p>
                                                          <p>Company:<input placeholder="Write your company name here" id="m-company" required="required" type="text"></input></p>
                                                          <p>Work Email:<input placeholder="Let us know how to contact you back.." id="m-email" required="required" type="email"></input></p>
                    
                                                          <button name="submit" value="submit">SUBMIT</button>
                                                          <div class="form-overlay-modal">
                                                            &nbsp<span class="fa fa-phone"></span> 1 844 55 (46399)  &nbsp
                                                            <span class="fa fa-envelope-o"></span>  info@indxx.com
                                                          </div>
                                                  </form>
                                              </div>
                                            </div>
                                          </div>
                                          
       <!--Subscibe to newsletter Modal from button-->
                                        <div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content modal-content-mo">
                                                  <h1 class="thankyoumodal2"> Thank You<br> For Subscribing to our Newsletter</h1>
                                                  <form class="form" id="sform" name="contact-modal-form">
                                                      
                                                      
                                                          <h4 class="modal-h4">SUBSCRIBE TO OUR NEWSLETTER & STAY UPDATED</h4>
                                                          <p>Name:<input  id="m-name" required="required" type="text"></input></p>
                                                          <p>Company:<input  id="m-company" required="required" type="text"></input></p>
                                                          <p>Work Email:<input  id="m-email" required="required" type="email"></input></p>
                    
                                                          <button>SUBMIT</button>
                                                          <div class="form-overlay-modal">
                                                            &nbsp<span class="fa fa-phone"></span> 1 844 55 (46399)  &nbsp
                                                            <span class="fa fa-envelope-o"></span>  info@indxx.com
                                                          </div>
                                                  </form>
                                              </div>    
                                            </div>
                                          </div>
                                          
      <!--closing intent popup-->
                                        <div id="popup">
                                          <div class="alert alert-success d-none" id="closing-message" role="alert" style="display:none">
                                          Thank you for giving your feedback
                                          </div>

                                                
                                                  
                                                  <form class="form" id="closingform" name="contact-modal-form">
                                                     
                                                      
                                                          <h2 class="modal-h2">GET IN TOUCH</h2>
                                                          <p>Name:<input placeholder="Write your name here.." id="m-name" required="required" type="text"></input></p>
                                                          <p>Company:<input placeholder="Write your company name here" id="m-company" required="required" type="text"></input></p>
                                                          <p>Work Email:<input placeholder="Let us know how to contact you back.." id="m-email" required="required" type="email"></input></p>
                                
                                                          <button id="closing-popup">SUBMIT</button>
                                                          <div class="form-overlay-modal">
                                                            &nbsp<span class="fa fa-phone"></span> 1 844 55 (46399)  &nbsp
                                                            <span class="fa fa-envelope-o"></span>  info@indxx.com
                                                          </div>
                                                  </form>
                                                
                                      </div>
                            <!--Time delayed Pop-Up-->
                                        
                                         
                                             <div class="modal fade" id="timedelayedmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                
                                                   
                                                     <div class="alert alert-success d-none" id="closing-td-message" role="alert" style="display:none">
                                                      Thank you for giving your feedback
                                                      </div>
                                                  <form class="form" id="timedelayedform" name="contact-modal-form" >
                                                     
                                                      
                                                          <h2 class="modal-h2">GET IN TOUCH</h2>
                                                          <p>Name:<input placeholder="Write your name here.." id="m-name" required="required" type="text"></input></p>
                                                          <p>Company:<input placeholder="Write your company name here" id="m-company" required="required" type="text"></input></p>
                                                          <p>Work Email:<input placeholder="Let us know how to contact you back.." id="m-email" required="required" type="email"></input></p>
                                
                                                          <button id="closing-popup">SUBMIT</button>
                                                          <div class="form-overlay-modal">
                                                            &nbsp<span class="fa fa-phone"></span> 1 844 55 (46399)  &nbsp
                                                            <span class="fa fa-envelope-o"></span>  info@indxx.com
                                                          </div>
                                                  </form>
                                               </div>
                                               </div>
                                               </div>
                                               
      <?php include("footer.php"); ?>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <style type="text/css">
      h4{cursor: pointer;}
      
      
      </style>
      <script>
      
    const form =document.getElementById('cform');
    form.addEventListener('submit', function successform(event){
     event.preventDefault();
     var element = document.getElementById("successmessage");
     element.classList.remove("invisible");
     document.contact-form.reset();
     setTimeout(()=>{
     var element = document.getElementById("successmessage");
     element.classList.add("invisible");
     },5000)
    })
    
      const mform =document.getElementById('mform');
       mform.addEventListener('submit', function successform(event){
          event.preventDefault();
          mform.style.display="none";
          document.querySelector("#closemform").style.display="none";
          document.querySelector(".thankyoumodal").style.display="flex";
          document.querySelector(".modal-content").style.backgroundColor="#5cb85c";
              setTimeout(function(){
                 $('#exampleModal').modal('hide');
              }, 15000);
      })
      
      const closemform = document.getElementById('closemform');
      closemform.addEventListener("click", function closeform() {
          $('#exampleModal').modal('hide');
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
             },1500)
      })
      
       const sform =document.getElementById('sform');
       sform.addEventListener('submit', function successform(event){
          event.preventDefault();
          sform.style.display="none";
          document.querySelector(".thankyoumodal2").style.display="flex";
          document.querySelector(".modal-content-mo").style.backgroundColor="#5cb85c";
              setTimeout(function(){
                 $('#subscribeModal').modal('hide');
              }, 1500);
      })
      
       const tdform = document.getElementById('timedelayedform');
       function displayform() {
            
            setTimeout(()=>{
             $("#timedelayedmodal").modal('show');
             },130000) 
        }
         if(sessionStorage.getItem('tdform')===null){
             window.onload = displayform;
         }
        
          tdform.addEventListener('submit', function sample(event){
        
          event.preventDefault();
          sessionStorage.setItem('tdform', true);
          tdform.style.display="none";
          var message= document.getElementById("closing-td-message");
          message.style.display="flex";
             setTimeout(()=>{
            $("#timedelayedmodal").modal('hide');
             },1500)
      })
    
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
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
<title>All Indices | Indxx</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Indxx | Indices | Benchmark | ESG </title>
<link rel="canonical" href="<?php echo site_url().'indices'; ?>" />
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
								<li role="presentation" class="active"><a href="#benchmark" id="benchmark-tab" role="tab" data-toggle="tab" aria-controls="benchmark" aria-expanded="true" class="str"><i class="fa fa-line-chart" aria-hidden="true"></i> Benchmark Indices</a></li>
							    <li role="presentation"><a href="#esg" role="tab" id="esg-tab" data-toggle="tab" aria-controls="esg" class="str"><i class="fa fa-envira" aria-hidden="true"></i> ESG Indices</a></li>
								<li role="presentation"><a href="#income" role="tab" id="income-tab" data-toggle="tab" aria-controls="income" class="str"><i class="fa fa-money" aria-hidden="true"></i> Income Indices</a></li>
								<li role="presentation"><a href="#strategy" role="tab" id="strategy-tab" data-toggle="tab" aria-controls="strategy" class="str"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Strategy Indices</a></li>
								<li role="presentation"><a href="#thematic" role="tab" id="thematic-tab" data-toggle="tab" aria-controls="thematic" class="str"><i class="fa fa-sitemap" aria-hidden="true"></i>Thematic Indices</a></li>
                                <li role="presentation"><a href="#digital" role="tab" id="digital-tab" data-toggle="tab" aria-controls="digital" class="str"><i class="fa fa-sitemap" aria-hidden="true"></i> Digital Asset Indices</a></li>
								<li role="presentation"><a href="#other" role="tab" id="other-tab" data-toggle="tab" aria-controls="other" class="str"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Other Indices</a></li>
							</ul>
                        
                    </div>
                        <div class="alert alert-heading invisible" role="alert" id="successmessage" >
                         <p class="alert-heading-p">We Will Get Back To You Soon</p>
                         </div>
                        <form class="form" id="cform" method="post" name="contact-form">
                           <h2 class="form-h2">CONTACT US</h2>
                           <p>Name:<input id="name" required="required" type="text"></input></p>
                           <p>Company:<input id="company" required="required" type="text"></input></p>
                          <p>Work Email:<input id="email" required="required" type="email"></input></p>
                          <input type="hidden" id="form_type" value="ListIndices-Inbuilt-Form">
                          <button type="submit" onclick="save_in_touch()">SUBMIT</button>
                          <div class="form-overlay">
                            &nbsp<span class="fa fa-phone"></span>&nbsp 1 844 55 (46399)
                            <span class="fa fa-envelope-o"></span> info@indxx.com
                          </div>       
                        </form>

                </div>
                 
               
                                          
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="row m-t-40 pleft">
					<div class="agileits_about_grids w3ls_products_grid">
							
							
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">							
							<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="benchmark" aria-labelledby="benchmark-tab">
                                    <h3>Benchmark Indices</h3>
                                    <p> Indxx Benchmark Indices are designed to represent the performance of broader global markets & sectors that can be utilized to manage passive investments or act as benchmarks for portfolios and investment strategies.</p>   
                                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="knowMoreModal" style="margin-bottom:20px">
                                        Learn More
                                        </button>
                                    <!--<h4 style="border-bottom: 3px solid #cec8c8; padding-bottom: 9px; padding-top: 24px;">Index Name</h4>-->
                                    <div class="agileits_technical_research"> 
										<div class="panel-group" id="accordion111" role="tablist" aria-multiselectable="true">
										<?php
										// $count =1;foreach($regionCountry as $data1)
										// { 
                                        ?>
                                        <div class="panel panel-default">

										<div class="panel-heading w3_panel_heading" role="tab" id="testheadingOne1">
								  		

										<a class="pa_italic pa_italic1" role="button" data-toggle="collapse" data-parent="#accordion111" href="#RCcollapseOne1" aria-expanded="true" aria-controls="collapseOne">
										    <h4 class="panel-title asd w3_panel_title">
									  		<span class="glyphicon glyphicon-menu-down w3_collapsed" aria-hidden="true"></span><i id="dssdstest" class="glyphicon glyphicon-menu-down" aria-hidden="true"></i>Region/Country
										    </h4>
										</a>
								  		
										</div>
										<div id="RCcollapseOne1" class="panel-collapse collapse " role="tabpanel" aria-labelledby="testheadingOne1">

								  		<div class="panel-body panel_text">
								  		    <h4>Index Name</h4>
										<ul class="list3">

                                        <?php  
                                        $get_indices = $this->indice->RCGetResultByOrdInd2('regionCountry','Benchmark'); 
                                        foreach($get_indices as $indexes)
                                        {
                                        ?>
                                        <li><a href="<?php echo site_url($indexes->slug) ?>" rel="nofollow"><?php echo $indexes->indxx_name;?> </a></li>
                                         <?php 
                                     	} ?>

                                      
                                    	</ul>
								  		</div>

										</div>

							  			</div>
                                        <?php 
                                        //$count++; } ?>
                                        <!--start Sector -->
                                        
	                                        <div class="panel panel-default">

											<div class="panel-heading w3_panel_heading" role="tab" id="testheadingOne2">

											<a class="pa_italic pa_italic1" role="button" data-toggle="collapse" data-parent="#accordion111" href="#RCcollapseOne2" aria-expanded="true" aria-controls="collapseOne">
											    <h4 class="panel-title asd w3_panel_title">
										  		<span class="glyphicon glyphicon-menu-down w3_collapsed" aria-hidden="true"></span><i id="dssdstest2" class="glyphicon glyphicon-menu-down" aria-hidden="true"></i>Sector
										  		</h4>
											</a>
									  		
											</div>
											<div id="RCcollapseOne2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="testheadingOne2">

									  		<div class="panel-body panel_text">
									  		    <h4>Index Name</h4>
											<ul class="list3">

	                                        <?php  
	                                        $get_indices = $this->indice->SectorGetResultByOrdInd2('sector','Benchmark'); 
	                                        foreach($get_indices as $indexes)
	                                        {
	                                        ?>
	                                        <li><a href="<?php echo site_url($indexes->slug) ?>" rel="nofollow"><?php echo $indexes->indxx_name;?> </a></li>
	                                         <?php 
	                                     	} ?>

	                                      
	                                    	</ul>
									  		</div>

											</div>

								  			</div>
								  			<!-- end Sector -->
										</div>
									</div>
								
								</div>
								
								
							
								
								
								<div role="tabpanel" class="tab-pane fade" id="income" aria-labelledby="income-tab">
										<h3>Income Indices</h3>
										<p>Indxx Income Indices seek exposure to asset classes that provide yield to investors.</p>
										 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="knowMoreModal">
                                            Learn More
                                            </button>
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
								
								<div role="tabpanel" class="tab-pane fade" id="strategy" aria-labelledby="strategy-tab">
										<h3>Strategy</h3>
										<p>Indxx Strategy Indices are designed to effectively target specific asset allocations and capitalize on market opportunities, tactical and trading strategies</p>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="knowMoreModal" style="margin-bottom:20px">
                                            Learn More
                                            </button>
                                            <br>
										<h4>Index Name</h4>
										<ul class="list3">
                                         <?php 

											foreach($get_strategy as $strategy){
											?>  
										<li><a href="<?php echo site_url($strategy->slug) ?>" rel="nofollow"><?php echo $strategy->indxx_name;?></a></li>
										

										<?php
										}
										?>	
											
										</ul>
								</div>
								
								<div role="tabpanel" class="tab-pane fade" id="thematic" aria-labelledby="thematic-tab">
										<h3>Thematic Indices</h3>
										<p>Indxx Thematic Indices capture the performance of broad investment themes ranging from demographic trends to emerging technologies and social themes.</p>
										 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="knowMoreModal">
                                            Learn More
                                            </button>
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
										<h3>Digital Asset Indices</h3>
										<p>Indxx Digital Asset Indices are designed to effectively target and represent the performance of the rapidly growing global cryptocurrency markets.</p>
										 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="knowMoreModal">
                                            Learn More
                                            </button>
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
								<div role="tabpanel" class="tab-pane fade" id="esg" aria-labelledby="esg-tab">
										<h3>ESG Indices</h3>
										<p>Indxx ESG Indices utilize proprietary Environment, Social and Governance (‘ESG’) ratings provided by Institutional Shareholder Services (‘ISS ESG’), and offer a range of ESG indices to help investors meet their sustainable investing goals.</p>
										  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="knowMoreModal">
                                            Learn More
                                            </button>
										<h4>Index Name</h4>
										<ul class="list3">

											<?php 
											foreach($get_esg as $esg){
											?>  
										<li><a href="<?php echo site_url($esg->slug) ?>" rel="nofollow" ><?php echo $esg->indxx_name;?></a></li>
										

										<?php
										}
										?>	
												
										</ul>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="other" aria-labelledby="other-tab">
										<h3>Other Indices</h3>
										<p>Indices independently calculated End of Day or Real-Time by Indxx.</p>
										 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" id="knowMoreModal" style="margin-bottom:20px">
                                            Learn More
                                            </button>
                                            <br>
									
									
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
					 <!--Modal from button-->
                                         
                                                      
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content modal-content-modal">
                                                  <div class="close" title="close" id="closemform"></div>
                                                  <p class="thankyoumodal"> Thanks for providing your contact details, we will reach out to you shortly!</p>
                                                  <style type="text/css">
    .form-demo{
    margin-left: 53px !important;
    border-radius: 20px !important;
    background-color: #fff !important;
    width: 403px !important;
    height: 50px !important;
    }
.text-demo{
    border-bottom: 0px !important;
    margin-left: 53px !important;
    border-radius: 20px !important;
    background-color: #fff !important;
    width: 403px !important;
}
.btnff{
    margin-right: 250px !important;

}
.form-demo-text{
    border-bottom: 0px !important;
    margin-left: 53px !important;
    border-radius: 20px !important;
    background-color: #fff !important;
    height: 100px !important;
    width: 403px !important;

}
.modal-h2{
 width: 180px !important;
 margin-left: 160px !important;
}
</style>
<form class="form" id="mform" name="contact-modal-form" style="height:600px !important;">
    <h2 class="modal-h2">GET IN TOUCH</h2>
  <div class="form-group">
    <input name="m-name" class="form-control form-demo" id="m-name" required="required" type="text" placeholder="Full Name"></input>
    </div>
  <div class="form-group">
    <input name="m-email" id="m-email" class="form-control form-demo" required="required" type="email"
    placeholder="Email"></input>
  </div>
  <div class="form-group">
    <input name="m-company" id="m-company" class="form-control form-demo" required="required" type="text" placeholder="Company"></input>
  </div>
  <div class="form-group">
    <input type="text" class="form-control form-demo" id="exampleInputPassword1" placeholder="Phone">
  </div>
  <div class="form-group">
    <input type="text" class="form-control form-demo-text" id="exampleInputPassword1" placeholder="Message">
  </div>
  <input type="hidden" id="form_type" value="AboutUs-LearnMore-Form">
  <button type="submit" onclick="save_in_touch()" style="margin-left:250px !important; font-size: 20px !important;" class="btn btn-primary btnff">Send</button>
</form>
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
                                                          <input type="hidden" id="form_type" value="ListIndices-ClosingIntent-Form">
                                                          <button id="closing-popup">SUBMIT</button>
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
                                            <!--              <input type="hidden" id="form_type" value="ListIndices-TimeDelayed-Form">-->
                                            <!--              <button id="closing-popup">SUBMIT</button>-->
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
     element.classList.add("invisible");
     },3500)
    })
    
     const mform =document.getElementById('mform');
       mform.addEventListener('submit', function successform(event){
          event.preventDefault();
          mform.style.display="none";
          document.querySelector("#closemform").style.display="none";
          document.querySelector(".thankyoumodal").style.display="flex";
              setTimeout(function(){
                 $('#exampleModal').modal('hide');
              }, 2500)
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
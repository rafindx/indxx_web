<!DOCTYPE html>
<?php 

$curr_url=uri_string();
$urr = explode('/',$curr_url);
if(!$urr[1]){
    $cat = $indxx_info->tabname;
    $curr_url=$indxx_details[0]->slug;
    if($cat=='Benchmark' || $cat=='ESG' || $cat=='Income' || $cat=='Strategy' || $cat=='Thematic'){
       $redi_url = base_url()."indices/".strtolower($cat)."/".$curr_url;
        header("Location: $redi_url");
    }
    else if($cat=='Other Indices'){
        $redi_url = base_url()."indices/other/".$curr_url;
        header("Location: $redi_url");
    }
    else if($cat=='Digital Asset'){
        $redi_url = base_url()."indices/digital_asset/".$curr_url;
        header("Location: $redi_url");
    }
}

?>
<html lang="en">
    <head>
        <?php 
        if(!empty($indxx_meta))
        { ?>
            <title><?php echo $indxx_meta->meta_title; ?></title>
            <meta name="keywords" content="<?php echo $indxx_meta->meta_keywords; ?>">
            <meta name="description" content="<?php echo $indxx_meta->meta_description; ?>">
       <?php  }
        else
        { ?>
            <title><?php echo $indxx_details[0]->indxx_name; ?></title>
            <meta name="description" content="<?php echo $indxx_details[0]->index_description; ?>">
       <?php } ?>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="canonical" href="<?php echo site_url().$indxx_details[0]->slug; ?>" />
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
<!--     <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/amstock.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/patterns.js"></script>-->
        
        
        
        
        
        
        <script src="<?php echo base_url(); ?>assets/js/rgbcolor.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/canvg.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/filesaver.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/chart.css" />-->
        <!--<link rel="stylesheet" href="../scripts/style.css" type="text/css">-->
        <script src="<?php echo base_url(); ?>assets/js/responsive.min.js" type="text/javascript"></script>     
        <!--- End of Scripts for Charting -->       
        <style> 
            .amChartsPeriodSelector input[type=button]:nth-child(5) {
                background: red;
                border: 1px solid red;
                padding: 2px 4px;
                color: #fff;
            }</style>
        <style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
div#example_length {width: 50% !important;float: left !important;}
      div#example_filter { width: 50% !important;float: left !important;}
</style>
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
                            <h3>Indices </h3>
                            <ul>
                                <li role="presentation" class="active"><a href="#access" id="access-tab" role="tab" data-toggle="tab" aria-controls="access" aria-expanded="true" class="str"><i class="fa fa-download" aria-hidden="true"></i> Downloads</a></li>
                                <?php
                                //echo $type->weighttype;
                                //echo $sheet->fact_sheet;
                                if ($type->weighttype == '0') {
                                  if($sheet->fact_sheet){
                                    $filePath = base_url() . $sheet->fact_sheet;
                                     ?>
                                    <li role="presentation">
                                        <a  download href="<?php echo $filePath; ?>" class="  str"><i class="fa fa-file" aria-hidden="true"></i> Fact Sheet</a></li> <?php 
                                  }
                                  else
                                  {
                                    ?>  <li role="presentation">
                                        <a  href="javascript:void(0)" onclick="myFunction()" class="str"><i class="fa fa-file" aria-hidden="true"></i> Fact Sheet</a></li> <?php
                                      
                                  }
                                  ?>
                                   
                                    <?php } else { ?>                               
                                    <li role="presentation">
                                        <a id="factid"  href="<?php echo site_url() . 'Welcome/generate_factSheet/' . $indxxID; ?>" class=" disabled str"> <i class="fa fa-file" aria-hidden="true"></i> Fact Sheet</a></li>
                                        <style type="text/css">
                                            a.disabled {
   pointer-events: none;
   cursor: default;
}
                                        </style>
                                 <?php } ?> 
                                
                                <?php if($indxx_info->is_methodology==1){ ?>
                                <li role="presentation"><a href="<?php echo base_url() . 'assets/media/' . $indxx_details[0]->methodology; ?>" target="_blank" class="str">  <i class="fa fa-sitemap" aria-hidden="true"></i> Methodology</a></li>
                               
                                <?php } ?>
                                <li role="presentation"><a href="<?php echo site_url() . '/Welcome/downloadValue/' . $indxxID; ?>" class="str"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Index Values</a></li>
                            </ul>

                        </div>

                    </div>

               



                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="row m-t-40 pleft">
                            <div class="agileits_about_grids w3ls_products_grid">
                                <h3><?php echo $indxx_details[0]->indxx_name; ?></h3>  
                                <p><?php echo $indxx_details[0]->index_description; ?></p>
                                <div class="code"><?php echo $code; ?></div>
                                <div class="date_value"><?php echo $date_value; ?></div>
                          <?php
                            
                          $showhide= $this->indice->GetOtherindxxShowHideOption($indxxID,'show_chart'); 
                  
                          if($showhide=='show') {
                          ?>
                             
                                <div class="tabs">
                                    <div class="linkbut">
<?php $cId = $indxx_details[0]->indxx_id; ?>
<?php $urlTE = $indxx_details[0]->indxx_id;

$classtr='';
$classpr='';
      
                                     

                                       /*
                                        if ( $trPr->return_type=='TR') {  
                                            
                                            $classpr='active';
                                            $trIndexId=  $trPr->indxx_id ;
                                            $PrIndexId=  $indxx_details[0]->indxx_id;
                                        }
                                        else 
                                        */
                                       
                                        if ($trPr->return_type=='PR')
                                        {
                                              
                                            $classtr='active';
                                            $PrIndexId=  $trPr->indxx_id ;
                                           //$trIndexId=   $indxx_details[0]->indxx_id;
                                        }
                                        else if($indxx_details[0]->return_type=='PR')
                                        {
                                         $classpr='active';
                                         $PrIndexId=  $indxx_details[0]->indxx_id;
                                        }
                                        else if($indxx_details[0]->return_type=='TR')
                                        {
                                         $classtr='active';
                                         $trIndexId=  $indxx_details[0]->indxx_id;
                                        }
                                      
                                        if(isset($indxxNTR))
                                         { 
                                           if( $indxxNTR->indxx_id ==$indxx_details[0]->indxx_id)  { 
                                            $classntr='active';   $classtr='';    $classpr='';
                                               
                                           } 
                                            $NTRIndexId =  $indxxNTR->indxx_id ;
                                           if(isset($indxxPR)) { $PrIndexId=  $indxxPR->indxx_id ; }
                                           if(isset($indxxTR)) { $trIndexId=  $indxxTR->indxx_id ; }
                                         }

                                        if(isset($indxxCADGTR)) 
                                        { 
                                            if( $indxxCADGTR->indxx_id ==$indxx_details[0]->indxx_id)  { 
                                                $classgtr='active'; $classntr='';   $classtr=''; $classpr='';
                                                
                                            } 
                                            $cadgtrIndexId=  $indxxCADGTR->indxx_id ;
                                            $PrIndexId=0;
                                         }  
                                            
                                        
                                        if(isset($indxxCADNTR)) 
                                        { 
                                            if( $indxxCADNTR->indxx_id ==$indxx_details[0]->indxx_id)  { $classcntr='active';   $classntr=''; $classtr='';} 
                                            $cadntrIndexId=  $indxxCADNTR->indxx_id ;
                                            $PrIndexId=0;
                                        }
                                     
                                         
                                         if($trIndexId>0) { ?>   <a class="<?php echo $classtr ; ?>" href="<?php echo site_url($this->indice->getSlugByIndxxId($trIndexId)) ?>" id="type_diff">TR</a> <?php } 
                                        
                                         ?>

                                       <?php /*if($PrIndexId>0) { ?>   <a class="<?php echo $classpr ; ?>" href="<?php echo site_url($this->indice->getSlugByIndxxId($PrIndexId)) ?>" id="type_diff">PR</a> <?php }*/ ?>

                                       <?php if($NTRIndexId>0) { ?> <a class="<?php echo $classntr ; ?>" href="<?php echo site_url($this->indice->getSlugByIndxxId($NTRIndexId)) ?>" id="type_diff">NTR</a> <?php } ?>
                                     
                                       <?php if($cadgtrIndexId>0) { ?> <a class="<?php echo $classgtr ; ?>"  href="<?php echo site_url($this->indice->getSlugByIndxxId($cadgtrIndexId)) ?>" id="type_diff">CAD GTR</a> <?php } ?>
                                       <?php if($cadntrIndexId>0) { ?> <a class="<?php echo $classcntr ; ?>"  href="<?php echo site_url($this->indice->getSlugByIndxxId($cadntrIndexId)) ?>" id="type_diff">CAD NTR</a> <?php }?>
                                      
                                    </div>

   <div class="charting">
                                          <div>
                                          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                        </div>
   </div>
       
                                    <div class="charting">

                                        <div>
                                            <!--<div id="chartdiv" style="width:100%; height:500px;"></div>-->
                                        </div>
                                        <div>
                                            <span style="color:Black;font-family:Helvetica;font-size:10px;margin-top:12px;" class="lblLabel" id="Label1">Powered By </span>
                                            <img src="<?php echo base_url(); ?>assets/images/logo-colored_small.jpg" alt="" /><br><br>
                                        <span style="font-size:10px;margin-bottom:2px; margin-top:75px;"><sup style="font-size:9px;text-align:left;">Back-tested performance is hypothetical and has certain inherent limitations.  Back-tested performance differs from live performance and is included for informational purposes only.</span>
                                        </div>

                                    </div>
                                </div>
                          <?php } ?>
                                <!--<div class="clearfix"></div>-->
                                        
                                <div class="clearfix"></div>
                                  <?php $showhide= $this->indice->GetOtherindxxShowHideOption($indxxID,'show_characteristics');
                                  if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR')
                                    $showhide=='hide';
                          
                                elseif($showhide=='show') {
                                ?>
                                <hr style="margin-top:20px;">
                                <h3 align="left"><p>Index Characteristics </p></h3>
                                <div style="line-height:15px" class="table-responsive">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:15px!important">
                                        <tbody>
                                            <tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #ccc;text-align:center">
                                                <td width="67%" style="padding-left:5px;text-align:left!important">Base Date</td>
                                                <td width="33%" align="right" style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['inceptionDate']; ?></td>
                                            </tr>
                                            <tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #eee;text-align:center">
                                                <td width="67%" style="padding-left:5px;text-align:left!important">No. of Constituents
                                                <?php  if($indxxID==427 || $indxxID==429 || $indxxID==430 || $indxxID==433 || $indxxID==435 || $indxxID==436 || $indxxID==437 ||$indxxID==438 || $indxxID==439 || $indxxID==440 || $indxxID==441 || $indxxID==442 || $indxxID==443 || $indxxID==444 || $indxxID==445 || $indxxID==446 || $indxxID==447 || $indxxID==448 || $indxxID==449 || $indxxID==450 || $indxxID==451 || $indxxID==452 || $indxxID==453 || $indxxID==455){ ?>
                                                <div style="display:inline-block !important;"><sup style="font-size:10px !important;">***</sup></div>
                                                 <?php } ?>
                                                </td>
                                                
                                                <td width="33%" align="right"  style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['noofconstituents']?$IndexCharacteristicsArray['noofconstituents']:'0'; ?></td>
                                            </tr>
                                            <tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #ccc;text-align:center">
                                                <td width="67%" style="padding-left:5px;text-align:left!important">Dividend Yield<div style="display:inline-block !important;"><sup style="font-size:10px !important;">*</sup></div></td>
                                                <td width="33%" align="right" style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['dividend_yield']; ?>%</td>
                                            </tr>
                                            <tr style="font-size: 13px;height:30px;background:none repeat scroll 0 0 #eee;text-align:center">
                                                <td width="67%" style="padding-left:5px;text-align:left!important">52 Week High/Low<div style="display:inline-block !important;"><sup style="font-size:10px !important;">**</sup></div></td>
                                                <td width="33%" align="right" style="padding-right: 5px;" class="border-left"><?php echo $IndexCharacteristicsArray['52weeks']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-size:10px;margin-bottom:2px; margin-top:15px;"><sup style="font-size:9px;text-align:left;">*</sup> Trailing 12 months data for current year portfolio</div>
                                    <div style="font-size:10px"><sup style="font-size:9px;text-align:left;">**</sup> Trailing 12 months</div>
                                    <?php  if($indxxID==427 || $indxxID==429 || $indxxID==430 || $indxxID==433 || $indxxID==435 || $indxxID==436 || $indxxID==437 ||$indxxID==438 || $indxxID==439 || $indxxID==440 || $indxxID==441 || $indxxID==442 || $indxxID==443 || $indxxID==444 || $indxxID==445 || $indxxID==446 || $indxxID==447 || $indxxID==448 || $indxxID==449 || $indxxID==450 || $indxxID==451 || $indxxID==452 || $indxxID==453 || $indxxID==455){ ?>
                                        <div style="font-size:10px"><sup style="font-size:9px;text-align:left;">***</sup> As of 31st Oct 2019</div>
                                    <?php } ?>
                                </div>
                          <?php } ?>
                                <?php $showhide= $this->indice->GetOtherindxxShowHideOption($indxxID,'show_top_constituents'); 
                                 if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxxID==236 || $indxxID==237 || $indxxID==305 || $indxxID==376 || $indxxID==427 
                                    || $indxxID==429 || $indxxID==430 || $indxxID==433 || $indxxID==435 || $indxxID==436 || $indxxID==437 || $indxxID==438 || $indxxID==439 || $indxxID==440 || $indxxID==441 
                                    || $indxxID==442 || $indxxID==443 || $indxxID==444 || $indxxID==445 || $indxxID==446 || $indxxID==450 || $indxxID==451 || $indxxID==452 || $indxxID==453 || $indxxID==455 
                                    || $indxxID==7   || $indxxID==8   || $indxxID==482 || $indxxID==483 || $indxxID==485 || $indxxID==488 || $indxxID==489 || $indxxID==510 || $indxxID==514 || $indxxID==518 
                                    || $indxxID==519 || $indxxID==520 || $indxxID==521 || $indxxID==524 || $indxxID==526 || $indxxID==527 || $indxxID==528 || $indxxID==529 || $indxxID==530 || $indxxID==531 
                                    || $indxxID==532 || $indxxID==533 || $indxxID==565 || $indxxID==566 || $indxxID==591 || $indxxID==590 || $indxxID==580 || $indxxID==577 || $indxxID==579 || $indxxID==578 
                                    || $indxxID==584 || $indxxID==585 || $indxxID==586 || $indxxID==574 || $indxxID==575 || $indxxID==576 || $indxxID==581 || $indxxID==582 || $indxxID==583 || $indxxID==537 
                                    || $indxxID==540 || $indxxID==535 || $indxxID==569 || $indxxID==586 || $indxxID==556 || $indxxID==557 || $indxxID==558 || $indxxID==542 || $indxxID==560 || $indxxID==567 
                                    || $indxxID==572 || $indxxID==573 || $indxxID==570 || $indxxID==587 || $indxxID==588 || $indxxID==589 || $indxxID==522 || $indxxID==523 || $indxxID==525 || $indxxID==606 
                                    || $indxxID==607 || $indxxID==608 || $indxxID==635 || $indxxID==636 || $indxxID==637 || $indxxID==653 || $indxxID==654 || $indxxID==655 || $indxxID==614 || $indxxID==616 
                                    || $indxxID==617 || $indxxID==618 || $indxxID==620 || $indxxID==621 || $indxxID==674 || $indxxID==675 || $indxxID==676 || $indxxID==677 || $indxxID==678 || $indxxID==679 
                                    || $indxxID==683 || $indxxID==684 || $indxxID==686 || $indxxID==687 || $indxxID==688 || $indxxID==689 || $indxxID==656 || $indxxID==657 || $indxxID==658 || $indxxID==605 
                                    || $indxxID==609 || $indxxID==610 || $indxxID==611 || $indxxID==612 || $indxxID==613 || $indxxID==615 || $indxxID==619 || $indxxID==622 || $indxxID==638 || $indxxID==651 
                                    || $indxxID==652 || $indxxID==659 || $indxxID==660 || $indxxID==661 || $indxxID==623 || $indxxID==624 || $indxxID==625 || $indxxID==626 || $indxxID==627 || $indxxID==628 
                                    || $indxxID==632 || $indxxID==633 || $indxxID==634 || $indxxID==602 || $indxxID==603 || $indxxID==650 || $indxxID==645 || $indxxID==646 || $indxxID==647 || $indxxID==663 
                                    || $indxxID==664 || $indxxID==665 || $indxxID==670 || $indxxID==671 || $indxxID==673 || $indxxID==680 || $indxxID==681 || $indxxID==682 || $indxxID==459 || $indxxID==460 
                                    || $indxxID==461 || $indxxID==462 || $indxxID==1   || $indxxID==2   || $indxxID==9   || $indxxID==10  || $indxxID==186 || $indxxID==222 || $indxxID==223 || $indxxID==243 
                                    || $indxxID==245 || $indxxID==729 || $indxxID==730 || $indxxID==731 || $indxxID==732 || $indxxID==733 || $indxxID==734 || $indxxID==735 || $indxxID==736 || $indxxID==737 
                                    || $indxxID==738 || $indxxID==739 || $indxxID==740 || $indxxID==741 || $indxxID==742 || $indxxID==743 || $indxxID==747 || $indxxID==748 || $indxxID==749 || $indxxID==750 
                                    || $indxxID==751 || $indxxID==763 || $indxxID==764 || $indxxID==765)
                                    $showhide=='hide';
                          
                                elseif($showhide=='show') {
                          ?>
                              
                                <hr style="margin-top:24px;">
                                <?php if($indxx_info->is_all==1) { ?>
                                    <h2 class="ttle" style="">Index Constituents</h2>
                                <?php } else { ?>
                                <h2 class="ttle" style="">Top 5 Index Constituents</h2>
                               
                                 <?php }  ?>
                                <div id="no-more-tables " style="">
                                    <?php if($indxxID==323 || $indxxID==324 || $indxxID==325 || $indxxID==362 || $indxxID==252 || $indxxID==692 || $indxxID==691 || $indxxID==693 
                                    || $indxxID==694 || $indxxID==695 || $indxxID==696 || $indxxID==697 || $indxxID==698 || $indxxID==699 || $indxxID==700 
                                    || $indxxID==701 || $indxxID==702 || $indxxID==703 || $indxxID==704 || $indxxID==707 || $indxxID==708 || $indxxID==709 
                                    || $indxxID==710 || $indxxID==711 || $indxxID==712 || $indxxID==713 || $indxxID==714 || $indxxID==715 || $indxxID==721 
                                    || $indxxID==720 || $indxxID==718 || $indxxID==722 || $indxxID==241){?>
                                    <table id="example2" class="col-md-12 table-bordered table-striped table-condensed cf" style="margin-top:24px; margin-bottom:15px; width:100%;">
                                     <?php }
                                     else { ?>   
                                    <table id="example" class="col-md-12 table-bordered table-striped table-condensed cf" style="margin-top:24px; width:100%;">
                                        <?php } ?>
                                        <thead class="cf">
                                            <tr> 
                                                <!--<th style="width:33%;" <?php if($indxx_info->is_isin==0){  ?> style="display: none;"  <?php } ?> >ISIN</th>-->
                                                <th style="width:50%;" <?php if($indxx_info->is_company_name==0){ ?> style="display: none;" <?php } ?> >Company Name</th>
                                                <?php if($indxx_info->is_all==1) { ?>
                                                <th style="display: none;">Country</th>
                                               <?php } ?>
                                                <th style="width:50%;" class="numeric" <?php if($indxx_info->is_weight==0){ ?> style="display: none;" <?php } ?>  ><span style="float:right;">Weight(%)</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           //print_r($IndexTopFiveConstituentsArray);
                                           
                                            if($indxx_info->is_all==0)	
                                            {	
                                              $IndexTopFiveConstituentsArray = array_slice($IndexTopFiveConstituentsArray, 0, 5, true);	
                                            
                                            foreach ($IndexTopFiveConstituentsArray as $topCond) { ?>
                                                <tr>
                                                    <!--<td style="width:33%;" data-title="Ticker"<?php if($indxx_info->is_isin==0){ ?> style="display: none;" <?php } ?>> <?php echo $topCond["ISIN"]; ?></td>-->
                                                    <td style="width:33%;" data-title="Company Name" <?php if($indxx_info->is_company_name==0){ ?> style="display: none;" <?php } ?>> <?php echo ucwords(strtolower($topCond["constituent"])); ?></td>
                                                    <?php if($indxx_info->is_all==1) { ?>
                                                    <td style="display: none;" data-title="Country">United States</td>
                                                    <?php } ?>
                                                    <td style="width:33%;" data-title="Weight" class="numeric text-right" <?php if($indxx_info->is_weight==0){ ?> style="display: none;" <?php } ?>> <?php echo number_format((float)$topCond["weight"]*100,2, '.', '');?>%</td>
                                                    
                                                </tr>
                                           <?php }
                                           }
                                           else{ 
                                           foreach ($IndexTopFiveConstituentsArray as $topCond) { ?>
                                                <tr>
                                                    <!--<td style="width:33%;" data-title="Ticker"<?php if($indxx_info->is_isin==0){ ?> style="display: none;" <?php } ?>> <?php echo $topCond["ISIN"]; ?></td>-->
                                                    <td style="width:33%;" data-title="Company Name" <?php if($indxx_info->is_company_name==0){ ?> style="display: none;" <?php } ?>> <?php echo ucwords(strtolower($topCond["constituent"])); ?></td>
                                                    <?php if($indxx_info->is_all==1) { ?>
                                                    <td style="display: none;" data-title="Country">United States</td>
                                                    <?php } ?>
                                                    <td style="width:33%;" data-title="Weight" class="numeric text-right" <?php if($indxx_info->is_weight==0){ ?> style="display: none;" <?php } ?>> <?php echo number_format((float)$topCond["weight"]*100,2, '.', '');?>%</td>
                                                    
                                                </tr>
                                           <?php }
                                           }?>

                                        </tbody>
                                    </table>
                                     <?php if($indxxID==692 || $indxxID==691 || $indxxID==693 || $indxxID==694 || $indxxID==695 || $indxxID==696 || $indxxID==697 || $indxxID==698 || $indxxID==699 || $indxxID==700 
                                          || $indxxID==701 || $indxxID==702 || $indxxID==703 || $indxxID==704 || $indxxID==707 || $indxxID==708 || $indxxID==709 || $indxxID==710 || $indxxID==711 || $indxxID==712
                                          || $indxxID==713 || $indxxID==714 || $indxxID==715 || $indxxID==721 || $indxxID==720 || $indxxID==718 || $indxxID==722){ 
                                    $date_check = date('d');
                                    $currentMonth = date('F');
                                    $Month = Date('F', strtotime($currentMonth));
                                    $Year = Date('Y', strtotime($currentMonth));
                                    $lastMonth = date('M', strtotime("-1 month"));
                                    if($date_check>'10'){
                                        $Updated_Month = $Month;
                                        $Month_Year = $Month.' '.$Year;
                                    }
                                    else{
                                        $Updated_Month = $lastMonth;
                                        $Month_Year = $lastMonth.' '.$Year;
                                    }
                                    ?>
                                    <div style="font-size:10px; margin-bottom:2px; margin-top:15px;"><sup style="font-size:9px;text-align:left;">*</sup> Updated on 10th <?php echo $Updated_Month?> based on 1st <?php echo $Month_Year; ?> values.</div>
                                    <?php } 
                                    if($indxxID==241 || $indxxID==759){
                                    ?>
                                    <div style="font-size:10px; margin-bottom:2px; margin-top:15px;"><sup style="font-size:9px;text-align:left;">*</sup> Updated on 1st Dec based on 29th Nov values.</div>
                                    <?php }?>
                                </div>
                          <?php  } ?>
                                <?php $base =  date("Y-m-d",strtotime($baseDate->date));
                                     $time = new DateTime('now');
                                     $threeYear = $time->modify('-3 year')->format('Y-m-d');
                                     $time = new DateTime('now');
                                     $twoYear = $time->modify('-2 year')->format('Y-m-d');
                                     $time = new DateTime('now');
                                     $oneYear = $time->modify('-1 year')->format('Y-m-d');
                                     $baseTimeStamp = strtotime($base);
                                     $oneYearTimeStamp = strtotime($oneYear);
                                     $time = new DateTime('now');
                                     $threemonth = $time->modify('-3 month')->format('Y-m-d');
                                     $threeMonthTimeStamp = strtotime($threemonth);
                                     
                                     
                                ?>
                                
                                    <?php $showhide= $this->indice->GetOtherindxxShowHideOption($indxxID,'show_rr'); 
                          if($showhide=='show') {
                          ?>
                                <div class="clearfix"></div>
                                <hr style="margin-top:20px;">
                                <h2 class="ttle risk">Index Risk & Return Statistics </h2>
                                <div class="table-responsive"> 
                                    <table border="0" id="risktable" cellspacing="0" cellpadding="0" width="100%" style="margin-bottom: 15px;">
                                        <tbody>
                                            <tr style="height:30px;background:none repeat scroll 0 0 #515151" class="table-head">
                                                <th style="font-size: 13px;padding-left:5px;text-align:left!important;color:#FFFFFF!important;width:15% !important;">Statistic</th>
                                                <th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;width:15% !important;">QTD</th>
                                                <th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;width:15% !important;">YTD</th>
                                                <th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;width:15% !important;">1 Year</th>
                                                <th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;width:15% !important;">3 Year</th>
                                                <th  style="text-align:right!important;font-size: 13px;color:#FFFFFF!important;padding-right:5px!important;">Since Base Date</th>
                                            </tr>
                                            <tr style="height:30px;font-size: 13px;background:none repeat scroll 0 0 #ccc;">
                                                <td nowrap="nowrap" style="padding-left:5px !important;">Beta<div style="display:inline-block !important;"><sup style="font-size:10px !important;">1</sup></div></td>
                                               <?php if($base > $threemonth) { ?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['qtd']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['qtd'], 2, '.', ''));  } else { echo 'NA'; } ?></td>
                                                 <?php  } ?> 
                                                <?php if($baseTimeStamp > $oneYearTimeStamp && $base > $oneYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['ytd']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['ytd'], 2, '.', '')); } else { echo 'NA'; }?></td>
                                                 <?php  } ?> 
                                                <?php if($baseTimeStamp > $oneYearTimeStamp && $base > $oneYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['1year']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['1year'], 2, '.', '')); } else { echo 'NA'; }  ?></td>
                                                <?php  } ?> 
                                                <?php if($base > $threeYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['3year']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['3year'], 2, '.', '')); } else  { echo 'NA'; }?></td>
                                                <?php  } ?>                                               
                                                
                                                <td align="right" nowrap="nowrap" style="padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['SinceInception']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['SinceInception'], 2, '.', '')); } else { echo  'NA'; } ?></td>
                                            </tr>
                                            <tr style="height:30px;font-size: 13px;background:none repeat scroll 0 0 #eee;">
                                                <td nowrap="nowrap" style="padding-left:5px !important;">Correlation<div style="display:inline-block !important;"><sup style="font-size:10px !important;">1</sup></div></td>
                                                <?php if($base > $threemonth) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['qtd']!=0) { echo (number_format($IndexRiskReturnsArray['Correlation']['qtd'], 2, '.', '')); } else { echo 'NA'; } ?></td>
                                                <?php  } ?>
                                                <?php if($baseTimeStamp > $oneYearTimeStamp && $base > $oneYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['ytd']!=0) { echo (number_format($IndexRiskReturnsArray['Correlation']['ytd'], 2, '.', '')); } else { echo 'NA'; } ?></td>
                                                <?php  } ?>
                                                <?php if($baseTimeStamp > $oneYearTimeStamp && $base > $oneYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['1year']!=0) { echo (number_format($IndexRiskReturnsArray['Correlation']['1year'], 2, '.', '')); } else { echo 'NA'; } ?></td>
                                                <?php  } ?>
                                                 <?php if($base > $threeYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['3year']!=0) 
                                                { echo (number_format($IndexRiskReturnsArray['Correlation']['3year'], 2, '.', '')); } else { echo 'NA'; } ?></td>
                                                <?php  } ?>
                                                <td align="right" nowrap="nowrap" style="padding-right:5px!important;"><?php  if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR' || $indxx_info->code=='IISERI' || $indxx_info->code=='IISERIP' || $indxx_info->code=='IISERINT'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['SinceInception']!=0) { echo (number_format($IndexRiskReturnsArray['Correlation']['SinceInception'], 2, '.', '')); } else { echo 'NA'; } ?></td>
                                            </tr>
                                            <tr style="height:30px;font-size: 13px;background:none repeat scroll 0 0 #ccc;">
                                                <td nowrap="nowrap" style="padding-left:5px !important;">Returns<div style="display:inline-block !important;"><sup style="font-size:10px !important;">2</sup></div></td>
                                                 <?php if($base > $threemonth) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($IndexRiskReturnsArray['Cumulative Return']['qtd']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['qtd'], 2, '.', '')); ?>%  <?php  } else { echo 'NA'; }  ?> </td>
                                                <?php  } ?>
                                                <?php if($baseTimeStamp > $oneYearTimeStamp && $base > $oneYear) {?>
                                                <td align="right" nowrap="nowrap">NA </td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($IndexRiskReturnsArray['Cumulative Return']['ytd']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['ytd'], 2, '.', '')); ?>%  <?php  } else { echo 'NA'; }  ?></td>
                                                <?php  } ?>
                                                <?php if($baseTimeStamp > $oneYearTimeStamp && $base > $oneYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($IndexRiskReturnsArray['Cumulative Return']['1year']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['1year'], 2, '.', '')); ?>% <?php  } else { echo 'NA'; } ?></td>
                                                <?php  } ?>
                                                <?php if($base > $threeYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($IndexRiskReturnsArray['Cumulative Return']['3year']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['3year'], 2, '.', '')).'%';
                                                } else { echo 'NA'; } ?></td>
                                                <?php  } ?>
                                                
                                                
                                                <td align="right" nowrap="nowrap" style="padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Cumulative Return']['SinceInception']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['SinceInception'], 2, '.', '')); ?>% <?php  } else { echo 'NA'; }  ?></td>
                                            </tr>
                                            <tr style="height:30px;font-size: 13px;background:none repeat scroll 0 0 #eee;">
                                                <td nowrap="nowrap" style="padding-left:5px !important;">Standard Deviation</td>
                                                 <?php if($base > $threemonth) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($IndexRiskReturnsArray['Standard Deviation']['qtd']!=0) { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['qtd'], 2, '.', '')); ?>% <?php  } else { echo 'NA'; }  ?></td>
                                                <?php  } ?>
                                                <?php if($baseTimeStamp > $oneYearTimeStamp && $base > $oneYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($IndexRiskReturnsArray['Standard Deviation']['ytd']!=0) { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['ytd'], 2, '.', '')); ?>%  <?php  } else { echo 'NA'; }  ?></td>
                                                <?php  } ?>
                                                <?php if($baseTimeStamp > $oneYearTimeStamp && $base > $oneYear) {?>
                                                <td align="right" nowrap="nowrap">NA </td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($IndexRiskReturnsArray['Standard Deviation']['1year']!=0)  { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['1year'], 2, '.', '')); ?>% <?php } else { echo 'NA'; }  ?></td>
                                                <?php  } ?>
                                                <?php if($base > $threeYear) {?>
                                                <td align="right" nowrap="nowrap">NA</td>
                                                <?php }else{ ?>
                                                <td align="right" nowrap="nowrap"><?php if($IndexRiskReturnsArray['Standard Deviation']['3year']!=0) { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['3year'], 2, '.', '')).'%'; } else { echo 'NA'; } ?></td>
                                                <?php  } ?>
                                                <td align="right" nowrap="nowrap" style="padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Standard Deviation']['SinceInception']!=0) { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['SinceInception'], 2, '.', ''));  ?>% <?php } else { echo 'NA'; } ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR')
                                            { ?> <div style="display: none;"> </div>
                                                <div style="font-size:10px"><sup style="font-size:8px">2</sup>As of last trading day.</div> <?php }
                                    else { ?>
                                    <div style="font-size:10px;"><sup style="font-size:8px">1</sup>W.R.T.: <?php echo $indxx_details[0]->benchmark;?></div>
                                    <div style="font-size:10px"><sup style="font-size:8px">2</sup>As of last trading day.</div>
                                    <?php } ?>
                            </div>
                         <?php } ?>
                         
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<?php include("footer.php"); ?>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script type="text/javascript">


    $(document).ready(function ()
    {

        $('#updateindexvalues').click(function ()
        {
            var refererlink = document.referrer;
            var url = refererlink.split("?")[0] + "?id=" + document.getElementById('TickerSymbol').value;
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
//console.log(chartData2);
        var chart = AmCharts.makeChart("chartContainer", {
            "type": "stock",
            "themes": "dark",
            "dataSets": [{
                    "title": "Index: <?php echo $title; ?>",
                    "color": "#ed3c3d",
                   
                            "fieldMappings": [{
                            "fromField": "value",
                            "toField": "value",
                            
                        }, {
                            "fromField": "volume",
                            "toField": "volume",
                            
                        }],
                    "dataProvider": chartData,
                    "categoryField": "date"
                }   <?php if($indxx_details[0]->return_type!='CADNTR' && $indxx_details[0]->return_type!='CADGTR' && $banchMark!='')
                    { if($banchMark!='' && $banchMark!=' ') { ?>, {
                    <?php //if($indxxID==458){ ?>
                    <!--"title": "Benchmark: <?php //echo $benchmark_title; ?>",-->
                      <?php //} else{ ?>  
                    <?php if($indxx_details[0]->return_type=='PR'){ ?>
                    "title": "Benchmark: <?php echo $benchmark_title; ?> ", //Indxx 500 Index (PR)
                    <?php } if($indxx_details[0]->return_type=='TR') { ?>
                    "title": "Benchmark: <?php echo $benchmark_title; ?>", //Indxx 500 Index (TR)
                    <?php } if($indxx_details[0]->return_type=='NTR'){ ?>
                    "title": "Benchmark: <?php echo $benchmark_title; ?>", //Indxx 500 Index (NTR)
                    <?php } //}?>
                    
                    "color": "#302f2f",
                    
                    "fieldMappings": [{
                            "fromField": "value",
                            "toField": "value"
                        }, {
                            "fromField": "volume",
                            "toField": "volume",
                            
                           
                        }],
                    "dataProvider": chartData2,
                    "categoryField": "date",
                    "compared": true
                }
                <?php }  } ?>
                ],

      
            "panels": [{
                    "showCategoryAxis": true,
                    "recalculateToPercents": "never",
                    "title": "Value",
                    "stockGraphs": [
                        {
                            "id": "g1",
                            "valueField": "value",
                            "fillAlphas": 0.8,
                            "lineAlpha": 0.2,
                            "useDataSetColors": true,
                            "comparable": true,
                            "compareField": "value",
                            "lineThickness": 2,
                            "balloonText": "<b>[[value]]</b>",
                            
                            "compareGraph": {
                            "valueField": "value",
                            "fillAlphas": 0.8   ,
                            "lineAlpha": 0.2,
                            "useDataSetColors": true,
                            "comparable": true,
                            "compareField": "value",
                            "lineThickness": 1,
                            "balloonText": "<b>[[value]]</b>"
                            },
                        }],
                     
                    "stockLegend": {
                        "periodValueTextRegular": "[[value.close]]",
                        "valueTextComparing": "[[value]]",
                         
                    },
                    "drawingIconsEnabled": false
                }],

            "chartScrollbarSettings": {
                "graph": "g1",
                
                
            },

            "chartCursorSettings": {
                "valueBalloonsEnabled": true

            },

            "periodSelector": {
                "position": "bottom",
                "periods": [{
                        "period": "DD",
                        "count": 10,
                        "label": "10 Days"
                    }, {
                        "period": "MM",
                        "count": 1,
                        "label": "1 Month"
                    }, {
                        "period": "YYYY",
                        "count": 1,
                        "label": "1 Year"
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
//  save.php



        chart.addListener('rendered', function (event) {
//          var base_url = '<?php echo base_url(); ?>Welcome/savephp/';
             setTimeout(function() {
           var ame = new AmCharts.AmExport(event.chart,{},true);
        ame.output({
            format: "png",
            output: "datastring"
        },function (data) {
                        $.post( '<?php echo base_url(); ?>Welcome/savephp/', {
                            "imageData": encodeURIComponent(data),
                            "filename": "<?php  echo $code; ?>",
                            "indxx": "<?php echo $indxxID; ?>"
                        })
                        .done(function() {
    $("#factid").removeClass("disabled");
  });
                    });
                    },1000); // startDuration
        });

       chart.pathToImages = "<?php echo base_url(); ?>assets/images/";
        chart.write('chartContainer');
    }

</script>

<style>
    .amcharts-chart-div a
    {
        display:none !important;
    }
    .panel.with-nav-tabs .panel-heading{
        padding: 5px 5px 0 5px;
    }
    .panel.with-nav-tabs .nav-tabs{
        border-bottom: none;
    }
    .panel.with-nav-tabs .nav-justified{
        margin-bottom: -1px;
    }
    .with-nav-tabs.panel-default .nav-tabs > li > a,
    .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
        padding: 8px 24px;
        margin-top: 10px;
        font-weight: 500;
        color: #fff; border:1px solid #f83732;
    background-color: #f83732;
    }
    .with-nav-tabs.panel-default .nav-tabs > .open > a,
    .with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
        color: #777;
        background-color: #ddd;
        border-color: transparent;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.active > a,
    .with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
        color: #555;
        background-color: #fff;
        border-color: #ddd;
        border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #f5f5f5;
        border-color: #ddd;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #777;   
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #ddd;
    }
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        color: #fff;
        background-color: #555;
    }
    #type_diff {
        padding: 10px 32px !important;
        float: left;
        width: auto;
        color: #323232;
        margin-bottom: -1px;
        margin-left: 5px;
        font-weight: 500; 
        font-size: 13px;
        border-radius: 5px 5px 0 0;
        border-top: 1px solid #fff;
        border-left: 1px solid #fff;
        border-right: 1px solid #fff;
        background-color: #fff !important;
    }
    
    #type_diff.active, #type_diff:hover, #type_diff:focus{ color:#fff!important;
        border-top: 1px solid #ff3e3c;
        border-left: 1px solid #ff3e3c;
        border-right: 1px solid #ff3e3c;
        background-color: #ff3e3c !important;
        border-radius: 5px 5px 0 0;
        transition: all .25s ease-in;
    }
    .panel-default {
        border-color: #ddd;
        margin-top: 18px;
    }
    .tabs {
        margin-bottom: 14px;
    }
    /*praveen css*/
    .linkbut {
        float: left;
        width: 100%;
       /* background-color: #f6f6f6;*/
        padding: 11px 0 1px 1px;
        border-radius: 5px 5px 0 0;
        border: 1px solid #ddd;
    }
    .charting {
        float: left;
        width: 100%;
        border-left: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        border-right: 1px solid #ccc;
        padding: 23px 20px;
    }
    div#example_info {
        display: none;
    }
    div#example_paginate {
        display: none;


    }
</style>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
        "lengthMenu": [[5,10, 25, 50, 100, 500, -1], [5,10, 25, 50, 100, 500, "All"]],
        "order": [[ 2, 'desc' ]],
        
        

        });
    });
    
   
</script>
<div id="snackbar">Fact Sheet is not available</div>

<script>
function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Indices | Indxx</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link rel="shortcut icon" href="
                <?php echo base_url(); ?>assets/images/favicon.ico">
                <link rel="stylesheet" type="text/css" href="
                    <?php echo base_url(); ?>assets/css/style.css" />
                </head>
                <body>
                    <section id="solution" class="p-t-100 p-b-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-sm-12 col-xs-12">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                            <tr style="font-size: 12px;height:15px; text-align:center">
                                                <td width="67%" style="padding-left:5px;text-align:left!important;line-height: 10px!important;"></td>
                                                <td width="33%" align="right" style="font-size: 12px; padding-right: 5px;line-height: 10px!important;" class="border-left">Data as of 
                                                    <?php echo date("F d,Y", strtotime($date)); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row m-t-40 pright"></div>
                                    <div class="row m-t-40 pleft">
                                        <div class="agileits_about_grids w3ls_products_grid">
                                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                                <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="access" aria-labelledby="access-tab">
                                                        <h4 style="margin-top: 5px; margin-bottom: 5px;">
                                                            <?php echo strtoupper ($indxx_details[0]->indxx_name);?>
                                                        </h4>
                                                        <hr style="margin-top:0; margin-bottom:5px;">
                                                        <p style="font-size: 12px; margin-top:0;!important;">
                                                            <?php echo $indxx_details[0]->index_description; ?>
                                                        </p>
                                                        <hr style="margin-top:0; margin-bottom:5px;">
                                                        <div class="charting">
                                                            <!--  <h4>Charting</h4> -->
                                                            <div>
                                                                <img src="
                                                                    <?php echo $ChartFilename; ?>" width="760" height="580">
                                                                <div style="font-size:9px;margin-bottom:10px">Back-tested performance is hypothetical and has certain inherent limitations. Back-tested performance differs from live performance and is included for informational purposes only.</div>    
                                                                </div>
                                                                <?php $showhide= $this->indice->GetOtherindxxShowHideOption($indxxID,'show_characteristics'); 
                                                                if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR')
                                                                    $showhide=='hide';
                          
                                                                elseif($showhide=='show') {?>
                                                                <div class="clearfix"></div>
                                                              
                                                                <?php if($indxx_details[0]->index_type != 'Other Indices' ){?>
                                                                <hr style="margin-top:0; margin-bottom:0;">
                                                                <h4 align="left">INDEX CHARACTERISTICS </h4>
                                                                <div style="margin-bottom:0% !important;" class="table-responsive">
                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:5px!important">
                                                                        <tbody>
                                                                            <tr style="font-size: 12px;height:30px;background-color:#ccc; text-align:center">
                                                                                <td width="67%" style="font-size: 12px; padding-left:5px;text-align:left!important;line-height: 25px!important;">Base Date</td>
                                                                                <td width="33%" align="right" style="font-size: 12px; padding-right: 5px;line-height: 25px!important;" class="border-left">
                                                                                    <?php echo $IndexCharacteristicsArray['inceptionDate']; ?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="font-size: 12px;height:30px;background-color:#eee; text-align:center">
                                                                                <td width="67%" style="font-size: 12px; padding-left:5px;text-align:left!important; line-height: 25px!important;">Constituents</td>
                                                                                <td width="33%" align="right"  style="font-size: 12px; padding-right: 5px; line-height: 25px!important;" class="border-left">
                                                                                    <?php echo $IndexCharacteristicsArray['noofconstituents']; ?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="font-size: 12px;height:30px;background-color:#ccc; text-align:center">
                                                                                <td width="67%" style="font-size: 12px; padding-left:5px;text-align:left!important; line-height: 25px!important;">Dividend Yield*</td>
                                                                                <td width="33%" align="right" style="font-size: 12px; padding-right: 5px;line-height: 25px!important;" class="border-left">
                                                                                    <?php echo $IndexCharacteristicsArray['dividend_yield']; ?>%
                                                                                </td>
                                                                            </tr>
                                                                            <tr style="font-size: 12px;height:30px;background-color:#eee;text-align:center">
                                                                                <td width="67%" style="font-size: 12px; padding-left:5px;text-align:left!important;line-height: 25px!important;">52 Week High/Low**</td>
                                                                                <td width="33%" align="right" style="font-size: 12px; padding-right: 5px;line-height: 25px!important;" class="border-left">
                                                                                    <?php //echo $IndexCharacteristicsArray['52weeks']['max'].'/'.$IndexCharacteristicsArray['52weeks']['min']; ?>
                                                                                    <?php echo $IndexCharacteristicsArray['52weeks']; ?>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <span style="font-size:9px;">* Trailing 12 months data for current year portfolio, as of last trading day of most recent month end.</span>
                                                                <br><span style="font-size:9px; margin-bottom:20px">** Trailing 12 months as of last trading day.</span>
                                                                </div>
                                                                <?php } ?>
                                                                <hr style="margin-top:2px; margin-bottom:0;">
                                                                <?php } ?>
                                                                
                                                               <h4  style="margin-top:-10px ; display:none;">INDXX CONSTITUENTS</h4>
                                                                <div style="display:none;" class="table-responsive">
                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:-20px !important;">
                                                                        <tbody>
                                                                            <tr style="background-color:#515151" class="table-head">
                                                                                <th style="padding-left:4px;text-align:left!important;color:#FFFFFF!important;font-size: 12px;line-height: 25px!important;">Constituent</th>
                                                                                <th align="left" style="color:#FFFFFF!important;font-size: 12px;line-height: 25px!important;">ISIN</th>
                                                                                <th align="right" style="color:#FFFFFF!important;padding-right:5px!important;font-size: 12px; line-height: 25px!important;">Weight</th>
                                                                            </tr>
                                                                            <?php
                                                            if (!empty($IndexTopFiveConstituentsArray)) {

                                                                foreach ($IndexTopFiveConstituentsArray as $key => $values) {
                                                                    $color = '';
                                                                    if ($key % 2 == 0) {
                                                                        $color = "#EEEEEE";
                                                                    } else {
                                                                        $color = "#CCCCCC";
                                                                    }
                                                                    ?>
                                                                            <tr style="height:30px;background-color:
                                                                                <?php echo $color; ?>;text-align:center">
                                                                                <td style="padding-left:5px!important;text-align:left!important;font-size:12px;line-height: 25px!important;">
                                                                                    <?php echo $values["name"]; ?>
                                                                                </td>
                                                                                <td align="left" style="font-size:12px;line-height: 25px!important;">
                                                                                    <?php echo $values['isin']; ?>
                                                                                </td>
                                                                                <td align="right" style="font-size:12px;padding-right:5px!important;line-height: 25px!important;">
                                                                                    <?php $val=   $values["weight"]*100; echo  number_format((float)$val,2, '.', ''); ?>%
                                                                                </td>
                                                                            </tr>
                                                                            <?php }
                                                                        } else {
                                                                            ?>
                                                                            <tr style="height:30px;background:none repeat scroll 0 0;text-align:center">
                                                                                <td style="padding-left:5px!important;text-align:left!important;font-size:12px;line-height: 25px!important;">N/A</td>
                                                                                <td align="left" style="font-size:12px;line-height: 25px!important;">N/A</td>
                                                                                <td align="right" style="font-size:12px;padding-right:5px!important;line-height: 25px!important;">0%</td>
                                                                            </tr>
                                                                            <?php  } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                               
                                                                
                                                         <?php if($indxx_details[0]->index_type != 'Other Indices'){?>       
                                                        <h4 align="left">
                                                        <?php $base =  date("Y-m-d",strtotime($baseDate->date));
                                                         $time = new DateTime('now');
                                                         $threeYear = $time->modify('-3 year')->format('Y-m-d');
                                                         $twoyear = $time->modify('-2 year')->format('Y-m-d');
                                                         $oneyear = $time->modify('-1 year')->format('Y-m-d');?>
                                           
                                                          INDEX RISK & RETURN STATISTICS
                                                        </h4>
                                                        <div class="table-responsive">
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                <tbody>
                                                                    <tr style="height:30px;background-color:#515151" class="table-head">
                                                                        <th style="font-size: 12px;padding-left:5px;text-align:left!important;color:#FFFFFF!important;width:20% !important;line-height: 25px!important;">Statistic</th>
                                                                        <th align="right" style="font-size: 12px;color:#FFFFFF!important;width:15% !important;line-height: 25px!important;">QTD</th>
                                                                        <th align="right" style="font-size: 12px;color:#FFFFFF!important;width:15% !important;line-height: 25px!important;">YTD</th>
                                                                        <th align="right" style="font-size: 12px;color:#FFFFFF!important;width:15% !important;line-height: 25px!important;">1 Year</th>
                                                                        <th align="right" style="font-size: 12px;color:#FFFFFF!important;width:15% !important;line-height: 25px!important;">3 Year</th>
                                                                        <th align="right" style="font-size: 12px;color:#FFFFFF!important;padding-right:5px!important;line-height: 25px!important;">Since Base Date</th>
                                                                    </tr>
                                                                     <tr style="height:30px;font-size: 12px;background-color:#ccc;">;
                                                                        <td nowrap="nowrap" style="font-size: 12px; padding-left:5px !important; line-height: 25px!important">Beta<sup style="font-size:8px !important;">1</sup></td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['qtd']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['qtd'], 2, '.', '')); } else { echo '-'; } ?></td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['ytd']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['ytd'], 2, '.', '')); } else { echo '-'; }?></td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['1year']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['1year'], 2, '.', '')); } else { echo '-'; }  ?></td>
                                
                                                                        
                                                                        <?php //if($base > $threeYear || $base > $twoyear || $base > $oneyear) {?>
                                                                        <!--<td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;">NA</td>-->
                                                                        <?php //}else{ ?>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['3year']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['3year'], 2, '.', '')); } else  { echo '-'; }?></td>
                                                                        <?php // } ?>                                               
                                                                        
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Beta']['SinceInception']!=0) { echo (number_format($IndexRiskReturnsArray['Beta']['SinceInception'], 2, '.', '')); } else { echo  '-'; } ?></td>
                                                                    </tr>
                                                                    <tr style="height:30px;font-size: 12px;background-color:#eee;">
                                                                        <td nowrap="nowrap" style="font-size: 12px; padding-left:5px !important; line-height: 25px!important">Correlation<sup style="font-size:8px !important;">1</sup></td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['qtd']!=0) { echo (number_format($IndexRiskReturnsArray['Correlation']['qtd'], 2, '.', '')); } else { echo '-'; } ?></td>
                                                                      
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['ytd']!=0) { echo (number_format($IndexRiskReturnsArray['Correlation']['ytd'], 2, '.', '')); } else { echo '-'; } ?></td>
                                                                       

                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['1year']!=0) { echo (number_format($IndexRiskReturnsArray['Correlation']['1year'], 2, '.', '')); } else { echo '-'; } ?></td>
                                                                        
                                                                         <?php //if($base > $threeYear|| $base > $twoyear || $base > $oneyear) {?>
                                                                        <!--<td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;">NA</td>-->
                                                                        <?php //}else{ ?>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['3year']!=0) 
                                                                        { echo (number_format($IndexRiskReturnsArray['Correlation']['3year'], 2, '.', '')); } else { echo '-'; } ?></td>
                                                                        <?php  //} ?>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php  if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR'){echo 'NA';} elseif($IndexRiskReturnsArray['Correlation']['SinceInception']!=0) { echo (number_format($IndexRiskReturnsArray['Correlation']['SinceInception'], 2, '.', '')); } else { echo '-'; } ?></td>
                                                                    </tr>
                                                                    <tr style="height:30px;font-size: 12px;background-color:#ccc;">
                                                                        <td nowrap="nowrap" style="font-size: 12px; padding-left:5px !important; line-height: 25px!important">Returns<sup style="font-size:8px !important;">2</sup></td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Cumulative Return']['qtd']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['qtd'], 2, '.', '')); ?>%  <?php  } else { echo '-'; }  ?> </td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Cumulative Return']['ytd']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['ytd'], 2, '.', '')); ?>%  <?php  } else { echo '-'; }  ?></td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Cumulative Return']['1year']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['1year'], 2, '.', '')); ?>% <?php  } else { echo '-'; } ?></td>
                                                                        
                                                                        <?php //if($base > $threeYear || $base > $twoyear || $base > $oneyear) {?>
                                                                        <!--<td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;">NA</td>-->
                                                                        <?php //}else{ ?>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Cumulative Return']['3year']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['3year'], 2, '.', '')).'%';
                                                                        } else { echo '-'; } ?></td>
                                                                        <?php  //} ?>
                                                                        
                                                                        
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Cumulative Return']['SinceInception']!=0) { echo (number_format($IndexRiskReturnsArray['Cumulative Return']['SinceInception'], 2, '.', '')); ?>% <?php  } else { echo '-'; }  ?></td>
                                                                    </tr>
                                                                    <tr style="height:30px;font-size: 12px;background-color:#eee;">
                                                                        <td nowrap="nowrap" style="font-size: 12px; padding-left:5px !important; line-height: 25px!important">Standard Deviation</td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Standard Deviation']['qtd']!=0) { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['qtd'], 2, '.', '')); ?>% <?php  } else { echo '-'; }  ?></td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Standard Deviation']['ytd']!=0) { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['ytd'], 2, '.', '')); ?>%  <?php  } else { echo '-'; }  ?></td>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Standard Deviation']['1year']!=0)  { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['1year'], 2, '.', '')); ?>% <?php } else { echo '-'; }  ?></td>
                                                                         <?php //if($base > $threeYear || $base > $twoyear || $base > $oneyear) {  ?>
                                                                        <!--<td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;">NA</td>-->
                                                                        <?php //}else{ ?>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Standard Deviation']['3year']!=0) { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['3year'], 2, '.', '')).'%'; } else { echo '-'; } ?></td>
                                                                        <?php  //} ?>
                                                                        <td align="right" nowrap="nowrap" style="font-size: 12px;padding-right:5px!important;"><?php if($IndexRiskReturnsArray['Standard Deviation']['SinceInception']!=0) { echo (number_format($IndexRiskReturnsArray['Standard Deviation']['SinceInception'], 2, '.', ''));  ?>% <?php } else { echo '-'; } ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                           <?php if($indxx_details[0]->return_type=='CADGTR' || $indxx_details[0]->return_type=='CADNTR')
                                                            { ?> <span style="display: none;"> </span>
                                                                <span style="font-size:9px"><sup style="font-size:7px">2</sup>As of last trading day.</span> <?php }
                                                            else { ?>
                                                            <span style="font-size:9px;">
                                                                <sup style="font-size:7px">1</sup>W.R.T.: <?php echo $indxx_details[0]->benchmark; ?>
                                                            </span><br>
                                                            <span style="font-size:9px; margin-bottom:20px;">
                                                                <sup style="font-size:7px">2</sup>As of last trading day.
                                                            </span><?php } ?>
                                                        </div>
                                                        <?php } ?>
                                                    <hr style="margin-top:2px; margin-bottom:5px;">
                                                <div class="clearfix"></div>
                                                <!-- <p><span style="font-size:10px !important; font-style:italic !important;">Data as of 
                                                <?php echo date("F d,Y", strtotime($date)); ?></span></p>  -->
                                                <div style=" text-align:justify; font-size:9px;">Disclaimer &ndash; Indxx disclaims all warranties, expressed or implied, relating to this document, and any content, 
                                            information or data here in, including, and without limitation, warranties of merchantability and fitness for a particular purpose. All such content, information 
                                            and data are provided as is. Indxx makes no guarantees regarding the accuracy of the content, information or data here in. Limitation on Liabilities &ndash; 
                                            In no event will Indxx be liable for direct, indirect, special, incidental, consequential or any other damages arising under or relating to this product and / or 
                                            the content, information or data here in. Your sole remedy for dissatisfaction with this product is to stop using the product. For the most recent data, please 
                                            visit www.indxx.com.</div>
                                            <div style=" text-align:center; font-size:9px;">© Indxx 2020</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <script src="
                        <?php echo base_url(); ?>assets/js/bootstrap.min.js">
                    </script>
                </body>
            </html>
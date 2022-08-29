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
   
      <script src="<?php echo base_url(); ?>assets/js/accordion.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
      <section id="solution" class="p-t-100 p-b-100">
         <div class="container">
         <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
               <div class="solution_tabs">
                  <h3>Press Room</h3>
                  <ul>
                     <li role="presentation" class="active"><a href="#thenews" id="thenews-tab" role="tab" data-toggle="tab" aria-controls="thenews" aria-expanded="true" class="str">In the News</a></li>
                     <li role="presentation"><a href="#release" role="tab" id="release-tab" data-toggle="tab" aria-controls="release" class="str">Press Releases</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
               <div class="row m-t-40 pleft">
                  <div class="agileits_about_grids w3ls_products_grid">
                     <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content">
                           <div role="tabpanel" class="tab-pane fade in active" id="thenews" aria-labelledby="thenews-tab">
                              <h3>In the News</h3>
                              <?php foreach($newsposts as $newsHeading => $news){ ?>
                              <h4 id="xx<?php echo $newsHeading; ?>"><?php echo $newsHeading; ?></h4>
                              <ul class="list2 hide" id="data<?php echo $newsHeading; ?>">
                                 <?php foreach($news as $res){
                                    if($res['url']==''){ 
                                    
                                     	$link = base_url().'assets/media/news/'.$res['pdf'];
                                     }else{
                                     		$link =$res['url'];
                                     }
                                    
                                    
                                    ?>
                                 <li><a href="<?php echo $link ?>" target="_blank"><?php echo $res['title']; ?></a></li>
                                 <?php } ?>
                              </ul>
                              <div class="clearfix"></div>
                              <hr class="line1">
                              <script>
                                    $(document).ready(function(){
                                        $("#xx<?php echo $newsHeading; ?>").click(function(){
                                            $("#data<?php echo $newsHeading; ?>").toggleClass("hide");
                                        });
                                    });
                                    </script>
                              <?php } ?>
                           </div>
                           <div role="tabpanel" class="tab-pane fade" id="release" aria-labelledby="release-tab">
                              <h3>Press Releases</h3>
                                <?php foreach ($press as $pressHeading => $press) {?>
                                
                                <h4 id="yy<?php echo $pressHeading; ?>"><?php echo $pressHeading; ?></h4>
                                <ul class="list2 hide" id="dataw<?php echo $pressHeading; ?>">
                                 <?php foreach($press as $ress){
                                    if($ress['url']==''){ 
                                    
                                       $link = base_url().'assets/media/news/'.$ress['pdf'];
                                     }else{
                                          $link =$ress['url'];
                                     }
                                    
                                    
                                    ?>
                                 <li><a href="<?php echo $link ?>" target="_blank"><?php echo $ress['title']; ?></a></li>
                                 <?php } ?>
                              </ul>
                                  <script>
                                    $(document).ready(function(){
                                        $("#yy<?php echo $pressHeading; ?>").click(function(){
                                            $("#dataw<?php echo $pressHeading; ?>").toggleClass("hide");
                                        });
                                    });
                                    </script>
                                <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php include("footer.php"); ?>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <style type="text/css">
      h4{cursor: pointer;}
      </style>
   </body>
</html>
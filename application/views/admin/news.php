<!DOCTYPE html>
<html lang="en">
<head>
<title>News | Indxx</title>
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
</head>

<body>
   <?php include("header.php"); ?>
    <section id="news" class="border_b">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>News</h2>
                        <p>Indxx has been developing and licensing indices to clients since 2005</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    <ol class="breadcrumb">
                        <li><a href="#">You are here:</a></li>
                        <li><a href="#">Home</a></li>
                        <li class="active">News</li>
                    </ol>
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
								<li role="presentation"><a href="#release" role="tab" id="release-tab" data-toggle="tab" aria-controls="release" class="str">Press Release</a></li>
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
										<h4><?php echo $newsHeading; ?></h4>
										<ul class="list2">
											<?php foreach($news as $res){ ?>
												<li><a href="<?php echo $res['url']; ?>" target="_blank"><?php echo $res['title']; ?></a></li>							
											<?php } ?>
										</ul>
										<div class="clearfix"></div>
										<hr class="line1">
									<?php } ?>
								</div>
								
								<div role="tabpanel" class="tab-pane fade" id="release" aria-labelledby="release-tab">
										<h3>Press Release</h3>
										<?php foreach($press as $pressheading => $prss){ ?>
										<h4><?php echo $pressheading; ?></h4>
										<ul class="list2">
										<?php foreach($prss as $res2){ ?>
											<li><a href="<?php echo $res2['url']; ?>"><?php echo $res2['title']; ?></a></li>
											<?php } ?>
										</ul>
										<div class="clearfix"></div>
										<hr class="line1">
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
</body>
</html>
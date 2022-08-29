<style>
.content-wrapper {
    background-color: #f9f9f9 !important;
}
.mdi-layers:before,.mdi-av-timer:before,.mdi-account-multiple:before,.mdi-download:before,.mdi-arrow-up:before{content: "" !important;}
.indBox {
    border: 1px solid #ccc;
}
p.heding {
    text-align: center;
    padding: 10px 0;
}
.bg-one{background-color: #E91E63}
.bg-two{background-color: #00BCD4}
.bg-three{background-color: #8BC34A}
.bg-four{background-color: #FF9800}
.card i {
    float: left;
    font-size: 48px;
    padding: 12px;
    color: #fff;
    line-height: 73px;
}
.card {
    min-height: 100px;
}
h2.text-heading {
    text-align: right;
    margin-right: 14px;
    padding: 16px 0 0 0;
}
p.text-muted.m-0 {
    text-align: right;
    padding-right: 19px;
    color: #fff !important;
    font-weight: bold;
}
.chartTitle {
    text-align: center;
    padding: 6px 0;
    width: 98%;
    background: #FA0063;
    margin-left: 2%;
    color: #fff;
    font-size: 21px;
}
.newsTitle {
    text-align: center;
    padding: 10px;
    color: #fff;
}
li {
    
    padding: 4px 0 0 0;
}
</style>
<div class="wrapper">
  <header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-lg">CMS</span> 
	     
    </a>
  </header>
  <aside class="main-sidebar">
    <?php $this->load->view('admin/sidebar');?>
  </aside>
  <div class="content-wrapper" style="background-color:#f9f9f9!important;">
    
    <section class="content">
       <div class="row">
        <div class="col-lg-12"> 
         <div class="col-sm-6 col-lg-3">
           <div class="card text-white bg-one">  
           <i class="fa fa-line-chart" aria-hidden="true"></i>          
            <h2 class="text-heading"><?php echo $total;?></h2>
            <p class="text-muted m-0">Total Indices</p>
         </div>
         </div>
          <div class="col-sm-6 col-lg-3">
           <div class="card text-white bg-two">
           <i class="fa fa-line-chart" aria-hidden="true"></i>          
            <h2 class="text-heading"><?php echo $static;?></h2>
            <p class="text-muted m-0">Static Indices</p>
         </div>
         </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-three">     
            <i class="fa fa-line-chart" aria-hidden="true"></i>     
            <h2 class="text-heading"><?php echo $dynamic;?></h2>
            <p class="text-muted m-0">Dynamic Indices</p>
           </div>
         </div>
         <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-four">   
            <i class="fa fa-line-chart" aria-hidden="true"></i>   
            <h2 class="text-heading"><?php echo $contact;?></h2>
            <p class="text-muted m-0">Contact Request</p>
           </div>
         </div>
            
             <!-- <div class="col-sm-6 col-lg-4">
            <div class="card text-white bg-four">   
            <i class="fa fa-line-chart" aria-hidden="true"></i>   
            <h2 class="text-heading"><?php echo $latters;?></h2>
            <p class="text-muted m-0">Newsletter Request</p>
           </div>
         </div> -->
     </div>
 </div>
 <div class="row" style="margin-top: 25px;">
    <div class="col-sm-8">
        <div class="chartTitle">Indices Activity</div>
    <script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,  
    
    axisY: {
        title: "Units Sold",
        valueFormatString: "#0,,.",
        suffix: "mn",
        stripLines: [{
            value: 3366500,
            label: "Average"
        }]
    },
    data: [{
        yValueFormatString: "#,### Units",
        xValueFormatString: "YYYY",
        type: "spline",
        dataPoints: [
            {x: new Date(2002, 0), y: 2506000},
            {x: new Date(2003, 0), y: 2798000},
            {x: new Date(2004, 0), y: 3386000},
            {x: new Date(2005, 0), y: 6944000},
            {x: new Date(2006, 0), y: 6026000},
            {x: new Date(2007, 0), y: 2394000},
            {x: new Date(2008, 0), y: 1872000},
            {x: new Date(2009, 0), y: 2140000},
            {x: new Date(2010, 0), y: 7289000},
            {x: new Date(2011, 0), y: 4830000},
            {x: new Date(2012, 0), y: 2009000},
            {x: new Date(2013, 0), y: 2840000},
            {x: new Date(2014, 0), y: 2396000},
            {x: new Date(2015, 0), y: 1613000},
            {x: new Date(2016, 0), y: 2821000},
            {x: new Date(2017, 0), y: 2000000}
        ]
    }]
});
chart.render();

}
</script>

<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
 <div class="col-sm-4">
    <div class="newsTitle bg-two">Recent News</div>
      <ul>
        <?php foreach ($news as  $newss) { ?>       
        <li><?php echo $newss->title;?></li>
        <?php  } ?>
      </ul>
      <div class="newsTitle bg-three">Recent Press Release</div>
      <ul>
        <?php foreach ($press as  $press) { ?>  
        <li><?php echo $press->title;?></li>
        <?php  } ?>
       </ul>
    </div>
 </div>
						 
    </section>
 </div>
 <?php $this->load->view('admin/admin-footer') ;?>
  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
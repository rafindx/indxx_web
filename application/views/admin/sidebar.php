<section class="sidebar">    
  <ul class="sidebar-menu" >       
    <li class="main_link">
      <a href="<?php echo base_url('index.php/admin/home'); ?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a> 
    </li>  
     <li class="main_link home">
    <a href="#" id="home"> 
        <i class="fa fa-home"></i> <span>Home</span>
      </a> 
      <ul class="submenu" id="hom">
      <li><a href="<?php echo base_url('index.php/admin/clientSlider'); ?>">Clients</a></li>
      <li><a href="<?php echo base_url('index.php/admin/contect'); ?>">Contact Request</a></li>
      <!--<li><a href="<?php//   echo base_url('index.php/admin/newsletter'); ?>">News Letter</a></li>-->
      <!--<li><a href="<?php // echo base_url('index.php/admin/ourServices'); ?>">Our Services</a></li>-->
           
      </ul>
    </li>
<!--     <li class="main_link indxx">
      <a href="<?php //echo base_url('index.php/admin/indxx'); ?>" id="ind">
        <i class="fa fa-bars"></i> <span>Index</span>
      </a> 
 </li>  
 -->
  <li class="main_link news">
    <a href="#" id="ind"> 
        <i class="fa fa-bars"></i> <span>Indices</span>
      </a> 
      <ul class="submenu" id="ind-sub">
      <li><a href="<?php echo base_url('index.php/admin/indxx'); ?>"> Index</a></li>
      <li><a href="<?php echo base_url('index.php/admin/company_list'); ?>"> Company List</a></li>        
      </ul>
    </li>
 
 
    <li class="main_link indxx">
      <a href="<?php echo base_url('index.php/admin/calculate'); ?>" id="ind">
        <i class="fa fa-bars"></i> <span>Calculate R&R</span>
      </a> 

    </li>  
    <li class="main_link news">
    <a href="#" id="news"> 
        <i class="fa fa-newspaper-o"></i> <span>Press Room</span>
      </a> 
      <ul class="submenu" id="new">
      <li><a href="<?php echo base_url('index.php/admin/newslist'); ?>"> News</a></li>
      <li><a href="<?php echo base_url('index.php/admin/presslist'); ?>"> Press Release</a></li>
      <li><a href="<?php echo base_url('index.php/admin/researchlist'); ?>"> Research</a></li>
      </ul>
    </li>


     <li class="main_link annus">
    <a href="#" id="annus"> 
        <i class="fa fa-newspaper-o"></i> <span>Announcements</span>
      </a> 
      <ul class="submenu" id="newannus">
      <li><a href="<?php echo base_url('index.php/admin/NotificationList'); ?>">Notifications</a></li>
      <li><a href="<?php echo base_url('index.php/admin/Documentlist'); ?>">Document</a></li>   
      <li><a href="<?php echo base_url('index.php/admin/calenderlist'); ?>">Calendar</a></li>        
      </ul>
    </li>




    <li class="main_link about">
    <a href="#" id="about">
        <i class="fa fa-file-text-o"></i> <span>About Us</span>
      </a> 
      <ul class="submenu" id="abo">
      <li><a href="<?php echo base_url('index.php/admin/tabs'); ?>">Tabs Heading</a></li>
       <li><a href="<?php echo base_url('index.php/admin/overview'); ?>">
        <i class="fa fa-newspaper"></i> <span>Overview</span>
      </a> 
      </li> 
      <li><a href="<?php echo base_url('index.php/admin/ourValue'); ?>">
        <i class="fa fa-newspaper"></i> <span>Our Values</span>
      </a> 
      </li>
      <li><a href="<?php echo base_url('index.php/admin/department'); ?>">
        <i class="fa fa-newspaper"></i> <span>Department</span>
        </a> 
      </li>
       <li><a href="<?php echo base_url('index.php/admin/management'); ?>">
        <i class="fa fa-newspaper"></i> <span>Management</span>
      </a> 
      </li> 
      <li><a href="<?php echo base_url('index.php/admin/careers'); ?>">
        <i class="fa fa-newspaper"></i> <span>Careers</span>
      </a> 
      </li> 
       <li><a href="<?php echo base_url('index.php/admin/application'); ?>">
        <i class="fa fa-newspaper"></i> <span>Job Application</span>
      </a> 
      </li>          
      </ul>
    </li> 
      <li class="main_link pages">
      <a href="#" id="pages">
        <i class="fa fa-file-text-o"></i> <span>Pages</span>
      </a> 
      <ul class="submenu" id="overview">
       <li><a href="<?php echo base_url('index.php/admin/pages'); ?>">
        <i class="fa fa-newspaper"></i> <span>Overview</span>
      </a> 
      </li>
      </ul>
      </li>
    <li class="main_link indxx">
      <a href="<?php echo base_url('index.php/admin/add_faq_pdf'); ?>" id="faq">
    <i class="fa fa-bars"></i> <span>FAQ PDF</span>
    </a>

    </li>
    
    <li class="main_link">
      <a href="<?php echo base_url('index.php/admin/logout'); ?>">
        <i class="fa fa-sign-out"></i> <span>Logout</span>
      </a> 
    </li>       
  </ul>
</section>
<style type="text/css">
li.main_link { margin-bottom: 9px;}
.main_link li ul li{list-style: none;} 
.submenu li { list-style: none;}
.submenu{display: none;}
.submenu li {list-style: none;padding: 5px 32px;background-color: #fff;width: 100%;}
ul.submenu {padding: 0;}
.active {display: block;transition: opacity 1s ease-out;}
.open { background-color: #007FA5; color: #fff !important;}
.box-header.with-border {border-bottom: 1px solid #f4f4f4;text-align: center;background-color: #3c8dbc;color: #fff;}
.content-wrapper{background-color: #fff !important;}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{background-color: #444; color: #fff;}
ol.breadcrumb { display: none;}
.box-body {border-radius: 0 !important; border: 1px solid #ccc !important;}
.fa { font-size: 17px;}


/*thead {
    background-color: #e52d33;
    color: #fff;
}*/
</style>
<script>
$(document).ready(function(){
    $("#ind").click(function(){
       $("#ind").toggleClass("open");
        $("#ind-sub").toggleClass("active");
    });

    $("#news").click(function(){
       $("#news").toggleClass("open");
        $("#new").toggleClass("active");
    });

    $("#about").click(function(){
       $("#about").toggleClass("open");
        $("#abo").toggleClass("active");
    });

    $("#home").click(function(){
       $("#home").toggleClass("open");
        $("#hom").toggleClass("active");
    });

     $("#annus").click(function(){
       $("#annus").toggleClass("open");
        $("#newannus").toggleClass("active");
    });
    $("#pages").click(function(){
       $("#pages").toggleClass("open");
        $("#overview").toggleClass("active");
    });    
});
</script>
<script type="text/javascript">
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>
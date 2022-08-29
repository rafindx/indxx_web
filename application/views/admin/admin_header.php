<!DOCTYPE html><html><head>  <meta charset="utf-8">  
<meta http-equiv="X-UA-Compatible" content="IE=edge">  
<title><?php echo $pageTitle ?></title>  
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/js/morris.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css">  
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/blue.css">  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"></head>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/icons.css"/>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<!--<script type="text/javascript" src="<?php //echo base_url(); ?>assets/admin/js/modernizr.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/jquery.dashboard.js"></script>

  <script>

    $(document).ready(function(){
      var date_input=$('.date'); //our date input has the name "date"
      $('.open-datetimepicker').click(function(event){
    event.preventDefault();
    $('.date').focus();
});
   
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate: '+0d'
      };
      date_input.datepicker(options);
    });
    
   

</script>
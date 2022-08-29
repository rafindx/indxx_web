<?php
date_default_timezone_set('Asia/Kolkata');
	
	include("function.php");
	define('EXCEL_READER_PATH','excel_reader/');
	
	require_once(EXCEL_READER_PATH . 'excel_reader.php');
	$eread = new ExcelReader();
	$eread->read('ftp://EKaD1xie:biSe4Aht@icp.structured-solutions.de/Closing_DE000SLA6UP6_'.date('Ymd',(strtotime(date("Ymd"))-86400)).'.xls');
	$data = $eread->getData();
	$date=date('Y-m-d',(strtotime(date("Y-m-d"))-86400));
		if(!empty($data))
		{
			$index=169;
		/*	if(check('indxx_values',array('indxx'=>$index,'date'=>date("Y-m-d H:i:s",strtotime($data[0][1])))))*/
			if(check('indxx_values',array('indxx'=>$index,'date'=>date("Y-m-d H:i:s",strtotime($date)))))
			{insert("indxx_values", array('indxx'=>$index,'date'=>date("Y-m-d H:i:s",strtotime($date)),'value'=>$data[1][1]));
			echo "inserted";
			}else{
				update("indxx_values", array('indxx'=>$index,'date'=>date("Y-m-d H:i:s",strtotime($date)),'value'=>$data[1][1]));
					echo "updated";
			}
		}


		$eread2 = new ExcelReader();
	$eread2->read('ftp://Rai7yaeR:yivi9Ti2@icp.structured-solutions.de/Closing_DE000SLA0C84_'.date('Ymd',(strtotime(date("Ymd"))-86400)).'.xls');
	$data2 = $eread2->getData();
	$date2=date('Y-m-d',(strtotime(date("Y-m-d"))-86400));
		if(!empty($data2))
		{
			$index2=171;
		/*	if(check('indxx_values',array('indxx'=>$index,'date'=>date("Y-m-d H:i:s",strtotime($data[0][1])))))*/
			if(check('indxx_values',array('indxx'=>$index2,'date'=>date("Y-m-d H:i:s",strtotime($date2)))))
			{insert("indxx_values", array('indxx'=>$index2,'date'=>date("Y-m-d H:i:s",strtotime($date2)),'value'=>$data2[1][1]));
			echo "inserted";
			}else{
				update("indxx_values", array('indxx'=>$index2,'date'=>date("Y-m-d H:i:s",strtotime($date2)),'value'=>$data2[1][1]));
					echo "updated";
			}
		}
		
		
	$eread3 = new ExcelReader();
	$eread3->read('ftp://Rai7yaeR:yivi9Ti2@icp.structured-solutions.de/Closing_DE000SLA0D59_'.date('Ymd',(strtotime(date("Ymd"))-86400)).'.xls');
	$data3 = $eread3->getData();
	$date3=date('Y-m-d',(strtotime(date("Y-m-d"))-86400));
		if(!empty($data3))
		{
			$index3=170;
		/*	if(check('indxx_values',array('indxx'=>$index,'date'=>date("Y-m-d H:i:s",strtotime($data[0][1])))))*/
			if(check('indxx_values',array('indxx'=>$index3,'date'=>date("Y-m-d H:i:s",strtotime($date3)))))
			{insert("indxx_values", array('indxx'=>$index3,'date'=>date("Y-m-d H:i:s",strtotime($date3)),'value'=>$data3[1][1]));
			echo "inserted";
			}else{
				update("indxx_values", array('indxx'=>$index3,'date'=>date("Y-m-d H:i:s",strtotime($date3)),'value'=>$data3[1][1]));
					echo "updated";
			}
		}
		
?>






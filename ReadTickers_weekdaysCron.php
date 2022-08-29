<?php
date_default_timezone_set('Asia/Kolkata');
define('EXCEL_READER_PATH', 'excel_reader/');
require_once EXCEL_READER_PATH . 'excel_reader.php';
require_once EXCEL_READER_PATH . 'function.php';


function sortByName($a, $b) {
	$a = $a['name'];
	$b = $b['name'];

	if ($a == $b) {
		return 0;
	}

	return ($a < $b) ? -1 : 1;
}

function sortByWeight($a, $b) {
	$a = $a['weight'];
	$b = $b['weight'];

	if ($a == $b) {
		return 0;
	}

	return ($a > $b) ? -1 : 1;
}
if (date("D") == "Mon") {
	$date2 = date('Ymd', (strtotime(date("Y-m-d")) - 3 * 86400));
} else {
	$date2 = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
}

if (date("D") != "Sat" && date("D") != "Sun") {

	$text = '';
	$text = 'Date,' . $date2 . "\n\n";
	$text .= "Index Name,Code,Currency,Index Value,No. of Constituents\n";
	$sql = 'select * from cron_file_details where is_active=1 and AccessType="ReadTricker" ';
	$result = mysqli_query($bd, $sql);
	if ($result) {
		while ($ftp = mysqli_fetch_object($result)) {
            unset($eread);
        if (date("D") == "Mon") {
	        $date2 = date($ftp->dateFormat, (strtotime(date("Y-m-d")) - 3 * 86400));
        } else {
	        $date2 = date($ftp->dateFormat, (strtotime(date("Y-m-d")) - 86400));
        }
                      
			        $data = array();
			        $where =array('id'=>$ftp->indxx);
			        $indxxnamearr= getrow('indxx',$where); 
                    $indxxname = $indxxnamearr['name'];
				    $ext =".xls";	
                    echo $ftp->indxx;            
					$eread = new ExcelReader();
					if (is_readable($ftp->host_url.$date2.$ext)) {
                                              $param=  $ftp->param;
						$eread->read($ftp->host_url.$date2.$ext);
						$data = $eread->getData();
                                              $check = checkConstituents($ftp->indxx);

							if ($check == 1) {
                                                            
                            mysqli_query($bd,"delete from tbl_constituents where indxx_id='" . mysqli_real_escape_string($bd,$ftp->indxx) . "'");
							}

						if (!empty($data)) {
							$insertQuery = "Insert into tbl_constituents(isin,name,weight,indxx_id,date) values";
							$constituents_array = array();
							$top5Array = array(5);

							for ($i = 5; $i < count($data) - 6; $i++) {

								$insertQuery .= "('" . mysqli_real_escape_string($bd,$data[$i]['0']) . "','" . mysqli_real_escape_string($bd,ucwords(strtolower($data[$i]['1']))) . "','" . mysqli_real_escape_string($bd,$data[$i][$param]) . "','" . mysqli_real_escape_string($bd,$ftp->indxx) . "','" . date("Y-m-d", strtotime($date2)) . "'),";

							}

							if (substr($insertQuery, -1) == ",") {
								$insertQuery = $insertQuery . ")";
								$insertQuery = str_replace(",)", ";", $insertQuery);
							}
                                                      
                                                        
                            $insertQuery1 = "Insert into indxx_top_5_constituents(ISIN,constituent,weight,indxx_id,cdate) values";
							$constituents_array1 = array();
							$top5Array1 = array(5);

							for ($i = 5; $i < count($data) - 6; $i++) {

								$insertQuery1 .= "('" . mysqli_real_escape_string($bd,$data[$i]['0']) . "','" . mysqli_real_escape_string($bd,ucwords(strtolower($data[$i]['1']))) . "','" . mysqli_real_escape_string($bd,$data[$i][$param]) . "','" . mysqli_real_escape_string($bd,$ftp->indxx) . "','" . date("Y-m-d", strtotime($date2)) . "'),";

							}

							if (substr($insertQuery1, -1) == ",") {
								$insertQuery1 = $insertQuery1 . ")";
								$insertQuery1 = str_replace(",)", ";", $insertQuery1);
							}
                                                      
                                                        
							$check = checkConstituents($ftp->indxx);

							if ($check == 1) {
                                mysqli_query($bd,"delete from indxx_top_5_constituents where indxx_id='" . mysqli_real_escape_string($bd,$ftp->indxx) . "'");
								mysqli_query($bd,"delete from tbl_constituents where indxx_id='" . mysqli_real_escape_string($bd,$ftp->indxx) . "'");
							}
							
							mysqli_query($bd,$insertQuery);
                            mysqli_query($bd,$insertQuery1);
                                                       
                            echo 'Inserted<br>';
						}

						unset($data);
                        unset($eread);
                        unset($ftp);

					} else {
                                             echo 'File Not Redable<br>';
						//$text.=	$ftp_file[1].",".$ftp_file[2].",";
					}
				

			

		

	}
}
}
/*
exit;
// indxx 236 and 237 
$str1=file_get_contents("http://www.indexcalculation.com/marketcap/icai2/publishindex_details_sapna.php?code=IULCT&date=".$date2);
					
				$array1=json_decode($str1,true);
				//print_r($array1);
				//exit;

				if(!empty($array1))
					{
						
						foreach($array1 as $key => $val)
						{
							if($key == "tickker")
							{
								
								$qqq1="select * from tbl_constituents where indxx_id='237'";
								$qqq2=mysqli_query($bd,$qqq1) or die("values repetative".mysqli_error($bd));
									
									
									if(mysqli_num_rows($qqq2)>0)
									{
										//echo "update time2<br/>";
										$query2_del="delete from tbl_constituents where indxx_id='237'";
										$query2_run=mysqli_query($bd,$query2_del) or die("error in deletion ".mysqli_error($bd));
										  $query2_del1="delete from indxx_top_5_constituents where indxx_id='236'";
										$query2_run=mysqli_query($bd,$query2_del1) or die("error in deletion ".mysqli_error($bd));
									}
									
								foreach($val as $key2 =>$val2)
								{			
									
									$query2_update="Insert into tbl_constituents(isin,name,weight,indxx_id,date) values('".$val2['isin']."','".mysqli_escape_string($bd,$val2['name'])."','".$val2['weight']."','237','".$date2."') ";
                                                                        $bb=mysqli_query($bd,$query2_update)or die(" updated Index Securities query".mysqli_error($bd));
									$query2_update1="Insert into indxx_top_5_constituents(ISIN,constituent,weight,indxx_id,cdate) values('".$val2['isin']."','".mysqli_escape_string($bd,$val2['name'])."','".$val2['weight']."','236','".$date2."') ";
								
										$bb=mysqli_query($bd,$query2_update1)or die(" updated Index Securities query".mysqli_error($bd));
									
								}
								//$weight=trim($weight,",");
							}
							
							
						}
						
						
					}


	$str2=file_get_contents("http://www.indexcalculation.com/marketcap/icai2/publishindex_details_sapna.php?code=IULCP&date=".$date2);
					
				$array1=json_decode($str1,true);
				//print_r($array1);
				//exit;

				if(!empty($array1))
					{
						
						foreach($array1 as $key => $val)
						{
							if($key == "tickker")
							{
								
								$qqq1="select * from tbl_constituents where indxx_id='236'";
								$qqq2=mysqli_query($bd,$qqq1) or die("values repetative".mysqli_error($bd));
									
									
									if(mysqli_num_rows($qqq2)>0)
									{
										//echo "update time2<br/>";
										$query2_del="delete from tbl_constituents where indxx_id='236'";
										$query2_run=mysqli_query($bd,$query2_del) or die("error in deletion ".mysqli_error($bd));
                                                                                $query2_del1="delete from indxx_top_5_constituents where indxx_id='236'";
										$query2_run=mysqli_query($bd,$query2_del1) or die("error in deletion ".mysqli_error($bd));
										
									}
									
								foreach($val as $key2 =>$val2)
								{			
									
									$query2_update="Insert into tbl_constituents(isin,name,weight,indxx_id,date) values('".$val2['isin']."','".mysqli_escape_string($bd,$val2['name'])."','".$val2['weight']."','236','".$date2."') ";
							               $bb=mysqli_query($bd,$query2_update)or die(" updated Index Securities query".mysqli_error($bd));
									$query2_update1="Insert into indxx_top_5_constituents(ISIN,constituent,weight,indxx_id,cdate) values('".$val2['isin']."','".mysqli_escape_string($bd,$val2['name'])."','".$val2['weight']."','236','".$date2."') ";
								
										$bb=mysqli_query($bd,$query2_update1)or die(" updated Index Securities query".mysqli_error($bd));
									
								}
								//$weight=trim($weight,",");
							}
							
							
						}
						
						
					}					


}

*/
function checkConstituents($indxx_id) {
    global $bd;
    $query = mysqli_query($bd,"select count(*) from tbl_constituents where indxx_id='" . $indxx_id . "'");
	if (mysqli_num_rows($query) > 0) {
		return 1;
	} else {
		return 0;
	}
}
/*
$sql = 'UPDATE indxx_charecterstics SET no_of_constituents = (SELECT COUNT(id) FROM indxx_top_5_constituents WHERE indxx_top_5_constituents.indxx_id = indxx_charecterstics.indxx_id GROUP BY indxx_id)';
$result = mysqli_query($bd, $sql);
echo 'Updated No. of Constituents'
*/
?>

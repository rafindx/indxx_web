<?php
date_default_timezone_set('Asia/Kolkata');
define('EXCEL_READER_PATH', 'excel_reader/');

require_once EXCEL_READER_PATH . 'function.php';

echo $datedata = date('Y-m-d', strtotime(date('Y-m-d')) - 86400);

// $datedata = '2018-09-23';
require_once EXCEL_READER_PATH . 'excel_reader.php';
$sql = 'select * from cron_file_details where is_active=1 and AccessType= "DailyExternalftp" ';

$result = mysqli_query($bd, $sql);



if ($result) {
    
	while ($data = mysqli_fetch_object($result)) {
		
		$datedata = date($data->dateFormat, strtotime(date($data->dateFormat)) - 86400);
		$eread = new ExcelReader();
		$ftp = $data->host_url . $datedata . ".xls";
		if (is_readable($ftp)) {
			
			$eread->read($ftp);
			$filedata = $eread->getData();
			$param = $data->param;
			$paramarr = explode(',', $param);
		
			 $value = $filedata[$paramarr[0]][$paramarr[1]];
			 
	        echo $data->indxx;
			if ($value && $value != '0.00') {
				if (check('indxx_values', array('indxx' => $data->indxx, 'date' => date("Y-m-d H:i:s", strtotime($datedata))))) {
					insert('indxx_values', array('indxx' => $data->indxx, 'date' => date("Y-m-d H:i:s", strtotime($datedata)), 'value' => $value));
					echo "inserted<br>";
				} else {
					updatenew('indxx_values', array('indxx' => $data->indxx, 'date' => date("Y-m-d H:i:s", strtotime($datedata))), array('value' => $value));
					echo "update<br>";
				}
                                mysqli_query($bd, "DELETE FROM indxx_top_5_constituents WHERE indxx_id='" . $data->indxx . "'");
				mysqli_query($bd, "DELETE FROM tbl_constituents WHERE indxx_id='" . $data->indxx . "'");
							
                                foreach ($filedata as $index => $value) {
					   
                                    if ($index > 4) {
                                         
						insert("indxx_top_5_constituents", array('indxx_id' => $data->indxx, 'constituent' => $value[1], 'isin' => $value[0], 'weight' => $value[16]));
                       insert("tbl_constituents", array('indxx_id' => $data->indxx, 'name' => $value[1], 'isin' => $value[0], 'weight' => $value[16]));
					}
				}

			} else {
				echo 'value not Set on Record';
			}
			unset($data);
			unset($filedata);
			unset($eread);
		} else {
			echo 'ftp not readable'.$data->indxx.'<br/>';
			echo $ftp.'<br/>';
		}
	}

}
exit;
$date8 = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));

$fileContents = file_get_contents('http://23.253.218.51/www.indexcalculation.com/proprietary/icai2/printsingleindex.php?PATH=MARKETCAPNTR/ca-output/Innovation_Shares/Closing-THCX-'.$date8.'.txt'); 
$res = explode(",", $fileContents);

   $a = explode("\n", $fileContents);
	if (!empty($a)) {
		echo $index = 317;
		$b = explode(",", $a[0]);
		$c = explode(",", $a[1]);
		$index_value = $c[1];
		$date = $b[1];
	if (check('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8))))) {
			insert("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8)), 'value' => $index_value));
			echo "inserted304<br>";
		} else {
			update("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8)), 'value' => $index_value));
			echo "updated304<br>";
		}
		if(count($res)>1){
		mysqli_query($bd,"DELETE FROM indxx_top_5_constituents WHERE indxx_id=".$index);
        mysqli_query($bd,"DELETE FROM tbl_constituents WHERE indxx_id=".$index);
    }
$isin=23;
$weight= 28;
 for ($i = 22; $i < count($res); $i = $i + 12) {
        insert("indxx_top_5_constituents", array('indxx_id' => $index, 'constituent' => $res[$i], 'ISIN' => $res[$isin], 'weight' => $res[$weight]));
		insert("tbl_constituents", array('indxx_id' => $index, 'name' => $res[$i], 'isin' => $res[$isin], 'weight' => $res[$weight]));
		$isin = $isin + 12;
		$weight = $weight + 12;
	} 
	}
 else {

	echo "File empty 317";
}

$date8 = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));

$fileContents = file_get_contents('http://23.253.218.51/www.indexcalculation.com/proprietary/icai2/printsingleindex.php?PATH=MARKETCAPNTR/ca-output/Indxx/Closing-IUIRELI-'.$date8.'.txt'); 
$res = explode(",", $fileContents);

   $a = explode("\n", $fileContents);
	if (!empty($a)) {
		echo $index = 304;
		$b = explode(",", $a[0]);
		$c = explode(",", $a[1]);
		$index_value = $c[1];
		$date = $b[1];
	if (check('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8))))) {
			insert("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8)), 'value' => $index_value));
			echo "inserted304<br>";
		} else {
			update("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8)), 'value' => $index_value));
			echo "updated304<br>";
		}
		if(count($res)>1){
		mysqli_query($bd,"DELETE FROM indxx_top_5_constituents WHERE indxx_id=".$index);
        mysqli_query($bd,"DELETE FROM tbl_constituents WHERE indxx_id=".$index);
    }
$isin=23;
$weight= 28;
 for ($i = 22; $i < count($res); $i = $i + 12) {
        insert("indxx_top_5_constituents", array('indxx_id' => $index, 'constituent' => $res[$i], 'ISIN' => $res[$isin], 'weight' => $res[$weight]));
		insert("tbl_constituents", array('indxx_id' => $index, 'name' => $res[$i], 'isin' => $res[$isin], 'weight' => $res[$weight]));
		$isin = $isin + 12;
		$weight = $weight + 12;
	} 
	}
 else {

	echo "File empty 304";
}

 
$date8 = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
$fileContents = file_get_contents('http://146.20.65.208/www.indexcalculation.com/proprietary/icai2/printsingleindex.php?PATH=MARKETCAPNTR/ca-output/Indxx/Closing-INXTNT-'.$date8.'.txt'); 
   $a = explode("\n", $fileContents);
   $res = explode(",", $fileContents);
	if (!empty($a)) {
		echo $index = 305;
		$b = explode(",", $a[0]);
		$c = explode(",", $a[1]);
		$index_value = $c[1];
		$date = $b[1];
	if (check('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8))))) {
			insert("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8)), 'value' => $index_value));
			echo "inserted305<br>";
		} else {
			update("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8)), 'value' => $index_value));
			echo "updated305<br>";
		}
		if(count($res)>1){
		mysqli_query($bd,"DELETE FROM indxx_top_5_constituents WHERE indxx_id=".$index);
        mysqli_query($bd,"DELETE FROM tbl_constituents WHERE indxx_id=".$index);
    }
$isin=23;
$weight= 28;
 for ($i = 22; $i < count($res); $i = $i + 12) {
        insert("indxx_top_5_constituents", array('indxx_id' => $index, 'constituent' => $res[$i], 'ISIN' => $res[$isin], 'weight' => $res[$weight]));
		insert("tbl_constituents", array('indxx_id' => $index, 'name' => $res[$i], 'isin' => $res[$isin], 'weight' => $res[$weight]));
		$isin = $isin + 12;
		$weight = $weight + 12;
	} 
	}
 else {

	echo "File empty 305";
}        




$date8 = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
if (is_readable('ftp://Brian:Indxx@$$Bri@104.130.29.48/Closing-MLMUNQNT-' . $date8 . '.txt')) {
$data8 = file_get_contents('ftp://Brian:Indxx@$$Bri@104.130.29.48/Closing-MLMUNQNT-' . $date8 . '.txt');

if (!empty($data8)) {
	$a = explode("\n", $data8);
	if (!empty($a)) {
		echo $index = 250;
		$b = explode(",", $a[0]);
		$c = explode(",", $a[1]);
		$index_value = $c[1];
		$date = $b[1];

		if (check('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8))))) {
			insert("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8)), 'value' => $index_value));
			echo "inserted250<br>";
		} else {
			update("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date8)), 'value' => $index_value));
			echo "updated250<br>";
		}

//		echo $index . "<br>" . $index_value . "<br>" . $date;
	}} else {

	echo "File empty 250";
}
}
else
{
		echo "File Not Readble 250";
}


$date = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
$data = file_get_contents('http://146.20.65.208/www.indexcalculation.com/proprietary/icai2/printsingleindex.php?PATH=PROPRIETARY/ca-output/Epic_Funds/Closing-TLLCGI-' . $date . '.txt');

if(!empty($data)) {
	$res = explode(",", $data);
	//print_r($res);die;
	$isin = 23;
	$weight = 28;
	echo $index = 288;

	if (check('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date))))) {
		insert("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date)), 'value' => $res[1]));
		echo "inserted 288<br>";
	} else {
		updatenew('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date))), array('value' => number_format($res[1], 2, '.', '')));
		echo "updated 288<br>";
	}
	// mysqli_query($bd,"DELETE FROM indxx_top_5_constituents WHERE indxx_id=".$index);
        // mysqli_query($bd,"DELETE FROM tbl_constituents WHERE indxx_id=".$index);

	/* for ($i = 22; $i < count($res); $i = $i + 12) {
        insert("indxx_top_5_constituents", array('indxx_id' => $index, 'constituent' => $res[$i], 'ISIN' => $res[$isin], 'weight' => $res[$weight]));
		insert("tbl_constituents", array('indxx_id' => $index, 'name' => $res[$i], 'isin' => $res[$isin], 'weight' => $res[$weight]));
		$isin = $isin + 12;
		$weight = $weight + 12;
	} */

} else {
	echo "empty data 287<br>";
}


$date = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
$data = file_get_contents('http://146.20.65.208/www.indexcalculation.com/proprietary/icai2/printsingleindex.php?PATH=PROPRIETARY/ca-output/Aster/Closing-AABI-' . $date . '.txt');

if(!empty($data)) {
	$res = explode(",", $data);
	//print_r($res);die; 
	$isin = 23;
	$weight = 28; 
	echo $index = 270;

	if (check('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date))))) {
		insert("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date)), 'value' => $res[3]));
		echo "inserted 270<br>";
	} else {
		updatenew('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date))), array('value' => number_format($res[3], 2, '.', '')));
		echo "updated 270<br>";
	}
	/*mysqli_query($bd,"DELETE FROM indxx_top_5_constituents WHERE indxx_id=".$index);
        mysqli_query($bd,"DELETE FROM tbl_constituents WHERE indxx_id=".$index);

	 for ($i = 22; $i < count($res); $i = $i + 12) {
        insert("indxx_top_5_constituents", array('indxx_id' => $index, 'constituent' => $res[$i], 'ISIN' => $res[$isin], 'weight' => $res[$weight]));
		insert("tbl_constituents", array('indxx_id' => $index, 'name' => $res[$i], 'isin' => $res[$isin], 'weight' => $res[$weight]));
		$isin = $isin + 12;
		$weight = $weight + 12;
	} */

} else {
	echo "empty data 270<br>";
}


$date = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
$data = file_get_contents('http://146.20.65.208/www.indexcalculation.com/proprietary/icai2/printsingleindex.php?PATH=PROPRIETARY/ca-output/Aster/Closing-ASTRBI-' . $date . '.txt');

if(!empty($data)) {
	$res = explode(",", $data);
	//print_r($res);die; 
	$isin = 23;
	$weight = 28; 
	echo $index = 284;

	if (check('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date))))) {
		insert("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date)), 'value' => $res[3]));
		echo "inserted 284<br>";
	} else {
		updatenew('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date))), array('value' => number_format($res[3], 2, '.', '')));
		echo "updated 284<br>";
	}
	/*mysqli_query($bd,"DELETE FROM indxx_top_5_constituents WHERE indxx_id=".$index);
        mysqli_query($bd,"DELETE FROM tbl_constituents WHERE indxx_id=".$index);

	 for ($i = 22; $i < count($res); $i = $i + 12) {
        insert("indxx_top_5_constituents", array('indxx_id' => $index, 'constituent' => $res[$i], 'ISIN' => $res[$isin], 'weight' => $res[$weight]));
		insert("tbl_constituents", array('indxx_id' => $index, 'name' => $res[$i], 'isin' => $res[$isin], 'weight' => $res[$weight]));
		$isin = $isin + 12;
		$weight = $weight + 12;
	} */

} else {
	echo "empty data 284<br>";
}



$date = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
$data = file_get_contents('http://146.20.65.208/www.indexcalculation.com/marketcap/icai2/index500Ticker.php?date=' . $date);

if (!empty($data)) {
	$res = explode(",", $data);
	$isin = 23;
	$weight = 28;
	$index = 237;
	if (check('indxx_values', array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date))))) {
		insert("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date)), 'value' => $res[3]));
		echo "inserted237<br>";
	} else {
		update("indxx_values", array('indxx' => $index, 'date' => date("Y-m-d H:i:s", strtotime($date)), 'value' => $res[3]));
		echo "updated237<br>";
	}
        mysqli_query($bd,"DELETE FROM indxx_top_5_constituents WHERE indxx_id=237");
	mysqli_query($bd,"DELETE FROM tbl_constituents WHERE indxx_id=237");

	for ($i = 22; $i < count($res); $i = $i + 12) {
                insert("indxx_top_5_constituents", array('indxx_id' => 237, 'constituent' => $res[$i], 'isin' => $res[$isin], 'weight' => $res[$weight]));
		insert("tbl_constituents", array('indxx_id' => 237, 'name' => $res[$i], 'isin' => $res[$isin], 'weight' => $res[$weight]));
		$isin = $isin + 12;
		$weight = $weight + 12;
	}

} else {
	echo "empty data";
}

$date = date('Y-m-d');
$str = '';
$data = file_get_contents('http://146.20.65.208/www.indexcalculation.com/marketcap/icai2/readIndex500TR.php');

$str = $data;

$dateVar = date("Y-m-d", strtotime(date('Y-m-d')) - 86400);
$dateAdded = date('Y-m-d');
if ($str) {
         mysqli_query($bd,"DELETE FROM indxx_values WHERE indxx=237 and date='".$dateVar."'");
         mysqli_query($bd,"DELETE FROM tbl_benchmark_index_value_b WHERE benchmark_id=17 and date='".$dateVar."'");
        
	mysqli_query($bd, 'INSERT INTO indxx_values (indxx, date, value) VALUES (237, "' . $dateVar . '", "' . $str . '")');
	mysqli_query($bd, 'INSERT INTO tbl_benchmark_index_value_b (benchmark_id, date, value) VALUES (17, "' . $dateVar . '", "' . $str . '")');
	echo "17 inserted <br>";
	$str = '';
} else {

	echo "17 not inserted<br>";
}

$str = '';
$data = file_get_contents('http://146.20.65.208/www.indexcalculation.com/marketcap/icai2/readIndxx500.php');

$str = $data;

$dateVar = date("Y-m-d", strtotime(date('Y-m-d')) - 86400);

if ($str) {
      mysqli_query($bd,"DELETE FROM indxx_values WHERE indxx=236 and date='".$dateVar."'");
      mysqli_query($bd,"DELETE FROM tbl_benchmark_index_value_b WHERE benchmark_id=19 and date='".$dateVar."'");
	  
	mysqli_query($bd, 'INSERT INTO indxx_values (indxx, date, value) VALUES (236, "' . $dateVar . '", "' . $str . '")');
	mysqli_query($bd, 'INSERT INTO tbl_benchmark_index_value_b (benchmark_id, date, value) VALUES (19, "' . $dateVar . '", "' . $str . '")');
	echo "236 & 19 inserted<br>";
	$str = '';
} else {
	echo "236 & 19 not inserted<br>";

}



?>


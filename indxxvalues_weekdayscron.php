<?php
date_default_timezone_set('Asia/Kolkata');
define('EXCEL_READER_PATH', 'excel_reader/');

require_once EXCEL_READER_PATH . 'function.php';


//$datedata= date($data->dateFormat, strtotime(date('Y-m-d')) - 86400);
 //echo $datedata = date('Y-m-d', strtotime(date('Y-m-d')) - 86400);
//$datedata='2018-07-17';
require_once EXCEL_READER_PATH . 'excel_reader.php';
/*
$sql="SELECT * FROM indxx ";
$result = mysqli_query($bd,$sql);

 while ($data= mysqli_fetch_object($result)) {
//    echo  $data->indxx_id.'<br>';
   
    $res= getrow('tbl_benchmark', array('id'=>$data->benchmark_id));
 
   echo $data->benchmark_id.' '.$res['name'].'<br>';
   if($res['name']!='')
      updatenew('index_description', array('indxx_id' => $data->id, ), array('benchmark' => $res['name']));
 }


if (date("D") !== "Sun" && date("D") !== "Mon") {
    $date = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
    
}


$sql = "SELECT * FROM tab_name ";
$result = mysqli_query($bd, $sql) or die("er1" . mysqli_error($bd));
if (!empty($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $tabname[] = $row['name'];
    }
}
*/
$sql    = 'select * from cron_file_details where is_active=1 and AccessType= "Externalftp"';
$result = mysqli_query($bd, $sql);

if ($result) {
    while ($data = mysqli_fetch_object($result)) {
       //$data->dateFormat= '2020-04-24';
       
        $datedata = date($data->dateFormat, strtotime(date($data->dateFormat)) - 86400);
       
        $eread    = new ExcelReader();
        $ftp      = $data->host_url . $datedata . ".xls";
        if (is_readable($ftp)) {
            $eread->read($ftp);
            $filedata = $eread->getData();
            
            $param    = $data->param;
            $paramarr = explode(',', $param);
            $value    = $filedata[$paramarr[0]][$paramarr[1]];
            
            if ($value && $value != '0.00') {
                if (check('indxx_values', array(
                    'indxx' => $data->indxx,
                    'date' => date("Y-m-d H:i:s", strtotime($datedata))
                ))) {
                    insert('indxx_values', array(
                        'indxx' => $data->indxx,
                        'date' => date("Y-m-d H:i:s", strtotime($datedata)),
                        'value' => $value
                    ));
                    echo "inserted index value of : ".$data->indxx."<br/>";
                } else {
                    updatenew('indxx_values', array(
                        'indxx' => $data->indxx,
                        'date' => date("Y-m-d H:i:s", strtotime($datedata))
                    ), array(
                        'value' => $value
                    ));
                    echo "updated  index value of :".$data->indxx."<br/>";
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
            echo 'ftp not readable'.$data->indxx."<br/>";
        }
    }
    
}


/*
$date = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
//$date = "2020-04-24";
if (is_readable('ftp://Syntax:Indxx@$$Syn@104.130.29.48/marketcap-compositclosing-' . $date . '.txt')) {
    $str = file_get_contents('ftp://Syntax:Indxx@$$Syn@104.130.29.48/marketcap-compositclosing-' . $date . '.txt');
    
    
    if (!empty($str)) {
        $a = explode("\n", $str);
        
        if (!empty($a)) {
            foreach ($a as $key => $b) {
                
                if ($key > 1) {
                    $indxx = explode(',', $b);
                    
                    if ($indxx[1] && $indxx['3']) {
                        $query = mysqli_query($bd, "Select id from indxx where code='" . $indxx[1] . "' ");
                        if (mysqli_num_rows($query) > 0) {
                            $row = mysqli_fetch_assoc($query);
                            if ($row['id']) {
                                if ($indxx[3] && $indxx[3] != '0.00') {
                                    if (check('indxx_values', array(
                                        'indxx' => $row['id'],
                                        'date' => date("Y-m-d H:i:s", strtotime($date))
                                    ))) {
                                        insert('indxx_values', array(
                                            'indxx' => $row['id'],
                                            'date' => date("Y-m-d H:i:s", strtotime($date)),
                                            'value' => $indxx[3]
                                        ));
                                        echo $row['id'];
                                        echo "inserted<br>";
                                    } else {
                                        updatenew('indxx_values', array(
                                            'indxx' => $row['id'],
                                            'date' => date("Y-m-d H:i:s", strtotime($date))
                                        ), array(
                                            'value' => $indxx[3]
                                        ));
                                        echo $row['id'];
                                        echo "updated<br>";
                                    }
                                    
                                }
                                
                            }
                        }
                        
                    }
                }
            }
        }
        //    mail("dbajpai@indxx.com,pavank@indxx.com","Syntax Marketcap File Inserted "," Live Server : Syntax composite closing updated of date ".$date." - current time : .".date("Y-m-d : h:i:s") );
    } 
    
} else {
    echo 'File not Readable';
}
if (date("D") !== "Sun" && date("D") !== "Mon") {
    $date = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
   // $date="2020-04-24";
    //$homepage2 = file_get_contents('ftp://indxx:FTP$2015@192.169.255.12:22/testing/proprietary/files/ca-output/syntax/compositclosing-'.$date.'.txt');
    if (is_readable('ftp://Syntax:Indxx@$$Syn@104.130.29.48/marketcap-compositclosing-' . $date . '.txt')) {
        $homepage2 = file_get_contents('ftp://syntax:Indxx@$$Syn@104.130.29.48/proprietary-compositclosing-' . $date . '.txt');
        if (!empty($homepage2)) {
            
            $a = explode("\n", $homepage2);
            // print_r($a);
            // exit;
            if (!empty($a)) {
                foreach ($a as $key => $b) {
                    
                    if ($key > 1) {
                        $indxx = explode(',', $b);
                        
                        if ($indxx[1] && $indxx['3']) {
                            $query = mysqli_query($bd, "Select id from indxx where code='" . $indxx[1] . "' ");
                            if (mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query);
                                if ($row['id']) {
                                    
                                    if ($indxx[3] && $indxx[3] != '0.00') {
                                        if (check('indxx_values', array(
                                            'indxx' => $row['id'],
                                            'date' => date("Y-m-d H:i:s", strtotime($date))
                                        ))) {
                                            insert('indxx_values', array(
                                                'indxx' => $row['id'],
                                                'date' => date("Y-m-d H:i:s", strtotime($date)),
                                                'value' => number_format($indxx[3], 2, '.', '')
                                            ));
                                            echo "inserted<br>";
                                            echo $row['id'];
                                        } else {
                                            updatenew('indxx_values', array(
                                                'indxx' => $row['id'],
                                                'date' => date("Y-m-d H:i:s", strtotime($date))
                                            ), array(
                                                'value' => number_format($indxx[3], 2, '.', '')
                                            ));
                                            echo "updated<br>";
                                            echo $row['id'];
                                        }
                                        
                                    }
                                    
                                }
                            }
                            
                        }
                    }
                }
            }
            
            
            mail("pavank@indxx.com", "Syntax Proprietary Update", "Lie Server : Syntax Index values updated successfully on New rackspace server 166!!!");
        } else {
            mail("pavank@indxx.com", "Syntax Proprietary File not available", "Live server: Syntax Index values not updated on New rackspace server 166!!!!");
        }
        
    } else {
        echo 'ftp not readable';
    }
}
*/

//file read by filecontent 

$sql    = 'select * from cron_file_details where is_active=1  and AccessType="localfile"';
$result = mysqli_query($bd, $sql);
if ($result) {
    while ($data = mysqli_fetch_object($result)) {
        echo $data->indxx;
        //$data->dateFormat ="2020-04-24";
        $date  = date($data->dateFormat, (strtotime(date($data->dateFormat)) - 86400));
        $dataf = file_get_contents($data->host_url . $date . $data->file_name);
       
        
        // if ($data->indxx == '44') {
        //     $datal          = explode("\n", $dataf);
        //     $indexValueData = explode(",", $datal['1']);
        //     $indexvalue     = number_format($indexValueData['3'], 2, '.', '');
        //     $dateData       = date("Y-m-d", strtotime($indexValueData['0']));
        // }
        if ($data->indxx == '60' || $data->indxx == '61' || $data->indxx == '40') {
            $date_data2       = explode('Date,', $dataf);
            $indexvalue_data2 = explode('Index Value,', $dataf);
            $dateData         = substr($date_data2['1'], 0, 10);
            $indexvaluedata2  = substr($indexvalue_data2['1'], 0, 9);
            $indexvalue       = rtrim($indexvaluedata2, ", \t\n");
        }
        if ($data->indxx == '21') {
            $intspoindexvalue     = explode('Horizon International SPO Index,', $dataf);
            $intspoindexvaluedata = explode(',', $intspoindexvalue['1']);
            $intspoindexvalue     = $intspoindexvaluedata['2'];
            
            $spoindexvalue     = explode('Spin Off Index,', $dataf);
            $spoindexvaluedata = explode(',', $spoindexvalue['1']);
           $indexvalue        = $spoindexvaluedata['2'];
            
            $date_data2       = explode('Date,', $dataf);
            $dateData = substr($date_data2['1'], 0, 10);
            
        }
        if($data->indxx == '44')
        {
          $intspoindexvalue     = explode('Horizon Kinetics Global Spin-off Index,', $dataf);
            $intspoindexvaluedata = explode(',', $intspoindexvalue['1']);
            $indexvalue     = $intspoindexvaluedata['2'];
            $date_data2       = explode('Date,', $dataf);
            $dateData = substr($date_data2['1'], 0, 10);
            
              
        }
        if($data->indxx == '42')
        {
            $date_data2  = explode('Date,', $dataf);
            $dateData = substr($date_data2['1'], 0, 10);
            $date_data2  = explode('Date,', $date_data2 [1]);
            $indexvalue_data = explode('Index Value,',$date_data2[0]);
            $indexvalue_data2 = explode(',',$indexvalue_data[1]);
            $indexvalue=$indexvalue_data2[0];
        }
        if ($indexvalue && $indexvalue != '0.00') {
            if (check('indxx_values', array(
                'indxx' => $data->indxx,
                'date' => date("Y-m-d H:i:s", strtotime($dateData))
            ))) {
                insert('indxx_values', array(
                    'indxx' => $data->indxx,
                    'date' => date("Y-m-d H:i:s", strtotime($dateData)),
                    'value' => $indexvalue
                ));
                echo "inserted<br>";
            } else {
                updatenew('indxx_values', array(
                    'indxx' => $data->indxx,
                    'date' => date("Y-m-d H:i:s", strtotime($dateData))
                ), array(
                    'value' => $indexvalue
                ));
                echo "updated<br>";
            }
        }
    }
}
mail('pavank@indxx.com, pavank@gmail.com', 'From Godaddy - gspo_treuters.php', 'This file has been executed at ' . date("Y-m-d H:i:s"), 'From: kunal@indxx.in');


?>

<?php


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

  var ar1 = <?php
//echo json_encode($tabname);
?>;

var time = 0;

var interval = setInterval(function() { 
   if (time < ar1.length) { 
      var tab= ar1[time]; 
    loadpercent(tab);
      time++;
   }
   else { 
      clearInterval(interval);
   }
}, 18000);
    
function loadpercent(ind) {

var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(data) {
   
    if (this.readyState == 4 && this.status == 200) 
    {
    console.log(this.responseText);
    }
   if(this.readyState == 4 && this.status != 200)
   {

    xhttp.open("GET", "https://www.indxx.com/testpercentagehigh.php?tab="+ind, true);     
    xhttp.send(); 
   }
  };

  xhttp.open("GET", "https://www.indxx.com/testpercentagehigh.php?tab="+ind, true);
  xhttp.send();
}
</script>
<?php

if (date("D") !== "Sun" && date("D") !== "Mon") {
    $date = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
   //$date="2020-04-24";
    //$homepage2 = file_get_contents('ftp://indxx:FTP$2015@192.169.255.12:22/testing/proprietary/files/ca-output/syntax/compositclosing-'.$date.'.txt');
    if (is_readable('ftp://Aster:Indxx$as123@146.20.65.208/Closing-AABI-' . $date . '.txt')) {
        $homepage2 = file_get_contents('ftp://Aster:Indxx$as123@146.20.65.208/Closing-AABI-' . $date . '.txt');
        if (!empty($homepage2)) {
            
            $a = explode("\n", $homepage2);
            // print_r($a);
            // exit;
            if (!empty($a)) {
                foreach ($a as $key => $b) {
                    
                    if ($key > 1) {
                        $indxx = explode(',', $b);
                        
                        if ($indxx[1] && $indxx['3']) {
                            $query = mysqli_query($bd, "Select id from indxx where code='" . $indxx[1] . "' ");
                            if (mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query);
                                if ($row['id']) {
                                    
                                    if ($indxx[3] && $indxx[3] != '0.00') {
                                        if (check('indxx_values', array(
                                            'indxx' => $row['id'],
                                            'date' => date("Y-m-d H:i:s", strtotime($date))
                                        ))) {
                                            insert('indxx_values', array(
                                                'indxx' => $row['id'],
                                                'date' => date("Y-m-d H:i:s", strtotime($date)),
                                                'value' => number_format($indxx[3], 2, '.', '')
                                            ));
                                            echo "inserted<br>";
                                            echo $row['id'];
                                        } else {
                                            updatenew('indxx_values', array(
                                                'indxx' => $row['id'],
                                                'date' => date("Y-m-d H:i:s", strtotime($date))
                                            ), array(
                                                'value' => number_format($indxx[3], 2, '.', '')
                                            ));
                                            echo "updated<br>";
                                            echo $row['id'];
                                        }
                                        
                                    }
                                    
                                }
                            }
                            
                        }
                    }
                }
            }
            
            
            mail("pavank@indxx.com", "Syntax Proprietary Update", "Lie Server : Aster Index values updated successfully on New rackspace server !!!");
        } else {
            mail("pavank@indxx.com", "Syntax Proprietary File not available", "Live server: Aster Index values not updated on New rackspace server !!!!");
        }
        
    } else {
        echo 'ftp not readable';
    }
}



if (date("D") !== "Sun" && date("D") !== "Mon") {
    $date = date('Y-m-d', (strtotime(date("Y-m-d")) - 86400));
     //$date="2020-04-24";
    //$homepage2 = file_get_contents('ftp://indxx:FTP$2015@192.169.255.12:22/testing/proprietary/files/ca-output/syntax/compositclosing-'.$date.'.txt');
    if (is_readable('ftp://epicfunds:w2RvPu~ht@146.20.65.208/Closing-TLLCGI-' . $date . '.txt')) {
        $homepage2 = file_get_contents('ftp://epicfunds:w2RvPu~ht@146.20.65.208/Closing-TLLCGI-' . $date . '.txt');
        if (!empty($homepage2)) {
            
            $a = explode("\n", $homepage2);
            // print_r($a);
            // exit;
            if (!empty($a)) {
                foreach ($a as $key => $b) {
                    
                    if ($key > 1) {
                        $indxx = explode(',', $b);
                        
                        if ($indxx[1] && $indxx['3']) {
                            $query = mysqli_query($bd, "Select id from indxx where code='" . $indxx[1] . "' ");
                            if (mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query);
                                if ($row['id']) {
                                    
                                    if ($indxx[3] && $indxx[3] != '0.00') {
                                        if (check('indxx_values', array(
                                            'indxx' => $row['id'],
                                            'date' => date("Y-m-d H:i:s", strtotime($date))
                                        ))) {
                                            insert('indxx_values', array(
                                                'indxx' => $row['id'],
                                                'date' => date("Y-m-d H:i:s", strtotime($date)),
                                                'value' => number_format($indxx[3], 2, '.', '')
                                            ));
                                            echo "inserted<br>";
                                            echo $row['id'];
                                        } else {
                                            updatenew('indxx_values', array(
                                                'indxx' => $row['id'],
                                                'date' => date("Y-m-d H:i:s", strtotime($date))
                                            ), array(
                                                'value' => number_format($indxx[3], 2, '.', '')
                                            ));
                                            echo "updated<br>";
                                            echo $row['id'];
                                        }
                                        
                                    }
                                    
                                }
                            }
                            
                        }
                    }
                }
            }
            
            
            mail("pavank@indxx.com", "epicfunds Proprietary Update", "Lie Server : Aster Index values updated successfully on New rackspace server !!!");
        } else {
            mail("pavank@indxx.com", "epicfunds Proprietary File not available", "Live server: Aster Index values not updated on New rackspace server !!!!");
        }
        
    } else {
        echo 'ftp not readable';
    }
}


/*
UPDATE indxx_charecterstics SET no_of_constituents = (SELECT COUNT(id) FROM indxx_top_5_constituents WHERE indxx_top_5_constituents.indxx_id = indxx_charecterstics.indxx_id GROUP BY indxx_id)
*/

?>
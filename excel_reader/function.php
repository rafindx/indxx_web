<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dbconfig.php");
function check($table_name,$data)
{
    global $bd;
	if(!empty($data))
	{
		$query="SELECT * FROM $table_name where ";
	foreach($data as $key=>$value)
	{
	$query.=" ".$key."='".mysqli_real_escape_string($bd,$value)."' AND ";
	}
	
	 $query=  substr($query, 0, strlen($query)-4); 
	// echo $query;

$res=mysqli_query($bd,$query);
if(mysqli_num_rows($res)>0)
{
return false;
}else{
return true;
}

	}
	
}
function getrow($table_name,$data)
{
global $bd;	
    if(!empty($data))
	{
		$query="SELECT * FROM $table_name where ";
	foreach($data as $key=>$value)
	{
	$query.=" ".$key."='".mysqli_real_escape_string($bd,$value)."' AND ";
	}
	
	 $query=  substr($query, 0, strlen($query)-4); 
	// echo $query;
    
$res=mysqli_query($bd,$query);
if(mysqli_num_rows($res)>0)
{
$row=mysqli_fetch_assoc($res);
return $row;
}else{

}

	}
	
}


		function checkcamergent($ticker,$securitysedol,$date,$amount){
                    global $bd;
	 $sql =  'SELECT *  from corporate_actions where securityticker="'.$ticker.'" and securitysedol="'.$securitysedol.'" and effectivedate="'.$date.'" and amount="'.$amount.'"';
	//$sql .=  ' order by name asc ';
	$get_options = mysqli_query($bd,$sql);
	//$this->pr($get_options,true);
	if (mysqli_num_rows($get_options) > 0) {
	return false;
	}
		}
	
	
		function getIndxxnumbers($isin){
                    global $bd;
	  $sql =  'SELECT indxx from tbl_ticker_isin where isin="'.$isin.'" OR ticker="'.$isin.'"';
	//exit;
	//$sql .=  ' order by name asc ';
	$get_options = mysqli_query($bd, $sql );
	//$this->pr($get_options,true);
	if(mysqli_num_rows($get_options)>0)
	{
		$row=mysqli_fetch_assoc($get_options);
		}
	//print_r($row);
	//exit;
	return $row['indxx'];
	
	}
	

function get($table_name,$data='')
{
global $bd;	
    if(!empty($data))
	{
		$query="SELECT * FROM $table_name where ";
	foreach($data as $key=>$value)
	{
	$query.=" ".$key."='".mysqli_real_escape_string($bd,$value)."' AND ";
	}
	
	 $query=  substr($query, 0, strlen($query)-4); 
	 echo $query;

$res=mysqli_query($bd,$query);
if(mysqli_num_rows($res)>0)
{
$row=mysqli_fetch_assoc($res);
return $row['id'];
}else{

}

	}
	
}

function insert($table_name,$data)		// insert function
{
    global $bd;
    if(!empty($data))
    {
		//print_r($data);
		//exit;
       $query="INSERT into $table_name set ";
       foreach ($data as $key => $value) {
           $query.=" ".$key."='".mysqli_real_escape_string($bd,$value)."',";
       }
      $query=  substr($query, 0, strlen($query)-1); 
 // echo "<br>"; 
  $reslut= mysqli_query($bd,$query) ; 
 
  //print $reslut;
   return mysqli_insert_id($bd);   
  }
}


function insert_constituent($table_name,$data)		// insert function
{
  global $bd;
    if(!empty($data))
    {
		//print_r($data);
		//exit;
       $query="INSERT into $table_name set ";
       foreach ($data as $key => $value) {
		if($key=='weight')
		$value=$value."%";
		
           $query.=" ".$key."='".mysqli_real_escape_string($bd,$value)."',";
       }
       $query=  substr($query, 0, strlen($query)-1); 
	  
 // echo "<br>"; 
  mysqli_query($bd,$query) ; 
   return mysqli_insert_id();   
    }
}

function update($table_name,$data)		// update function 
{
    global $bd;
    if(!empty($data))
    {
       $query="update $table_name set ";
       foreach ($data as $key => $value) {
           $query.=" ".$key."='".$value."',";
       }
   $query=  substr($query, 0, strlen($query)-1); 
   $query.= " where id='".$data['id']."'";
  
  //echo $query;
   mysqli_query($bd,$query); 
   
    }
}


function updatenew($table_name,$where,$data)		// update function 
{
global $bd;	

	
    if(!empty($data))
    {
       $query="update $table_name set ";
       foreach ($data as $key => $value) {
           $query.=" ".$key."='".$value."',";
       }
   $query=  substr($query, 0, strlen($query)-1); 
   
   	$query.= " where ";
   
   foreach($where as $key2=>$value2)
   {
   $query.=$key2."='".$value2."' and ";
   }
  $query=  substr($query, 0, strlen($query)-4); 
  
  	mysqli_query($bd,$query); 
   
    }
    return $query;
}

function getbox_listnew($indxx)
{
global $bd;
	$name='';
	$code='';
	 $query="SELECT id,name,code from indxx where id='$indxx' limit 1";
	$res=mysqli_query($bd,$query);
	if($res && mysqli_num_rows($res)>0)
	{
	$row=mysqli_fetch_array($res);
	}
	$name= $row['name'];
	$code= $row['code'];
	$id=$row['id'];
	$name=str_replace("INDXX","",$name);
	$name=str_replace("Index","",$name);
	$link="#";
	$str='<tr>
		<td align="left" style="font-family:Arial;">
            <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;">
           <tr style="background-color: #FFFFFF; border-left-color:#f6f9fd;border-right-color:#f6f9fd;
            border-top-color:#f6f9fd;border-bottom-color:#f6f9fd">
                <td style="width: 155px; height: 15px; background-color: white;padding-left:2px;padding-right:4px;" >
                    
                    
                    <a id="GVScrip_ctl00_iname" class="nav" href="'.$link.'" target="_parent">'.$name.'</a>
                </td>
                <td style="background-color: #f6f9fd;text-align:left;text-indent:0pt;width:125px;" >
                    <table style="height: 10px" cellspacing="0" cellpadding="0" border="0" >
                        <tr style="background-color: White;">
                            <td style="width: 45px; height: 10px; text-align:left;padding-left:2px">
                               
                                <span id="GVScrip_ctl00_lblcode" class="lblLabel" style="display:inline-block;color:Black;background-color:White;font-family:Helvetica;font-size:8.2pt;width:45px;">'.$code.'</span>
                            </td>
                            <td style="width: 35px; height: 10px;  font-family: Arial;text-align:left;padding-right:6px; ">
                                <span id="GVScrip_ctl00_lblcurr" class="lblLabel" style="display:inline-block;color:DarkBlue;background-color:White;font-family:Helvetica;font-size:8.2pt;width:35px;">'.getLatestPricenew($indxx).'</span>
                            </td>
                            '.comparePreviousValuesnew($indxx).'
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr >
                <td colspan="5" style=" height:10px;background-color: #f6f9fd;border-left-color:#f6f9fd;
                    border-right-color:#f6f9fd;border-top-color:#f6f9fd;border-bottom-color:#f6f9fd; " >
                </td>
            </tr>
             </table> 
        </td>
	</tr>';
	return $str;

}

function getbox_list($indxx)
{
global $bd;	
    $name='';
	$code='';
	 $query="SELECT id,name,code from indxx where id='$indxx' limit 1";
	$res=mysqli_query($bd,$query);
	if($res && mysqli_num_rows($res)>0)
	{
	$row=mysqli_fetch_array($res);
	}
	$name= $row['name'];
	$code= $row['code'];
	$id=$row['id'];
	$name=str_replace("INDXX","",$name);
	$name=str_replace("Index","",$name);
	if($indxx==13)
$name='EM Dom. Demand';
elseif($indxx==12)
{$name='Low Vol EM Div TR';
$code='IHILOT';
}elseif($indxx==17)
$name='SuperDiv<sup>TM</sup> U.S. Low Vol';
elseif($indxx==21)
$name='Horizon Kinetics Spin-Off';
elseif($indxx==22)
$name='US Long/Short High Div';
	//echo $name;
	
	$link='';


if($id=='15')
{
$link='http://www.indxx.com/indices-emerging-beyond-brics.html';
}	
if($id=='5')
{
$link='http://www.indxx.com/indices-infrastructure-brazil.html';
}	
if($id=='3')
{
$link='http://www.indxx.com/indices-infrastructure-china.html';
}
if($id=='13')
{
$link='http://www.indxx.com/indices-emerging-domestic-demand.html';
}		
if($id=='9')
{
$link='http://www.indxx.com/indices-india-consumer.html';
}		
if($id=='1')
{
$link='http://www.indxx.com/indices-infrastructure-india.html';
}	
if($id=='7')
{
$link='http://www.indxx.com/indices-india-small-cap.html';
}
if($id=='12')
{
$link='http://www.indxx.com/indices-low-volatility-emerging-market-dividend.html';
}	
if($id=='17')
{
$link='http://www.indxx.com/indices_div.html';
}if($id=='21')
{
$link='http://www.indxx.com/indices_spo.html';
}
if($id=='22')
{
$link='http://www.indxx.com/indices_longshort.html';
}
	$str='<tr>
		<td align="left" style="font-family:Arial;">
            <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;">
           <tr style="background-color: #FFFFFF; border-left-color:#f6f9fd;border-right-color:#f6f9fd;
            border-top-color:#f6f9fd;border-bottom-color:#f6f9fd">
                <td style="width: 155px; height: 15px; background-color: white;padding-left:2px;padding-right:4px;" >
                    
                    
                    <a id="GVScrip_ctl00_iname" class="nav" href="'.$link.'" target="_parent">'.$name.'</a>
                </td>
                <td style="background-color: #f6f9fd;text-align:left;text-indent:0pt;width:125px;" >
                    <table style="height: 10px" cellspacing="0" cellpadding="0" border="0" >
                        <tr style="background-color: White;">
                            <td style="width: 45px; height: 10px; text-align:left;padding-left:2px">
                               
                                <span id="GVScrip_ctl00_lblcode" class="lblLabel" style="display:inline-block;color:Black;background-color:White;font-family:Helvetica;font-size:8.2pt;width:45px;">'.$code.'</span>
                            </td>
                            <td style="width: 35px; height: 10px;  font-family: Arial;text-align:left;padding-right:6px; ">
                                <span id="GVScrip_ctl00_lblcurr" class="lblLabel" style="display:inline-block;color:DarkBlue;background-color:White;font-family:Helvetica;font-size:8.2pt;width:35px;">'.getLatestPrice($indxx).'</span>
                            </td>
                            '.comparePreviousValues($indxx).'
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr >
                <td colspan="5" style=" height:10px;background-color: #f6f9fd;border-left-color:#f6f9fd;
                    border-right-color:#f6f9fd;border-top-color:#f6f9fd;border-bottom-color:#f6f9fd; " >
                </td>
            </tr>
             </table> 
        </td>
	</tr>';
	return $str;

}

function getLatestPrice($indxx)
{
	global $bd;
    $query="SELECT value from indxx_values where indxx='$indxx' order by date desc limit 1";
	 $res=mysqli_query($bd,$query);
	 if($res && mysqli_num_rows($res)>0)
	 {
	$row=mysqli_fetch_assoc($res);
	if(!empty($row))
	return number_format($row['value'],2);
	}
}


function getLatestPricenew($indxx)
{
	global $bd;
    $query="SELECT value from tbl_spinoffindxx_values  order by dateTime desc limit 1";
	 $res=mysqli_query($bd,$query);
	 if($res && mysqli_num_rows($res)>0)
	 {
	$row=mysqli_fetch_assoc($res);
	if(!empty($row))
	return number_format ($row['value'],2);
	}
}


function comparePreviousValuesnew($indxx)
{
	global $bd;
	$new_value=0;
	$old_value=0;
	$dif=0;
	$img='';
	$color='';
	 $query="SELECT value from tbl_spinoffindxx_values  order by dateTime desc limit 0,2";
	 $res=mysqli_query($bd,$query);
	 if($res && mysqli_num_rows($res)>0)
	 {$i=0;
		 while($row=mysqli_fetch_assoc($res))
		 {
			// print_r($row);
			if($i==0)
			{
			$new_value=$row['value'];
			$i++;
			}else{
				$old_value=$row['value'];
			}
		 }
	 }
	
	if($new_value>=$old_value)
	{
	$dif=number_format(($new_value-$old_value),2);
	$img='quotes_up.gif';
	$color='008000';
	}else{
	$dif="".number_format(($new_value-$old_value),2);
	$img='quotes_down.gif';
	$color='FC0003';
	}
	
$str='<td style="width: 10px; height: 10px; font-size: 8.2pt; font-family: Arial;text-align:center;">                               
                                <img id="GVScrip_ctl00_ImageArrow" src="http://www.processdo.com/ftp/files/'.$img.'" style="background-color:White;border-width:0px;" />
                            </td>
                            <td style="width: 35px; height: 10px;  font-family: Arial;text-align:right;padding-left:3px;">
                                <span id="GVScrip_ctl00_lbldiff" class="lblLabel" style="display:inline-block;color:#'.$color.';background-color:White;font-family:Helvetica;font-size:8.2pt;font-weight:bold;width:35px;">'.$dif.'</span>
                            </td>';
return $str;							
}
function comparePreviousValues($indxx)
{
	global $bd;
	$new_value=0;
	$old_value=0;
	$dif=0;
	$img='';
	$color='';
	 $query="SELECT value from indxx_values where indxx='$indxx' order by date desc limit 0,2";
	 $res=mysqli_query($bd,$query);
	 if($res && mysqli_num_rows($res)>0)
	 {$i=0;
		 while($row=mysqli_fetch_assoc($res))
		 {
			// print_r($row);
			if($i==0)
			{
			$new_value=$row['value'];
			$i++;
			}else{
				$old_value=$row['value'];
			}
		 }
	 }
	
	if($new_value>=$old_value)
	{
	$dif=number_format(($new_value-$old_value),2);
	$img='quotes_up.gif';
	$color='008000';
	}else{
	$dif="".number_format(($new_value-$old_value),2);
	$img='quotes_down.gif';
	$color='FC0003';
	}
	
$str='<td style="width: 10px; height: 10px; font-size: 8.2pt; font-family: Arial;text-align:center;">                               
                                <img id="GVScrip_ctl00_ImageArrow" src="files/'.$img.'" style="background-color:White;border-width:0px;" />
                            </td>
                            <td style="width: 35px; height: 10px;  font-family: Arial;text-align:right;padding-left:3px;">
                                <span id="GVScrip_ctl00_lbldiff" class="lblLabel" style="display:inline-block;color:#'.$color.';background-color:White;font-family:Helvetica;font-size:8.2pt;font-weight:bold;width:35px;">'.$dif.'</span>
                            </td>';
return $str;							
}
function readfileftp($path){
return file_get_contents ($path);
}

function backup_tables($tables = '*')
    {
   global $bd;
    //get all of the tables
    if($tables == '*') {
    $tables = array();
    $result = mysqli_query($bd,'SHOW TABLES');
    while($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
    }
    } else {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
    }	
    //cycle through
    foreach($tables as $table) {
    $result = mysqli_query($bd,'SELECT * FROM '.$table);
    $num_fields = mysqli_num_fields($result);	
    //$return.= 'DROP TABLE '.$table.';';
    $row2 = mysqli_fetch_row(mysqli_query($bd,'SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    for ($i = 0; $i < $num_fields; $i++) {
    while($row = mysqli_fetch_row($result)) {
    $return.= 'INSERT INTO '.$table.' VALUES(';
    for($j=0; $j<$num_fields; $j++) {
    $row[$j] = addslashes($row[$j]);
    $row[$j] = str_replace("\n","\\n",$row[$j]);
    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
    if ($j<($num_fields-1)) { $return.= ','; }
    }
    $return.= ");\n";
    }
    }
    $return.="\n\n\n";
    }

if($handle = fopen('../www.LIFESCIINDEX.COM/database/dbtickers-backup-'.date("Y-m-d H:i:s").'.sql','w+'))
{
	fwrite($handle,$return);
	fclose($handle);
	return 1;
}
else
{
	return 0;
}

    }
	
	
function Redirect($url)
{
	header("location:".$url);	
	exit;
		
}	
?>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Content extends CI_Model
{
	//Constructor Function
	function __construct()
	{
		parent::__construct();
		//LOAD THE EMAIL LIBRARY TO SEND EMAILS
		//$this->load->library('email'); 
		//$this->load->model(array('Commonmodel'));
	}
	
	//Function to get Table data
	function gettabledata($tablename,$fields,$fieldname=false,$fieldvalue=false,$wherecondition=false)
	{	
		
		if($fieldname!='' && $fieldvalue!='') {
			$getquery=$this->db->query("select $fields from ".$tablename." where ".$fieldname."='".$fieldvalue."' ".$wherecondition);			
		} else {
			$getquery=$this->db->query("select $fields from ".$tablename." ".$wherecondition);
		}
	
		return $getquery->result_array();
	}//End of function
	
	
	//Function for inserting row
	function insertRow($table, $data)
	{		
		$insert_row_res = $this->db->insert($table,$data);
		return $this->db->insert_id();
	}//End of the function
	
	
	//FUNCTION TO GET HomePage Indices
	function getIndicesBasedOnType($indxxType)
	{
	
		//Query to get data from index_description		
		$query = $this->db->query("select indxx_id AS INDEX_ID, indxx_name AS NAME, code AS CODE, NULL AS DATE, NULL AS VALUE, NULL AS OLD_VALUE, NULL AS pxchange, NULL AS pxpct from index_description WHERE index_type = '".$indxxType."' AND return_type = 'TR' AND code != ''");
		$result = $query->result();
		
		return $result;
		
	}//End of function
	
	
	//FUNCTION TO GET Indices Query1
	function getIndicesQuery1($date,$indxxType)
	{
	
		$query= $this->db->query("SELECT i.indxx_id AS INDEX_ID, i.indxx_name AS NAME, i.code AS CODE, p_today.date AS DATE, p_today.value AS VALUE, p_yest.value AS OLD_VALUE, 
				( p_today.value - p_yest.value ) AS pxchange, ( ( p_today.value - p_yest.value ) / p_yest.value ) * 100 AS pxpct 
				FROM indxx_values p_today 
				LEFT JOIN indxx_values p_yest ON p_today.indxx = p_yest.indxx 
				LEFT JOIN index_description i ON i.indxx_id = p_today.indxx 
				WHERE  p_today.date = '$date[0]' 
				AND p_yest.date ='$date[1]' 
				AND i.code != '' 
				AND i.index_type = '$indxxType' 
				AND i.return_type = 'TR' 
				GROUP  BY p_today.indxx order by i.indxx_name asc");
				
		$result = $query->result();
		return $result;
		
	}//End of function
	
	
	//FUNCTION TO GET Indices Query2
	function getIndicesQuery2($date,$indxxType, $indxxID)
	{
		
		$query = $this->db->query("SELECT i.indxx_id AS INDEX_ID, i.indxx_name AS NAME, i.code AS CODE, p_today.date AS DATE, p_today.value AS VALUE, p_yest.value AS OLD_VALUE, 
				( p_today.value - p_yest.value ) AS pxchange, ( ( p_today.value - p_yest.value ) / p_yest.value ) * 100 AS pxpct 
				FROM indxx_values p_today 
				LEFT JOIN indxx_values p_yest ON p_today.indxx = p_yest.indxx 
				LEFT JOIN index_description i ON i.indxx_id = p_today.indxx 
				WHERE  p_today.date = '$date[0]' 
				AND p_yest.date ='".date('Y-m-d', strtotime($date[1]. ' -3 day'))."' 
				AND i.code != '' AND i.index_type = '$indxxType' 
				AND i.return_type = 'TR' AND i.indxx_id = '".$indxxID."' 
				GROUP  BY p_today.indxx 
				order by i.indxx_name asc");
				
		$result = $query->result();	
		return $result;
		
	}//End of function
	
	
}//end of class
?>

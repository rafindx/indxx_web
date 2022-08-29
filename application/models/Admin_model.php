<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Admin_model extends CI_Model {

    //Constructor Function
    function __construct() {
        parent::__construct();
    }

    //Function to get Table data
    function get_user($userEmail, $password) {
        $this->db->where('email', $userEmail);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_admin_login');
        $result = $query->num_rows();
        return $result;
    }

    function userAuth($userEmail, $password) {
        $this->db->where('email', $userEmail);
        $this->db->where('password', $password);
        $this->db->select("id");
        $this->db->from('tbl_admin_login');
        $query = $this->db->get();
        return $query->row();
    }

    function checkNews($title) {
        $this->db->where('title', $title);
        $query = $this->db->get('tbl_news');
        $result = $query->num_rows();
        return $result;
    }

     function addLog($data) {
        if ($this->db->insert('admin_log', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function addResearch($data) {
        if ($this->db->insert('tbl_research', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function addNews($data) {
        if ($this->db->insert('tbl_news', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function checkPress($title) {
        $this->db->where('title', $title);
        $query = $this->db->get('tbl_press');
        $result = $query->num_rows();
        return $result;
    }

    function insert($table, $data) {
        if ($this->db->insert($table, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function saveIndex($table, $data) {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function addContent($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
     function addContent2( $data, $table) {
      
        $this->db->insert($table, $data);
          $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function update($table, $data, $where) {
        $this->db->where($where);
        if ($this->db->update($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    function getRow($table, $where) {
        $this->db->where($where);
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->row();
    }

    function getResult($table, $where) {

        $this->db->where($where);
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    function getAllResult($table) {

        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }
    function getCalculateData($tabname)
    {
           $sql = "SELECT * FROM index_description  join indxx   on  index_description.index_type = '".$tabname."'  and index_description.indxx_id= indxx.id AND indxx.weighttype = 1  AND indxx.productlist = 1  ORDER BY index_description.id DESC";   
    $query = $this->db->query($sql);

return $query->result();
     
    }
     function getIndexData($tabname)
    {
     $sql = "SELECT * FROM index_description  join indxx   on  indxx.productlist='1'  and  index_description.index_type = '".$tabname."'  and index_description.code= indxx.code GROUP BY indxx.id  ORDER BY index_description.id DESC";   
    $query = $this->db->query($sql);

return $query->result();
     
    }
    function getIndexData2()
    {
    $sql = "SELECT * FROM index_description  join indxx   on indxx.productlist='2'   and index_description.code= indxx.code GROUP by indxx.id ORDER BY index_description.id DESC";  
   // $sql = "SELECT index_description.* FROM indxx left join index_description on indxx.productlist='2' and index_description.code= indxx.code ORDER BY index_description.id DESC";
    $query = $this->db->query($sql);

return $query->result();      
    }
    function getResultByOrd($tabel, $where, $column) {
        $this->db->where($where);
        $this->db->select("*");
        $this->db->from($tabel);
        $this->db->order_by($column, "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();	
        return $query->result();
    }

    function resultByOrd($tabel, $column) {

        $this->db->select("*");
        $this->db->from($tabel);
        $this->db->order_by($column, "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();	
        return $query->result();
    }

    function delete($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    

    function checkCount($table, $where) {
        $this->db->where($where);
        $query = $this->db->get($table);
        $result = $query->num_rows();
        return $result;
    }

    function counDatat($table) {
        $query = $this->db->get($table);
        $result = $query->num_rows();
        return $result;
    }

    function resultByOrdLimit($tabel, $column) {
        $this->db->limit(5);
        $this->db->select('title');
        $this->db->from($tabel);
        $this->db->order_by($column, "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function getBase($where) {
        $this->db->where($where);
        $this->db->select('*');
        $this->db->order_by('id', "ASC");
        $this->db->from('indxx_values');
        $query = $this->db->get();
        return $query->row();
    }

    function getLast($indxxID) {
        $query = $this->db->query("SELECT MIN(date), MAX(date),value FROM indxx_values WHERE `indxx` = '273' AND date <= DATE(NOW()) AND date >= DATE_SUB(DATE_SUB(DATE(NOW()), INTERVAL DAY(NOW())-1 DAY), INTERVAL 12 MONTH)");
        return $query->row();
    }

    function getMax($indexId) {

        $query = $this->db->query("SELECT MAX(value)AS a,date FROM `indxx_values` WHERE `indxx` = '$indexId' AND date>= DATE_SUB(NOW(), INTERVAL 1 YEAR )");
        return $query->row();
    }

    function getMin($indexId) {

        $query = $this->db->query("SELECT MIN(value) AS b,date FROM `indxx_values` WHERE `indxx` = '$indexId' AND date>= DATE_SUB(NOW(), INTERVAL 1 YEAR )");
        return $query->row();
    }
    
    function getDepartmentName($department_id)
    {
        $query = $this->db->where('department_id',$department_id)->get('tbl_department')->row_array();
        return $query['department_name'];
    }

    //End of function
}

//end of class
?>

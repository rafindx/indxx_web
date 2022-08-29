<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    //Constructor Function
    function __construct() {
        parent::__construct();

        error_reporting(0);
        //Loading models
        $this->load->model(array('indice', 'content'));

        //Load Helpers
        $this->load->helper('url');
        $this->load->library('session');
        //Loading libraries
        //$this->load->library(array('email'));
    }

//end of function
    //Function to Search Ind    xx from Seearch bar
    /*
    public function search()
    {
       $this->session->set_userdata('site_lang',  "english");    
       $val= $this->input->post('Search',true);
       $val=ltrim($val);
       $val=rtrim($val);
       $indxxId= $this->indice->getIndexxIdByIndxxName($val);
       if($indxxId!='')
       {
           redirect("/Welcome/new_indices/$indxxId");
       }
       else
       {
           redirect('/'); 
       }
           
    }*/
    public function search()
    {
       $this->session->set_userdata('site_lang',  "english");    
       $val= $this->input->post('Search',true);
       $val=ltrim($val);
       $val=rtrim($val);
       $indxx_slug= $this->indice->getIndexxIdByIndxxName($val);
       if($indxx_slug!='')
       {
           //redirect("/Welcome/new_indices/$indxxId");
           redirect($indxx_slug);
       }
       else
       {
           redirect('/'); 
       }
           
    }
      // Function to show Cookies Policy Page
        public function cookiepolicy($activetab='') {
        
        $data['page'] = 'cookiepolicy';

        $this->load->view('cookiepolicy', $data);
    }
     // Function to show Data Privacy Page
        public function dataprivacy($activetab='') {
        
        $data['page'] = 'dataprivacy';

        $this->load->view('dataprivacy', $data);
    }
    public function blogpage(){
    
    $this->load->view('Post_Details');
   }
   public function index() {

        //Get News 
//        $where = " order by publishedDate desc";
//        $news_qry1 = $this->indice->gettabledata('tbl_news', '*', '', '', $where);
        /*         * ******************** Code to Show Indices on Home Page ******************************** */
//        $access_indxx = $this->getHomePageIndices("ACCESS");
//        $income_indxx = $this->getHomePageIndices("INCOME");
//        $alternative_indxx = $this->getHomePageIndices("ALTERNATIVE");
        /*         * ******************** End of Code to Show Indices on Home Page ******************************** */
        
        $results['newsposts'] = $news_qry1;
        $results['access_indxx'] = $access_indxx;
        $results['income_indxx'] = $income_indxx;
        $results['alternative_indxx'] = $alternative_indxx;

// $query=$this->db->query('SELECT *,max(date) FROM `indxx_values` WHERE date not in (select max(date) from indxx_values group by indxx order by date DESC ) GROUP by id order   by date DESC');
//      print_r($query->result());
        $getHighLows = array();
        $getHighLow = $this->indice->getResulthl('indxx_percentage_chg');

foreach ($getHighLow as $getHighLow) {
            $index = $this->indice->getrowWhere(array('code' => $getHighLow->code), 'name', ' indxx');
             $index_description = $this->indice->getrowWhere(array('code' => $getHighLow->code), 'id', ' index_description');
             $getHighLow->indexxName = $index->name;
             $getHighLow->id = $index->id;
              $getHighLow->return_type = $index_description->return_type;
             array_push($getHighLows, $getHighLow);
        }
       
        //$getClient = $this->indice->result('tbl_client_slider');
        #$getClient = $this->indice->resultWhere('tbl_client_slider', array('status' => 1));
        
        $getNews = $this->indice->resultLimitForFront('tbl_news','publishedDate ');
        $getPress = $this->indice->resultLimitForFront('tbl_press','publishedDate ');
        $getResearch = $this->indice->resultLimitForFront('tbl_research','publishedDate');

        $where = " order by year desc";
        $getDocument = $this->indice->resultLimitForFront('tbl_documents','Doc_date');
        $anNotification = $this->indice->resultLimitForFront('tbl_announcements_notification','date');
        $tbl_calander = $this->indice->resultLimitForFront('tbl_calander','date');
        $results['getDocument']=$getDocument;
        $results['anNotification']=$anNotification;
        $results['tbl_calander']=$tbl_calander;
        $results['stats'] = $getHighLows;
        $results['slider'] = $getClient;
        $results['news'] = $getNews;
        $results['press'] = $getPress;
        $results['research'] = $getResearch;
        $results['newsfirst'] = $getFirstNews;
        $results['pressfirst'] = $getFirstPress;
        $this->session->set_userdata('site_lang',  "english");
        $results['page'] = 'index';

        $this->load->view('index', $results);
    }

    //End of function

    public function switchLang($language = "") {
        $this->session->set_userdata('site_lang', $language);
        $curr_url= parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        if($curr_url==''){
            header('Location:'.base_url());
        }
        else{
            redirect($curr_url, 'refresh');  
        }
    }
    //Function to Show aboutus page
    public function aboutus($activetab='') {
        $this->session->set_userdata('site_lang',  "english"); 
        $getTabOverview = $this->indice->getrow('tbl_about_tabs');
        $getAboutSection = $this->indice->result('tbl_overview_text');
        $getOurValue = $this->indice->result('tbl_our_value');
        $manage = $this->indice->result('tbl_management');
        $open = $this->indice->resultWhere('tbl_careers', array('status' => 1));
        $vlOther = $this->indice->result('tbl_our_value_other');
        $overview_tab_Desc = $this->indice->resultDesc('overview_tab_Desc');
        $data['overviewdata'] = $overview_tab_Desc;
        $data['tab'] = $getTabOverview;
        $data['aboutText'] = $getAboutSection;
        $data['values'] = $getOurValue;
        $data['manage'] = $manage;
        $data['opening'] = $open;
        $data['valueOther'] = $vlOther;
        $data['faq'] = $this->db->get('tbl_faq_pdf')->row_array();
        $data['department'] = $this->db->where('status','1')->get('tbl_department')->result();
		if($activetab!='')
                {
                    $data['activetab'] = $activetab;  
                }
		$data['page'] = 'aboutus';

        $this->load->view('aboutus', $data);
    }
    
     //Function to Show Index Services page
    public function indexservices($activetab='') {
       
        $this->session->set_userdata('site_lang',  "english");
         if($activetab!='')
        {
            $data['activetab'] = $activetab;  
        }
        $data['page'] = 'indexservices';

        $this->load->view('indexservices', $data);
    }
    
     //Function to Show cadmin page
    public function technology($activetab='') {
       
        $this->session->set_userdata('site_lang',  "english");
        if($activetab!='')
        {
            $data['activetab'] = $activetab;  
        }
        $data['page'] = 'technology';

        $this->load->view('technology', $data);
    }


public function Profile($id)
{
    
    
  $data['profile']= $this->indice->Profile($id);
    $data['page'] = 'profile';
    $this->load->view('management-profile', $data);
   
}
//End of function
    //Function to Show development page
    public function development() {
        
		$data['page'] = 'development';
		
        $this->load->view('development', $data);
    }
    
     
//End of function
    //Function to Show calculation page
    public function calculation() {
       $data['page'] = 'calculation';
        $this->load->view('calculation', $data);
    }

//End of function
    //Function to Show indices page
   /* public function indices() {
        $column = 'name';
        $where = array('tabname' => 'Income', 'productlist' => '1');
        $data['get_income'] = $this->indice->getResultByOrdInd('indxx', $column, $where);

        $column = 'name';
        $where = array('tabname' => 'Thematic', 'productlist' => '1');
        $data['get_thematic'] = $this->indice->getResultByOrdInd('indxx', $column, $where);

        $column = 'name';
        $where = array('tabname' => 'Benchmark', 'productlist' => '1');
        $data['get_indices'] = $this->indice->getResultByOrdInd('indxx', $column, $where);

        $column = 'name';
        $where = array('tabname' => 'Others', 'productlist' => '1');
        $data['get_others'] = $this->indice->getResultByOrdInd('indxx', $column, $where);

       $data['page'] = 'indices';
		
		$this->load->view('listindices', $data);
    }*/

    public function indices() {
        $this->session->set_userdata('site_lang',  "english");
        $column = 'indxx_name';
        $where = array('index_type' => 'ESG', 'return_type' => 'TR');
        $data['get_esg'] = $this->indice->getResultByOrdInd2('ESG');
        
        $column = 'indxx_name';
        $where = array('index_type' => 'Income', 'return_type' => 'TR');
        $data['get_income'] = $this->indice->getResultByOrdInd2('Income');
        
        $column = 'indxx_name';
        $where = array('index_type' => 'Strategy', 'return_type' => 'TR');
        $data['get_strategy'] = $this->indice->getResultByOrdInd2('Strategy');

        $column = 'indxx_name';
        $where = array('index_type' => 'Thematic', 'return_type' => 'TR');
        $data['get_thematic'] = $this->indice->getResultByOrdInd2('Thematic');
        
        $column = 'indxx_name';
        $where = array('index_type' => 'Digital Asset', 'return_type' => 'PR');
        $data['get_digital'] = $this->indice->getResultByOrdInd3('Digital Asset');

        $column = 'indxx_name';
        $where = array('index_type' => 'Benchmark', 'return_type' => 'TR');
        $data['get_indices'] = $this->indice->getResultByOrdInd2('Benchmark');
     
        $column = 'indxx_name';
        $where = array('index_type' => 'Others', 'return_type' => 'TR');
        $data['get_others'] = $this->indice->getResultByOrdInd2('Other Indices');
        $where = " order by company_name asc";
        $allcompany = $this->indice->gettabledata('tbl_company', '*', '', '', $where);
        $data['allcompany'] = $allcompany;
        
        $overv = $this->indice->resultWhere('tbl_pages', array('id' => 1, 'status' =>1));
        $data['overview'] = $overv[0]; 
        
        $data['page'] = 'indices';
        
        $this->load->view('overview', $data);
        //$this->load->view('main_indices', $data);
        //$this->load->view('listindices', $data);
    
    }

//End of function
    //Function to Show announcements page
    public function announcements() {
        $where = " order by date desc, id desc";
        $getNotification = $this->indice->gettabledata('tbl_announcements_notification', '*', '', '', $where);
        $fArray = array();
        foreach ($getNotification as $news) {
            //Keep year array as a seperate array
            array_push($fArray, $news['year']);
            $yrArray = array_unique($fArray);
        }

        //Loop year array
        foreach ($yrArray as $year) {
            foreach ($getNotification as $news1) {
                //If year array == news year, push
                if (in_array($year, $news1)) {
                    $res[$year][] = $news1;
                }
            }
        }


        //$getDocument = $this->indice->result('tbl_documents');
         $where = " order by year desc";
        $getDocument = $this->indice->gettabledata('tbl_documents', '*', '', '', $where);
        $dArray = array();
        foreach ($getDocument as $doc) {
            //Keep year array as a seperate array
            array_push($dArray, $doc['year']);
            $drArray = array_unique($dArray);
        }

        foreach ($drArray as $dyear) {
            foreach ($getDocument as $doc) {
                //If year array == news year, push
                if (in_array($dyear, $doc)) {
                    $docu[$dyear][] = $doc;
                }
            }
        }
            $where = " order by date desc";
        $getCalander = $this->indice->gettabledata('tbl_calander', '*', '', '', $where);
        $dateArray = array();
        foreach ($getDocument as $date) {
            //Keep year array as a seperate array
            array_push($dateArray, $date['year']);
            $daArray = array_unique($dateArray);
        }
        foreach ($daArray as $datyear) {
            foreach ($getCalander as $datedoc) {
                //If year array == news year, push
                if (in_array($datyear, $datedoc)) {
                    $dateCal[$datyear][] = $datedoc;
                }
            }
        }


        $data['notification'] = $res;
        $data['document'] = $docu;
        $data['calander'] = $dateCal;
		$data['page'] = 'announcements';
        $this->load->view('announcements', $data);
    }

//End of function
    //Function to Show news page
     public function news() {
        //Get News 
        $where = " order by publishedDate desc";
        $news_qry1 = $this->indice->gettabledata('tbl_news', '*', '', '', $where);

        $fArray = array();
        foreach ($news_qry1 as $news) {
            //Keep year array as a seperate array
            array_push($fArray, $news['year']);
            $yrArray = array_unique($fArray);
        }

        //Loop year array
        foreach ($yrArray as $year) {
            foreach ($news_qry1 as $news1) {
                //If year array == news year, push
                if (in_array($year, $news1)) {
                    $res[$year][] = $news1;
                }
            }
        }


        //Get News 
        $where = " order by publishedDate desc";
        $research_qry1 = $this->indice->gettabledata('tbl_research', '*', '', '', $where);

        $rArray = array();
        foreach ($research_qry1 as $research) {
            //Keep year array as a seperate array
            array_push($rArray, $research['year']);
            $vrArray = array_unique($rArray);
        }

        //Loop year array
        foreach ($vrArray as $year2) {
            foreach ($research_qry1 as $research1) {
                //If year array == news year, push
                if (in_array($year2, $research1)) {
                    $rervs[$year2][] = $research1;
                }
            }
        }    

        $where = " order by publishedDate desc";
        $press_qry1 = $this->indice->gettabledata('tbl_press', '*', '', '', $where);

        $pressArray = array();
        foreach ($press_qry1 as $press) {
            //Keep year array as a seperate array
            array_push($pressArray, $press['year']);
            $newArray = array_unique($pressArray);
        }

        //Loop year array
        foreach ($newArray as $pressyear) {
            foreach ($press_qry1 as $pressOne) {
                //If year array == news year, push
                if (in_array($pressyear, $pressOne)) {
                    $ress[$pressyear][] = $pressOne;
                }
            }
        }

        $getNews['newsposts'] = $res;
        $getNews['press'] = $ress;
        $getNews['research'] = $rervs;
        $getNews['page'] = 'news';
        
        $this->load->view('news', $getNews);
    }

//End of function
    //Function to Show contactus page
    public function contactus() {
        $data['page'] = 'contactus';
		
        $this->load->view('contactus', $data);
    }

//End of function
    //Function to Get HomePageIndices
    public function getHomePageIndices($indxxType) {

        //Query to get data from index_description		
        $get_indices = $this->content->getIndicesBasedOnType($indxxType);

        if (!empty($get_indices)) {
            $indexId = array();
            foreach ($get_indices as $row) {
                $indexId[$row->INDEX_ID] = $row;
            }
        }
        //print_r($indexId);
        //Get Last 2 Dates
        $where = " ORDER BY DATE desc limit 0,2";
        $date_query = $this->indice->gettabledata("indxx_values", "distinct(DATE_FORMAT(date, '%Y-%m-%d')) as date", "", "", $where);

        foreach ($date_query as $value) {
            $date[] = $value['date'];
        }

        if (!empty($date)) {
            //Query1 to get data from indxx_values		
            $get_indices_qry1 = $this->content->getIndicesQuery1($date, $indxxType);

            if (!empty($get_indices_qry1)) {

                $data = array();
                // output data of each row
                foreach ($get_indices_qry1 as $row) {
                    $ids[] = $row->INDEX_ID;
                    $data[] = $row;
                    //$data[] = $indexId;
                }

                foreach ($indexId as $id) {
                    if (!in_array($id->INDEX_ID, $ids)) {
                        //Query2 to get data from indxx_values		
                        $indxxID = $id->INDEX_ID;
                        $get_indices_qry2 = $this->content->getIndicesQuery2($date, $indxxType, $indxxID);

                        foreach ($get_indices_qry2 as $row) {
                            $data[] = $row;
                        }
                    }
                }
            } else {
                //	echo "0 results with index type".$indxxType."<br>";
                $data[] = array();
            }
        } else {
            echo "No data found";
        }

        //print_r($data);
        return $data;
    }
    
    public function getInTouch() {
    $table = 'tbl_get_in_touch';
    
    $name = $_POST["name"];
    $company = $_POST["company"]; 
    $email = $_POST["email"];
    $form_type = $_POST["form_type"]; 
    $data = array('name' => $name, 'compnay' => $company, 'email' => $email, 'form_type' => $form_type, 'status' => 1);
    $addReq = $this->indice->insert($table, $data);
    if ($addReq) { 
        echo "success";
    }
    }
//End of function

    function addContact() {

        $name = $this->input->post("name");
        $company = $this->input->post("company");
        $phone = $this->input->post("phone");
        $email = $this->input->post("email");
        $question = $this->input->post("question");
        $table = 'tbl_conact_us';
        $data = array('name' => $name, 'compnay' => $company, 'phone_number' => $phone, 'email' => $email, 'question' => $question,);
        $addReq = $this->indice->insert($table, $data);
        if ($addReq) {

            $to = $email;
            $subject = "Indexx Newsletter";

            $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <title>Email Template</title>
    <style type='text/css'>
      body {
      margin: 0px !important;
      padding: 0px !important;
      -webkit-text-size-adjust: 100% !important;
      -ms-text-size-adjust: 100% !important;
      -webkit-font-smoothing: antialiased !important;
      }
      img {
      border: 0 !important;
      outline: none !important;
      display: block !important;
      }
      table {
      border-collapse: collapse;
      mso-table-lspace: 0px;
      mso-table-rspace: 0px;
      }
      td {
      border-collapse: collapse;
      mso-line-height-rule: exactly;
      }
     
      .ExternalClass * {
      line-height: 100%;
      }
      .white a {
      color: #ffffff;
      text-decoration: none;
      }
      
      .grey1 a {
      color: #646464;
      text-decoration: none;
      }
      .applewhiltelink a {
      color: inherit !important;
      text-decoration: none !important;
      }
      @media only screen and (min-width:481px) and (max-width:599px) {
      table[class=wrapper] {
      width: 100% !important;
      }
      table[class=main_table] {
      width: 100% !important;
      }
      td[class=pad_side] {
      padding-left: 14px !important;
      padding-right: 14px !important;
      }
      td[class=hide], br[class=hide] {
      display: none !important;
      }
      img[class=full_img] {
      width: 100% !important;
      height: auto !important;
      }
      td[class=text], td[class=black], td[class=black2], td[class=red], td[class=white], td[class=white1], td[class=white2], td[class=grey] {
      text-align: center !important;
      }
      td[class=pad_bottom] {
      padding-bottom: 20px !important;
      }
      td[class=pad_top] {
      padding-top: 20px !important;
      }
      td[class=fix_height] {
      height: 20px !important;
      }
      td[class=video] img {
      width: 100% !important;
      height: auto !important;
      }
      }
      @media only screen and (max-width:480px) {
      table[class=wrapper] {
      width: 100% !important;
      }
      table[class=main_table] {
      width: 100% !important;
      }
      td[class=pad_side] {
      padding-left: 14px !important;
      padding-right: 14px !important;
      }
      td[class=hide], br[class=hide] {
      display: none !important;
      }
      img[class=full_img] {
      width: 100% !important;
      height: auto !important;
      }
      td[class=text], td[class=black], td[class=black2], td[class=red], td[class=white], td[class=white1], td[class=white2], td[class=grey] {
      text-align: center !important;
      }
      td[class=pad_bottom] {
      padding-bottom: 20px !important;
      }
      td[class=pad_top] {
      padding-top: 20px !important;
      }
      td[class=fix_height] {
      height: 20px !important;
      }
      }
	  .link{color:#ff3e3c;}
	  .link:hover{color:#010101;}
    </style>
  </head>
  <body marginwidth='0' marginheight='0' offset='0' topmargin='0' leftmargin='0' bgcolor='#ffffff'>
    <table width='100%' border='0' align='center' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
      <tr>
        <td align='center'>
          <table style='table-layout:fixed;' width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper'>
            <tr>
              <td class='hide' height='1' style='line-height:0px; font-size:0px;'><img src='images/spacer.gif' height='1' width='650' style='display:block; width:650px; min-width:650px;' border='0' /></td>
            </tr>
            <tr>
              <td valign='top'>
                <table width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper' style='table-layout:auto;'>
                  <tr>
                    <td>
                      <table width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper' mc:repeatable mc:variant='Header1'>
                        <tr>
                          <td>
                            <table width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper'>
                              <tr>
                                <td width='30' class='hide'>&nbsp;</td>
                                <td>
                                 
                                </td>
                                <td width='30' class='hide'>&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                        </tr>
                      </table>
                      <table width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper' mc:repeatable mc:variant='Header2'>
                        <tr>
                          <td>
                            <table width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper'>
                              <tr>
                                <td width='30' class='hide'>&nbsp;</td>
                                <td>
                                  <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
                                    <tr>
                                      <td height='25' class='fix_height'>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <table width='250' border='0' cellspacing='0' cellpadding='0' align='left' class='wrapper'>
                                          <tr>
                                            <td class='black' mc:edit='text_h2' style='font-family:Arial, sans-serif; font-size:12px; line-height:15px; color:#333333;' align='left'><span class='black'>If you can’t see this email?</span></td>
                                          </tr>
                                        </table>
                                        <table width='250' border='0' cellspacing='0' cellpadding='0' align='right' class='wrapper'>
                                          <tr>
                                            <td class='red' mc:edit='view' style='font-family:Arial, sans-serif; font-size:12px; line-height:15px; color:#ff3e3c;' align='right'><a href='http://mantissystems.com/Clients/indxxci' target='_blank' style='color:#ff3e3c; text-decoration:none;'>View it in your browser.</a></td>
                                          </tr>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td height='25' class='fix_height'>&nbsp;</td>
                                    </tr>
                                  </table>
                                </td>
                                <td width='30' class='hide'>&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                     
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- Header //-->
          </table>
        </td>
      </tr>
    </table>
   
    <table width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper' mc:repeatable mc:variant='Title + Sub title Section' style='table-layout:fixed; border-top:1px solid #e4e4e4;'>
      <tr>
        <td width='30' class='hide'>&nbsp;</td>
        <td class='pad_side'>
          <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper'>
           
           
            <tr>
              <td height='40' style='line-height:1px;font-size:1px;'  class='fix_height'>&nbsp;</td>
            </tr>
          </table>
        </td>
        <td width='30' class='hide'>&nbsp;</td>
      </tr>
    </table>
    <table width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper' mc:repeatable mc:variant='2 Column With IMAGE + TITLE + DESC + READ MORE' style='table-layout:fixed;'>
      <tr>
        <td class='pad_side'>
         <table width='650' border='0' cellspacing='0' cellpadding='0' class='wrapper'>
            <tbody><tr>
              <td width='45' class='hide'>&nbsp;</td>
              <td>
                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                  <tbody>
                    <td height='2' style='line-height:0px; font-size:0px;'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td mc:edit='para_3' style='font-family:Arial, sans-serif; font-size:13.5px; line-height:23px; color:#343434;'>
						<p>Dear Friend of Indxx,</p>
						
						<p>Thank you for adding your email to the Indxx Newsletter. Going forward, you will receive our newsletter, which covers new research as well as recent index and product launches.</p>
						<p>Should you wish to unsubscribe, simply click on the relevant link at the bottom of any newsletter.</p>
						<p>Please reach out to us at <a href='mailto:info@indxx.com' class='link'>info@indxx.com</a> with any questions.</p>
						<br>
						<p>Thank you!<br>
						<span style='font-weight:600;'>The Indxx Team</span></p>
					</td>
                  </tr>
                  <tr>
                    <td height='40' style='line-height:0px; font-size:0px;'>&nbsp;</td>
                  </tr>
                </tbody></table>
              </td>
              <td width='45' class='hide'>&nbsp;</td>
            </tr>
          </tbody></table>
		 
        </td>
      </tr>
    </table>
	<table width='650' border='0' cellspacing='0' cellpadding='0' class='wrapper' align='center' mc:repeatable='' mc:variant='Right IMAGE + Left(TITLE + DESC + READ MORE)' style='table-layout:fixed;'>
      <tbody><tr>
        <td class='pad_side'>
         
          
	
	
	<table width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper' mc:repeatable='' mc:variant='Copyright Section' style='border-top:1px solid #e4e4e4;'>
                  <tbody><tr>
                    <td>
                      <table width='650' border='0' cellspacing='0' cellpadding='0' align='center' class='wrapper'>
                        <tbody><tr>
                          <td width='50'>&nbsp;</td>
                          <td mc:edit='list' class='black' align='center' style='font-family:Arial, sans-serif; font-size:12px; line-height:20px; color:#21212; padding-top:12px;'>Copyright © 2018 | Indxx, All rights reserved.
                          </td>
                          <td width='50'>&nbsp;</td>
                        </tr>
                      </tbody></table>
                    </td>
                  </tr>
                  <tr>
                    <td height='20'>&nbsp;</td>
                  </tr>
                </tbody></table>
	
                
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
";

// Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
            $headers .= 'From: <indxx.com>' . "\r\n";
            $this->session->set_flashdata('msg_edit', 'Your message has been successfully sent. We will contact you very soon!');
           if(mail($to, $subject, $message, $headers)){ 
           echo"<script>alert('Your contact request has been submitted successfully')</script>";
            redirect('home/contactus');

           }
           else
           {
             redirect('home/contactus');
           }
        }
    }



function success() {
    $this->load->view('success');
}

 function openings() {
     
    $config['upload_path'] = './assets/media/resume';
   $config['allowed_types'] = 'pdf|doc|docx';
    $config['max_size'] = 10000;
    $config['file_name'] = $this->input->post("file");
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $productsimage = "";
    $this->upload->do_upload('file');
   
    $resume = $this->upload->data('file_name');
    $full_name = $this->input->post("full_name");
    $email = $this->input->post("email");
    $phone_number = $this->input->post("phone_number");
    $apply_for = $this->input->post("apply_for");

    $data = array('full_name' => $full_name, 'email' => $email, 'phone_number' => $phone_number, 'apply_for' => $apply_for, 'file' => $resume);

    $addCan = $this->indice->insertRow('tbl_candidate_applyed', $data);
  
    if ($addCan) {
        $to = 'email@email.com
        .';
        $subject = "Resume";
        $txt = base_url()."assets/media/resume/$resume";
        $headers = "From: indxx.com";
    
        
          $this->load->library('email');



// Set to, from, message, etc.


        $this->email->from('hr@indxx.com', 'Hr Indxx');
        $this->email->to('hr@indxx.com'); 

        $this->email->subject('Resume');
    

        $this->email->message($txt);
// $this->email->send();  

$this->email->send();
	   
 
 redirect('home/success');
        
    }
}

//End of Class
}
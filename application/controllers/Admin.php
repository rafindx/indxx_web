<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '-1');



class Admin extends CI_Controller {

    //Constructor Function
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->model('indice');
        $this->load->library('session');
        $this->load->library('csvimport');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('file');

        
    }

    //end of function
    //adminlogin
    function checkLogin()
    {
          if ($this->session->userdata('adminId') == '') {
             redirect('admin/index'); 
          }
          
    }
   
    function index() {


        $this->form_validation->set_rules('email', 'Email', 'trim|required|matches[email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $pageTitle = 'Admin Login';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_login');
        } else {
            $userEmail = $this->input->post("email");
            $password = md5($this->input->post("password"));
            
            $usr_result = $this->Admin_model->get_user($userEmail, $password);
            if ($usr_result > 0) { //active user record is present
                $adminResult = $this->Admin_model->userAuth($userEmail, $password);
                if ($adminResult) {
                    $this->session->set_userdata('adminId', $adminResult->id);
                    redirect('admin/home');
                }
            } else {
                $pageTitle = 'Admin Login';
                $errorMsg = 'Invalid username and password.';
                $data = array('pageTitle' => $pageTitle, 'errorMsg' => $errorMsg);
                $pageData = array('errorMsg' => $errorMsg);
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/admin_login', $pageData);
            }
        }
    }

    function home() {
        if (!$this->session->userdata('adminId') == '') {

            $totalIndex = $this->Admin_model->checkCount('indxx', array('productlist' => 1));
            $totalstatic = $this->Admin_model->checkCount('indxx', array('weighttype' => 0));
            $totaldynamic = $this->Admin_model->checkCount('indxx', array('weighttype' => 1));
            $news = $this->Admin_model->resultByOrdLimit('tbl_news', 'id');
            $press = $this->Admin_model->resultByOrdLimit('tbl_press', 'id');
            //$newslater = $this->Admin_model->counDatat('tbl_newsletter');
            $contact = $this->Admin_model->counDatat('tbl_conact_us');
           //$results['latters'] = $newslater;
            $results['contact'] = $contact;


            //print_r($press);

            $results['total'] = $totalIndex;
            $results['static'] = $totalstatic;
            $results['dynamic'] = $totaldynamic;
            $results['press'] = $press;
            $results['news'] = $news;
            $pageTitle = 'Admin Home';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/home', $results);
        } else {
            redirect('admin/index');
        }
    }

    function newIndxx() {
      $this->checkLogin();
        $pageTitle = 'New Indxx';
        $data = array('pageTitle' => $pageTitle);
        $where = array('index_type' => 'Benchmark');
        $getBanchmark = $this->Admin_model->getResult('index_description', $where);
        $data1['banchmark'] = $getBanchmark;
        $where = array('status' => '1');
        $tab = $this->Admin_model->getResult('tab_name', $where);
        $data1['tab'] = $tab;
        $company = $this->Admin_model->getResult('tbl_company', $where);
        $data1['company'] = $company;

        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/newIndex', $data1);
    }

    function newslist() {
        $this->checkLogin();
        $pageTitle = 'News List';
        $data = array('pageTitle' => $pageTitle);
        $data['news'] = $this->Admin_model->getAllResult('tbl_news');
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/newslist');
    }

    function editnews() {
       $this->checkLogin();
        $pageTitle = 'Edit News';
        $table = 'tbl_news';
        $id = $this->input->post("newsid");
        $where = array('id' => $id);


        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $data['news1'] = $this->Admin_model->getRow($table, $where);
        $this->load->view('admin/add_news', $data);
    }
  
    function updatenews() {
        if (!$this->session->userdata('adminId') == '') {
            $newsid = $this->input->post("newsid");

            $where = array('id' => $newsid);
            $title = $this->input->post("title");
            $url = $this->input->post("url");
            $year = $this->input->post("year");
            $ye= date('Y',strtotime($year));
            $year1= date('Y-m-d',strtotime($year));
           
            $config['upload_path'] = './assets/media/news';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 10000;
            $config['file_name'] = $this->input->post("file");
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $productsimage = "";
            $this->upload->do_upload('file');
            $pdfFile = $this->upload->data('file_name');
            if($pdfFile==''){
            $data = array('title' => $title, 'url' => $url, 'publishedDate' => $year1,'year'=>$ye);
            }
            else
            {
             $data = array('title' => $title, 'url' => $url, 'publishedDate' => $year1,'year'=>$ye, 'pdf' => $pdfFile);   
            }
            $addNews = $this->Admin_model->update('tbl_news', $data, $where);
            // array('' => , $this->session->userdata('adminId'))
            // $this->Admin_model->addLog();
            if ($addNews == TRUE) {
                $this->session->set_flashdata('msg', 'News has been Updated successfully.');
                redirect("admin/newslist");
            }
        } else {
            redirect('admin/index');
        }
    }

    function DeleteOnlyNews() {
       $this->checkLogin();
        $newsid = $this->input->post("newsid");
        $table = 'tbl_news';
        $where = array('id' => $newsid);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete) {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
            redirect("admin/newslist");
        }
    }
   
    
    function presslist() {
       $this->checkLogin();
        $pageTitle = 'News List';
        $data = array('pageTitle' => $pageTitle);
        $data['press'] = $this->Admin_model->getAllResult('tbl_press');
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/presslist');
    }

    function pressnews() {
        $this->checkLogin();
        $pageTitle = 'Edit Press';
        $table = 'tbl_press';
        $id = $this->input->post("newsid");
        $where = array('id' => $id);


        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $data['press'] = $this->Admin_model->getRow($table, $where);
        $this->load->view('admin/press', $data);
    }

    function editPress() {
       $this->checkLogin();
        $pageTitle = 'Edit Press';
        $table = 'tbl_press';
        $id = $this->input->post("pressid");
        $where = array('id' => $id);


        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $data['press'] = $this->Admin_model->getRow($table, $where);
        $this->load->view('admin/press', $data);
    }

   

    function DeleteOnlyPress() {
       $this->checkLogin();
        $pressid = $this->input->post("pressid");
        $table = 'tbl_press';
        $where = array('id' => $pressid);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete) {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
            redirect("admin/presslist");
        }
    }

    function news() {
        if (!$this->session->userdata('adminId') == '') {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('year', 'Year', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $pageTitle = 'Add News';
                $data = array('pageTitle' => $pageTitle);
               
                $this->load->view('admin/admin_header.php', $data);
                $this->load->view('admin/add_news');
            } else {
                $title = $this->input->post("title");
                $url = $this->input->post("url");
                $year = $this->input->post("year");
                $ye=   date('Y',strtotime($year));
                $year=   date('Y-m-d',strtotime($year));
                $check = $this->Admin_model->checkNews($title);
                if ($check > 0) {
                    $pageTitle = 'Add News';
                    $errorMsg = 'News already exist';
                    $pageData = array('errorMsg' => $errorMsg);
                    $data = array('pageTitle' => $pageTitle);
                    $this->load->view('admin/admin_header', $data);
                    $this->load->view('admin/add_news', $pageData);
                    
                } else {
                    $config['upload_path'] = './assets/media/news';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = 10000;
                    $config['file_name'] = $this->input->post("file");
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $productsimage = "";
                    $this->upload->do_upload('file');
                    $pdfFile = $this->upload->data('file_name');
                    $data = array('title' => $title, 'url' => $url, 'publishedDate' => $year, 'pdf' => $pdfFile,'year'=>$ye);
                    $addNews = $this->Admin_model->addNews($data);
                    if ($addNews == TRUE) {
                        $this->session->set_flashdata('msg', 'News has been added successfully.');
                        redirect("admin/newslist");
                    }
                }
            }
        } else {
            redirect('admin/index');
        }
    }

    function  research() {
        if (!$this->session->userdata('adminId') == '') {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('year', 'Year', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $pageTitle = 'Add News';
                $data = array('pageTitle' => $pageTitle);
               
                $this->load->view('admin/admin_header.php', $data);
                $this->load->view('admin/add_research');
            } else {
                $title = $this->input->post("title");
                $url = $this->input->post("url");
                $year = $this->input->post("year");
                $ye=   date('Y',strtotime($year));
                $year=   date('Y-m-d',strtotime($year));
                $check = $this->Admin_model->checkNews($title);
                if ($check > 0) {
                    $pageTitle = 'Add Research';
                    $errorMsg = 'Research already exist';
                    $pageData = array('errorMsg' => $errorMsg);
                    $data = array('pageTitle' => $pageTitle);
                    $this->load->view('admin/admin_header', $data);
                    $this->load->view('admin/add_research', $pageData);
                    
                } else {
                    $config['upload_path'] = './assets/media/press';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = 10000;
                    $config['file_name'] = $this->input->post("file");
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $productsimage = "";
                    $this->upload->do_upload('file');
                    $pdfFile = $this->upload->data('file_name');
                    $data = array('title' => $title, 'url' => $url, 'publishedDate' => $year, 'pdf' => $pdfFile,'year'=>$ye);
                    $addNews = $this->Admin_model->addResearch($data);
                    if ($addNews == TRUE) {
                        $this->session->set_flashdata('msg', 'Research has been added successfully.');
                        redirect("admin/researchlist");
                    }
                }
            }
        } else {
            redirect('admin/index');
        }
    }

    function researchlist() {
        $this->checkLogin();
        $pageTitle = 'Research List';
        $data = array('pageTitle' => $pageTitle);
        $data['research'] = $this->Admin_model->getAllResult('tbl_research');
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/researchlist');
    }

    function editresearch() {
       $this->checkLogin();
        $pageTitle = 'Edit Research';
        $table = 'tbl_research';
        $id = $this->input->post("researchid");
        $where = array('id' => $id);


        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $data['research1'] = $this->Admin_model->getRow($table, $where);
        $this->load->view('admin/add_research', $data);
    }
  
    function updateresearch() {
        if (!$this->session->userdata('adminId') == '') {
            $researchid = $this->input->post("researchid");

            $where = array('id' => $researchid);
            $title = $this->input->post("title");
            $url = $this->input->post("url");
            $year = $this->input->post("year");
            $ye= date('Y',strtotime($year));
            $year1= date('Y-m-d',strtotime($year));
           
            $config['upload_path'] = './assets/media/press';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 10000;
            $config['file_name'] = $this->input->post("file");
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $productsimage = "";
            $this->upload->do_upload('file');
            $pdfFile = $this->upload->data('file_name');
            if($pdfFile==''){
            $data = array('title' => $title, 'url' => $url, 'publishedDate' => $year1,'year'=>$ye);
            }
            else
            {
             $data = array('title' => $title, 'url' => $url, 'publishedDate' => $year1,'year'=>$ye, 'pdf' => $pdfFile);   
            }
            $addNews = $this->Admin_model->update('tbl_research', $data, $where);
            // array('' => , $this->session->userdata('adminId'))
            // $this->Admin_model->addLog();
            if ($addNews == TRUE) {
                $this->session->set_flashdata('msg', 'News has been Updated successfully.');
                redirect("admin/researchlist");
            }
        } else {
            redirect('admin/index');
        }
    }

    function DeleteOnlyResearch() {
       $this->checkLogin();
        $researchid = $this->input->post("researchid");
        $table = 'tbl_research';
        $where = array('id' => $researchid);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete) {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
            redirect("admin/researchlist");
        }
    }

    function press() {
        if (!$this->session->userdata('adminId') == '') {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');

            $this->form_validation->set_rules('year', 'Year', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $pageTitle = 'Add Press';
                $data = array('pageTitle' => $pageTitle);
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/press');
            } else {
                $title = $this->input->post("title");
                $url = $this->input->post("url");
                $year = $this->input->post("year");
                $ye= date('Y',strtotime($year));
                $check = $this->Admin_model->checkPress($title);
                if ($check > 0) {
                    $this->session->set_flashdata('msg', 'News by this name is already exist.');
                    redirect("admin/press");
                } else {
                    $config['upload_path'] = './assets/media/press';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = 10000;
                    $config['file_name'] = $this->input->post("file");
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $productsimage = "";
                    $this->upload->do_upload('file');

                    $pdfFile = $this->upload->data('file_name');
                    $year= date('Y-m-d',strtotime($year));
                   
                    $data = array('status' => 1, 'title' => $title, 'url' => $url, 'publishedDate' => $year, 'pdf' => $pdfFile,'year'=>$ye);

                    if ($url == '' && $pdfFile == '') {

                        $this->session->set_flashdata('msg', 'Please enter url or upload pdf');
                        redirect("admin/press");
                    } else {
                        $table = 'tbl_press';
                        $addNews = $this->Admin_model->insert($table, $data);
                    }

                    if ($addNews == TRUE) {

                        $this->session->set_flashdata('msg', 'Press Relese has been updated successfully.');
                        redirect("admin/presslist");
                    }
                }
            }
        } else {
            redirect('admin/index');
        }
    }
 function updatepress() {
        if (!$this->session->userdata('adminId') == '') {
            $pressid = $this->input->post("pressid");

            $where = array('id' => $pressid);
            $title = $this->input->post("title");
            $url = $this->input->post("url");
            $year = $this->input->post("year");
            $config['upload_path'] = './assets/media/press';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 10000;
            $config['file_name'] = $this->input->post("file");
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $productsimage = "";
            $this->upload->do_upload('file');
            $pdfFile = $this->upload->data('file_name');
            $year1= date('Y-m-d',strtotime($year));
             $ye= date('Y',strtotime($year));
            if($pdfFile=='') {
            $data = array('title' => $title, 'url' => $url, 'publishedDate' => $year1,'year'=>$ye);
            }
            else
            {
             $data = array('title' => $title, 'url' => $url, 'publishedDate' => $year1, 'pdf' => $pdfFile,'year'=>$ye);   
            }

            $addNews = $this->Admin_model->update('tbl_press', $data, $where);
           
            if ($addNews == TRUE) {
                $this->session->set_flashdata('msg', 'Press has been Updated successfully.');
                redirect("admin/presslist");
            }
        } else {
            redirect('admin/index');
        }
    }
    function tabs() {
        $this->checkLogin();
        $this->form_validation->set_rules('tab_one_heading', 'Tab One Heading', 'trim|required');
        $this->form_validation->set_rules('tab_second_heading', 'Tab Second Heading', 'trim|required');
        $this->form_validation->set_rules('tab_third_heading', 'Tab Third Heading', 'trim|required');
        $this->form_validation->set_rules('tab_four_heading', 'Tab Four Heading', 'trim|required');
        $this->form_validation->set_rules('tab_five_heading', 'Tab Five Heading', 'trim|required');
        $this->form_validation->set_rules('tab_six_heading', 'Tab Six Heading', 'trim|required');

        $id = '1';
        $table = 'tbl_about_tabs';
        $where = array('id' => $id);
        $tabView = $this->Admin_model->getRow($table, $where);
        $pagedata['overview'] = $tabView;
        if ($this->form_validation->run() == FALSE) {

            $pageTitle = 'Add Overview';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/tab', $pagedata);
        } else {
            $tab_one_heading = $this->input->post("tab_one_heading");
            $tab_second_heading = $this->input->post("tab_second_heading");
            $tab_third_heading = $this->input->post("tab_third_heading");
            $tab_four_heading = $this->input->post("tab_four_heading");
            $tab_five_heading = $this->input->post("tab_five_heading");
            $tab_six_heading = $this->input->post("tab_six_heading");

            $id = '1';
            $table = 'tbl_about_tabs';
            $where = array('id' => $id);
            $data = array('tab_one_heading' => $tab_one_heading, 'tab_second_heading' => $tab_second_heading, ' tab_third_heading' => $tab_third_heading, 'tab_four_heading' => $tab_four_heading, 'tab_five_heading' => $tab_five_heading, 'tab_six_heading' => $tab_six_heading);
            $add = $this->Admin_model->addContent($where, $data, $table);
            if ($add == TRUE) {
                $this->session->set_flashdata('msg', 'Tab name has been updated successfully.');
                redirect("admin/tabs");
            }
        }
    }

    function updateOverView() {
        $this->checkLogin();
        $id = '1';
        $table = 'tbl_about_tabs';
        $where = array('id' => $id);
        $tabView = $this->Admin_model->getRow($table, $where);
        $pagedata['overview'] = $tabView;
        $this->form_validation->set_rules('overview', 'Over View', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
           
            $pageTitle = 'Add Overview';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $overviewdata = $this->Admin_model->getAllResult('overview_tab_Desc');
            $pagedata['overviewdata']=$overviewdata;
            $this->load->view('admin/overview', $pagedata);
        } else {
            $overview = $this->input->post("overview");
            $overview_title = $this->input->post("overview_title");
            $id = '1';
            $table = 'tbl_about_tabs';
            $where = array('id' => $id);
            $data = array('overview' => $overview,'overview_title'=>$overview_title);
            $add = $this->Admin_model->addContent($where, $data, $table);
            $date1 = $this->input->post("date");
          $this->db->empty_table('overview_tab_Desc');

            for($i=0;$i<count($date1);$i++) {
             $date = $this->input->post("date[$i]");
             $overviewdesc = $this->input->post("overviewdesc[$i]");

          
            
             $data1 = array('date' => date('Y-m-d', strtotime($date)),'overview'=>$overviewdesc);
             $table='overview_tab_Desc';
          
         
             $this->Admin_model->addContent2( $data1, $table);
            }
         
             if ($add) {
                $this->session->set_flashdata('msg', 'overview text has been updated successfully.');
                redirect("admin/overview");
            }
             redirect("admin/overview");
        }
    }

    function overview() {
      $this->checkLogin();
        $id = '1';
        $table = 'tbl_about_tabs';
        $where = array('id' => $id);
        $overviewdata = $this->Admin_model->getAllResult('overview_tab_Desc');
        $tabView = $this->Admin_model->getRow($table, $where);
        $pagedata['overview'] = $tabView;
        $pagedata['overviewdata'] = $overviewdata;
        $pageTitle = 'Add Overview';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/overview', $pagedata);
    }

    function addOverView() {
        $this->checkLogin();
        $id = '1';
        $table = 'tbl_about_tabs';
        $where = array('id' => $id);
        $tabView = $this->Admin_model->getRow($table, $where);
        $pagedata['overview'] = $tabView;
        $heading = $this->input->post("heading");
        $bold_text = $this->input->post("bold_text");
        @$points = implode(',', $this->input->post("points[]"));
// print_r($points);
// die();
        $text_before_point = $this->input->post("text_before_point");
        $text_after_point = $this->input->post("text_after_point");
//set preferences
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'png|jpg|jpeg';
//        $config['max_size'] = '1000';
//load upload class library
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
// case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            $pageTitle = 'Add Overview';
            $data = array('pageTitle' => $pageTitle);
            $errorMsg = $upload_error;
            $pagedata['errorMsg'] = $errorMsg;
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/overview', $pagedata);
            
        } else {
            $upload_data = $this->upload->data();
            $file = $upload_data['file_name'];
            $data = array('heading' => $heading,  'text_after_point' => $text_after_point, 'image' => $file);
            $table = 'tbl_overview_text';
          
            $addOver = $this->Admin_model->insert('tbl_overview_text', $data);
            if ($addOver) {
                $this->session->set_flashdata('msg', 'overview text has been updated successfully.');
                redirect("admin/overview");
            }
        }
    }

    function indxx() {
        if (!$this->session->userdata('adminId') == '') {
//            $data1['get_benchmark'] = $this->Admin_model->getResultByOrd('indxx', array('tabname' => 'Benchmark'), 'id');
//            $data1['get_income'] = $this->Admin_model->getResultByOrd('indxx', array('tabname' => 'Income'), 'id');
//            $data1['get_thematic'] = $this->Admin_model->getResultByOrd('indxx', array('tabname' => 'Thematic'), 'id');
//            $data1['get_other'] = $this->Admin_model->getResultByOrd('indxx', array('tabname' => 'Others'), 'id');
            $data1['get_benchmark'] = $this->Admin_model->getIndexData('Benchmark');
            $data1['get_esg'] = $this->Admin_model->getIndexData('Esg');
            $data1['get_income'] = $this->Admin_model->getIndexData('Income');
            $data1['get_strategy'] = $this->Admin_model->getIndexData('Strategy');
            $data1['get_thematic'] = $this->Admin_model->getIndexData('Thematic');
            $data1['get_digital'] = $this->Admin_model->getIndexData('Digital Asset');
            $data1['get_other'] = $this->Admin_model->getIndexData('Other Indices');
            $data1['get_deactive'] = $this->Admin_model->getIndexData2();

            $pageTitle = 'Add Indxx';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/indxx', $data1);
        } else {

            redirect('admin/index');
        }
    }
    function add_company() {
          $this->checkLogin();
        $pageTitle = 'Add Company';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/add_company');
    }

     function update_company($companyid) {
          $this->checkLogin();
        $pageTitle = 'Edit Company';
        $data = array('pageTitle' => $pageTitle);
          $data['company'] = $this->Admin_model->getRow('tbl_company', array('id' => $companyid));
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/add_company');
    }
    function Edit_Company($companyid)
    {
         $this->checkLogin();
        $company_name = $this->input->post("company_name");
        $show_chart = $this->input->post("show_chart");
        $show_characteristics = $this->input->post("show_characteristics");
        $show_top_constituents = $this->input->post("show_top_constituents");
        $show_rr = $this->input->post("show_rr");
        $data = array('company_name' => $company_name, 'show_chart' => $show_chart, 'show_characteristics' => $show_characteristics, '  show_top_constituents' => $show_top_constituents, 'show_rr' => $show_rr, 'status' => 1);
        $where = array('id'=>$companyid);   
        $addCom = $this->Admin_model->update('tbl_company', $data, $where);
      if ($addCom) {
            $this->session->set_flashdata('msg', 'Company has been Updated successfully.');
            redirect("admin/update_company/$companyid");
        }
    }

        
   

    function add_newCompany() {
          $this->checkLogin();
        $company_name = $this->input->post("company_name");
        $show_chart = $this->input->post("show_chart");
        $show_characteristics = $this->input->post("show_characteristics");
        $show_top_constituents = $this->input->post("show_top_constituents");
        $show_rr = $this->input->post("show_rr");
        $data = array('company_name' => $company_name, 'show_chart' => $show_chart, 'show_characteristics' => $show_characteristics, '  show_top_constituents' => $show_top_constituents, 'show_rr' => $show_rr, 'status' => 1);
        $addCom = $this->Admin_model->insert('tbl_company', $data);
        if ($addCom) {
            $this->session->set_flashdata('msg', 'Company has been added successfully.');
            redirect("admin/add_company");
        }
    }
      function deleteCompany() {
       $this->checkLogin();
        $companyId = $this->uri->segment('3');
        $table = 'tbl_company';
        $where = array('id' => $companyId);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete) {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
            redirect("admin/company_list");
        }
    }
    
  function company_list() {
        $this->checkLogin();
        $news = $this->Admin_model->getAllResult('tbl_company');
        $data1['company'] = $news;
        $pageTitle = 'Company';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/comapny_list', $data1);
    }
    function addIndxx() {
         $this->checkLogin();
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('code', 'Code', 'trim|required');
        $this->form_validation->set_rules('benchmark_id', 'Benchmark Id', 'trim|required');
        $this->form_validation->set_rules('productlist', 'Product List', 'trim|required');
        $this->form_validation->set_rules('weeklyreturn', 'Weekly Return', 'trim|required');
        $this->form_validation->set_rules('tabname', 'Tab Name', 'trim|required');
        $this->form_validation->set_rules('datecheck', 'Date Check', 'trim|required');
        $this->form_validation->set_rules('curr', '
Curr', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $pageTitle = 'Add Indxx';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/newIndxx');
        } else {
            $region_country = $this->input->post("region_country")?$this->input->post("region_country"):'';
            $sector = $this->input->post("sector")?$this->input->post("sector"):'';
            $indxxType = $this->input->post("weighttype");
            $name = $this->input->post("name");
            $code = $this->input->post("code");
            $benchmark_id = $this->input->post("benchmark_id");
            $productlist = $this->input->post("productlist");
            $weeklyreturn = $this->input->post("weeklyreturn");
            $tabname = $this->input->post("tabname");
            $datecheck = $this->input->post("datecheck");
            $weighttype = $this->input->post("weighttype");
            $is_isin = $this->input->post("is_isin");
            $is_company_name = $this->input->post("is_company_name");
            $is_all = $this->input->post("is_all");
            $is_weight = $this->input->post("is_weight");
            $is_methodology = $this->input->post("is_methodology");
            $curr = $this->input->post("curr");
            $table = 'indxx';
            $data = array('region_country'=>$region_country,'sector'=>$sector,'is_methodology'=>$is_methodology,'is_all'=>$is_all,'is_weight'=>$is_weight,'is_company_name'=>$is_company_name,'is_isin'=>$is_isin, 'name' => $name, 'code' => $code, 'benchmark_id' => $benchmark_id, 'productlist' => $productlist, 'weeklyreturn' => $weeklyreturn, 'tabname' => $tabname, 'datecheck' => $datecheck, 'weighttype' => $indxxType, 'curr' => $curr);
            $addIndxx = $this->Admin_model->saveIndex($table, $data);
             if($tabname=='Other Indices'){
            $companyname = $this->input->post("companyname");
            $val= array('company_id'=>$companyname,'indxx_id'=>$addIndxx);
           $this->Admin_model->insert('tbl_company_assign', $val);
            
             }
            if ($addIndxx) {
                $this->session->set_flashdata('msg', 'Index has been saved successfully, now please fill other informations');
                if ($indxxType == '0') {
                    $this->session->set_flashdata('IndxxType', '0');
                }
                redirect("admin/indxxDesc?id=$addIndxx");
            }
        }
    }

    function updateIndexx() {
        $this->checkLogin();
        $region_country = $this->input->post('region_country')?$this->input->post('region_country'):'';
        $sector = $this->input->post('sector')?$this->input->post('sector'):'';
        $indexx = $this->input->post("indexx");
        $return_type = $this->input->post("return_type");
        $name = $this->input->post("name");
        $code = $this->input->post("code");
        $meta_title = $this->input->post("meta_title");
        $meta_keywords = $this->input->post("meta_keywords");
        $meta_description = $this->input->post("meta_description");
        $benchmark_id = $this->input->post("benchmark_id");
        $weeklyreturn = $this->input->post("weeklyreturn");
        $tabname = $this->input->post("tabname");
        $datecheck = $this->input->post("datecheck");
        $weighttype = $this->input->post("weighttype");
        $curr = $this->input->post("curr");
        $indxx_name1=str_replace(" ", "-",$name);
        $indxx_name2=str_replace("&", "",$indxx_name1);
        $indxx_name3=str_replace("���", "",$indxx_name2);
        $indxx_name4=str_replace("®", "",$indxx_name3);
        $slug= $indxx_name4.'-'.$return_type;
        $updateIndxx = $this->Admin_model->update('index_description', array('slug'=>strtolower($slug)), array('indxx_id' => $indexx));
        $table = 'indxx';
        $data = array('region_country' => $region_country,'sector' => $sector,'name' => $name, 'code' => $code, 'meta_title' => $meta_title, 'meta_keywords' => $meta_keywords, 'meta_description' => $meta_description, 'benchmark_id' => $benchmark_id, 'weeklyreturn' => $weeklyreturn, 'tabname' => $tabname, 'datecheck' => $datecheck, 'weighttype' => $weighttype, 'curr' => $curr);
        $where = array('id' => $indexx);
        $updateIndxx = $this->Admin_model->update($table, $data, $where);
        $where = array('indxx_id' => $indexx);
        $delete = $this->Admin_model->delete('tbl_company_assign', $where);
        $companyname = $this->input->post("companyname");
        if($companyname!='')
        {
             $val= array('company_id'=>$companyname,'indxx_id'=>$indexx);
           $addInsights = $this->Admin_model->insert('tbl_company_assign', $val);
        }
        if ($updateIndxx) {
             $getBachName = $this->Admin_model->getRow($table, array('id'=>$benchmark_id));
			 $getDescType = $this->Admin_model->getRow('index_description', array('indxx_id'=>$benchmark_id));
             $banckName = $getBachName->name.' '.$getDescType->return_type;           
             $data = array('indxx_name' => $name, 'code' => $code, 'index_type' => $tabname,'benchmark'=>$banckName);
             $updateDecIndxx = $this->Admin_model->update('index_description', $data, array('indxx_id' => $indexx));
             if($updateDecIndxx){
            $this->session->set_flashdata('msg', 'Index has been updated successfully');
            redirect("admin/editIndex/$indexx");
             }
        }
    }

    function updateIndexxDesc() {
       $this->checkLogin();
        $indexx = $this->input->post("indexx");
        $indxx_name = $this->input->post("indxx_name");
        $indxx_desc = $this->input->post("indxx_desc");
        $code = $this->input->post("code");
        $dividend_yield = $this->input->post("dividend_yield");
        $indxx_type = $this->input->post("indxx_type");
        $return_type = $this->input->post("return_type");
        //$benchmark = $this->input->post("benchmark");
        $live_date=  $this->input->post("live_date");
        $indxx_name1=str_replace(" ", "-",$indxx_name);
        $indxx_name2=str_replace("&", "",$indxx_name1);
        $indxx_name3=str_replace("���", "",$indxx_name2);
        $indxx_name4=str_replace("®", "",$indxx_name3);
        $slug= $indxx_name4.'-'.$return_type;
        $data = array('indxx_id' => $indexx, 'indxx_name' => $indxx_name, 'code' => $code, 'index_description' => $indxx_desc, 'dividendyield' => $dividend_yield, 'index_type' => $indxx_type, 'return_type' => $return_type);
        $table = 'index_description';
        $where = array('indxx_id' => $indexx);
        $updateIndxx = $this->Admin_model->update($table, $data, $where);
        $data1 = array('dividend_yield' => $dividend_yield,'live_date' =>date('Y-m-d',strtotime($live_date)));
        $this->Admin_model->update('indxx_charecterstics', $data1, $where);
        if ($updateIndxx) {
            $this->session->set_flashdata('msg', 'Index has been updated successfully');
            redirect("admin/editIndex/$indexx");
        }
    }
    
    function updateConstituents() {
       $this->checkLogin();
        $indexx = $this->input->post("indexx");
        $is_isin = $this->input->post("is_isin");
        $is_company_name = $this->input->post("is_company_name");
        $is_all = $this->input->post("is_all");
        $is_weight = $this->input->post("is_weight");
        $is_methodology = $this->input->post("is_methodology");

        $data = array('is_all'=>$is_all,'is_company_name' => $is_company_name,'is_isin'=>$is_isin,'is_weight'=>$is_weight,'is_methodology'=>$is_methodology);
        $table = 'indxx';
        $where = array('id' => $indexx);
        $updateIndxx = $this->Admin_model->update($table, $data, $where);
        if ($updateIndxx) {
            $this->session->set_flashdata('msg', 'Index has been updated successfully');
            redirect("admin/editIndex/$indexx");
        }
    }

    function updateChar() {
       $this->checkLogin();
        $indexx = $this->input->post("indexx");
        $base_date = $this->input->post("base_date");
        $no_of_constituent = $this->input->post("no_of_constituent");
        $no_of_top_constituent = $this->input->post("no_of_top_constituent");
        $dividend_yield = $this->input->post("dividend_yield");
        $week_highlow = $this->input->post("52_week_highlow");
        $status = $this->input->post("status");
        $table = 'indxx_charecterstics';
        $data = array('base_date' => $base_date, 'no_of_constituents' => $no_of_constituent, 'no_of_top_constituents' => $no_of_top_constituent, 'dividend_yield' => $dividend_yield, '52_week_highlow' => $week_highlow, 'status' => $status);
        $where = array('indxx_id' => $indexx);
        $updateIndxx = $this->Admin_model->update($table, $data, $where);
        if ($updateIndxx) {
            $this->session->set_flashdata('msg', 'Index has been updated successfully');
            redirect("admin/editIndex/$indexx");
        }
    }

    function indxxValue() {
      $this->checkLogin();
        $getIndex = $_GET['id'];
        if ($getIndex != '') {
            $table = 'indxx';
            $where = array('id' => $getIndex);
            $indexValue = $this->Admin_model->getRow($table, $where);
            $dataValue['indxx'] = $indexValue;
            $pageTitle = 'Indxx Value';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/add_index_value', $dataValue);
        } else {
            redirect('admin/newIndxx');
        }
    }

    function indxxDesc() {
       $this->checkLogin();
        $getIndex = $_GET['id'];
        if ($getIndex != '') {
            $table = 'indxx';
            $where = array('id' => $getIndex);
            $indexValue = $this->Admin_model->getRow($table, $where);
            $benchmark_id = $indexValue->benchmark_id;
            $banchmark = $this->Admin_model->getRow($table, array('id' => $benchmark_id));
            $data1['indxx'] = $indexValue;
            $data1['banchmarkName'] = $banchmark;
            $pageTitle = 'Indxx Description';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/indxxDescription', $data1);
        } else {
            redirect("admin/newIndxx");
        }
    }
    public static function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}
    function addIndxxDesc() {
        $this->checkLogin();
        $indxx_id = $this->input->post("indxx_id");
        $config['upload_path'] = './assets/media/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;
        $config['file_name'] = $indxx_id;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $productsimage = "";
        if ($this->upload->do_upload('methodology_file')) {
            echo $productsimage = $indxx_id . '.pdf';
        }
        $live_date= $this->input->post("live_date");
        $indxx_name = $this->input->post("indxx_name");
        $indxx_desc = $this->input->post("indxx_desc");
        $code = $this->input->post("code");
        $dividend_yield = $this->input->post("dividend_yield");
        $indxx_type = $this->input->post("indxx_type");
        $return_type = $this->input->post("return_type");
        $benchmark_name = $this->input->post("benchmark");
        $benchmark_return_type = $this->input->post("benchmark_return_type");
		$benchmark = $benchmark_name." ".$benchmark_return_type;
        $indxx_name1=str_replace(" ", "-",$indxx_name);
        $indxx_name2=str_replace("", "&",$indxx_name1);
        $indxx_name3=str_replace("", "���",$indxx_name2);
        $slug= $indxx_name3.'-'.$return_type;
        
        $data = array('slug'=>strtolower($slug),'indxx_id' => $indxx_id, 'indxx_name' => $indxx_name, 'code' => $code, 'index_description' => $indxx_desc, 'dividendyield' => $dividend_yield, 'index_type' => $indxx_type, 'return_type' => $return_type, 'benchmark' => $benchmark, 'methodology' => $productsimage);
        $table = 'index_description';
        $addValue = $this->Admin_model->insert($table, $data);
        if ($addValue) {
            $indexValue = $this->Admin_model->getRow('indxx', array('id' => $indxx_id, 'weighttype' => 1));

            if ($indexValue) {
                $divin = $this->Admin_model->getRow('index_description', array('indxx_id' => $indxx_id));
                // $data2 = array('indxx' => $indxx_id, 'date' => date('Y-m-d'), 'value' => 0);
                // $addValue = $this->Admin_model->insert('indxx_values', $data2);
                $table = 'indxx_charecterstics';
                $data = array('indxx_id' => $indxx_id, 'live_date'=>date('Y-m-d',strtotime($live_date)),'base_date' => '', 'no_of_constituents' => '0', 'dividend_yield' => $divin->dividendyield, '52_week_highlow' => '0', 'status' => '1');
                $addChar = $this->Admin_model->insert($table, $data);
                if ($addChar) {
                    $this->session->set_flashdata('msg', 'Index description has been saved successfully, now please fill other information');
                    redirect("admin/indxx");
                }
            } else {
                $indexValue = $this->Admin_model->getRow('indxx', array('id' => $indxx_id));
                // $data2 = array('indxx' => $indxx_id, 'date' => date('Y-m-d'), 'value' => 0);
                // $addValue = $this->Admin_model->insert('indxx_values', $data2);
                $this->session->set_flashdata('msg', 'Index description has been saved successfully');
                redirect("admin/indxxchar?id=$indxx_id");
            }
        }
    }

    function addIndxxValue() {
        $this->checkLogin();
        $this->form_validation->set_rules('indxx', 'indxx', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('value', 'Value', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $pageTitle = 'Indxx Value';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/add_index_value');
        } else {
            $indxx = $this->input->post("indxx");
            $date = $this->input->post("date");
            $value = $this->input->post("value");
            $table = 'indxx_values';
            $data = array('indxx' => $indxx, 'date' => $date, 'value' => $value);
            $addValue = $this->Admin_model->insert($table, $data);
            if ($addValue) {
                $this->session->set_flashdata('msg', 'Index value has been saved successfully');
                redirect("admin/indxxchar?id=$indxx");
            }
        }
    }
    
        function Pages()
    {
        $this->checkLogin();
        $getDepData = $this->Admin_model->getAllResult('tbl_pages');
        $data2['pages'] = $getDepData;
        $pageTitle = 'Page';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/Pages', $data2);
    }

    function addNewPages()
    {
        $this->checkLogin();
        $pageTitle = 'Add New Page';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/addPages');
    }

    function addPages() {
        $this->checkLogin();
        $page_title = $this->input->post("page_title");
        $page_slug = $this->input->post("page_slug");
        $page_desc  = $this->input->post("page_desc");

        $data = array('title' => $page_title, 'slug'=> $page_slug, 'description' => $page_desc,  'created_on' => date('Y-m-d H:i:s'));

        $table = 'tbl_pages';
        $addOver = $this->Admin_model->insert($table, $data);
        if ($addOver) {
            $this->session->set_flashdata('msg', 'New page added successfully.');
            redirect("admin/Pages");
        }
        
    }

    function editPages() {
        $this->checkLogin();
        $pageId = $this->input->post("pageId");
        $getSingleDepart = $this->Admin_model->getRow('tbl_pages', array('id' => $pageId));
        $data2['pages'] = $getSingleDepart;
        $pageTitle = 'Edit Page Description';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/editPages', $data2);
    }

    function updatePages() {
        $this->checkLogin();
        $pageId = $this->input->post("pageId");
        $page_title = $this->input->post("page_title");
        $page_slug = $this->input->post("page_slug");
        $page_desc  = $this->input->post("page_desc");
        $data = array('title' => $page_title, 'slug' => $page_slug,'description' => $page_desc, 'updated_on' => date('Y-m-d H:i:s'));
        $where = array('id' => $pageId);

        $table = 'tbl_pages';
        $addOver = $this->Admin_model->update($table, $data, $where);
        if ($addOver) {
            $this->session->set_flashdata('msg', 'Page has been updated successfully.');
            redirect("admin/Pages");
        }
    }
    
    function deletePages() {
        $this->checkLogin();
        $pageId = $this->input->post("pageId");
        $deleteManag = $this->Admin_model->delete('tbl_pages', array('id' => $pageId));
        if ($deleteManag) {
            $this->session->set_flashdata('msg', 'Page has been deleted successfully.');
            redirect("admin/Pages");
        }
    }

    function activePages() {
        $this->checkLogin();
        $pageId = $this->input->post("pageId");
        $status = $this->input->post("status");
        if($status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $activePage = $this->Admin_model->update('tbl_pages', array('status' => $status), array('id' => $pageId));
        if ($activePage) {
            $this->session->set_flashdata('msg', 'Page status has been changed successfully.');
            redirect("admin/pages");
        }
    }
    function addTab() {
         $this->checkLogin();
        $table = 'tab_name';
        $tabName = $this->input->post("tabName");
        $data = array('name' => $tabName, 'status' => '1');
        $addValue = $this->Admin_model->insert($table, $data);
        if ($addValue) {
            $this->session->set_flashdata('msg', 'New Tab Has Been Added Successfully');
            redirect("admin/indxx");
        }
    }

    function indxxchar() {
        $this->checkLogin();
        $getIndex = $_GET['id'];
        if ($getIndex != '') {

            $indexValue = $this->Admin_model->getRow('indxx', array('id' => $getIndex));
            $value['indxx'] = $indexValue;
            $divin = $this->Admin_model->getRow('index_description', array('indxx_id' => $getIndex));
            $value['yield'] = $divin;
            $pageTitle = 'Indxx Characteristics';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/indxxchar', $value);
        } else {
            redirect("admin/indxx");
        }
    }

    function addChar() {
         $this->checkLogin();
        $this->form_validation->set_rules('indxx_id', 'indxx_id', 'trim|required');
        $this->form_validation->set_rules('base_date', 'Base Date', 'trim|required');
        $this->form_validation->set_rules('no_of_constituent', 'No Of Constituent', 'trim|required');
        $this->form_validation->set_rules('dividend_yield', 'Dividend Yield', 'trim|required');
        $this->form_validation->set_rules('high', 'High', 'trim|required');
        $this->form_validation->set_rules('no_of_top_constituent', 'No Of Top Constituent', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $pageTitle = 'Indxx Characteristics';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/indxxchar');
        } else {
            $indxx_id = $this->input->post("indxx_id");
            $base_date = $this->input->post("base_date");
            $no_of_constituent = $this->input->post("no_of_constituent");
            $dividend_yield = $this->input->post("dividend_yield");
            $high = $this->input->post("high");
            $low = $this->input->post("low");
            $no_of_top_constituent = $this->input->post("no_of_top_constituent");
            $week_highlow = $high . '/' . $low;

            $status = $this->input->post("status");
            $table = 'indxx_charecterstics';
            $data = array('indxx_id' => $indxx_id, 'base_date' => $base_date, 'no_of_constituents' => $no_of_constituent, 'no_of_top_constituents' => $no_of_top_constituent, 'dividend_yield' => $dividend_yield, '52_week_highlow' => $week_highlow, 'status' => $status);
            $addChar = $this->Admin_model->insert($table, $data);
            if ($addChar) {
                $this->session->set_flashdata('msg', 'Characteristics has been added successfully');
                redirect("admin/addRiskReturnStatistics?id=$indxx_id");
            }
        }
    }

    function getIndex() {
        $this->checkLogin();
        $keyword = $this->input->post('keyword');
        $table = 'indxx';
        $like = array('name' => $keyword);
        $orderBy = 'id';
        $this->db->select("name,id");
        $this->db->from($table);
        $this->db->like($like);
        $query = $this->db->get();
        $result = $query->result();
        echo "<ul>";
        foreach ($result as $indxx) {
            echo "<li onClick='selectCountry($indxx->id);'>";
            echo $indxx->name;
            echo "</li>";
        }
        echo "</ul>";
    }

    function indxxInsights() {
      $this->checkLogin();
        $pageTitle = 'Indxx Insights';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/indxxInsights');
    }

    function addRiskReturnStatistics() {
         $this->checkLogin();
        $getIndex = $_GET['id'];
        if ($getIndex != '') {
            $indexValue = $this->Admin_model->getRow('indxx', array('id' => $getIndex));
            $valueData['indxx'] = $indexValue;
            $pageTitle = 'Risk And Return  Statistics';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/addRiskReturnStatistics', $valueData);
        } else {
            redirect('admin/indxx');
        }
    }

    function addRiskReturnStaticsValue() {
 $this->checkLogin();
        $indxx = $this->input->post("indxx");
        for ($i = 0; $i <= 3; $i++) {
            $statistic = $this->input->post("statistic[$i]");
            $qtd = $this->input->post("qtd[$i]");
            $ytd = $this->input->post("ytd[$i]");
            $oneyear = $this->input->post("oneyear[$i]");
            $threeyear = $this->input->post("threeyear[$i]");
            $sbd = $this->input->post("sbd[$i]");

            $data[$i] = array('indxx_id' => $indxx, 'statistic' => $statistic, 'qtd' => $qtd, 'ytd' => $ytd, '1year' => $oneyear, '3year' => $threeyear, 'sbd' => $sbd);

            $table = 'indxx_risk_return_statistics';
            $addInsights = $this->Admin_model->insert($table, $data[$i]);
        }
        if ($addInsights) {
            // $activeIndex = $this->Admin_model->update('indxx',array('productlist'=>'1'),array('id'=>$indxx));
            $this->session->set_flashdata('msg', 'Index has been added successfully');
            redirect("admin/editIndex/$indxx");
        }
    }

    function addInsights() {
      $this->checkLogin();
        $this->form_validation->set_rules('TITLE', 'Title', 'trim|required');
        $this->form_validation->set_rules('DESCRIPTION', 'Description', 'trim|required');

        $this->form_validation->set_rules('RELEASE_DATE', 'Release Date', 'trim|required');
        $this->form_validation->set_rules('INSDTTM', 'INSDTTM', 'trim|required');
        $this->form_validation->set_rules('UPDTTM', 'UPDTTM', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $pageTitle = 'Indxx Insights';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/indxxInsights');
        } else {
            $TITLE = $this->input->post("TITLE");
            $DESCRIPTION = $this->input->post("DESCRIPTION");
            $RELEASE_DATE = $this->input->post("RELEASE_DATE");
            $INSDTTM = $this->input->post("INSDTTM");
            $UPDTTM = $this->input->post("UPDTTM");
            $status = $this->input->post("status");
            $file = 'file';
            $data = array('TITLE' => $TITLE, 'DESCRIPTION' => $DESCRIPTION, 'IMAGE' => $file, 'RELEASE_DATE' => $RELEASE_DATE, 'INSDTTM' => $INSDTTM, 'UPDTTM' => $UPDTTM, 'ACTIVE' => $status);

            $table = 'indxx_insights';
            $addInsights = $this->Admin_model->insert($table, $data);
            if ($addInsights) {
                $this->session->set_flashdata('msg', ' Index Insights has been added successfully');
                redirect("admin/indxxInsights");
            }
        }
    }

    function ourValue() {
         $this->checkLogin();
        $pageTitle = 'Indxx Insights';
         $data = array('pageTitle' => $pageTitle);
         $this->load->view('admin/admin_header', $data);
       
         $data1['tbl_our_value_other'] = $this->Admin_model->getAllResult('tbl_our_value_other');
         $this->load->view('admin/overvaluelist',$data1);
    }
     function ViewourValue() {
          $this->checkLogin();
         $pageTitle = 'Indxx Insights';
         $data = array('pageTitle' => $pageTitle);
         $this->load->view('admin/admin_header', $data);
         $data1['tbl_our_value'] = $this->Admin_model->getAllResult('tbl_our_value');
        
         $this->load->view('admin/ourValue',$data1);
    }
    function DeleteourValueOther() {
         $this->checkLogin();
       $id  = $this->input->post("id");
        $table = 'tbl_our_value_other';
        $where = array('id' => $id);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete) {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
            redirect("admin/ourValue");
        }
    }
    function addOurValue() {
 $this->checkLogin();
        $heading = $this->input->post("Heading");
        $videourl = $this->input->post("videourl");
        $Title = $this->input->post("Title");
       
//set preferences
       
        $data = array('heading' => $heading, 'description' => $Title, 'video_url' => $videourl);
        $table = 'tbl_our_value';
        $this->db->empty_table($table);

       
        $addvalues = $this->Admin_model->insert($table, $data);
        if ($addvalues) {
            $this->session->set_flashdata('msg', 'Our value text has been updated successfully.');
            redirect("admin/ourValue");
        }
    }
   function  UpdateOurValueOther()
    {
        $this->checkLogin();
        $id  = $this->input->post("valid");
        $pageTitle = 'Indxx Insights';
         $data = array('pageTitle' => $pageTitle);
         $this->load->view('admin/admin_header', $data);
         $data1['tbl_our_value'] = $this->Admin_model->getAllResult('tbl_our_value');
          $data1['tbl_our_value_other']  = $this->Admin_model->getRow('tbl_our_value_other', array('id' => $id));
       
         $this->load->view('admin/ourValue',$data1);   
    }
    function  EditOurValueOther()
    {
         $this->checkLogin();
        $heading1 = $this->input->post("heading1");
        $heading2 = $this->input->post("heading2");
        $text = $this->input->post("text");
        $valid  = $this->input->post("valid");
         $config['upload_path'] = './uploads/value/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $upload_data = $this->upload->data();
   
        $file = $upload_data['file_name'];
        if($file!=''){
        $data = array('heading1' => $heading1,'heading2' => $heading2, 'text' => $text,'image'=>$file);
        }
        else
        {
             $data = array('heading1' => $heading1,'heading2' => $heading2, 'text' => $text);  
        }
        $table = 'tbl_our_value_other';
         $where = array('id' => $valid);
        $addother = $this->Admin_model->update($table, $data,$where);
      
        if ($addother) {
            $this->session->set_flashdata('msg', 'Our value text has been Added successfully.');
            redirect("admin/ourValue");
        } 
    }
    function addOurValueOther() {
       $this->checkLogin();
        $heading1 = $this->input->post("heading1");
        $heading2 = $this->input->post("heading2");
        $text = $this->input->post("text");
        
         $config['upload_path'] = './uploads/value/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $upload_data = $this->upload->data();
   
        $file = $upload_data['file_name'];

        $data = array('heading1' => $heading1,'heading2' => $heading2, 'text' => $text,'image'=>$file);
        $table = 'tbl_our_value_other';
        $addother = $this->Admin_model->insert($table, $data);
        if ($addother) {
            $this->session->set_flashdata('msg', 'Our value text has been Added successfully.');
            redirect("admin/ourValue");
        }
    }

    function management() {
         $this->checkLogin();
        $getManagData = $this->Admin_model->getAllResult('tbl_management');
        $data2['mang'] = $getManagData;
        $pageTitle = 'Management';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/management', $data2);
    }

    function addManagement() {
         $this->checkLogin();
        $name = $this->input->post("name");
        $designation = $this->input->post("designation");
        $about = $this->input->post("about");
        $department = $this->input->post("department");

//set preferences
        $config['upload_path'] = './uploads/management/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '1000';
//load upload class library
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
// case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            print_r($upload_error);
        } else {
            $upload_data = $this->upload->data();
            $file = $upload_data['file_name'];
            $data = array('name' => $name, 'department' => $department, 'designation' => $designation, 'about' => $about, 'image' => $file);

            $table = 'tbl_management';
            $addOver = $this->Admin_model->insert($table, $data);
            if ($addOver) {
                $this->session->set_flashdata('msg', 'New member has been updated successfully.');
                redirect("admin/management");
            }
        }
    }

    function editManag() {
         $this->checkLogin();
        $managId = $this->input->post("managId");
        $getSingleManag = $this->Admin_model->getRow('tbl_management', array('id' => $managId));
        $data2['mang'] = $getSingleManag;
        $data2['department'] = $this->db->where('status','1')->get('tbl_department')->result();
        $pageTitle = 'Edit Management';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/edit_management', $data2);
    }

    function updateManagement() {
         $this->checkLogin();
        $name = $this->input->post("name");
        $department = $this->input->post("department");
        $designation = $this->input->post("designation");
        $about = $this->input->post("about");
        $manId = $this->input->post("id");
        $imgValue = $this->input->post("imgValue");

//set preferences
        $config['upload_path'] = './uploads/management/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '1000';
//load upload class library
        $this->load->library('upload', $config);
 if (!$this->upload->do_upload('file')) {
// case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            print_r($upload_error);
            
        }
        $upload_data = $this->upload->data();
        $fileUpload = $upload_data['file_name'];
        if ($fileUpload == '') {
            $file = $imgValue;
        } else {
            $file = $fileUpload;
        }
        $data = array('name' => $name, 'department' => $department, 'designation' => $designation, 'about' => $about, 'image' => $file);
        $where = array('id' => $manId);

        $table = 'tbl_management';
        $addOver = $this->Admin_model->update($table, $data, $where);
        if ($addOver) {
            $this->session->set_flashdata('msg', 'Member has been updated successfully.');
            redirect("admin/management");
        }
    }

    function deleteManag() {
         $this->checkLogin();
        $manId = $this->input->post("managId");
        $deleteManag = $this->Admin_model->delete('tbl_management', array('id' => $manId));
        if ($deleteManag) {
            $this->session->set_flashdata('msg', 'Member has been deleted successfully.');
            redirect("admin/management");
        }
    }
    
    function activeManag() {
        $this->checkLogin();
        $manId = $this->input->post("managId");
        $status = $this->input->post("status");
        if($status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $activeManag = $this->Admin_model->update('tbl_management', array('status' => $status), array('id' => $manId));
        if ($activeManag) {
            $this->session->set_flashdata('msg', 'Member`s status has been changed successfully.');
            redirect("admin/management");
        }
    }
    
    function department()
    {
        $this->checkLogin();
        $getDepData = $this->Admin_model->getAllResult('tbl_department');
        $data2['department'] = $getDepData;
        $pageTitle = 'Department';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/department', $data2);
    }

    function addNewDepartment()
    {
         $this->checkLogin();
        $pageTitle = 'Add Department';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/addDepartment');
    }

    function addDepartment() {
         $this->checkLogin();
        $department_name = $this->input->post("department_name");

        $data = array('department_name' => $department_name, 'entry_dt' => date('Y-m-d H:i:s'));

            $table = 'tbl_department';
            $addOver = $this->Admin_model->insert($table, $data);
            if ($addOver) {
                $this->session->set_flashdata('msg', 'New department insert successfully.');
                redirect("admin/department");
            }
        
    }

    function editDepart() {
         $this->checkLogin();
        $departId = $this->input->post("departId");
        $getSingleDepart = $this->Admin_model->getRow('tbl_department', array('department_id' => $departId));
        $data2['depart'] = $getSingleDepart;
        $pageTitle = 'Edit Department';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/edit_department', $data2);
    }

    function updateDepartment() {
         $this->checkLogin();
        $department_id = $this->input->post("department_id");
        $department_name = $this->input->post("department_name");
        $about = $this->input->post("about");
        $data = array('department_name' => $department_name, 'update_dt' => date('Y-m-d H:i:s'));
        $where = array('department_id' => $department_id);

        $table = 'tbl_department';
        $addOver = $this->Admin_model->update($table, $data, $where);
        if ($addOver) {
            $this->session->set_flashdata('msg', 'Department has been updated successfully.');
            redirect("admin/department");
        }
    }

    function deleteDepart() {
         $this->checkLogin();
        $departId = $this->input->post("departId");
        $deleteManag = $this->Admin_model->delete('tbl_department', array('department_id' => $departId));
        if ($deleteManag) {
            $this->session->set_flashdata('msg', 'Department has been deleted successfully.');
            redirect("admin/department");
        }
    }
    
    function activeDepart() {
        $this->checkLogin();
        $departId = $this->input->post("deptId");
        $status = $this->input->post("status");
        if($status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $activeManag = $this->Admin_model->update('tbl_department', array('status' => $status), array('department_id' => $departId));
        if ($activeManag) {
            $this->session->set_flashdata('msg', 'Department has been activated/deactivated successfully.');
            redirect("admin/department");
        }

    }
    function careers() {
         $this->checkLogin();
        $open = $this->Admin_model->resultByOrd('tbl_careers', 'id');

        $data1['opening'] = $open;
        $pageTitle = 'Indxx Careers';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/careers', $data1);
    }
 function UpdateCareers()
    {
         $this->checkLogin();
        $pageTitle = 'Indxx Careers';
        $table = 'tbl_careers';
        $id = $this->input->post("opId");
        $where = array('id' => $id);


        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $data['career'] = $this->Admin_model->getRow($table, $where);
        $this->load->view('admin/EditCareers', $data);
    }
    function EditCareer()
    {
       $this->checkLogin();
        $position_name = $this->input->post("position_name");
        $mission = $this->input->post("mission");
        $location = $this->input->post("location");
        $type = $this->input->post("type");
        $others = $this->input->post("others");
         $id = $this->input->post("id");
        $data = array('position_name' => $position_name, 'mission' => $mission, 'location' => $location, 'type' => $type, 'others' => $others, 'status' => 1);
        $table = 'tbl_careers';
       
        $where =array('id' => $id);
        $addOver = $this->Admin_model->update($table, $data, $where);
        if ($addOver) {
            $this->session->set_flashdata('msg', ' position has been Edited successfully.');
            redirect("admin/careers");
        } 
    }
    function addOpenings() {
         $this->checkLogin();
        $position_name = $this->input->post("position_name");
        $mission = $this->input->post("mission");
        $location = $this->input->post("location");
        $type = $this->input->post("type");
        $others = $this->input->post("others");
        $data = array('position_name' => $position_name, 'mission' => $mission, 'location' => $location, 'type' => $type, 'others' => $others, 'status' => 1);
        $table = 'tbl_careers';
        $addOver = $this->Admin_model->insert($table, $data);
        if ($addOver) {
            $this->session->set_flashdata('msg', 'New position has been added successfully.');
            redirect("admin/careers");
        }
    }

    function editopen() {
         $this->checkLogin();
        $opId = $this->input->post("opId");
        $status = $this->input->post("status");
        $magopen = $this->Admin_model->update('tbl_careers', array('status' => $status), array('id' => $opId));
        if ($magopen) {
            $this->session->set_flashdata('msg', 'Position status has been added successfully.');
            redirect("admin/careers");
        }
    }

    function editIndex($indexx='') {
      
       
        $where = array('status' => '1');
         $company = $this->Admin_model->getResult('tbl_company', $where);
        $data1['company'] = $company;
        if (!$this->session->userdata('adminId') == '') {
            if ($this->input->post("indexId") != 0 || $indexx!='') {
               if($indexx!='')
               {
                   $indexId = $indexx; 
               }
               else
               {
                    $indexId = $this->input->post("indexId");
               }
               $companydata= array();
               $companydata = $this->Admin_model->getRow('tbl_company_assign', array('indxx_id' => $indexId));
               if(isset($companydata)) {
                   if(count($companydata)>0)
                   {
                      $data1['selectedcompany']= $companydata->company_id;
                   }
                   else
                   {
                       $data1['selectedcompany']='';
                   }
               }
                $pageTitle = 'New Indxx';
                $data = array('pageTitle' => $pageTitle);
                $indxx = $this->Admin_model->getRow('indxx', array('id' => $indexId));
                $where = array('index_type' => 'Benchmark');
                $getBanchmark = $this->Admin_model->getResult('index_description', $where);
                //$getBanchmark = $this->Admin_model->getAllResult('tbl_benchmark');
                $data1['banchmark'] = $getBanchmark;
                $data1['indxx'] = $indxx;
                $where = array('status' => '1');
                $tab = $this->Admin_model->getResult('tab_name', $where);
                $data1['tab'] = $tab;
                $data1['indexId'] = $indexId;
                $data1['costotentValue'] = $this->input->post("costotent");
                $risk_return = $this->Admin_model->getResult('indxx_risk_return_statistics', array('indxx_id' => $indexId));
                $data1['risk'] = $risk_return;

                $where = array('indxx_id' => $indexId);
                $indxx_charecterstics = $this->Admin_model->getRow('indxx_charecterstics', $where);
                $data1['divin'] = $this->Admin_model->getRow('index_description', array('indxx_id' => $indexId));
                $data1['value'] = $this->Admin_model->getRow('indxx_values', array('indxx' => $indexId));
                $data1['indexxValue'] = $this->Admin_model->getRow('indxx', array('id' => $indexId));
                //$data1['charecterstics'] = $this->Admin_model->getRow('indxx_charecterstics', array('id'=>$indexId));
                $indxx_top_5_constituents = $this->Admin_model->getResult('indxx_top_5_constituents', $where);
                $data1['charecterstics'] = $indxx_charecterstics;
                $data1['indxx_top_5_constituents'] = $indxx_top_5_constituents;
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/editIndex', $data1);
            } else {
                redirect('admin/indxx');
            }
        } else {
            redirect('admin/index');
        }
    }

    function AddConstitument() {
        $this->checkLogin();
        $indexId = $this->input->post("indexId");
        $where = array('indxx_id' => $indexId);
        $constituents = $this->Admin_model->getRow('indxx_charecterstics', $where);
        $no_of_constituents = $constituents->no_of_top_constituents;

        // $no_of_constituents = $this->input->post("no_of_constituents");
        $id = $this->input->post("id[1]");
        if ($id) {

            for ($i = 1; $i <= $no_of_constituents; $i++) {

                $id1[$i] = $this->input->post("id[$i]");
                $constituent[$i] = $this->input->post("constituent[$i]");
                $ISIN[$i] = $this->input->post("ISIN[$i]");
                $weight[$i] = $this->input->post("weight[$i]");
                $cdate[$i] = $this->input->post("cdate[$i]");
                $indexId = $this->input->post("indexId");
                $table = 'indxx_top_5_constituents';
                $data[$i] = array('constituent' => $constituent[$i], 'cdate' => $cdate[$i], 'ISIN' => $ISIN[$i], 'weight' => $weight[$i], 'indxx_id' => $indexId);
                $where = array('id' => $id1[$i]);
                $addValue = $this->Admin_model->update($table, $data[$i], $where);
                $this->session->set_flashdata('msg', ' Constituent has been Updated successfully.');
            }
        } else {


            for ($i = 1; $i <= $no_of_constituents; $i++) {
                $constituent[$i] = $this->input->post("constituent[$i]");
                $ISIN[$i] = $this->input->post("ISIN[$i]");
                $weight[$i] = $this->input->post("weight[$i]");
                $cdate[$i] = $this->input->post("cdate[$i]");
                $indexId = $this->input->post("indexId");
                $table = 'indxx_top_5_constituents';

                $data[$i] = array('constituent' => $constituent[$i], 'cdate' => date('Y-m-d'), 'ISIN' => $ISIN[$i], 'weight' => $weight[$i], 'indxx_id' => $indexId);

                $addValue = $this->Admin_model->insert($table, $data[$i]);
                $this->session->set_flashdata('msg', 'New Constituent has been Added successfully.');
            }
        }

        redirect('/admin/indxx');
    }

    function updateRisk() {
       $this->checkLogin();
        $risk_id = $this->input->post("risk_id");
        $statistic = $this->input->post("statistic");
        $qtd = $this->input->post("qtd");
        $ytd = $this->input->post("ytd");
        $one_year = $this->input->post("1year");
        $three_year = $this->input->post("3year");
        $sbd = $this->input->post("sbd");
        $table = 'indxx_risk_return_statistics';
        $where = array('id' => $risk_id);
        $data = array('qtd' => $qtd, 'ytd' => $ytd, '1year' => $one_year, '3year' => $three_year, 'sbd' => $sbd);
        $updateRisk = $this->Admin_model->update($table, $data, $where);
        if ($updateRisk) {
            $this->session->set_flashdata('msg', 'Risk & Return has been Added successfully.');
            redirect('/admin/indxx');
        }
    }
        function updateRiskByStatics() {
       $this->checkLogin();
        $risk_indxx_id = $this->input->post("risk_indxx_id");
        $statistic = $this->input->post("statistic");
        $qtd = $this->input->post("qtd");
        $ytd = $this->input->post("ytd");
        $one_year = $this->input->post("1year");
        $three_year = $this->input->post("3year");
        $sbd = $this->input->post("sbd");
        $table = 'indxx_risk_return_statistics';
        // $where = array('id' => $risk_id);
        $data = array('indxx_id'=>$risk_indxx_id,'qtd' => $qtd, 'ytd' => $ytd, '1year' => $one_year, '3year' => $three_year, 'sbd' => $sbd,'statistic'=>$statistic);
        
        $updateRisk = $this->Admin_model->insert($table, $data);

        if ($updateRisk) {
            $this->session->set_flashdata('msg', 'Risk & Return has been Added successfully.');
            redirect('/admin/indxx');
        }
    }
    

    function delete() {
       $this->checkLogin();
        $indexId = $this->input->post("indexId");
        $table = 'indxx';
        $where = array('id' => $indexId);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete) {


            $deleteDesc = $this->Admin_model->delete('index_description', array('indxx_id' => $indexId));
            if ($deleteDesc) {
                $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
                redirect("admin/indxx");
            }
        }
    }

    function UploadMethodology() {
         $this->checkLogin();
        $indexId = $this->input->post("indexId");
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;
        $config['file_name'] = $indexId;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $productsimage = "";
        if ($this->upload->do_upload('methodology_file')) {
            echo $productsimage = 'assets/images/' . $this->upload->data('file_name');
        } else {
            echo 'fdf';
        }
        exit;
    }
    function checkIndxxValueByDate($indexId,$date)
    {
         $query = $this->db->query("select * from indxx_values where indxx='$indexId' and date='$date'");
         return $query->num_rows();
    }
    function uploadValue() {
       $this->checkLogin();
        $indexId = $this->input->post("indexId");
        $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        $data = array();
        $total = count($file_data);
        $count = '0';
        //       $where = array('indxx' => $indexId);
        // $delete = $this->Admin_model->delete('indxx_values', $where);
      
      
        foreach ($file_data as $row) {
          
             $count++;
         $value = $row["value"];
         $date = date("Y-m-d", strtotime($row["date"]));
     

            // print_r($date);
         $num_row= $this->checkIndxxValueByDate($indexId,$date);
          if($num_row>0) {
            $sql = "update indxx_values set value='$value',closemarketcap='0',closedivisor='0',closecount='0',adjmarketcap='0',adjdivisor='0',adjcount='0',indxxdivident='0' where  indxx='$indexId' and date='$date' ";
            }
            else
            {
                $sql = "insert into indxx_values (indxx,date,value,closemarketcap, closedivisor,closecount,adjmarketcap,adjdivisor,adjcount,indxxdivident)
          values ('$indexId','$date','$value', '0', '0', '0', '0', '0', '0', '0')";    
            }
            if($date!='' ||  $value!='') {
            $insert = $this->db->query($sql);
            }
            if ($count == $total) {
           
                $where = array('indxx' => $indexId);
                $getBase = $this->Admin_model->getBase($where);

                $baseDate = $getBase->date;

                $baseDate = date("m/d/Y", strtotime($baseDate));

                $minValue = $this->Admin_model->getMin($indexId);
                $maxValue = $this->Admin_model->getMax($indexId);
                $b = $minValue->b;
                $a = $maxValue->a;
                $min = number_format($b, 0, '.', '');
                $max = number_format($a, 0, '.', '');
                $highLowValue = $max . '/' . $min;

                $data = array('base_date' => $baseDate, '52_week_highlow' => $highLowValue);

                $fact = $this->Admin_model->update('indxx_charecterstics', $data, array('indxx_id' => $indexId));

                $this->session->set_flashdata('msg', 'Data has been updated Successfully.');
                redirect("admin/editIndex/$indexId");
            }
        }
    }

    function uploadConstituent() {
         $this->checkLogin();
        $indexId = $this->input->post("indexId");
        $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        $data = array();
        $total = count($file_data);
        $count = '0';
        $where = array('indxx_id' => $indexId);
        $delete = $this->Admin_model->delete('indxx_top_5_constituents', $where);
        foreach ($file_data as $row) {
            $count++;
            $csv = array(
                'constituent' => $row["constituent"],
                'isin' => $row["isin"],
                'weight' => $row["weight"],
                'cdate' => $row["cdate"]
            );
            
            $constituent = stripslashes($row["constituent"]);
            $isin = $row["isin"];
            $weight = $row["weight"];
            $cdate = $row["cdate"];
            
            $ins_data = array(
                'indxx_id' => $indexId,
                'constituent' => $constituent,
                'ISIN' => $isin,
                'weight' => $weight,
                'cdate' => $cdate
                );
            $insert = $this->db->insert('indxx_top_5_constituents',$ins_data); //rahul
            // $sql = "insert into indxx_top_5_constituents (indxx_id,constituent,isin,weight,cdate)values ('$indexId','$constituent','$isin', '$weight', '$cdate')";
            // $insert = $this->db->query($sql);
            if ($count == $total) {
                    $check = $this->Admin_model->getRow('indxx_charecterstics', array('indxx_id' => $indexId));
                 if($check)
                 {
                    $oldcount= $check->no_of_constituents;
                     $total=$total+$oldcount;
                 }
                
                $data = array('no_of_constituents' => $total);
                $this->Admin_model->update('indxx_charecterstics', $data, array('indxx_id' => $indexId));

                //$highLow = 
                $this->session->set_flashdata('msg', 'Constituents has been uploaded successfully.');
              redirect("admin/editIndex/$indexId");
            }
        }
    }

    function uploadFactsheets() {
        $this->checkLogin();
        $indxx_id = $this->input->post("indexId");
        $config['upload_path'] = './assets/factsheets/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;
        $config['file_name'] = 'factsheets' . $indxx_id;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $productsimage = "";
        $factsheetsName = $productsimage = 'assets/factsheets/' . $this->upload->data('file_name');
         
         if (file_exists($factsheetsName.'.pdf')) {
         
        unlink($factsheetsName.'.pdf');
    }
            if ($this->upload->do_upload('uploadFactsheets')) {
            $factsheetsName = $productsimage = 'assets/factsheets/' . $this->upload->data('file_name');
            $data = array('indxx_id' => $indxx_id, 'fact_sheet' => $factsheetsName);
            $table = 'tbl_index_other_information';
            $check = $this->Admin_model->checkCount($table, array('indxx_id' => $indxx_id));
            
            if ($check == '0') {
                $fact = $this->Admin_model->insert($table, $data);
            } else {
                $data = array('fact_sheet' => $factsheetsName);
                $fact = $this->Admin_model->update($table, $data, array('indxx_id' => $indxx_id));
            }
            if ($fact) {

                $this->session->set_flashdata('msg', 'Factsheets has been uploaded successfully.');
               redirect("admin/editIndex/$indxx_id");
            }
        } else {
            $this->session->set_flashdata('msg', 'Factsheets Not uploaded successfully.');
              redirect("admin/editIndex/$indxx_id");
        }
        exit;
    }
    
    //Amol
    function uploadMethodologyPdf() {
         $this->checkLogin();
        $indxx_id = $this->input->post("indexId");
        $get_index = $this->Admin_model->getRow('index_description', array('indxx_id' => $indxx_id));

        $this->load->helper("file");
        $path= './assets/media/'.$get_index->methodology;
        unlink($path);
        $config['upload_path'] = './assets/media/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;
        $config['file_name'] = $this->input->post("methodologyFile");
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $productsimage = "";
        if ($this->upload->do_upload('methodologyFile')) {
            $methodologyName = $this->upload->data('file_name');
            $table = 'index_description';
            $data = array('methodology' => $methodologyName);
            $method = $this->Admin_model->update($table, $data, array('indxx_id' => $indxx_id));
            if ($method) {
                $this->session->set_flashdata('msg', 'Methodology has been uploaded successfully.');
                 redirect("admin/editIndex/$indexx");
            }
        } else {
           $this->session->set_flashdata('msg', 'Something went to wrong. Please try again later.');
                 redirect("admin/editIndex/$indexx");
        }
        exit;
    }

    function updateYield() {
        $this->checkLogin();
        $indexId = $this->input->post("indexx");
         $yield = $this->input->post("yield");
        $table = 'indxx';
       
        $where = array('id' => $indexId);
        $productlist =  $getreq = $this->Admin_model->getRow('indxx', $where);
        if($productlist->productlist==1) {
             $data = array('productlist' => 2);
        }
 else {
      $data = array('productlist' => 1);
 }
        $updateYield = $this->Admin_model->update($table, $data, $where);
        if ($updateYield) {
//            $this->session->set_flashdata('msg', 'Index status has been updated successfully.');
//            redirect("admin/indxx");
        }
    }

    function clientSlider() {
       $this->checkLogin();
        $getClient = $this->Admin_model->getAllResult('tbl_client_slider');
        $data1['client'] = $getClient;
        $pageTitle = 'Client Slider';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/clientSlider', $data1);
    }

    function addClient() {
      $this->checkLogin();
        $client = rand(10, 50);
        $config['upload_path'] = './assets/images/client';
        $config['allowed_types'] = 'jpg|png|svg|jpeg';
        $config['max_size'] = 10000;
        $config['file_name'] = $this->input->post("client_file");
        ;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $productsimage = "";
        if ($this->upload->do_upload('client_file')) {
            $url = $this->input->post("url");
            $imageName = $productsimage = 'assets/images/client/' . $this->upload->data('file_name');
            $table = 'tbl_client_slider';
            $data = array('url' => $url, 'image' => $imageName);
            $addClient = $this->Admin_model->insert($table, $data);
            if ($addClient) {

                $this->session->set_flashdata('msg', 'New client has been added successfully.');
                redirect("admin/clientSlider");
            }
        } else {
            echo 'Image not uploded due to incorrect format';
        }
        exit;
    }

    function deleteClient() {
 $this->checkLogin();
        $clientId = $this->input->post("clientId");
        $table = 'tbl_client_slider';
        $where = array('id' => $clientId);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete == TRUE) {
            $this->session->set_flashdata('msg', 'Client has been deleted successfully.');
            redirect("admin/clientSlider");
        }
    }

    function editClient() {
        $this->checkLogin();
        $clientId = $this->input->post("clientId");
        $getClient = $this->Admin_model->getRow('tbl_client_slider', array('id' => $clientId));
        $data1['client'] = $getClient;
        $pageTitle = 'Client Slider';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/editClient', $data1);
    }

    function updateClient() {
 $this->checkLogin();
        $clientId = $this->input->post("clientId");
        $config['upload_path'] = './assets/images/client';
        $config['allowed_types'] = 'jpg|png|svg|jpeg';
        $config['max_size'] = 10000;
        $config['file_name'] = $this->input->post("client_file");
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $productsimage = "";
        $url = $this->input->post("url");
        if ($this->upload->do_upload('client_file')) {
           
            $imageName = $productsimage = 'assets/images/client/' . $this->upload->data('file_name');
            $table = 'tbl_client_slider';
            $where = array('id' => $clientId);
            $data = array('url' => $url, 'image' => $imageName);
            $updateClient = $this->Admin_model->update($table, $data, $where);
            if ($updateClient) {
                $this->session->set_flashdata('msg', 'New client has been updated successfully.');
                redirect("admin/clientSlider");
            }
        }
 else  {
    $table = 'tbl_client_slider';
            $where = array('id' => $clientId);
            $data = array('url' => $url);
            $updateClient = $this->Admin_model->update($table, $data, $where);
            if ($updateClient) {
                $this->session->set_flashdata('msg', 'New client has been updated successfully.');
                redirect("admin/clientSlider");
            }
            redirect("admin/clientSlider");
 }
    }

    function contect() {
 $this->checkLogin();
        $contact = $this->Admin_model->getAllResult('tbl_conact_us');
        $data1['contact'] = $contact;
        $pageTitle = 'Contact Request';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/contactRequest', $data1);
    }

    function deleteRequest() {
        $this->checkLogin();
        $reqId = $this->input->post("reqId");
        $table = 'tbl_conact_us';
        $where = array('id' => $reqId);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete == TRUE) {
            $this->session->set_flashdata('msg', 'Client has been deleted successfully.');
            redirect("admin/contect");
        }
    }

    function viewRequest() {
         $this->checkLogin();
        $reqId = $this->input->post("reqId");
        $getreq = $this->Admin_model->getRow('tbl_conact_us', array('id' => $reqId));
        $data1['req'] = $getreq;
        $pageTitle = 'View Request';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/viewRequest', $data1);
    }

    function newsletter() {
         $this->checkLogin();
        $news = $this->Admin_model->getAllResult('tbl_newsletter');
        $data1['news'] = $news;
        $pageTitle = 'News Letter';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/newsletter', $data1);
    }

    function deleteNews() {
         $this->checkLogin();
        $newsId = $this->input->post("newsId");
        $table = 'tbl_newsletter';
        $where = array('id' => $newsId);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete == TRUE) {
            $this->session->set_flashdata('msg', 'Client has been deleted successfully.');
            redirect("admin/newsletter");
        }
    }

    function ourServices() {
         $this->checkLogin();
        $services = $this->Admin_model->getAllResult('tbl_our_services');
        $data1['service'] = $services;
        $pageTitle = 'Add Our Service';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/ourService', $data1);
    }

    function uploadMethodologyPdfV1() {
         $this->checkLogin();
        $indxx_id = $this->input->post("indexId");
        $config['upload_path'] = './assets/media/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10000;
        $config['file_name'] = $this->input->post("methodologyFile");
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $productsimage = "";
        if ($this->upload->do_upload('methodologyFile')) {
            $methodologyName = $this->upload->data('file_name');
            $table = 'index_description';
            $data = array('methodology' => $methodologyName);
            $method = $this->Admin_model->update($table, $data, array('indxx_id' => $indxx_id));
            if ($method) {
                $this->session->set_flashdata('msg', 'Methodology has been uploaded successfully.');
                 redirect("admin/editIndex/$indexx");
            }
        } else {
            echo '';
        }
        exit;
    }

    function addServices() {
         $this->checkLogin();
        $config['upload_path'] = './assets/images/service';
        $config['allowed_types'] = 'jpg|png|svg|jpeg';
        $config['max_size'] = 10000;
        $config['file_name'] = $this->input->post("file");
        ;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $productsimage = "";
        if ($this->upload->do_upload('file')) {
            $heading = $this->input->post("heading");
            $serviceText = $this->input->post("serviceTest");
            $imageName = 'assets/images/service/' . $this->upload->data('file_name');
            $url = $this->input->post("url");
            $table = 'tbl_our_services';
            $data = array('heading' => $heading, 'serviceText' => $serviceText, 'image' => $imageName, 'url' => $url);
            $addServices = $this->Admin_model->insert($table, $data);
            if ($addServices) {

                $this->session->set_flashdata('msg', 'Service has been added successfully.');
                redirect("admin/ourServices");
            }
        } else {
            echo '';
        }
        exit;
    }

    function deleteService() {
        $this->checkLogin();
        $serviceId = $this->input->post("serviceId");
        $table = 'tbl_our_services';
        $where = array('id' => $serviceId);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete == TRUE) {
            $this->session->set_flashdata('msg', 'Service has been deleted successfully.');
            redirect("admin/ourServices");
        }
    }

    function dynamicCon() {
 $this->checkLogin();
        $indexId = $this->input->post("indexx");
        $no_of_top_constituents = $this->input->post("no_of_top_constituents");
        $check = $this->Admin_model->checkCount('indxx_charecterstics', array('indxx_id' => $indexId));
        $table = "indxx_charecterstics";
        $data = array('no_of_top_constituents' => $no_of_top_constituents);
        $where = array('indxx_id' => $indexId);
        if ($check == '0') {
            $add = $this->Admin_model->insert($table, $data);
            if ($add) {
                $this->session->set_flashdata('msg', 'No of top constituents has been added successfully.');
                redirect("admin/indxx");
            }
        } else {
            $updaeC = $this->Admin_model->update($table, $data, $where);
            $this->session->set_flashdata('msg', 'No of top constituents has been updated successfully.');
            redirect("admin/indxx");
        }
    }

    function application() {
        $this->checkLogin();
        $open = $this->Admin_model->resultByOrd('tbl_candidate_applyed', 'id');

        $data1['opening'] = $open;
        $pageTitle = 'Indxx Careers';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/application', $data1);
    }

    function calculate() {
        if (!$this->session->userdata('adminId') == '') {
            $data1['get_benchmark'] = $this->Admin_model->getCalculateData('Benchmark');
            $data1['get_esg'] = $this->Admin_model->getCalculateData('Esg');
            $data1['get_income'] = $this->Admin_model->getCalculateData('Income');
            $data1['get_strategy'] = $this->Admin_model->getCalculateData('Strategy');
            $data1['get_thematic'] = $this->Admin_model->getCalculateData('Thematic');
            $data1['get_other'] = $this->Admin_model->getCalculateData('Other Indices');

            $pageTitle = 'Add Indxx';
            $data = array('pageTitle' => $pageTitle);
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/calculate', $data1);
        } else {

            redirect('admin/index');
        }
    }

    function addHomeNews() {
         $this->checkLogin();
        $email = $this->input->post("email");
        $table = 'tbl_newsletter';
        $data = array('email' => $email);
        $addNews = $this->Admin_model->insert($table, $data);
        if ($addNews) {
            echo ("<script LANGUAGE='JavaScript'>
    window.alert('You have been successfully subscribed to our newsletter.');
    window.location.href='<?php echo base_url(); ?>';
    </script>");
        }
    }
    function calenderlist()
    {
         $this->checkLogin();
         $pageTitle = 'Notification List';
        $data = array('pageTitle' => $pageTitle);
        $data['calenderlist'] = $this->Admin_model->getAllResult('tbl_calander');
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/Calenderlist');
        
    }
    function NotificationList() {
         $this->checkLogin();
        $pageTitle = 'Notification List';
        $data = array('pageTitle' => $pageTitle);
        $data['notificationlist'] = $this->Admin_model->getAllResult('tbl_announcements_notification');
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/NotificationList');
    }
    
   function  editnotification()
   {
        $this->checkLogin();
        $pageTitle = 'Edit Document';
        $table = 'tbl_announcements_notification';
        $id = $this->input->post("newsid");
        $where = array('id' => $id);
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $data['notification'] = $this->Admin_model->getRow($table, $where);
       
        $this->load->view('admin/editnotifications', $data);
   }
    function notifications() {
        if (!$this->session->userdata('adminId') == '') {

            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('year', 'Year', 'trim|required');  

            if ($this->form_validation->run() == FALSE) {
                $pageTitle = 'Notifications';
                $data = array('pageTitle' => $pageTitle);
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/add_notifications');
            } else {
                $title = $this->input->post("title");
                $url = $this->input->post("url");
                $year = $this->input->post("year");
                $ye= date('Y',strtotime($year));
                $date = date('Y-m-d');
                $year = date('Y-m-d',strtotime($year));
                $config['upload_path'] = './assets/images/media/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = 100000;
                    $config['file_name'] = $this->input->post("file");
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $productsimage = "";
                    $this->upload->do_upload('file');
                    $pdfFile = $this->upload->data('file_name');              
                
                
                $data = array('title' => $title, 'url' => $url, 'date' => $year, 'DateAdded' => $date,'pdf'=>$pdfFile,'year'=>$ye);
                //print_r($data);
                $addNotifications = $this->Admin_model->insert('tbl_announcements_notification', $data);
                if ($addNotifications) {
                    $this->session->set_flashdata('msg', 'Notifications has been added successfully.');
                    redirect("admin/NotificationList");
                }
            }
        } else {
            redirect('admin/index');
        }
    }
   function updateCalendar()
   {
          if (!$this->session->userdata('adminId') == '') {
           $notfiid = $this->input->post("notfiid");
             $where = array('id' => $notfiid);
              $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('year', 'Year', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $pageTitle = 'Add Document';
                $data = array('pageTitle' => $pageTitle);
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/add_calendar');
            } else {


                $title = $this->input->post("title");
                $year = $this->input->post("year");
                $ye= date('Y',strtotime($year));

                 $year=date('Y-m-d',strtotime($year));
                $date= date('Y-m-d');
                $config['upload_path'] = './assets/media/calendar';
                $config['allowed_types'] = 'pdf|doc|png|jpg';
                $config['max_size'] = 10000;
                $config['file_name'] = $this->input->post("file");
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $productsimage = "";
                $this->upload->do_upload('file');
                $pdfFile = $this->upload->data('file_name');
                
                 if($pdfFile!='') {
                $data = array('title' => $title, 'date' => $year, 'pdf' => $pdfFile,'year'=>$ye,'created_on'=>$date);
                }
                else
                {
                $data = array('title' => $title, 'date' => $year,'year'=>$ye,'created_on'=>$date);  
                }
             
                 $doc =  $this->Admin_model->update('tbl_calander', $data, $where);
                if ($doc) {
                    $this->session->set_flashdata('msg', 'Calendar has been added successfully.');
                    redirect("admin/calenderlist");
                }
            }
        } else {
            redirect('admin/index');
        }
   }
    
    function updatenotifications()
   {
          if (!$this->session->userdata('adminId') == '') {
          $notfiid = $this->input->post("notfiid");
             $where = array('id' => $notfiid);
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('year', 'Year', 'trim|required');  

            if ($this->form_validation->run() == FALSE) {
                $pageTitle = 'Notifications';
                $data = array('pageTitle' => $pageTitle);
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/add_notifications');
            } else {
                $title = $this->input->post("title");
                $url = $this->input->post("url");
                $year = $this->input->post("year");
                $year = date('Y-m-d',strtotime($year));
               $ye= date('Y',strtotime($year));
                $date = date('Y-m-d');
                $config['upload_path'] = './assets/images/media/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = 100000;
                    $config['file_name'] = $this->input->post("file");
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    $productsimage = "";
                    $this->upload->do_upload('file');
                    $pdfFile = $this->upload->data('file_name');              
                if($pdfFile!='')
                {
                $data = array('title' => $title, 'url' => $url, 'date' => $year, 'DateAdded' => $date,'pdf'=>$pdfFile,'year'=>$ye);
                }
                else
                {
                   $data = array('title' => $title, 'url' => $url, 'date' => $year, 'DateAdded' => $date,'year'=>$ye); 
                }
                $addNotifications =  $this->Admin_model->update('tbl_announcements_notification', $data, $where);
                
                if ($addNotifications) {
                    $this->session->set_flashdata('msg', 'Notifications has been added successfully.');
                    redirect("admin/NotificationList");
                }
            }
        } else {
            redirect('admin/index');
        }
   }
 function Documentlist() {
      $this->checkLogin();
        $pageTitle = 'Notification List';
        $data = array('pageTitle' => $pageTitle);
        $data['documents'] = $this->Admin_model->getAllResult('tbl_documents');
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/Documentlist');
    }
//    function NotificationList()
//    {
//          $pageTitle = 'Notification List';
//        $data = array('pageTitle' => $pageTitle);
//        $data['notificationlist'] = $this->Admin_model->getAllResult('tbl_announcements_notification');
//        $this->load->view('admin/admin_header', $data);
//        $this->load->view('admin/NotificationList');
//    }
    
          function  DeleteNotification()
          {
               $this->checkLogin();
          $pressid = $this->input->post("newsid");
        $table = 'tbl_announcements_notification';
        $where = array('id' => $pressid);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete) {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
            redirect("admin/NotificationList");
          }
          }
       function Deletecalendar()
       {
            $this->checkLogin();
          $pressid = $this->input->post("newsid");
        $table = 'tbl_calander';
        $where = array('id' => $pressid);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete) {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
            redirect("admin/calenderlist");
        }  
       }
          function Deletedocument() {
               $this->checkLogin();
        $pressid = $this->input->post("newsid");
        $table = 'tbl_documents';
        $where = array('id' => $pressid);
        $delete = $this->Admin_model->delete($table, $where);
        if ($delete) {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
            redirect("admin/Documentlist");
        }
    }
    function editcalendar()
    {
         $this->checkLogin();
         $pageTitle = 'Edit Calender';
        $table = 'tbl_calander';
        $id = $this->input->post("newsid");
        $where = array('id' => $id);


        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $data['calendar'] = $this->Admin_model->getRow($table, $where);
       
        $this->load->view('admin/add_calendar', $data);
    }
     function  editdocument()
   {
         $this->checkLogin();
       $pageTitle = 'Edit Document';
        $table = 'tbl_documents';
        $id = $this->input->post("newsid");
        $where = array('id' => $id);


        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $data['document'] = $this->Admin_model->getRow($table, $where);
        $this->load->view('admin/add_document', $data);
   }
   function updatedocument()
   {
        $this->checkLogin();
      $newsid = $this->input->post("newsid");  
         $title = $this->input->post("title");
                $url = $this->input->post("url");
                $year = $this->input->post("year");
                $ye= date('Y',strtotime($year));
                $date= date('Y-m-d');
                $config['upload_path'] = './assets/media/document';
                $config['allowed_types'] = 'pdf|doc|png|jpg';
                $config['max_size'] = 10000;
                $config['file_name'] = $this->input->post("file");
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $productsimage = "";
                $this->upload->do_upload('file');
                $pdfFile = $this->upload->data('file_name');
                if($pdfFile==''){
                $data = array('title' => $title, 'url' => $url, 'Doc_date' => $year, 'creted_at'=>$date,'year'=>$ye);
                }
            else {
                  $data = array('title' => $title, 'url' => $url, 'Doc_date' => $year, 'document' => $pdfFile,'creted_at'=>$date,'year'=>$ye);
                }
                $where= array('id'=>$newsid);
                $doc = $this->Admin_model->update('tbl_documents', $data, $where);
                if ($doc) {
                    $this->session->set_flashdata('msg', 'Document has been added successfully.');
                    redirect("admin/Documentlist");
                }
   }
    function document() {
        if (!$this->session->userdata('adminId') == '') {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('year', 'Year', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $pageTitle = 'Add Document';
                $data = array('pageTitle' => $pageTitle);
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/add_document');
            } else {

                $title = $this->input->post("title");
                $url = $this->input->post("url");
                $year = $this->input->post("year");
                $ye= date('Y',strtotime($year));
                $date= date('Y-m-d');
                $config['upload_path'] = './assets/media/document';
                $config['allowed_types'] = 'pdf|doc|png|jpg';
                $config['max_size'] = 10000;
                $config['file_name'] = $this->input->post("file");
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $productsimage = "";
                $this->upload->do_upload('file');
                $pdfFile = $this->upload->data('file_name');
                $data = array('title' => $title, 'url' => $url, 'Doc_date' => $year, 'document' => $pdfFile,'creted_at'=>$date,'year'=>$ye);
                $doc = $this->Admin_model->insert('tbl_documents', $data);
                if ($doc) {
                    $this->session->set_flashdata('msg', 'Document has been added successfully.');
                    redirect("admin/Documentlist");
                }
            }
        } else {
            redirect('admin/index');
        }
    }

    function calendar() {
        if (!$this->session->userdata('adminId') == '') {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('year', 'Year', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $pageTitle = 'Add Document';
                $data = array('pageTitle' => $pageTitle);
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/add_calendar');
            } else {


                $title = $this->input->post("title");
                $year = $this->input->post("year");
                $year =  date('Y-m-d',strtotime($year));
                $ye= date('Y',strtotime($year));
                $date= date('Y-m-d');
                $config['upload_path'] = './assets/media/calendar';
                $config['allowed_types'] = 'pdf|doc|png|jpg';
                $config['max_size'] = 10000;
                $config['file_name'] = $this->input->post("file");
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $productsimage = "";
                $this->upload->do_upload('file');
                $pdfFile = $this->upload->data('file_name');
                $data = array('title' => $title, 'date' => $year, 'pdf' => $pdfFile,'year'=>$ye,'created_on'=>$date);
                $doc = $this->Admin_model->insert('tbl_calander', $data);
                if ($doc) {
                    $this->session->set_flashdata('msg', 'Calendar has been added successfully.');
                    redirect("admin/calenderlist");
                }
            }
        } else {
            redirect('admin/index');
        }
    }

    function addNewManagement()
    {
         $this->checkLogin();
         $data1['department'] = $this->db->where('status','1')->get('tbl_department')->result();
        $pageTitle = 'Add Management';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/addManagement',$data1);


    }

    //  52weekCalculation

    function script()
    {
        $this->load->view('admin/updateFiftyTwo');
    }

    function updateBaseData()
    {
         $this->checkLogin();
        $getIndxx = $this->Admin_model->getAllResult('indxx');
        foreach ($getIndxx as $value) {
          $indexId = $value->id;
          //echo $indexId;
           $sql = $this->db->query("SELECT MIN(`date`) as 'base' FROM `indxx_values` WHERE `indxx` = '".$indexId."' ");
           $getBase =  $sql->result();
           foreach ($getBase as  $value) {
              $date = $value->base; 
              $finelDate = date('Y-m-d', strtotime($date));  
              // echo $finelDate."<br>";                      
                        
                $sql = $this->db->query("UPDATE `indxx_charecterstics` SET `base_date` = '".$finelDate."'  WHERE `indxx_id` = '".$indexId."'");
               
                if($sql)
                {
                    echo "<script>alert('date update');</script>";
                }
           }


      }
        
    }

    function updateFiftyTow()
    {
        
        $getIndxx = $this->Admin_model->getAllResult('indxx');
        foreach ($getIndxx as $value) {
          $indexId = $value->id;
      
          $where = array('indxx'=>$indexId);
                $getBase = $this->Admin_model->getBase($where);  
              
//                $baseDate = $getBase->date;;
       
//      $baseDate= date("m/d/Y", strtotime($baseDate));
     
     $minValue = $this->Admin_model->getMin($indexId);
             $maxValue = $this->Admin_model->getMax($indexId); 
             $b = $minValue->b;
             $a = $maxValue->a;
             $min = number_format($b, 0, '.', '');
             $max = number_format($a, 0, '.', '');
              $highLowValue = $max.'/'.$min;
             
//              $data = array('base_date' => $baseDate,'52_week_highlow'=>$highLowValue);      
                  $data = array('52_week_highlow'=>$highLowValue);      
             
             $fact = $this->Admin_model->update('indxx_charecterstics', $data, array('indxx_id' => $indexId));

        }
        
    }
    
    public function add_faq_pdf()
    {
        $this->checkLogin();
        $pageTitle = 'FAQ';
        $data = array('pageTitle' => $pageTitle);
        $this->load->view('admin/admin_header', $data);
        $res['row'] = $this->db->get('tbl_faq_pdf')->row_array();
        $res['faq'] = $this->db->get('tbl_faq_pdf')->result();
        $this->load->view('admin/add_faq_pdf',$res);
    }

    public function SubmitFaqPdf()
    {
        // echo "<pre>";
        // print_r($_FILES); die;
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('tbl_faq_pdf');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|csv';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            //echo "hi"; //die;
            $upload_error = array('error' => $this->upload->display_errors());
            $pageTitle = 'Add Overview';
            $data = array('pageTitle' => $pageTitle);
            $errorMsg = $upload_error;
            $pagedata['errorMsg'] = $errorMsg;
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/add_faq_pdf', $pagedata);
            
        } else {
            // echo "upload"; die;
            $upload_data = $this->upload->data();
            $file = $upload_data['file_name'];
            $data = array('faq_pdf' => $file, 'entry_dt' => date('Y-m-d H:i:s'));
            $table = 'tbl_overview_text';
          
            $addOver = $this->Admin_model->insert('tbl_faq_pdf', $data);
            if ($addOver) {
                $this->session->set_flashdata('msg', 'FAQ pdf has been Submit successfully.');
                redirect("admin/add_faq_pdf");
            }
        }
    }

    function logout() {
        $adminId = '';
        $this->session->unset_userdata($adminId);
        $this->session->sess_destroy();
        redirect('admin/index', 'refresh');
    }

}

//End of Class
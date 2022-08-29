<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Indices extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
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

    public function benchmark() {
        $this->session->set_userdata('site_lang',  "english");
        $column = 'indxx_name';
        
        $column = 'indxx_name';
        $where = array('index_type' => 'Benchmark', 'return_type' => 'TR');
        $data['get_indices'] = $this->indice->getResultByOrdInd2('Benchmark');
        $data['regionCountry'] = $this->db->where('status','1')->get('tbl_regionCountry')->result();
        $data['sector'] = $this->db->where('status','1')->get('tbl_sector')->result();
        
        $allcompany = $this->indice->gettabledata('tbl_company', '*', '', '', $where);
        $data['allcompany'] = $allcompany;
     
        $data['page'] = 'indices';
    
        $this->load->view('benchmark_indices', $data);
    
    }
    
    public function esg() {
        $this->session->set_userdata('site_lang',  "english");
        $column = 'indxx_name';
        $where = array('index_type' => 'ESG', 'return_type' => 'TR');
        $data['get_esg'] = $this->indice->getResultByOrdInd2('Esg');
        
        $allcompany = $this->indice->gettabledata('tbl_company', '*', '', '', $where);
        $data['allcompany'] = $allcompany;
     
        $data['page'] = 'indices';
    
        $this->load->view('esg_indices', $data);
    
    }
    
    public function income() {
        $this->session->set_userdata('site_lang',  "english");
        $column = 'indxx_name';
        $where = array('index_type' => 'Income', 'return_type' => 'TR');
        $data['get_income'] = $this->indice->getResultByOrdInd2('Income');
        
        $allcompany = $this->indice->gettabledata('tbl_company', '*', '', '', $where);
        $data['allcompany'] = $allcompany;
     
        $data['page'] = 'indices';
    
        $this->load->view('income_indices', $data);
    
    }
    
    public function strategy() {
        $this->session->set_userdata('site_lang',  "english");
        
        $column = 'indxx_name';
        $where = array('index_type' => 'Strategy', 'return_type' => 'TR');
        $data['get_strategy'] = $this->indice->getResultByOrdInd2('Strategy');
        
        $allcompany = $this->indice->gettabledata('tbl_company', '*', '', '', $where);
        $data['allcompany'] = $allcompany;
     
        $data['page'] = 'indices';
    
        $this->load->view('strategy_indices', $data);
    
    }
    
    
    
    public function thematic() {
        $this->session->set_userdata('site_lang',  "english");
        $column = 'indxx_name';
        $where = array('index_type' => 'Thematic', 'return_type' => 'TR');
        $data['get_thematic'] = $this->indice->getResultByOrdInd2('Thematic');
        
        $allcompany = $this->indice->gettabledata('tbl_company', '*', '', '', $where);
        $data['allcompany'] = $allcompany;
     
        $data['page'] = 'indices';
    
        $this->load->view('thematic_indices', $data);
    
    }
    
    public function digital_asset() {
        $this->session->set_userdata('site_lang',  "english");
        $column = 'indxx_name';
        $where = array('index_type' => 'Digital Asset', 'return_type' => 'PR');
        $data['get_digital'] = $this->indice->getResultByOrdInd3('Digital Asset');
        
        $allcompany = $this->indice->gettabledata('tbl_company', '*', '', '', $where);
        $data['allcompany'] = $allcompany;
     
        $data['page'] = 'indices';
    
        $this->load->view('digital_asset_indices', $data);
    
    }
    
    public function other() {
        $this->session->set_userdata('site_lang',  "english");
        $column = 'indxx_name';
        $where = array('index_type' => 'Others', 'return_type' => 'TR');
        $data['get_others'] = $this->indice->getResultByOrdInd2('Other Indices');
        $where = " order by company_name asc";
        
        $allcompany = $this->indice->gettabledata('tbl_company', '*', '', '', $where);
        $data['allcompany'] = $allcompany;
     
        $data['page'] = 'indices';
    
        $this->load->view('other_indices', $data);
    
    }

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
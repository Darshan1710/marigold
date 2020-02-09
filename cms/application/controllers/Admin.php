<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
    }

    public function index() {
        $this->load->view('login.php');
    }

    public function registerView() {
        $this->load->view('register.php');
    }

    public function AddRegister() {
        $this->AdminModel->AddRegister();
    }

    public function login() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $filter = array('username' => $username,
                        'password' =>$password);
        $result = $this->AdminModel->getUserDetails($filter);
        if ($result) {

                $logdata = array(
                    'logged_in' => TRUE,
                    'username'  => $result['username'],
                    'user_id'   => $result['id'],
                    'permission'=> $result['permission']
                );

                $this->session->set_userdata($logdata);
                // $data['dashboard'] = $this->AdminModel->getDashboardData();
                
                $todays_date = date('Y-m-d');
                $week_first_date = date('Y-m-d',strtotime('+1 days'));
                $week_last_date  = date('Y-m-d',strtotime('+7 days'));

                


                $dashboard_data = $this->AdminModel->getDashboardCountData();
                $count_data = $this->AdminModel->getDashboardDetails();
                $weekly_data = $this->AdminModel->getWeeklyBirthdayList($week_first_date,$week_last_date);


            

                $data['dashboard']['number_of_customer'] = isset($count_data['number_of_customer']) ? $count_data['number_of_customer'] : 0;
                $data['dashboard']['number_of_feedback'] = isset($dashboard_data['number_of_feedback']) ? $dashboard_data['number_of_feedback'] : 0;
                $data['dashboard']['birthday_count'] = isset($count_data['birthday_count']) ? $count_data['birthday_count'] : 0;
                $data['dashboard']['anniversary_count'] = isset($count_data['anniversary_count']) ? $count_data['anniversary_count'] : 0;
                $data['dashboard']['weekly_birthday_count'] = isset($weekly_data['weekly_birthday_count']) ? $weekly_data['weekly_birthday_count'] : 0;
                $data['dashboard']['weekly_anniversary_count'] = isset($weekly_data['weekly_anniversary_count']) ? $weekly_data['weekly_anniversary_count'] : 0;


                $data['dashboard']['question_1']        = isset($dashboard_data['question_1']) ?  round(($dashboard_data['question_1'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2)  : 0;
                $data['dashboard']['question_2'] = isset($dashboard_data['question_2']) ?  round(($dashboard_data['question_2'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
                $data['dashboard']['question_3'] = isset($dashboard_data['question_3']) ?  round(($dashboard_data['question_3'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
                $data['dashboard']['question_4'] = isset($dashboard_data['question_4']) ?  round(($dashboard_data['question_4'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
                $data['dashboard']['question_5'] = isset($dashboard_data['question_5']) ?  round(($dashboard_data['question_5'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
                $data['dashboard']['question_6'] = isset($dashboard_data['question_6']) ?  round(($dashboard_data['question_6'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
                $data['dashboard']['question_7'] = isset($dashboard_data['question_7']) ?  round(($dashboard_data['question_7'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
                $data['dashboard']['question_8'] = isset($dashboard_data['question_8']) ?  round(($dashboard_data['question_8'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
                $data['dashboard']['question_9'] = isset($dashboard_data['question_9']) ?  round(($dashboard_data['question_9'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;

                $dates = $this->AdminModel->getDates();

                

                $first_date = date('Y-m-d',strtotime('-7 days'));
                $last_date  = date('Y-m-d');

                // $first_date = !empty($dates['first_date']) ? $dates['first_date'] : date('Y-m-d',strtotime('-7 days'));
                // $last_date  = !empty($dates['last_date']) ? $dates['last_date'] : date('Y-m-d');
                $type       = 'DATE';

                $rating_data = $this->AdminModel->getDashboardData($first_date,$last_date,$type);


                $daily_rating = array();
                $i = 0;
                $count = 0;
                foreach($rating_data as $row){
                    
                    $daily_rating[$i]['created_at'] = date('d-m-Y',strtotime($row['created_at']));
                    $daily_rating[$i]['question_1'] = round(($row['question_1'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_2'] = round(($row['question_2'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_3'] = round(($row['question_3'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_4'] = round(($row['question_4'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_5'] = round(($row['question_5'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_6'] = round(($row['question_6'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_7'] = round(($row['question_7'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_8'] = round(($row['question_8'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_9'] = round(($row['question_9'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $i++;
                }
                  

                $data['rating']     = $daily_rating;
                $data['start_date'] = $first_date;
                $data['end_date']   = $last_date;
                $data['type']       = $type;

                $this->load->view('dashboard', $data);
        } else {
            $this->load->view('login.php');
        }   
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        $this->load->view('login.php');
    }
    
     public function enquiryView() {
        $data['result'] = $this->AdminModel->getEnquiry();
        $data['main_view'] = 'enquiry';
        $this->load->view('base_template_admin', $data);
    }
    public function customerList(){
        $this->load->view('customerList');   
    }
    public function getCustomerListDetails(){

         $data = $row = array();
    
  
        // Fetch member's records
        $memData = $this->AdminModel->getCustomerDetailsRows($_POST);
        
        $i = $_POST['start'];
        foreach($memData as $member){

            $i++;

            $filter = array('family_id'=>$member->id);
            $family_exists = $this->AdminModel->getFamilyDetailsData($filter);


            $birthdate = $member->birthdate == '1970-01-01' ? '0000-00-00' : date('d-m-Y',strtotime($member->birthdate));
            $anniversary_date = $member->anniversary_date == '1970-01-01' ? '0000-00-00' : date('d-m-Y',strtotime($member->anniversary_date));

            $action = '<div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" data-toggle="modal" data-target="#edit_modal" class="dropdown-item editCustomer" id="'.$member->id.'"><i class="icon-file-pencil"></i>Edit</a>
                            
                            
                            </div>
                        </div>
                    </div>';

            $feedback = '<a href="#" data-toggle="modal" data-target="#modal_scrollable" id='.$member->id.' class="getDates">'.$member->feedback_count.'</a>';


            $family = empty($family_exists) ? '<a href="#">Not Available</a>' : '<a href="'.base_url().'Admin/familyListDetails/'.$member->id.'" target="_blank">Family</a>';

            $data[] = array($member->mobile,
                            $i,
                            $member->name, 
                            $member->mobile,
                            $member->email,
                            $birthdate,
                            $anniversary_date,
                            date('d-m-Y h:i A',strtotime($member->created_at)),
                            $feedback,
                            $family,
                            $action
                        );
        }



        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->AdminModel->countAllCustomerDetails(),
            "recordsFiltered" => $this->AdminModel->countFilteredCustomerDetails($_POST),
            "data" => $data,
        );  
        
        // Output to JSON format
        echo json_encode($output);
    }
    public function viewFeedbackDetails(){
        $id = $this->uri->segment(3);
        $filter = array('r.id'=>$id);
        $data['feedback']   = $this->AdminModel->getFeedbackDetails($filter);


        $this->load->view('viewFeedbackDetails',$data);
    }
    public function viewPreviousFeedbackDetails(){
        $id = $this->uri->segment(3);
        $filter = array('rating_id'=>$id);
        $data['feedback']   = $this->AdminModel->getPreviousFeedbackDetails($filter);

        $this->load->view('viewPreviousFeedbackDetails',$data);
    }
    public function viewFeedback(){
        $data['feedback'] = $this->AdminModel->getFeedbackData();
        $data['main_view'] = 'viewFeedback';
        $this->load->view('base_template_admin',$data);
    }
    public function importFeedbackForm(){
        $this->load->view('importFeedbackForm');
    }

    public function importFeedbackData(){
        $this->form_validation->set_rules('file','','callback_file_check');
        if($this->form_validation->run()){

                $new_image_name = time().str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['file']['name']);

                $config['upload_path']      = 'uploads/document/';
                $config['allowed_types']    = 'csv';
                $config['file_name']        = $new_image_name;
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';
                $config['$min_width']       = '0';
                $config['min_height']       = '0';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $upload = $this->upload->do_upload('file');
                if(!$upload)
                {
                    $data['error'] = true;
                    $data['imageError'] =  $this->upload->display_errors();
                    
                }else{
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);


                    if(!empty($csvData)){
                        $insertCount = $updateCount = $rowCount = $notAddCount = 0;

                        foreach($csvData as $row){

                            $rowCount++;

                            $customer_data = array('name'        =>$row['Name'],
                                             'mobile'            =>$row['Mobile'],
                                             'email'             =>$row['Email'],
                                             'birthdate'         =>date('Y-m-d',strtotime($row['Birth Date'])),
                                             'anniversary_date'  =>date('Y-m-d',strtotime($row['Anniversary Date'])),
                                             'created_at'        =>!empty($row['Created At']) ? date('Y-m-d h:i:s',strtotime($row['Created At'])) : date('Y-m-d h:i:s'), 
                                         );

                            $add_contact = $this->AdminModel->addRegistration($customer_data);
                            
                            $rating_data = array('customer_id'  =>$add_contact,
                                                 'question_1'   =>!empty($row['Quality']) ? $row['Quality'] : 3,
                                                 'question_2'   =>!empty($row['Cleanliness']) ? $row['Cleanliness'] : 3,
                                                 'question_3'   =>!empty($row['Service']) ? $row['Service'] : 3,
                                                 'question_4'   =>!empty($row['Friendliness']) ? $row['Friendliness'] : 3,
                                                 'question_5'   =>!empty($row['Appearance']) ? $row['Appearance'] : 3,
                                                 'question_6'   =>!empty($row['Value']) ? $row['Value'] : 3,
                                                 'question_7'   =>!empty($row['Design']) ? $row['Design'] : 3,
                                                 'question_8'   =>!empty($row['Question 8']) ? $row['Question 8'] : '',
                                                 'question_9'   =>!empty($row['Question 9']) ? $row['Question 9'] : '',
                                                 'question_10'  =>!empty($row['Question 10']) ? $row['Question 10'] : '',
                                                 'table_id'     =>!empty($row['Table']) ? $row['Table'] : '50',
                                                 'comment'      =>!empty($row['Comment']) ? $row['Comment'] : '',
                                                 'created_at'   =>!empty($row['Created At']) ? date('Y-m-d h:i:s',strtotime($row['Created At'])) : date('Y-m-d h:i:s'),
                                              );

                            

                            $add_rating = $this->AdminModel->addRating($rating_data);
                            if($add_rating){
                                $insertCount++;
                            }

                        }

                        $notAddCount = $rowCount - $insertCount;

                        $data['notAddCount'] = $notAddCount;
                        $data['rowCount']    = $rowCount;
                        $data['insertCount'] = $insertCount;
                        $data['message']     = 'Import Successfully';

                        $this->load->view('importFeedbackForm',$data);
                    }               
                }

        }else{
            $this->load->view('importFeedbackForm');
        }

    }

    public function dashboard(){
        $dashboard_data = $this->AdminModel->getDashboardCountData();

        $week_first_date = date('Y-m-d',strtotime('+1 days'));
        $week_last_date  = date('Y-m-d',strtotime('+7 days'));

        $weekly_data = $this->AdminModel->getWeeklyBirthdayList($week_first_date,$week_last_date);

        $count_data = $this->AdminModel->getDashboardDetails();

        $data['dashboard']['number_of_customer'] = isset($count_data['number_of_customer']) ? $count_data['number_of_customer'] : 0;
        $data['dashboard']['number_of_feedback'] = isset($dashboard_data['number_of_feedback']) ? $dashboard_data['number_of_feedback'] : 0;
        $data['dashboard']['birthday_count'] = isset($count_data['birthday_count']) ? $count_data['birthday_count'] : 0;
        $data['dashboard']['anniversary_count'] = isset($count_data['anniversary_count']) ? $count_data['anniversary_count'] : 0;
        $data['dashboard']['weekly_birthday_count'] = isset($weekly_data['weekly_birthday_count']) ? $weekly_data['weekly_birthday_count'] : 0;
        $data['dashboard']['weekly_anniversary_count'] = isset($weekly_data['weekly_anniversary_count']) ? $weekly_data['weekly_anniversary_count'] : 0;


        $data['dashboard']['question_1']        = isset($dashboard_data['question_1']) ?  round(($dashboard_data['question_1'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2)  : 0;
        $data['dashboard']['question_2'] = isset($dashboard_data['question_2']) ?  round(($dashboard_data['question_2'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
        $data['dashboard']['question_3'] = isset($dashboard_data['question_3']) ?  round(($dashboard_data['question_3'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
        $data['dashboard']['question_4'] = isset($dashboard_data['question_4']) ?  round(($dashboard_data['question_4'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
        $data['dashboard']['question_5'] = isset($dashboard_data['question_5']) ?  round(($dashboard_data['question_5'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
        $data['dashboard']['question_6'] = isset($dashboard_data['question_6']) ?  round(($dashboard_data['question_6'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
        $data['dashboard']['question_7'] = isset($dashboard_data['question_7']) ?  round(($dashboard_data['question_7'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
        $data['dashboard']['question_8'] = isset($dashboard_data['question_8']) ?  round(($dashboard_data['question_8'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;
        $data['dashboard']['question_9'] = isset($dashboard_data['question_9']) ?  round(($dashboard_data['question_9'] / ($dashboard_data['number_of_feedback'] * 5) * 5),2) : 0;

        $dates = $this->AdminModel->getDates();

        $first_date = date('Y-m-d',strtotime('-7 days'));
        $last_date  = date('Y-m-d');
        $type       = 'DATE';

       
        if(isset($_POST['date_picker']) && !empty($_POST['date_picker'])){
            $dates            = explode('-',$_POST['date_picker']);
            $first_date       = date('Y-m-d',strtotime($dates['0']));
            $last_date         = date('Y-m-d',strtotime($dates['1']));
        }

        
        if(!empty($_POST['type'])){
            $type  = $this->input->post('type');
        }


        $rating_data = $this->AdminModel->getDashboardData($first_date,$last_date,$type);


        $daily_rating = array();
        $i = 0;
        $count = 0;
        foreach($rating_data as $row){
                    
                    $daily_rating[$i]['created_at'] = date('d-m-Y',strtotime($row['created_at']));
                    $daily_rating[$i]['question_1'] = round(($row['question_1'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_2'] = round(($row['question_2'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_3'] = round(($row['question_3'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_4'] = round(($row['question_4'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_5'] = round(($row['question_5'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_6'] = round(($row['question_6'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_7'] = round(($row['question_7'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_8'] = round(($row['question_8'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $daily_rating[$i]['question_9'] = round(($row['question_9'] * 5) / ($row['no_of_customer'] * 5),2) ;
                    $i++;
                }
          
        $data['rating']    = $daily_rating;
        $data['date_picker'] = isset($_POST['date_picker']) ? $_POST['date_picker'] : '';
        $data['type']       = $type;

  
        $this->load->view('dashboard',$data);
    }
    public function getRatingList(){
        $data['rating']    = $this->AdminModel->getRatingDetails();
        $this->load->view('ratingList',$data);
    }
    public function getRatingDetails(){
        
        // echo "<pre>";
        // print_r($_POST);exit;
        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->AdminModel->getRatingDetailsRows($_POST);
        
         // echo $this->db->last_query();exit;
        $i = $_POST['start'];
        foreach($memData as $member){

            $i++;

            $data[] = array($member->mobile,
                            $i,
                            $member->name, 
                            $member->mobile,
                            $member->email,
                            $member->question_1,
                            $member->question_2,
                            $member->question_3,
                            $member->question_4,
                            $member->question_5,
                            $member->question_6,
                            $member->question_7,
                            $member->question_8,
                            $member->question_9,
                            $member->comment,
                            $member->table_name,
                            date('d-m-Y h:i A',strtotime($member->created_at))
                        );
        }



        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->AdminModel->countAllRatingDetails(),
            "recordsFiltered" => $this->AdminModel->countFilteredRatingDetails($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);

    }
    
    public function getCustomerFeedbackDates(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
        if($this->form_validation->run()){
            $id = $this->input->post('id');

            $filter = array('c.id'=>$id);
            $result = $this->AdminModel->getCustomerFeedbackDates($filter);
            

            if($result){
                $data = '';
                foreach($result as $row){
                    $data .= '<tr><td><a href="'.base_url().'Admin/viewFeedbackDetails/'.$row['id'].'" target="_blank">'.$row['created_at'].'</a></td></tr>';
                }

                $returnArr['errCode'] = -1;
                $returnArr['data']    = $data;
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['data']    = 'No data Available';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);
    }

    public function getCustomerCouponsUsage(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
        if($this->form_validation->run()){
            $id = $this->input->post('id');

            $filter = array('c.id'=>$id);
            $result = $this->AdminModel->getCustomerCouponsUsage($filter);
            

            if($result){
                $data = '';
                foreach($result as $row){
                    $data .= '<tr>'.
                                  '<td>'.$row['coupen'].'</td>'.
                                  '<td>'.$row['bill_amount'].'</td>'.
                                  '<td>'.$row['discount'].'</td>'.
                                  '<td>'.$row['created_at'].'</td>'.
                             '</tr>';
                }

                $returnArr['errCode'] = -1;
                $returnArr['data']    = $data;
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['data']    = 'No data Available';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);
    }

    public function editCustomer(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
        if($this->form_validation->run()){
            $id = $this->input->post('id');

            $filter = array('id'=>$id);
            $result = $this->AdminModel->getCustomerDetails($filter);

            $result['birthdate'] = $result['birthdate'] == '1970-01-01' ?  '0000-00-00' : date('d-m-Y',strtotime($result['birthdate']));
            $result['anniversary_date'] = $result['anniversary_date'] == '1970-01-01' ? '0000-00-00' : date('d-m-Y',strtotime($result['anniversary_date']));

            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['data']    = $result;
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['data']    = 'No data Available';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function updateCustomer(){ 
        $this->form_validation->set_rules('id','id','required|trim|xss_clean');
        $this->form_validation->set_rules('name','Name','required|trim|xss_clean');
        $this->form_validation->set_rules('mobile','Mobile','required|trim|xss_clean|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email');
        if($this->form_validation->run()){
            $input_data = $this->input->post();


            $filter = array('id'            =>$input_data['id']);
            $data = array('name'            => $input_data['name'],
                          'mobile'          => $input_data['mobile'],
                          'email'           => $input_data['email'],
                          'birthdate'       => empty($input_data['birthdate']) ? '0000-00-00' : date('Y-m-d',strtotime($input_data['birthdate'])),
                          'anniversary_date'=> empty($input_data['anniversary_date']) ? '0000-00-00' : date('Y-m-d',strtotime($input_data['anniversary_date']))
                            );
            $result = $this->AdminModel->updateCustomer($filter,$data);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['message']    = 'Customer Updated Successfully';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['message']    = 'Error Occur';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function messageLogsList(){
        $data['main_view'] = 'message/messageLogList';
        $this->load->view('base_template_admin',$data);
    }
    public function getMessageLogList(){

        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->AdminModel->getMessageLogsDetailsRows($_POST);
        
        // echo $this->db->last_query();exit;
        $i = $_POST['start'];
        foreach($memData as $member){

            $i++;

            $recieved_status = $member->recieved_status == 1 ? 'Recived' : 'Not Recived';
            $data[] = array($i,
                            $member->mobile, 
                            $member->message,
                            $recieved_status,
                            date('d-m-Y h:i A',strtotime($member->created_at))
                        );
        }



        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->AdminModel->countAllMessageLogDetails(),
            "recordsFiltered" => $this->AdminModel->countFilteredMessageLogDetails($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);

    }
    public function importContactForm(){
        $data['main_view'] = 'importContactForm';
        $this->load->view('base_template_admin',$data);
    }

    public function importContactData(){
        $this->form_validation->set_rules('file','','callback_file_check');
        if($this->form_validation->run()){

                $new_image_name = time().str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['file']['name']);

                $config['upload_path']      = 'uploads/document/';
                $config['allowed_types']    = 'csv';
                $config['file_name']        = $new_image_name;
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';
                $config['$min_width']       = '0';
                $config['min_height']       = '0';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $upload = $this->upload->do_upload('file');
                if(!$upload)
                {
                    $data['error'] = true;
                    $data['imageError'] =  $this->upload->display_errors();
                    echo "<pre>";
                    print_r($data);exit;
                }else{
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);


                    if(!empty($csvData)){
                        $insertCount = $updateCount = $rowCount = $notAddCount = 0;

                        foreach($csvData as $row){

                            $rowCount++;

                            $memData = array('mobile'        =>$row['Mobile'],
                                             'filter'        =>isset($row['Filter']) ? $row['Filter'] : '1'
                                            );

                            $add_contact = $this->AdminModel->addContacts($memData);
                            if($add_contact){
                                $insertCount++;
                            }

                        }

                        $notAddCount = $rowCount - $insertCount;

                        $data['notAddCount'] = $notAddCount;
                        $data['rowCount']    = $rowCount;
                        $data['insertCount'] = $insertCount;
                        $data['message']     = 'Import Successfully';

                        $this->load->view('contactList',$data);
                    }               
                }

        }else{
            $this->load->view('importContactForm',$data);
        }

    }
    public function addContactData(){
        $this->form_validation->set_rules('filter','Filter','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('contacts_numbers','contacts','required');
        if($this->form_validation->run()){
            $input_data = $this->input->post();

            $filter = $input_data['filter'];
            $contacts = explode(',',$input_data['contacts_numbers']);

            $insertCount = 0;
            foreach($contacts as $number){
                if(preg_match('/^[0-9]{10}+$/', $number)){
                    $contacts_data = array('filter'    =>$filter,
                                             'mobile'    =>$number,
                                             'status'    =>1
                                            );
                     $add_contacts = $this->AdminModel->addContacts($contacts_data);

                     if($add_contacts){
                        $insertCount++;
                     }    
                     
                }
            }    
        
            if($insertCount != 0){
                $returnArr['errCode'] = -1;
                $returnArr['message'] = $insertCount.' record inserted';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['errCode'] = 'failed';
            }
            
        }else{
            $returnArr['errCode'] = 3;
            foreach ($this->input->post() as $key => $value) {
                $returnArr['message'][$key] = form_error($key);
            }
        }
        echo json_encode($returnArr);
    }


    //
    
    /*
     * Callback function to check file value and type during validation
     */
    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }
    public function messageList(){
        $filter = array('status'=>'1');
        $data['message']   = $this->AdminModel->getMessageList($filter);
        $this->load->view('message/messageList',$data);
    }
    public function messageForm(){
        $data['main_view'] = 'message/messageForm';
        $this->load->view('base_template_admin',$data);
    }
    public function addMessage(){
        $this->form_validation->set_rules('message','Message','required|trim|xss_clean|max_length[255]');
        if($this->form_validation->run()){
            $message = $this->input->post('message');
            $data = array('message'=>$message);

            $add_message = $this->AdminModel->addMessage($data);
            if($add_message){
                redirect(base_url().'Admin/messageList');
            }else{
                $data['main_view'] = 'message/messageForm';
                $this->load->view('base_template_admin',$data);
            }
        }else{
            $data['main_view'] = 'message/messageForm';
            $this->load->view('base_template_admin',$data);
        }
    }
    public function editMessage(){
        $id = $this->uri->segment(3);
        $filter = array('id'=>$id);
        $data['message_details'] = $this->AdminModel->getMessageDetails($filter);
        if($data){
            $data['main_view'] = 'message/editMessage';
            $this->load->view('base_template_admin',$data);
        }else{
            $data['main_view'] = 'message/messageForm';
            $this->load->view('base_template_admin',$data);
        }
    }
    public function updateMessage(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('message','Message','required|trim|xss_clean|max_length[255]');
        if($this->form_validation->run()){
            $id         = $this->input->post('id');
            $message    = $this->input->post('message');

            $filter         = array('id'=>$id);
            $message_data   = array('message'=>$message);

            $update_message = $this->AdminModel->updateMessage($filter,$message_data);
            if($update_message){
                redirect(base_url().'Admin/messageList');
            }else{
                $data['msg'] = 'Error Occur';
                $data['main_view'] = 'message/editMessage';
                $this->load->view('base_template_admin',$data);
            }
        }else{
            $data['main_view'] = 'message/editMessage';
            $this->load->view('base_template_admin',$data);
        }
    }
    public function deleteMessage(){
        $id = $this->input->post('id');

        $ids = explode(',',$id);

        foreach($ids as $id){
            $deleteArray[] = array('status'=>0,
                                   'id'    =>$id
                                );
        }
        $deleteMessage = $this->AdminModel->updateBatchMessage($deleteArray);
        if($deleteMessage){
            $returnArr['errCode'] = -1;
            $returnArr['message'] = 'Rows deleted Successfully';
        }else{
            $returnArr['errCode'] = 2;
            $returnArr['message'] = 'Error occur';
        }
        echo json_encode($returnArr);
    }
    public function contactList(){
        $this->load->view('contactList');
    }
    public function getContactList(){
        $data = $row = array();
        
        $memData = $this->AdminModel->getContactDetailsRows($_POST);
        
        $i = $_POST['start'];
        foreach($memData as $member){

            $i++;

            $action = '<div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" data-toggle="modal" data-target="#edit_modal" class="dropdown-item editContact" id="'.$member->id.'"><i class="icon-file-pencil"></i>Edit</a>
                            
                            </div>
                        </div>
                    </div>';

            $data[] = array(
                            $member->mobile,
                            $i,
                            $member->mobile, 
                            $member->filter,
                            date('d-m-Y h:i A',strtotime($member->created_at)),
                            $action
                        );
        }



        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->AdminModel->countAllContactDetails(),
            "recordsFiltered" => $this->AdminModel->countFilteredContactDetails($_POST),
            "data" => $data,
        );
        

        // Output to JSON format
        echo json_encode($output);        
    }
    public function editContact(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
        if($this->form_validation->run()){
            $id = $this->input->post('id');

            $filter = array('id'=>$id);
            $result = $this->AdminModel->getContactDetails($filter);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['data']    = $result;
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['data']    = 'No data Available';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function updateContact(){ 
        $this->form_validation->set_rules('id','id','required|trim|xss_clean');
        $this->form_validation->set_rules('filter','Filter','required|trim|xss_clean');
        $this->form_validation->set_rules('mobile','Mobile','required|trim|xss_clean|numeric|regex_match[/^[0-9]{10}$/]');
        if($this->form_validation->run()){
            $input_data = $this->input->post();

            $filter = array('id'=>$input_data['id']);
            $data = array(
                          'mobile'    => $input_data['mobile'],
                          'filter'    => $input_data['filter'],
                          );
            $result = $this->AdminModel->updateContact($filter,$data);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['message']    = 'Contact Updated Successfully';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['message']    = 'Error Occur';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['message'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function sendMessage(){
        $ids = $this->input->post('ids');
        $msg = $this->input->post('msg');
        
        $filter = array('message'=>$msg);
        $messageData = $this->AdminModel->getMessageDetails($filter);
        
        $ids = explode(',',$ids);
        $ids = array_unique($ids);
        $ids = implode(',',$ids);

        if($messageData){
            $message_id = $messageData['id'];
        }else{
            $data = array('message'=>$msg);
            $message_id = $this->AdminModel->addMessage($data);
        }
        // sent sms
        $username = urlencode("u_alphacore"); 
        $msg_token = urlencode("EEYN6t"); 
        $sender_id = urlencode("612324"); // optional (compulsory in transactional sms) 
        $message = urlencode($msg); 
        $mobile = urlencode($ids); 


        $api = "http://la-suit.vispl.in/api/send_promotional_sms.php?username=".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$message."&mobile=".$mobile.""; 

        $response = file_get_contents($api);

        $data = json_decode($response,true);
        // sent sms

        echo "<pre>";
        print_r($data);exit;

        //save message logs
        $message_logs = array();
        $i = 0;

        foreach($data['data'] as $row){

            $message_logs[$i]['mobile']             = $row['mobile_no'];
            $message_logs[$i]['message_id']         = $message_id;
            $message_logs[$i]['type']               = 'custom';
            $message_logs[$i]['status']             = '1';

            if($row['response_id'] != 'Invalid Mobile No'){
                $message_logs[$i]['recieved_status']    = '1';

            }else{
                $message_logs[$i]['recieved_status']    = 0;
            }
            $i++;
        }
        
        $add_message_logs = $this->AdminModel->addMessageLogs($message_logs);

        // save message logs

      //  echo 'success';
    }
    public function deleteCron(){
        $deleteContact = $this->AdminModel->deleteContact();
    }
    public function birthdayCron(){
        
        $birthdate = date('Y-m-d');

        $filter = array('status'=>1,'MONTH(birthdate)'=>date('m'),'DAY(birthdate)'=>date('d'));
        $customer_details = $this->AdminModel->getBirthdayCustomerList($filter);
        
        foreach ($customer_details as $row) {
            $contacts[] = $row['mobile'];
        }
        
        $ids = implode(',',$contacts);
        
        

        $filter = array('type'=>'birthday');
        $messageData = $this->AdminModel->getCronSMSDetails($filter);
        $message_id = $messageData['id'];
        $msg = $messageData['sms'];
        
        // sent sms
        $username = urlencode("u_alphacore"); 
        $msg_token = urlencode("EEYN6t"); 
        $sender_id = urlencode("612324"); // optional (compulsory in transactional sms) 
        $message = urlencode($msg); 
        $mobile = urlencode($ids); 

        $api = "http://la-suit.vispl.in/api/send_promotional_sms.php?username=".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$message."&mobile=".$mobile.""; 

        $response = file_get_contents($api);

        $data = json_decode($response,true);
        // sent sms

        //save message logs
        $message_logs = array();
        $i = 0;

        foreach($data['data'] as $row){

            $message_logs[$i]['mobile']             = $row['mobile_no'];
            $message_logs[$i]['message_id']         = $message_id;
            $message_logs[$i]['type']               = 'cron';
            $message_logs[$i]['status']             = 1;

            if($row['response_id'] != 'Invalid Mobile No'){
                $message_logs[$i]['recieved_status']    = 1;
            }else{
                $message_logs[$i]['recieved_status']    = 0;
            }
            $i++;
        }
        
        $add_message_logs = $this->AdminModel->addMessageLogs($message_logs);

    }
    public function anniversaryCron(){
        

        $filter = array('status'=>1,'MONTH(anniversary_date)'=>date('m'),'DAY(anniversary_date)'=>date('d'));
        $customer_details = $this->AdminModel->getBirthdayCustomerList($filter);
        
        foreach ($customer_details as $row) {
            $contacts[] = $row['mobile'];
        }
        
        $ids = implode(',',$contacts);
        
        

        $filter = array('type'=>'anniversary');
        $messageData = $this->AdminModel->getCronSMSDetails($filter);
        $message_id = $messageData['id'];
        $msg = $messageData['sms'];
        
        // sent sms
        $username = urlencode("u_alphacore"); 
        $msg_token = urlencode("EEYN6t"); 
        $sender_id = urlencode("612324"); // optional (compulsory in transactional sms) 
        $message = urlencode($msg); 
        $mobile = urlencode($ids); 

        $api = "http://la-suit.vispl.in/api/send_promotional_sms.php?username=".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$message."&mobile=".$mobile.""; 

        $response = file_get_contents($api);
        
        $data = json_decode($response,true);
        // sent sms


        //save message logs
        $message_logs = array();
        $i = 0;

        foreach($data['data'] as $row){

            $message_logs[$i]['mobile']             = $row['mobile_no'];
            $message_logs[$i]['message_id']         = $message_id;
            $message_logs[$i]['type']               = 'cron';
            $message_logs[$i]['status']             = 1;


            if($row['response_id'] != 'Invalid Mobile No'){
                $message_logs[$i]['recieved_status']    = 1;
            }else{
                $message_logs[$i]['recieved_status']    = 0;
            }
            $i++;
        }
        
        $add_message_logs = $this->AdminModel->addMessageLogs($message_logs);

    }
    public function familyListDetails(){
        if($this->session->userdata('logged_in')){
            $filter = array('family_id'=>$this->uri->segment(3));
            $data['result'] = $this->AdminModel->getFamilyList($filter);
            $this->load->view('familyListDetails',$data);
        }else{
            redirect(base_url().'Admin/logout'); 
        }
    }
    public function familyList(){
        if($this->session->userdata('logged_in')){
            $this->load->view('familyList');
        }else{
            redirect(base_url().'Admin/logout'); 
        }
    }
    public function getfamilyList(){
        if($this->session->userdata('logged_in')){
            

            $data = $row = array();
        
            $memData = $this->AdminModel->getFamilyDetailsRows($_POST);
                            

            $i = $_POST['start'];
            foreach($memData as $member){

                $i++;

                $birthdate = $member->birthdate == '1970-01-01' ? '0000:00:00' : date('d-m-Y',strtotime($member->birthdate));
                $anniversary_date = $member->anniversary_date == '1970-01-01' ? '0000:00:00' : date('d-m-Y',strtotime($member->anniversary_date));

                $action = '<div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" data-toggle="modal" data-target="#edit_modal" class="dropdown-item editFamily" id="'.$member->id.'"><i class="icon-file-pencil"></i>Edit</a>
                                                    
                                                
                                                </div>
                                            </div>
                                        </div>';


                $data[] = array($member->mobile,
                                $i,
                                $member->name, 
                                $member->mobile,
                                $member->email,
                                $birthdate,
                                $anniversary_date,
                                date('d-m-Y h:i A',strtotime($member->created_at)),
                                $action
                            );
            }



            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->AdminModel->countAllFamilyDetails(),
                "recordsFiltered" => $this->AdminModel->countFilteredFamilyDetails($_POST),
                "data" => $data,
            );  
            
            // Output to JSON format
            echo json_encode($output);
            
         }else{
           redirect(base_url().'Admin/logout');
        }
    }
    public function editFamily(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
        if($this->form_validation->run()){
            $id = $this->input->post('id');

            $filter = array('id'=>$id);
            $result = $this->AdminModel->getFamilyMemberDetails($filter);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['data']    = $result;
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['data']    = 'No data Available';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function updateFamilyMember(){ 
        $this->form_validation->set_rules('id','id','required|trim|xss_clean');
        $this->form_validation->set_rules('name','Name','required|trim|xss_clean');
        $this->form_validation->set_rules('mobile','Mobile','required|trim|xss_clean|numeric|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email');
        if($this->form_validation->run()){
            $input_data = $this->input->post();

            $filter = array('id'=>$input_data['id']);
            $data = array(  'name'      => $input_data['name'],
                            'mobile'    => $input_data['mobile'],
                            'email'     => $input_data['email'],
                            'birthdate' => $input_data['birthdate'],
                            'anniversary_date' => $input_data['anniversary_date']
                            );
            $result = $this->AdminModel->updateFamilyMember($filter,$data);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['message'] = 'Family Data updated Successfully';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['message'] = 'No data Available';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }

    public function tableList(){
        if($this->session->userdata('logged_in')){
            $data['table'] = $this->AdminModel->getTableList();
            $this->load->view('table/tableList',$data); 
        }else{
            redirect(base_url());
        }
    }

    public function addTable(){
        if($this->session->userdata('logged_in')){
            $this->form_validation->set_rules('name','Name','required|trim|xss_clean|max_length[255]|callback_table_exists',array('table_exists'=>'Table name already exists'));
            if($this->form_validation->run()){
                $data = array('name'=>$this->input->post('name'));
                $add_table = $this->AdminModel->addTable($data);
                if($add_table){
                    $returnArr['errCode'] = -1;
                    $returnArr['message'] = 'success';
                }else{
                    $returnArr['errCode'] = -1;
                    $returnArr['message'] = 'failed';
                }
            }else{
                $returnArr['errCode'] = 3;
                foreach($this->input->post() as $key => $value){
                    $returnArr['message'][$key] = form_error($key); 
                }
            }
            echo json_encode($returnArr);
        }else{
            redirect(base_url());
        }
    }

    public function table_exists($table){
        $filter = array('name'=>$table);
        $check_exists = $this->AdminModel->getTableDetails($filter);
        if($check_exists){
            return false;
        }else{
            return true;
        }
    }
    public function editTable(){
        if($this->session->userdata('logged_in')){
            $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
            if($this->form_validation->run()){
                $id = $this->input->post('id');

                $filter = array('id'=>$id);
                $result = $this->AdminModel->getTableDetails($filter);
                if($result){
                    $returnArr['errCode'] = -1;
                    $returnArr['data']    = $result;
                }else{
                    $returnArr['errCode'] = 2;
                    $returnArr['data']    = 'No data Available';
                }
            }else{
                $returnArr['errCode'] = 3;
                foreach($this->input->post() as $key => $value){
                        $returnArr['messages'][$key] = form_error($key);
                    }
                }
            echo json_encode($returnArr);  
        }else{
            redirect(base_url());
        }
         
    }
    public function updateTable(){ 
        $this->form_validation->set_rules('id','id','required|trim|xss_clean');
        $this->form_validation->set_rules('name','Name','required|trim|xss_clean');
        if($this->form_validation->run()){
            $input_data = $this->input->post();

            $filter = array('id'    =>$input_data['id']);
            $data   = array('name'  => $input_data['name']);
            $result = $this->AdminModel->updateTable($filter,$data);

            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['data']    = $data;
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['data']    = 'No data Available';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['message'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function complaintList(){
        $filter = array('status'=>1);
        $data['manager']   = $this->AdminModel->getManagerList($filter);
        $this->load->view('complaintList',$data);
    }
    public function getComplaintList(){
        if($this->session->userdata('logged_in')){



            $data = $row = array();
        
            $memData = $this->AdminModel->getComplaintDetailsRows($_POST);
            

            $i = $_POST['start'];
            foreach($memData as $member){

                $i++;
                $status = '';

                if($member->status == '1'){
                    $status = '<button class="btn btn-sm btn-warning">In progress</button>';
                }else if($member->status == '2'){
                    $status = '<button class="btn btn-sm btn-success">Completed</button>';
                }else if($member->status == '0'){
                    $status = '<button class="btn btn-sm btn-danger">Pending</button>';
                }

                $action = '<div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" data-toggle="modal" data-target="#edit_modal" class="dropdown-item editComplaint" id="'.$member->id.'"><i class="icon-pencil"></i>Edit</a>';
                                                    if($member->rating_log_id){
                 $action  .=                        '<a href="'.base_url().'Admin/viewPreviousFeedbackDetails/'.$member->rating_id.'"   class="dropdown-item" id="'.$member->rating_id.'"><i class="icon-pencil"></i>Previous Feedback</a>';
                                                    }
                  $action  .=                       '<a href="'.base_url().'Admin/viewFeedbackDetails/'.$member->rating_id.'" class="dropdown-item" target="_blank"><i class="icon-notebook"></i>Feedback</a>
                                                
                                                </div>
                                            </div>
                                        </div>';


                $data[] = array(
                                $i,
                                $member->complaint_id, 
                                $member->name,
                                $member->issue,
                                $member->manager_name,
                                $status,
                                date('d-m-Y h:i A',strtotime($member->created_at)),
                                $action
                            );
            }



            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->AdminModel->countAllComplaintDetails(),
                "recordsFiltered" => $this->AdminModel->countFilteredComplaintDetails($_POST),
                "data" => $data,
            );  
            
            // Output to JSON format
            echo json_encode($output);
            
         }else{
           redirect(base_url().'Admin/logout');
        }
    }
    public function editComplaint(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
        if($this->form_validation->run()){
            $id = $this->input->post('id');

            $filter = array('id'=>$id);
            $result = $this->AdminModel->getComplaintDetails($filter);

            if($result['action_taken_time'] == '1970-01-01 01:00:00' || $result['action_taken_time'] == NULL || $result['action_taken_time'] == ""){
                 $result['action_taken_time'] = date('d-m-Y h:i');
            }else{
                 $result['action_taken_time'] = date('d-m-Y h:i',strtotime($result['action_taken_time']));
            } 
            

            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['data']    = $result;
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['data']    = 'No data found';
            }

        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function updateComplaint(){ 

        $this->form_validation->set_rules('id','id','required|trim|xss_clean');
        $this->form_validation->set_rules('issue','Issue','required|trim|xss_clean');
        $this->form_validation->set_rules('manager','Manager','required|trim|xss_clean');
        $this->form_validation->set_rules('action_taken','Action Taken','required|trim|xss_clean');
        $this->form_validation->set_rules('action_time','Action Time','required');
        $this->form_validation->set_rules('status','Status','required|trim|xss_clean');
        if($this->form_validation->run()){
            $input_data = $this->input->post();

            $filter = array('id'=>$input_data['id']);
            $data = array(  'issue'         => $input_data['issue'],
                            'manager_id'    => $input_data['manager'],
                            'action_taken'  => $input_data['action_taken'],
                            'action_taken_time' => $input_data['action_time'],
                            'status'        => $input_data['status']
                            );

            $result = $this->AdminModel->updateComplaint($filter,$data);
         
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['id']      = $input_data['id'];
                $returnArr['status']  = $data['status'];
                $returnArr['message'] = 'Complaint Data updated Successfully';
            }else{
                $returnArr['errCode'] = 2;
                 $returnArr['id']     = $input_data['id'];
                $returnArr['status']  = $data['status'];
                $returnArr['message'] = 'Please try again';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }

    public function resendFeedbackEmail(){
            $id  = $this->input->post('id');

            $r_filter = array('id'=>$id);
            $complaint_details = $this->AdminModel->getComplaintDetails($r_filter);

            $c_filter = array('r.id'=>$complaint_details['rating_id']);
            $c_details = $this->AdminModel->getFeedbackDetails($c_filter);


            $uid                    = $c_details['uid'];
            $customer_email         = $c_details['email'];
            $admin_email            = 'thenine@ymcaic.com';


            //send email to manager about bad rating 
            $to         = $customer_email;
            $from       = $admin_email;
            $subject    = 'Re submit your feedback';
            $message    = "Hi Sir/Madam,".
                           "As per you feedback we get to know that you are not happy with our service.We highly regret for it.We try our best to serve you.We have taken immdiate action against this type of issue.So Please let us know that are you happy with it or not by resubmitting your review. <a href='http://alphacore.in/restro/Admin/editFeedback/".$uid."'>Click Here</a>";
  
            $send_mail  = sendEmail_helper($to,$from,$subject,$message);
           
            $returnArr['errCode'] = -1;
            $returnArr['message'] = 'Mail Send Successfully';

            echo json_encode($returnArr);
    }
    public function managerList(){
        if($this->session->userdata('logged_in')){
            $filter = array('status'=>'1');
            $data['manager'] = $this->AdminModel->getManagerList($filter);
            $this->load->view('manager/managerList',$data);
        }else{
            redirect(base_url().'Admin/logout');
        }
    }
    public function addManager(){ 
        $this->form_validation->set_rules('manager_id','Manager Id','required|trim|xss_clean');
        $this->form_validation->set_rules('name','Name','required|trim|xss_clean');
        $this->form_validation->set_error_delimiters('<p class="error">','</p>');
        if($this->form_validation->run()){
            $input_data = $this->input->post();

            $data = array(  'manager_id'    => $input_data['manager_id'],
                            'name'          => $input_data['name'],
                            'status'        => '1'
                            );

            $result = $this->AdminModel->addManager($data);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['message'] = 'Added Successfully';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['message'] = 'Please try again';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['message'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function editManager(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
        if($this->form_validation->run()){
            $id = $this->input->post('id');

            $filter = array('id'=>$id);
            $result = $this->AdminModel->getManagerDetails($filter);

            $returnArr['errCode'] = -1;
            $returnArr['data']    = $result;
            
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function updateManager(){ 

        $this->form_validation->set_rules('id','id','required|trim|xss_clean');
        $this->form_validation->set_rules('manager_id','Manager Id','required|trim|xss_clean');
        $this->form_validation->set_rules('name','Name','required|trim|xss_clean');
        if($this->form_validation->run()){
            $input_data = $this->input->post();

            $filter = array('id'=>$input_data['id']);
            $data = array(  'manager_id'    => $input_data['manager_id'],
                            'name'          => $input_data['name']
                            );

            $result = $this->AdminModel->updateManager($filter,$data);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['message'] = 'Updated Successfully';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['message'] = 'Please try again';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }

    //coupen code system
    public function CoupenList(){
        if($this->session->userdata('logged_in')){
            $filter = array('status'=>'1');
            $data['coupen'] = $this->AdminModel->getCoupenList($filter);
            $this->load->view('coupen/coupenList',$data);
        }else{
            redirect(base_url().'Admin/logout');
        }
    }
    public function addCoupen(){ 
        $this->form_validation->set_rules('coupen','Coupen','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('start_date','Start Date','required|trim|xss_clean');
        $this->form_validation->set_rules('end_date','Start Date','required|trim|xss_clean');
        $this->form_validation->set_rules('type','Type','required|trim|xss_clean');
        $this->form_validation->set_rules('discount','Discount','required|trim|xss_clean');
        $this->form_validation->set_rules('max_discount','Max Discount','required|trim|xss_clean');
        $this->form_validation->set_rules('description','Description','required|trim|xss_clean');
        $this->form_validation->set_error_delimiters('<p class="error">','</p>');
        if($this->form_validation->run()){
            $input_data = $this->input->post();



            $data = array(  'coupen'        => $input_data['coupen'],
                            'start_date'    => date('Y-m-d',strtotime($input_data['start_date'])),
                            'end_date'      => date('Y-m-d',strtotime($input_data['end_date'])),
                            'type'          => $input_data['type'],
                            'discount'      => $input_data['discount'],
                            'max_discount'  => $input_data['max_discount'],
                            'description'   => $input_data['description'],
                            'created_by'    => $this->session->userdata('user_id')    
                            );

            $result = $this->AdminModel->addCoupen($data);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['message'] = 'Added Successfully';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['message'] = 'Please try again';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['message'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function editCoupen(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
        if($this->form_validation->run()){
            $id = $this->input->post('id');

            $filter = array('id'=>$id);
            $result = $this->AdminModel->getCoupenDetails($filter);

            $result['start_date'] = $result['start_date'] == '1970-01-01' ? '' : date('d-m-Y',strtotime($result['start_date']));
            $result['end_date'] = $result['end_date'] == '1970-01-01' ? '' : date('d-m-Y',strtotime($result['end_date']));

            $returnArr['errCode'] = -1;
            $returnArr['data']    = $result;
            
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function updateCoupen(){ 
        $this->form_validation->set_rules('coupen','Coupen','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('start_date','Start Date','required|trim|xss_clean');
        $this->form_validation->set_rules('end_date','Start Date','required|trim|xss_clean');
        $this->form_validation->set_rules('type','Type','required|trim|xss_clean');
        $this->form_validation->set_rules('discount','Discount','required|trim|xss_clean|max_length[11]|numeric');
        $this->form_validation->set_rules('max_discount','Max Discount','required|trim|xss_clean|max_length[255]');
        $this->form_validation->set_rules('description','Description','required|trim|xss_clean');
        $this->form_validation->set_error_delimiters('<p class="error">','</p>');
       if($this->form_validation->run()){
            $input_data = $this->input->post();

            $filter = array('id'=>$input_data['id']);
            $data = array(  'coupen'        => $input_data['coupen'],
                            'start_date'    => date('Y-m-d',strtotime($input_data['start_date'])),
                            'end_date'      => date('Y-m-d',strtotime($input_data['end_date'])),
                            'type'          => $input_data['type'],
                            'discount'      => $input_data['discount'],
                            'max_discount'  => $input_data['max_discount'],
                            'description'   => $input_data['description']
                            );
            
            $result = $this->AdminModel->updateCoupen($filter,$data);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['message'] = 'Updated Successfully';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['message'] = 'Please try again';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }
    public function couponUsage(){
        if($this->session->userdata('logged_in')){
            $filter = array('status'=>'1');
            $data['coupen'] = $this->AdminModel->getCouponUsage($filter);


            $this->load->view('coupen/coupon_usage',$data);
        }else{
            redirect(base_url().'Admin/logout');
        }
    }
    public function createBulkEmail(){
        $data['type'] = $this->input->post('type');
        $data['email'] = implode(',',$this->input->post('email'));

        $this->load->view('sendEmail',$data);
    }
    public function sendBulkEmail(){

        $data['type'] = $this->input->post('type');
        $data['email'] = $this->input->post('email'); //email ids

        $this->form_validation->set_rules('subject','Subject','required|trim|xss_clean');
        $this->form_validation->set_rules('body','Email Body','required');
        if($this->form_validation->run()){
            $to         = $this->input->post('email');

            $from       = 'thenine@ymcaic.com';
            $subject    = $this->input->post('subject');
            $message    = $this->input->post('body');


            $send_mail  = sendEmail_helper($to,$from,$subject,$message);

            $returnArr['errCode'] = -1;
            $returnArr['message'] = 'success';
        }else{
             $returnArr['errCode'] = 3;
             foreach($this->input->post() as $key => $value){
                $returnArr['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($returnArr); 

    }
    public function getSMSBirthdayList(){
        $filter = array("DATE_FORMAT(c.birthdate,'%m%d')"=>date('md'),
                                    'c.mobile !='=>'');
        $data['customer'] = $this->AdminModel->getBirthdayList($filter);
        $data['type']     = 'birthday';
        $this->load->view('SMSCustomerList',$data);
    }
    public function getSMSAnniversaryList(){
        $filter = array("DATE_FORMAT(c.anniversary_date,'%m%d')"=>date('md'),
                                    'c.mobile !='=>'');
        $data['customer'] = $this->AdminModel->getBirthdayList($filter);
        $data['type']     = 'anniversary';
        $this->load->view('SMSCustomerList',$data);
    }
    public function getEmailBirthdayList(){
        $filter = array("DATE_FORMAT(c.birthdate,'%m%d')"=>date('md'),
                                    'c.email !='=>'');
        $data['customer'] = $this->AdminModel->getBirthdayList($filter);
        $data['type']     = 'birthday';
        $this->load->view('EmailCustomerList',$data);
    }
    public function getEmailAnniversaryList(){
        $filter = array("DATE_FORMAT(c.anniversary_date,'%m%d')"=>date('md'),
                                    'c.email !='=>'');
        $data['customer'] = $this->AdminModel->getBirthdayList($filter);
        $data['type']     = 'anniversary';
        $this->load->view('EmailCustomerList',$data);
    } 

    //weekly data
     public function getWeeklySMSBirthdayList(){
        $todays_date = date('Y-m-d');
        $end_date    = date('Y-m-d',strtotime('+7 day'));

        $filter = array("DATE_FORMAT(c.birthdate,'%m%d') >="=>date('md'),
                        "DATE_FORMAT(c.birthdate,'%m%d') >="=>date('md',strtotime($end_date)),
                                    'c.mobile !='=>'');
        $data['customer'] = $this->AdminModel->getBirthdayList($filter);
        $data['type']     = 'birthday';
        $this->load->view('SMSCustomerList',$data);
    }
    public function getWeeklySMSAnniversaryList(){
        $todays_date = date('Y-m-d');
        $end_date    = date('Y-m-d',strtotime('+7 day'));

        $filter = array("DATE_FORMAT(c.anniversary_date,'%m%d') >="=>date('md'),
                        "DATE_FORMAT(c.anniversary_date,'%m%d') >="=>date('md',strtotime($end_date)),
                                    'c.mobile !='=>'');

        $data['customer'] = $this->AdminModel->getBirthdayList($filter);
        $data['type']     = 'anniversary';
        $this->load->view('SMSCustomerList',$data);
    }
    public function getWeeklyEmailBirthdayList(){
        $todays_date = date('Y-m-d');
        $end_date    = date('Y-m-d',strtotime('+7 day'));

        $filter = array("DATE_FORMAT(c.birthdate,'%m%d') >="=>date('md'),
                        "DATE_FORMAT(c.birthdate,'%m%d') >="=>date('md',strtotime($end_date)),
                                    'c.mobile !='=>'');

        $data['customer'] = $this->AdminModel->getBirthdayList($filter);
        $data['type']     = 'birthday';
        $this->load->view('EmailCustomerList',$data);
    }
    public function getWeeklyEmailAnniversaryList(){
        $todays_date = date('Y-m-d');
        $end_date    = date('Y-m-d',strtotime('+7 day'));

        $filter = array("DATE_FORMAT(c.anniversary_date,'%m%d') >="=>date('md'),
                        "DATE_FORMAT(c.anniversary_date,'%m%d') >="=>date('md',strtotime($end_date)),
                                    'c.mobile !='=>'');
        
        $data['customer'] = $this->AdminModel->getBirthdayList($filter);
        $data['type']     = 'anniversary';
        $this->load->view('EmailCustomerList',$data);
    } 

    public function createBulkSMS(){
        $data['type'] = $this->input->post('type');
        $data['mobile'] = implode(',',$this->input->post('mobile'));

        $this->load->view('sendSMS',$data);
    }
    public function sendBulkSMS(){
        $data['type'] = $this->input->post('type');
        $data['mobile'] = $this->input->post('mobile');

        $this->form_validation->set_rules('message','Message','required|trim|xss_clean');
        if($this->form_validation->run()){
            $mobile = $this->input->post('mobile');
            $message = $this->input->post('message');

            sendSMS($mobile,$message);
            
            $returnArr['errCode'] = -1;
            $returnArr['message'] = 'success';
        }else{
             $returnArr['errCode'] = 3;
             foreach($this->input->post() as $key => $value){
                $returnArr['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($returnArr); 

        // $this->form_validation->set_rules('type','Type','required|trim|xss_clean|max_length[255]');
        // $this->form_validation->set_rules('message','Message','required|trim|xss_clean');
        // if($this->form_validation->run()){
        //     $type  = $this->input->post('type');
        //     $message   = $this->input->post('message');

        //     if($type == 'birthday'){
        //         $todays_date       = date('md');

        //         $select = 'mobile';
        //         $filter = array("DATE_FORMAT(birthdate,'%m%d')"=>$todays_date,
        //                         'mobile !='=>'');

        //     }else if($type == 'anniversary'){
        //         $todays_date       = date('md');

        //         $select = 'mobile';
        //         $filter = array("DATE_FORMAT(anniversary_date,'%m%d')"=>$todays_date,
        //                         'mobile !='=>'');
        //     }

        //     $data   = $this->AdminModel->getTodaysBirthData($select,$filter);

        //     $mobile = array();
        //     foreach ($data as $row) {
        //         array_push($mobile,$row['mobile']);
        //     }
            
        //     $mobile = implode(',',$mobile);

        //     sendSMS($mobile,$message);

        //     $returnArr['errCode'] = -1;
        //     $returnArr['message'] = 'success';

        // }else{
        //     $returnArr['errCode'] = 3;
        //     foreach($this->input->post() as $key => $value){
        //             $returnArr['messages'][$key] = form_error($key);
        //         }
        //     }
        // echo json_encode($returnArr); 
    } 

    public function getCustomerId(){

        $mobile    = $this->input->post('mobile');

        $mobile    = $this->AdminModel->getCustomerIds($mobile);


        $newArray = array();
        foreach($mobile as $key => $value) {
                $newArray['items'][] =  array('label'=>$value['mobile'],'value'=>$value['id']);
        }
        
        echo json_encode($newArray);
    }

    public function checkDiscount(){

        $this->form_validation->set_rules('customer_id','Customer Id','required|trim|xss_clean|numeric');
        $this->form_validation->set_rules('coupen_id','Coupen Id','required|trim|xss_clean|numeric');
        $this->form_validation->set_rules('bill_number','Bill Number','required|trim|xss_clean');
        $this->form_validation->set_rules('check_discount','Discount','required|trim|xss_clean|numeric');
        $this->form_validation->set_error_delimiters('<p class="error">','</p>');
        if($this->form_validation->run()){
            $coupen_id = $this->input->post('coupen_id');
            $bill_amount  = $this->input->post('check_discount');

            $filter = array('id'=>$coupen_id);
            $coupen_details = $this->AdminModel->getCoupenDetails($filter);

            if($coupen_details['type'] == 1){
                $max_discount = ($bill_amount * $coupen_details['discount']) / 100;
           }else{
                $max_discount = $coupen_details['discount'];
            }

            $returnArr['errCode'] = -1;
            if($coupen_details['max_discount'] >= $max_discount){
                $returnArr['message'] = $max_discount;
            }else{
                $returnArr['message'] = $coupen_details['max_discount'];
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach ($this->input->post() as $key => $value) {
                $returnArr['message'][$key] = form_error($key);
            }
        }

        echo json_encode($returnArr);


    }
    public function addCoupenUsage(){ 
        $this->form_validation->set_rules('mobile','Mobile','required|trim|xss_clean|max_length[255]|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('coupen_id','Coupen Id','required|trim|xss_clean');
        $this->form_validation->set_rules('bill_number','Bill Number','required|trim|xss_clean');
        $this->form_validation->set_rules('bill_amount','Bill Amount','required|trim|xss_clean');
        $this->form_validation->set_rules('discount','Discount','required|trim|xss_clean');
        $this->form_validation->set_error_delimiters('<p class="error">','</p>');
       if($this->form_validation->run()){
            $input_data = $this->input->post();

        
            $data = array(  'mobile'            => $input_data['mobile'],
                            'coupen_id'         => $input_data['coupen_id'],
                            'bill_number'       => $input_data['bill_number'],
                            'bill_amount'       => $input_data['bill_amount'],
                            'discount'          => $input_data['discount']
                            );
            
            $result = $this->AdminModel->addCoupenUsage($data);
            if($result){
                $returnArr['errCode'] = -1;
                $returnArr['message'] = 'Added Successfully';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['message'] = 'Please try again';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['messages'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
    }

    public function exportComplaint(){
        // create file name
        $fileName = 'Complaint-' . time() . '.xlsx';
        // load excel library
        $this->load->library('excel');
        $complaint = $this->AdminModel->exportComplaintData();


        $objPHPExcel = new PHPExcel();

        $from = 'A1';
        $to   = 'P1';

        $objPHPExcel->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold( true );

        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Complaint');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Mobile');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Birthday');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Anniversary');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Quality');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Cleanliness');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Service');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Friendliness');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Appearance');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Value');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Design');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Issue');
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Action');
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Attend by');

        // set Row
        $rowCount = 2;
        foreach ($complaint as $element) {

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['complaint_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['mobile']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['email']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, date('d-m-Y',strtotime($element['birthdate'])));
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, date('d-m-Y',strtotime($element['anniversary_date'])));
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['question_1']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['question_2']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['question_3']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['question_4']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['question_5']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['question_6']);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element['question_7']);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element['issue']);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element['action_taken']);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element['manager_name']);
            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
    }
    public function complaintListView(){
        $data['complaint'] = $this->AdminModel->exportComplaintData();
        $this->load->view('complaintDetailView',$data);
    }
    public function getComplaintDetailsData(){
        $data = $row = array();
        

        // Fetch member's records
        $memData = $this->AdminModel->getComplaintDetailsData($_POST);


        $i = $_POST['start'];
        foreach($memData as $member){

            $i++;



            $birthdate = $member->birthdate == '1970-01-01' ? '0000-00-00' : date('d-m-Y',strtotime($member->birthdate));
            $anniversary_date = $member->anniversary_date == '1970-01-01' ? '0000-00-00' : date('d-m-Y',strtotime($member->anniversary_date));

            $data[] = array($i,
                            $member->complaint_id,
                            $member->name, 
                            $member->mobile,
                            $member->email,
                            $birthdate,
                            $anniversary_date,
                            $member->question_1,
                            $member->question_2,
                            $member->question_3,
                            $member->question_4,
                            $member->question_5,
                            $member->question_6,
                            $member->question_7,
                            $member->question_8,
                            $member->question_9,
                            $member->issue,
                            $member->action_taken,
                            $member->status,
                            $member->manager,
                            date('d-m-Y h:i A',strtotime($member->created_at)),

                        );
        }



        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->AdminModel->countAllComplaintDetailsData(),
            "recordsFiltered" => $this->AdminModel->countFilteredComplaintDetailsData($_POST),
            "data" => $data,
        );  
        
        // Output to JSON format
        echo json_encode($output);
    }

    
}   
    
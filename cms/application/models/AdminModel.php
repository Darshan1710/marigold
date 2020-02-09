<?php

class AdminModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
    }

    function AddRegister() {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'status' => 1
        );
        $this->db->insert('user', $data);
        redirect('admin/index');
    }

    function getUserDetails($filter) {
        $this->db->where($filter);
        return $this->db->get('user')->row_array();
    }
    
     function getEnquiry($filter = NULL, $order_by = NULL, $limit = NULL, $start = NULL) {
        if ($filter) {
            $this->db->where($filter);
        }
        if ($limit || $start) {
            $this->db->limit($limit, $start);
        }
        if ($order_by) {
            $this->db->order_by($order_by);
        }
        $sql = $this->db->get('enquiry');
        return $sql->result_array();
    }
    public function getCustomerList($filter = NULL){
        if($filter){
            $this->db->where($filter);
        }
        return $this->db->get('customer')->result_array();
    }
    public function updateCustomer($filter,$data){
        $this->db->where($filter);
        return $this->db->update('customer',$data);
    }
    public function addRegistration($data) {
        $this->db->insert('customer',$data);
        return $this->db->insert_id();
    }
    public function addRating($data) {
        return $this->db->insert('rating',$data);
    }
    public function getFeedbackDetails($filter){
        $this->db->where($filter);
        $this->db->join('customer c','c.id = r.customer_id','right outer');
        return $this->db->get('rating r')->row_array();
    }
    public function getPreviousFeedbackDetails($filter){
        $this->db->where($filter);
        $this->db->select('c.*,r.*,r.id as rating_id');
        $this->db->join('customer c','c.id = r.customer_id');
        return $this->db->get('rating_logs r')->row_array();
    }
    public function getFeedbackData(){
        $this->db->join('customer c','c.id = rating.customer_id','right outer');
        return $this->db->get('rating')->result_array();
    }
    public function getDashboardData($first_date,$last_date,$type){
        $this->db->where('DATE(created_at) >=',$first_date);
        $this->db->where('DATE(created_at) <=',$last_date);
        $this->db->group_by($type.'(created_at)'); 
        $this->db->select('COUNT(customer_id) as no_of_customer,SUM(question_1) as question_1,SUM(question_2) as question_2,SUM(question_3) as question_3,SUM(question_4) as question_4,SUM(question_5) as question_5,SUM(question_6) as question_6,SUM(question_7) as question_7,SUM(question_8) as question_8,SUM(question_9) as question_9,MAX(created_at) as created_at');
        return $this->db->get('rating')->result_array();
    } 
    public function getDashboardCountData($filter = NULL){
        $this->db->select('COUNT(customer_id) as number_of_feedback,SUM(question_1) as question_1,SUM(question_2) as question_2,SUM(question_3) as question_3,SUM(question_4) as question_4,SUM(question_5) as question_5,SUM(question_6) as question_6,SUM(question_7) as question_7,
            SUM(question_8) as question_8,SUM(question_9) as question_9');
        $this->db->join('customer c','c.id = r.customer_id');
        return $this->db->get('rating r')->row_array();
    }
    public function getWeeklyCountData(){
        $this->db->select('COUNT(customer_id) as number_of_feedback,SUM(question_1) as question_1,SUM(question_2) as question_2,SUM(question_3) as question_3,SUM(question_4) as question_4,SUM(question_5) as question_5,SUM(question_6) as question_6,SUM(question_7) as question_7,SUM(question_8) as question_8,SUM(question_9) as question_9');
        $this->db->join('customer c','c.id = r.customer_id','left outer');
        return $this->db->get('rating r')->row_array();
    }    
    public function getCustomerCountData(){
        $this->db->select('COUNT(id) as number_of_customer');
        return $this->db->get('customer')->row_array();
    }
    public function getDailyRatingDetails(){
        $this->db->select('SUM(question_1) as question_1,SUM(question_2) as question_2,SUM(question_3) as question_3,SUM(question_4) as question_4,SUM(question_5) as question_5,SUM(question_6) as question_6,SUM(question_7) as question_7,SUM(question_8) as question_8,SUM(question_9) as question_9,COUNT(customer_id) as count,created_at'); 
        return $this->db->get('rating')->result_array();
    }
    public function getRatingDetails(){
        $this->db->join('rating r','r.customer_id = c.id');
        return $this->db->get('customer c')->result_array();
    }
    //get dealer details 
    public function getRatingDetailsRows($postData){
        $this->_get_rating_details_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();

        return $query->result();
    }
    public function countAllRatingDetails(){
        $this->db->from('rating');
        $this->db->join('customer c','c.id = rating.customer_id');
        return $this->db->count_all_results();
    }
    public function countFilteredRatingDetails($postData){
        $this->_get_rating_details_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_rating_details_datatables_query($postData){

        $this->db->select('c.name as name,mobile,email,question_1,question_2,question_3,question_4,question_5,question_6,question_7,question_8,question_9,comment,t.name as table_name,r.created_at,table_id');
        $this->db->from('customer c');
        $this->db->join('rating r','c.id = r.customer_id');
        $this->db->join('table t','t.id = r.table_id','left');
        
        // Set orderable column fields
        $this->column_order = array(null,'c.name','mobile','email','question_1','question_2','question_3','question_4','question_5','question_6','question_7','question_8','question_9','comment','table_id');

        
        // Set searchable column fields
        $this->column_search = array('c.name','mobile','email','question_1','question_2','question_3','question_4','question_5','question_6','question_7','question_8','question_9','comment','table_id');
        // Set default order
        $this->order = array('r.id' => 'desc');

        foreach ($_POST['columns'] as $key => $value) {
                if(!empty($value['search']['value'])){

                    if($value['name'] == 'c.name' || $value['name'] == 'mobile' || $value['name'] == 'email' || $value['name'] == 'question_1' || $value['name'] == 'question_2' || $value['name'] == 'question_3' || $value['name'] == 'question_4' || $value['name'] == 'question_5' || $value['name'] == 'question_6'  || $value['name'] == 'question_7' || $value['name'] == 'question_8' || $value['name'] == 'question_9' || $value['name'] == 'comment'  ){
                            $this->db->or_like($value['name'],$value['search']['value']);
                     }

                    if($value['name'] == 'table_name'){
                        $this->db->having($value['name'],$value['search']['value']);
                    }   

                    if($value['name'] == 'r.created_at'){
                        $dates            = explode('-',$value['search']['value']);
                        $start_date       = date('Y-m-d',strtotime($dates['0']));
                        $end_date         = date('Y-m-d',strtotime($dates['1']));
                        $this->db->where("DATE(r.created_at) >=", $start_date);
                        $this->db->where("DATE(r.created_at) <=", $end_date);
                    }   
                }
        }



         
         $i = 0;
        
        foreach($this->column_search as $item){


            if($postData['search']['value']){

                if($i===0){
                    if($item == 'table_name'){
                        $this->db->having($item,$postData['search']['value']);
                    }else{
                        $this->db->group_start();
                        $this->db->like($item, $postData['search']['value']);
                    }
                    
                }else{
                    if($item == 'table_name'){
                        $this->db->having($item,$postData['search']['value']);
                    }else{
                        $this->db->or_like($item, $postData['search']['value']);
                    }
                    
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
         


        if(isset($postData['order'])){
            if($postData['order'][0]['column'] == '1' || $postData['order'][0]['column'] == '2' || $postData['order'][0]['column'] == '3' || $postData['order'][0]['column'] == '4' || $postData['order'][0]['column'] == '5' || $postData['order'][0]['column'] == '6' || $postData['order'][0]['column'] == '7' || $postData['order'][0]['column'] == '8' || $postData['order'][0]['column'] == '9' || $postData['order'][0]['column'] == '10') {
                $this->db->order_by($this->column_order[$postData['order'][0]['column']], $postData['order'][0]['dir']);
            }
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    //get Customer details 
    public function getCustomerDetailsRows($postData){
        $this->_get_customer_details_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function countAllCustomerDetails(){
        $this->db->from('customer');
        return $this->db->count_all_results();
    }
    public function countFilteredCustomerDetails($postData){
        $this->_get_customer_details_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_customer_details_datatables_query($postData){



        $this->db->select('c.id,c.name,c.mobile,c.email,c.birthdate,c.anniversary_date,c.created_at,COUNT(r.customer_id) as feedback_count');
        $this->db->join('rating r','r.customer_id = c.id','left outer');
        $this->db->group_by('c.mobile');
        $this->db->from('customer c');
        // Set orderable column fields
        $this->column_order = array(null,'c.first_name','c.last_name','c.mobile','c.email','c.birthdate','c.anniversary_date','c.created_at','feedback_count');

        // Set searchable column fields
        $this->column_search = array('c.name','c.mobile','c.email','c.birthdate','c.anniversary_date','c.created_at','feedback_count');
        // Set default order
        $this->order = array('c.created_at' => 'desc');  

        foreach ($_POST['columns'] as $key => $value) {
                if(!empty($value['search']['value'])){

                    if($value['name'] == 'c.name' || $value['name'] == 'c.mobile' || $value['name'] == 'c.email'){
                            $this->db->or_like($value['name'],$value['search']['value']);
                     }else if($value['name'] == 'feedback_count'){
                            $this->db->having('feedback_count',$value['search']['value']);     
                     }else if($value['name'] == 'c.birthdate'){                 
                            $dates            = explode('-',$value['search']['value']);
                            $start_date       = date('md',strtotime($dates['0']));
                            $end_date         = date('md',strtotime($dates['1']));
                            $this->db->where("DATE_FORMAT(birthdate,'%m%d') >=", $start_date);
                            $this->db->where("DATE_FORMAT(birthdate,'%m%d') <=", $end_date);
                     }else if($value['name'] == 'c.anniversary_date'){
                            $dates            = explode('-',$value['search']['value']);
                            $start_date       = date('md',strtotime($dates['0']));
                            $end_date         = date('md',strtotime($dates['1']));
                            $this->db->where("DATE_FORMAT(anniversary_date,'%m%d') >=", $start_date);
                            $this->db->where("DATE_FORMAT(anniversary_date,'%m%d') <=", $end_date);
                     }else if($value['name'] == 'c.created_at'){
                            $dates            = explode('-',$value['search']['value']);
                            $start_date       = date('md',strtotime($dates['0']));
                            $end_date         = date('md',strtotime($dates['1']));
                            $this->db->where("DATE_FORMAT(c.created_at,'%m%d') >=", $start_date);
                            $this->db->where("DATE_FORMAT(c.created_at,'%m%d') <=", $end_date);
                     }
                }
        }

         
         $i = 0;
        
        
        foreach($this->column_search as $item){
            if($postData['search']['value']){
                if($i===0){
                    if($item == 'feedback_count'){
                        $this->db->having('feedback_count',$postData['search']['value']);
                    }else{
                        $this->db->group_start();
                        $this->db->like($item, $postData['search']['value']);
                    }
                }else{
                    if($item == 'feedback_count'){
                       $this->db->or_having('feedback_count',$postData['search']['value']);
                    }else{
                        $this->db->or_like($item, $postData['search']['value']);  
                    }
                    
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
         


        if(isset($postData['order'])){
            if($postData['order'][0]['column'] == '1' || $postData['order'][0]['column'] == '2' || $postData['order'][0]['column'] == '3' || $postData['order'][0]['column'] == '4' || $postData['order'][0]['column'] == '5') {
                $this->db->order_by($this->column_order[$postData['order'][0]['column']], $postData['order'][0]['dir']);
            }
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

     //get Family details 
    public function getFamilyDetailsData($filter){
        $this->db->where($filter);
        return $this->db->get('family')->row_array();
    }
    public function getFamilyDetailsRows($postData){
        $this->_get_Family_details_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function countAllFamilyDetails(){
        $this->db->group_by('mobile');
        $this->db->from('family');
        return $this->db->count_all_results();
    }
    public function countFilteredFamilyDetails($postData){
        $this->_get_Family_details_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_Family_details_datatables_query($postData){

        $this->db->select('id,name,mobile,email,birthdate,anniversary_date,created_at');
        $this->db->group_by('mobile');
        $this->db->from('family');
        // Set orderable column fields
        $this->column_order = array(null,'name','mobile','email','birthdate','anniversary_date','created_at');

        // Set searchable column fields
        $this->column_search = array('name','mobile','email','birthdate','anniversary_date','created_at');
        // Set default order
        $this->order = array('id' => 'desc');

       

        foreach ($_POST['columns'] as $key => $value) {
                if(!empty($value['search']['value'])){

                    if($value['name'] == 'name' || $value['name'] == 'mobile' || $value['name'] == 'email'){
                            $this->db->or_like($value['name'],$value['search']['value']);
                     }else if($value['name'] == 'birthdate'){
                            $dates            = explode('-',$value['search']['value']);
                            $start_date       = date('md',strtotime($dates['0']));
                            $end_date         = date('md',strtotime($dates['1']));
                            $this->db->where("DATE_FORMAT(birthdate,'%m%d') >=", $start_date);
                            $this->db->where("DATE_FORMAT(birthdate,'%m%d') <=", $end_date);
                     }else if($value['name'] == 'anniversary_date'){
                             $dates            = explode('-',$value['search']['value']);
                            $start_date       = date('md',strtotime($dates['0']));
                            $end_date         = date('md',strtotime($dates['1']));
                            $this->db->where("DATE_FORMAT(anniversary_date,'%m%d') >=", $start_date);
                            $this->db->where("DATE_FORMAT(anniversary_date,'%m%d') <=", $end_date);
                     }else if($value['name'] == 'created_at'){
                             $dates            = explode('-',$value['search']['value']);
                            $start_date       = date('md',strtotime($dates['0']));
                            $end_date         = date('md',strtotime($dates['1']));
                            $this->db->where("DATE_FORMAT(created_at,'%m%d') >=", $start_date);
                            $this->db->where("DATE_FORMAT(created_at,'%m%d') <=", $end_date);
                     }
                }
        }

         
         $i = 0;
        
        
        foreach($this->column_search as $item){
            if($postData['search']['value']){
                if($i===0){
                        $this->db->group_start();
                        $this->db->like($item, $postData['search']['value']);
                }else{
                        $this->db->or_like($item, $postData['search']['value']);  
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
         


        if(isset($postData['order'])){
            if($postData['order'][0]['column'] == '1' || $postData['order'][0]['column'] == '2' || $postData['order'][0]['column'] == '3' || $postData['order'][0]['column'] == '4' || $postData['order'][0]['column'] == '5') {
                $this->db->order_by($this->column_order[$postData['order'][0]['column']], $postData['order'][0]['dir']);
            }
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    //get complaint details
    public function getComplaintDetailsRows($postData){
        $this->_get_Complaint_details_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function countAllComplaintDetails(){
        $this->db->from('complaint');
        return $this->db->count_all_results();
    }
    public function countFilteredComplaintDetails($postData){
        $this->_get_Complaint_details_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_Complaint_details_datatables_query($postData){

        $this->db->select('co.id,co.complaint_id,c.name,co.issue,m.name as manager_name,co.status,co.created_at,co.rating_id,rl.id as rating_log_id');
        $this->db->join('customer c','c.id = co.customer_id');
        $this->db->join('manager m','m.id = co.manager_id','left outer');
        $this->db->join('rating_logs rl','rl.rating_id = co.rating_id','left');
        $this->db->from('complaint co');

        // Set orderable column fields
        $this->column_order = array(null,'complaint_id','c.name','issue','manager_name','co.status','co.created_at');

        // Set searchable column fields
        $this->column_search = array(null,'complaint_id','c.name','issue','manager_name','co.status','co.created_at');
        // Set default order
        $this->order = array('co.id' => 'desc');


        foreach ($_POST['columns'] as $key => $value) {
                
                if($value['name'] == 'co.status'){
                    if($value['search']['value'] != ''){
                        $value['search']['value']++;
                    }
                    
                }

                if(!empty($value['search']['value'])){
                    if($value['search']['value'] != ''){
                        $value['search']['value']-- ;
                    }

                            if($value['name'] == 'manager_name'){
                                $manager_name = $value['search']['value'];
                                $this->db->having("manager_name LIKE '%".$manager_name."%' ");
                            }else if($value['name'] == 'co.created_at'){
                                $dates            = explode('-',$value['search']['value']);
                                $start_date       = date('md',strtotime($dates['0']));
                                $end_date         = date('md',strtotime($dates['1']));
                                $this->db->where("DATE_FORMAT(co.created_at,'%m%d') >=", $start_date);
                                $this->db->where("DATE_FORMAT(co.created_at,'%m%d') <=", $end_date);
                            }else{
                               $this->db->or_like($value['name'],$value['search']['value']);
                            }   

                }
        }

         
         $i = 0;
        
        
        foreach($this->column_search as $item){
            if($postData['search']['value']){
                if($i===0){
                        $this->db->group_start();
                        $this->db->like($item, $postData['search']['value']);
                }else{
                        $this->db->or_like($item, $postData['search']['value']);  
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
         


        if(isset($postData['order'])){
            if($postData['order'][0]['column'] == '1' || $postData['order'][0]['column'] == '2' || $postData['order'][0]['column'] == '3' || $postData['order'][0]['column'] == '4' || $postData['order'][0]['column'] == '5') {
                $this->db->order_by($this->column_order[$postData['order'][0]['column']], $postData['order'][0]['dir']);
            }
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function getCustomerFeedbackDates($filter){
        $this->db->select('r.id,r.created_at');
        $this->db->where($filter);
        $this->db->join('rating r','r.customer_id = c.id');
        return $this->db->get('customer c')->result_array();
    }
    public function getCustomerCouponsUsage($filter){
        $this->db->select('coupen,bill_amount,cu.discount,cu.created_at');
        $this->db->where($filter);
        $this->db->join('coupen_usage cu','cu.customer_id = c.id');
        $this->db->join('coupen co','co.id = cu.coupen_id');
        return $this->db->get('customer c')->result_array();
    }
    public function getCustomerDetails($filter){
        $this->db->where($filter);
        return $this->db->get('customer')->row_array();
    }
    //get contact details 
    public function getMessageLogsDetailsRows($postData){
        $this->_get_message_log_details_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();

        return $query->result();
    }
    public function countAllMessageLogDetails(){
        $this->db->from('rating');
        return $this->db->count_all_results();
    }
    public function countFilteredMessageLogDetails($postData){
        $this->_get_message_log_details_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_message_log_details_datatables_query($postData){

        $this->db->select('ml.id as message_log_id,mobile,m.id as message_id,message,recieved_status,ml.created_at as created_at');
        $this->db->from('message_logs ml');
        $this->db->join('message m','m.id = ml.message_id');
        // Set orderable column fields
        $this->column_order = array(null,'mobile','m.id','message','recieved_status','created_at');

        
        // Set searchable column fields
        $this->column_search = array('mobile','m.id','message','recieved_status','created_at');
        // Set default order
        $this->order = array('ml.id' => 'desc');

        // echo "<pre>";
        // print_r($_POST);exit;
        
        foreach ($_POST['columns'] as $key => $value) {
                if(!empty($value['search']['value'])){
                    if($value['name'] == 'ml.created_at'){
                        $created_at_date = $value['search']['value'];
                        $dates            = explode('-',$created_at_date);
                        $start_date       = date('Y-m-d',strtotime($dates['0']));
                        $end_date         = date('Y-m-d',strtotime($dates['1']));
                        $this->db->where('DATE(ml.created_at) >=', $start_date);
                        $this->db->where('DATE(ml.created_at) <=', $end_date);

                        if(isset($_POST['order'])){
                            if($_POST['order'][0]['dir'] == 'desc'){
                                $this->db->order_by('ml.created_at desc');
                            }else{
                                $this->db->order_by('ml.created_at asc');
                            }
                        }
                        
                        
                    }

                    if($value['name'] == 'mobile' || $value['name'] == 'recieved_status' || $value['name'] == 'm.id' || $value['name'] == 'message'){
                            $this->db->or_like($value['name'],$value['search']['value']);
                     }      
                }
        }

         
         $i = 0;
        
        foreach($this->column_search as $item){
            if($postData['search']['value']){

                if($i===0){
                    
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
         


        if(isset($postData['order'])){
            if($postData['order'][0]['column'] == '1' || $postData['order'][0]['column'] == '2' || $postData['order'][0]['column'] == '3' || $postData['order'][0]['column'] == '4' || $postData['order'][0]['column'] == '5' ) {
                $this->db->order_by($this->column_order[$postData['order'][0]['column']], $postData['order'][0]['dir']);
            }
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function addMessage($data){
        $this->db->insert('message',$data);
        return $this->db->insert_id(); 
    }
    public function updateMessage($filter,$data){
        $this->db->where($filter);
        return $this->db->update('message',$data);
    }
    public function updateBatchMessage($data){
        return $this->db->update_batch('message',$data,'id');
    }
    public function getMessageDetails($filter){
        $this->db->where($filter);
        return $this->db->get('message')->row_array();
    }
    public function getMessageList($filter){
        $this->db->where($filter);
        return $this->db->get('message')->result_array();
    }
    public function addContacts($data){
        return $this->db->insert('contacts',$data);
    }
    public function addContactBatch($data){
        return $this->db->insert_batch('contacts',$data);
    }
    public function updateContact($filter,$data){
        $this->db->where($filter);
        return $this->db->update('contacts',$data);
    }
    public function getContactList($filter){
        $this->db->where($filter);
        return $this->db->get('contacts')->result_array();
    }
    public function getContactDetails($filter){
        $this->db->where($filter);
        return $this->db->get('contacts')->row_array();
    }
    //get contact details 
    public function getContactDetailsRows($postData){
        $this->_get_contact_details_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();

        return $query->result();
    }
    public function countAllContactDetails(){
        $this->db->from('contacts');
        return $this->db->count_all_results();
    }
    public function countFilteredContactDetails($postData){
        $this->_get_contact_details_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_contact_details_datatables_query($postData){

        $this->db->select('*');
        $this->db->from('contacts');
        // Set orderable column fields
        $this->column_order = array(null,null,'mobile','filter','created_at');

        
        // Set searchable column fields
        $this->column_search = array('mobile','filter','created_at');
        // Set default order
        $this->order = array('id' => 'desc');

        
        foreach ($_POST['columns'] as $key => $value) {
                if(!empty($value['search']['value'])){
                    if($value['name'] == 'created_at'){
                        $created_at_date = $value['search']['value'];
                        $dates            = explode('-',$created_at_date);
                        $start_date       = date('Y-m-d',strtotime($dates['0']));
                        $end_date         = date('Y-m-d',strtotime($dates['1']));
                        $this->db->where('DATE(created_at) >=', $start_date);
                        $this->db->where('DATE(created_at) <=', $end_date);

                        if(isset($_POST['order'])){
                            if($_POST['order'][0]['dir'] == 'desc'){
                                $this->db->order_by('created_at desc');
                            }else{
                                $this->db->order_by('created_at asc');
                            }
                        }
                        
                        
                    }

                    if($value['name'] == 'mobile' || $value['name'] == 'filter'){
                            $this->db->or_like($value['name'],$value['search']['value']);
                     }      
                }
        }

         
         $i = 0;
        
        foreach($this->column_search as $item){
            if($postData['search']['value']){

                if($i===0){
                    
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
        
        // echo "<pre>";
        // print_r($_POST);exit;


        if(isset($postData['order'])){
            if($postData['order'][0]['column'] == '2' || $postData['order'][0]['column'] == '3') {
          
                $this->db->order_by($this->column_order[$postData['order'][0]['column']], $postData['order'][0]['dir']);
            }
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function addMessageLogs($data){
        return $this->db->insert_batch('message_logs',$data);
    }
    public function getCronSMSDetails($filter){
        $this->db->where($filter);
        return $this->db->get('cron_sms')->row_array();
    }
    public function deleteContact(){
        $this->db->where('id','1');
        return $this->db->delete('cron_sms');
    }
    public function getBirthdayCustomerList($filter){
        $this->db->where($filter);
        return $this->db->get('customer')->result_array();
    }
    public function getFamilyList($filter){
        $this->db->where($filter);
        return $this->db->get('family')->result_array();
    }
    public function getFamilyMemberDetails($filter){
        $this->db->where($filter);
        return $this->db->get('family')->row_array();
    }
    public function updateFamilyMember($filter,$data){
        $this->db->where($filter);
        return $this->db->update('family',$data);
    }
    public function getTableList(){
        return $this->db->get('table')->result_array();
    }
    public function getTableDetails($filter){
        $this->db->where($filter);
        return $this->db->get('table')->row_array();
    }
    public function addTable($data){
        return $this->db->insert('table',$data);
    }
    public function updateTable($filter,$data){
        $this->db->where($filter);
        return $this->db->update('table',$data);
    }
    public function getComplaintList(){
        $this->db->select('c.*,cu.name as customer_name,m.name as manager_name,rl.id as rating_log_id');
        $this->db->join('customer cu','cu.id = c.customer_id');
        $this->db->join('manager m','m.id = c.manager_id','left');
        $this->db->join('rating_logs rl','rl.rating_id = c.rating_id','left');
        return $this->db->get('complaint c')->result_array();     
    }
    public function getComplaintDetails($filter){
        $this->db->where($filter);
        return $this->db->get('complaint')->row_array();
    }
    public function updateComplaint($filter,$data){
        $this->db->where($filter);
        return $this->db->update('complaint',$data);
    }
    public function getManagerList($filter){
        $this->db->where($filter);
        return $this->db->get('manager')->result_array();
    }
    public function getManagerDetails($filter){
        $this->db->where($filter);
        return $this->db->get('manager')->row_array();
    }
    public function addManager($data){
        return $this->db->insert('manager',$data);
    }
    public function updateManager($filter,$data){
        $this->db->where($filter);
        return $this->db->update('manager',$data);
    }
    public function getCoupenList($filter){
        $this->db->where($filter);
        return $this->db->get('coupen')->result_array();
    }
    public function getCoupenDetails($filter){
        $this->db->where($filter);
        return $this->db->get('coupen')->row_array();
    }
    public function addCoupen($data){
        return $this->db->insert('coupen',$data);
    }
    public function updateCoupen($filter,$data){
        $this->db->where($filter);
        return $this->db->update('coupen',$data);
    }
    public function getCouponUsage(){
        $this->db->select('cu.* ,name,coupen');
        $this->db->join('coupen co','co.id = cu.coupen_id');
        $this->db->join('customer c','c.mobile = cu.mobile','left outer');
        return $this->db->get('coupen_usage cu')->result_array();
    }
    public function getDates(){
        $this->db->select('MIN(DATE(created_at)) as first_date,MAX(DATE(created_at)) as last_date');
        return $this->db->get('rating')->row_array();
    }
    public function getTodaysBirthData($select = NULL,$filter){
        if($select){
            $this->db->select($select);
        }
        $this->db->where($filter);
        return $this->db->get('customer')->result_array();
    }
    public function getCustomerIds($mobile){
        $this->db->select('id,mobile');
        $this->db->like('mobile',$mobile,'both');
        return $this->db->get('customer')->result_array();
    }
    public function addCoupenUsage($data){
        return $this->db->insert('coupen_usage',$data);
    }
     public function getDashboardDetails(){
            $query = "SELECT 
              ( SELECT COUNT(id) FROM customer) AS number_of_customer, 
              ( SELECT COUNT(id) FROM rating ) AS rating, 
              ( SELECT COUNT(id) FROM customer  WHERE DATE_FORMAT(birthdate,'%m%d') ='".date('md')."' ) AS birthday_count ,
              ( SELECT COUNT(id) FROM customer  WHERE DATE_FORMAT(anniversary_date,'%m%d') ='".date('md')."' ) anniversary_count";

            $query_result = $this->db->query($query);
            return $query_result->row_array();  
    }
    public function getWeeklyBirthdayList($start_date,$end_date){
              $query = "SELECT 
              ( SELECT COUNT(id)  FROM customer  WHERE DATE_FORMAT(birthdate,'%m%d') BETWEEN '".date('md',strtotime($start_date))."' AND '".date('md',strtotime($end_date))."'  ) AS weekly_birthday_count ,
              ( SELECT COUNT(id) FROM customer  WHERE DATE_FORMAT(anniversary_date,'%m%d') BETWEEN '".date('md',strtotime($start_date))."' AND '".date('md',strtotime($end_date))."' ) AS weekly_anniversary_count";

            $query_result = $this->db->query($query);
            return $query_result->row_array();  
    }
    public function getBirthdayList($filter){ 
        $this->db->select('c.id as customer_id,c.name,c.mobile,c.email,c.created_at,COUNT(r.id) as feedback_count,f.id as family_id');  
        $this->db->where($filter);
        $this->db->join('rating r ','r.customer_id = c.id');
        $this->db->join('family f','f.family_id = c.id','left');
        $this->db->group_by('c.mobile');
        return $this->db->get('customer c')->result_array();
    }
    public function exportComplaintData(){
        $this->db->select('c.*,cu.*,r.*,m.name as manager_name');
        $this->db->join('manager m','m.id = c.manager_id','left');
        $this->db->join('rating r','r.id = c.rating_id');
        $this->db->join('customer cu','cu.id = c.customer_id');
        return $this->db->get('complaint c')->result_array();
    }

    //get complaint view
    public function getComplaintDetailsData($postData){
        $this->_get_complaint_details_data_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function countAllComplaintDetailsData(){
        $this->db->from('complaint');
        return $this->db->count_all_results();
    }
    public function countFilteredComplaintDetailsData($postData){
        $this->_get_complaint_details_data_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_complaint_details_data_datatables_query($postData){

        $this->db->select('c.id,cu.name,cu.mobile,cu.email,cu.birthdate,cu.anniversary_date,c.created_at,question_1,question_2,question_3,question_4,question_5,question_6,question_7,question_8,question_9,issue,action_taken,c.status,m.name as manager,c.complaint_id');
        $this->db->join('table t','t.id = c.table_id');
        $this->db->join('manager m','m.id = c.manager_id','left outer');
        $this->db->join('rating r','r.id = c.rating_id');
        $this->db->join('customer cu','cu.id = c.customer_id');
        $this->db->from('complaint c');
        // Set orderable column fields
        $this->column_order = array(null,'c.complaint_id','cu.name','cu.mobile','cu.email','cu.birthdate','cu.anniversary_date','c.created_at','question_1','question_2','question_3','question_4','question_5','question_6','question_7','question_8','question_9','issue','action_taken','c.status','manager');

        // Set searchable column fields
        $this->column_search = array('c.complaint_id','cu.name','cu.mobile','cu.email','cu.birthdate','cu.anniversary_date','c.created_at','question_1','question_2','question_3','question_4','question_5','question_6','question_7','question_8','question_9','issue','action_taken','c.status','manager');
        // Set default order
        $this->order = array('c.created_at' => 'desc');

        // if(isset($_POST['type'])){
        //     if($_POST['type'] == 'cu.birthdate'){
        //     $dates            = explode('-',$_POST['date']);
        //     $start_date       = date('md',strtotime($dates['0']));
        //     $end_date         = date('md',strtotime($dates['1']));
        //     $this->db->where("DATE_FORMAT(birthdate,'%m%d') >=", $start_date);
        //     $this->db->where("DATE_FORMAT(birthdate,'%m%d') <=", $end_date);

        //     }

        //     if($_POST['type'] == 'cu.anniversary_date'){
        //         $dates            = explode('-',$_POST['date']);
        //         $start_date       = date('md',strtotime($dates['0']));
        //         $end_date         = date('md',strtotime($dates['1']));
        //         $this->db->where("DATE_FORMAT(anniversary_date,'%m%d') >=", $start_date);
        //         $this->db->where("DATE_FORMAT(anniversary_date,'%m%d') <=", $end_date);

        //     }

        //     if($_POST['type'] == 'c.created_at'){
        //         $dates            = explode('-',$_POST['date']);
        //         $start_date       = date('md',strtotime($dates['0']));
        //         $end_date         = date('md',strtotime($dates['1']));
        //         $this->db->where("DATE_FORMAT(c.created_at,'%m%d') >=", $start_date);
        //         $this->db->where("DATE_FORMAT(c.created_at,'%m%d') <=", $end_date);

        //     }     
        // }
       

        foreach ($_POST['columns'] as $key => $value) {
                if(!empty($value['search']['value'])){

                        if($value['name'] == 'manager'){

                        }else if($value['name'] == 'c.created_at'){
                                $dates            = explode('-',$value['search']['value']);
                                $start_date       = date('md',strtotime($dates['0']));
                                $end_date         = date('md',strtotime($dates['1']));
                                $this->db->where("DATE_FORMAT(c.created_at,'%m%d') >=", $start_date);
                                $this->db->where("DATE_FORMAT(c.created_at,'%m%d') <=", $end_date);
                        }else{
                            $this->db->or_like($value['name'],$value['search']['value']);
                        }
                              
                    
                        
                          
                        
                }
        }

         
         $i = 0;
        
        
        foreach($this->column_search as $item){
            if($postData['search']['value']){
                if($i===0){
                    if($item == 'manager'){
                        
                    }else{
                        $this->db->group_start();
                        $this->db->like($item, $postData['search']['value']);
                    }
                        
                }else{
                    if($item == 'manager'){
                        
                    }else{
                        $this->db->or_like($item, $postData['search']['value']);  
                    }
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
         


        if(isset($postData['order'])){
            if($postData['order'][0]['column'] == '1' || $postData['order'][0]['column'] == '2' || $postData['order'][0]['column'] == '3' || $postData['order'][0]['column'] == '4' || $postData['order'][0]['column'] == '5') {
                $this->db->order_by($this->column_order[$postData['order'][0]['column']], $postData['order'][0]['dir']);
            }
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

}

?>

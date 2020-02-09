
<?php

class Admin_model extends CI_Model {

    function __construct() {        
        parent::__construct();
    }

    public function addRegistration($data) {
        $this->db->insert('customer',$data);
    	return $this->db->insert_id();
    }
    public function addRating($data) {
        $this->db->insert('rating',$data);
        return $this->db->insert_id();
    }
    public function getCustomerDetails($filter){
        $this->db->where($filter);
        return $this->db->get('customer')->row_array();
    }
    public function addFamilyMember($data) {
        $this->db->insert('family',$data);
        return $this->db->insert_id();
    }
    public function getFamilyMemberDetails($filter){
        $this->db->where($filter);
        return $this->db->get('family')->row_array();
    }
    public function getContactDetails($filter){
        $this->db->where($filter);
        return $this->db->get('contacts')->row_array();
    }
    public function addContact($data){
        return $this->db->insert('contacts',$data);
    }
    public function getTableList(){
        return $this->db->get('table')->result_array();
    }
    public function updateCustomer($filter,$data){
        $this->db->where($filter);
        return $this->db->update('customer',$data);
    }
    public function getComplaintList(){
        return $this->db->get('complaint')->result_array();
    }
    public function addComplaint($data){
        $this->db->insert('complaint',$data);
    }
    public function getFeedbackDetails($filter){
        $this->db->where($filter);
        $this->db->select('c.*,r.*,r.id as rating_id');
        $this->db->join('customer c','c.id = r.customer_id');
        return $this->db->get('rating r')->row_array();
    }
    public function updateRating($filter,$data){
        $this->db->where($filter);
        return $this->db->update('rating',$data);
    }
    public function addPreviousRatingData($data){
        return $this->db->insert('rating_logs',$data);
    }
}

?>
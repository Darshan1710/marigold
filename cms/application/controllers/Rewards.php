<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rewards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function rewardsMasterList(){
		
		$data['rewards'] = $this->Rewards_model->getRewardsMasterList();

		$this->load->view('rewards/rewardsMasterList',$data);
	}
	public function rewardsMasterForm(){
		$this->load->view('rewards/rewardsMasterForm');
	}
	public function addRewardsMaster(){
		$this->form_validation->set_rules('min_points','Min Points','required|trim|xss_clean|max_length[11]');
        $this->form_validation->set_rules('max_points','Max Points','required|trim|xss_clean|max_length[11]');
        $this->form_validation->set_rules('points_value','Points value','required|trim|xss_clean|max_length[11]');
        $this->form_validation->set_rules('start_date','Start Date','required');
        $this->form_validation->set_rules('end_date','End Date','required');
        $this->form_validation->set_rules('status','Status','required|trim|xss_clean|max_length[11]');
        if($this->form_validation->run()){
            
   

            $input_data     = $this->input->post();

            $data   = array('min_points'	=>$input_data['min_points'],
							'max_points'	=>$input_data['max_points'],
							'points_value'	=>$input_data['points_value'],
                            'start_date'    =>date('Y-m-d h:i:s',strtotime($input_data['start_date'])),
                            'end_date'      =>date('Y-m-d h:i:s',strtotime($input_data['end_date'])),
							'status'		=>$input_data['status'],
							'created_by'	=>$this->session->userdata('user_id')
						);

            $add_rewards = $this->Rewards_model->addRewardsMaster($data);


            redirect(base_url().'Rewards/rewardsMasterList');
        }else{
            $this->load->view('rewards/rewardsMasterForm');
        }
	}
	public function editRewardsMaster(){
        $this->form_validation->set_rules('id','Id','required|trim|xss_clean');
        if($this->form_validation->run()){
            $id = $this->input->post('id');

            $filter = array('id'=>$id);
            $result = $this->Rewards_model->getRewardsMasterDetails($filter);
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
	public function updateRewardsMaster(){
		$this->form_validation->set_rules('min_points','Min Points','required|trim|xss_clean|max_length[11]');
        $this->form_validation->set_rules('max_points','Max Points','required|trim|xss_clean|max_length[11]');
        $this->form_validation->set_rules('points_value','Points value','required|trim|xss_clean|max_length[11]');
        $this->form_validation->set_rules('start_date','Start Date','required');
        $this->form_validation->set_rules('end_date','End Date','required');
        $this->form_validation->set_rules('status','Status','required|trim|xss_clean|max_length[11]');
        if($this->form_validation->run()){
            	
            $input_data     = $this->input->post();

            $filter = array('id'=>$input_data['id']);

            $data   = array('min_points'	=>$input_data['min_points'],
							'max_points'	=>$input_data['max_points'],
							'points_value'	=>$input_data['points_value'],
                            'start_date'    =>$input_data['start_date'],
                            'end_date'      =>$input_data['end_date'],
							'status'		=>$input_data['status'],
							'created_by'	=>$this->session->userdata('user_id')
						);

            $update_rewards = $this->Rewards_model->updateRewardsMaster($filter,$data);
			if($update_rewards){
                $returnArr['errCode'] = -1;
                $returnArr['message']    = 'success';
            }else{
                $returnArr['errCode'] = 2;
                $returnArr['message']    = 'Please try again';
            }
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['message'][$key] = form_error($key);
                }
            }
        echo json_encode($returnArr);   
	}

	public function rewardsPointsForm(){
		$this->load->view('rewards/rewardsPointsForm');
	}
	public function addRewardsPoints(){
		$this->form_validation->set_rules('bill_id','Bill Id','required|trim|xss_clean|max_length[11]');
        $this->form_validation->set_rules('bill_amount','Bill Amount','required|trim|xss_clean|max_length[11]');
        $this->form_validation->set_rules('mobile','Mobile','required|trim|xss_clean|max_length[11]|regex_match[/^[0-9]{10}$/]');

        if($this->form_validation->run()){
            	
            $input_data     = $this->input->post();

            $filter = array('status'=>'1');
            $master = $this->Rewards_model->getRewardsMasterDetails($filter);

            $a_filter = array('activity'=>'bill');
            $a_details = $this->Rewards_model->getRewardsActivityDetails($a_filter);

            $bill_amount = $this->input->post('bill_amount');
            $mobile      = $this->input->post('mobile');
            $bill_id     = $this->input->post('bill_id');

            $mod = $bill_amount%100;
    		$points =  $bill_amount+($mod<(100/2)?-$mod:100-$mod);

            $data   = array(
                            'mobile'        =>$input_data['mobile'],
                            'activity_id'   =>$bill_id,
                            'activity_type' =>$a_details['activity'],
                            'bill_amount'	=>$input_data['bill_amount'],
							'points'		=>$points,
							'created_by'	=>$this->session->userdata('user_id')
						);

            $add_bill = $this->Rewards_model->addRewards($data);

            //update points
            $m_filter = array('mobile'=>$input_data['mobile']);
            $check_entry = $this->Rewards_model->getPointsDetails($m_filter);

            if($check_entry){
            	$update_points = $this->Rewards_model->updateRewardsPoints($mobile,$points);
            }else{
            	$points_data = array('mobile'		=>$mobile,
            						 'points_earned'=>$points
            						);
            	$add_points = $this->Rewards_model->addRewardsPoints($points_data);
             }
            $this->form_validation->clear_field_data();

            $data['message'] = 'Points Added';
            $this->load->view('rewards/rewardsPointsForm',$data);	
        }else{
            $this->load->view('rewards/rewardsPointsForm');
        }
	}

    public function rewardsUsageForm(){
        $this->load->view('rewards/rewardsUsageForm');
    }
	public function redeemPoints(){
		$this->form_validation->set_rules('mobile','Mobile','required|trim|xss_clean|max_length[11]|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('bill_amount','Bill Amount','required|trim|xss_clean|max_length[11]');
        $this->form_validation->set_rules('bill_id','Bill Id','required|trim|xss_clean|max_length[11]|numeric');
        $this->form_validation->set_rules('points','Points','required|trim|xss_clean|max_length[11]');
        if($this->form_validation->run()){
            	
            $input_data     = $this->input->post();

            $mobile = $input_data['mobile'];
            $points = $input_data['points'];

            $r_filter = array('status'=>'1');
            $rewards_details = $this->Rewards_model->getRewardsMasterDetails($r_filter);

            $filter = array('mobile'=>$input_data['mobile']);
            $points_details = $this->Rewards_model->getPointsDetails($filter);

            $rm_data    = array('mobile'            =>$input_data['mobile'],
                                'bill_id'           =>$input_data['bill_id'],
                                'bill_amount'       =>$input_data['bill_amount'],
                                'points_redeemed'   =>$input_data['points']);
            $add_points_details = $this->Rewards_model->addRewardsUsage($rm_data);

            if($add_points_details){
            	$update_points = $this->Rewards_model->redeemPoints($mobile,$points);
                
                $this->form_validation->clear_field_data();

                $data['message'] = 'Rewards Usage successfully';
            	$this->load->view('rewards/rewardsUsageForm',$data);  
            }else{
            	$this->load->view('rewards/rewardsUsageForm');  
            }
        }else{
            $this->load->view('rewards/rewardsUsageForm');   
        }
	}

    public function checkValidPoints(){
       $this->form_validation->set_rules('mobile','Mobile','required|trim|xss_clean|max_length[11]|regex_match[/^[0-9]{10}$/]');
        if($this->form_validation->run()){
                
            $input_data     = $this->input->post();

            $r_filter = array('status'=>'1');
            $rewards_details = $this->Rewards_model->getRewardsMasterDetails($r_filter);

            $filter = array('mobile'=>$input_data['mobile']);
            $points_details = $this->Rewards_model->getPointsDetails($filter);

            $remaining_points = $points_details['points_earned'] - $points_details['points_redeemed'];

            $returnArr['errCode']    = -1;
            $returnArr['message']    = $remaining_points;
        }else{
            $returnArr['errCode'] = 3;
            foreach($this->input->post() as $key => $value){
                    $returnArr['message'][$key] = form_error($key);
                }
        }
        echo json_encode($returnArr);   
    }



}

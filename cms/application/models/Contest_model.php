<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Contest_model extends CI_Model{

	public function construct(){
		parent::__construct();
	}

	public function addContestForm($data){
		$this->db->insert('contest_master',$data);
		return $this->db->insert_id();
	}
	public function addContestFormFields($data){
		for($i=1; $i<=$data['num_fields']; $i++){
			$form_questions = array(
									'contest_id' 	=> $data['contest_id'],
									'question_text' => $data['question_'.$i]
								);

			$add_question = $this->db->insert('contest_questions',$form_questions);
			if($add_question){
				
				$farm_valid_answers = array(
										'contest_id'   => $data['contest_id'],
										'question_id'  => $add_question,
										'element_type' => $data['answer_type_'.$i],
										'element_text' => $data['button_options_'.$i]
										);
				$this->db->insert('contest_valid_answer', $farm_valid_answers);
			}else{
				return false;
			}
			
		}
		return true;
	}
	public function getForm($contest_id,$limit,$offset){	

		$query = $this->db->query("SELECT * FROM contest_master WHERE id = ".$contest_id);
			if($query->num_rows() > 0){
				$row  = $query->row_array();

				// $now = strtotime(date('Y-m-d'));
				// $your_date = strtotime($row['start']);
				// $datediff = $your_date - $now;
				// $days =  round($datediff / (60 * 60 * 24));

				// if($row['type'] == 1){
				// 	$limit = $days >= 0 ? ++$days : 0;
				// }


				

				$this->db->select('cq.question_id, cq.question_text, cva.element_type, cva.element_text,cq.image ');
				$this->db->join('contest_valid_answer cva','cq.question_id = cva.question_id AND cq.contest_id = cva.contest_id');
				$this->db->where('cq.contest_id',$row['id']);
				if($limit){
					$this->db->limit($limit,$offset);
				}
				

				$sub_query = $this->db->get('contest_questions cq')->result_array();
				
				// echo $this->db->last_query();exit;
				$form = array();
				$j = 0;
				foreach($sub_query as $result){
					$form[$j]['question_id']    = $result['question_id'];
					$form[$j]['question_text']  = $result['question_text'];
					$form[$j]['element_type']   = $result['element_type'];
					$form[$j]['element_text']   = $result['element_text'];
					$form[$j]['image']    		= $result['image'];
					
					$j++;
				}
				
				return $form;
			}else
				return false;
	}
	public function getForms($farmer_id=""){
		$query = $this->db->query("SELECT * FROM forms");
		if($query->num_rows() > 0){
			$i = 0;
			foreach($query->result_array() as $row){
				if(strlen($farmer_id) > 0){
					$status_query = $this->db->query("SELECT COUNT(*) as count FROM form_answers WHERE farmer_id= ".$farmer_id." AND form_id = ".$row['form_id']);
					if($status_query->row_array()['count'] > 0){
						$form['form'][$i]['status'] = true;	
					}
					else{
						$form['form'][$i]['status'] = false;	
					}	
				}
				else{
					$form['form'][$i]['status'] = false;	
				}
				
				$form['form'][$i]['form_id']     = $row['form_id'];
				$form['form'][$i]['form_title']  = $row['form_title'];
				$form['form'][$i]['created_by']  = $row['created_by'];
				$form['form'][$i]['created_on']  = $row['created_on'];				
				$form['form'][$i]['points']      = $row['points'];	

				$i++;			
			}

			return $form;
		}
		else{
			return false;
		}
	}

	// public function getForm($form_id){ 
	// 	$query = $this->db->query("SELECT * FROM forms WHERE form_id = ".$form_id);
	// 	if($query->num_rows() > 0){
	// 		$row  = $query->row_array();
	// 		$form['form_id']     = $row['form_id'];
	// 		$form['form_title']  = $row['form_title'];
	// 		$form['created_by']  = $row['created_by'];
	// 		$form['created_on']  = $row['created_on'];				
	// 		$form['points']      = $row['points'];
	// 		$form['num_fields']  = $row['num_fields'];
	// 		$sub_query = $this->db->query("SELECT FQ.question_id, FQ.question_text, FVA.element_type, FVA.element_text FROM form_questions FQ INNER JOIN form_valid_answer FVA ON FQ.question_id = FVA.question_id AND FQ.form_id = FVA.form_id WHERE FQ.form_id = ".$row['form_id']);
	// 		$j = 0;
	// 		foreach($sub_query->result_array() as $result){
	// 			$form['form']['questions'][$j]['question_id']    = $result['question_id'];
	// 			$form['form']['questions'][$j]['question_text']  = $result['question_text'];
	// 			$form['form']['questions'][$j]['answer_type']    = $result['element_type'];
	// 			$form['form']['questions'][$j]['element_type']   = $result['element_text'];
	// 			$j++;
	// 		}

	// 		return $form;
	// 	}	
	// 	else
	// 		return false;
	// }////

	public function save_form($data){
		$this->db->trans_start();
		$count = count($data['answers']);
		for($i=1;$i<=$count;$i++){
			$form_answers = array(
							'form_id'     => $data['form_id'],
							'question_id' => $i,
							'answer'      => $data['answers']['answer_'.$i],
							'farmer_id'   => $data['farmer_id']
								);
			$this->db->insert('form_answers', $form_answers);
			
		}
		$query = $this->db->query("SELECT points FROM forms WHERE form_id = ".$data['form_id']);
		$this->farmer_model->assign_rewards($data['farmer_id'], 'feedback_form', $query->row_array()['points']);
		$this->db->trans_complete();
		return true;
	}


	public function getContestFormList(){
		return $this->db->get('contest_master')->result_array();
	}
	public function getContestDetails($filter){
		$this->db->where($filter);
		return $this->db->get('contest_master')->row_array();
	}
	public function getContestFormDetails($filter){
		$this->db->where($filter);
		$this->db->join('contest_questions cq','(cq.question_id = cva.question_id AND cq.contest_id = cva.contest_id)');
		return $this->db->get('contest_valid_answer cva')->result_array();		
	}
	public function getQuestionList($filter){
		$this->db->where($filter);
		return $this->db->get('contest_questions')->result_array();
	}
	public function addQuestion($data){
		$this->db->insert('contest_questions',$data);
		return $this->db->insert_id();
	}
	public function updateQuestion($filter,$data){
		$this->db->where($filter);
		return $this->db->update('contest_questions',$data);
	}
	public function getAttemptedQuestion($filter){
		$this->db->where($filter);
		return $this->db->get('contest_answer')->result_array();
	}
	public function getValidAnswer($filter){
		$this->db->where($filter);
		return $this->db->get('contest_valid_answer')->row_array();
	}
	public function addValidAnswer($data){
		return $this->db->insert('contest_valid_answer',$data);
	}
	public function updateValidAnswer($filter,$data){
		$this->db->where($filter);
		return $this->db->update('contest_valid_answer',$data);
	}
	public function getFarmerDetails($filter){
		$this->db->where($filter);
		$this->db->select('f.id,region_id,SUM(points) as points');
		$this->db->join('rewards_earned re','re.farmer_id = f.id');
		return $this->db->get('farmers f')->row_array();
	}
	public function getWinnerList($filter){
		$this->db->where($filter);
		$this->db->select('f.name as farmer_name,cg.name as gift_name,profilepic,DATE_FORMAT(winning_date,"%d-%m-%Y") as winning_date');
		$this->db->join('contest_gift cg','cg.id = cw.gift_id');
		$this->db->join('farmers f','f.id = cw.farmer_id');
		$this->db->join('contest_master cm','cm.id = cw.contest_id');
		$this->db->order_by('cm.type','desc');
		$this->db->order_by('cw.winning_date','desc');
		return $this->db->get('contest_winner cw')->result_array();
	}
	public function getWinnerListData(){
		$this->db->select('cw.id,contest_name,c.name as customer_name,cg.name as gift_name,winning_date,cw.status');
		$this->db->join('contest_gift cg','cg.id = cw.gift_id');
		$this->db->join('customer c','c.id = cw.farmer_id');
		$this->db->join('contest_master cm','cm.id = cw.contest_id');
		$this->db->order_by('cw.winning_date','desc');
		return $this->db->get('contest_winner cw')->result_array();
	}
	public function getWinnerDetails($filter){
		$this->db->where($filter);
		return $this->db->get('contest_winner')->row_array();
	}
	public function addWinner($data){
		return $this->db->insert('contest_winner',$data);
	}
	public function updateWinner($filter,$data){
		$this->db->where($filter);
		return $this->db->update('contest_winner',$data);
	}
	public function getFarmerList(){
		$this->db->select('id');
		return $this->db->get('farmers')->result_array();
	}
	public function getGiftList($filter = NULL){
		if($filter){
			$this->db->where($filter);
		}
		$this->db->select('cg.*,contest_name');
		$this->db->join('contest_master cm','cm.id = cg.contest_id');
		return $this->db->get('contest_gift cg')->result_array();
	}
	public function getGiftDetails(){
		return $this->db->get('contest_gift')->row_array();
	}
    public function addContestGift($data){
    	return $this->db->insert('contest_gift',$data);
    }
    public function updateGift($filter,$data){
    	$this->db->where($filter);
    	return $this->db->update('contest_gift',$data);
    }
    public function getContestSetting($filter){
    	$this->db->where($filter);
    	return $this->db->get('contest_setting')->row_array();
    }
    public function updateContestSetting($filter,$data){
    	$this->db->where($filter);
    	return $this->db->update('contest_setting',$data);
    }
    public function getContestMasterDetails($filter){
    	$this->db->where($filter);
    	$this->db->group_by('type');
    	return $this->db->get('contest_master')->result_array();
    }
    public function addAnswer($data){
    	return $this->db->insert_batch('contest_answer',$data);
    }
    public function getContenstantList($filter){
    	$this->db->select('contest_name,name,start,end,c.id');
    	$this->db->where($filter);
    	$this->db->join('customer c','c.id = ca.customer_id');
    	$this->db->join('contest_master cm','cm.id = ca.contest_id');
    	$this->db->group_by('c.id');
    	return $this->db->get('contest_answer ca')->result_array();
    }
    public function getContestAnswer($filter){
    	$this->db->select('question_id,answer,farmer_id');
    	$this->db->where($filter);
    	$this->db->order_by('question_id');
    	return $this->db->get('contest_answer')->result_array();
    }
    public function updateRewardsRedeem($farmer_id,$points){
    	$sql = "UPDATE rewards_redeem SET total_redeemed = total_redeemed - ".$points." WHERE farmer_id = ".$farmer_id;
    	$query = $this->db->query($sql);
    }
    public function getTodaysAttemptedQuestion($filter){
    	$this->db->where($filter);
    	return $this->db->get('contest_answer')->num_rows();
    }



}


?>
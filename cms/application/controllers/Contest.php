<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contest extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function contestForm(){
		if($this->session->userdata('logged_in')){
    		$this->load->view('contest/contest_form');
		}else{
			redirect(base_url().'dashboard/logout');
		}
	}

	public function create_form(){
		if($this->session->userdata('logged_in')){

			$this->form_validation->set_rules('contest_name', 'Contest Name', 'required|trim|xss_clean|max_length[1000]');
			$this->form_validation->set_rules('num_fields', 'Number of question', 'required|trim|xss_clean|max_length[11]|numeric');
			$this->form_validation->set_rules('points', 'Points', 'required|trim|xss_clean|numeric|max_length[11]');
			$this->form_validation->set_rules('start', 'Start', 'required');
			$this->form_validation->set_rules('end', 'End', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required|trim|xss_clean|max_length[50]');
			$this->form_validation->set_rules('terms_and_condition', 'Terms And Condition', 'required|trim|xss_clean|max_length[5000]');
			$this->form_validation->set_rules('how_to_participate', 'How to Participate', 'required|trim|xss_clean|max_length[5000]');
			$this->form_validation->set_rules('image','Image','callback_file_check');
			if($this->form_validation->run()){
				$input_data = $this->input->post();

				if(!empty($_FILES)){
						$new_image_name = time().str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['image']['name']);
						
						$config['upload_path'] 		= 'uploads/contest/'; 	
						$config['allowed_types'] 	= '*';
						$config['file_name'] 		= $new_image_name;
						$config['max_size']  		= '0';
						$config['max_width']  		= '0';
						$config['max_height']  		= '0';
						$config['min_width'] 		= '0';
						$config['min_height'] 		= '0';
							
						$this->load->library('upload', $config);
						$upload = $this->upload->do_upload('image');
						
						if(!$upload){

							$save['image'] = '';
						}else{
							$save['image'] =  base_url().$config['upload_path'].$new_image_name;
				
						}	
						
					}

				$data = array('contest_name'=>	$input_data['contest_name'],
							  'num_fields'	=>  $input_data['num_fields'],
							  'points'		=>  $input_data['points'],
							  'start'		=>  date('Y-m-d',strtotime($input_data['start'])),
							  'end'			=>  date('Y-m-d',strtotime($input_data['end'])),
							  'active'		=>  1,
							  'type'		=>  $input_data['type'],
							  'image'		=>  $save['image'],
							  'created_by'	=>  $this->session->userdata('user_id'),
							);

				$add_contest_details = $this->Contest_model->addContestForm($data);

				$data['contest_id']		 = $add_contest_details;
				$data['contest_details'] = $data;	
	    		
	    		$this->load->view('contest/contest_form_field',$data);
				

			}else{
	    		$this->load->view('contest/contest_form');
				
			}
		}else{
			redirect(base_url().'dashboard/logout');
		}
	}

	public function contest_form_fields(){
		if($this->session->userdata('logged_in')){



			$data['num_fields'] =  $this->input->post('num_fields','Number of fields','required|trim|xss_clean|max_length[11]|numeric');
			$data['contest_id']    = $this->input->post('contest_id','Contest Id','required|trim|xss_clean|max_length[11]|numeric');

			for($i = 1; $i <= $data['num_fields']; $i++){			
				$this->form_validation->set_rules('question_'.$i, 'Question '.$i, 'required');
				$this->form_validation->set_rules('answer_'.$i, 'Answer '. $i, 'required');	
				$this->form_validation->set_rules('answer_type_'.$i, 'Answer Type '.$i, 'required');	
				// $answer_type = $this->input->post('answer_type_'.$i);
				// if($answer_type != "text"){
				// 	$this->form_validation->set_rules('button_options_'. $i, 'Button Options '.$i, 'required');	
				// }
			}


			if($this->form_validation->run()){

				for($i = 1; $i <= $data['num_fields']; $i++){
					$data['question_'.$i]     = $this->input->post("question_".$i);
					$data['answer_type_'.$i]  = $this->input->post("answer_type_".$i);
					if($data['answer_type_'.$i] != "text");
					{
						$data['button_count_'.$i]   = $this->input->post("button_count_".$i);
						$data['button_options_'.$i] = $this->input->post("button_options_".$i);
					}
				}

				$add_contest_question = $this->Contest_model->addContestFormFields($data);

				redirect(base_url().'index.php/Contest/contestFormList');
			}else{

		    	$this->load->view('contest/contest_form_field',$data);
		    	
			}
		}else{
			redirect(base_url().'index.php/dashboard/logout');
		}
		
	}

	public function contestFormList(){
		$data['contest'] = $this->Contest_model->getContestFormList();
    	$this->load->view('contest/contest_list',$data);
	}
	public function getContestQuestionList(){
		if($this->session->userdata('logged_in')){
			$contest_id = $this->uri->segment(3);
		
			if($contest_id){		

					$filter = array('id'=>$contest_id);
					$data['contest_details'] = $this->Contest_model->getContestDetails($filter);

					$c_filter = array('cq.contest_id'=>$contest_id);
					$data['contest_form_details'] = $this->Contest_model->getContestFormDetails($c_filter);


					
		    		
		    		$this->load->view('contest/question_list',$data);
					
			}else{
				redirect(base_url().'index.php/Contest/contestFormList');
			}
		}else{
			redirect(base_url().'index.php/dashboard/logout');
		}
	}
	public function questionForm(){
		if($this->session->userdata('logged_in')){
			$data['contest_id'] = $this->uri->segment(3);
			$data['question_id'] = $this->uri->segment(4);
			if($data){
				
	    		
	    		$this->load->view('contest/add_question',$data);
				
			}else{
				redirect(base_url().'index.php/Contest/contestFormList');
			}
		}else{
			redirect(base_url().'index.php/dashboard/logout');
		}
	}
	public function addQuestion(){

		if($this->session->userdata('logged_in')){
			$data['contest_id'] = $this->input->post('contest_id');
			$data['question_id'] = $this->input->post('question_id');

			$this->form_validation->set_rules('contest_id','Contest Id','required|trim|xss_clean|max_length[11]|numeric');
			$this->form_validation->set_rules('question','Question','required|trim|xss_clean|max_length[255]');
			$this->form_validation->set_rules('element_type','Element Type','required|trim|xss_clean|max_length[11]');
			$this->form_validation->set_rules('valid_answer','Valid Answer','required|trim|xss_clean|max_length[255]');
			// $this->form_validation->set_rules('image','Image','callback_file_check');
			if($this->form_validation->run()){

					$input_data = $this->input->post();

					// if(!empty($_FILES)){
					// 	$new_image_name = time().str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['image']['name']);
						
					// 	$config['upload_path'] 		= 'uploads/contest/'; 	
					// 	$config['allowed_types'] 	= '*';
					// 	$config['file_name'] 		= $new_image_name;
					// 	$config['max_size']  		= '0';
					// 	$config['max_width']  		= '0';
					// 	$config['max_height']  		= '0';
					// 	$config['min_width'] 		= '0';
					// 	$config['min_height'] 		= '0';
							
					// 	$this->load->library('upload', $config);
					// 	$upload = $this->upload->do_upload('image');
						
					// 	if(!$upload){

					// 		$save['image'] = '';
					// 	}else{
					// 		$save['image'] =  base_url().$config['upload_path'].$new_image_name;
				
					// 	}	
						
					// }

					$q_data   	= array('contest_id'	=>$input_data['contest_id'],
										'question_text' =>$input_data['question'],
										// 'image'			=>$save['image']
										);

					$add_question = $this->Contest_model->addQuestion($q_data);

					$a_data	= array('contest_id'  =>$input_data['contest_id'],
									'question_id' =>$add_question,
									'element_type'=>$input_data['element_type'],
									'element_text'=>$input_data['button_options_1'],
									'valid_answer'=>$input_data['valid_answer']
									);

					$add_answer = $this->Contest_model->addValidAnswer($a_data);

					redirect(base_url().'index.php/Contest/getContestQuestionList');

			}else{
				
	    		
	    		$this->load->view('contest/add_question',$data);
				
			}
		}else{
			redirect(base_url().'index.php//dashboard/logout');
		}
	}
	public function editQuestion(){
		if($this->session->userdata('logged_in')){
			$contest_id = $this->uri->segment(3);
			$question_id = $this->uri->segment(4);
			
			if($contest_id){		

					$c_filter = array('cq.contest_id'=>$contest_id,'cq.question_id'=>$question_id);
					$data['question_details'] = $this->Contest_model->getContestFormDetails($c_filter);

		    		$this->load->view('contest/edit_question',$data);
					
			}else{
				redirect(base_url().'index.php/Contest/contestFormList');
			}
		}else{
			redirect(base_url().'index.php/dashboard/logout');
		}
	}

	public function updateQuestion(){
		if($this->session->userdata('logged_in')){
			$c_filter = array('cq.contest_id' =>$this->input->post('contest_id'),
							  'cq.question_id'=>$this->input->post('question_id'));
			$data['question_details'] = $this->Contest_model->getContestFormDetails($c_filter);

			$this->form_validation->set_rules('question','Question','required|trim|xss_clean|max_length[255]');
			$this->form_validation->set_rules('answer_type','Answer Type','required|trim|xss_clean|max_length[255]');
			$this->form_validation->set_rules('button_options','Button Options','required|trim|xss_clean|max_length[255]');
			$this->form_validation->set_rules('valid_answer','Valid Answer','required|trim|xss_clean|max_length[255]');
			if($this->form_validation->run()){

					$input_data = $this->input->post();

					$q_filter   = array('question_id'=>$input_data['question_id'],
										'contest_id' =>$input_data['contest_id']);

					$q_data     = array('question_text'=>$input_data['question']);
					$update_question = $this->Contest_model->updateQuestion($q_filter,$q_data);

					$a_filter 	= array('question_id'=>$input_data['question_id'],
										'contest_id' =>$input_data['contest_id'],
										'element_id' =>$input_data['element_id']);
					$a_data 	= array('element_type'=>$input_data['answer_type'],
										'element_text'=>$input_data['button_options'],
										'valid_answer'=>$input_data['valid_answer']);
					$update_answer = $this->Contest_model->updateValidAnswer($a_filter,$a_data);
		
					redirect(base_url().'index.php/Contest/getContestQuestionList/'.$input_data['question_id']);

			}else{
				$this->load->view('contest/edit_question',$data);
			}
		}else{
			redirect(base_url().'index.php//dashboard/logout');
		}
	}

	
	public function getWinnerList(){
		$filter = array('cw.status'=>2);
		$winner = $this->Contest_model->getWinnerList($filter);

		$returnArr['error'] 	= false;
		$returnArr['result']	= isset($winner) ? $winner : array();
		
		echo json_encode($returnArr);
	}
	public function winnerForm(){
		$c_filter 		 = array('status'=>1);
		$data['contest'] = $this->Contest_model->getContestFormList($c_filter);

		$data['gift']    = $this->Contest_model->getGiftList();

		
		$this->load->view('contest/winner_form',$data);
		
	}
	public function getWinnerListData(){

		$data['winner'] = $this->Contest_model->getWinnerListData();

		$this->load->view('contest/winner_list',$data);
		
	}	
	
	public function getContenstantList(){

		$filter = array('active','1');
		$contest_details = $this->Contest_model->getContestDetails($filter);

		$data['contenstant'] = $this->Contest_model->getContenstantList($filter);

		$c_filter = array('contest_id'=>$contest_details['id']);
		$data['gift'] = $this->Contest_model->getGiftList($c_filter);

		$this->load->view('contest/contenstant_list',$data);
		
	}

	public function addContestWinner($gift_id){
		
		$filter        = array('id'=>$gift_id);
		$gift          = $this->Contest_model->getGiftDetails($filter);

		$g_filter = array('gift_id'=>$gift_id);
		$dealer_contest_winner = $this->Contest_model->getNumberOFWinners($g_filter);

		if($dealer_contest_winner == $gift['number_of_winners']){
			$this->getWinnerListData($gift_id);
		}else{
			$this->addWinnerData($gift_id);				
		}

	}

	public function addWinnerData($gift_id){
		$winner_person = $this->selectWinner();


		if($winner_person){
			$filter        = array('id'=>$gift_id);
			$gift          = $this->Contest_model->getGiftDetails($filter);

			$winner = array('contest_id'	=>$gift['contest_id'],
							'customer_id'   =>$winner_person['dealer_id'],
							'winning_date'	=>date('Y-m-d'),
							'gift_id'		=>$gift_id,
							'status'		=>'2'
						);

			$add_winner = $this->Contest_model->addWinner($winner);

			$this->addContestWinner($gift_id);
		}else{
			$this->getWinnerListData($gift_id);
		}
		

	}

	public function selectWinner(){
		$filter = array('active','1');
		$contenstant_list = $this->Contest_model->getContenstantList($filter);

		
		$i = 0;
		foreach ($contenstant_list as $row) {
				
				//already winner
				$a_filter = array('customer_id'=>$row['customer_id']);
				$already_winner = $this->Contest_model->checkAlreadyWinner($a_filter);

				if(!$already_winner){
						
						$contenstant[$i]['customer_id'] 		= $row['customer_id'];
						$contenstant[$i]['name'] 				= $row['name'];
				
				}
				$i++;
		}

		

		if(isset($contenstant)){
			$contenstant  = array_values($contenstant);

			//get random winner
			$winner_count = COUNT($contenstant);
			$winner_count = --$winner_count;

			$key = round(mt_rand(0,$winner_count));
			$winner = $contenstant[$key];

			return $winner;
		}else{
			return false;
		}
		
	}

	public function selectGift(){
		//get Random gift
		$gifts = $this->Contest_model->getGiftList();


		$gift_count = COUNT($gifts);
		$gift_count = --$gift_count;

		$key = round(mt_rand(0,$gift_count));
		$g_gift = $gifts[$key];

		return $g_gift;
	}

	public function giftForm(){
		$data['contest'] = $this->Contest_model->getContestFormList();
		
		
		$this->load->view('contest/gift_form',$data);
		
	}
	public function giftList(){
		$data['gift'] = $this->Contest_model->getGiftList();
		$data['contest'] = $this->Contest_model->getContestFormList();

		$this->load->view('contest/contest_gift_list',$data);
		
	}
	public function addGift(){
		if($this->session->userdata('logged_in')){
			$data['contest'] = $this->Contest_model->getContestFormList();

			$this->form_validation->set_rules('contest_id', 'Contest Id', 'required|trim|xss_clean|max_length[11]');
			$this->form_validation->set_rules('winners', 'Winners', 'required|trim|xss_clean|max_length[11]');
			$this->form_validation->set_rules('name', 'Gift Name', 'required|trim|xss_clean|max_length[1000]');
			$this->form_validation->set_rules('image','Image','callback_file_check');
			if($this->form_validation->run()){
				$input_data = $this->input->post();

				if(!empty($_FILES)){
					$new_image_name = time().str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['image']['name']);
					
					$config['upload_path'] 		= 'uploads/contest/'; 	
					$config['allowed_types'] 	= '*';
					$config['file_name'] 		= $new_image_name;
					$config['max_size']  		= '0';
					$config['max_width']  		= '0';
					$config['max_height']  		= '0';
					$config['min_width'] 		= '0';
					$config['min_height'] 		= '0';
						
					$this->load->library('upload', $config);
					$upload = $this->upload->do_upload('image');
					
					if(!$upload){
						$save['image'] = '';
					}else{
						$save['image'] =  base_url().$config['upload_path'].$new_image_name;
			
					}	
					
				}

			
				$data = array(
							  'contest_id'	=> $this->input->post('contest_id'),
							  'winners'		=> $this->input->post('winners'),
							  'name'		=>	$this->input->post('name'),
							  'image'		=>  $save['image']
							);

				$add_contest_gift = $this->Contest_model->addContestGift($data);

				redirect(base_url().'index.php/Contest/giftList');

			}else{
				
	    		
	    		$this->load->view('contest/gift_form'	);
				
			}
		}else{
			redirect(base_url().'index.php/dashboard/logout');
		}
	}
	public function editGift(){
		$gift_id = $this->input->post('gift_id');
		$filter 	   = array('id'=>$gift_id);

		$gift_details = $this->Contest_model->getGiftDetails($filter);

		if($gift_details){
			$output['errCode'] = -1;
			$output['message']= $gift_details;
		}else{
			$output['errCode'] = 2;
			$output['message']  = 'No data';
		}
		echo json_encode($output);
	}

	public function updateGiftDetails(){

		$this->form_validation->set_rules('gift_id','Gift Id','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('contest_id','Contest','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('name','Name','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('winners','Winners','trim|xss_clean|max_length[255]');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
		if($this->form_validation->run()){

			$filter = array('id'=>$this->input->post('gift_id'));

			if(!empty($_FILES['new_image']['name'])){


					$new_image_name = time().str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['new_image']['name']);
					
					$config['upload_path'] 		= 'uploads/contest/'; 	
					$config['allowed_types'] 	= 'png|jpg|jpeg|webp';
					$config['file_name'] 		= $new_image_name;
					$config['max_size']  		= '2000';
					$config['max_width']  		= '1024';
					$config['max_height']  		= '1024';
					$config['min_width'] 		= '60';
					$config['min_height'] 		= '60';
						
					$this->load->library('upload', $config);
					$upload = $this->upload->do_upload('new_image');
					
					if(!$upload){
						$returnArr['errCode'] 	= 3;
						$returnArr['message']	= strip_tags($this->upload->display_errors());
						echo json_encode($returnArr);
						exit;
					}else{
						$image =  base_url().$config['upload_path'].$new_image_name;
					}	
					
			}else{
				$image = $this->input->post('image');
			}
			$data   	= array('name'	=>$this->input->post('name'),
								'image'	=>$image
							    );


			$updateGift = $this->Contest_model->updateGift($filter,$data);

			if($updateGift){
				$returnArr['errCode'] 	= -1;
				$returnArr['message']	= 'Update Successfully';
			}else{
				$returnArr['errCode'] 	= 2;
				$returnArr['message']	= 'Update failed'; 
			}
 		}else{
			foreach ($this->input->post() as $key => $value) {
				$returnArr['errCode'] 			= 3;
				$returnArr['message'][$key]	= form_error($key); 
			}
		}
		echo json_encode($returnArr);
	}


	public function file_check($str){
		// echo "<pre>";
		// print_r($_FILES);exit();
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png','image/webp');
        $mime = $_FILES['image']['type'];
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){


            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png/webp file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function contestRegistration(){
    	$this->load->view('contest/contest_registration');
    }

    public function addContestRegistration(){
    	$this->form_validation->set_rules('mobile','Mobile','required|trim|xss_clean|max_length[255]|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
		if($this->form_validation->run()){

			$filter = array('mobile'=>$this->input->post('mobile'));
			$customer = $this->AdminModel->getCustomerDetails($filter);

			if(!$customer){
				$data['message'] = 'You are not elgible for the contest';
				$this->load->view('contest/contest_registration',$data);
			}else{
				redirect(base_url().'Contest/contestView');
			}
 		}else{
			$this->load->view('contest/contest_registration');
		}
    }
	

	public function addAnswer(){

		$filter = array('active'=>'1');
		$contest_details = $this->Contest_model->getContestDetails($filter);

		$c_filter = array('contest_id'=>$contest_details['id']);
		$contest_question = $this->Contest_model->getQuestionList($c_filter);

		$i = 0;
		foreach ($contest_question as $row) {
				$q_filter = array('question_id'=>$row['question_id']);
				$answer   = $this->Contest_model->getValidAnswer($q_filter);

				$contest_question[$i]['element_type'] = $answer['element_type'];
				$contest_question[$i]['element_text'] = $answer['element_text'];
				$i++;
		}


		$data['contest_details'] = $contest_question;



		for($i = 1; $i <= $_POST['num_fields']; $i++){			
			$this->form_validation->set_rules('question_'.$i, 'Answer '.$i, 'required');
		}
		if($this->form_validation->run()){
		
			$input_data = $this->input->post();

			$j = 1;
			foreach ($data['contest_details'] as $c_row) {
				if($c_row['element_type'] == 'checkbox'){
					$answer = implode(',',$input_data['answer_'.$j]);
				}else{
					$answer = $input_data['answer_'.$j];
				}

				$data[] = array('question_id'	=>$c_row['question_id'],
							  'answer'	   	=>$answer,
							  'customer_id' =>$input_data['customer_id'],
							  'contest_id'  =>$input_data['contest_id']
							);
			}
			
			$add_answer = $this->Contest_model->addAnswer($data);

			if($add_answer){
				$data['message'] = 'Thanks for your participation';
			}else{
				$data['message'] = 'Error occur.Please try again';
			}
			$this->load->view('contest/success',$data);
		}else{
			$this->load->view('contest/contest_view',$data);
		}
	}

	public function terms_and_condition($language){
		$data['language'] = strtolower($language);

		$filter = array('id'=>'1');
		$data['data'] = $this->Contest_model->getContestSetting($filter);

		$this->load->view('contest/terms_and_condition',$data);
	}

	public function how_to_participate($language){
		$data['language'] = strtolower($language);

		$filter = array('id'=>'1');
		$data['data'] = $this->Contest_model->getContestSetting($filter);

		$this->load->view('contest/how_to_participate',$data);
	}


	public function exportContenstantDetails($id){
		$filter = array('cm.id'=>$id);
		$data['contenstant'] = $this->Contest_model->getContenstantList($filter);

		$q_filter = array('contest_id'=>$id);
		$question = $this->Contest_model->getQuestionList($q_filter);

		$i = 0;
		foreach ($data['contenstant'] as $row) {
			$d_filter = array('user_id'		=>$row['farmer_id'],
							  'user_type'	=>'far'
							);
			$data['contenstant'][$i]['referrer'] =  $this->Contest_model->getReferrerCount($d_filter);


			$ca_filter = array('contest_id'=>$id,
							   'farmer_id' =>$row['farmer_id']
							  );
			$ca_details = $this->Contest_model->getContestAnswer($ca_filter);

			$k = 1;
			for($j = 0;$j < COUNT($question); $j++){
				$data['contenstant'][$i]['question_'.$k++] = $ca_details[$j]['answer'];
			}

			$i++;
		}


		if(count($data) > 0){
			$delimiter = ",";
    		$filename = $data['contenstant'][0]['contest_name'] . date('d-m-Y',strtotime($data['contenstant'][0]['start'])). ' / ' .date('d-m-Y',strtotime($data['contenstant'][0]['end'])) .".csv";

    		 //create a file pointer
    		$f = fopen('php://memory', 'w');

    		//set column headers
    		$fields = array('Farmer Id','Farmer Name','Referrer Count');

    		$count = count($question);

    		$n = 0;
    		for($m = 0;$m < $count ;$m++){
    			array_push($fields,ucwords($question[$m]['question_text']));
    		}

    	
    		fputcsv($f, $fields, $delimiter);

    		foreach($data['contenstant'] as $row){

    			// echo "<pre>";
    			// print_r($row);exit;
    			$lineData = array($row['farmer_id'], $row['farmer_name'],$row['referrer']);

    			$x = 0;
	    		for($y = 0;$y < $count ;$y++){
	    			array_push($lineData, $row['question_'.++$x]);
	    		}

    			fputcsv($f, $lineData, $delimiter);
    		}

    		//move back to beginning of file
    		fseek($f, 0);
    
    		//set headers to download file rather than displayed
    		header('Content-Type: text/csv');
    		header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    		//output all remaining data on a file pointer
    		fpassthru($f);
		}
		 exit;
	}

	public function contestView(){

		$filter = array('active'=>'1');
		$contest_details = $this->Contest_model->getContestDetails($filter);

		$c_filter = array('contest_id'=>$contest_details['id']);
		$contest_question = $this->Contest_model->getQuestionList($c_filter);

		$i = 0;
		foreach ($contest_question as $row) {
				$q_filter = array('question_id'=>$row['question_id']);
				$answer   = $this->Contest_model->getValidAnswer($q_filter);

				$contest_question[$i]['element_type'] = $answer['element_type'];
				$contest_question[$i]['element_text'] = $answer['element_text'];
				$i++;
		}


		$data['contest_details'] = $contest_question;
		$this->load->view('contest/contest_view',$data);
	}

}

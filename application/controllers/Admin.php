<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function index()
	{	

		$data['table'] = $this->Admin_model->getTableList();
		$this->load->view('index',$data);
	}
	public function mobileExists($mobile){
		$filter = array('mobile'=>$mobile);
		$exits  = $this->Admin_model->getCustomerDetails($filter);
		if($exits){
			return false;
		}else{
			return true;
		}
	}
	public function customerRegistration(){
		$this->form_validation->set_rules('table','Table','required|xss_clean|max_length[255]');
		$this->form_validation->set_rules('name','Name','required|xss_clean|max_length[255]');
		$this->form_validation->set_rules('mobile','Mobile','required|xss_clean|max_length[255]|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|max_length[255]|valid_email');
		$this->form_validation->set_rules('birthdate','Birthdate','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('anniversary_date','Anniversary Date','trim|xss_clean|max_length[255]');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		if($this->form_validation->run()){
			$input_data = $this->input->post();

			$filter     = array('mobile'=>$input_data['mobile']);
			$CheckExists = $this->Admin_model->getCustomerDetails($filter);

			if($CheckExists){
				$this->session->set_userdata('customer_id',$CheckExists['id']);

				$birthdate = $CheckExists['birthdate'] == '1970-01-01' ? date('Y-m-d',strtotime($input_data['birthdate'])) : $CheckExists['birthdate'];
				$anniversary_date = $CheckExists['anniversary_date'] == '1970-01-01' ? date('Y-m-d',strtotime($input_data['anniversary_date'])) : $CheckExists['anniversary_date'];

				$c_filter = array('id'=>$CheckExists['id']);
				$c_data   = array('created_at'		=>date('Y-m-d h:i:s'),
								  'birthdate' 		=>$birthdate,
								  'anniversary_date'=>$anniversary_date);
				$update_customer = $this->Admin_model->updateCustomer($c_filter,$c_data);
				
			}else{
				

				$data = array(
							  'name'			=>$input_data['name'],
							  'email'			=>$input_data['email'],
							  'mobile'			=>$input_data['mobile'],
							  'birthdate'		=>date('Y-m-d',strtotime($input_data['birthdate'])),
							  'anniversary_date'=>date('Y-m-d',strtotime($input_data['anniversary_date'])),
							  'created_at'		=>date('Y-m-d h:i:s')	
						);


				$registration_id = $this->Admin_model->addRegistration($data);
				$this->session->set_userdata('customer_id',$registration_id);
				
			}

			$this->session->set_userdata('table',$input_data['table']);
			//add add_contact
			$c_filter = array('mobile'=>$input_data['mobile'],
							  'filter'=>'customer'
							);
			$c_details = $this->Admin_model->getContactDetails($c_filter);

			if(!$c_details){
				$c_data = array('mobile'=>$input_data['mobile'],
								'filter'=>'customer',
								'status'=>1
							);
				$add_contact = $this->Admin_model->addContact($c_data);
			}

			$returnArr['errCode'] 		= -1;
			$returnArr['message']	    = 'success';
		
		}else{	
			$returnArr['errCode'] = 3;
			foreach($this->input->post() as $key => $value){
				$returnArr['message'][$key] = form_error($key);
 			}
		}
		echo json_encode($returnArr);
	}
	public function familyRegistration(){

		$submit = false;
		$j = 0;

		if((isset($_POST['name_1']) && !empty($_POST['name_1'])) || isset($_POST['mobile_1']) && !empty($_POST['mobile_1'])){
		for($i = 1; $i <= $_POST['count']; $i++){			
				$this->form_validation->set_rules('name_'.$i, 'Name', 'required');
				$this->form_validation->set_rules('mobile_'.$i, 'Mobile', 'required|xss_clean|max_length[255]|regex_match[/^[0-9]{10}$/]');	
			}
			$submit = true;
			$j++;
		}

		if($submit){
			$validation = !$this->form_validation->run();
		}else{
			$validation = false;
		}
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');

		if($validation){
			$returnArr['errCode'] = 2;
			foreach($this->input->post() as $key => $value){
				$returnArr['message'][$key] = form_error($key);
 			}
		}else{
			if($j > 0){
			for($i = 1; $i <= $_POST['count']; $i++){
				$name 				= $this->input->post('name_'.$i);
				$mobile 			= $this->input->post('mobile_'.$i);
				$email  			= $this->input->post('email_'.$i);
				$birthdate 			= $this->input->post('birthdate_'.$i);
				$anniversary_date 	= $this->input->post('anniversary_date_'.$i);

				$family 	= array('family_id'			=>$this->session->userdata('customer_id'),
									'name'				=>$name,
									'mobile'			=>$mobile,
									'email'				=>$email,
									'birthdate'			=>date('Y-m-d',strtotime($birthdate)),
									'anniversary_date'	=>date('Y-m-d',strtotime($anniversary_date))
								);
				
				$filter = array('family_id'	=>$this->session->userdata('customer_id'),
								'mobile'	=>$mobile
							   );
				$family_member = $this->Admin_model->getFamilyMemberDetails($filter);

				if(!$family_member){
					$add_family = $this->Admin_model->addFamilyMember($family);	
				}

				//add contact
				$c_filter = array('mobile'=>$mobile,
								  'filter'=>'customer'
								);
				$c_details = $this->Admin_model->getContactDetails($c_filter);

				if(!$c_details){
					$c_data = array('mobile'=>$mobile,
									'filter'=>'family',
									'status'=>1
								);
					$add_contact = $this->Admin_model->addContact($c_data);
				}
				
				}
			}

			$returnArr['errCode'] 		= -1;
			$returnArr['message'] 		= 'success';
		}
		
	
		// $returnArr['customer_id'] 	= openssl_encrypt($this->session->userdata('customer_id'),"AES-128-ECB",'darshan');
		
	
		echo json_encode($returnArr);
	}

	public function feedback(){
		if($this->session->userdata('customer_id')){
			$this->load->view('feedback');
		}else{
			redirect(base_url());
		}	
	}
	public function thankYou(){
		$this->load->view('thank_you');	
	}
	public function addRating(){
		$this->form_validation->set_rules('question_1','Question 1','trim|xss_clean');
		$this->form_validation->set_rules('question_2','Question 2','trim|xss_clean');
		$this->form_validation->set_rules('question_3','Question 3','trim|xss_clean');
		$this->form_validation->set_rules('question_4','Question 4','trim|xss_clean');
		$this->form_validation->set_rules('question_5','Question 5','trim|xss_clean');
		$this->form_validation->set_rules('question_6','Question 6','trim|xss_clean');
		$this->form_validation->set_rules('question_7','Question 7','trim|xss_clean');
		$this->form_validation->set_rules('question_8','Question 8','trim|xss_clean');
		$this->form_validation->set_rules('question_9','Question 9','trim|xss_clean');
		$this->form_validation->set_rules('comment','Comment','trim|xss_clean');

		if($this->form_validation->run()){
			
			$customer_id = $this->session->userdata('customer_id');
			$table 		 = $this->session->userdata('table');
			$input_data = $this->input->post();

			$filter = array('id'=>$customer_id);
			$customer_details = $this->Admin_model->getCustomerDetails($filter);

			$birthdate = $customer_details['birthdate'] == '1970-01-01' ? '0000:00:00' : date('d-M-Y',strtotime($customer_details['birthdate']));
			$anniversary_date = $customer_details['anniversary_date'] == '1970-01-01' ? '0000:00:00' : date('d-M-Y',strtotime($customer_details['anniversary_date']));

			$data = array(
						  'uid'			   =>random_string(6),	
				  		  'table_id'	   =>isset($table) ? $table : 50,
						  'customer_id'    =>$customer_id,
						  'question_1'     =>isset($input_data['question_1']) ? $input_data['question_1'] : 3,
						  'question_2'     =>isset($input_data['question_2']) ? $input_data['question_2'] : 3,
						  'question_3'     =>isset($input_data['question_3']) ? $input_data['question_3'] : 3,
						  'question_4'     =>isset($input_data['question_4']) ? $input_data['question_4'] : 3,
						  'question_5'     =>isset($input_data['question_5']) ? $input_data['question_5'] : 3,
						  'question_6'     =>isset($input_data['question_6']) ? $input_data['question_6'] : 3,
						  'question_7'     =>isset($input_data['question_7']) ? $input_data['question_7'] : 3,
						  'question_8'     =>isset($input_data['question_8']) ? $input_data['question_8'] : 3,
						  'question_9'     =>isset($input_data['question_9']) ? $input_data['question_9'] : 3,
						  'comment'		   =>$input_data['comment'],
						  'created_at'	   =>date('Y-m-d h:i:s')
						);

			$addRating = $this->Admin_model->addRating($data);
		
			if($data['question_1'] < 2 || $data['question_2'] < 2 || $data['question_3'] < 2 || $data['question_4'] < 2 || $data['question_5'] < 2 || $data['question_6'] < 2 || $data['question_7'] < 2){


				$complaint  = $this->Admin_model->getComplaintList();
				$no_of_complaint = COUNT($complaint);

				$complaint_data = array('complaint_id'=>'RESTRO-'.++$no_of_complaint,
										'customer_id' =>$customer_id,
										'rating_id'	  =>$addRating,
										'table_id'	  =>$table
										);
				$addComplaint   = $this->Admin_model->addComplaint($complaint_data);
				
				//send email to manager about bad rating 
				$to 		= 'corpchef@ymcaic.com';
				$from 		= 'thenine@ymcaic.com';
				$subject 	= 'Neet to review feedback';
				$message    = "Name : ".$customer_details['name']."\n".
							  "Email : ".$customer_details['email']."\n".
							  "Mobile : ".$customer_details['mobile']."\n".
							  "Birth Date : ".$birthdate."\n".
							  "Anniversary Date : ".$anniversary_date."\n\n".
							  "Table Number : ".$table."\n\n".

							  "<table>
								<tbody>
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>1. Knowledge & Professionalism of the Sales Representative  ?</td>
										<td style='padding:20px'>".$data['question_1']."</td>
									</tr>
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>2. Booking Process ?</td>
										<td style='padding:20px'>".$data['question_2']."</td>
									</tr>
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>3. Quality & presentation of Food ?</td>
										<td style='padding:20px'>".$data['question_3']."</td>
									</tr>
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>4. Courtesy and helpfulness of the F&B Staff ?</td>
										<td style='padding:20px'>".$data['question_4']."</td>
									</tr>				
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>5. Billing Process ?</td>
										<td style='padding:20px'>".$data['question_5']."</td>
									</tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>6. Guestrooms (if used) ?</td>
					                    <td style='padding:20px'>".$data['question_6']."</td>
					                </tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>7. Staff Courtesy and Efficiency ?</td>
					                    <td style='padding:20px'>".$data['question_7']."</td>
					                </tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>7. Cleanliness & Hygiene ?</td>
					                    <td style='padding:20px'>".$data['question_7']."</td>
					                </tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>7. Overall Experience ?</td>
					                    <td style='padding:20px'>".$data['question_7']."</td>
					                </tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>Comment</td>
					                    <td style='padding:20px'>".$data['comment']."</td>
					                </tr>
								</tbody>
							</table>";
				//$send_mail 	= sendEmail_helper($to,$from,$subject,$message);

				//send sms
				$mobile = $customer_details['mobile'];
				$msg    = 'Need tp check review of '.$customer_details['name'];
				//$send_sms = sendSMS($mobile,$msg);
			}

			if($addRating){
				$filter = array('id'=>$customer_id);
				$customer_details = $this->Admin_model->getCustomerDetails($filter);

				//send email
				$to = $customer_details['email'];
				// $from = 'thenine@ymcaic.com';
				$from = "kinidarshan07@gmail.com";
				$subject = 'Thanks';
				$message = ' Thanks for your valuable feedback';
			//	$send_mail = sendEmail_helper($to,$from,$subject,$message);

				//send sms
				$mobile = $customer_details['mobile'];
				$msg    = 'Thanks For your valuable feedback.Please visit us again';
				//$send_sms = sendSMS($mobile,$msg);


				$this->session->sess_destroy();
				$returnArr['errCode'] = -1;
				$returnArr['message'] = 'success';
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
	public function editFeedback(){
		$id = $this->uri->segment(3);

		$filter = array('uid'=>$id);
		$data['rating'] = $this->Admin_model->getFeedbackDetails($filter);

		$this->load->view('editFeedback',$data);
	}
	public function updateFeedback(){
		$this->form_validation->set_rules('question_1','Question 1','trim|xss_clean');
		$this->form_validation->set_rules('question_2','Question 2','trim|xss_clean');
		$this->form_validation->set_rules('question_3','Question 3','trim|xss_clean');
		$this->form_validation->set_rules('question_4','Question 4','trim|xss_clean');
		$this->form_validation->set_rules('question_5','Question 5','trim|xss_clean');
		$this->form_validation->set_rules('question_6','Question 6','trim|xss_clean');
		$this->form_validation->set_rules('question_7','Question 7','trim|xss_clean');
		$this->form_validation->set_rules('comment','Comment','trim|xss_clean');

		if($this->form_validation->run()){
			
			$input_data = $this->input->post();

			$filter = array('uid'=>$input_data['uid']);
			$rating_details = $this->Admin_model->getFeedbackDetails($filter);

			$birthdate = $rating_details['birthdate'] == '1970-01-01' ? '0000:00:00' : date('d-M-Y',strtotime($rating_details['birthdate']));
			$anniversary_date = $rating_details['anniversary_date'] == '1970-01-01' ? '0000:00:00' : date('d-M-Y',strtotime($rating_details['anniversary_date']));

$previous_rating_data = array('rating_id'	=>$rating_details['id'],
							'uid'		 	=>$rating_details['uid'],
							'customer_id'	=>$rating_details['customer_id'],
							'table_id'		=>$rating_details['table_id'],
							'question_1'  	=>isset($input_data['question_1']) ? $input_data['question_1'] : 3,
						  	'question_2'    =>isset($input_data['question_2']) ? $input_data['question_2'] : 3,
						  	'question_3'    =>isset($input_data['question_3']) ? $input_data['question_3'] : 3,
						  	'question_4'    =>isset($input_data['question_4']) ? $input_data['question_4'] : 3,
						  	'question_5'    =>isset($input_data['question_5']) ? $input_data['question_5'] : 3,
						  	'question_6'    =>isset($input_data['question_6']) ? $input_data['question_6'] : 3,
						  	'question_7'    =>isset($input_data['question_7']) ? $input_data['question_7'] : 3,
						  	'question_8'    =>isset($input_data['question_7']) ? $input_data['question_8'] : 3,
					  		'question_9'    =>isset($input_data['question_7']) ? $input_data['question_9'] : 3,
							'comment'		=>$rating_details['comment'],
							'created_at'  =>$rating_details['created_at']
								);
			$add_previous_data   = $this->Admin_model->addPreviousRatingData($previous_rating_data);

			$data = array(
						  'question_1'     =>isset($input_data['question_1']) ? $input_data['question_1'] : 3,
						  'question_2'     =>isset($input_data['question_2']) ? $input_data['question_2'] : 3,
						  'question_3'     =>isset($input_data['question_3']) ? $input_data['question_3'] : 3,
						  'question_4'     =>isset($input_data['question_4']) ? $input_data['question_4'] : 3,
						  'question_5'     =>isset($input_data['question_5']) ? $input_data['question_5'] : 3,
						  'question_6'     =>isset($input_data['question_6']) ? $input_data['question_6'] : 3,
						  'question_7'     =>isset($input_data['question_7']) ? $input_data['question_7'] : 3,
						  'question_8'     =>isset($input_data['question_7']) ? $input_data['question_8'] : 3,
						  'question_9'     =>isset($input_data['question_7']) ? $input_data['question_9'] : 3,
						  'comment'		   =>$input_data['comment']
						);

			$updateRating = $this->Admin_model->updateRating($filter,$data);

			if($data['question_1'] < 2 || $data['question_2'] < 2 || $data['question_3'] < 2 || $data['question_4'] < 2 || $data['question_5'] < 2 || $data['question_6'] < 2 || $data['question_7'] < 2){


				$complaint  = $this->Admin_model->getComplaintList();
				$no_of_complaint = COUNT($complaint);

				$complaint_data = array('complaint_id'=>'RESTRO-'.++$no_of_complaint,
										'customer_id' =>$rating_details['customer_id'],
										'rating_id'	  =>$rating_details['rating_id'],
										'table_id'	  =>$rating_details['table_id']
										);
				$addComplaint   = $this->Admin_model->addComplaint($complaint_data);
				
				//send email to manager about bad rating 
				$to 		= 'corpchef@ymcaic.com';
				$from 		= 'thenine@ymcaic.com';
				$subject 	= 'Neet to review feedback';
				$message    = "Name : ".$rating_details['name']."\n".
							  "Email : ".$rating_details['email']."\n".
							  "Mobile : ".$rating_details['mobile']."\n".
							  "Birth Date : ".$birthdate."\n".
							  "Anniversary Date : ".$anniversary_date."\n\n".
							  "Table Number : ".$rating_details['table_id']."\n\n".

							  "<table>
								<tbody>
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>1. Knowledge & Professionalism of the Sales Representative  ?</td>
										<td style='padding:20px'>".$data['question_1']."</td>
									</tr>
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>2. Booking Process ?</td>
										<td style='padding:20px'>".$data['question_2']."</td>
									</tr>
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>3. Quality & presentation of Food ?</td>
										<td style='padding:20px'>".$data['question_3']."</td>
									</tr>
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>4. Courtesy and helpfulness of the F&B Staff ?</td>
										<td style='padding:20px'>".$data['question_4']."</td>
									</tr>				
									<tr style='background-color:#A9A9A9'>
										<td style='padding:20px'>5. Billing Process ?</td>
										<td style='padding:20px'>".$data['question_5']."</td>
									</tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>6. Guestrooms (if used) ?</td>
					                    <td style='padding:20px'>".$data['question_6']."</td>
					                </tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>7. Staff Courtesy and Efficiency ?</td>
					                    <td style='padding:20px'>".$data['question_7']."</td>
					                </tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>7. Cleanliness & Hygiene ?</td>
					                    <td style='padding:20px'>".$data['question_7']."</td>
					                </tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>7. Overall Experience ?</td>
					                    <td style='padding:20px'>".$data['question_7']."</td>
					                </tr>
					                <tr style='background-color:#A9A9A9'>
					                    <td style='padding:20px'>Comment</td>
					                    <td style='padding:20px'>".$data['comment']."</td>
					                </tr>
								</tbody>
							</table>";
				//$send_mail 	= sendEmail_helper($to,$from,$subject,$message);

				//send sms
				$mobile = $rating_details['mobile'];
				$msg    = 'Need tp check review of '.$rating_details['name'];
				//$send_sms = sendSMS($mobile,$msg);
			}

			if($updateRating){


				//send email
				$to = $rating_details['email'];
				$from = 'thenine@ymcaic.com';
				$subject = 'Thanks';
				$message = ' Thanks for your valuable feedback';
			//	$send_mail = sendEmail_helper($to,$from,$subject,$message);

				//send sms
				$mobile = $rating_details['mobile'];
				$msg    = 'Thanks For your valuable feedback.Please visit us again';
				//$send_sms = sendSMS($mobile,$msg);


				$this->session->sess_destroy();
				$this->load->view('thank_you');
			}else{
				$this->load->view('feedback');
			}
		}else{
			$this->load->view('feedback');
		}
	}
	public function backup(){
		$this->load->dbutil();

		$prefs = array(     
		    'format'      => 'zip',             
		    'filename'    => 'my_db_backup.sql'
		    );


		$backup = $this->dbutil->backup($prefs); 

		$db_name = 'backup-on-'. date("d-m-Y-H-i-s") .'.zip';
		$save = 'backup/'.$db_name;

		write_file($save, $backup); 

		$this->email->set_newline("\r\n");
        $this->email->from('alphacoresolutions@gmail.com'); // change it to yours
        $this->email->to('alphacoresolutions@gmail.com');
        $this->email->subject('Database Backup '.date('Y-m-d'));
        $this->email->message('');
        $this->email->attach('backup/'.$db_name);
        $this->email->send();
	}


	public function whatsapp(){
		$ch = curl_init();

		curl_setopt($ch,CURLOPT_URL, "alerts.solutionsinfini.com/api/v4/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		$buffer = curl_exec($ch);
		curl_close($ch);
	}

	
}

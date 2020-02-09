<?php 
if(!defined('BASEPATH')) exit ('No direct script access allowed');



if(!function_exists('sendEmail_helper')){
	function sendEmail_helper($to,$from,$subject,$message){
	    $ci =& get_instance();
        $ci->email->set_newline("\r\n");
        $ci->email->from($from); // change it to yours
        $ci->email->to($to);
        $ci->email->subject($subject);
        $ci->email->message($message);
        if ($ci->email->send()) {
            echo $ci->email->print_debugger();exit;
            echo "1";exit;
            return true;
        } else {
            echo $ci->email->print_debugger();exit;
            echo "2";exit;
            return false;
        }

	}
}



if(!function_exists('sendSMS')){
    function sendSMS($mobile,$msg){
        $username = urlencode("u_alphacore"); 
        $msg_token = urlencode("EEYN6t"); 
        $sender_id = urlencode("612324"); // optional (compulsory in transactional sms) 
        $message = urlencode($msg); 
        $mobile = urlencode($mobile); 

        $api = "http://la-suit.vispl.in/api/send_promotional_sms.php?username=".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$message."&mobile=".$mobile.""; 

        $response = file_get_contents($api);

        $json = json_decode($response, TRUE);

        if($json['status'] == 'success'){
            return true;
        }else{
            return false;
        }
    }

}

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

?>

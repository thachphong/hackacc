<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Multiple\Models\Posts;

class VideoController extends Controller
{

	public function initialize()
    {
        $auth = $this->session->get('authacc');
        if(isset($auth['user_name'])==FALSE){
            return $this->response->redirect('acc/',TRUE);
        }
    }
	public function indexAction($id)
	{
		$auth = $this->session->get('authacc');
        if(isset($auth['user_name'])==FALSE){
            return $this->response->redirect('acc/'.$id,TRUE);
        }
		$ip = $this->get_client_ip_server();
		//$db_v =new  CheckView();
		
		
        $url =  $this->request->getURI();
        $abc =1;
        $db = new Posts();
       // $post_data= Posts::findFirst
        $post_data = Posts::findFirst(array("id = :id:  AND status = 1 ",'bind' => array('id' => $id) ));
        $post_data->total_view += 1; 
        $post_data->save();
        /*$db_v->postid = $post_data->id;
        $db_v->user_ip = $ip;
        $db_v->date_view = date('Y-m-d');
        $db_v->time_view = date('H:i:s');
        $db_v->save();*/
        
        $this->view->post = $post_data;
       // echo 'xxx';
	}
	public function route404Action(){
		
	}
}

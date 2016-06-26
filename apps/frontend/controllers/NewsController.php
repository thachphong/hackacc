<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Multiple\Models\Posts;
use Multiple\Models\Tags;
use Multiple\Models\CheckView;

class NewsController extends Controller
{

	public function indexAction($id)
	{
		
		//$this->view->name= 'abc';
		//return $this->response->redirect('login');
		
		$ip = $this->get_client_ip_server();
		$db_v =new  CheckView();
		
		
        $url =  $this->request->getURI();
        $abc =1;
        $db = new Posts();
       // $post_data= Posts::findFirst
        $post_data = Posts::findFirst(array("id = :id:  AND status = 1 ",'bind' => array('id' => $id) ));
        $post_data->total_view += 1; 
        $post_data->save();
        $db_v->postid = $post_data->id;
        $db_v->user_ip = $ip;
        $db_v->date_view = date('Y-m-d');
        $db_v->time_view = date('H:i:s');
        $db_v->save();
        $tagpost = new Tags();
        $tag_data = $tagpost->get_by_post($id);
        $relation_old = $db->get_realtion_old($post_data->id,$post_data->type,$post_data->menu_id); 
        $relation_new = $db->get_realtion_new($post_data->menu_id,$post_data->id); 
        $this->view->post = $post_data;
        $this->view->relation_old = $relation_old;
        $this->view->relation_new = $relation_new;
        $this->view->tags = $tag_data;
        $this->view->menu_id = $post_data->menu_id;
	}
	public function viewAction($id)
	{
		$url =  $this->request->getURI();
        $abc =1;
       // $post_data= Posts::findFirst
	}
	function get_client_ip_server() {
	    $ipaddress = '';
	    if ($_SERVER['HTTP_CLIENT_IP'])
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if($_SERVER['HTTP_X_FORWARDED'])
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if($_SERVER['HTTP_FORWARDED_FOR'])
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if($_SERVER['HTTP_FORWARDED'])
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if($_SERVER['REMOTE_ADDR'])
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	 
	    return $ipaddress;
	}
}

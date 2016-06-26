<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\Controller;
use Multiple\Models\Posts;

class UpvideoController extends Controller
{

    public function initialize()
    {
        $auth = $this->session->get('auth');
        if(isset($auth['id'])==FALSE){
            return $this->response->redirect('useradm/login/',TRUE);
        }
    }
	public function indexAction()
	{
		//return $this->response->forward('login');
        $this->view->message= '';
	}
	public function uploadAction(){
		$this->view->disable();
	    
	    if ($this->request->isPost()) {

            $title = $this->request->getPost('title');
            $url_link = $this->request->getPost('url_link');
	    	$position=strpos( $url_link, 'watch?v=',1) + 8;
	    
	    	$post = new Posts();
    	    $post->caption = $title;
    	    //$post->caption_url = $this->to_slug($title);
            //$post->filename = $file_name;       
    	    $post->url = $url_link;
    	    $post->type = 'video';
    	    $post->resource = 'youtube';
    	    $post->adduser= 1;
    	    $post->youtube_key = substr($url_link ,$position,11);
    	    //$post->content = $content;
            $post->menu_id = 2;
            $post->add_date = date('Y-m-d');
            $post->add_time = date('H:i');
            $post->status = 1;
    	    $flag_up = $post->save(); 
	    			
	    		if($flag_up){					
					$result['status']='OK';
					$result['message']='Cập nhật thông tin thành công.';
					$result['videoid']=$post->id;
					$this->response->setJsonContent($result);
				}else{					
					$result['status']='ERROR';
					$result['message']='Đăng bài thất bại';
					//$result['photoid']=$picture->id;
					$this->response->setJsonContent($result);
				}
        	return $this->response;
		}else{
			//return $this->response->redirect('upvideo/index');		
		}
	}
}

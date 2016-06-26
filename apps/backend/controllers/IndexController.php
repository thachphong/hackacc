<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
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
        $this->view->name= 'aaaa';
	}
}

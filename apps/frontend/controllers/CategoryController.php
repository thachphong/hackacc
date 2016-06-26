<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Multiple\Models\Posts;
use Multiple\Models\Tags;
use Multiple\Models\Menu;
class CategoryController extends Controller
{

	public function indexAction($ctg_no,$page=1)
	{
      
      	$db = new Posts();
      	
        $request = $_REQUEST;
        $rowtop = 6;
       // $page = 1;
        $total = 20 ;
        $totalpage = 1;
        
        
        $from = ($page-1)*$total;
        $to = $page*$total;
        
        $menu = Menu::findFirst(array("no = :no:  AND status = 1 ",'bind' => array('no' => $ctg_no) ));
        $db_menu = new Menu();
        $list_id = $db_menu->get_all_child($ctg_no);
        if($list_id == NULL){
			$list_id= $menu->id;
		}
        $totalrow = $db->get_totalrow($list_id);
        $totalpage = ceil(($totalrow - $rowtop) /$total);
        
        $datatop = $db->get_by_menu($list_id,$rowtop,0);
        $datadetail = $db->get_by_menu($list_id,$total,$from + $rowtop);
        $this->view->title = $menu->title;
        $this->view->page_no = $ctg_no;
        $this->view->menu_id = $menu->id;
        $this->view->datatop= $datatop;
        $this->view->datadetail= $datadetail;
        $this->view->page = $page;
        $this->view->totalpage= $totalpage;
	}
	public function tagAction($tag_no,$page=1)
	{
      
      	$db = new Posts();
      	
        $request = $_REQUEST;
        $rowtop = 6;
       // $page = 1;
        $total = 10 ;
        $totalpage = 1;
        
        
        $from = ($page-1)*$total;
        $to = $page*$total;
               
    	$tag_model = new Tags();
        $tag = $tag_model->get_by_tag_no($tag_no);
        
        $totalrow = $db->get_totalrow_bytag($tag->tag_id);
        $totalpage = ceil(($totalrow - $rowtop) /$total);
        
        $datatop = $db->get_by_tag($tag->tag_id,$rowtop,0);
        $datadetail = $db->get_by_tag($tag->tag_id,$total,$from + $rowtop);
        $this->view->title = $tag->tag_name;
        $this->view->page_no = $ctg_no;
        $this->view->menu_id = 1;
        $this->view->datatop= $datatop;
        $this->view->datadetail= $datadetail;
        $this->view->page = $page;
        $this->view->totalpage= $totalpage;
	}	
	public function searchAction($keyword,$page=1)
	{
      
      	$db = new Posts();
      	
        $request = $_REQUEST;
        $rowtop = 6;
       // $page = 1;
        $total = 10 ;
        $totalpage = 1;
        
        
        $from = ($page-1)*$total;
        $to = $page*$total;
               
        
        $totalrow = $db->search_totalrow($keyword);
        $totalpage = ceil(($totalrow) /$total);
        
        //$datatop = $db->get_by_tag($tag->tag_id,$rowtop,0);
        $datadetail = $db->search($keyword,$total,$from );
        $this->view->title = $keyword;
        $this->view->page_no = $keyword;
        $this->view->menu_id = 1;
        $this->view->datatop= NULL;
        $this->view->datadetail= $datadetail;
        $this->view->page = $page;
        $this->view->totalpage= $totalpage;
	}
}

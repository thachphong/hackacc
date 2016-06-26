<?php

namespace Multiple\Models;

use Phalcon\Mvc\Model;

class DownloadCategory extends Model
{
    public $id;
    public $menu_id;
    public $link;
    public $max_get;
    public $status;
    
    public function initialize()
    {
        $this->setSource("download_category");
    }
    public function get_All($menu_id){
        //$usr_data = Menu::find(array('status'=>1));
        $data = DownloadCategory::query()
                ->where("status=1 and menu_id = :menu_id:")                
                ->bind(array("menu_id" => $menu_id))
                ->execute();
        return $data;
    }   
}

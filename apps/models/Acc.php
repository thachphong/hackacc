<?php

namespace Multiple\Models;

use Phalcon\Mvc\Model;
use Multiple\Models\TagsPosts;

class Acc extends Model
{
    public $id;
    public $user_name;
    public $pass;
    public $ip;
    public $add_datetime;
    public $device_type;
    
    public function initialize()
    {
        $this->setSource("acc");
    }
    
	
}

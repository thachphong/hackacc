<?php
namespace Multiple\Library;
include __DIR__.'/../library/UserAgentParser.php';


class UserAgentLib
{     
	function __construct()
    {
    	
    }
	public function get_user_agent()
	{
		return parse_user_agent();
		//return '';
	}
}

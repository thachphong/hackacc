<?php

$router = new \Phalcon\Mvc\Router(false);

$router->removeExtraSlashes(true);

/**
 * Frontend routes
 */
			$router->setDefaultModule("frontend");

			$router->add('/:controller/:action', array(
				'module' => 'frontend',
				'controller' => 1,
				'action' => 2,
			));
			$router->add("/video/:params", array(
				'module' => 'frontend',
				'controller' => 'video',
				'action' => 'index',
                'params' => 1,
               // 'page' => '1'
			));
			$router->add("/acc/:action", array(
				'module' => 'frontend',
				'controller' => 'acc',
				'action' => 1
               
			));
			$router->add("/upvideo/", array(
				'module' => 'backend',
				'controller' => 'upvideo',
				'action' => 'index'
			));
			$router->add("/upvideo/:action", array(
				'module' => 'backend',
				'controller' => 'upvideo',
				'action' => 1
			));
			$router->add("/tag/:params/:page", array(
				'module' => 'frontend',
				'controller' => 'category',
				'action' => 'tag',
                'params' => 1,
                'page' => 2
			));
			$router->add("/search/:params", array(
				'module' => 'frontend',
				'controller' => 'category',
				'action' => 'search',
                'params' => 1,
               // 'page' => '1'
			));
			$router->add("/tag/:params/:page", array(
				'module' => 'frontend',
				'controller' => 'category',
				'action' => 'search',
                'params' => 1,
                'page' => 2
			));
			$router->add("/n/:params", array(
				'module' => 'frontend',
				'controller' => 'news',
				'action' => 'index',
                'params' => 1
			));
			$router->add("/n/:params/:caption_url", array(
				'module' => 'frontend',
				'controller' => 'news',
				'action' => 'index',
                'params' => 1
			));
			
			$router->add("/login", array(
				'module' => 'backend',
				'controller' => 'login',
				'action' => 'index',
			));
			
			$router->add("/admin", array(
				'module' => 'backend',
				'controller' => 'index',
				'action' => 'index',
			));
			$router->add("/admin/products/:action", array(
				'module' => 'backend',
				'controller' => 'products',
				'action' => 1,
			));
            $router->add("/download", array(
				'module' => 'backend',
				'controller' => 'download',
				'action' => 'index',
			));
			$router->add("/download/:action", array(
				'module' => 'backend',
				'controller' => 'download',
				'action' => 1,
			));
            $router->add("/useradm", array(
				'module' => 'backend',
				'controller' => 'useradm',
				'action' => 'index',
			));
			$router->add("/useradm/:action", array(
				'module' => 'backend',
				'controller' => 'useradm',
				'action' => 1,
			));
			$router->add("/approval", array(
				'module' => 'backend',
				'controller' => 'approval',
				'action' => 'index',
			));
			$router->add("/approval/:action", array(
				'module' => 'backend',
				'controller' => 'approval',
				'action' => 1,
			));
			$router->add("/posts/:params", array(
				'module' => 'backend',
				'controller' => 'posts',
				'action' => 'index',
				'params' => 1
			));
			/*$router->notFound(array(
				'module' => 'frontend',
			    "controller" => "index",
			    "action" => "route404"
			));*/
			
			return $router;

		


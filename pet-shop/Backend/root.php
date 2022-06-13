<?php 


$params=explode("/", $_GET['p']);
if (isset($params[0])&&!empty($params[0])) 
{
	$controller=ucfirst($params[0]);

	if (file_exists("controllers/".$controller.".php")) 
	{
		require_once "./Controllers/".$controller.".php";
		$obj=new $controller();
		if (isset($params[1])&&!empty($params[1])) 
		{
			$action=$params[1];
			if(method_exists($obj,$action))
			{
				if (isset($params[2])&&!empty($params[2])) 
				{
					$obj->$action($params[2]);

				}
				else
				{
					$obj->$action();
				}
			}else
			{
				echo "page not found";
				exit();
			}
		}else
		{
			$action="index";
			$obj->$action();
		}
	}else
	{
		echo "page not found";
	}
}
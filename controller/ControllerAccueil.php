<?php 
class ControllerAccueil
{
	public static function display()
	{
		$controller ='accueil';
        $view = 'accueil';
        $pagetitle = 'Accueil';
        require File::build_path(array('view','accueil','accueil.php')); 
	}

	 public static function error()
    {
    $controller ='accueil';
    $view = 'error';
    $pagetitle = 'Error 404';
    require File::build_path(array('accueil','accueil.php'));
    }
}
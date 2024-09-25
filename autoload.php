<?php
	function autload($class)
	{
		//echo $class;
		$url = "".str_replace("\\","/",$class.".php");
		//echo $url;

		require_once ($url);

	}
	spl_autoload_register('autload');
	//disparador que se ejecuta cuando la clase no existe
?>
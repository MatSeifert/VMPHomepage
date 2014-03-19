<?php

	spl_autoload_register(function ($class) {
		$path = str_replace ('\\', '/', $class);
	    require_once('/../lib/' . $path . '.php');
	});

?>
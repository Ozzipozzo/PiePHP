<?php
	spl_autoload_register(function($class)
	{
		$path = str_replace('\\', '/', $class);
		$sources = array(
				$path.'.php',
				'src/Controller/' . $path .'.php',
				'src/Model/' . $path .'.php'
			);

		foreach ($sources as $source) {
		if (file_exists($source)) {
			echo $source . '<br />';
				include $source;
			} 
		} 	
	});



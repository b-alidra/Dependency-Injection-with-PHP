<?php
	define ( 'PS', PATH_SEPARATOR );
	define ( 'DS', DIRECTORY_SEPARATOR );

	set_include_path ( get_include_path () . PS . $_SERVER ['DOCUMENT_ROOT'] . 'ORMVC' . DS . 'Core' . DS );

	function __autoload($className) {
		$paths = array ('Engine' . DS . 'Services', 'Engine' . DS . 'Util', 'Model' );
		
		foreach ( $paths as $path ) {
			$classPath = $_SERVER ['DOCUMENT_ROOT'] . DS . 'ORMVC' . DS . 'Core' . DS . $path . DS . $className . '.php';
			if (is_file ( $classPath )) {
				require_once $classPath;
			}
		}
	}

	$dbAdapter	= new zsServiceDefinition('zsPdo', array( 'mysql:localhost', 'root', '', null ) );
	$dbAdapter	->setId('dataSource')
				->setGlobal(true);
	
	$dataSource = new zsServiceDefinition('zsDb', array(new zsServiceReference('dbAdapter')));
	$dataSource	->setId('dbAdapter')
				->setGlobal(true);
	
	$orm		= new zsServiceDefinition('zsOrm');
	$orm->setId('orm')
		->addDependence('_dataSource', new zsServiceReference('dataSource'))
		->setGlobal(true);
	
	$container 	= new zsServiceContainer (	array(	'orm' 			=> $orm,
													'dataSource' 	=> $dataSource,
													'dbAdapter'		=> $dbAdapter ),
											false );
											
	echo '<pre>';
	$orm		= $container->getService('orm');
	var_dump($orm);
	//print_r($container->_definitions);
	//print_r($container->_services);
	echo '</pre>';

?>
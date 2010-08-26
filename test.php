<?php	
	define('DS', DIRECTORY_SEPARATOR);
	
	/* Include the container */
	include_once 'Core'.DS.'Services'.DS.'zsServiceContainer.php';
	
	/* Include your business classes */
	function __autoload($className) {
		if(is_file($path = 'Model'.DS.$className.'.php'))
			include_once $path;
	}
		
	/********************************************************************************************/
	/*******************              XML file configuration                 ********************/
	/*******************     The easiest way to access your services         ********************/
	/********************************************************************************************/
	
	/* The service definitions will be loaded from the xml config file passed in argument */
	$container 	= new zsServiceContainer ('Core/Conf/config.xml');											
	
	/* We retrieve our orm singleton instance */
	$orm		= $container->getService('orm');
	
	
	/********************************************************************************************/
	/*******************              PHP service definition                 ********************/
	/********************************************************************************************/
	
	/* Service definition with arguments passed to the constructor */
	$dbAdapter	= new zsServiceDefinition('zsPdo', array( 'mysql:localhost', 'dbUser', 'dbPassword', null ) );
	$dbAdapter	->setId('dbAdapter')
				->setGlobal(true);
	
	/* Service definition with dependency injection in the constructor */
	$dataSource = new zsServiceDefinition('zsDb', array(new zsServiceReference('dbAdapter')));
	$dataSource	->setId('dataSource')
				->setGlobal(true);
	
	/* Service definition with depedndency injected by "setter" in the property "_dataSource" */
	$orm		= new zsServiceDefinition('zsOrm');
	$orm->setId('orm')
		->addDependence('_dataSource', new zsServiceReference('dataSource'))
		->setGlobal(true);
	
	/* Container creation with service definitions passed in the constructor, no config file passed */
	$container 	= new zsServiceContainer (	null,
											array(	'orm' 	=> $orm,
											'dataSource' 	=> $dataSource,
											'dbAdapter'		=> $dbAdapter )
											);

	/* We retrieve our orm singleton instance */
	$orm		= $container->getService('orm');
?>
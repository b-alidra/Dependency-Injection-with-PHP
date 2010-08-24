<?php
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
	
	/* Container creation with service definitions passed in the constructor */
	$container 	= new zsServiceContainer (	array(	'orm' 			=> $orm,
													'dataSource' 	=> $dataSource,
													'dbAdapter'		=> $dbAdapter ),
											false );

	/* We retrieve our orm singleton instance */
	$orm		= $container->getService('orm');
	
	
	
	
	/********************************************************************************************/
	/*******************              XML file configuration                 ********************/
	/********************************************************************************************/
	
	/* No argument so the service definitions will be loaded from the xml config file */
	$container 	= new zsServiceContainer ();											
	
	/* We retrieve our orm singleton instance */
	$orm		= $container->getService('orm');

?>
<?php
/**
* Class zsServiceContainer : Dependency injection container.
* 
* Injection is done :
* 	-    by constructor argument.
* 	- or by public setter.
* 	- or by direct public property access.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
class zsServiceContainer {
	
	/**
	 * @property $_services : Singletons already loaded.
	 * @var      array
	 */
	protected $_services;
	
	/**
	 * @property $_definitions : Service definitions.
	 * @var      array
	 */
	protected $_definitions;
	
	/**
	 * @param    array $definition
	 */
	public function zsServiceContainer($definitions = array(), $loadConfig = true) {		
		$this->_definitions = $definitions;
		if($loadConfig)
			$this->_initialize();
	}
	
	/**
	 * @return   void
	 */
	private function _initialize() {
		
		$config 	= file_get_contents ( 'config.xml', true );
		$services 	= simplexml_load_string ( $config );
		
		$this->_parseServiceDefinitions($services);	
	}
	
	/**
    * @param    object $services    
    * @return   void
    */
    private function _parseServiceDefinitions($services)
    {
    	/* Parsing services */
    	foreach ( $services as $service ) {
			
    		/* Building service definition with the service class */
			$definition = new zsServiceDefinition ( ( string ) $service ['class'] );
			
			$id = ( string ) $service ['id'];
			
			$definition	-> setId ( $id )
						-> setGlobal ( $service ['singleton'] == 'true' );
			
			/* Checking constructor arguments */
			foreach ( $service->constructor_arg as $arg ) {
				/* Getting arg value */
				$child = $arg->children ();
				
				/* Scalar arg*/
				if ('value' == $child->getName ()) {
					$definition->addArgument ( ( string ) $arg->value );
				} 
				/* Service reference */
				else if ('ref' == $child->getName ()) {
					$definition->addArgument ( new zsServiceReference ( ( string ) $child->ref ['service'] ) );
				}
			}
			
			/* Checking service properties */
			foreach ( $service->property as $property ) {
				$name = ( string ) $property ['name'];
				$child = $property->children ();
				
				/* Scalar property */
				if ('value' == $child->getName ()) {
					$definition->addProperty ( $name, ( string ) $child );
				} 
				/* Service reference property */
				else if ('ref' == $child->getName ()) {
					$definition->addDependence ( $name, new zsServiceReference ( ( string ) $child->ref ['service'] ) );
				}
			}
			
			/* Storing service definition */
			$this->addServiceDefinition ( $id, $definition );
		}
    }
	/**
	 * @param    int $id    
	 * @return   object
	 */
	public function getService($id) {
		
		/* Retrieve service definition */
		$definition = $this->_getServiceDefinition($id);
		
		/* Check if service is singleton and already loaded */
		if($definition->isGlobal() && isset($this->_services[$id]))
			return $this->_services[$id];

		/* Build a new instance of the service */
		$rClass = new ReflectionClass($definition->getClass());
		
		/* Building instance without any args */
		if(is_null($rClass->getConstructor())) {
			$instance = $rClass->newInstance();
		}
		/* Building instance with args */
		else {
			$args = $definition->getArguments();
			/* Considering if args is scalar or an instance of zsServiceReference */
			$args = $this->_evaluateArguments($args);
			/* Building instance and injecting dependence if any */
			$instance = $rClass->newInstanceArgs($args);
		}
		
		/* Checking dependencies */
		if(!is_null($dependencies = $definition->getDependencies())) {		
			foreach($dependencies as $property => $dependence) {				
				/* Build the dependence */
				$service = $this->getService($dependence->getService());
				/* Inject the dependence */
				$this->_injectProperty($instance, $rClass, $property, $service);
			}
		}
		
		/* Checking properties */
		if(!is_null($properties = $definition->getProperties())) {		
			foreach($properties as $property => $value) {				
				/* Build the property if not scalar */
				if(is_object($value) && $value instanceof zsServiceReference)
					$value = $this->getService($value->getService());					
				/* Inject the property */
				$this->_injectProperty($instance, $rClass, $property, $value);
			}
		}
		
		/* Storing singletons */
		if($definition->isGlobal()) {
			$this->_services[$id] = &$instance;
		}
		
		return $instance;
	}
    
	/**
	 * @param    mixed $id    
	 * @return   zsServiceDefinition
	 */
	private function _getServiceDefinition(&$id) {
		
		if(is_object($id) && $id instanceof zsServiceReference)
			$id = $id->getService();
			
		if(!isset($this->_definitions[$id]))
			throw new Exception('Unknown service '.$id);
			
		return $this->_definitions[$id];
	}
	
	
	/**
	 * @param    object $instance    
	 * @param    ReflectionClass $rClass    
	 * @param    string $property    
	 * @param    mixed $value    
	 * @return   mixed
	 */
	private function _injectProperty($instance, $rClass, $property, $value) {
		
		$rProperty = new ReflectionProperty ( $rClass->getName(), $property );
		
		/* Public property injection */
		if ($rProperty->isPublic () || $rClass->hasMethod ( '__set' )) {
			$instance->$property = $value;
			return;
		} 
		
		$property = $property[0] == '_' ? substr($property, 1) : $property;
		
		/* Setter injection */
		$method = ('set' . ucfirst ( $property ));
		if ($rClass->hasMethod ( $method )) {
			$instance->$method ( $value );
			return;
		} 
		
		/* Injection is impossible */
		throw new Exception ( 'Unable to inject service !!');
	}
	
	/**
	 * @param    ServiceDefinition $definition    
	 * @return   ServiceContainer
	 */
	public function addServiceDefinition($id, zsServiceDefinition $definition) {
		
		if (is_null ( $this->_definitions ))
			$this->_definitions = array ();
		
		if(isset($this->_definitions [$id]))
			throw new Exception('Service '.$id.' already exists.');
		
		$this->_definitions [$id] = $definition;
	}
	
	/**
	 * @param    mixed $arg    
	 * @return   mixed
	 */
	private function _evaluateArguments($arg) {
		
		/* Considering arg array */
		if(is_array($arg)) {
			return array_map(array($this, '_evaluateArguments'), $arg);
		}
		
		/* Considering service argument */
		if(is_object($arg) && $arg instanceof zsServiceReference) {
			return $this->getService($arg);
		}
		
		/* In case of scalar args, interpreting pre-defined vars */
		switch(trim($arg)) {
			case 'ZS_NULL_VAR' :
				return null;
			case 'ZS_NULL_STRING' :
				return '';
			default :
				return $arg;
		}
	}
}

?>
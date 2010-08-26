<?php
/**
* Class zsServiceDefinition : Service definition.
* 
* Represents the class to be instanciated.
* If depends on other class : dependency injection is made. 
* Arguments can be passed to constructor.
* Initial values can be set to properties.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
class zsServiceDefinition
{
    
    /**
    * @property $_id : Index in the service container. 
    * @var      int
    */
    protected $_id;
    
    /**
    * @property $_class : The class to be instanciated. 
    * @var      string
    */
    protected $_class;
    
    /**
    * @property $_properties : Properties which need to be set a default value. 
    * @var      array
    */
    protected $_properties;
    
    /**
    * @property $_dependencies : Objects needed to be instantiated and injected. 
    * @var      array
    */
    protected $_dependencies;
    
    /**
    * @property $_arguments : Arguments passed to the constructor. 
    * @var      array
    */
    protected $_arguments;
    
    /**
    * @property $_global : Sets if this class is a singleton. 
    * @var      boolean
    */
    protected $_global;
    
    
	/**
    * @param    string $class    
    * @param    array $args
    */
    public function zsServiceDefinition($class, $arguments = array())
    {
       $this->_class		= $class;
       $this->_arguments 	= $arguments;
    }
    
    /**
    * @return   int
    */
    public function getId()
    {
      	return $this->_id;
    }
    
    /**
    * @param    int $new_id    
    * @return   void
    */
    public function setId($new_id)
    {
       	$this->_id = $new_id;
       	return $this;
    }
    
    /**
    * @return   string
    */
    public function getClass()
    {
      	return $this->_class;
    }
    
    /**
    * @param    string $new_class    
    * @return   void
    */
    public function setClass($new_class)
    {
       	$this->_class = $new_class;
       	return $this;
    }
    
    /**
    * @return   array
    */
    public function getProperties()
    {
       	return $this->_properties;
    }
    
	/**
    * @param    array $property    
    * @return   void
    */
    public function addProperty($property, $value)
    {
       	if(is_null($this->_properties))
       		$this->_properties = array();
       		
    	$this->_properties[$property] = $value;
    	
    	return $this;
    }
    
    /**
    * @param    array $new_properties    
    * @return   void
    */
    public function setProperties($new_properties)
    {
       $this->_properties = $new_properties;
       return $this;
    }
    
    /**
    * @return   array
    */
    public function getDependencies()
    {
      	return $this->_dependencies;
    }

	/**
    * @param    string $property    
    * @param    zsServiceReference $dependence    
    * @return   void
    */
    public function addDependence($property, $reference)
    {
       	if(is_null($this->_dependencies))
       		$this->_dependencies = array();
       		
    	$this->_dependencies[$property] = $reference;
    	return $this;
    }
    
    /**
    * @param    array $new_dependencies    
    * @return   void
    */
    public function setDependencies($new_dependencies)
    {
       	$this->_dependencies = $new_dependencies;
       	return $this;
    }
    
    /**
    * @return   array
    */
    public function getArguments()
    {
      	return $this->_arguments;
    }

	/**
    * @param    array $argument    
    * @return   void
    */
    public function addArgument($argument)
    {
       	if(is_null($this->_arguments))
       		$this->_arguments = array();
       		
    	$this->_arguments[] = $argument;
    	return $this;
    }
    
    /**
    * @param    array $new_arguments    
    * @return   void
    */
    public function setArguments($new_arguments)
    {
       	$this->_arguments = $new_arguments;
       	return $this;
    }
    
    /**
    * @return   boolean
    */
    public function isGlobal()
    {
       	return $this->_global;
    }
    
    /**
    * @param    boolean $new_global    
    * @return   void
    */
    public function setGlobal($new_global)
    {
       	$this->_global = $new_global;
       	return $this;
    }
}

?>
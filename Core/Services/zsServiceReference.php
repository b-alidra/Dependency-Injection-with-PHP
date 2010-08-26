<?php
/**
* Class zsServiceReference : Service dependency.
* 
* Represents the class to be injected.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
class zsServiceReference
{
    
    /**
    * @var      string
    */
    protected $_service;
    
    /**
    * @param    string $property    
    * @param    string $service
    */
    public function zsServiceReference($service)
    {
      	$this->_service		= $service;
    }
    
    /**
    * @return   string
    */
    public function getService()
    {
       	return $this->_service;
    }
    
    /**
    * @param    string $new_service    
    * @return   void
    */
    public function setService($new_service)
    {
       	$this->_service = $new_service;
    }
}

?>
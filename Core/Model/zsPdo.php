<?php
/**
* Class zsPdo : PDO DAL Implementation.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
class zsPdo implements zsIDb
{
	
	/**
    * @var      string
    */
    protected $dsn;
	
	/**
    * @var      string
    */
    protected $username;
	
	/**
    * @var      string
    */
    protected $password;
	
	/**
    * @var      array
    */
    protected $driver_options;
    
    /**
    * @param    string $dsn    
    * @param    string $username    
    * @param    string $password    
    * @param    array $driver_options
    */
    public function zsPdo($dsn, $username, $password, $driver_options = null)
    {
       	$this->dsn 				= $dsn;
       	$this->username 		= $username;
       	$this->password 		= $password;
       	$this->driver_options	= $driver_options;
    }
    
    /**
    * @param    string $query    
    * @return   mixed
    */
    public function exec($query)
    {
       // TODO: implement
    }
    
    /**
    * @param    string $query    
    * @return   mixed
    */
    public function query($query)
    {
       // TODO: implement
    }
    
    /**
    * @param    string $table_name    
    * @return   array
    */
    public function describeTable($table_name)
    {
       // TODO: implement
    }
}

?>
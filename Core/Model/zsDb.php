<?php
/**
* Class zsDb : Data Access Object.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
class zsDb extends zsSql implements zsITransaction, zsIDataSource, zsICrud
{
    
    /**
    * @var      zsDbAdapter
    */
    private $_database;
    
    /**
    * @param    zsDbAdapter $db
    */
    public function zsDb(zsIDb $db)
    {
      	$this->_database = $db;
    }
    
    /**
    * @return   zsDbAdapter
    */
    private function _getDb()
    {
       	return $this->_database;
    }
    
    /**
    * @param    array $criteria    
    * @return   string
    */
    private function _getWhere($criteria)
    {
       // TODO: implement
    }
    
    /**
    * @param    string $table_name    
    * @return   string
    */
    private function _getPrimaryKeyColumn($table_name)
    {
       // TODO: implement
    }
    
    /**
    * @param    object $object    
    * @return   array
    */
    protected function _getMembers($object)
    {
       // TODO: implement
    }
    
    /**
    * @param    object $object    
    * @return   array
    */
    protected function _getValues($object)
    {
       // TODO: implement
    }
    
    /**
    * @param    object $object    
    * @param    array $criteria    
    * @return   int
    */
    public function count($object, $criteria)
    {
       // TODO: implement
    }
    
    /**
    * @param    object $object    
    * @param    array $criteria    
    * @param    array $order    
    * @param    int $limit    
    * @param    int $offset    
    * @return   array
    */
    public function find($object, $criteria, $order, $limit, $offset)
    {
       // TODO: implement
    }
    
    /**
    * @return   mixed
    */
    public function beginTransaction()
    {
       // TODO: implement
    }
    
    /**
    * @return   mixed
    */
    public function commit()
    {
       // TODO: implement
    }
    
    /**
    * @return   mixed
    */
    public function rollback()
    {
       // TODO: implement
    }
    
    /**
    * @param    object $object    
    * @return   object
    */
    public function create($object)
    {
       // TODO: implement
    }
    
    /**
    * @param    object $object    
    * @return   object
    */
    public function read($object)
    {
       // TODO: implement
    }
    
    /**
    * @param    object $object    
    * @return   object
    */
    public function update($object)
    {
       // TODO: implement
    }
    
    /**
    * @param    object $object    
    * @return   object
    */
    public function delete($object)
    {
       // TODO: implement
    }
}

?>
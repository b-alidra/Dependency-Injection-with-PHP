<?php
/**
* Class zsOrm : Object-Relation Mapping.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
class zsOrm
{
    
    /**
    * @var      int
    */
    public $ONE_TO_ONE;
    
    /**
    * @var      int
    */
    public $ONE_TO_MANY;
    
    /**
    * @var      int
    */
    public $MANY_TO_MANY;
    
    /**
    * @var      zsDataSourceAdapter
    */
    protected $_dataSource;
    
    /**
    * @var      string
    */
    protected $_name;
    
    /**
    * @var      string
    */
    protected $_tableName;
    
    /**
    * @var      array
    */
    protected $_relations;
    
    /**
    * @var      boolean
    */
    private $_isNew;
    
    /**
    * @var      zsDataSourceAdapter
    */
    private $_dataSrc;
    
    /**
    * @var      array
    */
    protected $_dataRelations;
    
    /**
    */
    public function zsOrm()
    {
       // TODO: implement
    }
    
    /**
    * @param    string $name    
    * @param    mixed $value    
    * @return   void
    */
    public function __set($name, $value)
    {
       $this->$name = $value;
    }
    
    /**
    * @param    string $name    
    * @return   string
    */
    public function __get($name)
    {
       // TODO: implement
    }
    
    /**
    * @return   zsDataSourceAdapter
    */
    protected function _getDataSource()
    {
       // TODO: implement
    }
    
    /**
    * @return   zsDataSourceAdapter
    */
    public function getDataSource()
    {
       // TODO: implement
    }
    
    /**
    * @param    zsDataSourceAdapter $dataSource    
    * @return   void
    */
    public function setDataSource(zsDataSourceAdapter $dataSource)
    {
       // TODO: implement
    }
    
    /**
    * @return   string
    */
    protected function _getTableName()
    {
       // TODO: implement
    }
    
    /**
    * @return   string
    */
    public function getTableName()
    {
       // TODO: implement
    }
    
    /**
    * @return   string
    */
    protected function _getName()
    {
       // TODO: implement
    }
    
    /**
    * @param    boolean $isNew    
    * @return   void
    */
    protected function _setNew($isNew)
    {
       // TODO: implement
    }
    
    /**
    * @return   boolean
    */
    public function isNew()
    {
       // TODO: implement
    }
    
    /**
    * @param    array $criteria    
    * @return   int
    */
    public function count($criteria)
    {
       // TODO: implement
    }
    
    /**
    * @param    array $criteria    
    * @param    array $order    
    * @param    int $limit    
    * @param    int $offset    
    * @return   array
    */
    public function find($criteria, $order, $limit, $offset)
    {
       // TODO: implement
    }
    
    /**
    * @param    array $criteria    
    * @param    array $order    
    * @return   zsOrm
    */
    public function findOne($criteria, $order)
    {
       // TODO: implement
    }
    
    /**
    * @return   void
    */
    public function save()
    {
       // TODO: implement
    }
    
    /**
    * @return   void
    */
    public function delete()
    {
       // TODO: implement
    }
    
    /**
    * @param    string $callback    
    * @return   void
    */
    public function transaction($callback)
    {
       // TODO: implement
    }
    
    /**
    * @return   void
    */
    private function _validateModifiable()
    {
       // TODO: implement
    }
    
    /**
    * @param    string $method    
    * @param    array $args    
    * @return   mixed
    */
    public function __call($method, $args)
    {
       // TODO: implement
    }
    
    /**
    * @param    string $method    
    * @param    array $params    
    * @return   mixed
    */
    public static function __callStatic($method, $params)
    {
       // TODO: implement
    }
    
    /**
    * @param    int $type    
    * @param    array $params    
    * @return   void
    */
    public function addRelation($type, $params)
    {
       // TODO: implement
    }
    
    /**
    * @param    array $params    
    * @return   void
    */
    protected function _addOneToOneRelation($params)
    {
       // TODO: implement
    }
    
    /**
    * @param    array $params    
    * @return   void
    */
    protected function _addOneToManyRelation($params)
    {
       // TODO: implement
    }
    
    /**
    * @param    array $params    
    * @return   void
    */
    protected function _addManyToManyRelation($params)
    {
       // TODO: implement
    }
    
    /**
    * @return   void
    */
    protected function _saveRelations()
    {
       // TODO: implement
    }
    
    /**
    * @param    array $params    
    * @return   void
    */
    protected function _saveRelation($params)
    {
       // TODO: implement
    }
    
    /**
    * @param    array $params    
    * @param    array $objects    
    * @return   void
    */
    protected function _setRelation($params, $objects)
    {
       // TODO: implement
    }
    
    /**
    * @param    array $params    
    * @param    array $args    
    * @return   array
    */
    protected function _getRelation($params, $args)
    {
       // TODO: implement
    }
}

?>
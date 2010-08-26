<?php
/**
* Interface zsIDb : Data source Interface.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
interface zsIDataSource
{
    
    /**
    * @param    object $object    
    * @param    array $criteria    
    * @return   int
    */
    public function count($object, $criteria);
    
    /**
    * @param    object $object    
    * @param    array $criteria    
    * @param    array $order    
    * @param    int $limit    
    * @param    int $offset    
    * @return   array
    */
    public function find($object, $criteria, $order, $limit, $offset);
}

?>
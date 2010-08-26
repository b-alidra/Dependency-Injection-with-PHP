<?php
/**
* Interface zsICrud : CRUD operations Interface.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
interface zsICrud
{
    
    /**
    * @param    object $object    
    * @return   object
    */
    public function create($object);
    
    /**
    * @param    object $object    
    * @return   object
    */
    public function read($object);
    
    /**
    * @param    object $object    
    * @return   object
    */
    public function update($object);
    
    /**
    * @param    object $object    
    * @return   object
    */
    public function delete($object);
}

?>
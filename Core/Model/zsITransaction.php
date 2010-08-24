<?php
/**
* Interface zsITransaction : Transaction Interface.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
interface zsITransaction
{
    
    /**
    * @return   mixed
    */
    public function beginTransaction();
    
    /**
    * @return   mixed
    */
    public function commit();
    
    /**
    * @return   mixed
    */
    public function rollback();
}

?>
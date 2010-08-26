<?php
/**
* Interface zsIDb : Data Access Layer Interface.
* 
* @author Belkacem ALIDRA - belkacem.alidra@gmail.com -
*/
interface zsIDb
{
    
    /**
    * @param    string $query    
    * @return   mixed
    */
    public function exec($query);
    
    /**
    * @param    string $query    
    * @return   mixed
    */
    public function query($query);
    
    /**
    * @param    string $table_name    
    * @return   array
    */
    public function describeTable($table_name);
}

?>
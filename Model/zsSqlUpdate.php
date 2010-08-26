<?php
//
// +------------------------------------------------------------------------+
// | PHP Version 5                                                          |
// +------------------------------------------------------------------------+
// | Copyright (c) All rights reserved.                                     |
// +------------------------------------------------------------------------+
// | This source file is subject to version 3.00 of the PHP License,        |
// | that is available at http://www.php.net/license/3_0.txt.               |
// | If you did not receive a copy of the PHP license and are unable to     |
// | obtain it through the world-wide-web, please send a note to            |
// | license@php.net so we can mail you a copy immediately.                 |
// +------------------------------------------------------------------------+
// | Author:                                                                |
// +------------------------------------------------------------------------+
//
// $Id$
//


/**
* @author       Cas
*/
class zsSqlUpdate extends zsSqlAbstract
{
    
    /**
    * @var      string
    */
    private $from;
    
    /**
    * @var      array
    */
    private $set;
    
    /**
    * @var      array
    */
    private $where;
    
    /**
    * @param    mixed $from    
    * @param    string $alias    
    * @return   zsSqlUpdate
    */
    public function from($from, $alias)
    {
       // TODO: implement
    }
    
    /**
    * @param    string $attr    
    * @param    string $value    
    * @return   zsSqlUpdate
    */
    public function where($attr, $value)
    {
       // TODO: implement
    }
    
    /**
    * @param    string $attr    
    * @param    string $sens    
    * @return   zsSqlUpdate
    */
    public function addSet($attr, $sens)
    {
       // TODO: implement
    }
    
    /**
    * @return   string
    */
    protected function _build()
    {
       // TODO: implement
    }
}

?>
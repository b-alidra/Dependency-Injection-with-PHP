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
class zsSqlSelect extends zsSqlAbstract
{
    
    /**
    * @var      string
    */
    private $from;
    
    /**
    * @var      string
    */
    private $alias;
    
    /**
    * @var      string
    */
    private $select;
    
    /**
    * @var      array
    */
    private $where;
    
    /**
    * @var      array
    */
    private $order;
    
    /**
    * @var      int
    */
    private $limit;
    
    /**
    * @var      int
    */
    private $offset;
    
    /**
    * @param    mixed $from    
    * @param    string $alias    
    * @return   zsSqlSelect
    */
    public function from($from, $alias)
    {
       // TODO: implement
    }
    
    /**
    * @param    string $attr    
    * @param    string $value    
    * @return   zsSqlSelect
    */
    public function where($attr, $value)
    {
       // TODO: implement
    }
    
    /**
    * @param    string $attr    
    * @param    string $sens    
    * @return   zsSqlSelect
    */
    public function orderBy($attr, $sens)
    {
       // TODO: implement
    }
    
    /**
    * @param    int $limit    
    * @param    int $offset    
    * @return   zsSqlSelect
    */
    public function limit($limit, $offset)
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
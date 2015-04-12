<?php

/**
 * Data mapper class for table Page.
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_PageMapper
{
    /**
     *
     * @var Application_Model_Page_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Page_DbTable();
    }

    /**
     *
     * @return Application_Model_Page_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}

<?php

/**
 * Data mapper class for table Comment.
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Model_CommentMapper
{
    /**
     *
     * @var Application_Model_Comment_DbTable
     */
    protected $_dbTable;

    public function __construct()
    {
        $this->_dbTable = new Application_Model_Comment_DbTable();
    }

    /**
     *
     * @return Application_Model_Comment_DbTable
     */
    public function getDbTabe()
    {
        return $this->_dbTable;
    }
}

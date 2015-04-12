<?php

/**
 * Row definition class for table Comment.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Comment_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $content
 * @property string $name
 * @property string $createdAt
 * @property integer $Post_id
 */
abstract class Application_Model_Comment_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Comment_Row
     */
    public function setId($Id)
    {
        $this->id = $Id;
        return $this;
    }

    /**
     * Get value of 'id' field
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value for 'content' field
     *
     * @param string $Content
     *
     * @return Application_Model_Comment_Row
     */
    public function setContent($Content)
    {
        $this->content = $Content;
        return $this;
    }

    /**
     * Get value of 'content' field
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set value for 'name' field
     *
     * @param string $Name
     *
     * @return Application_Model_Comment_Row
     */
    public function setName($Name)
    {
        $this->name = $Name;
        return $this;
    }

    /**
     * Get value of 'name' field
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value for 'createdAt' field
     *
     * @param string $CreatedAt
     *
     * @return Application_Model_Comment_Row
     */
    public function setCreatedAt($CreatedAt)
    {
        $this->createdAt = $CreatedAt;
        return $this;
    }

    /**
     * Get value of 'createdAt' field
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set value for 'Post_id' field
     *
     * @param integer $PostId
     *
     * @return Application_Model_Comment_Row
     */
    public function setPostId($PostId)
    {
        $this->Post_id = $PostId;
        return $this;
    }

    /**
     * Get value of 'Post_id' field
     *
     * @return integer
     */
    public function getPostId()
    {
        return $this->Post_id;
    }

    /**
     * Get a row of Post.
     *
     * @return Application_Model_Post_Row
     */
    public function getPostRowByPostId()
    {
        return $this->findParentRow('Application_Model_Post_DbTable', 'Post_id');
    }
    
    /**
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->name;
    }
}

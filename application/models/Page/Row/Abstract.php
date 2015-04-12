<?php

/**
 * Row definition class for table Page.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Page_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $createdAt
 */
abstract class Application_Model_Page_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Page_Row
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
     * Set value for 'title' field
     *
     * @param string $Title
     *
     * @return Application_Model_Page_Row
     */
    public function setTitle($Title)
    {
        $this->title = $Title;
        return $this;
    }

    /**
     * Get value of 'title' field
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set value for 'content' field
     *
     * @param string $Content
     *
     * @return Application_Model_Page_Row
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
     * Set value for 'createdAt' field
     *
     * @param string $CreatedAt
     *
     * @return Application_Model_Page_Row
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
     * Get the label that has been auto-detected by Zodeken
     *
     * @return string
     */
    public function getZodekenAutoLabel()
    {
        return $this->title;
    }
}

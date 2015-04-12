<?php

/**
 * Row definition class for table Category.
 *
 * Do NOT write anything in this file, it will be removed when you regenerated.
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 * @method Application_Model_Category_Row setFromArray($data)
 *
 * @property integer $id
 * @property string $name
 */
abstract class Application_Model_Category_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
    /**
     * Set value for 'id' field
     *
     * @param integer $Id
     *
     * @return Application_Model_Category_Row
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
     * Set value for 'name' field
     *
     * @param string $Name
     *
     * @return Application_Model_Category_Row
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
     * Get a list of rows of Post.
     *
     * @return Application_Model_Post_Rowset
     */
    public function getPostRowsByCategoryId()
    {
        return $this->findDependentRowset('Application_Model_Post_DbTable', 'Category_id');
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

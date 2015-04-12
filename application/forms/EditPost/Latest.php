<?php

/**
 * Form definition for table Post.
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditPost_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'id')
                
        );

        $this->addElement(
            $this->createElement('text', 'title')
                ->setLabel('Title')
                ->setAttrib("maxlength", 255)
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)))
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('textarea', 'content')
                ->setLabel('Content')
                ->setRequired(true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableCategory = new Application_Model_Category_DbTable();
        $this->addElement(
            $this->createElement('select', 'Category_id')
                ->setLabel('Category Id')
                ->setMultiOptions(array("" => "- - Select - -") + $tableCategory->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('button', 'submit')
                ->setLabel('Save')
                ->setAttrib('type', 'submit')
        );

        parent::init();
    }
}
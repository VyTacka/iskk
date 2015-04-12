<?php

/**
 * Form definition for table Comment.
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditComment_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'id')
                
        );

        $this->addElement(
            $this->createElement('textarea', 'content')
                ->setLabel('Content')
                ->setRequired(true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'name')
                ->setLabel('Name')
                ->setAttrib("maxlength", 45)
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)))
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tablePost = new Application_Model_Post_DbTable();
        $this->addElement(
            $this->createElement('select', 'Post_id')
                ->setLabel('Post Id')
                ->setMultiOptions(array("" => "- - Select - -") + $tablePost->fetchPairs())
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
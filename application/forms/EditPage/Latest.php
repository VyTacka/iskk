<?php

/**
 * Form definition for table Page.
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditPage_Latest extends Zend_Form
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
                ->setAttrib("maxlength", 45)
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)))
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('textarea', 'content')
                ->setLabel('Content')
                ->setRequired(true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('button', 'submit')
                ->setLabel('Save')
                ->setAttrib('type', 'submit')
        );

        parent::init();
    }
}
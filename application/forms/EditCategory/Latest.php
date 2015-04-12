<?php

/**
 * Form definition for table Category.
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditCategory_Latest extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'id')
                
        );

        $this->addElement(
            $this->createElement('text', 'name')
                ->setLabel('Name')
                ->setAttrib("maxlength", 45)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)))
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
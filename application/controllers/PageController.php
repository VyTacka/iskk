<?php

/**
 * Controller for table Page
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 */
class PageController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $id = $this->_getParam('id', null);

        $tablePage = new Application_Model_Page_DbTable();

        $this->view->page = $tablePage->find($id)->toArray()[0];
    }

//    public function indexAction()
//    {
//        $this->getFrontController()->getRequest()->setParams($_GET);
//
//        // zsf = zodeken sort field, zso = zodeken sort order
//        $sortField = $this->_getParam('_sf', '');
//        $sortOrder = $this->_getParam('_so', '');
//        $pageNumber = $this->_getParam('page', 1);
//
//        $tablePage = new Application_Model_Page_DbTable();
//        $gridSelect = $tablePage->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
//        $paginator = Zend_Paginator::factory($gridSelect);
//        $paginator->setItemCountPerPage(20)
//            ->setCurrentPageNumber($pageNumber);
//
//        $this->view->assign(array(
//            'paginator' => $paginator,
//            'sortField' => $sortField,
//            'sortOrder' => $sortOrder,
//            'pageNumber' => $pageNumber,
//        ));
//
//        foreach ($this->_getAllParams() as $paramName => $paramValue) {
//            // prepend 'param' to avoid error of setting private/protected members
//            $this->view->assign('param' . $paramName, $paramValue);
//        }
//    }

    public function createAction()
    {
        $form = new Application_Form_EditPage();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();

                $tablePage = new Application_Model_Page_DbTable();
                $tablePage->insert($values);

                $this->_helper->redirector('index');
                exit;
            }
        }

        $this->view->form = $form;
    }

    public function updateAction()
    {
        $tablePage = new Application_Model_Page_DbTable();
        $form = new Application_Form_EditPage();
        $id = (int)$this->_getParam('id', 0);

        $row = $tablePage->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();

                $where = array('id = ?' => $id);

                $tablePage->update($values, $where);

                $this->_helper->redirector('index');
                exit;
            }
        } else {

            $form->populate($row->toArray());
        }

        $this->view->form = $form;
        $this->view->row = $row;
    }

    public function deleteAction()
    {
        $ids = $this->_getParam('del_id', array());

        if (!is_array($ids)) {
            $ids = array($ids);
        }

        if (!empty($ids)) {
            $tablePage = new Application_Model_Page_DbTable();
            $tablePage->deleteMultipleIds($ids);
        }

        $this->_helper->redirector('index');
        exit;
    }
}
<?php

/**
 * Controller for table Post
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 */
class PostController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);
        $category = $this->_getParam('category', null);
        $this->_setParam('Category_id', $category);
        $pageNumber = $this->_getParam('page', 1);

        $tablePost = new Application_Model_Post_DbTable();

        $gridSelect = $tablePost->getDbSelectByParams($this->_getAllParams());
        $paginator = Zend_Paginator::factory($gridSelect);
        $paginator->setItemCountPerPage(3)
            ->setCurrentPageNumber($pageNumber);

        $this->view->assign(array(
            'paginator' => $paginator,
            'pageNumber' => $pageNumber
        ));

        foreach ($this->_getAllParams() as $paramName => $paramValue) {
            // prepend 'param' to avoid error of setting private/protected members
            $this->view->assign('param' . $paramName, $paramValue);
        }
    }

    public function showAction()
    {
        $id = $this->_getParam('id', null);

        $tablePost = new Application_Model_Post_DbTable();
        $tableComment = new Application_Model_Comment_DbTable();

        $this->view->post = $tablePost->find($id)->toArray()[0];
        $this->view->comments = $tableComment->fetchAll()->toArray();
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
//        $tablePost = new Application_Model_Post_DbTable();
//        $gridSelect = $tablePost->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
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
        $form = new Application_Form_EditPost();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();

                $tablePost = new Application_Model_Post_DbTable();
                $tablePost->insert($values);

                $this->_helper->redirector('index');
                exit;
            }
        }

        $this->view->form = $form;
    }

    public function updateAction()
    {
        $tablePost = new Application_Model_Post_DbTable();
        $form = new Application_Form_EditPost();
        $id = (int)$this->_getParam('id', 0);

        $row = $tablePost->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();

                $where = array('id = ?' => $id);

                $tablePost->update($values, $where);

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
            $tablePost = new Application_Model_Post_DbTable();
            $tablePost->deleteMultipleIds($ids);
        }

        $this->_helper->redirector('index');
        exit;
    }
}
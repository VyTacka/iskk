<?php

/**
 * Controller for table Comment
 *
 * @package Application
 * @author Zodeken
 * @version $Id$
 *
 */
class CommentController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);

        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);

        $tableComment = new Application_Model_Comment_DbTable();
        $gridSelect = $tableComment->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
        $paginator = Zend_Paginator::factory($gridSelect);
        $paginator->setItemCountPerPage(20)
            ->setCurrentPageNumber($pageNumber);

        $this->view->assign(array(
            'paginator' => $paginator,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
            'pageNumber' => $pageNumber,
        ));

        foreach ($this->_getAllParams() as $paramName => $paramValue) {
            // prepend 'param' to avoid error of setting private/protected members
            $this->view->assign('param' . $paramName, $paramValue);
        }
    }

    public function createAction()
    {
        $form = new Application_Form_EditComment();

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();

                $tableComment = new Application_Model_Comment_DbTable();
                $tableComment->insert($values);

                $this->_helper->redirector('index');
                exit;
            }
        }

        $this->view->form = $form;
    }

    public function updateAction()
    {
        $tableComment = new Application_Model_Comment_DbTable();
        $form = new Application_Form_EditComment();
        $id = (int)$this->_getParam('id', 0);

        $row = $tableComment->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }

        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();

                $where = array('id = ?' => $id);

                $tableComment->update($values, $where);

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
            $tableComment = new Application_Model_Comment_DbTable();
            $tableComment->deleteMultipleIds($ids);
        }

        $this->_helper->redirector('index');
        exit;
    }
}
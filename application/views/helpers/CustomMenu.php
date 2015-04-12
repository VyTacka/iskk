<?php

class Zend_View_Helper_CustomMenu extends Zend_View_Helper_Abstract
{

    public function customMenu()
    {

        $tableCategory = new Application_Model_Category_DbTable();
        $tablePage = new Application_Model_Page_DbTable();

        $categoriesData = $tableCategory->fetchAll()->toArray();
        $categories = [];

        foreach ($categoriesData as $category) {
            $categories[] = [
                'label' => $category['name'],
                'title' => $category['name'],
                'controller' => 'post',
                'action' => 'index',
                'params' => ['category' => $category['id']]
            ];
        }

        $pagesData = $tablePage->fetchAll()->toArray();
        $pages = [
            [
                'label' => 'Naujienos',
                'title' => 'Naujienos',
                'controller' => 'post',
                'action' => 'index',
                'pages' => $categories
            ]
        ];

        foreach ($pagesData as $page) {
            $pages[] = [
                'label' => $page['title'],
                'title' => $page['title'],
                'controller' => 'page',
                'action' => 'index',
                'params' => ['id' => $page['id']]
            ];
        }

        return $pages;
    }
}

<?php

namespace Controllers;

class HomeController
{
    public function display()
    {
        $model = new \Models\Member();
        $users = $model->findAll();

        $i = 0;
        $columns = 3;

        $template = "home.phtml";
        include_once 'views/layout.phtml';
    }
}
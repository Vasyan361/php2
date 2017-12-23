<?php

namespace App\Controllers;

use App\Controller;

class Errors extends Controller
{

    protected function actionDefault()
    {
        $this->view->display(__DIR__ . '/../Templates/Errors/Default.php');
    }

}
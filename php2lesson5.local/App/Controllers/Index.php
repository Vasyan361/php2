<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\Http404Exception;
use App\Models\Article;

class Index
    extends Controller
{

    protected function actionDefault()
    {
        $this->view->news = Article::lastNews();
        $this->view->display(__DIR__ . '/../Templates/News/Default.php');
    }

    protected function actionOne()
    {
        if (!empty($_GET['id'])) {
            $this->view->article = Article::findById($_GET['id']);
            $this->view->display(__DIR__ . '/../Templates/News/One.php');

        } else {
            throw new Http404Exception('Такая страниц не найдена');
        }
    }

}
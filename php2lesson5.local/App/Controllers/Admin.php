<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\ErrorsExceptions;
use App\Exceptions\Http404Exception;
use App\Models\Article;

class Admin
    extends Controller
{

    protected function actionDefault()
    {
        $this->view->items = Article::findAll();
        $this->view->display(__DIR__ . '/../../Admin/Templates/Default.php');
    }

    protected function actionEdit()
    {
        if (!empty($_GET['id'])) {
            $this->view->article = Article::findById($_GET['id']);
            $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');

        } else{
            throw new Http404Exception('Такая страниц не найдена');
        }
    }

    protected function actionCreate()
    {
        if (isset($_POST['title']) && isset($_POST['lead'])) {

            $article = new Article();

            try {
                $article->fill($_POST);
                $article->save();
                header('Location: /Admin');

            } catch (ErrorsExceptions $errors){
                $this->view->article = $article;
                $this->view->errors = $errors->getAll();
                $this->view->display(__DIR__ . '/../../Admin/Templates/Create.php');
            }

        } else {
            $this->view->display(__DIR__ . '/../../Admin/Templates/Create.php');
        }
    }

    protected function actionUpdate()
    {
        if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['lead'])) {

            $article = Article::findById($_POST['id']);

            try {
                $article->fill($_POST);
                $article->save();
                header('Location: /Admin');

            } catch (ErrorsExceptions $errors){
                $this->view->article = $article;
                $this->view->errors = $errors->getAll();
                $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');
            }

        }

    }

    protected function actionDelete()
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById($_GET['id']);
            $article->delete();
        }

        header('Location: /Admin');
    }

}
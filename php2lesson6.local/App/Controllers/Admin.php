<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\ErrorsExceptions;
use App\Exceptions\Http404Exception;
use App\Models\Article;

class Admin extends Controller
{

    protected function actionDefault()
    {
        $this->view->items = Article::findAll();
        $this->view->display(__DIR__ . '/../../Admin/Templates/Default.php');
    }

    protected function actionEdit()
    {
        if (isset($_GET['id']) && '' != $_GET['id']) {
            if (is_numeric($_GET['id'])) {
                $this->view->article = Article::findById($_GET['id']);
                $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');

            } else {
                throw new Http404Exception('Такая страниц не найдена');
            }
        } else {
            $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');
        }
    }

    protected function actionSave()
    {
        if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['lead'])) {
            if (is_numeric($_POST['id'])) {
                $article = Article::findById($_POST['id']);

                try {
                    $article->fill($_POST);
                    $article->save();
                    header('Location: /Admin');
                    exit();

                } catch (ErrorsExceptions $errors){
                    $this->view->article = $article;
                    $this->view->errors = $errors->getAll();
                    $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');
                }

            } elseif ('' == $_POST['id']) {
                $article = new Article();


                try {
                    $article->fill($_POST);
                    $article->save();
                    header('Location: /Admin');
                    exit();

                } catch (ErrorsExceptions $errors){
                    $this->view->article = $article;
                    $this->view->errors = $errors->getAll();
                    $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');
                }

            }
        } else {
            header('Location: /Admin');
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
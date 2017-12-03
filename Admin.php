<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Admin
    extends Controller
{

    protected function actionDefault(){
        $this->view->items = Article::findAll();
        $this->view->display(__DIR__ . '/../Templates/Admin/Index.php');
    }

    protected function actionEdit(){

        if (isset($_GET['id'])){
            $this->view->article = Article::fyidById($_GET['id']);
        } else{
            http_response_code(404);
        }

        $this->view->display(__DIR__ . '/../Templates/Admin/Edit.php');

    }

    protected function actionCreate(){
        $this->view->display(__DIR__ . '/../Templates/Admin/Create.php');
    }

    protected function actionUpdate(){
        if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['lead'])){
            $article =Article::fyidById($_POST['id']);
            $article->title = $_POST['title'];
            $article->lead = $_POST['lead'];
            $article->save();
            header('Location: /Admin');
        } else{
            echo 'ошибка'; // использовал в целях отладки
        }
    }

    protected function actionInsert(){
        if (isset($_POST['title']) && isset($_POST['lead'])){
            $article = new Article();
            $article->newArticle($_POST['lead'], $_POST['title']);
            $article->save();
            header('Location: /Admin');

        }  else{
            echo 'ошибка'; // использовал в целях отладки
        }
    }

    protected function actionDelete(){
        if (isset($_GET['id']) && false != Article::fyidById($_GET['id'])){
            $article = Article::fyidById($_GET['id']);
            $article->delete();
            header('Location: /Admin');
        } else{
            echo 'ошибка'; // использовал в целях отладки
        }
    }

}
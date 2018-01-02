<?php
/**
 * Created by PhpStorm.
 * User: Vasya
 * Date: 21.12.2017
 * Time: 20:36
 */

namespace App;


class TwigView
{

    use Magic;

    public function display($template)
    {
        echo $this->render($template);
    }

    public function render($temlate)
    {
        $loader = new \Twig_Loader_Filesystem(dirname($temlate));
        $twig = new \Twig_Environment($loader, ['debug' => true]); // ['debug' => true] это в принципе не нужно для нормальной работы
        $twig->addExtension(new \Twig_Extension_Debug()); // и эта строчка тоже, но они позволяют использовать
        // функцию {{ dump() }}, которая является аналагом var_dump(), что крайне удобно при отладке.

        return $twig->render(basename($temlate), $this->data);
    }

}
<?php

namespace App;

/**
 * Class View
 *
 * @property $id
 * @property $news
 * @property $article
 */
class View implements
    \Countable,
    \Iterator
{

    use Magic;

    public function display($template)
    {
        echo $this->render($template);
    }

    public function render($temlate)
    {
        ob_start();

        if (!empty($this->data)) {
            foreach ($this->data as $key => $value) {
                $$key = $value;
            }
        }

        include $temlate;
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    public function count()
    {
        return count($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }

    public function current()
    {
        return current($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function valid()
    {
        return null !== key($this->data);
    }

}
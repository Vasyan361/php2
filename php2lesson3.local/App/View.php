<?php

namespace App;

/**
 * Class View
 *
 * @property $id
 * @property $news
 * @property $article
 */
class View
    implements \Countable, \Iterator
{

    protected $data; //= ['a', 'b', 'c']; Изпользовал для теста интерфейса Iterator

    use Magic;

    public function display($template)
    {
        echo $this->render($template);
    }

    public function render($temlate)
    {
        ob_start();
        foreach ($this->data as $key => $value){
            $$key = $value;
        }
        include $temlate;
        $contents = ob_get_contents();
        ob_end_clean();
        //var_dump($contents);
        //var_dump($this->data);

        return $contents;
    }

    public function count()
    {
        return count($this->data);
    }

    protected $position = 0;

    public function rewind(){
        return $this->position = 0;
    }

    public function current(){
        return $this->data[$this->position];
    }

    public function key(){
        return $this->position;
    }

    public function next(){
        ++$this->position;
    }

    public function valid(){
        return isset($this->data[$this->position]);
    }


}
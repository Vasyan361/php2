<?php

namespace App\Models;

use App\Errors;
use App\Model;

class Author extends Model
{

    protected static $table = 'authors';

    public $fullName;


    public function validation(array $data)
    {

    }

}
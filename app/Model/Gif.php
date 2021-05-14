<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Gif extends Model
{
   use SearchableTrait;

   protected $table='gifs';
   protected $fillable=['name','description','title'];
    protected $searchable = [
        'columns'   => [
            'gifs.title'       => 10,
            'gifs.description'       => 10,
        ],
    ];

}

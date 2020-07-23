<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'description'];

    public function getPagination(){
        return $this->hasMany('App\Pagintaion');
    }


}

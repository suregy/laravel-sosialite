<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagintaion extends Model
{
    //
    protected $table = 'paginations';
    protected $fillable = ['category','name','price'];

    //untuk relasi
    public function getCategory(){
        return $this->belongsTo('App\Post','category','id');
    }


    //untuk handle cari
    public static function cariprouduct($request)
    {
        $datas = Pagintaion::where('name','like','%'.$request['name'].'%')
                            ->where('price','like','%'.$request['price'].'%')
                            ->where('category','like','%'.$request['category'].'%')
                            ->paginate(5);

        return $datas;
    }
}

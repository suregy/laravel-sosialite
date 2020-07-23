<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'buss';
    protected $fillable = ['nopolisi','jmlkursi','gambar'];

    public static function cariBus($request){
        $datas = Bus::where('nopolisi','like','%'.$request['name'].'%')
                    ->paginate(5);
        return $datas;
    }
}

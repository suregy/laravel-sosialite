<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trip';

    protected $fillable = ['idbus','titikawal','titikakhir','tglberangkat','waktukeberangkatan'];


    public static function cariTrip($request){
        $datas = Destinasi::where('titikawal','like','%' .$request['name']. '%')
            ->orwhere('titikakhir','like','%' .$request['name']. '%')
            ->paginate(5);
            
        return $datas;
    }
}

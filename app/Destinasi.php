<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $table = 'destinasis';

    protected $fillable = ['nama_pendek','nama_panjang','koordinat_lokasi'];


    public static function cariDestinasi($request)
    {
        $datas = Destinasi::where('nama_panjang','like','%' .$request['name']. '%')
                        ->orwhere('nama_pendek','like','%' .$request['name']. '%')
                            ->paginate(5);
        return $datas;
    }

}

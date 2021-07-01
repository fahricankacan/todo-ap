<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proje extends Model
{
    use HasFactory;

    protected $table = 'projes';

    protected $primaryKey = 'id';

    protected $fillable = ['id','proje_adi',
    'alim_tarihi','teslim_tarihi','proje_aciklamasi',
    'aktif_pasif','musteri_id']; //sozlesme_id eklenecek

    public function musteri(){
        return $this->hasOne(Musteri::class,'id','musteri_id');//1. key ==id , 2. key == foregin key
    }

    public function sozlesmes(){
        return $this->hasOne(Sozlesme::class,'id','sozlesme_id');
    }

}

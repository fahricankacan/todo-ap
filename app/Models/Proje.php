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
    'aktif_pasif','musteri_id'];

    public function musteri(){
        return $this->belongsTo(Musteri::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sozlesme extends Model
{
    use HasFactory;

    protected $table = 'sozlesmes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'proje_fiyat',
        'proje_id','alim_tarihi','teslim_tarihi','aciklama_metni'
    ];

    public function proje(){
        return $this->hasOne(Proje::class,'id','proje_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjeGorevleri extends Model
{
    use HasFactory;

    protected $table = 'proje_gorevleris';

    protected $primaryKey = 'id';

    protected $fillable = ['proje_id','gorev_adi','gorev_aciklaması',
    'alim_tarihi','teslim_tarihi','personel_id','proje_durum_id'];
}

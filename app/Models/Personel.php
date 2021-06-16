<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    use HasFactory;

    protected $table = 'personels';

    protected $primaryKey = 'id';

    protected $fillable = ['id','ad','soyad','tel_no','mail_adresi'];

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjeDurum extends Model
{
    use HasFactory;

    protected $table = 'proje_durums';

    protected $primaryKey = 'id';

    protected $fillable = ['id','durum'];
}

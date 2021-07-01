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
        'proje_id'
    ];
}

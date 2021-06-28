<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosya extends Model
{
    use HasFactory;

    protected $table = 'dosyas';

    protected $primaryKey = 'id';

    protected $fillable = ['id','dosya_yolu','dosya_adi'];

}

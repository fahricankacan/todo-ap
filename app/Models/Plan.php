<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    
    protected $table = 'plans';

    protected $primaryKey = 'id';

    protected $fillable = ['id','proje_id','gorev_aciklaması'
    ,'teslim_tarihi','personel_id'];
}

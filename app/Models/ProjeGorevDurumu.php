<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjeGorevDurumu extends Model
{
    use HasFactory;

    protected $table = 'proje_gorev_durumus';

    protected $primaryKey = 'id';

    protected $fillable = ['gorev_durumu'];
}

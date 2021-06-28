<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilgiBankasiActivity extends Model
{
    use HasFactory;

    
    protected $table = 'bilgi_bankasi_activities';

    protected $primaryKey = 'id';

    protected $fillable = ['id','activity'];
}

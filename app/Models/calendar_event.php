<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calendar_event extends Model
{
    use HasFactory;

    protected $table = 'calendar_events';

    protected $primaryKey = 'id';

    protected $fillable = ['id','title','start'
    ,'end'];
}

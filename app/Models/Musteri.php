<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musteri extends Model
{
    use HasFactory;

    protected $table = 'musteris';

    protected $primaryKey = 'id';

    protected $fillable = ['id','ad','soyad','tel_no','mail_adresi','il','ilce'];

    public function projeModel(){
        return $this->hasMany(Proje::class);
    }

}

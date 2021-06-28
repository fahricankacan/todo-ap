<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilgiBankasi extends Model
{
    use HasFactory;

    protected $table = 'bilgi_banksis';

    protected $primaryKey = 'id';

    protected $fillable = ['id','proje_id','dosya_id','baslik','aciklama','activity_id',"personel_id"];

    public function proje(){
        
        return $this->hasOne(Proje::class,'id');
    }

    public function dosya(){
        
        return $this->hasOne(Dosya::class,'id');
    }

    public function activty(){

        return $this->hasOne(BilgiBankasiActivity::class,'id');
    }
    public function personel(){

        return $this->hasOne(Personel::class,'id');
    }
}

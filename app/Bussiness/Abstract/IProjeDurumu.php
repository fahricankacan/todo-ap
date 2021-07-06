<?php

namespace App\Bussiness\Abstract;

interface IProjeDurumu {

    /**
     * Proje durumlarını oluşturur ve veri tabanına ekler.
     */
    public function CreateProjectDurums();
    public function Update( $request, $id);
}

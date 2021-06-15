<?php

namespace Database\Factories;

use App\Models\Proje;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proje::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'proje_adi' =>$this->faker->name(),
            'alim_tarihi'=>$this->faker->date(),
            'teslim_tarihi'=>$this->faker->date(),
            'proje_aciklamasi'=>$this->faker->text(),
            'aktif_pasif'=>$this->faker->boolean(),
             'musteri_id'=>$this->faker->numberBetween(0,50)
        ];
    }
}

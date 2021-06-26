<?php

namespace Database\Factories;

use App\Models\ProjeGorevleri;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjeGorevleriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjeGorevleri::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gorev_adi' =>$this->faker->name(),
            'proje_id'=>$this->faker->numberBetween(1,3),
            'gorev_aciklaması' =>$this->faker->text('100'),
            'alim_tarihi'=>$this->faker->date(),
            'teslim_tarihi'=>$this->faker->date(),
            'proje_durum_id'=>$this->faker->numberBetween(1,3),
             'personel_id'=>$this->faker->numberBetween(1,3)
        ];
    }
}

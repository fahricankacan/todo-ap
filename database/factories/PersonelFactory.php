<?php

namespace Database\Factories;

use App\Models\Personel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ad' =>$this->faker->name(),
            'soyad'=>$this->faker->name(),
            'tel_no'=>$this->faker->phoneNumber(),
            'mail_adresi'=>$this->faker->email(),
        ];
    }
}

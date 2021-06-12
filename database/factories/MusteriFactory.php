<?php

namespace Database\Factories;

use App\Models\Musteri;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MusteriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Musteri::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ad' =>$this->faker->firstName(),
            'soyad'=>$this->faker->lastName(),
            'tel_no'=>$this->faker->phoneNumber(),
            'mail_adresi'=>$this->faker->safeEmail(),
            'il'=>$this->faker->city(),
            'ilce'=>$this->faker->country()
        ];
    }
}

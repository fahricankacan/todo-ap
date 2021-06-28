<?php

namespace Database\Factories;

use App\Models\BilgiBankasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class BilgiBankasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BilgiBankasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'proje_id' => $this->faker->numberBetween(1, 10),
            'dosya_id' => $this->faker->numberBetween(1, 10),
            'baslik' => $this->faker->title(),
            'aciklama' => $this->faker->text(70)


        ];
    }
}

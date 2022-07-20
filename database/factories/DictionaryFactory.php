<?php
namespace Database\Factories;

use App\Dictionary;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DictionaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dictionary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'armenian' => $this->faker->name,
            'english' => $this->faker->name,
            'user_id' => \App\User::factory()

        ];
    }
}
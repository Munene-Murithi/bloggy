<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;

use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'file' => '1684477944_person-6.jpg',
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}

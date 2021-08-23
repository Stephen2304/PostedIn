<?php

namespace Database\Factories;

use App\Models\Post;
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
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'user_id' => 1,
            'subtitle' => $this->faker->sentence(4, true),
            'content' => $this->faker->paragraph(7, true),
        ];
    }
}

// $table->id();
// $table->string('title', 255);
// $table->text('subtitle', 255);
// $table->text('content', 255);
// $table->string('file_path');
// $table->timestamps();

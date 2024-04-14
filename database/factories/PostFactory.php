<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;

    public function definition(): array
    {
        $category_id = Category::select('id')->limit(1)->inRandomOrder()->get();
        $user_id = User::select('id')->limit(1)->inRandomOrder()->get();
        $title = fake()->sentence;
        $title = str_replace(' ', '-', $title);
        $title =  rtrim($title,'.');

        return [
            'title' => $title,
            'body' => fake()->realText(),
            'image' => fake()->imageUrl(680, 480),
            'minutes' => fake()->numberBetween(1,10),
            'user_id' => $user_id[0],
            'category_id' => $category_id[0],
        ];
    }
}

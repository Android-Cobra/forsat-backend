<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' =>$this -> faker ->text(250),
            'question_id' => Question::all()->random()->id,
            'created_by' => User::all()->random()->id,
        ];
    }
}

<?php

namespace Pikepa\ContactMe\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Pikepa\ContactMe\Models\Message;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    protected static function newFactory()
    {
        return \Pikepa\ContactMe\database\factories\MessageFactory::new();
    }

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'group' => $this->faker->company,
            'subject' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }
}

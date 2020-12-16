<?php

namespace Pikepa\ContactMe\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Pikepa\ContactMe\Models\Message;
use Pikepa\ContactMe\Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_create_a_post()
    {
        $this->withoutExceptionHandling();
        // To make sure we don't start with a Post
        $this->assertCount(0, Message::all());

        $response = $this->post(route('message.store'), [
            'name' => 'Peter Pike',
            'email' => 'pikepeter@thepikes.net',
            'group' => 'Support',
            'subject' => 'This is a fake subject',
            'content' => 'This is fake content',
        ]);
        $this->assertDatabaseHas('messages', ['email' => 'pikepeter@thepikes.net']);

        $message = Message::first();

        //     $this->assertEquals('Peter Pike', $message->name);
        //     $this->assertEquals('pikepeter@thepikes.net', $message->subject);
        $response->assertRedirect(route('message.show', $message));
    }
}

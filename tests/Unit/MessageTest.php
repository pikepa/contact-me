<?php

namespace Pikepa\ContactMe\tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Pikepa\ContactMe\Models\Message;
use Pikepa\ContactMe\Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_message_has_a_subject()
    {
        $message = Message::factory()->create(['subject' =>'Fake Subject']);
        $this->assertEquals('Fake Subject', $message->subject);
    }

    /** @test */
    public function it_has_a_path()
    {
     //   $this->withoutExceptionHandling();
        $message = Message::factory()->create();
        $this->assertEquals('/message/'.$message->id, $message->path());
    }

    /** @test */
    public function it_requires_a_name()
    {
        $this->post('/messages',['name' => ''])->assertSessionHasErrors('name');
    }

    /** @test */
    public function it_requires_an_email()
    {
        $this->post('/messages', ['email' => ''])->assertSessionHasErrors('email');
    }

    /** @test */
    public function it_requires_a_valid_email()
    {
        $this->post('/messages', ['email' => 'pikepeter'])->assertSessionHasErrors('email');
    }

    /** @test */
    public function it_requires_a_subject()
    {
        $this->post('/messages', ['subject' => 'pet'])->assertSessionHasErrors('subject');
    }

    /** @test */
    public function it_requires_content()
    {
        $this->post('/messages', ['content' => ''])->assertSessionHasErrors('content');
    }

}

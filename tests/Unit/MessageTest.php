<?php

namespace Pikepa\ContactMe\tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Pikepa\ContactMe\Models\Message;
use Pikepa\ContactMe\Tests\TestCase;

class MessageTests extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_message_has_a_subject()
    {
        $message = Message::factory()->create(['subject' =>'Fake Subject']);
        $this->assertEquals('Fake Subject', $message->subject);
    }

    // /** @test */
    // public function it_has_a_path()
    // {
    //     $this->withoutExceptionHandling();
    //     $message = Message::factory()->create();
    //     $this->assertEquals('/message/'.$message->id, $message->path());
    // }
    // /** @test */
    // public function it_requires_a_name()
    // {
    //     $this->message(['name' => ''])->assertSessionHasErrors('name');
    // }
    // /** @test */
    // public function it_requires_an_email()
    // {
    //     $this->message(['email' => ''])->assertSessionHasErrors('email');
    // }
    // /** @test */
    // public function it_requires_a_valid_email()
    // {
    //     $this->message(['email' => 'pikepeter'])->assertSessionHasErrors('email');
    // }
    // /** @test */
    // public function it_requires_a_subject()
    // {
    //     $this->message(['subject' => 'pet'])->assertSessionHasErrors('subject');
    // }
    // /** @test */
    // public function it_requires_content()
    // {
    //     $this->message(['content' => ''])->assertSessionHasErrors('content');
    // }
    // /** @test */
    // public function it_requires_my_question()
    // {
    //     $this->message(['my_question' => ''])->assertSessionHasErrors('my_question');
    // }

    // /* Setup for Repetitive Attribute Testing */
    // protected function message($attributes =[])
    // {
    //     $this->withExceptionHandling();
    //     return $this->post('/message',$this->validFields($attributes));
    // }

    // protected function validFields($overrides = [])
    // {
    // return array_merge([
    //         'name' =>  'Peter Pike',
    //         'email' =>  'pikepeter@safemail.com',
    //         'subject' =>  'This is the subject of the email',
    //         'content' =>  'This is the content of the email',
    //         ],$overrides);
    // }
}

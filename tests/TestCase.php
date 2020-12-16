<?php

namespace Pikepa\ContactMe\Tests;

use Pikepa\ContactMe\ContactMeServiceProvider;

 class TestCase extends \Orchestra\Testbench\TestCase
 {
     public function setUp(): void
     {
         parent::setUp();
         // additional setup
     }

     protected function getPackageProviders($app)
     {
         return [
             ContactMeServiceProvider::class,
         ];
     }

     protected function getEnvironmentSetUp($app)
     {
         // import the CreateMessagesTable class from the migration
         include_once __DIR__.'/../database/migrations/create_messages_table.php.stub';

         // run the up() method of that migration class
         (new \CreateMessagesTable)->up();
     }
 }

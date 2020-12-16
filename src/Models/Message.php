<?php

namespace Pikepa\ContactMe\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pikepa\ContactMe\database\factories\MessageFactory;

class Message extends Model
{
    use HasFactory;

    protected $dates = ['created_at'];

    protected $guarded = [];

    protected static function newFactory()
    {
        return MessageFactory::new();
    }

    /**
     * Format the message created date.
     */
    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('M j, Y');
    }

    /**
     * Format the message has a path.
     */
    public function path()
    {
        return "/message/{$this->id}";
    }
}

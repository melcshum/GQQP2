<?php

namespace App\Events\Lms\fillQuestion;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class fillQuestionUpdated
{
    use SerializesModels;

    public $mcQuestion;

    public function __construct($fillQuestion)
    {
        $this->fillQuestion = $fillQuestion;
    }
}

<?php

namespace App\Events\Lms\Question;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QuestionReactivated
{
    use SerializesModels;

    public $question;

    public function __construct($question)
    {
        $this->question = $question;
    }
}

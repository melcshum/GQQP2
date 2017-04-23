<?php

namespace App\Events\Lms\arrayQuestion;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class arrayQuestionRestored
{
    use SerializesModels;

    public $arrayQuestion;

    public function __construct($arrayQuestion)
    {
        $this->arrayQuestion = $arrayQuestion;
    }
}

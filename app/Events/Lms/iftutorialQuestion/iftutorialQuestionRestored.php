<?php

namespace App\Events\Lms\iftutorialQuestion;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class iftutorialQuestionRestored
{
    use SerializesModels;

    public $iftutorialQuestion;

    public function __construct($iftutorialQuestion)
    {
        $this->iftutorialQuestion = $iftutorialQuestion;
    }
}

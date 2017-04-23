<?php

namespace App\Events\Lms\arrayQuestion;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class arrayQuestionDeleted
{
    use  SerializesModels;


    /**
     * @var
     */
    public $arrayQuestion;

    /**
     * @param $question
     */
    public function __construct($arrayQuestion)
    {
        $this->arrayQuestion = $arrayQuestion;
    }

}

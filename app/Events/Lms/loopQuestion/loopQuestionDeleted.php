<?php

namespace App\Events\Lms\loopQuestion;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class loopQuestionDeleted
{
    use  SerializesModels;


    /**
     * @var
     */
    public $loopQuestion;

    /**
     * @param $question
     */
    public function __construct($loopQuestion)
    {
        $this->loopQuestion = $loopQuestion;
    }

}

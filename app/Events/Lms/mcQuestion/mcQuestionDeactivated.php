<?php

namespace App\Events\Lms\mcQuestion;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class mcQuestionDeactivated
{
    use  SerializesModels;


    /**
     * @var
     */
    public $mcQuestion;

    /**
     * @param $question
     */
    public function __construct($mcQuestion)
    {
        $this->mcQuestion = $mcQuestion;
    }

}

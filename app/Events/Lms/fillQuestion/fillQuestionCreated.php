<?php

namespace App\Events\Lms\fillQuestion;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class fillQuestionCreated
{
    use  SerializesModels;


    /**
     * @var
     */
    public $fillQuestion;

    /**
     * @param $question
     */
    public function __construct($fillQuestion)
    {
        $this->fillQuestion = $fillQuestion;
    }

}

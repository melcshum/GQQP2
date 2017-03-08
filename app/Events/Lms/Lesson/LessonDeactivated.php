<?php

namespace App\Events\Lms\Lesson;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LessonDeactivated
{
    use  SerializesModels;
 

    /**
     * @var
     */
    public $lesson;

    /**
     * @param $course
     */
    public function __construct($lesson)
    {
        $this->lesson = $lesson;
    }

}

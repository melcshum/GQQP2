<?php

namespace App\Events\Lms\Course;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CourseDeactivated
{
    use  SerializesModels;
 

    /**
     * @var
     */
    public $course;

    /**
     * @param $course
     */
    public function __construct($course)
    {
        $this->course = $course;
    }

}

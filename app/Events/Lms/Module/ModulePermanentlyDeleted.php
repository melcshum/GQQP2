<?php

namespace App\Events\Lms\Module;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ModulePermanentlyDeleted
{
    use  SerializesModels;


    /**
     * @var
     */
    public $module;

    /**
     * @param $course
     */
    public function __construct($module)
    {
        $this->$module = $module;
    }

}

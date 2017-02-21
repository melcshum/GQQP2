<?php

namespace App\Events\Lms\Model;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ModelPermanentlyDeleted
{
    use SerializesModels;

    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
}

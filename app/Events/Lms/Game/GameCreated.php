<?php

namespace App\Events\Lms\Game;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GameCreated
{
    use  SerializesModels;
 

    /**
     * @var
     */
    public $game;

    /**
     * @param $game
     */
    public function __construct($game)
    {
        $this->game = $game;
    }

}

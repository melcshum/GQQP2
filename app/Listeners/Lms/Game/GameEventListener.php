<?php

namespace App\Listeners\Lms\Game;

/**
 * Class GameEventListener.
 */
class GameEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Game';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.games.created") '.$event->game->name,
            $event->game->id,
            'plus',
            'bg-green'
        );
    }
    
    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.games.updated") '.$event->game->name,
            $event->game->id,
            'save',
            'bg-aqua'
        );
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.games.deleted") '.$event->game->name,
            $event->game->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.games.restored") '.$event->game->name,
            $event->game->id,
            'refresh',
            'bg-aqua'
        );
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.games.permanently_deleted") '.$event->game->name,
            $event->game->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.games.changed_password") '.$event->game->name,
            $event->game->id,
            'lock',
            'bg-blue'
        );
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.games.deactivated") '.$event->game->name,
            $event->game->id,
            'times',
            'bg-yellow'
        );
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.games.reactivated") '.$event->game->name,
            $event->game->id,
            'check',
            'bg-green'
        );
    }

    

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
      
        $events->listen(
            \App\Events\Lms\Game\GameCreated::class,
            'App\Listeners\Lms\Game\GameEventListener@onCreated'
        );
        
         

        $events->listen(
            \App\Events\Lms\Game\GameUpdated::class,
            'App\Listeners\Lms\Game\GameEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\Game\GameDeleted::class,
            'App\Listeners\Lms\Game\GameEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\Game\GameRestored::class,
            'App\Listeners\Lms\Game\GameEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\Game\GamePermanentlyDeleted::class,
            'App\Listeners\Lms\Game\GameEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\Game\GamePasswordChanged::class,
            'App\Listeners\Lms\Game\GameEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\Game\GameDeactivated::class,
            'App\Listeners\Lms\Game\GameEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\Game\GameReactivated::class,
            'App\Listeners\Lms\Game\GameEventListener@onReactivated'
        ); 
    }
}

<?php

namespace App\Listeners\Lms\Model;

/**
 * Class ModelEventListener.
 */
class ModelEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Model';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.models.created") '.$event->model->name,
            $event->model->id,
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
            'trans("history.lms.models.updated") '.$event->model->name,
            $event->model->id,
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
            'trans("history.lms.models.deleted") '.$event->model->name,
            $event->model->id,
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
            'trans("history.lms.models.restored") '.$event->model->name,
            $event->model->id,
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
            'trans("history.lms.models.permanently_deleted") '.$event->model->name,
            $event->model->id,
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
            'trans("history.lms.models.changed_password") '.$event->model->name,
            $event->model->id,
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
            'trans("history.lms.models.deactivated") '.$event->model->name,
            $event->model->id,
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
            'trans("history.lms.models.reactivated") '.$event->model->name,
            $event->model->id,
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
            \App\Events\Lms\Model\ModelCreated::class,
            'App\Listeners\Lms\Model\ModelEventListener@onCreated'
        );
        
         

        $events->listen(
            \App\Events\Lms\Model\ModelUpdated::class,
            'App\Listeners\Lms\Model\ModelEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\Model\ModelDeleted::class,
            'App\Listeners\Lms\Model\ModelEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\Model\ModelRestored::class,
            'App\Listeners\Lms\Model\ModelEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\Model\ModelPermanentlyDeleted::class,
            'App\Listeners\Lms\Model\ModelEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\Model\ModelPasswordChanged::class,
            'App\Listeners\Lms\Model\ModelEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\Model\ModelDeactivated::class,
            'App\Listeners\Lms\Model\ModelEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\Model\ModelReactivated::class,
            'App\Listeners\Lms\Model\ModelEventListener@onReactivated'
        ); 
    }
}

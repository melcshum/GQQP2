<?php

namespace App\Listeners\Lms\Module;

/**
 * Class ModuleEventListener.
 */
class ModuleEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Module';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.modules.created") '.$event->module->name,
            $event->module->id,
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
            'trans("history.lms.modules.updated") '.$event->module->name,
            $event->module->id,
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
            'trans("history.lms.modules.deleted") '.$event->module->name,
            $event->module->id,
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
            'trans("history.lms.modules.restored") '.$event->module->name,
            $event->module->id,
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
            'trans("history.lms.modules.permanently_deleted") '.$event->module->name,
            $event->module->id,
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
            'trans("history.lms.modules.changed_password") '.$event->module->name,
            $event->module->id,
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
            'trans("history.lms.modules.deactivated") '.$event->module->name,
            $event->module->id,
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
            'trans("history.lms.modules.reactivated") '.$event->module->name,
            $event->module->id,
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
            \App\Events\Lms\Module\ModuleCreated::class,
            'App\Listeners\Lms\Module\ModuleEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Lms\Module\ModuleUpdated::class,
            'App\Listeners\Lms\Module\ModuleEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\Module\ModuleDeleted::class,
            'App\Listeners\Lms\Module\ModuleEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\Module\ModuleRestored::class,
            'App\Listeners\Lms\Module\ModuleEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\Module\ModulePermanentlyDeleted::class,
            'App\Listeners\Lms\Module\ModuleEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\Module\ModulePasswordChanged::class,
            'App\Listeners\Lms\Module\ModuleEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\Module\ModuleDeactivated::class,
            'App\Listeners\Lms\Module\ModuleEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\Module\ModuleReactivated::class,
            'App\Listeners\Lms\Module\ModuleEventListener@onReactivated'
        ); 
    }
}

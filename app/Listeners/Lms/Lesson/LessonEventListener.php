<?php

namespace App\Listeners\Lms\Lesson;

/**
 * Class LessonEventListener.
 */
class LessonEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Lesson';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.lessons.created") '.$event->lesson->name,
            $event->lesson->id,
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
            'trans("history.lms.lessons.updated") '.$event->lesson->name,
            $event->lesson->id,
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
            'trans("history.lms.lessons.deleted") '.$event->lesson->name,
            $event->lesson->id,
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
            'trans("history.lms.lessons.restored") '.$event->lesson->name,
            $event->lesson->id,
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
            'trans("history.lms.lessons.permanently_deleted") '.$event->lesson->name,
            $event->lesson->id,
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
            'trans("history.lms.lessons.changed_password") '.$event->lesson->name,
            $event->lesson->id,
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
            'trans("history.lms.lessons.deactivated") '.$event->lesson->name,
            $event->lesson->id,
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
            'trans("history.lms.lessons.reactivated") '.$event->lesson->name,
            $event->lesson->id,
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
            \App\Events\Lms\Lesson\LessonCreated::class,
            'App\Listeners\Lms\Lesson\LessonEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Lms\Lesson\LessonUpdated::class,
            'App\Listeners\Lms\Lesson\LessonEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\Lesson\LessonDeleted::class,
            'App\Listeners\Lms\Lesson\LessonEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\Lesson\LessonRestored::class,
            'App\Listeners\Lms\Lesson\LessonEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\Lesson\LessonPermanentlyDeleted::class,
            'App\Listeners\Lms\Lesson\LessonEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\Lesson\LessonPasswordChanged::class,
            'App\Listeners\Lms\Lesson\LessonEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\Lesson\LessonDeactivated::class,
            'App\Listeners\Lms\Lesson\LessonEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\Lesson\LessonReactivated::class,
            'App\Listeners\Lms\Lesson\LessonEventListener@onReactivated'
        ); 
    }
}

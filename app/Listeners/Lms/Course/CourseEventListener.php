<?php

namespace App\Listeners\Lms\Course;

/**
 * Class CourseEventListener.
 */
class CourseEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Course';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.courses.created") '.$event->course->name,
            $event->course->id,
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
            'trans("history.lms.courses.updated") '.$event->course->name,
            $event->course->id,
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
            'trans("history.lms.courses.deleted") '.$event->course->name,
            $event->course->id,
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
            'trans("history.lms.courses.restored") '.$event->course->name,
            $event->course->id,
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
            'trans("history.lms.courses.permanently_deleted") '.$event->course->name,
            $event->course->id,
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
            'trans("history.lms.courses.changed_password") '.$event->course->name,
            $event->course->id,
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
            'trans("history.lms.courses.deactivated") '.$event->course->name,
            $event->course->id,
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
            'trans("history.lms.courses.reactivated") '.$event->course->name,
            $event->course->id,
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
            \App\Events\Lms\Course\CourseCreated::class,
            'App\Listeners\Lms\Course\CourseEventListener@onCreated'
        );
        
         

        $events->listen(
            \App\Events\Lms\Course\CourseUpdated::class,
            'App\Listeners\Lms\Course\CourseEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\Course\CourseDeleted::class,
            'App\Listeners\Lms\Course\CourseEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\Course\CourseRestored::class,
            'App\Listeners\Lms\Course\CourseEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\Course\CoursePermanentlyDeleted::class,
            'App\Listeners\Lms\Course\CourseEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\Course\CoursePasswordChanged::class,
            'App\Listeners\Lms\Course\CourseEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\Course\CourseDeactivated::class,
            'App\Listeners\Lms\Course\CourseEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\Course\CourseReactivated::class,
            'App\Listeners\Lms\Course\CourseEventListener@onReactivated'
        ); 
    }
}

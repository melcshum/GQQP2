<?php

namespace App\Listeners\Lms\Question;

/**
 * Class QuestionEventListener.
 */
class QuestionEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Question';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.questions.created") '.$event->question->name,
            $event->question->id,
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
            'trans("history.lms.questions.updated") '.$event->question->name,
            $event->question->id,
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
            'trans("history.lms.questions.deleted") '.$event->question->name,
            $event->question->id,
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
            'trans("history.lms.questions.restored") '.$event->question->name,
            $event->question->id,
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
            'trans("history.lms.questions.permanently_deleted") '.$event->question->name,
            $event->question->id,
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
            'trans("history.lms.questions.changed_password") '.$event->question->name,
            $event->question->id,
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
            'trans("history.lms.questions.deactivated") '.$event->question->name,
            $event->question->id,
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
            'trans("history.lms.questions.reactivated") '.$event->question->name,
            $event->question->id,
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
            \App\Events\Lms\Question\QuestionCreated::class,
            'App\Listeners\Lms\Question\QuestionEventListener@onCreated'
        );
        
         

        $events->listen(
            \App\Events\Lms\Question\QuestionUpdated::class,
            'App\Listeners\Lms\Question\QuestionEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\Question\QuestionDeleted::class,
            'App\Listeners\Lms\Question\QuestionEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\Question\QuestionRestored::class,
            'App\Listeners\Lms\Question\QuestionEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\Question\QuestionPermanentlyDeleted::class,
            'App\Listeners\Lms\Question\QuestionEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\Question\QuestionPasswordChanged::class,
            'App\Listeners\Lms\Question\QuestionEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\Question\QuestionDeactivated::class,
            'App\Listeners\Lms\Question\QuestionEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\Question\QuestionReactivated::class,
            'App\Listeners\Lms\Question\QuestionEventListener@onReactivated'
        ); 
    }
}

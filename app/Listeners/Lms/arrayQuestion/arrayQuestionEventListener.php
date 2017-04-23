<?php

namespace App\Listeners\Lms\arrayQuestion;

/**
 * Class QuestionEventListener.
 */
class arrayQuestionEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'arrayQuestion';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.arrayQuestions.created") '.$event->arrayQuestion->name,
            $event->arrayQuestion->id,
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
            'trans("history.lms.arrayQuestions.updated") '.$event->arrayQuestion->name,
            $event->arrayQuestion->id,
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
            'trans("history.lms.arrayQuestions.deleted") '.$event->arrayQuestion->name,
            $event->arrayQuestion->id,
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
            'trans("history.lms.arrayQuestions.restored") '.$event->arrayQuestion->name,
            $event->arrayQuestion->id,
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
            'trans("history.lms.arrayQuestions.permanently_deleted") '.$event->arrayQuestion->name,
            $event->arrayQuestion->id,
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
            'trans("history.lms.arrayQuestions.changed_password") '.$event->arrayQuestion->name,
            $event->arrayQuestion->id,
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
            'trans("history.lms.arrayQuestions.deactivated") '.$event->arrayQuestion->name,
            $event->arrayQuestion->id,
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
            'trans("history.lms.arrayQuestions.reactivated") '.$event->arrayQuestion->name,
            $event->arrayQuestion->id,
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
            \App\Events\Lms\arrayQuestion\arrayQuestionCreated::class,
            'App\Listeners\Lms\arrayQuestion\arrayQuestionEventListener@onCreated'
        );
        
         

        $events->listen(
            \App\Events\Lms\arrayQuestion\arrayQuestionUpdated::class,
            'App\Listeners\Lms\arrayQuestion\arrayQuestionEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\arrayQuestion\arrayQuestionDeleted::class,
            'App\Listeners\Lms\arrayQuestion\arrayQuestionEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\arrayQuestion\arrayQuestionRestored::class,
            'App\Listeners\Lms\arrayQuestion\arrayQuestionEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\arrayQuestion\arrayQuestionPermanentlyDeleted::class,
            'App\Listeners\Lms\arrayQuestion\arrayQuestionEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\arrayQuestion\arrayQuestionPasswordChanged::class,
            'App\Listeners\Lms\arrayQuestion\arrayQuestionEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\arrayQuestion\arrayQuestionDeactivated::class,
            'App\Listeners\Lms\arrayQuestion\arrayQuestionEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\arrayQuestion\arrayQuestionReactivated::class,
            'App\Listeners\Lms\arrayQuestion\arrayQuestionEventListener@onReactivated'
        ); 
    }
}

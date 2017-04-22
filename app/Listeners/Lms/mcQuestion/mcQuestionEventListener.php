<?php

namespace App\Listeners\Lms\mcQuestion;

/**
 * Class QuestionEventListener.
 */
class mcQuestionEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'mcQuestion';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.mcQuestions.created") '.$event->mcQuestion->name,
            $event->mcQuestion->id,
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
            'trans("history.lms.mcQuestions.updated") '.$event->mcQuestion->name,
            $event->mcQuestion->id,
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
            'trans("history.lms.mcQuestions.deleted") '.$event->mcQuestion->name,
            $event->mcQuestion->id,
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
            'trans("history.lms.mcQuestions.restored") '.$event->mcQuestion->name,
            $event->mcQuestion->id,
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
            'trans("history.lms.mcQuestions.permanently_deleted") '.$event->mcQuestion->name,
            $event->mcQuestion->id,
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
            'trans("history.lms.mcQuestions.changed_password") '.$event->mcQuestion->name,
            $event->mcQuestion->id,
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
            'trans("history.lms.mcQuestions.deactivated") '.$event->mcQuestion->name,
            $event->mcQuestion->id,
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
            'trans("history.lms.mcQuestions.reactivated") '.$event->mcQuestion->name,
            $event->mcQuestion->id,
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
            \App\Events\Lms\mcQuestion\mcQuestionCreated::class,
            'App\Listeners\Lms\mcQuestion\mcQuestionEventListener@onCreated'
        );
        
         

        $events->listen(
            \App\Events\Lms\mcQuestion\mcQuestionUpdated::class,
            'App\Listeners\Lms\mcQuestion\mcQuestionEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\mcQuestion\mcQuestionDeleted::class,
            'App\Listeners\Lms\mcQuestion\mcQuestionEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\mcQuestion\mcQuestionRestored::class,
            'App\Listeners\Lms\mcQuestion\mcQuestionEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\mcQuestion\mcQuestionPermanentlyDeleted::class,
            'App\Listeners\Lms\mcQuestion\mcQuestionEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\mcQuestion\mcQuestionPasswordChanged::class,
            'App\Listeners\Lms\mcQuestion\mcQuestionEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\mcQuestion\mcQuestionDeactivated::class,
            'App\Listeners\Lms\mcQuestion\mcQuestionEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\mcQuestion\mcQuestionReactivated::class,
            'App\Listeners\Lms\mcQuestion\mcQuestionEventListener@onReactivated'
        ); 
    }
}

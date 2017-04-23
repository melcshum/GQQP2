<?php

namespace App\Listeners\Lms\iftutorialQuestion;

/**
 * Class QuestionEventListener.
 */
class iftutorialQuestionEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'iftutorialQuestion';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.iftutorialQuestions.created") '.$event->iftutorialQuestion->name,
            $event->iftutorialQuestion->id,
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
            'trans("history.lms.iftutorialQuestions.updated") '.$event->iftutorialQuestion->name,
            $event->iftutorialQuestion->id,
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
            'trans("history.lms.iftutorialQuestions.deleted") '.$event->iftutorialQuestion->name,
            $event->iftutorialQuestion->id,
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
            'trans("history.lms.iftutorialQuestions.restored") '.$event->iftutorialQuestion->name,
            $event->iftutorialQuestion->id,
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
            'trans("history.lms.iftutorialQuestions.permanently_deleted") '.$event->iftutorialQuestion->name,
            $event->iftutorialQuestion->id,
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
            'trans("history.lms.iftutorialQuestions.changed_password") '.$event->iftutorialQuestion->name,
            $event->iftutorialQuestion->id,
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
            'trans("history.lms.iftutorialQuestions.deactivated") '.$event->iftutorialQuestion->name,
            $event->iftutorialQuestion->id,
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
            'trans("history.lms.iftutorialQuestions.reactivated") '.$event->iftutorialQuestion->name,
            $event->iftutorialQuestion->id,
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
            \App\Events\Lms\iftutorialQuestion\iftutorialQuestionCreated::class,
            'App\Listeners\Lms\iftutorialQuestion\iftutorialQuestionEventListener@onCreated'
        );
        
         

        $events->listen(
            \App\Events\Lms\iftutorialQuestion\iftutorialQuestionUpdated::class,
            'App\Listeners\Lms\iftutorialQuestion\iftutorialQuestionEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\iftutorialQuestion\iftutorialQuestionDeleted::class,
            'App\Listeners\Lms\iftutorialQuestion\iftutorialQuestionEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\iftutorialQuestion\iftutorialQuestionRestored::class,
            'App\Listeners\Lms\iftutorialQuestion\iftutorialQuestionEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\iftutorialQuestion\iftutorialQuestionPermanentlyDeleted::class,
            'App\Listeners\Lms\iftutorialQuestion\iftutorialQuestionEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\iftutorialQuestion\iftutorialQuestionPasswordChanged::class,
            'App\Listeners\Lms\iftutorialQuestion\iftutorialQuestionEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\iftutorialQuestion\iftutorialQuestionDeactivated::class,
            'App\Listeners\Lms\iftutorialQuestion\iftutorialQuestionEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\iftutorialQuestion\iftutorialQuestionReactivated::class,
            'App\Listeners\Lms\iftutorialQuestion\iftutorialQuestionEventListener@onReactivated'
        ); 
    }
}

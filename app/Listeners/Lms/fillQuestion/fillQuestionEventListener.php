<?php

namespace App\Listeners\Lms\fillQuestion;

/**
 * Class QuestionEventListener.
 */
class fillQuestionEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'fillQuestion';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.fillQuestions.created") '.$event->fillQuestion->name,
            $event->fillQuestion->id,
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
            'trans("history.lms.fillQuestions.updated") '.$event->fillQuestion->name,
            $event->fillQuestion->id,
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
            'trans("history.lms.fillQuestions.deleted") '.$event->fillQuestion->name,
            $event->fillQuestion->id,
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
            'trans("history.lms.fillQuestions.restored") '.$event->fillQuestion->name,
            $event->fillQuestion->id,
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
            'trans("history.lms.fillQuestions.permanently_deleted") '.$event->fillQuestion->name,
            $event->fillQuestion->id,
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
            'trans("history.lms.fillQuestions.changed_password") '.$event->fillQuestion->name,
            $event->fillQuestion->id,
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
            'trans("history.lms.fillQuestions.deactivated") '.$event->fillQuestion->name,
            $event->fillQuestion->id,
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
            'trans("history.lms.fillQuestions.reactivated") '.$event->fillQuestion->name,
            $event->fillQuestion->id,
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
            \App\Events\Lms\fillQuestion\fillQuestionCreated::class,
            'App\Listeners\Lms\fillQuestion\fillQuestionEventListener@onCreated'
        );
        
         

        $events->listen(
            \App\Events\Lms\fillQuestion\fillQuestionUpdated::class,
            'App\Listeners\Lms\fillQuestion\fillQuestionEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\fillQuestion\fillQuestionDeleted::class,
            'App\Listeners\Lms\fillQuestion\fillQuestionEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\fillQuestion\fillQuestionRestored::class,
            'App\Listeners\Lms\fillQuestion\fillQuestionEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\fillQuestion\fillQuestionPermanentlyDeleted::class,
            'App\Listeners\Lms\fillQuestion\fillQuestionEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\fillQuestion\fillQuestionPasswordChanged::class,
            'App\Listeners\Lms\fillQuestion\fillQuestionEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\fillQuestion\fillQuestionDeactivated::class,
            'App\Listeners\Lms\fillQuestion\fillQuestionEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\fillQuestion\fillQuestionReactivated::class,
            'App\Listeners\Lms\fillQuestion\fillQuestionEventListener@onReactivated'
        ); 
    }
}

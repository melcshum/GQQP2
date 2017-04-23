<?php

namespace App\Listeners\Lms\loopQuestion;

/**
 * Class QuestionEventListener.
 */
class loopQuestionEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'loopQuestion';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.lms.loopQuestions.created") '.$event->loopQuestion->name,
            $event->loopQuestion->id,
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
            'trans("history.lms.loopQuestions.updated") '.$event->loopQuestion->name,
            $event->loopQuestion->id,
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
            'trans("history.lms.loopQuestions.deleted") '.$event->loopQuestion->name,
            $event->loopQuestion->id,
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
            'trans("history.lms.loopQuestions.restored") '.$event->loopQuestion->name,
            $event->loopQuestion->id,
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
            'trans("history.lms.loopQuestions.permanently_deleted") '.$event->loopQuestion->name,
            $event->loopQuestion->id,
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
            'trans("history.lms.loopQuestions.changed_password") '.$event->loopQuestion->name,
            $event->loopQuestion->id,
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
            'trans("history.lms.loopQuestions.deactivated") '.$event->loopQuestion->name,
            $event->loopQuestion->id,
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
            'trans("history.lms.loopQuestions.reactivated") '.$event->loopQuestion->name,
            $event->loopQuestion->id,
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
            \App\Events\Lms\loopQuestion\loopQuestionCreated::class,
            'App\Listeners\Lms\loopQuestion\loopQuestionEventListener@onCreated'
        );
        
         

        $events->listen(
            \App\Events\Lms\loopQuestion\loopQuestionUpdated::class,
            'App\Listeners\Lms\loopQuestion\loopQuestionEventListener@onUpdated'
        );
 
        $events->listen(
            \App\Events\Lms\loopQuestion\loopQuestionDeleted::class,
            'App\Listeners\Lms\loopQuestion\loopQuestionEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Lms\loopQuestion\loopQuestionRestored::class,
            'App\Listeners\Lms\loopQuestion\loopQuestionEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Lms\loopQuestion\loopQuestionPermanentlyDeleted::class,
            'App\Listeners\Lms\loopQuestion\loopQuestionEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Lms\loopQuestion\loopQuestionPasswordChanged::class,
            'App\Listeners\Lms\loopQuestion\loopQuestionEventListener@onPasswordChanged'
        );

        $events->listen(
            \App\Events\Lms\loopQuestion\loopQuestionDeactivated::class,
            'App\Listeners\Lms\loopQuestion\loopQuestionEventListener@onDeactivated'
        );
 
        $events->listen(
            \App\Events\Lms\loopQuestion\loopQuestionReactivated::class,
            'App\Listeners\Lms\loopQuestion\loopQuestionEventListener@onReactivated'
        ); 
    }
}

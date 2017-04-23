<?php

namespace App\Repositories\Lms\loopQuestion;

use App\Models\Lms\loopQuestion\loopQuestion;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

use App\Events\Lms\loopQuestion\loopQuestionCreated;
use App\Events\Lms\loopQuestion\loopQuestionDeleted;
use App\Events\Lms\loopQuestion\loopQuestionUpdated;
use App\Events\Lms\loopQuestion\loopQuestionRestored;
use App\Events\Lms\loopQuestion\loopQuestionPermanentlyDeleted;
use App\Events\Lms\loopQuestion\loopQuestionDeactivated;
use App\Events\Lms\loopQuestion\loopQuestionReactivated;


/**
 * Class QuestionRepository.
 */
class loopQuestionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = loopQuestion::class;

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()

            ->select([
                config('lms.loopQuestions_table').'.id',
                config('lms.loopQuestions_table').'.name',
                config('lms.loopQuestions_table').'.question_type',
                config('lms.loopQuestions_table').'.tutquestion_level',
                config('lms.loopQuestions_table').'.tutquestion',
                config('lms.loopQuestions_table').'.program',
                config('lms.loopQuestions_table').'.question_ans',
                config('lms.loopQuestions_table').'.mc_ans1',
                config('lms.loopQuestions_table').'.mc_ans2',
                config('lms.loopQuestions_table').'.mc_ans3',
                config('lms.loopQuestions_table').'.mc_ans4',
                config('lms.loopQuestions_table').'.photo',
                config('lms.loopQuestions_table').'.slug',
                config('lms.status').'.status',
                config('lms.loopQuestions_table').'.created_at',
                config('lms.loopQuestions_table').'.updated_at',
                config('lms.loopQuestions_table').'.deleted_at',
            ]);

        // soft deleted
        if ($trashed == 'true') {
            return $dataTableQuery->onlyTrashed();
        }

        // active() is a scope on the QuestionScope trait
        return $dataTableQuery->active($status);
         
    }

    /**
     * @param Model $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $loopQuestion = $this->createLoopQuestionStub($data);

        DB::transaction(function () use ($loopQuestion, $data) {
            if (parent::save($loopQuestion)) {

                //User Created, Validate Roles
           //     if (! count($roles['assignees_roles'])) {
          //          throw new GeneralException(trans('exceptions.backend.access.users.role_needed_create'));
          //    }

                //Attach new roles
          //      $user->attachRoles($roles['assignees_roles']);

                //Send confirmation email if requested
          //    if (isset($data['confirmation_email']) && $user->confirmed == 0) {
          //          $user->notify(new UserNeedsConfirmation($user->confirmation_code));
          //      }

                event(new loopQuestionCreated($loopQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.loopQuestion.create_error'));
        });
    }

    /**
     * @param Model $question
     * @param array $input
     */
    public function update(Model $loopQuestion, array $input)
    {
        $data = $input['data'];


        $loopQuestion->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($loopQuestion, $data ) {
            if ( parent::update($loopQuestion, $data)) {

               event(new loopQuestionUpdated($loopQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }

     
    /**
     * @param Model $question
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $loopQuestion)
    {
 
        if (parent::delete($loopQuestion)) {
            event(new loopQuestionDeleted($loopQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.loopQuestions.delete_error'));
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $loopQuestion)
    {
        if (is_null($loopQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.loopQuestions.delete_first'));
        }

        DB::transaction(function () use ($loopQuestion) {
            if (parent::forceDelete($loopQuestion)) {
                event(new loopQuestionPermanentlyDeleted($loopQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.loopQuestions.delete_error'));
        });
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $loopQuestion)
    {
        if (is_null($loopQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.loopQuestions.cant_restore'));
        }

        if (parent::restore(($loopQuestion))) {
            event(new loopQuestionRestored($loopQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.loopQuestions.restore_error'));
    }

    /**
     * @param Model $question
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $loopQuestion, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $loopQuestion->status = $status;

        switch ($status) {
            case 0:
                event(new loopQuestionDeactivated($loopQuestion));
            break;

            case 1:
                event(new loopQuestionReactivated($loopQuestion));
            break;
        }

        if (parent::save($loopQuestion)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.loopQuestions.mark_error'));
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createLoopQuestionStub($input)
    {
        $loopQuestion = self::MODEL;
        $loopQuestion = new $loopQuestion();
        $loopQuestion->name = $input['name'];
        $loopQuestion->question_type = $input['question_type'];
        $loopQuestion->tutquestion_level = $input['tutquestion_level'];
        $loopQuestion->tutquestion = $input['tutquestion'];
        $loopQuestion->program = $input['program'];
        $loopQuestion->question_ans = $input['question_ans'];
        $loopQuestion->mc_ans1 = $input['mc_ans1'];
        $loopQuestion->mc_ans2 = $input['mc_ans2'];
        $loopQuestion->mc_ans3 = $input['mc_ans3'];
        $loopQuestion->mc_ans4 = $input['mc_ans4'];
        $loopQuestion->photo = $input['photo'];
        $loopQuestion->slug =  $input['slug'];
        $loopQuestion->status = isset($input['status']) ? 1 : 0;
        return $loopQuestion;
    }


}

<?php

namespace App\Repositories\Lms\arrayQuestion;

use App\Models\Lms\arrayQuestion\arrayQuestion;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

use App\Events\Lms\arrayQuestion\arrayQuestionCreated;
use App\Events\Lms\arrayQuestion\arrayQuestionDeleted;
use App\Events\Lms\arrayQuestion\arrayQuestionUpdated;
use App\Events\Lms\arrayQuestion\arrayQuestionRestored;
use App\Events\Lms\arrayQuestion\arrayQuestionPermanentlyDeleted;
use App\Events\Lms\arrayQuestion\arrayQuestionDeactivated;
use App\Events\Lms\arrayQuestion\arrayQuestionReactivated;


/**
 * Class QuestionRepository.
 */
class arrayQuestionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = arrayQuestion::class;

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
                config('lms.arrayQuestions_table').'.id',
                config('lms.arrayQuestions_table').'.name',
                config('lms.arrayQuestions_table').'.question_type',
                config('lms.arrayQuestions_table').'.tutquestion_level',
                config('lms.arrayQuestions_table').'.tutquestion',
                config('lms.arrayQuestions_table').'.program',
                config('lms.arrayQuestions_table').'.question_ans',
                config('lms.arrayQuestions_table').'.mc_ans1',
                config('lms.arrayQuestions_table').'.mc_ans2',
                config('lms.arrayQuestions_table').'.mc_ans3',
                config('lms.arrayQuestions_table').'.mc_ans4',
                config('lms.arrayQuestions_table').'.slug',
                config('lms.status').'.status',
                config('lms.arrayQuestions_table').'.created_at',
                config('lms.arrayQuestions_table').'.updated_at',
                config('lms.arrayQuestions_table').'.deleted_at',
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

        $arrayQuestion = $this->createarrayQuestionStub($data);

        DB::transaction(function () use ($arrayQuestion, $data) {
            if (parent::save($arrayQuestion)) {

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

                event(new arrayQuestionCreated($arrayQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.arrayQuestion.create_error'));
        });
    }

    /**
     * @param Model $question
     * @param array $input
     */
    public function update(Model $arrayQuestion, array $input)
    {
        $data = $input['data'];


        $arrayQuestion->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($arrayQuestion, $data ) {
            if ( parent::update($arrayQuestion, $data)) {

               event(new arrayQuestionUpdated($arrayQuestion));

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
    public function delete(Model $arrayQuestion)
    {
 
        if (parent::delete($arrayQuestion)) {
            event(new arrayQuestionDeleted($arrayQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.arrayQuestions.delete_error'));
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $arrayQuestion)
    {
        if (is_null($arrayQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.arrayQuestions.delete_first'));
        }

        DB::transaction(function () use ($arrayQuestion) {
            if (parent::forceDelete($arrayQuestion)) {
                event(new arrayQuestionPermanentlyDeleted($arrayQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.arrayQuestions.delete_error'));
        });
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $arrayQuestion)
    {
        if (is_null($arrayQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.arrayQuestions.cant_restore'));
        }

        if (parent::restore(($arrayQuestion))) {
            event(new arrayQuestionRestored($arrayQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.arrayQuestions.restore_error'));
    }

    /**
     * @param Model $question
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $arrayQuestion, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $arrayQuestion->status = $status;

        switch ($status) {
            case 0:
                event(new arrayQuestionDeactivated($arrayQuestion));
            break;

            case 1:
                event(new arrayQuestionReactivated($arrayQuestion));
            break;
        }

        if (parent::save($arrayQuestion)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.arrayQuestions.mark_error'));
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createarrayQuestionStub($input)
    {
        $arrayQuestion = self::MODEL;
        $arrayQuestion = new $arrayQuestion();
        $arrayQuestion->name = $input['name'];
        $arrayQuestion->question_type = $input['question_type'];
        $arrayQuestion->tutquestion_level = $input['tutquestion_level'];
        $arrayQuestion->tutquestion = $input['tutquestion'];
        $arrayQuestion->program = $input['program'];
        $arrayQuestion->question_ans = $input['question_ans'];
        $arrayQuestion->mc_ans1 = $input['mc_ans1'];
        $arrayQuestion->mc_ans2 = $input['mc_ans2'];
        $arrayQuestion->mc_ans3 = $input['mc_ans3'];
        $arrayQuestion->mc_ans4 = $input['mc_ans4'];
        $arrayQuestion->photo = $input['photo'];
        $arrayQuestion->slug =  $input['slug'];
        $arrayQuestion->status = isset($input['status']) ? 1 : 0;
        return $arrayQuestion;
    }


}

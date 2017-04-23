<?php

namespace App\Repositories\Lms\iftutorialQuestion;

use App\Models\Lms\iftutorialQuestion\iftutorialQuestion;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

use App\Events\Lms\iftutorialQuestion\iftutorialQuestionCreated;
use App\Events\Lms\iftutorialQuestion\iftutorialQuestionDeleted;
use App\Events\Lms\iftutorialQuestion\iftutorialQuestionUpdated;
use App\Events\Lms\iftutorialQuestion\iftutorialQuestionRestored;
use App\Events\Lms\iftutorialQuestion\iftutorialQuestionPermanentlyDeleted;
use App\Events\Lms\iftutorialQuestion\iftutorialQuestionDeactivated;
use App\Events\Lms\iftutorialQuestion\iftutorialQuestionReactivated;


/**
 * Class QuestionRepository.
 */
class iftutorialQuestionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = iftutorialQuestion::class;

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
                config('lms.iftutorialQuestions_table').'.id',
                config('lms.iftutorialQuestions_table').'.name',
                config('lms.iftutorialQuestions_table').'.question_type',
                config('lms.iftutorialQuestions_table').'.tutquestion_level',
                config('lms.iftutorialQuestions_table').'.tutquestion',
                config('lms.iftutorialQuestions_table').'.program',
                config('lms.iftutorialQuestions_table').'.question_ans',
                config('lms.iftutorialQuestions_table').'.mc_ans1',
                config('lms.iftutorialQuestions_table').'.mc_ans2',
                config('lms.iftutorialQuestions_table').'.mc_ans3',
                config('lms.iftutorialQuestions_table').'.mc_ans4',
                config('lms.iftutorialQuestions_table').'.photo',
                config('lms.iftutorialQuestions_table').'.slug',
                config('lms.status').'.status',
                config('lms.iftutorialQuestions_table').'.created_at',
                config('lms.iftutorialQuestions_table').'.updated_at',
                config('lms.iftutorialQuestions_table').'.deleted_at',
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

        $iftutorialQuestion = $this->createiftutorialQuestionStub($data);

        DB::transaction(function () use ($iftutorialQuestion, $data) {
            if (parent::save($iftutorialQuestion)) {

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

                event(new iftutorialQuestionCreated($iftutorialQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.iftutorialQuestion.create_error'));
        });
    }

    /**
     * @param Model $question
     * @param array $input
     */
    public function update(Model $iftutorialQuestion, array $input)
    {
        $data = $input['data'];


        $iftutorialQuestion->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($iftutorialQuestion, $data ) {
            if ( parent::update($iftutorialQuestion, $data)) {

               event(new iftutorialQuestionUpdated($iftutorialQuestion));

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
    public function delete(Model $iftutorialQuestion)
    {
 
        if (parent::delete($iftutorialQuestion)) {
            event(new iftutorialQuestionDeleted($iftutorialQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.iftutorialQuestions.delete_error'));
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $iftutorialQuestion)
    {
        if (is_null($iftutorialQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.iftutorialQuestions.delete_first'));
        }

        DB::transaction(function () use ($iftutorialQuestion) {
            if (parent::forceDelete($iftutorialQuestion)) {
                event(new iftutorialQuestionPermanentlyDeleted($iftutorialQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.iftutorialQuestions.delete_error'));
        });
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $iftutorialQuestion)
    {
        if (is_null($iftutorialQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.iftutorialQuestions.cant_restore'));
        }

        if (parent::restore(($iftutorialQuestion))) {
            event(new iftutorialQuestionRestored($iftutorialQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.iftutorialQuestions.restore_error'));
    }

    /**
     * @param Model $question
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $iftutorialQuestion, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $iftutorialQuestion->status = $status;

        switch ($status) {
            case 0:
                event(new iftutorialQuestionDeactivated($iftutorialQuestion));
            break;

            case 1:
                event(new iftutorialQuestionReactivated($iftutorialQuestion));
            break;
        }

        if (parent::save($iftutorialQuestion)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.iftutorialQuestions.mark_error'));
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createiftutorialQuestionStub($input)
    {
        $iftutorialQuestion = self::MODEL;
        $iftutorialQuestion = new $iftutorialQuestion();
        $iftutorialQuestion->name = $input['name'];
        $iftutorialQuestion->question_type = $input['question_type'];
        $iftutorialQuestion->question_level = $input['tutquestion_level'];
        $iftutorialQuestion->question = $input['tutquestion'];
        $iftutorialQuestion->program = $input['program'];
        $iftutorialQuestion->question_ans = $input['question_ans'];
        $iftutorialQuestion->mc_ans1 = $input['mc_ans1'];
        $iftutorialQuestion->mc_ans2 = $input['mc_ans2'];
        $iftutorialQuestion->mc_ans3 = $input['mc_ans3'];
        $iftutorialQuestion->mc_ans4 = $input['mc_ans4'];
        $iftutorialQuestion->photo = $input['photo'];
        $iftutorialQuestion->slug =  $input['slug'];
        $iftutorialQuestion->status = isset($input['status']) ? 1 : 0;
        return $iftutorialQuestion;
    }


}

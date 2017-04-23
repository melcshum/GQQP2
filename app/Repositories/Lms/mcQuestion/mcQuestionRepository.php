<?php

namespace App\Repositories\Lms\mcQuestion;

use App\Models\Lms\mcQuestion\mcQuestion;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

use App\Events\Lms\mcQuestion\mcQuestionCreated;
use App\Events\Lms\mcQuestion\mcQuestionDeleted;
use App\Events\Lms\mcQuestion\mcQuestionUpdated;
use App\Events\Lms\mcQuestion\mcQuestionRestored;
use App\Events\Lms\mcQuestion\mcQuestionPermanentlyDeleted;
use App\Events\Lms\mcQuestion\mcQuestionDeactivated;
use App\Events\Lms\mcQuestion\mcQuestionReactivated;


/**
 * Class QuestionRepository.
 */
class mcQuestionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = mcQuestion::class;

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
                config('lms.mcQuestions_table').'.id',
                config('lms.mcQuestions_table').'.name',
                config('lms.mcQuestions_table').'.question_type',
                config('lms.mcQuestions_table').'.question_level',
                config('lms.mcQuestions_table').'.question',
                config('lms.mcQuestions_table').'.program',
                config('lms.mcQuestions_table').'.question_ans',
                config('lms.mcQuestions_table').'.mc_ans1',
                config('lms.mcQuestions_table').'.mc_ans2',
                config('lms.mcQuestions_table').'.mc_ans3',
                config('lms.mcQuestions_table').'.mc_ans4',
                config('lms.mcQuestions_table').'.knowledge',
                config('lms.mcQuestions_table').'.gold',
                config('lms.mcQuestions_table').'.time',
                config('lms.mcQuestions_table').'.hint',
                config('lms.mcQuestions_table').'.photo',
                config('lms.mcQuestions_table').'.slug',
                config('lms.status').'.status',
                config('lms.mcQuestions_table').'.created_at',
                config('lms.mcQuestions_table').'.updated_at',
                config('lms.mcQuestions_table').'.deleted_at',
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

        $mcQuestion = $this->createMcQuestionStub($data);

        DB::transaction(function () use ($mcQuestion, $data) {
            if (parent::save($mcQuestion)) {

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

                event(new mcQuestionCreated($mcQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.mcQuestion.create_error'));
        });
    }

    /**
     * @param Model $question
     * @param array $input
     */
    public function update(Model $mcQuestion, array $input)
    {
        $data = $input['data'];


        $mcQuestion->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($mcQuestion, $data ) {
            if ( parent::update($mcQuestion, $data)) {

               event(new mcQuestionUpdated($mcQuestion));

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
    public function delete(Model $mcQuestion)
    {
 
        if (parent::delete($mcQuestion)) {
            event(new mcQuestionDeleted($mcQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.mcQuestions.delete_error'));
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $mcQuestion)
    {
        if (is_null($mcQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.mcQuestions.delete_first'));
        }

        DB::transaction(function () use ($mcQuestion) {
            if (parent::forceDelete($mcQuestion)) {
                event(new mcQuestionPermanentlyDeleted($mcQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.mcQuestions.delete_error'));
        });
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $mcQuestion)
    {
        if (is_null($mcQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.mcQuestions.cant_restore'));
        }

        if (parent::restore(($mcQuestion))) {
            event(new mcQuestionRestored($mcQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.mcQuestions.restore_error'));
    }

    /**
     * @param Model $question
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $mcQuestion, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $mcQuestion->status = $status;

        switch ($status) {
            case 0:
                event(new mcQuestionDeactivated($mcQuestion));
            break;

            case 1:
                event(new mcQuestionReactivated($mcQuestion));
            break;
        }

        if (parent::save($mcQuestion)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.mcQuestions.mark_error'));
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createMcQuestionStub($input)
    {
        $mcQuestion = self::MODEL;
        $mcQuestion = new $mcQuestion();
        $mcQuestion->name = $input['name'];
        $mcQuestion->question_type = $input['question_type'];
        $mcQuestion->question_level = $input['question_level'];
        $mcQuestion->question = $input['question'];
        $mcQuestion->program = $input['program'];
        $mcQuestion->question_ans = $input['question_ans'];
        $mcQuestion->mc_ans1 = $input['mc_ans1'];
        $mcQuestion->mc_ans2 = $input['mc_ans2'];
        $mcQuestion->mc_ans3 = $input['mc_ans3'];
        $mcQuestion->mc_ans4 = $input['mc_ans4'];
        $mcQuestion->knowledge = $input['knowledge'];
        $mcQuestion->gold = $input['gold'];
        $mcQuestion->time = $input['time'];
        $mcQuestion->hint = $input['hint'];
        $mcQuestion->photo = $input['photo'];
        $mcQuestion->slug =  $input['slug'];
        $mcQuestion->status = isset($input['status']) ? 1 : 0;
        return $mcQuestion;
    }


}

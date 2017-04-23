<?php

namespace App\Repositories\Lms\fillQuestion;

use App\Models\Lms\fillQuestion\fillQuestion;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

use App\Events\Lms\fillQuestion\fillQuestionCreated;
use App\Events\Lms\fillQuestion\fillQuestionDeleted;
use App\Events\Lms\fillQuestion\fillQuestionUpdated;
use App\Events\Lms\fillQuestion\fillQuestionRestored;
use App\Events\Lms\fillQuestion\fillQuestionPermanentlyDeleted;
use App\Events\Lms\fillQuestion\fillQuestionDeactivated;
use App\Events\Lms\fillQuestion\fillQuestionReactivated;


/**
 * Class QuestionRepository.
 */
class fillQuestionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = fillQuestion::class;

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
                config('lms.fillQuestions_table').'.id',
                config('lms.fillQuestions_table').'.name',
                config('lms.fillQuestions_table').'.question_type',
                config('lms.fillQuestions_table').'.question_level',
                config('lms.fillQuestions_table').'.question',
                config('lms.fillQuestions_table').'.program',
                config('lms.fillQuestions_table').'.question_ans',
                config('lms.fillQuestions_table').'.ans1',
                config('lms.fillQuestions_table').'.ans2',
                config('lms.fillQuestions_table').'.ans3',
                config('lms.fillQuestions_table').'.ans4',
                config('lms.fillQuestions_table').'.ans5',
                config('lms.fillQuestions_table').'.knowledge',
                config('lms.fillQuestions_table').'.gold',
                config('lms.fillQuestions_table').'.time',
                config('lms.fillQuestions_table').'.hint',
                config('lms.fillQuestions_table').'.photo',
                config('lms.fillQuestions_table').'.slug',
                config('lms.status').'.status',
                config('lms.fillQuestions_table').'.created_at',
                config('lms.fillQuestions_table').'.updated_at',
                config('lms.fillQuestions_table').'.deleted_at',
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

        $fillQuestion = $this->createFillQuestionStub($data);

        DB::transaction(function () use ($fillQuestion, $data) {
            if (parent::save($fillQuestion)) {

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

                event(new fillQuestionCreated($fillQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.fillQuestion.create_error'));
        });
    }

    /**
     * @param Model $question
     * @param array $input
     */
    public function update(Model $fillQuestion, array $input)
    {
        $data = $input['data'];


        $fillQuestion->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($fillQuestion, $data ) {
            if ( parent::update($fillQuestion, $data)) {

               event(new fillQuestionUpdated($fillQuestion));

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
    public function delete(Model $fillQuestion)
    {
 
        if (parent::delete($fillQuestion)) {
            event(new fillQuestionDeleted($fillQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.fillQuestions.delete_error'));
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $fillQuestion)
    {
        if (is_null($fillQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.fillQuestions.delete_first'));
        }

        DB::transaction(function () use ($fillQuestion) {
            if (parent::forceDelete($fillQuestion)) {
                event(new fillQuestionPermanentlyDeleted($fillQuestion));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.fillQuestions.delete_error'));
        });
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $fillQuestion)
    {
        if (is_null($fillQuestion->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.fillQuestions.cant_restore'));
        }

        if (parent::restore(($fillQuestion))) {
            event(new fillQuestionRestored($fillQuestion));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.fillQuestions.restore_error'));
    }

    /**
     * @param Model $question
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $fillQuestion, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $fillQuestion->status = $status;

        switch ($status) {
            case 0:
                event(new fillQuestionDeactivated($fillQuestion));
            break;

            case 1:
                event(new fillQuestionReactivated($fillQuestion));
            break;
        }

        if (parent::save($fillQuestion)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.fillQuestions.mark_error'));
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createFillQuestionStub($input)
    {
        $fillQuestion = self::MODEL;
        $fillQuestion = new $fillQuestion();
        $fillQuestion->name = $input['name'];
        $fillQuestion->question_type = $input['question_type'];
        $fillQuestion->question_level = $input['question_level'];
        $fillQuestion->question = $input['question'];
        $fillQuestion->program = $input['program'];
        $fillQuestion->question_ans = $input['question_ans'];
        $fillQuestion->ans1 = $input['ans1'];
        $fillQuestion->ans2 = $input['ans2'];
        $fillQuestion->ans3 = $input['ans3'];
        $fillQuestion->ans4 = $input['ans4'];
        $fillQuestion->ans4 = $input['ans5'];
        $fillQuestion->knowledge = $input['knowledge'];
        $fillQuestion->gold = $input['gold'];
        $fillQuestion->time = $input['time'];
        $fillQuestion->hint = $input['hint'];
        $fillQuestion->photo = $input['photo'];
        $fillQuestion->slug =  $input['slug'];
        $fillQuestion->status = isset($input['status']) ? 1 : 0;
        return $fillQuestion;
    }


}

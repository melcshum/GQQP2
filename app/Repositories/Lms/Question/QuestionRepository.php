<?php

namespace App\Repositories\Lms\Question;

use App\Models\Lms\Question\Question;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

use App\Events\Lms\Question\QuestionCreated;
use App\Events\Lms\Question\QuestionDeleted;
use App\Events\Lms\Question\QuestionUpdated;
use App\Events\Lms\Question\QuestionRestored;
use App\Events\Lms\Question\QuestionPermanentlyDeleted;
use App\Events\Lms\Question\QuestionDeactivated;
use App\Events\Lms\Question\QuestionReactivated;


/**
 * Class QuestionRepository.
 */
class QuestionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Question::class;

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
                config('lms.questions_table').'.id',
                config('lms.questions_table').'.name',
                config('lms.questions_table').'.description',
                config('lms.status').'.status',
                config('lms.questions_table').'.created_at',
                config('lms.questions_table').'.updated_at',
                config('lms.questions_table').'.deleted_at',
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

        $question = $this->createQuestionStub($data);

        DB::transaction(function () use ($question, $data) {
            if (parent::save($question)) {

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

                event(new QuestionCreated($question));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.question.create_error'));
        });
    }

    /**
     * @param Model $question
     * @param array $input
     */
    public function update(Model $question, array $input)
    {
        $data = $input['data']; 
        $question->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($question, $data ) {
            if ( parent::update($question, $data)) {

               event(new QuestionUpdated($question));

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
    public function delete(Model $question)
    {
 
        if (parent::delete($question)) {
            event(new QuestionDeleted($question));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.questions.delete_error'));
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $question)
    {
        if (is_null($question->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.questions.delete_first'));
        }

        DB::transaction(function () use ($question) {
            if (parent::forceDelete($question)) {
                event(new QuestionPermanentlyDeleted($question));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.questions.delete_error'));
        });
    }

    /**
     * @param Model $question
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $question)
    {
        if (is_null($question->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.questions.cant_restore'));
        }

        if (parent::restore(($question))) {
            event(new QuestionRestored($question));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.questions.restore_error'));
    }

    /**
     * @param Model $question
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $question, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $question->status = $status;

        switch ($status) {
            case 0:
                event(new QuestionDeactivated($question));
            break;

            case 1:
                event(new QuestionReactivated($question));
            break;
        }

        if (parent::save($question)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.questions.mark_error'));
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createQuestionStub($input)
    {
        $question = self::MODEL;
        $question = new $question();
        $question->name = $input['name'];
        $question->description =  $input['description'];
        $question->slug =  $input['slug'];
        $question->status = isset($input['status']) ? 1 : 0;
        return $question;
    }

    public function getDefaultGameQuestion()
    {
        if (is_numeric(config('lms.games.default_question'))) {
            return $this->query()->where('id', (int) config('lms.games.default_question'))->first();
        }

        return $this->query()->where('name', config('lms.games.default_question'))->first();
    }
}

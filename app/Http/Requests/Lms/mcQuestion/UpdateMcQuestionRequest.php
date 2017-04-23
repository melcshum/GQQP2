<?php

namespace App\Http\Requests\Lms\mcQuestion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMcQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'               => 'required|max:255',
            'question'           => 'required|max:1000',
            'program'            => 'required|max:2000',
            'question_ans'       => 'required',
            'mc_ans1'            => 'required|max:100',
            'mc_ans2'            => 'required|max:100',
            'mc_ans3'            => 'required|max:100',
            'mc_ans4'            => 'required|max:100',
            'knowledge'          => 'required|numeric|integer',
            'gold'               => 'required|numeric|integer',
            'time'               => 'required|numeric|integer',
            'hint'               => 'required',
            'photo'              => 'required',
        ];
    }
}

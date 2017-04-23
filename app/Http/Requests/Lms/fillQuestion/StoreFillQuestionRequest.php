<?php

namespace App\Http\Requests\Lms\fillQuestion;

use Illuminate\Foundation\Http\FormRequest;

class StoreFillQuestionRequest extends FormRequest
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
            'question_level'     => 'required',
            'question'           => 'required|max:1000',
            'program'            => 'required|max:2000',
            'ans1'            => 'required|max:100',
            'ans2'            => 'required|max:100',
            'ans3'            => 'required|max:100',
            'ans4'            => 'required|max:100',
            'ans5'            => 'required|max:100',
            'knowledge'          => 'required|numeric|integer',
            'gold'               => 'required|numeric|integer',
            'time'               => 'required|numeric|integer',
            'hint'               => 'required',
            'photo'              => 'required',
        ];
    }
}

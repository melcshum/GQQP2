<?php

namespace App\Http\Requests\Lms\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            'name'     => 'required|max:255',
            'description'     => 'required|max:255',
            'slug'     => 'required|max:255', 
        ];
    }
}

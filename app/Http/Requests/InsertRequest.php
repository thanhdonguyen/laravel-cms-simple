<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertRequest extends FormRequest
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
            'formGroupExampleInput' => 'required',
            'comment' => 'required'
        ];
    }
    public function messages () {
        return[
            'formGroupExampleInput.required' => 'Please Enter title',
            'comment.required' => 'Please Enter comment'
        ];
    }
}

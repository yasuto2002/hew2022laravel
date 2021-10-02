<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this -> path() == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'id' => 'required|regex:/^[^#<>^;_]*$/',
                'pas' => 'required|regex:/^[^#<>^;_]*$/',
        ];
    }
    public function messages(){
        return[
        'id.required' => 'id入力データが空です',
        'pas.required' => 'passward入力データが空です',
        'id.regex' => '/^[^#<>^;_]\"\'*$/が含まれています',
        'pas.regex' => '/^[^#<>^;_]\"\'*$/が含まれています',
        ];
    }
}

<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

use function PHPSTORM_META\type;

class UpdatePostRequest extends FormRequest
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
            'title'=> [
                "required",
                Rule::unique('posts')->ignore($this->post)
            ],
            'description'=> 'required',
            'content'=> 'required',
            'published_at'=> 'nullable',
            'category_id'=> 'required',
        ];
    }
}

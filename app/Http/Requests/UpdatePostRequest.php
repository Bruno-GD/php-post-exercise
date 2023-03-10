<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // check if the user is owner of the post
        return $this->user()->id == $this->route('post')->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'subtitle' => 'required|max:255',
            'content' => 'required',
            'access' => 'required',
            'commentable' => 'nullable',
            'expirable' => 'nullable',
        ];
    }
}

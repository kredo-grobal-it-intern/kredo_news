<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreUpdateRequest extends FormRequest
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
            'title'        => 'required',
            'description'  => 'required',
            'source_id'    => 'required',
            'category_id'    => 'required',
            'url'          => 'required',
            'published_at' => 'required',
            'author'       => 'required',
            'content'      => 'required',
            'image'        => 'required if_:id,==,null|max:1048|mimes:png,jpg,jpeg,gif'
          ];
    }
}

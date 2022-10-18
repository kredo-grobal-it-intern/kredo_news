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
            'title'          => 'required|string',
            'description'    => 'required|string',
            'source_id'      => 'required|numeric',
            'category_id'    => 'required|numeric',
            'country_id'     => 'required|numeric',
            'url'            => 'required|string',
            'published_at'   => 'required|date_format:Y-m-d',
            'author'         => 'required|string',
            'content'        => 'required|string',
            'image'          => 'required if_:id,==,null|max:1048|mimes:png,jpg,jpeg,gif',
            'status'         => 'required',
            'post_date_time' => 'required',
        ];
    }
}

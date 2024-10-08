<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRssFeedRequest extends FormRequest
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
            'feed_name' => 'required',
            'feed_url' => 'required|unique:rss_feeds,feed_url,'.$this->route('rss_feed')->id,
            'no_post' => 'required',
            'language_id' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ];
    }
}

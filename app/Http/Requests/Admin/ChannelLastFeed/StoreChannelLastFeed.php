<?php

namespace App\Http\Requests\Admin\ChannelLastFeed;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreChannelLastFeed extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.channel-last-feed.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'channel_platform_id' => ['required', 'string'],
            'feed_platform_id' => ['required', Rule::unique('channel_last_feed', 'feed_platform_id'), 'string'],
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'thumbnail_url' => ['required', 'string'],
            'views' => ['required', 'string'],
            'rating' => ['required', 'string'],
            'url' => ['required', 'string'],
            'platform_published_at' => ['required', 'date'],
            'platform_updated_at' => ['required', 'date'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}

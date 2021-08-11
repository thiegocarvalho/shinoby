<?php

namespace App\Http\Requests\Admin\ChannelLastFeed;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateChannelLastFeed extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.channel-last-feed.edit', $this->channelLastFeed);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'channel_platform_id' => ['sometimes', 'string'],
            'feed_platform_id' => ['sometimes', Rule::unique('channel_last_feed', 'feed_platform_id')->ignore($this->channelLastFeed->getKey(), $this->channelLastFeed->getKeyName()), 'string'],
            'title' => ['sometimes', 'string'],
            'description' => ['nullable', 'string'],
            'thumbnail_url' => ['sometimes', 'string'],
            'views' => ['sometimes', 'string'],
            'rating' => ['sometimes', 'string'],
            'url' => ['sometimes', 'string'],
            'platform_published_at' => ['sometimes', 'date'],
            'platform_updated_at' => ['sometimes', 'date'],
            
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

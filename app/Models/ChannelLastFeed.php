<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChannelLastFeed extends Model
{
    protected $table = 'channel_last_feed';

    protected $fillable = [
        'channel_platform_id',
        'feed_platform_id',
        'title',
        'description',
        'thumbnail_url',
        'views',
        'rating',
        'url',
        'platform_published_at',
        'platform_updated_at',

    ];


    protected $dates = [
        'platform_published_at',
        'platform_updated_at',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/channel-last-feeds/'.$this->getKey());
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channel';

    protected $fillable = [
        'name',
        'channel_platform_id',
        'platform',
        'last_sync_at',
    
    ];
    
    
    protected $dates = [
        'last_sync_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/channels/'.$this->getKey());
    }
}

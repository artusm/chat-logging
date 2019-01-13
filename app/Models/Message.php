<?php

namespace App\Models;

use App\Helpers\SteamID;
use App\Scopes\SortableScope;
use App\Scopes\SearchableScope;
use App\Scopes\FilterableMessageScope;
use Illuminate\Database\Eloquent\Model;

final class Message extends Model
{
    use SortableScope, SearchableScope, FilterableMessageScope;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chatlog';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'msg_id';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_url'
    ];

    /**
     * Get the profile url.
     *
     * @param void
     * @return string|bool
     */
    public function getProfileUrlAttribute()
    {
        return SteamID::convertSteamIdToProfileUrl($this->attributes['auth']);
    }
}
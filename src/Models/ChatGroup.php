<?php

namespace Fintech\Chat\Models;

use Fintech\Core\Traits\AuditableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ChatGroup extends Model implements HasMedia
{
   use AuditableTrait;
   use SoftDeletes;
   use InteractsWithMedia;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $appends = ['links'];

    protected $casts = ['chat_group_data' => 'array', 'restored_at' => 'datetime'];

    protected $hidden = ['creator_id', 'editor_id', 'destroyer_id', 'restorer_id'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/svg+xml'])
            ->useFallbackUrl(asset('storage/images/anonymous-user.jpg'))
            ->useFallbackPath(storage_path('/app/public/images/anonymous-user.jpg'))
            ->useFallbackUrl(asset('storage/images/anonymous-user.jpg'), 'thumb')
            ->useFallbackPath(storage_path('/app/public/images/anonymous-user.jpg'), 'thumb')
            ->useDisk(config('filesystems.default', 'public'))
            ->singleFile();
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * @return array
     */
    public function getLinksAttribute()
    {
        $primaryKey = $this->getKey();

        $links = [
            'show' => action_link(route('chat.chat-groups.show', $primaryKey), __('core::messages.action.show'), 'get'),
            'update' => action_link(route('chat.chat-groups.update', $primaryKey), __('core::messages.action.update'), 'put'),
            'destroy' => action_link(route('chat.chat-groups.destroy', $primaryKey), __('core::messages.action.destroy'), 'delete'),
            'restore' => action_link(route('chat.chat-groups.restore', $primaryKey), __('core::messages.action.restore'), 'post'),
        ];

        if ($this->getAttribute('deleted_at') == null) {
            unset($links['restore']);
        } else {
            unset($links['destroy']);
        }

        return $links;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}

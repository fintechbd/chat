<?php

namespace Fintech\Chat\Models;

use Fintech\Core\Abstracts\BaseModel;
use Fintech\Core\Traits\AuditableTrait;
use Fintech\Core\Traits\BlameableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ChatMessage extends BaseModel implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use BlameableTrait;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $casts = ['chat_message_data' => 'array', 'restored_at' => 'datetime', 'enabled' => 'bool'];

    protected $hidden = ['creator_id', 'editor_id', 'destroyer_id', 'restorer_id'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachment')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/svg+xml'])
            ->useFallbackUrl(asset('storage/images/anonymous-user.jpg'))
            ->useFallbackPath(storage_path('/app/public/images/anonymous-user.jpg'))
            ->useFallbackUrl(asset('storage/images/anonymous-user.jpg'), 'thumb')
            ->useFallbackPath(storage_path('/app/public/images/anonymous-user.jpg'), 'thumb')
            ->useDisk(config('filesystems.default', 'public'));
    }

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
            'show' => action_link(route('chat.chat-messages.show', $primaryKey), __('restapi::messages.action.show'), 'get'),
            'update' => action_link(route('chat.chat-messages.update', $primaryKey), __('restapi::messages.action.update'), 'put'),
            'destroy' => action_link(route('chat.chat-messages.destroy', $primaryKey), __('restapi::messages.action.destroy'), 'delete'),
            'restore' => action_link(route('chat.chat-messages.restore', $primaryKey), __('restapi::messages.action.restore'), 'post'),
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

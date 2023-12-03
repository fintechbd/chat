<?php

namespace Fintech\Chat\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Fintech\Chat\Services\ChatGroupService chatGroup()
 * @method static \Fintech\Chat\Services\ChatParticipantService chatParticipant()
 * @method static \Fintech\Chat\Services\ChatMessageService chatMessage()
 * // Crud Service Method Point Do not Remove //
 *
 * @see \Fintech\Chat\Chat
 */
class Chat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Fintech\Chat\Chat::class;
    }
}

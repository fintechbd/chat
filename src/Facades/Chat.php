<?php

namespace Fintech\Chat\Facades;

use Fintech\Chat\Services\ChatGroupService;
use Fintech\Chat\Services\ChatMessageService;
use Fintech\Chat\Services\ChatParticipantService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ChatGroupService chatGroup()
 * @method static ChatParticipantService chatParticipant()
 * @method static ChatMessageService chatMessage()
 *                                                 // Crud Service Method Point Do not Remove //
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

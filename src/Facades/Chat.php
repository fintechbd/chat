<?php

namespace Fintech\Chat\Facades;

use Fintech\Chat\Services\ChatGroupService;
use Fintech\Chat\Services\ChatMessageService;
use Fintech\Chat\Services\ChatParticipantService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Contracts\Pagination\Paginator|\Illuminate\Support\Collection|ChatGroupService chatGroup(array $filters = null)
 * @method static \Illuminate\Contracts\Pagination\Paginator|\Illuminate\Support\Collection|ChatParticipantService chatParticipant(array $filters = null)
 * @method static \Illuminate\Contracts\Pagination\Paginator|\Illuminate\Support\Collection|ChatMessageService chatMessage(array $filters = null)
 *                                                                                                                                                // Crud Service Method Point Do not Remove //
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

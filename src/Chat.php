<?php

namespace Fintech\Chat;

use Fintech\Chat\Services\ChatGroupService;
use Fintech\Chat\Services\ChatMessageService;
use Fintech\Chat\Services\ChatParticipantService;

class Chat
{
    public function chatGroup($filters = null)
    {
        return \singleton(ChatGroupService::class, $filters);
    }

    public function chatParticipant($filters = null)
    {
        return \singleton(ChatParticipantService::class, $filters);
    }

    public function chatMessage($filters = null)
    {
        return \singleton(ChatMessageService::class, $filters);
    }

    // ** Crud Service Method Point Do not Remove **//

}

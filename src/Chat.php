<?php

namespace Fintech\Chat;

use Fintech\Chat\Services\ChatGroupService;
use Fintech\Chat\Services\ChatMessageService;
use Fintech\Chat\Services\ChatParticipantService;

class Chat
{
    /**
     * @return ChatGroupService
     */
    public function chatGroup()
    {
        return app(ChatGroupService::class);
    }

    /**
     * @return ChatParticipantService
     */
    public function chatParticipant()
    {
        return app(ChatParticipantService::class);
    }

    /**
     * @return ChatMessageService
     */
    public function chatMessage()
    {
        return app(ChatMessageService::class);
    }

    //** Crud Service Method Point Do not Remove **//

}

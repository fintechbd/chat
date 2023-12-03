<?php

namespace Fintech\Chat;

class Chat
{
    /**
     * @return \Fintech\Chat\Services\ChatGroupService
     */
    public function chatGroup()
    {
        return app(\Fintech\Chat\Services\ChatGroupService::class);
    }

    /**
     * @return \Fintech\Chat\Services\ChatParticipantService
     */
    public function chatParticipant()
    {
        return app(\Fintech\Chat\Services\ChatParticipantService::class);
    }

    /**
     * @return \Fintech\Chat\Services\ChatMessageService
     */
    public function chatMessage()
    {
        return app(\Fintech\Chat\Services\ChatMessageService::class);
    }

    //** Crud Service Method Point Do not Remove **//


}

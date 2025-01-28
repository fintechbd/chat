<?php

// config for Fintech/Chat
use Fintech\Chat\Models\ChatGroup;
use Fintech\Chat\Models\ChatMessage;
use Fintech\Chat\Models\ChatParticipant;
use Fintech\Chat\Repositories\Eloquent\ChatGroupRepository;
use Fintech\Chat\Repositories\Eloquent\ChatMessageRepository;
use Fintech\Chat\Repositories\Eloquent\ChatParticipantRepository;

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Module APIs
    |--------------------------------------------------------------------------
    | This setting enable the API will be available or not
    */
    'enabled' => env('CHAT_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Chat Group Root Prefix
    |--------------------------------------------------------------------------
    |
    | This value will be added to all your routes from this package
    | Example: APP_URL/{root_prefix}/api/chat/action
    |
    | Note: while adding prefix add closing ending slash '/'
    */

    'root_prefix' => 'api/',

    /*
    |--------------------------------------------------------------------------
    | ChatGroup Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'chat_group_model' => ChatGroup::class,

    /*
    |--------------------------------------------------------------------------
    | ChatParticipant Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'chat_participant_model' => ChatParticipant::class,

    /*
    |--------------------------------------------------------------------------
    | ChatMessage Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'chat_message_model' => ChatMessage::class,

    //** Model Config Point Do not Remove **//

    /*
    |--------------------------------------------------------------------------
    | Repositories
    |--------------------------------------------------------------------------
    |
    | This value will be used across systems where a repository instance is needed
    */

    'repositories' => [
        \Fintech\Chat\Interfaces\ChatGroupRepository::class => ChatGroupRepository::class,

        \Fintech\Chat\Interfaces\ChatParticipantRepository::class => ChatParticipantRepository::class,

        \Fintech\Chat\Interfaces\ChatMessageRepository::class => ChatMessageRepository::class,

        //** Repository Binding Config Point Do not Remove **//
    ],

];

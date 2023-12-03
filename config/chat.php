<?php

// config for Fintech/Chat
return [

    /*
    |--------------------------------------------------------------------------
    | Enable Module APIs
    |--------------------------------------------------------------------------
    | This setting enable the API will be available or not
    */
    'enabled' => env('PACKAGE_Chat_ENABLED', true),

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

    'root_prefix' => 'test/',

    /*
    |--------------------------------------------------------------------------
    | ChatGroup Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'chat_group_model' => \Fintech\Chat\Models\ChatGroup::class,

    /*
    |--------------------------------------------------------------------------
    | ChatParticipant Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'chat_participant_model' => \Fintech\Chat\Models\ChatParticipant::class,

    /*
    |--------------------------------------------------------------------------
    | ChatMessage Model
    |--------------------------------------------------------------------------
    |
    | This value will be used to across system where model is needed
    */
    'chat_message_model' => \Fintech\Chat\Models\ChatMessage::class,

    //** Model Config Point Do not Remove **//

    /*
    |--------------------------------------------------------------------------
    | Repositories
    |--------------------------------------------------------------------------
    |
    | This value will be used across systems where a repositoy instance is needed
    */

    'repositories' => [
        \Fintech\Chat\Interfaces\ChatGroupRepository::class => \Fintech\Chat\Repositories\Eloquent\ChatGroupRepository::class,

        \Fintech\Chat\Interfaces\ChatParticipantRepository::class => \Fintech\Chat\Repositories\Eloquent\ChatParticipantRepository::class,

        \Fintech\Chat\Interfaces\ChatMessageRepository::class => \Fintech\Chat\Repositories\Eloquent\ChatMessageRepository::class,

        //** Repository Binding Config Point Do not Remove **//
    ],

];

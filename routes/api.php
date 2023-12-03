<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "API" middleware group. Enjoy building your API!
|
*/
if (Config::get('fintech.chat.enabled')) {
    Route::prefix('chat')->name('chat.')->group(function () {

        Route::apiResource('chat-groups', \Fintech\Chat\Http\Controllers\ChatGroupController::class);
    Route::post('chat-groups/{chat_group}/restore', [\Fintech\Chat\Http\Controllers\ChatGroupController::class, 'restore'])->name('chat-groups.restore');

    Route::apiResource('chat-participants', \Fintech\Chat\Http\Controllers\ChatParticipantController::class);
    Route::post('chat-participants/{chat_participant}/restore', [\Fintech\Chat\Http\Controllers\ChatParticipantController::class, 'restore'])->name('chat-participants.restore');

    Route::apiResource('chat-messages', \Fintech\Chat\Http\Controllers\ChatMessageController::class);
    Route::post('chat-messages/{chat_message}/restore', [\Fintech\Chat\Http\Controllers\ChatMessageController::class, 'restore'])->name('chat-messages.restore');

    //DO NOT REMOVE THIS LINE//
    });
}

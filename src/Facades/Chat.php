<?php

namespace Fintech\Chat\Facades;

use Illuminate\Support\Facades\Facade;

/**
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

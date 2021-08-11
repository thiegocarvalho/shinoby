<?php

namespace App\Http\Controllers\Services\Bot;

use App\Http\Controllers\Controller;

class BotRoute extends Controller
{
    /**
     * @param string $param
     * @return string
     */
    public static function botRoute(string $param): string
    {
            switch ($param) {
                case "/start":
                    return "welcomeMessage";
                case "/crepebig":
                    return "setWebhook";
                case 2:
                    echo "i equals 2";
                    break;
                default:
                    return "defaultMessage";
            }
        }
}

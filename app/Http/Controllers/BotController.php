<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\Bot\BotRoute;
use App\Http\Controllers\Services\Telegram\TelegramRequest;
use App\Notifications\DefaultMessage;
use App\Notifications\ErrorMessage;
use App\Notifications\WebHookSetMessage;
use App\Notifications\WelcomeMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class BotController extends Controller
{
    /**
     * @var TelegramRequest
     */
    private $request;

    /**
     *
     */
    public function runAction()
    {
        try {
            $route = BotRoute::botRoute($this->request->getMessageText());

            if (is_callable(self::class, $route)) {
                $this->{$route}();
            } else {
                $this->errorMessage();
            }
        } catch (\Exception $exception) {
            $this->errorMessage();
        }

    }

    /**
     * @param Request $request
     */
    private function setRequest(Request $request)
    {
        $this->request = new TelegramRequest($request->all());
    }

    /**
     * @param Request $request
     */
    public function handle(Request $request)
    {
        $this->setRequest($request);
        $this->runAction();
    }

    /**
     *
     */
    public function welcomeMessage()
    {
        Notification::route('telegram', $this->request->device->id)
            ->notify(new WelcomeMessage($this->request->device->id));
    }

    /**
     *
     */
    public function defaultMessage()
    {
        Notification::route('telegram', $this->request->device->id)
            ->notify(new DefaultMessage());
    }

    /**
     *
     */
    public function errorMessage()
    {
        Notification::route('telegram', $this->request->device->id)
            ->notify(new ErrorMessage());
    }

    /**
     *TODO SET ADMIN ID FIXED
     */
    public function setWebhook()
    {

        Http::get('https://api.telegram.org/bot660325416:AAGRPboHtKpCaFz-h_vYPKCsqltlhMzjKek/setWebhook?url='
            . env('APP_URL')
            . 'api/toyotomi'
        );

        $return = Http::get('https://api.telegram.org/bot660325416:AAGRPboHtKpCaFz-h_vYPKCsqltlhMzjKek/getWebhookInfo')->json();

        if(env('KATANA', false) && env('BUSHIDO', false)){

            Notification::route('telegram', env('SHURIKEN'))
                ->notify(new WebHookSetMessage($return));
        }
    }
}

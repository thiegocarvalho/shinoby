<?php

namespace App\Http\Controllers\Services\Telegram;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DeviceController;

class TelegramRequest extends Controller
{
    /**
     * @var array
     */
    private $payload;

    /**
     * @var bool
     */
    public $isCallBack = false;

    /**
     * @var bool
     */
    public $isBotCommand = false;

    /**
     * @var DeviceController
     */
    public $device;

    /**
     * @var
     */
    public $message;

    /**
     * TelegramRequest constructor.
     * @param array $originalRequest
     */
    public function __construct(array $originalRequest)
    {
        $this->payload = $originalRequest;
        $this->setSettings();
        $this->setMessage();
        $this->setDevice();

        return $this;
    }

    /**
     *
     */
    private function setDevice()
    {
        if ($this->isCallBack) {
            $this->device = new DeviceController($this->payload['callback_query']['from']);
        } else {
            $this->device = new DeviceController($this->message['from']);
        }
    }

    /**
     *
     */
    private function setSettings()
    {
        if (isset($this->payload['callback_query'])) {
            $this->isCallBack = true;
        }

        if (isset($this->payload['message']['entities'][0]['type']) && $this->payload['message']['entities'][0]['type'] == 'bot_command') {
            $this->isBotCommand = true;
        }
    }

    /**
     *
     */
    private function setMessage()
    {
        if ($this->isCallBack) {
            $this->message = $this->payload['callback_query']['message'];
        } else {
            $this->message = $this->payload['message'];
        }
    }

    public function getMessageText()
    {
        return $this->message['text'];
    }

    public function requestFormat(array $array): array
    {
        return [
            'message' => [
                'from' => [

                ]
            ]

        ];
    }
}

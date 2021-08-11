<?php

namespace App\Console\Commands;

use App\Http\Controllers\BotController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TelegramSetWebHook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:setwebhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Telegram Endpoint by APP_URL in ENV file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $key
     * @param $value
     */
    public function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }


    private function startsWith ($string): bool
    {
        $len = strlen('ngrok version');
        return (substr($string, 0, $len) === 'ngrok version');
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("
╔╗ ┬ ┬┌─┐┬ ┬┬┌┬┐┌─┐╔═╗┌─┐┌─┐┌┬┐╔═╗┌─┐┌┐┌┌┐┌┌─┐┌─┐┌┬┐
╠╩╗│ │└─┐├─┤│ │││ │╠╣ ├─┤└─┐ │ ║  │ │││││││├┤ │   │
╚═╝└─┘└─┘┴ ┴┴─┴┘└─┘╚  ┴ ┴└─┘ ┴ ╚═╝└─┘┘└┘┘└┘└─┘└─┘ ┴
        ");
        $this->newLine();
        $this->info("#version 1.0.0");
        $this->info("Create by ThiegoCarvalho when there was nothing to do.");
        $this->info("https://github.com/thiegocarvalho");
        $this->newLine();
        $this->info("Starting Process");


        //Check Ngrok
        $ngrok = exec('ngrok version');
        if($this->startsWith($ngrok)){
            $this->info("Using " . $ngrok);
        }else{
            $this->error('Ngrok not found, please download and install https://ngrok.com/download');
            return 0;
        }

        Artisan::queue('ngrok');
        Artisan::queue('ngrok');


        dd(Artisan::output());
        $this->comment('Starting Artisan Server');



//        $botController = new BotController();
//        return $botController->setWebhook();
    }
}

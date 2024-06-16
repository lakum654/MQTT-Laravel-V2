<?php

namespace App\Console\Commands;

use App\Http\Controllers\MqttController;
use Illuminate\Console\Command;

class MQTTCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:call';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mqtt = new MqttController();
        $mqtt->publish();
        $mqtt->subscribe();
        return Command::SUCCESS;
    }
}

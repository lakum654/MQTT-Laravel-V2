<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

class MqttController extends Controller
{
    public function publish()
    {
        echo "Starting....";
        $payload = json_encode("Hi Pavan 123");

        MQTT::publish('lakum/home/light', $payload);

        echo "\n";
        echo "Published";

        // return response()->json(['status' => 'Message published']);
    }

    public function subscribe()
    {

        $mqtt = MQTT::connection();
        $mqtt->subscribe('lakum/home/light', function (string $topic, string $message) {
            echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
        }, 1);
        $mqtt->loop(true);

        echo "Subscribed to topic";
        // return response()->json(['status' => 'Subscribed to topic']);
    }
}

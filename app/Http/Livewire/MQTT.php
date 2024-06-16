<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;
use PhpMqtt\Client\Facades\MQTT as MyMQTT;

class MQTT extends Component
{
    public $devices;
    public $topic;
    public bool $status = false;
    public $message = "";
    public bool $loading = false;

    public function mount()
    {
        $this->devices = Device::all();
    }

    public function render()
    {
        return view('livewire.m-q-t-t');
    }

    public function updatedTopic() {
        if($this->topic != null){
            $this->status = Device::find($this->topic)?->status ?? false;
        }

    }
    public function publish()
    {
        $this->loading = true;
        $this->message = "Starting...";

        $device = Device::find($this->topic);
        if ($device) {
            $deviceName = $device->name;
            $payloadText = $this->status ? "$deviceName is On" : "$deviceName is Off";
            $payload = json_encode($payloadText);

            MyMQTT::publish($deviceName, $payload);

            $device->update(['status' => $this->status]);
            $this->message = $payloadText;
        } else {
            $this->message = "Device not found.";
        }

        $this->loading = false;
    }
}

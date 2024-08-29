@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">MQTT WebSocket Example</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h5 mb-0">Devices</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($devices as $device)
                        <tr>
                            <td>{{ $device->name }}</td>
                            <td>{{ $device->id }}</td>
                            <td>{{ $device->status }}</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input toggle-switch" id="switch-{{ $device->id }}" data-id="{{ $device->name }}" data-status="{{ $device->status }}" {{ $device->status == 'on' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="switch-{{ $device->id }}">{{ $device->status == 'on' ? 'Turn Off' : 'Turn On' }}</label>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="messages" class="mt-4"></div>

    {{-- <div class="card mb-4">
        <div class="card-header">
            <h2 class="h5 mb-0">Publish Message</h2>
        </div>
        <div class="card-body">
            <form id="publish-form">
                <div class="form-group">
                    <label for="publish-topic">Topic:</label>
                    <input type="text" class="form-control" id="publish-topic" value="Fan" required>
                </div>
                <div class="form-group">
                    <label for="publish-message">Message:</label>
                    <input type="text" class="form-control" id="publish-message" required>
                </div>
                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
        </div>
    </div> --}}

    {{-- <div class="card">
        <div class="card-header">
            <h2 class="h5 mb-0">Subscribe to Topic</h2>
        </div>
        <div class="card-body">
            <form id="subscribe-form">
                <div class="form-group">
                    <label for="subscribe-topic">Topic:</label>
                    <input type="text" class="form-control" id="subscribe-topic" value="Fan" required>
                </div>
                <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>
            <div id="messages" class="mt-4"></div>
        </div>
    </div> --}}
</div>
@endsection

@push('JS')
<script>
    $(document).ready(function() {
        const clientId = 'emqx_cloud21e2e3';
        const host = "wss://{{ env('MQTT_HOST') }}:{{ env('MQTT_PORT') }}/mqtt";
        const options = {
            clientId: clientId,
            username: "{{ env('MQTT_AUTH_USERNAME') }}",
            password: "{{ env('MQTT_AUTH_PASSWORD') }}",
            keepalive: 60,
            protocolId: 'MQTT',
            protocolVersion: 4,
            clean: true,
            reconnectPeriod: 1000,
            connectTimeout: 30 * 1000,
            will: {
                topic: 'Default',
                payload: 'Connection Closed abnormally..!',
                qos: 0,
                retain: false
            },
        };

        console.log('Connecting mqtt client');
        const client = mqtt.connect(host, options);

        client.on('error', (err) => {
            console.log('Connection error: ', err);
            client.end();
        });

        client.on('reconnect', () => {
            console.log('Reconnecting...');
        });

        client.on('connect', () => {
            console.log('Connected to MQTT broker');
        });

        client.on('message', (topic, message) => {
            console.log(`Received message: ${message.toString()} on topic: ${topic}`);
            $('#messages').prepend(`<p class="alert alert-info">Topic: <strong>${topic}</strong>, Message: ${message.toString()}</p>`);
        });

        // Handle device status toggle buttons
        $('.btn-toggle-status').on('click', function() {
            const button = $(this);
            const deviceId = button.data('id');
            const currentStatus = button.data('status');
            const newStatus = currentStatus === 'on' ? 'off' : 'on';
            const topic = `devices/${deviceId}`;
            subscribe(topic)
            const message = `Device ${deviceId} is ${newStatus}`;
            client.publish(topic, message, (err) => {
                if (err) {
                    console.log('Publish error: ', err);
                } else {
                    console.log(`Message: ${message} published to topic: ${topic}`);
                    // Update the button and status
                    button.data('status', newStatus);
                    button.toggleClass('btn-success btn-danger');
                    button.text(newStatus === 'on' ? 'Turn Off' : 'Turn On');
                    button.closest('tr').find('td:nth-child(3)').text(newStatus);
                }
            });
        });


    $('.toggle-switch').on('change', function() {
    const switchInput = $(this);
    const deviceId = switchInput.data('id');
    const currentStatus = switchInput.data('status');
    const newStatus = currentStatus === 'on' ? 'off' : 'on';
    const topic = `devices/${deviceId}`;
    const message = `Device ${deviceId} is ${newStatus}`;
    subscribe(topic)
    client.publish(topic, message, (err) => {
        if (err) {
            console.log('Publish error: ', err);
        } else {
            console.log(`Message: ${message} published to topic: ${topic}`);
            // Update the switch and status
            switchInput.data('status', newStatus);
            switchInput.next('label').text(newStatus === 'on' ? 'Turn Off' : 'Turn On');
            switchInput.closest('tr').find('td:nth-child(3)').text(newStatus);
        }
    });
});

        // Publish message form submission
        // $('#publish-form').on('submit', function(e) {
        //     e.preventDefault();
        //     const topic = $('#publish-topic').val();
        //     const message = $('#publish-message').val();
        //     client.publish(topic, message, (err) => {
        //         if (err) {
        //             console.log('Publish error: ', err);
        //         } else {
        //             console.log(`Message: ${message} published to topic: ${topic}`);
        //         }
        //     });
        // });

        // Subscribe to topic form submission
        function subscribe(topic) {
            $('#subscribe-topic').val(topic)
            client.subscribe(topic, (err) => {
                if (err) {
                    console.log('Subscribe error: ', err);
                } else {
                    console.log(`Subscribed to topic: ${topic}`);
                }
            });
        }
        // $('#subscribe-form').on('submit', function(e) {
        //     e.preventDefault();
        //     const topic = $('#subscribe-topic').val();
        //     client.subscribe(topic, (err) => {
        //         if (err) {
        //             console.log('Subscribe error: ', err);
        //         } else {
        //             console.log(`Subscribed to topic: ${topic}`);
        //         }
        //     });
        // });
    });
</script>

@endpush

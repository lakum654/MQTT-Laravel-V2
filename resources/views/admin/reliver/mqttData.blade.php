<div class="card">
    <div class="card-body">
        <h4 class="card-title float-left">Live Data</h4>
        <div class="card-tools">
            {{-- <a href="{{ route('reliver.create') }}">
             <button type="button" class="btn btn-outline-primary btn-fw float-right">Add New</button>
           </a> --}}
        </div>
        <p class="card-description"></p>

        <div class="table-responsive">
            <table class="table table-bordered" id="myMQTTTable">
                <thead>
                    {{-- <tr>
                        <th> Radar 1 </th>
                        <th> Radar 2 </th>
                        <th> Radar 3 </th>
                        <th> Radar 4 </th>
                        <th> Blaster 1 </th>
                        <th> Blaster 2 </th>
                        <th> Blaster 3 </th>
                        <th> Blaster 4 </th>
                        <th> Blaster 5 </th>
                        <th> Blaster 6 </th>
                        <th> Blaster 7 </th>
                        <th> Blaster 8 </th>
                        <th> Pressure 1 </th>
                        <th> Pressure 2 </th>
                        <th> Pressure 3 </th>
                        <th> Pressure 4 </th>
                        <th> Pressure 5 </th>
                        <th> Created At </th>
                    </tr> --}}
                    <tr>
                        <th> Radar 1 </th>
                        <th> Radar 2 </th>
                        <th> Blaster A 1 </th>
                        <th> Blaster B 1 </th>
                        <th> Blaster C 2 </th>
                        <th> Blaster D 2 </th>
                        <th> Pressure 1 </th>
                        <th> Pressure 2 </th>
                        <th> Pressure 3 </th>
                        <th> Temprature </th>

                    </tr>
                </thead>
                <tbody class="mqttBody">
                    <tr>
                        <td id="Radar1" data-topic="{{ $reliver->qrcode }}/Radar1">0</td>
                        <td id="Radar2" data-topic="{{ $reliver->qrcode }}/Radar2">0</td>
                        <td id="BlasterA1" data-topic="{{ $reliver->qrcode }}/BlasterA1">0</td>
                        <td id="BlasterB1" data-topic="{{ $reliver->qrcode }}/BlasterB1">0</td>
                        <td id="BlasterC1" data-topic="{{ $reliver->qrcode }}/BlasterC1">0</td>
                        <td id="BlasterD1" data-topic="{{ $reliver->qrcode }}/BlasterD1">0</td>
                        <td id="Pressure1" data-topic="{{ $reliver->qrcode }}/Pressure1">0</td>
                        <td id="Pressure2" data-topic="{{ $reliver->qrcode }}/Pressure2">0</td>
                        <td id="Pressure3" data-topic="{{ $reliver->qrcode }}/Pressure3">0</td>
                        <td id="Temperature" data-topic="{{ $reliver->qrcode }}/Temperature">0</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

{{-- <script>
        const clientId = 'emqx_clouded8ad6';
        const host = 'wss://uaf2d772.ala.eu-central-1.emqxsl.com:8084/mqtt';
        const options = {
            clientId: clientId,
            username: 'pavan',
            password: 'pavan',
            keepalive: 60,
            protocolId: 'MQTT',
            protocolVersion: 4,
            clean: true,
            reconnectPeriod: 1000,
            connectTimeout: 30 * 1000,
            will: {
                topic: 'Book',
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
            @foreach ($reliver_data as $value)
                @for ($i = 1; $i <= 17; $i++)
                    publish("{{ $value->reliver->qrcode }}/{{ $value->radar_1 }}",'Hello World');
                @endfor
            @endforeach
        });

        client.on('message', (topic, message) => {
            console.log(`Received message: ${message.toString()} on topic: ${topic}`);
            updateTable(topic, message.toString());
        });

        function publish(topic, message) {
             subscribe(topic,message);
            client.publish(topic, message, (err) => {
                if (err) {
                    console.log('Publish error: ', err);
                } else {
                    console.log(`Message: ${message} published to topic: ${topic}`);
                }
            });
        }

        function subscribe(topic) {
            client.subscribe(topic, (err) => {
                if (err) {
                    console.log('Subscribe error: ', err);
                } else {
                    console.log(`Subscribed to topic: ${topic}`);
                }
            });
        }

        function updateTable(topic, message) {
            const tbody = document.querySelector('#myMQTTTable tbody');
            const values = message.split(',');

            const newRow = document.createElement('tr');
            for (const value of values) {
                const newCell = document.createElement('td');
                newCell.innerText = value;
                newRow.appendChild(newCell);
            }

            const timestampCell = document.createElement('td');
            timestampCell.innerText = new Date().toLocaleString();
            newRow.appendChild(timestampCell);

            tbody.appendChild(newRow);
        }
    </script> --}}

    {{-- <script>
        const clientId = 'emqx_cloud706ed8';
        const host = 'wss://za0641be.ala.eu-central-1.emqxsl.com:8084/mqtt';
        const options = {
            clientId: clientId,
            username: 'lakum',
            password: 'lakum@mqtt',
            keepalive: 60,
            protocolId: 'MQTT',
            protocolVersion: 4,
            clean: true,
            reconnectPeriod: 1000,
            connectTimeout: 30 * 1000,
            will: {
                topic: 'Book',
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
            @foreach ($reliver_data as $value)
                @for ($i = 1; $i <= 17; $i++)
                    publish("{{ $value->reliver->qrcode }}/{{ $value->radar_1 }}",'Hello,sssssssss');
                @endfor
            @endforeach
        });

        client.on('message', (topic, message) => {
            console.log(`Received message: ${message.toString()} on topic: ${topic}`);
            updateTable(topic, message.toString());
        });

        function publish(topic, message) {
            subscribe(topic, message);
            client.publish(topic, message, (err) => {
                if (err) {
                    console.log('Publish error: ', err);
                } else {
                    console.log(`Message: ${message} published to topic: ${topic}`);
                }
            });
        }

        function subscribe(topic) {
            client.subscribe(topic, (err) => {
                if (err) {
                    console.log('Subscribe error: ', err);
                } else {
                    console.log(`Subscribed to topic: ${topic}`);
                }
            });
        }

        function updateTable(topic, message) {
            const tbody = document.querySelector('#myMQTTTable tbody');
            const values = message.split(',');
            const headers = document.querySelectorAll('#mysMQTTTable thead th');

            let existingRow = tbody.querySelector('tr:last-child');
            if (!existingRow || existingRow.children.length >= headers.length) {
                existingRow = document.createElement('tr');
                tbody.appendChild(existingRow);
            }

            values.forEach((value, index) => {
                const newCell = document.createElement('td');
                newCell.innerText = value || ''; // Assign the value or leave empty if not provided
                existingRow.appendChild(newCell);
            });

            if (existingRow.children.length < headers.length) {
                for (let i = existingRow.children.length; i < headers.length; i++) {
                    const emptyCell = document.createElement('td');
                    emptyCell.innerText = ''; // Fill remaining cells with empty text
                    existingRow.appendChild(emptyCell);
                }
            }

            const timestampCell = document.createElement('td');
            timestampCell.innerText = new Date().toLocaleString();
            existingRow.appendChild(timestampCell);
        }
    </script> --}}

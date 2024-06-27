@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title float-left">MQTT Data</h4>
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
                                </tr>
                            </thead>
                            <tbody class="mqttBody">
                                <tr>
                                    <td id="Radar1" data-topic="{{$reliver->qrcode}}/Radar1"></td>
                                    <td id="Radar2" data-topic="{{$reliver->qrcode}}/Radar2"></td>
                                    <td id="BlasterA1" data-topic="{{$reliver->qrcode}}/BlasterA1"></td>
                                    <td id="BlasterB1" data-topic="{{$reliver->qrcode}}/BlasterB1"></td>
                                    <td id="BlasterC1" data-topic="{{$reliver->qrcode}}/BlasterC1"></td>
                                    <td id="BlasterD1" data-topic="{{$reliver->qrcode}}/BlasterD1"></td>
                                    <td id="Pressure1" data-topic="{{$reliver->qrcode}}/Pressure1"></td>
                                    <td id="Pressure2" data-topic="{{$reliver->qrcode}}/Pressure2"></td>
                                    <td id="Pressure3" data-topic="{{$reliver->qrcode}}/Pressure3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title float-left">{{ $moduleName }} Works</h4>
                    <div class="card-tools">
                        {{-- <a href="{{ route('reliver.create') }}">
                         <button type="button" class="btn btn-outline-primary btn-fw float-right">Add New</button>
                       </a> --}}
                    </div>
                    <p class="card-description"></p>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Reliver ID </th>
                                    <th> Junction House No </th>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reliver_data as $key => $value)
                                    <tr>
                                        {{-- <script>0
                                            publish("{{$value->reliver->qrcode}}/{{$value->radar_1}}")
                                        </script> --}}
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->reliver_id }}</td>
                                        <td>{{ $value->reliver->junction_house_no }}</td>
                                        <td>{{ $value->radar_1 }}</td>
                                        <td>{{ $value->radar_2 }}</td>
                                        <td>{{ $value->radar_3 }}</td>
                                        <td>{{ $value->radar_4 }}</td>
                                        <td>{{ $value->blaster_1 }}</td>
                                        <td>{{ $value->blaster_2 }}</td>
                                        <td>{{ $value->blaster_3 }}</td>
                                        <td>{{ $value->blaster_4 }}</td>
                                        <td>{{ $value->blaster_5 }}</td>
                                        <td>{{ $value->blaster_6 }}</td>
                                        <td>{{ $value->blaster_7 }}</td>
                                        <td>{{ $value->blaster_8 }}</td>
                                        <td>{{ $value->pressure_1 }}</td>
                                        <td>{{ $value->pressure_2 }}</td>
                                        <td>{{ $value->pressure_3 }}</td>
                                        <td>{{ $value->pressure_4 }}</td>
                                        <td>{{ $value->pressure_5 }}</td>
                                        <td>{{ $value->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('JS')
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script>


$('#datatable').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'csv',
                text: 'Export'
            }],
            ajax: {
                url: "{{ route('reliver.apiData', $reliver->id) }}",
                dataType: "json",
                type: "GET",
            },
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'reliver_id', name: 'reliver_id' },
                { data: 'reliver.junction_house_no', name: 'reliver.junction_house_no' },
                { data: 'radar_1', name: 'radar_1' },
                { data: 'radar_2', name: 'radar_2' },
                { data: 'radar_3', name: 'radar_3' },
                { data: 'radar_4', name: 'radar_4' },
                { data: 'blaster_1', name: 'blaster_1' },
                { data: 'blaster_2', name: 'blaster_2' },
                { data: 'blaster_3', name: 'blaster_3' },
                { data: 'blaster_4', name: 'blaster_4' },
                { data: 'blaster_5', name: 'blaster_5' },
                { data: 'blaster_6', name: 'blaster_6' },
                { data: 'blaster_7', name: 'blaster_7' },
                { data: 'blaster_8', name: 'blaster_8' },
                { data: 'pressure_1', name: 'pressure_1' },
                { data: 'pressure_2', name: 'pressure_2' },
                { data: 'pressure_3', name: 'pressure_3' },
                { data: 'pressure_4', name: 'pressure_4' },
                { data: 'pressure_5', name: 'pressure_5' },
                { data: 'created_at', name: 'created_at' }
            ]
        });
    </script>

<script>
    const clientId = 'emqx_clouded8ad6';
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

        // Subscribe to all topics found in the table
        $('.mqttBody td').each(function () {
            const topic = $(this).data('topic');
            if (topic) {
                subscribe(topic);
            }
        });
    });

    client.on('message', (topic, message) => {
        console.log(`Received message: ${message.toString()} on topic: ${topic}`);
        updateTableCell(topic, message.toString());
    });

    function publish(topic, message) {
        subscribe(topic);
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

    function updateTableCell(topic, message) {
        $(`td[data-topic="${topic}"]`).text(message);
    }
</script>


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
                @for($i=1;$i<=17;$i++)
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
                @for($i=1;$i<=17;$i++)
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


@endpush

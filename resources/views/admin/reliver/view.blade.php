@extends('layouts.app')
@section('CSS')
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        }

        .gauge {
            width: 200px;
            height: 160px;
        }

        .slider-container {
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        input[type="range"] {
            width: 50%;
        }
         /* Adjust the size of the canvas using CSS */
         #myChartContainer {
            width: 500px;
            height: 300px;
        }

        #myChart {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            @include('admin.reliver.mqttData')
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pressure Live </h4>
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <div id="gauge1" class="gauge"></div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <div id="gauge2" class="gauge"></div>
                        </div>

                        <div class="col-md-4 d-flex justify-content-center">
                            <div id="gauge3" class="gauge"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bar Chart Live </h4>
                    <div id="myChartContainer">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{-- <div class="col-lg-12 grid-margin stretch-card">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center">
                    <div id="gauge1" class="gauge"></div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div id="gauge2" class="gauge"></div>
                </div>
            </div>
        </div> --}}

        <div class="col-lg-12 grid-margin stretch-card">
            @include('admin.reliver.apiData')
        </div>
    </div>
@endsection

@push('JS')
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.3.4/justgage.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        $(document).ready(function() {
            var g1 = new JustGage({
                id: "gauge1",
                value: 0,
                min: 0,
                max: 200,
                title: "Gauge 1",
                label: "Pressure 1",
                gaugeWidthScale: 0.6,
                customSectors: [{
                    color: "#ff0000",
                    lo: 0,
                    hi: 30
                }, {
                    color: "#00ff00",
                    lo: 30,
                    hi: 70
                }, {
                    color: "#0000ff",
                    lo: 70,
                    hi: 100
                }]
            });

            var g2 = new JustGage({
                id: "gauge2",
                value: 0,
                min: 0,
                max: 200,
                title: "Gauge 2",
                label: "Pressure 2",
                gaugeWidthScale: 0.6,
                customSectors: [{
                    color: "#ff0000",
                    lo: 0,
                    hi: 30
                }, {
                    color: "#00ff00",
                    lo: 30,
                    hi: 70
                }, {
                    color: "#0000ff",
                    lo: 70,
                    hi: 100
                }]
            });


            var g3 = new JustGage({
                id: "gauge3",
                value: 0,
                min: 0,
                max: 200,
                title: "Gauge 3",
                label: "Pressure 3",
                gaugeWidthScale: 0.6,
                customSectors: [{
                    color: "#ff0000",
                    lo: 0,
                    hi: 30
                }, {
                    color: "#00ff00",
                    lo: 30,
                    hi: 70
                }, {
                    color: "#0000ff",
                    lo: 70,
                    hi: 100
                }]
            });

            const clientId = `{{env('MQTT_CLIENT_ID')}}`;
            const host = `wss://{{env('MQTT_HOST')}}:{{env('MQTT_PORT')}}/mqtt`;
            const options = {
                clientId: clientId,
                username: `{{env('MQTT_AUTH_USERNAME')}}`,
                password: `{{env('MQTT_AUTH_PASSWORD')}}`,
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
                $('.mqttBody td').each(function() {
                    const topic = $(this).data('topic');
                    if (topic) {
                        subscribe(topic);
                    }
                });
            });

            client.on('message', (topic, message) => {
                console.log(`Received message: ${message.toString()} on topic: ${topic}`);

                updateChartData(topic, parseFloat(message.toString()));
                updateTableCell(topic, message.toString());
                let pressure1 = $('#Pressure1').text();
                let pressure2 = $('#Pressure2').text()
                let pressure3 = $('#Pressure3').text()
                // alert(pressure1,pressure2)
                g1.refresh(pressure1);
                g2.refresh(pressure2);
                g3.refresh(pressure3);

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


            const ctx = $('#myChart')[0].getContext('2d');

        // Create gradient for the first dataset
        const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient1.addColorStop(0, 'rgba(255, 99, 132, 0.2)');
        gradient1.addColorStop(1, 'rgba(255, 99, 132, 0)');

        // Create gradient for the second dataset
        const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient2.addColorStop(0, 'rgba(75, 192, 192, 0.2)');
        gradient2.addColorStop(1, 'rgba(75, 192, 192, 0)');

        // Generate labels for one hour intervals
        const labels = [];
        for (let i = 1; i <= 12; i++) {
            labels.push(`${i} hour`);
        }


        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Radar 1',
                        data: [],
                        backgroundColor: gradient1,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.4, // This makes the line rounded
                    },
                    {
                        label: 'Radar 2',
                        data: [],
                        backgroundColor: gradient2,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.4, // This makes the line rounded
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function updateChartData(topic, value) {
            if (topic === '{{$reliver->qrcode}}/Radar1') {
                myChart.data.datasets[0].data.push(value);
                if (myChart.data.datasets[0].data.length > labels.length) {
                    myChart.data.datasets[0].data.shift();
                }
            } else if (topic === '{{$reliver->qrcode}}/Radar2') {
                myChart.data.datasets[1].data.push(value);
                if (myChart.data.datasets[1].data.length > labels.length) {
                    myChart.data.datasets[1].data.shift();
                }
            }
            myChart.update();
        }
        });
    </script>

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
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'reliver_id',
                    name: 'reliver_id'
                },
                {
                    data: 'reliver.junction_house_no',
                    name: 'reliver.junction_house_no'
                },
                {
                    data: 'radar_1',
                    name: 'radar_1'
                },
                {
                    data: 'radar_2',
                    name: 'radar_2'
                },
                {
                    data: 'radar_3',
                    name: 'radar_3'
                },
                {
                    data: 'radar_4',
                    name: 'radar_4'
                },
                {
                    data: 'blaster_1',
                    name: 'blaster_1'
                },
                {
                    data: 'blaster_2',
                    name: 'blaster_2'
                },
                {
                    data: 'blaster_3',
                    name: 'blaster_3'
                },
                {
                    data: 'blaster_4',
                    name: 'blaster_4'
                },
                {
                    data: 'blaster_5',
                    name: 'blaster_5'
                },
                {
                    data: 'blaster_6',
                    name: 'blaster_6'
                },
                {
                    data: 'blaster_7',
                    name: 'blaster_7'
                },
                {
                    data: 'blaster_8',
                    name: 'blaster_8'
                },
                {
                    data: 'pressure_1',
                    name: 'pressure_1'
                },
                {
                    data: 'pressure_2',
                    name: 'pressure_2'
                },
                {
                    data: 'pressure_3',
                    name: 'pressure_3'
                },
                {
                    data: 'pressure_4',
                    name: 'pressure_4'
                },
                {
                    data: 'pressure_5',
                    name: 'pressure_5'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                }
            ]
        });
    </script>

    <script></script>


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
@endpush

@extends('layouts.app')
@push('CSS')
    <style>
        /* body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        } */

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
            width: 100%;
            height: 100%;
        }

        #myChart {
            width: 100%;
            height: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pressure Live </h4>
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center">
                            <div id="gauge1" class="gauge"></div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center">
                            <div id="gauge2" class="gauge"></div>
                        </div>

                        <div class="col-md-3 d-flex justify-content-center">
                            <div id="gauge3" class="gauge"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Radar Live </h4>
                    <div id="myChartContainer">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            @include('admin.reliver.mqttData')
        </div>

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

            const clientId = `{{ env('MQTT_CLIENT_ID') }}`;
            const host = `wss://{{ env('MQTT_HOST') }}:{{ env('MQTT_PORT') }}/mqtt`;
            const options = {
                clientId: clientId,
                username: `{{ env('MQTT_AUTH_USERNAME') }}`,
                password: `{{ env('MQTT_AUTH_PASSWORD') }}`,
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
            for (let i = 1; i <= 60; i++) {
                labels.push(`${i} seconds`);
            }

            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
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
                if (topic === '{{ $reliver->qrcode }}/Radar1') {
                    myChart.data.datasets[0].data.push(value);
                    if (myChart.data.datasets[0].data.length > labels.length) {
                        myChart.data.datasets[0].data.shift();
                    }
                } else if (topic === '{{ $reliver->qrcode }}/Radar2') {
                    myChart.data.datasets[1].data.push(value);
                    if (myChart.data.datasets[1].data.length > labels.length) {
                        myChart.data.datasets[1].data.shift();
                    }
                }
                myChart.update();
            }
        });
    </script>

    @include('admin.reliver.datatable-js')
@endpush

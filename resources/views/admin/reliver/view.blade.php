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
            margin-top: 45px;
        }

        .slider-container {
            width: 100%;
            text-align: center;
            margin-top: 20px;
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

    {{-- Themometer Guage Code --}}

    <style>
        @import url("https://fonts.googleapis.com/css?family=Jaldi&display=swap");
        /* body {
      display: flex;
      height: 100vh;
      margin: 0;
      background: #3d3d44;
      font-family: "Jaldi", sans-serif;
      font-size: 14px;
      color: white;
    } */

        #wrapper {
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 250px;
        }


        #info {
            opacity: 0.2;
            margin: 0;
            text-align: center;
        }

        #termometer {
            width: 25px;
            background: #38383f;
            height: 240px;
            position: relative;
            border: 9px solid #2a2a2e;
            border-radius: 20px;
            z-index: 1;
            margin-bottom: 50px;
        }

        #termometer:before,
        #termometer:after {
            position: absolute;
            content: "";
            border-radius: 50%;
        }

        #termometer:before {
            width: 100%;
            height: 34px;
            bottom: 9px;
            background: #38383f;
            z-index: -1;
        }

        #termometer:after {
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            background-color: #3dcadf;
            bottom: -41px;
            border: 9px solid #2a2a2e;
            z-index: -3;
            left: 50%;
        }

        #termometer #graduations {
            height: 59%;
            top: 20%;
            width: 50%;
        }

        #termometer #graduations,
        #termometer #graduations:before {
            position: absolute;
            border-top: 2px solid rgba(0, 0, 0, 0.5);
            border-bottom: 2px solid rgba(0, 0, 0, 0.5);
        }

        #termometer #graduations:before {
            content: "";
            height: 34%;
            width: 100%;
            top: 32%;
        }

        #termometer #temperature {
            bottom: 0;
            background: linear-gradient(#f17a65, #3dcadf) no-repeat bottom;
            width: 100%;
            border-radius: 20px;
            background-size: 100% 240px;
            transition: all 0.2s ease-in-out;
        }

        #termometer #temperature,
        #termometer #temperature:before,
        #termometer #temperature:after {
            position: absolute;
        }

        #termometer #temperature:before {
            content: attr(data-value);
            background: rgba(0, 0, 0, 0.7);
            color: white;
            z-index: 2;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 1em;
            line-height: 1;
            transform: translateY(50%);
            left: calc(100% + 1em / 1.5);
            top: calc(-1em + 5px - 5px * 2);
        }

        #termometer #temperature:after {
            content: "";
            border-top: 0.4545454545em solid transparent;
            border-bottom: 0.4545454545em solid transparent;
            border-right: 0.6666666667em solid rgba(0, 0, 0, 0.7);
            left: 100%;
            top: calc(-1em / 2.2 + 5px);
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
                            <h6>Pressure 1</h6>
                            <div id="gauge1" class="gauge"></div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center">
                            <h6>Pressure 2</h6>
                            <div id="gauge2" class="gauge"></div>
                        </div>

                        <div class="col-md-3 d-flex justify-content-center">
                            <h6>Pressure 3</h6>
                            <div id="gauge3" class="gauge"></div>
                        </div>

                        <div class="col-md-3 d-flex justify-content-center">
                            <h6>Temperature</h6>
                            <div id="wrapper">
                                <div id="termometer" style="width: 32px;">
                                    <div id="temperature" style="max-height: 100%;" data-value="0°C"></div>
                                    <div id="graduations"></div>
                                </div>

                            </div>
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

            function sendNotification(message) {
                $.ajax({
                    url: "{{route('reliver.send-notification')}}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        message: message
                    },
                    success: function (response) {
                        console.log(response.status);
                    }
                });
            }
            const units = {
                Celcius: "°C",
                Fahrenheit: "°F"
            };

            const config = {
                minTemp: -0,
                maxTemp: 60,
                unit: "Celcius",
                currentTemp: 42 // Initial temperature value
            };

            // Change temperature manually
            $("#temperature").on("click", function() {
                config.currentTemp = (config.currentTemp + 1) % (config.maxTemp + 1);
                setTemperature();
            });

            // Switch unit of temperature manually
            $("#temperature").on("contextmenu", function(e) {
                e.preventDefault();
                config.unit = config.unit === "Celcius" ? "Fahrenheit" : "Celcius";
                setTemperature();
            });

            function setTemperature(value) {
                let height = (value - config.minTemp) / (config.maxTemp - config.minTemp) * 100 + "%";
                $("#temperature").attr("data-value", value + units[config.unit]);
                if (height > 60) {
                    height = 60;
                }
                console.log(height);
                $("#temperature").css("height", height);
            }

            // setTemperature(50); // Initial setup
            // setInterval(() => {
            //     setTemperature(parseInt(Math.random() * 100))
            // }, 1000)

            var g1 = new JustGage({
                id: "gauge1",
                value: 0,
                min: 0,
                max: 200,
                title: "Gauge 1",
                label: "",
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
                label: "",
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
                label: "",
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
                let temprature = parseFloat($('#Temperature').text());
                setTemperature(temprature)
                // alert(pressure1,pressure2)
                if(pressure1 > 50) {
                    sendNotification('The Pressure 1 Level is Greater Then 50');
                }

                if(pressure2 > 50) {
                    sendNotification('The Pressure 2 Level is Greater Then 50');
                }

                if(pressure3 > 50) {
                    sendNotification('The Pressure 3 Level is Greater Then 50');
                }
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
                labels.push(`${i} sec`);
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

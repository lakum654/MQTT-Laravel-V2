@extends('layouts.app')
@push('CSS')
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
            <div id="wrapper">
                <div id="termometer">
                    <div id="temperature" style="max-height: 100%" data-value="0°C"></div>
                    <div id="graduations"></div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('JS')
<script>
        $(document).ready(function () {
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
            $("#temperature").on("click", function () {
                config.currentTemp = (config.currentTemp + 1) % (config.maxTemp + 1);
                setTemperature();
            });

            // Switch unit of temperature manually
            $("#temperature").on("contextmenu", function (e) {
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
            setInterval(() => {
                setTemperature(parseInt(Math.random() * 100))
            }, 1000)
        });
    </script>
@endpush

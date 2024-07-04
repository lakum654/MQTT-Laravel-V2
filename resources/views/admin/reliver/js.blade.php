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
            if(height > 60) {
                height = 60;
            }
            console.log(height);
            $("#temperature").css("height", height);
        }

        // setTemperature(50); // Initial setup
        setInterval(() => {
            // setTemperature(parseInt(Math.random() * 100))
        },1000)
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

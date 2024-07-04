<style>
    .table-responsive::-webkit-scrollbar {
        width: 12px;
    }
    .table-responsive::-webkit-scrollbar-track {
        background: #555;
    }
    .table-responsive::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
<div class="card">
    <div class="card-body">
        <h4 class="card-title float-left">{{ $moduleName }} Works {{$reliver->qrcode}}</h4>
        <div class="card-tools">
            <button type="button" class="btn btn-outline-primary btn-fw float-right" id="refreshBtn">Refresh</button>
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

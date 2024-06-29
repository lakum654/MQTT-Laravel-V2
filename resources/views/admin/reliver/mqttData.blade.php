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
                        <td id="Radar1" data-topic="{{ $reliver->qrcode }}/Radar1"></td>
                        <td id="Radar2" data-topic="{{ $reliver->qrcode }}/Radar2"></td>
                        <td id="BlasterA1" data-topic="{{ $reliver->qrcode }}/BlasterA1"></td>
                        <td id="BlasterB1" data-topic="{{ $reliver->qrcode }}/BlasterB1"></td>
                        <td id="BlasterC1" data-topic="{{ $reliver->qrcode }}/BlasterC1"></td>
                        <td id="BlasterD1" data-topic="{{ $reliver->qrcode }}/BlasterD1"></td>
                        <td id="Pressure1" data-topic="{{ $reliver->qrcode }}/Pressure1">0</td>
                        <td id="Pressure2" data-topic="{{ $reliver->qrcode }}/Pressure2">0</td>
                        <td id="Pressure3" data-topic="{{ $reliver->qrcode }}/Pressure3">0</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

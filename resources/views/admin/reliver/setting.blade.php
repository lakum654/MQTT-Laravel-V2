@extends('layouts.app')

@push('CSS')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Reliver Notification Setting</h4>
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" method="POST" action="{{ route('reliver.setting.update') }}">
                            @csrf
                            <input type="hidden" name="reliver_id" value="{{ $reliver->id }}">

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="junctionHouseNo">Junction House No</label>
                                    <input type="text" class="form-control" id="junctionHouseNo"
                                        placeholder="Junction House No" name="junction_house_no"
                                        value="{{ old('junction_house_no', $reliver->junction_house_no) }}">
                                    @error('junction_house_no')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="pressure1">Pressure 1</label>
                                    <input type="number" step="any" class="form-control" id="pressure1" placeholder="Pressure 1" name="pressure1" value="{{ old('pressure1',$reliver?->setting?->pressure1) }}">
                                    @error('pressure1')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="pressure2">Pressure 2</label>
                                    <input type="number" step="any" class="form-control" id="pressure2" placeholder="Pressure 2" name="pressure2" value="{{ old('pressure2',$reliver?->setting?->pressure2) }}">
                                    @error('pressure2')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="pressure3">Pressure 3</label>
                                    <input type="number" step="any" class="form-control" id="pressure3" placeholder="Pressure 3" name="pressure3" value="{{ old('pressure3',$reliver?->setting?->pressure3) }}">
                                    @error('pressure3')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="radar1">Radar 1</label>
                                    <input type="number" step="any" class="form-control" id="radar1" placeholder="Radar 1" name="radar1" value="{{ old('radar1',$reliver?->setting?->radar1) }}">
                                    @error('radar1')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="radar2">Radar 2</label>
                                    <input type="number" step="any" class="form-control" id="radar2" placeholder="Radar 2" name="radar2" value="{{ old('radar2',$reliver?->setting?->radar2) }}">
                                    @error('radar2')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="blasterA1">Blaster A 1</label>
                                    <input type="number" step="any" class="form-control" id="blasterA1" placeholder="Blaster A 1" name="blasterA1" value="{{ old('blasterA1',$reliver?->setting?->blasterA1) }}">
                                    @error('blasterA1')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="blasterB1">Blaster B 1</label>
                                    <input type="number" step="any" class="form-control" id="blasterB1" placeholder="Blaster B 1" name="blasterB1" value="{{ old('blasterB1',$reliver?->setting?->blasterB1) }}">
                                    @error('blasterB1')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="blasterC2">Blaster C 2</label>
                                    <input type="number" step="any" class="form-control" id="blasterC2" placeholder="Blaster C 2" name="blasterC2" value="{{ old('blasterC2',$reliver?->setting?->blasterC2) }}">
                                    @error('blasterC2')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="blasterD2">Blaster D 2</label>
                                    <input type="number" step="any" class="form-control" id="blasterD2" placeholder="Blaster D 2" name="blasterD2" value="{{ old('blasterD2',$reliver?->setting?->blasterD2) }}">
                                    @error('blasterD2')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="temperature">Temperature</label>
                                    <input type="number" step="any" class="form-control" id="temperature" placeholder="Temperature" name="temperature" value="{{ old('temperature',$reliver?->setting?->temperature) }}">
                                    @error('temperature')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="notification">Notification {{$reliver?->setting?->is_on}}</label><br>
                                    <input type="checkbox" name="is_on" id="notification" value="{{old('is_on', $reliver?->setting?->is_on)}}"  @if($reliver?->setting?->is_on) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                    @error('is_on')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <a class="btn btn-dark" href="{{ route($routeName) }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('JS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<script>
    $(document).ready(function() {
        $("[name='is_on']").bootstrapSwitch();
    });
</script>
@endpush

@extends('layouts.app')

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
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $reliver->id }}">

                            <div class="form-group">
                                <label for="junctionHouseNo">Junction House No</label>
                                <input type="text" class="form-control" id="junctionHouseNo"
                                    placeholder="Junction House No" name="junction_house_no"
                                    value="{{ old('junction_house_no', $reliver->junction_house_no) }}">
                                @error('junction_house_no')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="pressure1">Pressure 1</label>
                                    <input type="number" class="form-control" id="pressure1" placeholder="Pressure 1" name="pressure1" value="{{ old('pressure1') }}">
                                    @error('pressure1')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="pressure2">Pressure 2</label>
                                    <input type="number" class="form-control" id="pressure2" placeholder="Pressure 2" name="pressure2" value="{{ old('pressure2') }}">
                                    @error('pressure2')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="pressure3">Pressure 3</label>
                                    <input type="number" class="form-control" id="pressure3" placeholder="Pressure 3" name="pressure3" value="{{ old('pressure3') }}">
                                    @error('pressure3')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a class="btn btn-dark" href="{{ route($routeName) }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('JS')
@endpush

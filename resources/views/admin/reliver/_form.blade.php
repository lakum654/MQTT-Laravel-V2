@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Reliver</h4>
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" method="POST" action="{{ route('reliver.update', $reliver->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="junctionHouseNo">Junction House No</label>
                                <input type="text" class="form-control" id="junctionHouseNo"
                                    placeholder="Junction House No" name="junction_house_no"
                                    value="{{ old('junction_house_no', $reliver->junction_house_no) }}">
                                @error('junction_house_no')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="airBlasterCount">Air Blaster Count</label>
                                <input type="text" class="form-control" id="airBlasterCount"
                                    placeholder="Air Blaster Count" name="air_blaster_count"
                                    value="{{ old('air_blaster_count', $reliver->air_blaster_count) }}">
                                @error('air_blaster_count')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="compressor">Compressor</label>
                                <input type="text" class="form-control" id="compressor" placeholder="Compressor"
                                    name="compressor" value="{{ old('compressor', $reliver->compressor) }}">
                                @error('compressor')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="qrcode">QRCode</label>
                                <input type="text" class="form-control" id="qrcode" placeholder="QR Code"
                                    name="qrcode" value="{{ old('qrcode', $reliver->qrcode) }}">
                                @error('qrcode')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
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

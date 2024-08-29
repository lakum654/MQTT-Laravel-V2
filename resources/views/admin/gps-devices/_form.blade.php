@extends('layouts.app')

@push('CSS')
<!-- Tagify CSS -->
<link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css">
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Device</h4>
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" method="POST" action="{{ route('gps-device.update',$device->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name"
                                    name="name" value="{{old('name',$device->name)}}">
                                @error('name')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">Optional Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Optional Name"
                                    name="optional" value="{{old('optional',$device->optional)}}">
                                @error('optional')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label for="employees">Assign Employees</label>
                                <div class="row">
                                    @php
                                        $chunkedEmployees = auth()->user()->employees->chunk(5);
                                    @endphp
                                    @foreach ($chunkedEmployees as $employeeChunk)
                                        <div class="col-md-2">
                                            @foreach ($employeeChunk as $employee)
                                                                                               <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="employee_ids[]" value="{{ $employee->id }}">
                                                    <label class="form-check-label" for="employee{{ $employee->id }}">
                                                        {{ $employee->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label for="exampleInputUsername1">Assign Emails</label>
                                <input type="text" class="form-control" id="emailsInput" placeholder="Assign To Emails"
                                    name="emails" value="{{old('emails',$device->emails)}}">
                                @error('emails')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a class="btn btn-dark" href="{{ route($routeName) }}"><button
                                    class="btn btn-dark">Cancel</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('JS')
<!-- Tagify JavaScript -->
<script src="https://unpkg.com/@yaireo/tagify"></script>

<script>
    // Initialize Tagify on the input field
    var input = document.getElementById('emailsInput');
    var tagify = new Tagify(input, {
        pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/, // Email pattern
        delimiters: ",", // Use comma to separate tags
        maxTags: 10, // Limit the number of emails
        dropdown: {
            enabled: 0 // Disable dropdown
        }
    });
</script>
@endpush

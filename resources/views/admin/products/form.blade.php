@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Products</h4>
                        <form class="forms-sample" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file form-control" id="image" name="image">
                                @error('image')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" placeholder="Price" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" id="desc" name="desc" rows="4">{{ old('desc') }}</textarea>
                                @error('desc')
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
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('desc');
    </script>
@endpush

@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ isset($gallery) ? 'Edit' : 'Add New' }} Gallery</h4>
                        <form class="forms-sample" method="POST" action="{{ isset($gallery) ? route('gallery.update', $gallery->id) : route('gallery.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($gallery))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $gallery->title ?? '') }}">
                                @error('title')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file form-control" id="image" name="image">
                                @if(isset($gallery) && $gallery->image)
                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image" width="100px" height="100px">
                                @endif
                                @error('image')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" id="desc" name="desc" rows="4">{{ old('desc', $gallery->desc ?? '') }}</textarea>
                                @error('desc')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">{{ isset($gallery) ? 'Update' : 'Submit' }}</button>
                            <a class="btn btn-dark" href="{{ route('gallery.index') }}">Cancel</a>
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

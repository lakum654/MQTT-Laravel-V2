@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Blog</h4>
                        <form class="forms-sample" method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="select2" style="width:100%" name="category_id">
                                    <option value="">Select Category</option>
                                  @foreach ($categories as $value)
                                    <option value="{{old('category_id',$value->id)}}">{{$value->name}}</option>
                                  @endforeach
                                </select>

                                @error('category_id')
                                    <label class="error text-danger">{{$message}}</label>
                                @enderror
                              </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" id="desc" placeholder="Description" name="desc">{{ old('desc') }}</textarea>
                                @error('desc')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <input type="text" class="form-control" id="tags" placeholder="Tags" name="tags" value="{{ old('tags') }}">
                                @error('tags')
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

@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ isset($category) ? 'Edit' : 'Add New' }} Category</h4>
                        <form class="forms-sample" method="POST" action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}">
                            @csrf
                            @if(isset($category))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}">
                                @error('name')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">{{ isset($category) ? 'Update' : 'Submit' }}</button>
                            <a href="{{ route($routeName) }}" class="btn btn-dark">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

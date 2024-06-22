@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New User</h4>
                  {{-- <p class="card-description"> Basic form layout </p> --}}
                  <form class="forms-sample" method="POST" action="{{ route('users.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Select Role</label>
                        <select class="select2" style="width:100%" name="role_id">
                          @foreach ($roles as $value)
                            <option value="{{old('role_id',$value->id)}}">{{$value->name}}</option>
                          @endforeach
                        </select>

                        @error('role_id')
                            <label class="error text-danger">{{$message}}</label>
                        @enderror
                      </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name="name">
                      @error('name')
                            <label class="error text-danger">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                      @error('email')
                            <label class="error text-danger">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                      @error('password')
                            <label class="error text-danger">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Confirm Password</label>
                      <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password" name="password_confirmation">
                      @error('password_confirmation')
                            <label class="error text-danger">{{$message}}</label>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-dark" href="{{ route($routeName)}}"><button class="btn btn-dark">Cancel</button></a>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection

@push('JS')

@endpush

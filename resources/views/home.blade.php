@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if(auth()->user()->hasRole('admin'))
                      <h2>Welcome To {{auth()->user()->roles()->first()->name}} Role Dashboard</h2>
                    @endif

                    @if(auth()->user()->hasRole('user'))
                      <h2>Welcome To {{auth()->user()->roles()->first()->name}} Role Dashboard</h2>
                    @endif

                    @if(auth()->user()->hasRole('unverified'))
                      <h2>Welcome To {{auth()->user()->roles()->first()->name}} Role Dashboard</h2>
                    @endif

                    @if(auth()->user()->hasRole('editor'))
                      <h2>Welcome To {{auth()->user()->roles()->first()->name}} Role Dashboard</h2>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

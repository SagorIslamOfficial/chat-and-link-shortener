@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <ul class="text-center">
                        <li class="d-inline"><a class="text-decoration-none text-primary" href="{{ url('/chatify') }}">Chat Web App</a></li>
                        <li class="d-inline p-2"><a class="text-decoration-none text-primary" href="{{ route('index') }}">Url Shortener Web App</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a class="text-black" href="{{ url('/dashboard') }}">{{ __('Link Shortener Dashboard') }}</a></div>

                    <div class="card-body pt-5 mb-3">
                        <form action="{{ route('original-link') }}" method="post">
                            @csrf

                            <div class="text-success text-center pb-2">
                                @if(session('success_message'))
                                    {{ session('success_message') }}
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="original_link" class="col-sm-2 col-form-label">Original Link</label>
                                <div class="col-sm-8" style="margin-right: 1%">
                                    <input type="url" name="original_link" class="form-control"
                                           id="original_link" placeholder="Enter ur link">

                                    @error('original_link')
                                        <span class="text-danger m-2 p-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{--List of Links--}}
                    @if($linkShortener->count() > 0)
                        <div class="pt-2">
                            <hr>
                            <table class="table pt-5" style="margin-top: 5% !important;">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Original Link</th>
                                    <th scope="col">Short Link</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($linkShortener as $key => $link)
                                    <tr>
                                        <th scope="row">{{ $key +1 }}</th>
                                        <td>{{ $link->original_link }}</td>
                                        <td>{{ $link->short_link }}</td>
                                        <td>
                                            <form class="d-inline" action="{{ route('destroy', $link->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

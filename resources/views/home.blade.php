@extends('layouts.home.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('trans.dashboard')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="btn btn-danger">@lang('trans.logout')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

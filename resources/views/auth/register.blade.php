@extends('layouts.home.app')
@section('content')
<?php
    $orgnaizitions = \App\Models\Orgnaizition::select('name','id')->get();
    $branches = \App\Models\Branch::select('name','id')->get();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">@lang('trans.register')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">@lang('trans.name')</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="phone" class="col-md-4 col-form-label">@lang('trans.phone')</label>
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <select name="orgnaizition" class="form-control">
                                <option disabled selected>-- @lang('trans.choose_orgnaizition') --</option>
                                @foreach($orgnaizitions as $orgnaizition)
                                    <option value="{{$orgnaizition->id}}">{{$orgnaizition->name}}</option>
                                @endforeach
                            </select>
                        
                                @error('orgnaizition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <select name="branch" class="form-control">
                                <option disabled selected>-- @lang('trans.choose_branch') --</option>
                                @foreach($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>             @endforeach

                            </select>
                                @error('barnch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group ">
                            <label for="password" class="col-md-4 col-form-label">@lang('trans.password')</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">@lang('trans.confirm_password')</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label mx-4" for="remember">
                                        @lang('trans.remeber_me')                                        
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group  mb-0">
                            <div class="col-md-8 offset-md-4 ">
                                <button type="submit" class="btn btn-primary">
                                    @lang('trans.register')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
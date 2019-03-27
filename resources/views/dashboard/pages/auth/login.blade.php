@extends('dashboard.layouts.app')

@section('body_class', 'login-page')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-6 mx-auto">
            <div class="card">
                
                <div class="card-header">@lang('labels.user.login')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label">@lang('validation.attributes.email')</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" required placeholder="{{ __('validation.attributes.email') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label">@lang('validation.attributes.password')</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" required placeholder="{{ __('validation.attributes.password') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 ml-auto">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" value="1">
                                    <label class="custom-control-label" for="remember">{{ __('labels.user.remember') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 ml-auto">
                                <button  class="btn btn-primary">
                                    @lang('labels.user.login')
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    @lang('labels.user.password_forgot')
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

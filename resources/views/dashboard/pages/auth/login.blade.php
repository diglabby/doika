@extends('dashboard.layouts.ssr')

@section('body')
    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="card-logo">
                                    <img src="{{ asset('images/Dbai-logo.png') }}" />
                                </div>

                                <h1>@lang('labels.admin.login.header')</h1>

                                <div class="form-group">
                                    <label for="email">@lang('labels.admin.login.email')</label>
                                    {{ Form::bsEmail('email', null, ['required', 'placeholder' => __('labels.admin.login.placeholder.email')]) }}
                                </div>

                                <div class="form-group">
                                    <label for="password">
                                        @lang('labels.admin.login.password')
                                    </label>
                                    {{ Form::bsPassword('password', ['required', 'placeholder' => __('labels.admin.login.placeholder.password')]) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::bsCheckbox('remember', __('labels.admin.login.remember')) }}
                                </div>

                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary"><i class="fe fe-log-in"></i>&nbsp;@lang('buttons.admin.login.submit')</button>
                                    <!--
                                    <a href="{{ route('password.reset', 'token') }}" class="ml-auto small">
                                        @lang('labels.admin.login.reset.link')
                                    </a>
                                    -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

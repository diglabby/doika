@extends('layouts.backend')

<!-- Main Content -->
@section('body')
    <div class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                <h1>@lang('labels.admin.login.reset.header')</h1>
                                <div class="form-group">
                                    <label for="email">@lang('labels.admin.login.email')</label>
                                    {{ Form::bsEmail('email', null, ['required', 'placeholder' => __('labels.admin.login.placeholder.email')]) }}
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('labels.admin.login.reset.submit')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

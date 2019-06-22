@extends('dashboard.layouts.ssr')

@section('body')
    <div class="row">
        <div class="col-md-12 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-header">@lang('labels.admin.send_password_link')</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            {{ Form::bsEmail('email', null, ['required', 'placeholder' => __('labels.admin.password_set_email')]) }}
                        </div>

                        <div class="form-group">
                            <button  class="btn btn-primary">
                                @lang('labels.admin.send_password_link')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
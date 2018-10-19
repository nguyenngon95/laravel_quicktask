@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.login')</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'login', 'method' => 'post']) !!}

                        <div class="form-group row">
                            {!! Form::label('email', trans('messages.email_address'), ['class' => 'col-sm-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), ['id' => 'email', 'required', 'autofocus', 'class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : '')]) !!}

                                @include('errors.error')
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', trans('messages.password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', ['id' => 'password', 'required', 'class' => 'form-control'. ($errors->has('password') ? ' is-invalid' : '')]) !!}

                                @include('errors.error')
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {!! Form::checkbox('remember', '', (old('remember') ? 'checked' : ''), ['id' => 'remember', 'class' => 'form-check-input']) !!}

                                    {!! Form::label('remember', trans('messages.remember'), ['class' => 'form-check-label']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit(trans('messages.login'), ['class' => 'btn btn-primary']) !!}

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    @lang('messages.forgot_password')
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

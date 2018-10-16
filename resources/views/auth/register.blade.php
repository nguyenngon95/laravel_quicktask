@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.register')</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'register', 'method' => 'post']) !!}

                        <div class="form-group row">
                            {!! Form::label('name', trans('messages.name'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), ['id' => 'name', 'required', 'autofocus', 'class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : '')]) !!}

                                @include('errors.error')
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('email', trans('messages.email_address'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), ['id' => 'email', 'required', 'class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : '')]) !!}

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
                            {!! Form::label('password-confirm', trans('messages.confirm_password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['id' => 'password-confirm', 'required', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit(trans('messages.register'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

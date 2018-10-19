@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.verify_email_address')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('messages.send_email_address')
                        </div>
                    @endif

                    @lang('messages.check_email')
                    @lang('messages.not_receive_email'), <a href="{{ route('verification.resend') }}">@lang('messages.request_another')</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

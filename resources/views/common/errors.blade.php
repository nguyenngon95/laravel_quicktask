@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>@lang('messages.whoop')</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('err'))
    <p class="alert alert-danger">{{Session::get('err')}}</p>
@endif
@if (Session::has('suc'))
    <p class="alert alert-success">{{Session::get('suc')}}</p>
@endif

@extends('layouts.app')

@section('content')
    <div class="panel-body">
        @include('common.errors')

        {!! Form::open(['url' => 'tasks', 'method' => 'post', 'class' => 'form-horizontal']) !!}

            <div class="form-group">
                {!! Form::label('task-name', trans('messages.task'), ['class' => 'col-sm-3 control-label']) !!}

                <div class="col-sm-6">
                    {!! Form::text('name', '', ['id' => 'task-name', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {{ Form::submit(trans('messages.add_task'), ['class' => 'btn btn-default']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    @if (count($tasks) > config('confignumber.zero'))
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('messages.current_task')
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <thead>
                        <th>@lang('messages.task')</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

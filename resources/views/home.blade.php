@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Send Money</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'send']) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail Address or Phone Number') !!}
                        {!! Form::text('email_phone', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('amount', 'Amount') !!}
                        {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Send', ['class' => 'btn btn-info']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('app')

@section('content')
    <h2>Lägg till rum</h2>

	{!! Form::open(['url' => 'rooms','files'=>true]) !!}
        <div class="form-group greybg {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name', 'Namn:') !!}
            {!! Form::text('name', (isset($room->name) ? $room->name : ' '), ['class' => 'form-control']) !!}
        </div>

		<div class="form-group greybg">
		  {!! Form::file('img','',array('id'=>'','class'=>'')) !!}
		</div>

        <div class="form-group greybg">
            {!! Form::label('info', 'info:') !!}
            {!! Form::textarea('info', (isset($room->info) ? $room->info : ' '), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group greybg">
            {!! Form::label('rate', 'rate:') !!}
            {!! Form::text('rate', (isset($room->rate) ? $room->rate : ' '), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group greybg">
	        <button type="submit" name="submit" value="{{ (isset($room->id) ? $room->id : ' ') }}" class="btn btn-primary form-control">Spara</button>
		</div>

    {!! Form::close() !!}

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
@stop
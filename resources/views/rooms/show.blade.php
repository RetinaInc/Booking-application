@extends('app')

@section('content')

	<h2>Rum {{ $room->name }}</h2>
	
	<p>{{ $room->rate }} SEK per person och natt</p>
	<p>{{ $room->info }}</p>
	<a href="{{ action('RoomsController@index') }}">Tillbaka</a>

	<div class="images">
		@foreach($files as $file)
			<a href="{{ $file }}" data-lightbox="{{ $room->id }}" data-title="{{ $room->name }}">
				<img src="{{ $file }}" alt="{{ $room->name }}" class="objectimg">
			</a>
		@endforeach
	</div>

@stop
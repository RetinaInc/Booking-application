@extends('app')

@section('content')

	<h1>Dina val:</h1>
	<h2>Rum: {{ $room->name }} <br><small>{{ $room->rate }} SEK per person och natt</small></h2>
	<h2>Datum: {{ $startDate }} - {{ $endDate }}</h2>

@stop
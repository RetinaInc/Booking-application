@extends('app')

@section('content')

<div class="row">
	
	<h1>Välj rum</h1>

	@foreach($rooms as $room)
		
		<a href="{{ action('RoomsController@show', [$room->id]) }}">
			<div class="col-sm-3 singlesearch">
				<div class="img" style="background-image: url({{ $file[$room->id] }})"></div>
			    <h4>Rum {{ $room->name }}</h4>
		    	<p>Pris: {{ $room->rate }} SEK per person och natt</p>
		    	<p>Sängplatser: {{ $room->beds }}</p>
			</div>
		</a>

	@endforeach 

</div>

<script>
	$(document).ready(function(){
	    var highestBox = 0;
	        $('.img').each(function(){  
	                if($(this).width() > highestBox){  
	                highestBox = $(this).width();  
	        }
	    });    
	    $('.img').height(highestBox);
	});
</script>

@stop
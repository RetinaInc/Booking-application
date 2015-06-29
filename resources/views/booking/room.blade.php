<div class="step chooseroom row">
	
	<h1>Välj rum <small id="date"></small></h1>

	@foreach($rooms as $room)
		
		<div class="col-sm-3 singlesearch">
			<div class="img" style="background-image: url({{ $file[$room->id] }})"></div>
		    <h4>Rum {{ $room->name }}</h4>
	    	<p>Pris: {{ $room->rate }} SEK per person och natt</p>
	    	<p>Sängplatser: {{ $room->beds }}</p>
			<div id="ck-button">
			   <label>
			      <input type="radio" name="room" value="{{ $room->name }}"><span class="form-control">Välj</span>
			   </label>
			</div>
		</div>

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
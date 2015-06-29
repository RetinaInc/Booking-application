<div class="step chooseroom row">
	
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

	<h1>Välj rum <small id="date"></small></h1>

	{!! Form::open(['url' => 'book']) !!}

		<input type="text" class="hidden" name="startDate" id="startDate1" value="" />
		<input type="text" class="hidden" name="endDate" id="endDate1" value="" />

		@foreach($rooms as $room)
			
			<div class="col-sm-3 singlesearch">
				<div class="img" style="background-image: url({{ $file[$room->id] }})"></div>
			    <h4>Rum {{ $room->name }}</h4>
		    	<p>Pris: {{ $room->rate }} SEK per person och natt</p>
		    	<p>Sängplatser: {{ $room->beds }}</p>
				<div id="ck-button">
				   <label>
				      <input type="radio" name="room" value="{{ $room->id }}"><span class="form-control">Välj</span>
				   </label>
				</div>
			</div>
		    
		    <button type="submit" name="submit" value="" class="btn btn-primary form-control">Spara</button>

		@endforeach 

    {!! Form::close() !!}

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

	    $("input#startDate1").val($("input#startDate").val());
	    $("input#endDate1").val($("input#endDate").val());
	});
</script>
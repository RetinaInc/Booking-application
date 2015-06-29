@extends('app')

@section('content')

<meta name="csrf-token" content="<?php echo csrf_token() ?>" />

<div class="step choosedate">

	<h1>Välj datum</h1>

	<div class="input-daterange row" id="datepicker">

		<div class="col-sm-6">
			<label>Incheckningsdatum</label>
		    <input type="text" class="form-control" name="start" id="startDate" />
		</div>
		<div class="col-sm-6">
			<label>Utcheckningsdatum</label>
		    <input type="text" class="form-control" name="end" id="endDate" />
		</div>
	</div>

	<hr>

	<div class="btn btn-lg btn-primary col-sm-6 col-sm-offset-3" id="post">Nästa</div>

</div>

<div id="ajax"></div>

<script>
	// set up jQuery with the CSRF token, or else post routes will fail
	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

	// handlers
	function onPostClick(event)
	{
		// we're passing data with the post route, as this is more normal
		$.post('/book/ajax', {startDate:$("input#startDate").val(), endDate:$("input#endDate").val()}, onSuccess);
	}

	function onSuccess(data, status, xhr)
	{
		// with our success handler, we're just logging the data...
		console.log(data, status, xhr);

		// but you can do something with it if you like - the JSON is deserialised into an object
		$('#ajax').append(data.html);
		$('small#date').html("<br>" + $("input#startDate").val() + " - " + $("input#endDate").val());
		//console.log(String(data.html).toUpperCase())
	}

	// listeners
	$('div#post').on('click', onPostClick);
</script>

<script>
	$( document ).ready(function() {
		$('.input-daterange').datepicker({
		    format: "yyyy-mm-dd",
		    weekStart: 1,
		    startDate: "+0d",
		    endDate: "+1y",
		    todayBtn: "linked",
		    language: "sv"
		    //datesDisabled: ['2015-06-30', '2015-07-20']
		});
	});
</script>

@stop
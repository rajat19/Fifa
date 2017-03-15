@extends('app')
@section('content')
<?php $gs_color = 'red'; ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-5">
						<div class="card-content">
							<span class="card-title">Add a New Player</span>
							<form>
								{{csrf_field()}}
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name="name" id="name">
										<label>Player Name</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<select name="country_id" id="country_id" size="5">
											<option value="" disabled selected>Choose a country</option>
											@foreach ($countryList as $country)
												<option value="{{$country->id}}">{{$country->fullname}} ({{$country->shortname}})</option>
											@endforeach
										</select>
										<label>Country</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<div class="chips chips-autocomplete" id="clubsList"></div>
										<!-- <input type="text" name="clubsList" data-role="materialtags"> -->
										<label>Clubs</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m3">
										<input type="number" maxlength="2" name="rating" id="rating">
										<label>Rating</label>
									</div>
									<div class="input-field col s12 m9">
										<div class="chips chips-autocomplete" id="positionsList"></div>
										<label>Positions</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m4">
										<input type="text" name="goals" id="goals">
										<label>Goals</label>
									</div>
									<div class="input-field col s12 m4">
										<input type="text" name="redcards" id="redcards">
										<label>Red Cards</label>
									</div>
									<div class="input-field col s12 m4">
										<input type="text" name="yellowcards" id="yellowcards">
										<label>Yellow Cards</label>
									</div>
								</div>
							</form>
							<div class="row">
								<div class="input-field col s12">
									<button class="btn waves-effect waves-light {{$gs_color}} lighten-1" id="addPlayer">Add
										<span><i class="fa fa-plus-square"></i></span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@stop

@section('javascripts')
	<script type="text/javascript">
		var data;
		$.get("{{ url('clubs') }}",
		function(response) {
			data = {};
			response.forEach( function(el, i) {
				data[el] = null;
			});
			$('#clubsList').material_chip({
			    autocompleteData: data
			});
		});

		$.get("{{ url('getRole') }}", {
			main: 'ALL'
		}, function(response) {
			data = {};
			response.forEach( function(el, i) {
				data[el] = null;
			});
			$('#positionsList').material_chip({
			    autocompleteData: data
			});
		});

		$('#addPlayer').click(function() {
			var name = $('#name').val();
			var country_id = $('#country_id').val();
			var clubsList = $('#clubsList').material_chip('data');
			var positionsList = $('#positionsList').material_chip('data');
			var rating = $('#rating').val();
			var goals = $('#goals').val();
			var redcards = $('#redcards').val();
			var yellowcards = $('#yellowcards').val();
		});
	</script>
@stop
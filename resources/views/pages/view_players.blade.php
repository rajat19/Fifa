@extends('app')
@section('content')
<?php $gs_color = 'red'; ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-3">
						<div class="card-content">
							<span class="card-title">View Players</span>
							<form action="{{url('players')}}" method="POST">
								{{csrf_field()}}
								<div class="row">
									<div class="input-field col s12">
										<select name="country_id" id="country_id">
											<option value="all">All</option>
											@foreach ($countryList as $country)
												<option value="{{$country->id}}">{{$country->fullname}}</option>
											@endforeach
										</select>
										<label>Country</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="hidden" name="min_ovr" id="min_ovr">
										<input type="hidden" name="max_ovr" id="max_ovr">
										<span class="likelabel">Rating</span>
										<div id="range-input"></div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<select name="position" id="position">
											<option disabled selected value="">Choose position</option>
											<option value="ALL">ALL</option>
											@foreach ($posMain as $position)
												<option value="{{$position}}">{{$position}}</option>
											@endforeach
										</select>
										<label>Position</label>
									</div>
								</div>
								<div class="row" id="fS">
									<div class="input-field col s12" id="fillSub"></div>
								</div>
								<div class="row">
									<div class="input-field col s12">
							    		<button class="btn waves-effect waves-light {{$gs_color}} lighten-1" name="action">View
											<span><i class="fa fa-send"></i></span>
										</button>
							    	</div>
								</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@stop

@section('javascripts')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#fS').hide();
		});
		$('#position').change(function () {
			main = $('#position').val();
			$.get("{{ url('getRole') }}", {
				main: main
			},
			function(response, status) {
				$('#fS').show();
				string = '<select name="role" id="role">' + '<option value="ALL">ALL</option>';
				response.forEach( function(item, index) {
					string = string + '<option value="'+item+'">'+item+'</option>';	
				});
				string += '</select><label>Role</label>';
				$('#fillSub').html(string);
				$('select').material_select();
			});
		});

		var slider = document.getElementById('range-input');
		noUiSlider.create(slider, {
			start: [50, 95],
			connect: true,
			step: 5,
			tooltips: true,
			range: {
				'min': 5,
				'max': 100
			},
		});
		slider.noUiSlider.on('update', function( values, handle ) {
			var v = slider.noUiSlider.get();
			$('#min_ovr').val(v[0]);
			$('#max_ovr').val(v[1]);
		});
	</script>
@stop
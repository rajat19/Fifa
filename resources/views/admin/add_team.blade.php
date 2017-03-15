@extends('app')
@section('content')
<?php $gs_color='red'; ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-5">
						<div class="card-content">
							<span class="card-title">Add a new Team</span>
							<form>
								{{csrf_field()}}
								<div class="row">
									<div class="input-field col s9">
										<input type="text" name="fullname" id="fullname">
										<label>Fullname</label>
									</div>
									<div class="input-field col s3">
										<input type="text" name="shortname" id="shortname">
										<label>Shortname</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<select name="country_id" id="country_id">
											<option value="all">All</option>
											@foreach ($countryList as $country)
												<option value="{{$country->id}}">{{$country->fullname}} ({{$country->shortname}})</option>
											@endforeach
										</select>
										<label>Country</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
          								<input type="text" id="captain" name="captain" class="autocomplete">
					                    <label>Captain</label>
									</div>
								</div>
							</form>
							<div class="row">
								<div class="input-field col s12">
									<button type="submit" class="btn waves-effect waves-light {{$gs_color}} lighten-1" id="addTeam">Add
										<span><i class="fa fa-plus"></i></span>
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
		$(document).ready(function() {
			var captainList;
			$.get("{{ url('captains') }}",
				function(response) {
					captainList = response;
					console.log(captainList);
					da = [];
					for(var i=0; i<captainList.length; i++) {
						da[captainList[i]] = null;
					}
					$('#captain').autocomplete({
					    data: da,
					    limit: 20,
					});
			});
		});

		$('#addTeam').click(function() {
			var fullname = $('#fullname').val();
			var shortname = $('#shortname').val();
			var country_id = $('#country_id').val();
			var captain = $('#captain').val();
			var token = $('input[name=_token]').val();
			$.post("{{ url('team/create') }}", {
				fullname: fullname,
				shortname: shortname,
				country_id: country_id,
				captain: captain,
				_token: token
			}, function(response, status) {
				console.log(response);
				Materialize.toast(response, 3000, 'rounded');
			});
		});
	</script>
@stop
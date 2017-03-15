@extends('app')
@section('content')
<?php $gs_color='red'; ?>
	<div class="container">
		<section>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card z-depth-5">
						<div class="card-content">
							<span class="card-title">Add a New Country</span>
							<form>
								{{csrf_field()}}
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name="fullname" id="fullname">
										<label>Fullname</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name="shortname" id="shortname">
										<label>Shortname</label>
									</div>
								</div>
							</form>
							<div class="row">
								<div class="input-field col s12">
									<button class="btn waves-effect waves-light {{$gs_color}} lighten-1" id="addCountry">Add
										<span><i class="fa fa-globe"></i></span>
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
		$('#addCountry').click(function() {
			var fullname = $('#fullname').val();
			var shortname = $('#shortname').val();
			var token = $('input[name=_token]').val();
			console.log(fullname+' '+shortname);
			$.post("{{ url('country/create') }}", {
				fullname: fullname,
				shortname: shortname,
				_token: token
			}, function(response, status) {
				console.log(response);
				Materialize.toast(response, 3000, 'rounded')
				// swal(data[0], data[1], data[2]);
			});
		});
	</script>
@stop
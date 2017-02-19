@extends('app')
@section('content')
<?php $gs_color = 'red'; ?>
	<div class="container" >
		<section>
			<div class="row">
		        <div class="col s12 m8 offset-m2">
		        	<div class="card z-depth-5" style="opacity: 0.7">
			            <div class="card-content white-text center red accent-3">
			            	<h1>Welcome</h1>
			            	<h4>Fifa Creations</h4>
			            </div>
			            <form action="{{ url('login') }}" method="POST">
			            	{{csrf_field()}}
				            <div class="card-content">
			            		<div class="row">
									<div class="input-field col s12">
										<input type="text" name="email" id="email">
										<label>Email</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="password" name="password" id="password">
										<label>Password</label>
									</div>
								</div>
				            </div>
				            <div class="card-content {{$gs_color}} accent-3 white-text">
				            	<div class="row">
							    	<div class="col s12 m8">
										<a href="{{ url('forgotpassword') }}" class="link-white">Forgotten your password ?</a><br>
										<a href="{{ url('register') }}" class="link-white">Don't have an Account? Sign up Now</a>
							    	</div>
							    	<div class="col s12 m4">
							    		<button class="btn waves-effect waves-light white red-text" id="login" name="btnlogin" type="submit">Login
											<span><i class="fa fa-sign-in"></i></span>
										</button>
							    	</div>
							    </div>
				            </div>
				        </form>
			        </div>
			    </div>
			</div>
		</section>
	</div>
@stop
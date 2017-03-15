<div class="navbar-fixed">
	<ul class="side-nav {{ $g_color }} darken-3" id="mobile">
		<ul class="dropdown-content {{ $g_color }} darken-3">
			
		</ul>

		<li><a href="{{ url('players') }}">Players</a></li>
		<li><a href="{{ url('teams') }}">Teams</a></li>
	</ul>

	<ul class="dropdown-content {{ $g_color }} darken-3" id="dropdown-create">
		<li><a href="{{ url('country/add') }}">Country</a></li>
		<li><a href="{{ url('player/add') }}">Player</a></li>
		<li><a href="{{ url('team/add') }}">Team</a></li>
		<li><a href="{{ url('tournament/add') }}">Tournament</a></li>
		<li><a href="{{ url('position/add') }}">Position</a></li>
	</ul>

	<nav class="{{ $g_color }} darken-3" style="opacity: 0.7">
		<div class="nav-wrapper" style="padding-left: 10px;">
			<a class="brand-logo" href="{{ url('/') }}">Fifa Creations</a>
			<a href="#" data-activates="mobile" class="button-collapse"><span><i class="fa fa-reorder"></i></span></a>

			<ul class="right hide-on-med-and-down" id="nav-mobile" style="padding-right: 10px;">
				<li><a href="{{ url('players') }}">Players</a></li>
				<li><a href="{{ url('teams') }}">Teams</a></li>
				@if(!Auth::guest())
				<li><a href="{{ url('schedule') }}">Schedule</a></li>
				<li><a href="#!" class="dropdown-button" data-activates="dropdown-create">Create<i class="material-icons right">arrow_drop_down</i></a></li>
				<li><a href="{{ url('logout') }}">Logout</a></li>
				@endif
			</ul>
		</div>
	</nav>
</div>
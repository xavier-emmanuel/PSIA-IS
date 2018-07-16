@if(Auth::check())
	@if(Auth::user()->role == 'Applicant')
		@include('layouts.partials._header')
	@elseif(Auth::user()->role == 'Human Resource')
		@include('layouts.partials._hr_header')
	@elseif(Auth::user()->role == 'General Manager')
		@include('layouts.partials._hr_header')
	@endif
@else
	@include('layouts.partials._header')
@endif

<body>
	@if(Auth::check())
		@if(Auth::user()->role == 'Applicant')
			@include('layouts.partials._navbar')
		@elseif(Auth::user()->role == 'Human Resource')
			@include('layouts.partials._hr_navbar')
		@elseif(Auth::user()->role == 'General Manager')
			@include('layouts.partials._gm_navbar')
		@endif
	@else
		@include('layouts.partials._navbar')
	@endif

	@yield('content')
	
	@include('layouts.partials._footer')
	
	@if(Auth::check())
		@if(Auth::user()->role == 'Applicant')
			@include('layouts.partials._scripts')
		@elseif(Auth::user()->role == 'Human Resource')
			@include('layouts.partials._hr_scripts')
		@elseif(Auth::user()->role == 'General Manager')
			@include('layouts.partials._hr_scripts')
		@endif
	@else
		@include('layouts.partials._scripts')
	@endif
</body>
</html>
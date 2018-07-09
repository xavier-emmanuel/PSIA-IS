@include('layouts.partials._hr_header')

<body>
	@include('layouts.partials._hr_navbar')

	@yield('content')
	
	@include('layouts.partials._footer')
	@include('layouts.partials._hr_scripts')
</body>
</html>
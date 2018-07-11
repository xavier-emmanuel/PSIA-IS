@include('layouts.partials._hr_header')

<body>
	@include('layouts.partials._gm_navbar')

	@yield('content')

	@include('layouts.partials._footer')
	@include('layouts.partials._hr_scripts')
</body>
</html>
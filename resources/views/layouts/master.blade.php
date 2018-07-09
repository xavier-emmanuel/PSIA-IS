@include('layouts.partials._header')

<body>
	@include('layouts.partials._navbar')

	@yield('content')
	
	@include('layouts.partials._footer')
	@include('layouts.partials._scripts')
</body>
</html>
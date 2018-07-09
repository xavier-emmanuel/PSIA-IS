	<script src="{{ asset(App::environment('production') ? '/public/vendors/jquery/jquery.min.js' : '/vendors/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset(App::environment('production') ? '/public/vendors/popper/popper.min.js' : '/vendors/popper/popper.min.js') }}"></script>
	<script src="{{ asset(App::environment('production') ? '/public/vendors/bootstrap/bootstrap.min.js' : '/vendors/bootstrap/bootstrap.min.js') }}"></script>

  @yield('scripts')
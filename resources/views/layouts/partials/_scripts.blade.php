	<script src="{{ asset(App::environment('production') ? '/public/vendors/jquery/jquery.min.js' : '/vendors/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset(App::environment('production') ? '/public/vendors/popper/popper.min.js' : '/vendors/popper/popper.min.js') }}"></script>
	<script src="{{ asset(App::environment('production') ? '/public/vendors/bootstrap/bootstrap.min.js' : '/vendors/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset(App::environment('production') ? '/public/vendors/toast-master/js/jquery.toast.js' : '/vendors/toast-master/js/jquery.toast.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/vendors/jquery-validation/dist/jquery.validate.js' : '/vendors/jquery-validation/dist/jquery.validate.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/vendors/jquery-validation/dist/additional-methods.js' : '/vendors/jquery-validation/dist/additional-methods.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/login.js' : '/js/pages/login.js') }}"></script>
  @yield('scripts')
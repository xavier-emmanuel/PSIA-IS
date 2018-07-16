@extends('layouts.master')

@section('stylesheets')
  <style>
    main {
      height: calc(100vh - 163px);
      margin-top: 91px;
    }
  </style>
@endsection

@section('content')
	<main class="container py-5">
    <h2 class="text-center">Verify Account</h2>
    <hr class="line">

    <div class="row justify-content-sm-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <p class="font-weight-bold">Enter the code you received via SMS:</p>
            <form action="frm-verify" id="frm-verify" name="frm_verify">
              <input type="hidden" id="hdn-id" name="hdn_id" value="{{ Auth::user()->id }}">
              <input type="hidden" id="hdn-code" name="hdn_code" value="{{ Auth::user()->v_code }}">
              {{ csrf_field() }}
              <div class="form-group">
                <input type="number" class="form-control" name="verification_code" id="verification-code">
                <small><em>Code has been set to your device via SMS.</em></small>
              </div>
              <div class="action d-flex justify-content-end">
                <button class="btn btn-warning btn-verify" type="submit"><i class="fas fa-check"></i>&nbsp; Verify</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/verify.js' : '/js/pages/verify.js') }}"></script>
@endsection
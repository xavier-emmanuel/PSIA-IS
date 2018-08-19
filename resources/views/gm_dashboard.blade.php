@extends('layouts.master')

@section('stylesheets')
  <style>
    main {
      margin-top: 91px;
    }
  </style>
@endsection

@section('content')
	<main class="container py-5">
    <h2 class="text-center">Evaluated Applicant{{ $data->count() < 2 ? '' : 's'}}</h2>
    <hr class="line">
    @forelse($data as $applicant)
      @php
      if ($applicant->hired == 1 && $applicant->approved == 1) {
        $result = 'Hired';
      } else if ($applicant->hired == 0 && $applicant->approved == 1) {
        $result = 'Approved';
      } else {
        $result = '';
      }
      @endphp
      <div class="card mb-3">
        <div class="card-body d-flex">
          <figure class="mb-0">
            <img src="{{ asset(App::environment('production') ? '/public/uploads/accounts' : '/uploads/accounts') }}/{{ $applicant->image }}" width="192px" height="192px" class="border">
          </figure>
          <div class="info ml-3 w-50">
            <h3 class="font-weight-bold">{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</h3>
            <p class="mb-1"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;{{ $applicant->mobile }}</p>
            <p class="mb-1"><i class="fas fa-envelope"></i>&nbsp;&nbsp;{{ $applicant->email }}</p>
            <p class="mb-1"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;{{ $applicant->address }}</p>
            <p class="mb-1"><i class="fas fa-{{ $applicant->gender == 'Male' ? 'male' : 'female' }}"></i>&nbsp;&nbsp;{{ $applicant->gender }}</p>
            <p><i class="fas fa-smile"></i>&nbsp;&nbsp;{{ $applicant->age }} {{ $applicant->age < 2 ? 'year old' : 'years old'}}</p>
          </div>
          <div class="d-flex flex-column align-items-end w-50">
            <p><em>Applying for: </em><span class="text-primary">&nbsp;{{ $applicant->jobVacancies->name }}</span></p>
            <a class="btn btn-info" id="btn-applicant-form" href="/applicant-form/{{ $applicant->id }}/{{ str_slug($applicant->first_name .' '. $applicant->middle_name .' '. $applicant->last_name) }}" title="View Application" data-id="{{ $applicant->id }}" data-email="{{ $applicant->email }}" data-image="/uploads/accounts/{{ $applicant->image }}.'" data-name="{{ $applicant->first_name }}.' {{ $applicant->middle_name }}.' {{ $applicant->last_name }}.'" data-job="{{ $applicant->jobVacancies->name }}.'" data-age="{{ $applicant->age }}.'" data-gender="{{ $applicant->gender }}.'" data-address="{{ $applicant->address }}.'" data-mobile="{{ $applicant->mobile }}.'" data-interview-title="{{ $applicant->interview_title }}.'" data-interview-message="{{ $applicant->interview_message }}.'" data-interview-date="{{ $applicant->date_of_interview }}.'" data-interview-time="{{ $applicant->date_of_interview }}.'" data-result="{{ $result }}.'" data-training-date="" data-date-hired="{{ $applicant->date_hired }}.'" data-interviewed="{{ $applicant->interviewed }}.'" data-score="{{ $applicant->score }}.'"><i class="fas fa-external-link-alt"></i>&nbsp;&nbsp;View Application</a>
          </div>
        </div>
      </div>
    @empty
      <div class="card mb-5" style="height: 243px;">
        <div class="card-body d-flex">
          <figure class="mb-0">
            <img src="img/default_image.png" width="192px" height="192px" class="border">
          </figure>
          <h5 class="card-title text-center w-100"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;No data available</h5>
        </div>
      </div>
    @endforelse
  </main>

  <!-- Approval Modal -->
  <div class="modal fade" id="approve-applicant" tabindex="-1" role="dialog" aria-labelledby="approveApplicantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form method="post" id="frm-approve-applicant">
          <input type="hidden" name="hdn_id" id="hdn-id">
          <input type="hidden" name="hdn_email" id="hdn-email">
          <input type="hidden" name="hdn_name" id="hdn-name">
          <input type="hidden" name="hdn_job" id="hdn-job">
          {{ csrf_field() }}
          <div class="modal-header">
            <h5 class="modal-title" id="approveApplicantLabel">Approval</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-question-circle" style="font-size: 32px;"></i>
              <p class="mb-0 ml-2">Are you sure you want to approve <span class="font-weight-bold text-primary" id="appicant-name"></span>?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="btn-approve-close" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-warning" id="btn-approve">Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{ asset(App::environment('production') ? '/public/js/pages/gm_applicant.js' : '/js/pages/gm_applicant.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#btn-approval').on('click', function () {
        $('#applicant-profile').modal('hide');
      });

      if(localStorage.getItem("Approve")){
        $.toast({
          heading: 'Success',
          text: 'You have successfully approved the applicant.',
          position: 'top-right',
          icon: 'success',
          hideAfter: 3500
        });
        localStorage.clear();
      }
    });

    var slug = function(str) {
      str = str.replace(/^\s+|\s+$/g, '');
      str = str.toLowerCase();

      var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
      var to = "aaaaaeeeeeiiiiooooouuuunc------";
      for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
      }

      str = str.replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');

      return str;
    };
  </script>
@endsection
@component('mail::message')
# Application Approval

Good Day {{ $name }}!

Your job application to <strong>{{ $job }}</strong> position has been approved! Please wait for another notification once you are hired.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

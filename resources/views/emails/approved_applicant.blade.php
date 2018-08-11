@component('mail::message')
# Application Approval

Good Day {{ $name }}!

Your job application to <strong>{{ $job }}</strong> position has been approved!

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
# {{ $title }}

{{ $message }} <strong>{{ $interviewDate }}</strong> at <strong>{{ $interviewTime }}</strong>.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

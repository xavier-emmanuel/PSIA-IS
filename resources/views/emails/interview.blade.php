@component('mail::message')
# {{ $title }}

{{ $message }} <strong>{{ $interviewDate }}</strong> at <strong>{{ $interviewTime }}</strong>. Please come as early as possible.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

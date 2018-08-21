@component('mail::message')
# Hired

Good Day {{ $name }}!

Congratulations, we examined your application and believe you to be perfect for the <strong>{{ $job }}</strong> position. We have determined that you would be the best candidate to fill this job!

We look forward to hearing from you.

Sincerely,<br>
{{ config('app.name') }}
@endcomponent

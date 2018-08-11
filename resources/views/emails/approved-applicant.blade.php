@component('mail::message')
# Application Approval

Good Day {{ $name }}!

Your job application to Back-end Developer position has been approved!

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
View Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

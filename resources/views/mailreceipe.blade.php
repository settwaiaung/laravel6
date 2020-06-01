@component('mail::message')
# Receipe service

{{$receipe->name}}
The receipe has been store.
created_at{{$receipe->created_at}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

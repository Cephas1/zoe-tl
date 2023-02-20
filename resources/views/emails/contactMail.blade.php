@component('mail::message')
# {{  $datum['objet']  }}

{{ $datum['body'] }}

{{--@component('mail::button', ['url' => ''])
Button Text
@endcomponent--}}

{{ config('app.name') }}
@endcomponent

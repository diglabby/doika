@component('mail::message')
    {{-- Greeting --}}
    @lang('mails.layout.hello')

    @component('mail::panel')
        {{ $message }}
    @endcomponent

    {{-- Salutations --}}
    @lang('mails.layout.regards'), {{ config('app.name') }}

@endcomponent

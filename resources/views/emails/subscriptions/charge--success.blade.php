<?php
/**
 * @var \Diglabby\Doika\Models\Subscription $subscription
 * @var \Diglabby\Doika\Models\Transaction $transaction
 * @var \Diglabby\Doika\Models\Campaign $campaign
 */
?>
@component('mail::message')
{{-- Greeting --}}
Паважаны {{ $subscription->donator->name ?? 'Ахвярадаўца' }}, дзякуй, што падтрымалі нас!

@component('mail::panel')
## Інфармацыя аб плацяжы
Назва арганізацыі: {{ config('app.name') }}

Плацельшчык: {{ $subscription->donator->name }}

Дата аперацыі: {{ $transaction->created_at }}

Сума аперацыі: {{ $transaction->amount / 100 }}

Вынік аперацыі: паспяхова
{{--Плацёжны сродак:--}}
@endcomponent

<small>Для таго, каб кіраваць скасаваць сваю падпіску, трэба пкреайсці па [спасылцы]({{ $subscription->getCancelationUrl() }}).</small>
______________
{{-- Salutations --}}
@lang('mails.layout.regards'),
{{ config('app.name') }}

@endcomponent

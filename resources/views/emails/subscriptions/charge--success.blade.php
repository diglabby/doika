<?php
/**
 * @var \Diglabby\Doika\Models\Subscription $subscription
 * @var \Diglabby\Doika\Models\Transaction $transaction
 * @var \Diglabby\Doika\Models\Campaign $campaign
 */
?>
@component('mail::message')
{{-- Greeting --}}
@lang('mails.layout.hello')

@component('mail::panel')
Сума транзакцыі {{ $transaction->amount / 100 }} {{ $transaction->currency }}.
@endcomponent

Час заканчэння кампаніі "{{ $campaign->name }}": {{ $campaign->finish_at->toFormattedDateString() }}

<small>Вы можаце у любы час адпісацца па спасыльцы: [адпісацца]({{ $subscription->getCancelationUrl() }}).</small>
______________
{{-- Salutations --}}
@lang('mails.layout.regards'), {{ config('app.name') }}

@endcomponent

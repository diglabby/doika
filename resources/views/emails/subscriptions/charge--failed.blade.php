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
Сума не адбыўшайся транзакцыі {{ $transaction->amount / 100 }} {{ $transaction->currency }}.

Прычына: {!! $transaction->status_message !!}.
@endcomponent

Час заканчэння кампаніі "{{ $campaign->name }}": {{ $campaign->finish_at->toFormattedDateString() }}

@if($subscription)
<small>Вы можаце у любы час адпісацца па спасыльцы: [адпісацца]({{ $subscription->getCancelationUrl() }}).</small>
@endif
_____________
{{-- Salutations --}}
@lang('mails.layout.regards'), {{ config('app.name') }}

@endcomponent

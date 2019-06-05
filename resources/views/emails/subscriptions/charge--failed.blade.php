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
        Сумма не адбыўшайся транзакціі {{ $transaction->amount / 100 }} {{ $transaction->currency }}.

        Прычына: {{ $transaction->status_message }}.
    @endcomponent

    @component('mail::panel')
        Час заканчэння кампаніі "{{ $campaign->name }}": {{ $campaign->finish_at->toFormattedDateString() }}

        @if($subscription)
            Вы можаце у любы час адпісацца па спасыльцы: <a href="{{ $subscription->getCancelationUrl() }}">адпісацца</a>.
        @endif
    @endcomponent

    {{-- Salutations --}}
    @lang('mails.layout.regards'), {{ config('app.name') }}

@endcomponent

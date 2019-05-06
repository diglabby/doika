<?php
/**
 * @var \Diglabby\Doika\Models\Campaign $campaign
 */
?>

@extends('widget.layouts.main')

@section('body')
    <h1>Not implemented yet, you can do it 👍</h1>
    <p>Name: {{ $campaign->name }}</p>
    <p>Description: {{ $campaign->description }}</p>
    <img src="{{ $campaign->picture_url }}" alt="{{ $campaign->name }}">
    <p>Target amount: {{ $campaign->target_amount }}</p>
    <p>Currency: {{ $campaign->currency }}</p>
    <p>Is active: {{ $campaign->active_status }}</p>
@endsection

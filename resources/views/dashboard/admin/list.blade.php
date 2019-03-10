@extends('layouts.admin')
@section('title', 'Спіс кампаній')
@section('content')
	<div class="main-buttons">
		<button onclick="window.open('/doika/create')" class="main-buttons__create-campaign">Стварыць кампанію</button>
	</div>

	<!--<div class="breadcrumbs">Адмін > Галоўная старонка > Спіс кампаній</div>-->

	<div class="list-title">
		<h1>Спіс кампаній</h1>
		<select name="list-filter" onchange="window.location.href=this.options[this.selectedIndex].value">
			@php
				$selected = array_fill(0, 4, '');
				$active = isset($conditions_id) && isset($selected[$conditions_id]) ? $conditions_id : 0;
				$selected[$active] = 'selected';
			@endphp
			<option value="/doika" {{ $selected[0] }} >Усе</option>
			<option value="/doika/show-list-1" {{ $selected[1] }}>Актыўныя</option>
			<option value="/doika/show-list-2" {{ $selected[2] }}>Адкладзеныя</option>
			<option value="/doika/show-list-3" {{ $selected[3] }}>Завершаныя</option>
		</select>
	</div>

	<table>
		<thead>
			<tr>
				<th>Назва кампаніі</th>
				<th>Статус</th>
				<th>Сабраная сума</th>
				<th>Мэтавая сума</th>
				<th>Колькасць бэкераў (ахвярадаўцаў)</th>
				<th>Сярэдні чэк па кампаніі (акцыі)</th>
				<th>Дата пачатку</th>
				<th>Дата сканчэння</th>
				<th>Колькасць дзён да канца</th>
			</tr>
		</thead>
		<tbody>
		@if(isset($campaigns))
			@foreach($campaigns as $campaign)
				<tr>
					<td><a href="/doika/show-campaign-{{ $campaign['id'] }}">{{ $campaign['title'] }}</a></td>
					<td>{{ $campaign['active'] }}</td>
					<td>{{ $campaign['collected_amount']}}</td>
					<td>{{ $campaign['required_amount'] }}</td>
					<td>{{ $campaign['count_payments'] }}</td>
					<td>{{ $campaign['avg_payment'] }}</td>
					<td>{{ $campaign['time_start'] }}</td>
					<td>{{ $campaign['time_end'] }}</td>
					<td>{{ $campaign['time_to_end'] }}</td>
				</tr>
			@endforeach
		@endif
		</tbody>
	</table>
@endsection
@section('popups')
@includeWhen(!isset($first_login), 'shared.popup.first')
@endsection

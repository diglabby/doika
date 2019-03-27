@extends('layouts.admin')
@section('title', 'Стварэнне кампаніі')
@section('top_scripts')
<script src="index.js"></script>
<script src="js/campaignPage.js"></script>
@endsection
@section('content')
		<div class="breadcrumbs">Адмін > Галоўная старонка > Стварэнне кампаніі</div>

		<form class="form" name="createCampaign" action="/doika/create" enctype="multipart/form-data" method="post">
			<div class="form__doCampaignActive">
				<div>
					<input type="checkbox" name="campaign_active" id="doCampaignActive">
					<label for="doCampaignActive" class="input-title doCampaignActive">Зрабіць кампанію актыўнай</label>
				</div>
			</div>
      @if (count($errors) > 0)
         <div>
            <ul>
                @foreach ($errors->all() as $error)
                   <li style="color:red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

			<div class="campaign-name">
				<label for="nameOfCampaign" class="input-title">Назва кампаніі</label>
				<input class="campaign-name__input" placeholder="Aб’ём тэксту павiнен быць не больш за 112 сiмвалау з прабелами" type="text" name="title" id="nameOfCampaign" value="{{ old('title') }}">
			</div>


      <div class="form__info row">
				<div class="requested-sum">
					<label for="sum" class="input-title">Патрэбная сума, BYN</label>
					<input class="requested-sum__input" type="text" name="required_amount" placeholder="неабходна сабраць" id="sum" value="{{ old('required_amount') }}">
				</div>
        <div class="shortcode">
					<label for="shortcode" class="input-title">Шорткод</label>
					<input class="shortcode__input" type="text" name="shortcode" id="shortcode" readonly value="У распрацоўцы">                   
				</div>
			</div>

			<div class="form__dates row">
				<div class="date">
					<label for="dateOfStart" class="input-title">Дата пачатку</label>
					<input class="date__input" type="text" placeholder="дата актывацыі" name="time_start" id="dateOfStart" value="{{ old('time_start') }}">
				</div>
				<div class="date">
					<label for="dateOfFinish" class="input-title">Дата заканчэння</label>
					<input class="date__input" type="text" placeholder="дата заканчэння" name="time_end" id="dateOfFinish" value="{{ old('time_end') }}">
				</div>
			</div>



			<div class="form__desc">
				<div class="desc-of-campaign">
					<label for="descriptionOfCampaign" class="input-title title-info title-star"><span>Апісанне кампаніі</span></label>
					<textarea class="desc-of-campaign__input" name="description" id="descriptionOfCampaign" cols="30" rows="10" maxlength="418">{{ old('description') }}</textarea>
                    <p class="remark">* Аб’ём тэкста з малюнкам - 418 сiмвалау з прабелам</p>
                    <p class="remark">* Аб’ём тэкста без малюнка - 488 сiмвалау з прабелам</p>
				</div>
				<div class="add-picture">
                  <label for="photo" class="input-title photo-select">Змяніць малюнак</label>
                  <input  type="file" name="photo" id="photo" class="photo-input">
                  <div class="selected-picture"><img id="image" src=""></div>
				</div>
			</div>

          <div class="form__other row">
            <div class="toggler">
                <label class="switch">
                    <input class="progress_bar_checkbox" type="checkbox" name="campaign_progress_bar">
                    <span class="slider round"></span>
                </label>
                <span class="toggler__label input-title">Выключыць прагрэс-бар</span>
            </div>
            <button id="test" class="main-buttons__create-campaign add-language-button" class="input-title">Дадаць мову</button>
        </div>
        <button class="submit-button main-buttons__create-campaign">Захаваць</button>
		</form>
@endsection
@section('popups')
	@include('shared.popup.language')
@endsection
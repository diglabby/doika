<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campaign;
//use App\Campaign_configuration;
//use App\Campaign_lang_information;
use App\ConfigurationPageAdmin;

use App\CampaignPageAdmin;

class CampaignPageClient extends Model
{
  public static function getJSONArrCampaign($id)
  {
    $arrCampaign = self::getCampaignClientArray($id);
    return json_encode($arrCampaign);
  }

  public static function getCampaignClientArray($id)
  {
    $campaign = Campaign::find($id);
    if(!$campaign){
      return "Campaign not find!";
    }
    $lang = CampaignPageAdmin::getLangDefault();

    $campaignConfigurations = $campaign->campaign_configurations()->first();
    $campaignInformations = $campaign->campaign_lang_informations()
      ->where('campaign_lang',$lang)
      ->first();

    //return $campaignConfigurations;

    $arrCampaign = [
      "height" => 200, //высота модуля
      "width" => 300, //ширина модуля
      "releaseUrl" => config('app.release_url'),
      "backgroundColor" => ConfigurationPageAdmin::getConfiguration('color_module_background',true), //Колер фона модуля
      "buttonColor" => ConfigurationPageAdmin::getConfiguration('color_module_buttons',true), //Колер кнопак з сумамі

      "show_banner" => ConfigurationPageAdmin::getConfiguration('show_banner',true), //Паказваць банэр
      "color_banner_background" => ConfigurationPageAdmin::getConfiguration('color_banner_background',true), //Колер фону банэра
      "color_banner_help_background" => ConfigurationPageAdmin::getConfiguration('color_banner_help_background',true), //Колер кнопкі "Дапамагчы"
      "color_banner_help_text" => ConfigurationPageAdmin::getConfiguration('color_banner_help_text',true), //Колер тэкста "Дапамагчы"

      "titleTextColor" => "#31383e", //цвет шрифта заголовка
      "titleFontSize" => "22px", //размер шрифта заголовка

      "descriptionTextColor" => "#31383e", //цвет шрифта описания
      "descriptionFontSize" => "13px", //размер шрифта заголовка

      "buttonTextColor" => "#f7fafc", //цвет шрифта на кнопках
      "buttonFontSize" => "20px", //размер шрифта заголовка

      "currency" => 'руб.', //валюта

      "currentFunds" => self::getCurrentFunds($id), //собрано на данный момент средств, число
      "expectedFunds" => $campaignConfigurations->required_amount, //необходимо собрать средств, число	

      "minDonateAmount" => 1, //минимальная сумма доната
      "maxDonateAmount" => 200, //максимальная сумма доната	

      "innerText" => [
        "locale" => $lang, // язык текста
        "titleImage" => $campaignConfigurations->photo, //путь до главного изображения, строка
        "campaignTitle" => $campaignInformations->campaign_title_lang, //Заголовок компании, строка
        "campaignDescription" => $campaignInformations->campaign_description_lang, //Описание компании, строка
        "acceptButtonText" => $campaignInformations->donate_lang, //текст на кнопке отправки
        "resultsText" => 'Сабрана <span class="summ__highlight">'.self::getCurrentFunds($id).'</span> з <span class="goal__highlight">'.$campaignConfigurations->required_amount.'</span>', //текст, показывающий, сколько собрано, разметка упростит стилизацию
        "textInputPlaceholder" => $campaignInformations->other_amount_lang, //текст плейсхолдера в поле ввода суммы
        "paymentDescriptionTitle" => $campaignInformations->payment_title_lang, //текст самой ссылки
        "paymentDescriptionText" => $campaignInformations->payment_description_lang,
        "successfulPaymentMessage" => "Текст при удачном платеже",
        "errorPaymentMessage" => "Текст при неудачном платеже"
      ],
      "showProgressBar" => $campaignConfigurations->campaign_progress_bar
    ];
    
    return $arrCampaign;
  }

  private static function getCurrentFunds($id)
  {
    $campaign = Campaign::find($id);
    if(isset($campaign->payments)){
      $payments = $campaign->payments->sum('amount');
      return $payments;
    }
    return 0;
  }
}

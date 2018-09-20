<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doika_configuration;
use App\PasswordChange;

class ConfigurationPageAdmin extends Model {
  //получение одной конфигурации
  static public function getConfiguration($configurationName,$getString){
    $configuration = Doika_configuration::where('configuration_name',$configurationName)
      ->first(); 
    if($configuration && $getString){
      $configuration = $configuration->configuration_value;
    }

    return $configuration;

  }
  //создание или обновление одной конфигурации
  static public function createOrUpdateConfiguration($configurationName,$value){
    if(!$value){
      $value = "";
    }
    $configuration = self::getConfiguration($configurationName,false);
    if($configuration){
      $configuration->configuration_value = $value;
      $configuration->save();
    }else{
      $configuration = new Doika_configuration;
      $configuration->configuration_name = $configurationName;
      $configuration->configuration_value = $value;
      $configuration->configuration_active = 1;
      $configuration->save();
    }
  }

  static public function getConfigurations(){
    //создаем массив конфигураций
    $configurations = [];
    // получаем ключ если он существует
    $configurations['token'] = self::getConfiguration('token',true);
    //получаем IdMarket
    $configurations['id_market'] = self::getConfiguration('id_market',true);
    //получаем KeyMarket
    $configurations['key_market'] = self::getConfiguration('key_market',true);

    //Паказваць банэр?
    if(self::getConfiguration('show_banner',true) == 1){
      $configurations['show_banner'] = self::getConfiguration('show_banner',true);
    }
    //Колер фону банэра
    $configurations['color_banner_background'] = self::getConfiguration('color_banner_background',true);
    //Колер кнопкі "Дапамагчы"
    $configurations['color_banner_help_background'] = self::getConfiguration('color_banner_help_background',true);
    //Колер тэкста "Дапамагчы"
    $configurations['color_banner_help_text'] = self::getConfiguration('color_banner_help_text',true);
    //Колер фона модуля
    $configurations['color_module_background'] = self::getConfiguration('color_module_background',true);
    //Колер кнопак з сумамі
    $configurations['color_module_buttons'] = self::getConfiguration('color_module_buttons',true);

    if(self::getConfiguration('is_test',true) == 1){
      $configurations['test_payments'] = self::getConfiguration('is_test',true);
    }

    // отдаем готовый массив с конфигурациями
    return $configurations; 
  }

  //обновляем конфигурации или записываем новые
  static public function createOrUpdateConfigurations($request){

    self::createOrUpdateConfiguration('token',$request->token);
    self::createOrUpdateConfiguration('id_market',$request->id_market);
    self::createOrUpdateConfiguration('key_market',$request->key_market);

    if($request->show_banner){
      self::createOrUpdateConfiguration('show_banner',1);
    }else{
      self::createOrUpdateConfiguration('show_banner',0);
    }
    self::createOrUpdateConfiguration('color_banner_background',$request->color_banner_background);
    self::createOrUpdateConfiguration('color_banner_help_background',$request->color_banner_help_background);
    self::createOrUpdateConfiguration('color_banner_help_text',$request->color_banner_help_text);
    self::createOrUpdateConfiguration('color_module_background',$request->color_module_background);
    self::createOrUpdateConfiguration('color_module_buttons',$request->color_module_buttons);

    if($request->test_payments){
      self::createOrUpdateConfiguration('is_test',1);
    }else{
      self::createOrUpdateConfiguration('is_test',0);
    }
    PasswordChange::changeProfile($request);
  }
}
<?php

use Illuminate\Database\Eloquent\Model;

if (! function_exists('localize_url')) {
    function localize_url($locale = null, $attributes = [], Model $translatable = null)
    {
        $url = null;

        if ($translatable && method_exists($translatable, 'getTranslation')) {
            /** @var \Spatie\Translatable\HasTranslations $translatable */
            if ($slug = $translatable->getTranslation('slug', $locale)) {
                $url = route(Route::current()->getName(), ['post' => $slug]);
            } else {
                $url = route('home');
            }
        }

        return LaravelLocalization::getLocalizedURL($locale, $url, $attributes, true);
    }
}

<?php

namespace Diglabby\Doika\Http\Controllers\Widget;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TagRepository;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;

class WidgetController extends Controller
{
    public function index(): Renderable
    {
        return view('widget.campaign');
    }

    /**
     * Push attributes in order to correctly localize slugs.
     *
     * @param $attributes
     */
    protected function setLocalesAttributes($attributes)
    {
        View::composer(['partials.alternates', 'partials.locales'], function (\Illuminate\View\View $view) use ($attributes) {
            $view->withAttributes($attributes);
        });
    }

    /**
     * Push translatable object in order to correctly localize slugs.
     *
     * @param $translatable
     */
    protected function setTranslatable($translatable)
    {
        View::composer(['partials.alternates', 'partials.locales'], function (\Illuminate\View\View $view) use ($translatable) {
            $view->withTranslatable($translatable);
        });
    }
}

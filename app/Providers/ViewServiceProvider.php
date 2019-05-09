<?php

namespace Diglabby\Doika\Providers;

use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/** @deprecated Use HTML code instead */
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        FormFacade::component('bsText', 'dashboard.components.form.input', ['name', 'value' => null, 'attributes' => [], 'type' => 'text']);
        FormFacade::component('bsEmail', 'dashboard.components.form.input', ['name', 'value' => null, 'attributes' => [], 'type' => 'email']);
        FormFacade::component('bsTel', 'dashboard.components.form.input', ['name', 'value' => null, 'attributes' => [], 'type' => 'tel']);
        FormFacade::component('bsNumber', 'dashboard.components.form.input', ['name', 'value' => null, 'attributes' => [], 'type' => 'number']);
        FormFacade::component('bsDatetime', 'dashboard.components.form.input', ['name', 'value' => null, 'attributes' => [], 'type' => 'datetime']);
        FormFacade::component('bsPassword', 'dashboard.components.form.input', ['name', 'attributes' => [], 'value' => '', 'type' => 'password']);
        FormFacade::component('bsFile', 'dashboard.components.form.input', ['name', 'attributes' => [], 'value' => null, 'type' => 'file']);
        FormFacade::component('bsTextarea', 'dashboard.components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
        FormFacade::component('bsSelect', 'dashboard.components.form.select', ['name', 'list' => [], 'selected' => null, 'attributes' => []]);
        FormFacade::component('bsCheckbox', 'dashboard.components.form.custom-control', ['name', 'description', 'value' => null, 'type' => 'checkbox']);
        HtmlFacade::macro('asset', function ($manifestName, $path) {
            static $manifest;
            $basePath = app()->environment('production') ? 'dist' : 'build';
            if (! $manifest
                && file_exists($manifestPath = public_path("{$basePath}/manifest-{$manifestName}.json"))
            ) {
                $manifest = json_decode(file_get_contents($manifestPath), true);
            }
            if ($manifest && isset($manifest[$path])) {
                return $manifest[$path];
            }
        });
        /*
         * Prepare flash message for alerts
         */
        View::composer('partials/messages', function (\Illuminate\View\View $view) {
            $data = collect($view->getData());
            if ($flash = session()->get('flash_message') ?: $data->get('flashMessage')) {
                $view->with('flashMessage', $flash);
                $view->with('flashType', 'info');
            } elseif ($flash = session()->get('flash_success') ?: $data->get('flashSuccess')) {
                $view->with('flashMessage', $flash);
                $view->with('flashType', 'success');
            } elseif ($flash = session()->get('flash_info') ?: $data->get('flashInfo')) {
                $view->with('flashMessage', $flash);
                $view->with('flashType', 'info');
            } elseif ($flash = session()->get('flash_warning') ?: $data->get('flashWarning')) {
                $view->with('flashMessage', $flash);
                $view->with('flashType', 'warning');
            } elseif ($flash = session()->get('flash_danger') ?: $data->get('flashDanger')) {
                $view->with('flashMessage', $flash);
                $view->with('flashType', 'danger');
            } elseif ($flash = session()->get('flash_error') ?: $data->get('flashError')) {
                $view->with('flashMessage', $flash);
                $view->with('flashType', 'danger');
            }
        });

        View::composer('*', function (\Illuminate\View\View $view) {
            $view->with('loggedInUser', auth()->user());
        });
    }
}

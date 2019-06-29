<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use anlutro\LaravelSettings\SettingStore;
use Diglabby\Doika\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class SettingsController extends Controller
{
    /** @var SettingStore */
    private $settingStore;

    public function __construct(SettingStore $settingStore)
    {
        $this->settingStore = $settingStore;
    }

    public function index(Request $request): array
    {
        $settingsKeys = $request->get('keys') ?: [];
        $settingsValues = $this->settingStore->get($settingsKeys, []);

        return ['settings' => array_combine($settingsKeys, $settingsValues)];
    }

    public function store(Request $request): array
    {
        $this->validate($request, [
            'settings' => ['array'],
        ]);

        $updatedSettings = collect($request->get('settings'))
            ->mapWithKeys(function (string $value, string $key) {
                $this->settingStore->set($key, $value);
                return [$key => $value];
            });

        $this->settingStore->save();

        return ['settings' => $updatedSettings->all()];
    }
}

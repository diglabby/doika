<?php

namespace Tests\Feature\Http\Controllers\Webhooks\PaymentGateways;

trait LoadsRequestFixture
{
    /**
     * @param string $fixtureFilename
     * @return array with keys: 'input' and 'headers'
     */
    public function getRequestData(string $fixtureFilename): array
    {
        $fixtureFile = __DIR__.DIRECTORY_SEPARATOR.$fixtureFilename;

        return json_decode(file_get_contents($fixtureFile), true);
    }
}

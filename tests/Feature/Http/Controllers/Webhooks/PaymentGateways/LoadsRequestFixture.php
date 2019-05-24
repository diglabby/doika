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
        $reflector = new \ReflectionClass(__CLASS__);
        $dir = dirname($reflector->getFileName());

        $fixtureFilepath = $dir.DIRECTORY_SEPARATOR.$fixtureFilename;
        return json_decode(file_get_contents($fixtureFilepath), true);
    }
}

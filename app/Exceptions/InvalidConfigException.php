<?php

declare(strict_types=1);

namespace Diglabby\Doika\Exceptions;

use InvalidArgumentException;

class InvalidConfigException extends InvalidArgumentException implements DoikaException
{
}

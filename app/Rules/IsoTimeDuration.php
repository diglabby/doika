<?php
declare(strict_types = 1);

namespace Diglabby\Doika\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @see https://en.wikipedia.org/wiki/ISO_8601#Durations
 */
final class IsoTimeDuration implements Rule
{
    /** @inheritDoc */
    public function passes($attribute, $value): bool
    {
        try {
            new \DateInterval($value);
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }

    /** @inheritDoc */
    public function message()
    {
        return 'Unknown or bad format of time interval/duration';
    }
}

<?php

namespace Diglabby\Doika;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $email
 * @property string|null $name
 * @property int|null $phone
 */
final class Donator extends Model
{
}

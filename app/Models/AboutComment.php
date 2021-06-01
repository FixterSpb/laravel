<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AboutComment
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AboutComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutComment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutComment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutComment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AboutComment extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'id',
            'name',
            'description',
        ];
}

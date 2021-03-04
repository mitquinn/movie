<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\Picture
 *
 * @property int $id
 * @property string $picturable_type
 * @property int $picturable_id
 * @property string $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Model|Eloquent $picturable
 * @method static Builder|Picture newModelQuery()
 * @method static Builder|Picture newQuery()
 * @method static Builder|Picture query()
 * @method static Builder|Picture whereCreatedAt($value)
 * @method static Builder|Picture whereId($value)
 * @method static Builder|Picture wherePicturableId($value)
 * @method static Builder|Picture wherePicturableType($value)
 * @method static Builder|Picture whereUpdatedAt($value)
 * @method static Builder|Picture whereUrl($value)
 * @mixin Eloquent
 */
class Picture extends Model
{
    use HasFactory;

    /*** Start Relationships ***/

    /**
     * @return MorphTo
     */
    public function picturable()
    {
        return $this->morphTo();
    }

    /*** End Relationships ***/


}

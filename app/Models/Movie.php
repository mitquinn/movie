<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Movie
 *
 * @property int $id
 * @property string $title
 * @property int $runtime
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Genre[] $genres
 * @property-read int|null $genres_count
 * @property-read Collection|Person[] $person
 * @property-read int|null $person_count
 * @property-read Collection|Picture[] $pictures
 * @property-read int|null $pictures_count
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @method static Builder|Movie newModelQuery()
 * @method static Builder|Movie newQuery()
 * @method static Builder|Movie query()
 * @method static Builder|Movie whereCreatedAt($value)
 * @method static Builder|Movie whereId($value)
 * @method static Builder|Movie whereRuntime($value)
 * @method static Builder|Movie whereTitle($value)
 * @method static Builder|Movie whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Movie extends Model
{
    use HasFactory;

    protected array $fillable = [
        'title',
        'runtime'
    ];

    /*** Start Relationships ***/

    /**
     * @return BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class)->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    /**
     * @return HasManyThrough
     */
    public function people()
    {
        return $this->hasManyThrough(Person::class, Role::class);
    }

    /**
     * @return MorphMany
     */
    public function pictures()
    {
        return $this->morphMany(Picture::class, 'picturable');
    }


    /*** End Relationships ***/


    /*** Start Getters and Setters ***/

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getRuntime(): int
    {
        return $this->runtime;
    }

    /**
     * @param int $runtime
     * @return Movie
     */
    public function setRuntime(int $runtime): Movie
    {
        $this->runtime = $runtime;
        return $this;
    }

    /*** End Getters and Setters ***/
}

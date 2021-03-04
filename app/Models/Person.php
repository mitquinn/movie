<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;


/**
 * App\Models\Person
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Movie[] $movies
 * @property-read int|null $movies_count
 * @property-read Collection|Picture[] $pictures
 * @property-read int|null $pictures_count
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @method static Builder|Person newModelQuery()
 * @method static Builder|Person newQuery()
 * @method static Builder|Person query()
 * @method static Builder|Person whereCreatedAt($value)
 * @method static Builder|Person whereId($value)
 * @method static Builder|Person whereName($value)
 * @method static Builder|Person whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Person extends Model
{
    use HasFactory;

    /*** Start Relationships ***/

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
    public function movies()
    {
        return $this->hasManyThrough(Movie::class, Role::class);
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
     * @param int $id
     * @return Person
     */
    public function setId(int $id): Person
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Person
     */
    public function setName(string $name): Person
    {
        $this->name = $name;
        return $this;
    }

    /*** End Getters and Setters ***/
}

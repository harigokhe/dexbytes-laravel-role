<?php

namespace harigokhe\LaravelRoles\Models;

use Illuminate\Database\Eloquent\Model;
use harigokhe\LaravelRoles\Interfaces\RoleHasRelations as RoleHasRelationsInterface;
use harigokhe\LaravelRoles\Traits\RoleHasRelations;
use harigokhe\LaravelRoles\Traits\Slugable;

class Role extends Model implements RoleHasRelationsInterface
{
    use Slugable, RoleHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'level'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }
}

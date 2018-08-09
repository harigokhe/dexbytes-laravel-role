<?php

namespace LaravelRole\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelRole\Interfaces\RoleHasRelations as RoleHasRelationsInterface;
use LaravelRole\Traits\RoleHasRelations;
use LaravelRole\Traits\Slugable;

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

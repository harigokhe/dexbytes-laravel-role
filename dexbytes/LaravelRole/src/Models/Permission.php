<?php

namespace LaravelRole\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelRole\Interfaces\PermissionHasRelations as PermissionHasRelationsInterface;
use LaravelRole\Traits\PermissionHasRelations;
use LaravelRole\Traits\Slugable;

class Permission extends Model implements PermissionHasRelationsInterface
{
    use Slugable, PermissionHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'model'];

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

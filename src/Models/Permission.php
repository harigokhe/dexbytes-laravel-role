<?php

namespace harigokhe\LaravelRoles\Models;

use Illuminate\Database\Eloquent\Model;
use harigokhe\LaravelRoles\Interfaces\PermissionHasRelations as PermissionHasRelationsInterface;
use harigokhe\LaravelRoles\Traits\PermissionHasRelations;
use harigokhe\LaravelRoles\Traits\Slugable;

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

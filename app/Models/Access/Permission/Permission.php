<?php

namespace App\Models\Access\Permission;

use App\Models\BaseModel;
use App\Models\Access\Permission\Traits\Relationship\PermissionRelationship;
use App\Models\Access\Permission\Traits\Attribute\Attribute;

/**
 * Class Permission.
 */
class Permission extends BaseModel
{
    use Attribute, PermissionRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'sort'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.permissions_table');
    }
}

<?php namespace App\Models\Site;

/**
 * Class Site
 *
 * @author Niraj Jani
 */

use App\Models\BaseModel;
use App\Models\Site\Traits\Attribute\Attribute;
use App\Models\Site\Traits\Relationship\Relationship;

class Site extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "sites";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}
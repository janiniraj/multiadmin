<?php namespace App\Models\VanType;

/**
 * Class VanType
 *
 * @author Justin Bevan justin@smokerschoiceusa.com
 */

use App\Models\BaseModel;
use App\Models\VanType\Traits\Attribute\Attribute;
use App\Models\VanType\Traits\Relationship\Relationship;

class VanType extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "van_types";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'site_id',
        'type',
        'cost',
        'mileage',
        'mileage_allowance',
        'day_rules',
        'discount',
        'free_miles',
        'registration_numbers',
        'description',
        'picture',
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}
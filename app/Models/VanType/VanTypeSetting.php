<?php namespace App\Models\VanType;

/**
 * Class VanTypeSetting
 *
 * @author Niraj Jani janiniraj1992@gmail.com
 */

use App\Models\BaseModel;

class VanTypeSetting extends BaseModel
{
    /**
     * Database Table
     *
     */
    protected $table = "van_type_settings";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'van_type_id',
        'man',
        'title',
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'holiday',
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}
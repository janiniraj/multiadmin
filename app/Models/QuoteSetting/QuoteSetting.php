<?php namespace App\Models\QuoteSetting;

/**
 * Class QuoteSetting
 *
 * @author Niraj Jani
 */

use App\Models\BaseModel;

class QuoteSetting extends BaseModel
{
    /**
     * Database Table
     *
     */
    protected $table = "quote_settings";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'type',
        'settings',
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}
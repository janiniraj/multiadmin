<?php namespace App\Models\Booking;

/**
 * Class Booking
 *
 * @author Niraj Jani
 */

use App\Models\BaseModel;
use App\Models\Booking\Traits\Attribute\Attribute;
use App\Models\Booking\Traits\Relationship\Relationship;

class Booking extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "bookings";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'name',
        'email',
        'message',
        'extra',
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}
<?php namespace App\Models\BookingNew;

/**
 * Class BookingNew
 *
 * @author Niraj Jani
 */

use App\Models\BaseModel;
use App\Models\BookingNew\Traits\Attribute\Attribute;
use App\Models\BookingNew\Traits\Relationship\Relationship;

class BookingNew extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "booking_new";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'email',
        'title',
        'first_name',
        'last_name',
        'type',
        'company_postcode',
        'company_name',
        'company_latitude',
        'company_longitude',
        'company_address',
        'company_country',
        'date',
        'time',
        'van_type_id',
        'van_type_setting_id',
        'duration',
        'how_you_know',
        'inventory',
        'special_remark',
        'payment_method',
        'promo_code',
        'congestion_change_zone',
        'need_insurance',
        'insurance_type',
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}
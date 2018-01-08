<?php namespace App\Models\Page;

/**
 * Class Page
 *
 * @author Justin Bevan justin@smokerschoiceusa.com
 */

use App\Models\BaseModel;
use App\Models\Page\Traits\Attribute\Attribute;
use App\Models\Page\Traits\Relationship\Relationship;

class Page extends BaseModel
{
    use Attribute, Relationship;
    /**
     * Database Table
     *
     */
    protected $table = "pages";

    /**
     * Fillable Database Fields
     *
     */
    protected $fillable = [
        'site_id',
        'name',
        'content',
        'created_at',
        'updated_at',
        'route'
    ];

    /**
     * Guarded ID Column
     *
     */
    protected $guarded = ["id"];
}
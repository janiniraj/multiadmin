<?php namespace App\Models\VanType\Traits\Relationship;

use App\Models\Site\Site;
use App\Models\VanType\VanTypeSetting;

trait Relationship
{
	/**
	 * Relationship Mapping for Site
	 * @return mixed
	 */
	public function site()
	{
	    return $this->belongsTo(Site::class, 'site_id');
	}

	public function settings()
    {
        return $this->hasMany(VanTypeSetting::class, 'van_type_id');
    }
}
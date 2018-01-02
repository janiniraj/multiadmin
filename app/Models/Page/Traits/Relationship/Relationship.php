<?php namespace App\Models\Page\Traits\Relationship;

use App\Models\Site\Site;

trait Relationship
{
	/**
	 * Relationship Mapping for Account
	 * @return mixed
	 */
	public function site()
	{
	    return $this->belongsTo(Site::class, 'site_id');
	}
}
<?php namespace App\Models\Site\Traits\Relationship;

use App\Models\Page\Page;

trait Relationship
{
	/**
	 * Relationship Mapping for Account
	 * @return mixed
	 */
	public function pages()
	{
	    return $this->hasMany(Page::class, 'site_id');
	}
}
<?php namespace App\Traits;

use Spatie\MediaLibrary\Media;

trait MediableTrait 
{
	/**
	 * Media Sizes
	 */
	public function registerMediaConversions(Media $media = null)
	{
		$this->addMediaConversion('thumb')
		     ->width(200)
		     ->height(200);

		$this->addMediaConversion('avatar')
		     ->width(50)
		     ->height(50)
			->performOnCollections('avatar');

		$this->addMediaConversion('profile_pic')
		     ->width(50)
		     ->height(50)
		     ->performOnCollections('avatar');

	}

}
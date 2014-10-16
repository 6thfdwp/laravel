<?php

namespace Klap\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(
			'Klap\Repositories\UserRepoInterface',
			'Klap\Repositories\Eloquent\UserRepo'
		);
	}
}
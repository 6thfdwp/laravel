<?php

namespace Klap\Repositories;

Interface UserRepoInterface
{
    /**
     * Get the user by unique id.
     *
     * @param  int  $userId
     * @return \User
     */
	public function getById($userId);

    public function getUserProfile($userId);

    public function create(array $data);
}

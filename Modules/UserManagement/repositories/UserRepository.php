<?php

namespace Modules\UserManagement\Repositories;

use Modules\UserManagement\Models\User;

interface UserRepository
{
    /**
     * @param $q
     * @return mixed
     */
    public function index($q): mixed;

    /**
     * @param User $user
     * @return mixed
     */
    public function activate(User $user): mixed;

}

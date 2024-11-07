<?php

namespace Modules\UserManagement\Repositories;

interface AuthRepository
{
    /**
     * @param $name
     * @param $email
     * @param $password
     * @return mixed
     */
    public function register($name, $email, $password): mixed;

    /**
     * @param $credentials
     * @return mixed
     */
    public function login($credentials): mixed;

    /**
     * @return mixed
     */
    public function logout(): mixed;

}

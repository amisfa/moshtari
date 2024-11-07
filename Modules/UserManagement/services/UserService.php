<?php

namespace Modules\UserManagement\Services;

use Modules\UserManagement\Models\User;
use Modules\UserManagement\Repositories\UserRepository;

class UserService implements UserRepository
{
    public function index($q): mixed
    {
        $query = User::query();
        if ($q) $query->search($q);
        return $query->get();
    }

    public function activate(User $user): mixed
    {
        $user->activated_at = now();
        $user->save();
        return response()->json(['message' => 'User Activated Successfully']);
    }
}

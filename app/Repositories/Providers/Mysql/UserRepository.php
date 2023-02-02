<?php

namespace App\Repositories\Providers\Mysql;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(string $email): User | null {
        return User::where('email', $email)
            ->first();
    }

    public function save(User $user): bool {
        return $user->save();
    }
}

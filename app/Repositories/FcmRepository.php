<?php

namespace App\Repositories;

use App\Models\User;

class fcmRepository{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($token)
    {
        return auth()->user()->update(['fcm_token' => $token]);
    }

    public function closeSessionUser($token)
    {
        return $this->user
                    ->where('id', '<>', auth()->user()->id)
                    ->where('fcm_token', $token)
                    ->update(['fcm_token' => null]);
    }
}
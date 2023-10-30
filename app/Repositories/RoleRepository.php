<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleRepository{

    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function all()
    {
        return $this->role->paginate();
    }
}
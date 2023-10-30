<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManagementRepository{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->paginate();
    }

    public function filtered($terms)
    {
        $query = $this->user->query();

        foreach ($terms as $name => $value) {
            if ($value) { 
                $query->where($name, 'LIKE', '%' . $value . '%');
            }
        }

        return $query->paginate();
    }

    public function getById($id)
    {
        return $this->user->find($id);
    }

    public function update($id, $data)
    {
        $user = $this->user->findOrFail($id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        if (isset($data['password']) && $data['password'] !== '') {
            $user->password = Hash::make($data['password']);
        }

        if($user->save()) {
            $user->roles()->sync($data['role']);
        }

        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->findOrFail($id);
        return $user->delete();
    }

    public function store($data)
    {
        $user = $this->user->create($data);

        $user->roles()->sync($data['role']);

        return $user;
    }

}

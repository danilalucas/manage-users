<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserManagementService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Notifications\NewUser;
use App\Services\RoleService;

class UserManagementController extends Controller
{
    private $userManagementService;
    private $roleService;

    public function __construct(
        UserManagementService $userManagementService,
        RoleService $roleService
    )
    {
        $this->userManagementService = $userManagementService;
        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->all();
        if(empty($search)) {
            $users = $this->userManagementService->all();
        }else {
            $terms = $request->only('name');
            $users = $this->userManagementService->filtered($terms);
        }

        return view("admin.user-management.index", compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleService->all();

        return view("admin.user-management.create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try{
            $userPassword = $request->password;
            $request->merge(['password' => Hash::make($request->password)]);
            $data = $request->only('name', 'email', 'password', 'role');
            $user = $this->userManagementService->store($data);
            $user->notify(new NewUser($userPassword));

            return redirect()
                    ->route('user-management.index')
                    ->with('success', 'Novo usuário criado com sucesso!');
        }catch (Exception $e){
            Log::error($e->getMessage());

            return redirect()
                    ->back()
                    ->with('error', 'Erro no registro do usuário!');
        } 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userManagementService->getById($id);
        $roles = $this->roleService->all();

        return view("admin.user-management.edit", compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        try{
            $data = $request->only('name', 'email', 'password', 'role');
            $update = $this->userManagementService->update($id, $data);

            return redirect()
                    ->route('user-management.edit', $id)
                    ->with('success', 'Atualizado com sucesso!');
        }catch (Exception $e){
            Log::error($e->getMessage());

            return redirect()
                    ->back()
                    ->with('error', 'Erro ao editar registro!');
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->userManagementService->delete($id);

            return redirect()
                    ->route('user-management.index')
                    ->with('success', 'Excluído com sucesso!');
        }catch (Exception $e){
            Log::error($e->getMessage());

            return redirect()
                    ->back()
                    ->with('error', 'Erro ao excluir o registro!');
        }
    }

}

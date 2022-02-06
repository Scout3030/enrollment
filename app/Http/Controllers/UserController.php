<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param UserDataTable $dataTable
     * @return mixed
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    /**
     * @param User $user
     * @return UserResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        if(request()->ajax()){
            return new UserResource($user);
        }
        return view('user.show', $user);
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return back()->with('message', ['type' => 'success', 'description' => __('User created successfully')]);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $data = ['name' => $request->name];

        if($request->filled('password')){
            $data['password'] = Hash::make($request->password);
        }

        $user->fill($data)->save();
        $user->assignRole($request->role);

        return back()->with('message', ['type' => 'success', 'description' => __('User edited successfully')]);
    }
}

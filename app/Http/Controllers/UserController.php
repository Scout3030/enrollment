<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Mail\NotificationResetPassword;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Log;
use Mail;

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
            'remember_token' => Str::random(24)
        ]);

        if(!$request->filled('role')){
            $user->assignRole('student');
            Student::create([
                'user_id' => $user->id,
                'dni' => $request->dni,
                'grade_id' => $request->grade_id
            ]);

            try {
                Mail::to( $user->email )->send( new NotificationResetPassword($user->remember_token, $user->email) );
            } catch (\Exception $e) {
                Log::info( __('There was an error sending the mail:') . ' ' . $e->getMessage());
            }

            return back()->with('message', ['type' => 'success', 'description' => __('Student created successfully')]);
        }

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

        foreach ($user->getRoleNames() as $role) {
            $user->removeRole($role);
        }

        $user->fill($data)->save();
        $user->assignRole($request->role);

        return back()->with('message', ['type' => 'success', 'description' => __('User edited successfully')]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->with('message', ['type' => 'success', 'description' => __('User deleted successfully')]);
        } catch (\Exception $e) {
            return back()->withErrors(__('Can not delete this user'));
        }
    }

    /**
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profile(ProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();
        $data = $request->only('email', 'name');

        if($request->filled('password')){
            $data['password'] = Hash::make($request->password);
        }

        $user->fill($data)->save();

        return back()->with('message', ['type' => 'success', 'description' => __('Profile edited successfully')]);
    }
}

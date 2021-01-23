<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Phone;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.admin.index', [
            'users' => User::with('roles')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.admin.edit', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    /**
     * Display cars by courier id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPhone($id)
    {
        $user = User::with('phones')->findOrFail($id);

        return view('user.admin.phone', [
            'user' => $user,
        ]);
    }

    /**
     * Display cars by courier id.
     *
     * @return \Illuminate\Http\Response
     */
    public function storePhone($id, Request $request)
    {
        $user = User::findOrFail($id);

        $validated = Validator::make($request->all(), [
            'phone' => 'required|string',
        ])->validate();

        $phone = new Phone;
        $phone->phone = $validated['phone'];

        $phone->phoneable()->associate($user)->save();

        return redirect()->route('admin.user.phone', $user->id);
    }

    /**
     * Display cars by courier id.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRole($id)
    {
        $user = User::with('roles')->findOrFail($id);

        return view('user.admin.role', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    /**
     * Display cars by courier id.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeRole($id, Request $request)
    {
        $user = User::findOrFail($id);

        $validated = Validator::make($request->all(), [
            'role_id' => 'required|integer|unique:user_role',
        ])->validate();

        $role = Role::findOrFail($validated['role_id']);

        $user->roles()->save($role);

        return redirect()->route('admin.user.role', $user->id);
    }
}

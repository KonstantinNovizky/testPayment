<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
// use App\Models\Role;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $active = "users";
        return view("admin.users.index", compact("users", "active"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = "users";
        return view("admin.users.create", compact("active"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $neededFields = [
            "email" => "unique:users|required|email",
            "password" => "required|confirmed",
            "first_name" => "required",
        ];

        if (strlen(trim($request->last_name)) > 0)
            $neededFields['last_name'] = "min:3";

        $validated = $request->validate($neededFields);

        $role = Role::whereRole("user")->first();

        $validated['role_id'] = $role->id;

        if (User::create($validated)) {
            return redirect()->route('admin.users.index')->with("success", "You are successfully registered");
        } else {
            return redirect()->route('admin.users.index')->with("failure", "Failed to register");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with("failure", "Failed to find users and delete.");
        }

        $active = "users";
        return view("admin.users.show", compact("user", "active"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with("failure", "Failed to find users and delete.");
        }

        $active = "users";
        return view("admin.users.edit", compact("user", "active"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "password" => "confirmed",
            "first_name" => "required",
        ]);

        // $role = Role::whereRole("users")->first();
        // $validated['role_id'] = $role->id;

        $user = User::find($id);

        if (User::whereEmail($user->email)->where('id', '<>', $user->id)->first()) {
            return redirect()->back()->with("failure", "This email is already in use.");
        }
        if (!$user) {
            return redirect()->back()->with("failure", "Failed to find users and delete.");
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if (!empty($request->password)) {
            $user->password = $request->password;
        }
        $user->email = $request->email;

        if ($request->telegram_id)
            $user->telegram_id = $request->telegram_id;
        if ($request->twitter_id)
            $user->twitter_id = $request->twitter_id;

        if ($user->save()) {
            return redirect()->route('admin.users.index')->with("success", "User is updated.");
        } else {
            return redirect()->route("admin.users.index")->with("failure", "Failed to update users!");
        }
    }

    public function profile(Request $request)
    {
        $active = 'profile';
        $user = User::find($request->session()->get('id'));
        if (!$user) {
            return redirect()->back()->with("failure", "Failed to find you");
        }

        return view('admin.users.edit', compact('user', 'active'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with("failure", "Failed to find users and delete.");
        }

        if ($user->delete()) {
            return redirect()->back()->with("success", "User is deleted.");
        } else {
            return redirect()->back()->with("failure", "Failed to delete users.");
        }
    }
}

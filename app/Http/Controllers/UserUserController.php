<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $active = "users";
        return view("user.users.index", compact("users", "active"));
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
        // $role = Role::whereRole("users")->first();
        // $validated['role_id'] = $role->id;

        $user = User::find($id);

        if (User::whereEmail($user->email)->where('id', '<>', $user->id)->first()) {
            return redirect()->back()->with("failure", "This email is already in use.");
        }
        if (!$user) {
            return redirect()->back()->with("failure", "Failed to find users and delete.");
        }
        if (!$request->status)
            $user->status = $request->status;
        else
            $user->status = $user->status;

        if ($request->first_name)
            $user->first_name = $request->first_name;
        if ($request->last_name)
            $user->last_name = $request->last_name;
        if ($request->email)
            $user->email = $request->email;
        if ($request->telegram_id)
            $user->telegram_id = $request->telegram_id;
        if ($request->twitter_id)
            $user->twitter_id = $request->twitter_id;


        if ($user->save()) {
            return redirect()->route('user_users.index')->with("success", "User is updated.");
        } else {
            return redirect()->route("user_users.index")->with("failure", "Failed to update users!");
        }
    }
    public function profile(Request $request)
    {
        $active = 'profile';
        $user = User::find($request->session()->get('id'));
        if (!$user) {
            return redirect()->back()->with("failure", "Failed to find you");
        }

        return view('user.users.edit', compact('user', 'active'));
    }
}

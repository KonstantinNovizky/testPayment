<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function access(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($user = User::isUser([
            "email" => $request->email,
            "password" => $request->password
        ])) {
            $type = $user->role->role;
            // $request->session()->put("loggedIn", $request->email);
            $request->session()->put("type", $type);
            $request->session()->put("name", $user->first_name . ' ' . $user->last_name);
            $request->session()->put("id", $user->id);
            if ($type == "admin" && $user->status == 1) {
                return redirect()->route("admin")->with("success", "You are logged in successfully");
            } elseif ($user->status == 1) {
                return redirect()->route("user_dashboard")->with("success", "You are logged in successfully");
            } else {
                return redirect()->back()->with("failure", "You are not activated yet.");
            }

            // return "You are a valid user";
        } else {
            return redirect()->back()->with("failure", "Email or Password is incorrect.");
            return "You are not a valid user";
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget("type");
        $request->session()->forget("name");
        return redirect()->route("main");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $needFields = [];
        $needFields['email'] = "required|unique:users";
        if (!$request->type) {
            $message = "You are successfully register, we will activate you account as soon as possible.";
            $message_failed = "Failed to register.";

            $needFields["first_name"] = "required|min:3";
            $needFields["phone"] = "required";
            $needFields["password"] = "required|confirmed";
            // "confirm_password"=> "required";
            $needFields["agree"] = "required";
            if (strlen(trim($request->last_name)) > 0) {
                $needFields['last_name'] = "required|min:3";
            }
            // return 'need to register';
        } else {
            $needFields['name'] = "required";
        }
        return $request->method;
        $validated = $request->validate($needFields);


        if ($request->type) {
            $fullname = explode(' ', $validated['name']);
            $validated['first_name'] = $fullname[0];
            $validated['last_name'] = isset($fullname[1]) && !empty(trim($fullname[1])) ? $fullname[1] : '';
        }

        // if(!isset($request->last_name))
        //     $validated['last_name'] = "";
        $role = Role::whereRole("user")->first();
        $validated['role_id'] = $role->id;
        if ($request->type) {
            // $validated['status'] = 2;
            // $validated['first_name'] = "unknown";
            // $validated['last_name'] = "unknown";
            // $validated['password'] = "unknown";
            $message = "Thanks for your subscription.";
            $message_failed = "Failed to subscribe.";
        }
        if ($request->type) {
            return view("pricing")->with('user', $validated);
        }
        if (User::create($validated)) {
            return redirect()->back()->with("success", $message);
        } else {
            return redirect()->back()->with("failure", $message_failed);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with("failure", "User with id $id not found.");
        }
        $user->status = $request->status;

        if ($request->status == 1) {
            $message = "activated";
            $messageFailure = "activate";
        } else {
            $message = "dectivated";
            $messageFailure = "dectivate";
        }

        if ($user->save()) {
            return redirect()->back()->with("success", "user is $message successfully.");
        } else {
            return redirect()->back()->with("failure", "Failed to $messageFailure user with id $id.");
        }
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
            return redirect()->back()->with("failure", "User with id $id not found.");
        }

        if ($user->delete()) {
            return redirect()->back()->with("success", "User is successfully removed.");
        } else {
            return redirect()->back()->with("failure", "Failed to remove user with id $id.");
        }
    }


    public function loginForm()
    {
        return view("admin.login");
    }
}

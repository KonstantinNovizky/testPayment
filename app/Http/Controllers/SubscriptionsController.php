<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionsController extends Controller
{
    /**
     * Display 
     *
     * @return \Illuminate\
     */
    public function subscribeMe(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => "required",
        //     'email' => "required|unique:users"
        // ]);

        // $fullname = explode(' ', $validated['name']);
        // $validated['first_name'] = $fullname[0];
        // $validated['last_name'] = isset($fullname[1]) && !empty(trim($fullname[1])) ? $fullname[1] : '';

        $validated = [];
        $memberships = Membership::all();
        $data['user'] = $validated;
        $data['memberships'] = $memberships;
        return view("pricing", $data);
        // return view("pricing")->with("user");
    }

    /**
     * Display 
     *
     * @return \Illuminate\
     */
    public function subscribePrice(Request $request)
    {
        $neededFields = [
            'first_name' => "required",
            'email' => "required|unique:users",
            "price" => "required"
        ];

        if ($request->last_name) {
            $neededFields['last_name'] = "required";
        }

        // $validated = $request->validate($neededFields);
        // return $request->all();

        $validated = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'price' => $request->price,
            'phone_code' => "+1"
        ];

        if (isset($request->phone_code))
            $validated['phone_code'] = $request->phone_code;

        return view("register-new")->with("user", $validated);
    }

    /**
     * Display 
     *
     * @return \Illuminate\
     */
    public function subscribePayment(Request $request)
    {
//        $request->validate([
//            'first_name' => "required|min:3",
//            'agree' => "required",
//            'email' => "required|unique:users",

//        ]);

        $data['validated'] = $request->validate([
            'first_name' => 'required|min:3',
            'agree' => 'required',
            'email' => 'required|unique:users',
            'price' => "required",
            'phone' => 'required',
            'phone_code' => "required",
            'password' => "required|confirmed"
        ], [
            'first_name.required' => 'First Name is required',
            'agree.required' => 'Agree is required',
            'email.required' => 'This email field is requried',
            'email.unique' => 'This email is exist',
            'price.required' => 'This price is required',
            'phone.required' => 'This phone is required',
            'phone_code.required' => 'This phone code is required',
            'password.required' => 'This password code is required',
            'password.confirmed' => 'This password did not match'
        ]);

        return view('register2', $data);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trade;

class UserTradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trades = Trade::all();
        $active = "trades";
        // return 'hi';
        return view("user.trades.index", compact("trades", "active"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = "trades";
        return view("admin.trades.create", compact("active"));
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
            "s_no" => "unique:trades|required",
            "buy_date" => "required",
            "qty" => "required",
            "symbol" => "required",
            "expiration_date" => "required",
            "callput" => "required",
            "strike_price" => "required",
            "stock_price" => "required",
            "stock_stoploss" => "required",
            "stock_resistance" => "required",
            "sell_price" => "required",
            "buy_price" => "required",
            "sell_date" => "required",
            "net" => "required",
            "profit" => "required",
            "current_price" => "required",
            "days_to_expire" => "required",
            "status" => "required",
        ];
            
        $validated = $request->validate($neededFields);

        if (Trade::create($validated)) {
            return redirect()->route('trades.index')->with("success", "Trade is successfully inserted");
        } else {
            return redirect()->route('trades.index')->with("failure", "Failed to insert trade.");
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
        $trade = Trade::find($id);
        if (!$trade) {
            return redirect()->route('trades.index')->with("failure", "Failed to find trades and delete.");
        }

        $active = "trades";
        return view("admin.trades.show", compact("trade", "active"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trade = Trade::find($id);
        if (!$trade) {
            return redirect()->route('trades.index')->with("failure", "Failed to find trades and delete.");
        }

        $active = "trades";
        return view("admin.trades.edit", compact("trade", "active"));
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

        // $role = Role::whereRole("trades")->first();
        // $validated['role_id'] = $role->id;

        $trades = Trade::find($id);

        if (Trade::whereEmail($trades->email)->where('id', '<>', $trades->id)->first()) {
            return redirect()->back()->with("failure", "This email is already in use.");
        }
        if (!$trades) {
            return redirect()->back()->with("failure", "Failed to find trades and delete.");
        }

        $trades->first_name = $request->first_name;
        $trades->last_name = $request->last_name;
        if (!empty($request->password)) {
            $trades->password = $request->password;
        }

        $trades->email = $request->email;

        if ($trades->save()) {
            return redirect()->route('admin.trades.index')->with("success", "Trade is updated.");
        } else {
            return redirect()->route("admin.trades.index")->with("failure", "Failed to update trades!");
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
        $trades = Trade::find($id);
        if (!$trades) {
            return redirect()->back()->with("failure", "Failed to find trades and delete.");
        }

        if ($trades->delete()) {
            return redirect()->back()->with("success", "Trade is deleted.");
        } else {
            return redirect()->back()->with("failure", "Failed to delete trades.");
        }
    }
}
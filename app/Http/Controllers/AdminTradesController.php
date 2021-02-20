<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trade;
use SimpleXLSX;


class AdminTradesController extends Controller
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
        return view("admin.trades.index", compact("trades", "active"));
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

    public function fileImport(Request $request) {

        if(!file_exists($request->file('importFile'))) {
            return redirect()->back()->with("failure", "Not selected file.");
        }

        $realFile = $request->file('importFile');
        $extension = $realFile->getClientOriginalExtension();

        if($extension != 'xlsx' && $extension != 'csv') {
            return redirect()->back()->with("failure", "Not selected file.");
        }

        $destinationPath = 'upload';
        $realFile->move($destinationPath,$realFile->getClientOriginalName());
        $filePath = $destinationPath . '/' . $realFile->getClientOriginalName();
        $message = "Not found file.";

        if ( $xlsx = SimpleXLSX::parse($filePath) ) {
            foreach($xlsx->rows() as $emapData) {
                $trade = new Trade();
                $trade->s_no = $emapData[0];
                $trade->buy_date = $emapData[1];
                $trade->qty = $emapData[2];
                $trade->symbol = $emapData[3];
                $trade->expiration_date = $emapData[4];
                $trade->callput = $emapData[5];
                $trade->strike_price = $emapData[6];
                $trade->stock_price = $emapData[7];
                $trade->stock_stoploss = $emapData[8];
                $trade->stock_resistance = $emapData[9];
                $trade->buy_price = $emapData[10];
                $trade->sell_price = $emapData[11];
                $trade->sell_date = $emapData[12];
                $trade->net = $emapData[13];
                $trade->profit = $emapData[14];
                $trade->current_price = $emapData[15];
                $trade->days_to_expire = $emapData[16];
                $trade->status = $emapData[17];
                $trade->save();
            }
            $message = "Insert trades successfully.";
        } else {
            $message = SimpleXLSX::parseError();
        }

        return redirect()->back()->with("success", $message);
    }
}
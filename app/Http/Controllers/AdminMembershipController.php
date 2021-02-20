<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class AdminMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::all();
        return view('admin.membership.index', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function addMembership(Request $request)
    {
        try {
            $request->validate([
                'amount' => 'required',
                'month' => 'required'
            ]);

            if(isset($request->id)) {
                $membership = Membership::find($request->id);
                $membership->amount = $request->amount;
                $membership->month = $request->month;
                $membership->save();
            } else {
                $membership = new Membership();
                $membership->amount = $request->amount;
                $membership->month = $request->month;
                $membership->save();
            }

            return redirect()->back()->with("success", "You modified membership successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with("failure", $e->getMessage());
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
        $membership = Membership::find($id);
        return view('admin.membership.edit', compact('membership'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function deleteMembership(Request $request) {

        try {
            $membership = Membership::find($request->id);
            if(!$membership) {
                return redirect()->back()->withErrors("Cannot find membership");
            }

            $membership->delete();
            return redirect('admin/membership')->with('success', 'Delete membership');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GuestReservation;
use App\Http\Controllers\Controller;
use App\Models\GuestReservationChild;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $children = GuestReservationChild::get();
        $GuestReservations= GuestReservation::get();
        return view('admin.pages.Child.create' , compact('children','GuestReservations'));
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
        GuestReservationChild::create([
            'guest_reservation_id' => $request->guest_reservation_id,
            'nid' =>$request->nid,
            'name' =>$request->name,

            'birth_date' =>$request->date,
        ]);
        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
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
        $GuestReservations = GuestReservation::get();
        $children = GuestReservationChild::FindOrFail($id);
        return view('admin.pages.child.edit' , compact('children' , 'GuestReservations'));
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
        //
        $children = GuestReservationChild::FindOrFail($id);
        $children->update([
            'guest_reservation_id' => $request->guest_reservation_id,
            'nid' =>$request->nid,
            'name' =>$request->name,
            'birth_date' =>$request->date,
        ]);
        return redirect()->back()->with(['success' => '🤗 Successfully Editing']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $children = GuestReservationChild::findOrFail($id);
        $children->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully deleting']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewGuest;
use Illuminate\Http\Request;
use App\Models\GuestReservation;
use App\Http\Controllers\Controller;
use App\Models\GuestReservationAdult;

class AdultController extends Controller
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
        $guestReservations = GuestReservation::with('guests')->get();
        $adults = GuestReservationAdult::get();
        return view('admin.pages.Adults.create' , compact('adults' , 'guestReservations'));
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
        GuestReservationAdult::create([
            'guest_reservation_id' => $request->guest_reservation_id,
            'nid' =>$request->nid,
            'name' =>$request->name,

            'birth_date' =>$request->date,
            'nationality' =>$request->nationality,
            'tel' =>$request->tel,
            'whatsapp' =>$request->whatsapp,
            'email' =>$request->email,
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
        $guestReservations = GuestReservation::get();
        $adults = GuestReservationAdult::FindOrFail($id);
        return view('admin.pages.Adults.edit' , compact('adults' , 'guestReservations'));
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
        $adults = GuestReservationAdult::FindOrFail($id);
        $adults->update([
            'guest_reservation_id' => $request->guest_reservation_id,
            'nid' =>$request->nid,
            'name' =>$request->name,

            'birth_date' =>$request->date,
            'nationality' =>$request->nationality,
            'tel' =>$request->tel,
            'whatsapp' =>$request->whatsapp,
            'email' =>$request->email,
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
        $adults = GuestReservationAdult::findOrFail($id);
        $adults->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully deleting']);
    }
}

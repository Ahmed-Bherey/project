<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuestReservation;
use App\Models\GuestReservationChild;
use App\Models\NewGuest;
use App\Models\TotalReservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GuestController extends Controller
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
        $guests = NewGuest::all();
        return view('admin.pages.NewGuest.create', compact('guests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->flash();
        if (NewGuest::where('nid', '!=', Null)->where('nid', $request->nid)->exists()) {
            return redirect()->back()->withInput()->with(['errors' => '🤗 This number has already been stored']);
        }
        NewGuest::create([
            'nid' => $request->nid,
            'name' => $request->name,

            'birth_date' => $request->birth_date,
            'nationality' => $request->nationality,
            'tel' => $request->tel,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
        ]);
        return redirect()->route('guest.create')->withInput()->with(['success' => '🤗 Successfully Storing']);
    }

    public function storeReservationGuest(Request $request)
    {


        if (NewGuest::where('nid', '!=', Null)->where('nid', $request->nid)->exists()) {
            return redirect()->back()->with(['errors' => '🤗 This number has already been stored']);
        }
        NewGuest::create([
            'nid' => $request->nid,
            'name' => $request->name,

            'birth_date' => $request->birth_date,
            'nationality' => $request->nationality,
            'tel' => $request->tel,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
        ]);
        return redirect()->route('guest_reservation.create')->with(['success' => '🤗 Successfully Storing']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $guests = NewGuest::findOrFail($id);
        return view('admin.pages.NewGuest.edit', compact('guests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guests = NewGuest::FindOrFail($id);

        $request->validate([
            'nid' => 'required|unique:new_guests,nid,' . $guests->id
        ]);

        $guests->update([
            'nid' => $request->nid,
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'nationality' => $request->nationality,
            'tel' => $request->tel,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
        ]);
        return redirect()->route('guest.create')->with(['success' => '🤗 Successfully Editing']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (GuestReservation::where('guest_id', $id)->exists()) {
            return redirect()->back()->with(['errors' => '🤗 error Deleting.this guest has Reservation']);

        }if (TotalReservation::where('guest_id', $id)->exists()) {
            return redirect()->back()->with(['errors' => '🤗 error Deleting.this guest has Reservation']);

        }
        $guests = NewGuest::findOrFail($id);
        $guests->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully Deleting']);
    }

}

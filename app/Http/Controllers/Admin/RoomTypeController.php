<?php

namespace App\Http\Controllers\Admin;

use App\Models\HotelContract;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = RoomType::all();
        return view('admin.pages.RoomsType.create' , compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rooms = RoomType::all();
        return view('admin.pages.RoomsType.create' , compact('rooms'));
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
        RoomType::create([
            'type' => $request->type,
            'note' =>$request->note,
            'capacity' =>$request->capacity,
            'abbreviation'=>$request->abbreviation,

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
        $rooms = RoomType::FindOrFail($id);
        return view('admin.pages.RoomsType.edit' , compact('rooms'));
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
        $rooms = RoomType::FindOrFail($id);
        $rooms->update([
            'type' => $request->type,
            'note' =>$request->note,
            'capacity' =>$request->capacity,
            'abbreviation'=>$request->abbreviation,


        ]);
        return redirect()->route('roomtype.create')->with(['success' => '🤗 Successfully Storing']);
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
        if(HotelContract::where('room_type_id',$id)->exists()){
            return redirect()->back()->with(['errors' => '🤗 error Deleting.this Room Category has Hotel contract']);

        }
        $rooms = RoomType::findOrFail($id);
        $rooms->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully deleting']);
    }
}
